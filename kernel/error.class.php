<?php

define ('DEBUG', 1); // 1 - режим разработки, 0 - пользовательский режим 

class errorHandler{
    
    public function __construct(){
        if(DEBUG){
            error_reporting(-1); // Аналог error_reporting(E_ALL);
        }else{
            error_reporting(0);  // Ошибки не выводятся
        }
        
        set_error_handler([$this, 'errorHandler']); // Регистрируем свой метод обработки ошибок
        ob_start(); //Вкл. буферизацию и отключаем серверный вывод сообщений об ошибках
        register_shutdown_function([$this, 'fatalErrorHandler']); 
        set_exception_handler([$this, 'exceptionHandler']); // Регистрируем свой метод обработки исключений
    }
    
    public function errorHandler($errno, $errstr, $errfile, $errline){ // Свой метод обработки ошибок
        $this->logErrors($errstr, $errfile, $errline);// Логируем ошибку
        $this->displayError($errno, $errstr, $errfile, $errline);
        return TRUE;
    }
    
    public function fatalErrorHandler(){ // Свой метод обработки ФАТАЛЬНЫХ ошибок
        $error = error_get_last(); // Инфа о последней ошибке
        if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
            $this->logErrors($error['message'], $error['file'], $error['line']);// Логируем ошибку
            ob_end_clean(); // Очищаем буфер
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']); // Показываем ошибку
        }else{
           ob_end_flush(); //
        }
    }
    
    public function exceptionHandler(Exception $e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());// Логируем ошибку
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }
    
    protected function logErrors($message = "", $file = "", $line = ""){ // Логируем ошибку
         error_log("[".date('Y-m-d H:i:s')."] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n============\n", 3, SITE_PATH.'/tmp/errors.log');
    }
    
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500){ 
        // $response = XXX - код ответа сервера по умолчанию. Если вывалится ошибка, то, к примеру, поисковик не будет индексировать страницу 
        http_response_code($response);
        if(DEBUG){
            include(SITE_PATH."/site/tpl/error/error_dev.php"); // Для разработки
        }else{
            include(SITE_PATH."/site/tpl/error/error_users.php"); // Для юзеров
        }
        die;
    }
    
    
}


//new errorHandler();

?>
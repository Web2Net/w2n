<?php
if($_SESSION['lang']=="en"){
    define('MESSAGE_SITE_MOD_NAME','Boomerang');
    
    define('MESSAGE_SITE_FORM_CAPTION','Start a boomerang - it will return');
    define('MESSAGE_SITE_FORM_NAME','Your name');
    define('MESSAGE_SITE_FORM_PHONE','Your phone number');
    define('MESSAGE_SITE_FORM_EMAIL','Your e-mail');
    define('MESSAGE_SITE_FORM_BODY','And what you want to say?');
    define('MESSAGE_SITE_FORM_SEND','Start');
    define('MESSAGE_SITE_FORM_FILL','Write ');
    define('MESSAGE_SITE_FORM_OK_CAPTION','Boomerang fall.');
    define('MESSAGE_SITE_FORM_OK_CAPTION_SECOND','But it will be back');
    
    define('MESSAGE_SITE_SUBJ_FOR_USER','Thank you for contacting the company Berloga');
    define('MESSAGE_SITE_BODY_FOR_USER','We will try to respond as quickly as possible to your request: <br />');
    define('MESSAGE_SITE_BODY_FOR_ADMIN','Letter Berloga Site');
    
}
elseif($_SESSION['lang']=="ru"){
    define('MESSAGE_SITE_MOD_NAME','Бумеранг');
    
    define('MESSAGE_SITE_FORM_CAPTION','Запустите бумеранг, - он вернется');
    define('MESSAGE_SITE_FORM_NAME','Ваше имя');
    define('MESSAGE_SITE_FORM_PHONE','Телефон');
    define('MESSAGE_SITE_FORM_EMAIL','Электро@почта');
    define('MESSAGE_SITE_FORM_BODY','И что сказать хотите Вы?');
    define('MESSAGE_SITE_FORM_SEND','Запустить');
    define('MESSAGE_SITE_FORM_FILL','Заполните');
    define('MESSAGE_SITE_FORM_OK_CAPTION','Бумеранг улетел.');
    define('MESSAGE_SITE_FORM_OK_CAPTION_SECOND','Но он вернется');
    
    define('MESSAGE_SITE_SUBJ_FOR_USER','Спасибо за обращение в компанию Берлога');
    define('MESSAGE_SITE_BODY_FOR_USER','Мы постараемся как можно быстрее отреагировать на Ваш запрос:<br />');
    define('MESSAGE_SITE_BODY_FOR_ADMIN','Письмо с сайта Берлога ');
    
   
}else{
	define('MESSAGE_SITE_MOD_NAME','Бумеранг');
	
	define('MESSAGE_SITE_FORM_CAPTION','Запустіть бумеранг, - він повернеться');
	define('MESSAGE_SITE_FORM_NAME','Ваше ім\'я');
	define('MESSAGE_SITE_FORM_PHONE','Телефон');
	define('MESSAGE_SITE_FORM_EMAIL','Електро@пошта');
	define('MESSAGE_SITE_FORM_BODY','І що сказати хочете Ви?');
	define('MESSAGE_SITE_FORM_SEND','Запустити');
	define('MESSAGE_SITE_FORM_FILL','Заповніть');
	define('MESSAGE_SITE_FORM_OK_CAPTION','Бумеранг полетів.');
	define('MESSAGE_SITE_FORM_OK_CAPTION_SECOND','Але він повернеться');
	
	define('MESSAGE_SITE_SUBJ_FOR_USER','Дякуємо за звернення в компанію Берлога');
	define('MESSAGE_SITE_BODY_FOR_USER','Ми постараємося якомога швидше відреагувати на Ваш запит: <br />');
	define('MESSAGE_SITE_BODY_FOR_ADMIN','Лист з сайту Берлога ');
	
	
}
?>

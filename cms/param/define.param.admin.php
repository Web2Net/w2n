<?php
if($_SESSION['lang']=="en"){
    define('PARAM_ADMIN_MOD_NAME','PARAMicles');
    
    define('PARAM_ADMIN_NOTE_SAVED','Saved!');
    define('PARAM_ADMIN_NOTE_EDITOR_CAT','Edit category');
    define('PARAM_ADMIN_NOTE_EDITOR','Edit PARAMicle');
    define('PARAM_ADMIN_NOTE_EDIT','Edit');
    define('PARAM_ADMIN_NOTE_CAPTION','Caption');
    define('PARAM_ADMIN_NOTE_IMAGE','Picture');
    define('PARAM_ADMIN_NOTE_IMAGE_SIZE','Size');
    define('PARAM_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Very large size!');
    define('PARAM_ADMIN_NOTE_EDIT_IMAGE','Edit picture');
    define('PARAM_ADMIN_NOTE_CATEGORY','Category');
    define('PARAM_ADMIN_NOTE_SELECT_CATEGORY','Select a category');
    define('PARAM_ADMIN_NOTE_SHORT_DESCRIPTION','Short description');
    define('PARAM_ADMIN_NOTE_FULL_DESCRIPTION','Full description');
    define('PARAM_ADMIN_NOTE_SHOW','Show');
    define('PARAM_ADMIN_NOTE_SHOW_ONLINE','Show Online');
    define('PARAM_ADMIN_NOTE_SHOW_ALL','Show all');
    define('PARAM_ADMIN_NOTE_ATTANTION_DELETE','Are you sure you want to delete the record');
    define('PARAM_ADMIN_NOTE_MAIN_SECTION','Main section');
    define('PARAM_ADMIN_NOTE_SECTION','Section');
    define('PARAM_ADMIN_NOTE_TAG_SECTION','Tag-section');
    define('PARAM_ADMIN_NOTE_MENU_CATEGORY','Category menu');
    define('PARAM_ADMIN_NOTE_OPTIONS','Options');
    define('PARAM_ADMIN_NOTE_OPEN','Open');
        
    define('PARAM_ADMIN_BUTTON_BACK','Back');
    define('PARAM_ADMIN_BUTTON_ADD_NEW','Add new record');
    define('PARAM_ADMIN_BUTTON_VIEW_ONLINE','View online');
    define('PARAM_ADMIN_BUTTON_SAVE','Save');
    define('PARAM_ADMIN_BUTTON_DELETE','Delete');
    define('PARAM_ADMIN_BUTTON_UP','Up');
    define('PARAM_ADMIN_BUTTON_DOWN','Down');
}
elseif($_SESSION['lang']=="ru"){
    define('PARAM_ADMIN_MOD_NAME','Статьи');
    
    define('PARAM_ADMIN_NOTE_SAVED','Данные сохранены!');
    define('PARAM_ADMIN_NOTE_EDITOR_CAT','Редактор категории');
    define('PARAM_ADMIN_NOTE_EDITOR','Редактор статьи'); 
    define('PARAM_ADMIN_NOTE_EDIT','Редактировать');
    define('PARAM_ADMIN_NOTE_CAPTION','Название');
    define('PARAM_ADMIN_NOTE_IMAGE','Изображение');
    define('PARAM_ADMIN_NOTE_IMAGE_SIZE','Размер');
    define('PARAM_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Очень большой размер!');
    define('PARAM_ADMIN_NOTE_EDIT_IMAGE','Редактировать изображение');
    define('PARAM_ADMIN_NOTE_CATEGORY','Категория');
    define('PARAM_ADMIN_NOTE_SELECT_CATEGORY','Выберите категорию'); 
    define('PARAM_ADMIN_NOTE_SHORT_DESCRIPTION','Краткое описание');
    define('PARAM_ADMIN_NOTE_FULL_DESCRIPTION','Текст статьи');
    define('PARAM_ADMIN_NOTE_SHOW','Видимость');
    define('PARAM_ADMIN_NOTE_SHOW_ONLINE','Показывать на сайте');
    define('PARAM_ADMIN_NOTE_SHOW_ALL','Показывать все');
    define('PARAM_ADMIN_NOTE_ATTANTION_DELETE','Вы уверены что хотите удалить запись');
    define('PARAM_ADMIN_NOTE_MAIN_SECTION','Главная секция');
    define('PARAM_ADMIN_NOTE_SECTION','Секция');
    define('PARAM_ADMIN_NOTE_TAG_SECTION','Тег-секция');
    define('PARAM_ADMIN_NOTE_MENU_CATEGORY','Меню категорий');
    define('PARAM_ADMIN_NOTE_OPTIONS','Опции');
    define('PARAM_ADMIN_NOTE_OPEN','Открыть');
    
    define('PARAM_ADMIN_BUTTON_BACK','Вернуться к списку записей');
    define('PARAM_ADMIN_BUTTON_ADD_NEW','Добавить новую запись');
    define('PARAM_ADMIN_BUTTON_VIEW_ONLINE','Посмотреть на сайте');
    define('PARAM_ADMIN_BUTTON_SAVE','Сохранить');
    define('PARAM_ADMIN_BUTTON_DELETE','Удалить');
    define('PARAM_ADMIN_BUTTON_UP','Вверх');
    define('PARAM_ADMIN_BUTTON_DOWN','Вниз');  
}else{
	define('PARAM_ADMIN_MOD_NAME','Статті');
	
	define('PARAM_ADMIN_NOTE_SAVED','Дані збережені!');
	define('PARAM_ADMIN_NOTE_EDITOR_CAT','Редактор категорії');
	define('PARAM_ADMIN_NOTE_EDITOR','Редактор статті');
	define('PARAM_ADMIN_NOTE_EDIT','Редагувати');
	define('PARAM_ADMIN_NOTE_CAPTION','Назва');
	define('PARAM_ADMIN_NOTE_IMAGE','Зображення');
	define('PARAM_ADMIN_NOTE_IMAGE_SIZE','Розмір');
	define('PARAM_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Дуже великий розмір!');
	define('PARAM_ADMIN_NOTE_EDIT_IMAGE','Редагувати зображення');
	define('PARAM_ADMIN_NOTE_CATEGORY','Категорія');
	define('PARAM_ADMIN_NOTE_SELECT_CATEGORY','Оберіть категорію');
	define('PARAM_ADMIN_NOTE_SHORT_DESCRIPTION','Короткий опис');
	define('PARAM_ADMIN_NOTE_FULL_DESCRIPTION','Текст статті');
	define('PARAM_ADMIN_NOTE_SHOW','Видимість');
	define('PARAM_ADMIN_NOTE_SHOW_ONLINE','Показувати на сайті');
	define('PARAM_ADMIN_NOTE_SHOW_ALL','Показувати все');
	define('PARAM_ADMIN_NOTE_ATTANTION_DELETE','Ви впевнені що хочете видалити запис');
	define('PARAM_ADMIN_NOTE_MAIN_SECTION','Головна секція');
	define('PARAM_ADMIN_NOTE_SECTION','Секція');
	define('PARAM_ADMIN_NOTE_TAG_SECTION','Тег-секція');
	define('PARAM_ADMIN_NOTE_MENU_CATEGORY','Меню категорій');
	define('PARAM_ADMIN_NOTE_OPTIONS','Опції');
	define('PARAM_ADMIN_NOTE_OPEN','Відкрити');
	
	define('PARAM_ADMIN_BUTTON_BACK','Назад до списку записів');
	define('PARAM_ADMIN_BUTTON_ADD_NEW','Додати новий запис');
	define('PARAM_ADMIN_BUTTON_VIEW_ONLINE','Подивитися на сайті');
	define('PARAM_ADMIN_BUTTON_SAVE','Зберегти');
	define('PARAM_ADMIN_BUTTON_DELETE','Видалити');
	define('PARAM_ADMIN_BUTTON_UP','Вгору');
    define('PARAM_ADMIN_BUTTON_DOWN','Вниз');
}
?>

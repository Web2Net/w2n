<?php
if($_SESSION['lang']=="en"){
    define('ART_ADMIN_MOD_NAME','Articles');
    
//    define('ART_ADMIN_NOTE_SAVED','Saved!');
    define('ART_ADMIN_NOTE_EDITOR_CAT','Edit category');
    define('ART_ADMIN_NOTE_EDITOR','Edit article');
//    define('ART_ADMIN_NOTE_EDIT','Edit');
    define('ART_ADMIN_NOTE_CAPTION','Caption');
    define('ART_ADMIN_NOTE_IMAGE','Picture');
    define('ART_ADMIN_NOTE_IMAGE_SIZE','Size');
    define('ART_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Very large size!');
    define('ART_ADMIN_NOTE_EDIT_IMAGE','Edit picture');
    define('ART_ADMIN_NOTE_CATEGORY','Category');
    define('ART_ADMIN_NOTE_SELECT_CATEGORY','Select a category');
    define('ART_ADMIN_NOTE_SHORT_DESCRIPTION','Short description');
    define('ART_ADMIN_NOTE_FULL_DESCRIPTION','Full description');
    define('ART_ADMIN_NOTE_SHOW','Show');
    define('ART_ADMIN_NOTE_SHOW_ONLINE','Show Online');
    define('ART_ADMIN_NOTE_SHOW_ALL','Show all');
//    define('ART_ADMIN_NOTE_ATTANTION_DELETE','Are you sure you want to delete the record');
    define('ART_ADMIN_NOTE_MAIN_SECTION','Main section');
    define('ART_ADMIN_NOTE_SECTION','Section');
    define('ART_ADMIN_NOTE_TAG_SECTION','Tag-section');
    define('ART_ADMIN_NOTE_MENU_CATEGORY','Category menu');
    define('ART_ADMIN_NOTE_OPTIONS','Options');
//    define('ART_ADMIN_NOTE_OPEN','Open');
        
//    define('ART_ADMIN_BUTTON_BACK','Back');
//    define('ART_ADMIN_BUTTON_ADD_NEW','Add new record');
//    define('ART_ADMIN_BUTTON_VIEW_ONLINE','View online');
//    define('ART_ADMIN_BUTTON_SAVE','Save');
//    define('ART_ADMIN_BUTTON_DELETE','Delete');
//    define('ART_ADMIN_BUTTON_UP','Up');
//    define('ART_ADMIN_BUTTON_DOWN','Down');
}
elseif($_SESSION['lang']=="ru"){
    define('ART_ADMIN_MOD_NAME','Статьи');
    
//    define('ART_ADMIN_NOTE_SAVED','Данные сохранены!');
    define('ART_ADMIN_NOTE_EDITOR_CAT','Редактор категории');
    define('ART_ADMIN_NOTE_EDITOR','Редактор статьи'); 
//    define('ART_ADMIN_NOTE_EDIT','Редактировать');
    define('ART_ADMIN_NOTE_CAPTION','Название');
    define('ART_ADMIN_NOTE_IMAGE','Изображение');
    define('ART_ADMIN_NOTE_IMAGE_SIZE','Размер');
    define('ART_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Очень большой размер!');
    define('ART_ADMIN_NOTE_EDIT_IMAGE','Редактировать изображение');
    define('ART_ADMIN_NOTE_CATEGORY','Категория');
    define('ART_ADMIN_NOTE_SELECT_CATEGORY','Выберите категорию'); 
    define('ART_ADMIN_NOTE_SHORT_DESCRIPTION','Краткое описание');
    define('ART_ADMIN_NOTE_FULL_DESCRIPTION','Текст статьи');
    define('ART_ADMIN_NOTE_SHOW','Видимость');
    define('ART_ADMIN_NOTE_SHOW_ONLINE','Показывать на сайте');
    define('ART_ADMIN_NOTE_SHOW_ALL','Показывать все');
//    define('ART_ADMIN_NOTE_ATTANTION_DELETE','Вы уверены что хотите удалить запись');
    define('ART_ADMIN_NOTE_MAIN_SECTION','Главная секция');
    define('ART_ADMIN_NOTE_SECTION','Секция');
    define('ART_ADMIN_NOTE_TAG_SECTION','Тег-секция');
    define('ART_ADMIN_NOTE_MENU_CATEGORY','Меню категорий');
    define('ART_ADMIN_NOTE_OPTIONS','Опции');
    define('ART_ADMIN_NOTE_OPEN','Открыть');
    
//    define('ART_ADMIN_BUTTON_BACK','Вернуться к списку записей');
//    define('ART_ADMIN_BUTTON_ADD_NEW','Добавить новую запись');
//    define('ART_ADMIN_BUTTON_VIEW_ONLINE','Посмотреть на сайте');
//    define('ART_ADMIN_BUTTON_SAVE','Сохранить');
//    define('ART_ADMIN_BUTTON_DELETE','Удалить');
//    define('ART_ADMIN_BUTTON_UP','Вверх');
//    define('ART_ADMIN_BUTTON_DOWN','Вниз');  
}else{
	define('ART_ADMIN_MOD_NAME','Статті');
	
//	define('ART_ADMIN_NOTE_SAVED','Дані збережені!');
	define('ART_ADMIN_NOTE_EDITOR_CAT','Редактор категорії');
	define('ART_ADMIN_NOTE_EDITOR','Редактор статті');
//	define('ART_ADMIN_NOTE_EDIT','Редагувати');
	define('ART_ADMIN_NOTE_CAPTION','Назва');
	define('ART_ADMIN_NOTE_IMAGE','Зображення');
	define('ART_ADMIN_NOTE_IMAGE_SIZE','Розмір');
	define('ART_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Дуже великий розмір!');
	define('ART_ADMIN_NOTE_EDIT_IMAGE','Редагувати зображення');
	define('ART_ADMIN_NOTE_CATEGORY','Категорія');
	define('ART_ADMIN_NOTE_SELECT_CATEGORY','Оберіть категорію');
	define('ART_ADMIN_NOTE_SHORT_DESCRIPTION','Короткий опис');
	define('ART_ADMIN_NOTE_FULL_DESCRIPTION','Текст статті');
	define('ART_ADMIN_NOTE_SHOW','Видимість');
	define('ART_ADMIN_NOTE_SHOW_ONLINE','Показувати на сайті');
	define('ART_ADMIN_NOTE_SHOW_ALL','Показувати все');
//	define('ART_ADMIN_NOTE_ATTANTION_DELETE','Ви впевнені що хочете видалити запис');
	define('ART_ADMIN_NOTE_MAIN_SECTION','Головна секція');
	define('ART_ADMIN_NOTE_SECTION','Секція');
	define('ART_ADMIN_NOTE_TAG_SECTION','Тег-секція');
	define('ART_ADMIN_NOTE_MENU_CATEGORY','Меню категорій');
	define('ART_ADMIN_NOTE_OPTIONS','Опції');
	define('ART_ADMIN_NOTE_OPEN','Відкрити');
	
//	define('ART_ADMIN_BUTTON_BACK','Назад до списку записів');
//	define('ART_ADMIN_BUTTON_ADD_NEW','Додати новий запис');
//	define('ART_ADMIN_BUTTON_VIEW_ONLINE','Подивитися на сайті');
//	define('ART_ADMIN_BUTTON_SAVE','Зберегти');
//	define('ART_ADMIN_BUTTON_DELETE','Видалити');
//	define('ART_ADMIN_BUTTON_UP','Вгору');
 //   define('ART_ADMIN_BUTTON_DOWN','Вниз');
}
?>

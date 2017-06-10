<?php
if($_SESSION['lang']=="en"){
    define('SEARCH_ADMIN_MOD_NAME','Search');
    
    define('SEARCH_ADMIN_NOTE_YOU_SEARCH','You searched');
    define('SEARCH_ADMIN_NOTE_COUNT_SEARCH','Products. Found positions');
    define('SEARCH_ADMIN_NOTE_PRICE_IN','Price in');
    define('SEARCH_ADMIN_NOTE_PRICE_OUT','Price out');
    
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT','We were looking for, but have not found..');
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT_CAPTION','Unfortunately, at your request we have found nothing :o(');
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT_TEXT','Try refining your query..<br />Not less than 3 and no more than 50 characters.<br />Only letters and numbers..<br />Thank you.');
    
    define('SEARCH_ADMIN_BUTTON_BACK','Back');
    define('SEARCH_ADMIN_BUTTON_ADD_NEW','Add new record');
    define('SEARCH_ADMIN_BUTTON_VIEW_ONLINE','View online');
    define('SEARCH_ADMIN_BUTTON_SAVE','Save');
    define('SEARCH_ADMIN_BUTTON_DELETE','Delete');
    define('SEARCH_ADMIN_BUTTON_UP','Up');
    define('SEARCH_ADMIN_BUTTON_DOWN','Down');
}
elseif($_SESSION['lang']=="ru"){
    define('SEARCH_ADMIN_MOD_NAME','Поиск');
    
    define('SEARCH_ADMIN_NOTE_YOU_SEARCH','Вы искали');
    define('SEARCH_ADMIN_NOTE_COUNT_SEARCH','Продукция. Найдено позиций');
    define('SEARCH_ADMIN_NOTE_PRICE_IN','Цена по входу');
    define('SEARCH_ADMIN_NOTE_PRICE_OUT','Цена магазина');
    
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT','Мы искали, но не нашли..');
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT_CAPTION','К сожалению, по Вашему запросу мы ничего не нашли :o(');
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT_TEXT','Попробуйте уточнить свой запрос..<br />Не меньше 3 и не более 50 символов.<br />Только буквы и цифры..<br />Спасибо.');
    
    define('SEARCH_ADMIN_BUTTON_BACK','Вернуться к списку записей');
    define('SEARCH_ADMIN_BUTTON_ADD_NEW','Добавить новую запись');
    define('SEARCH_ADMIN_BUTTON_VIEW_ONLINE','Посмотреть на сайте');
    define('SEARCH_ADMIN_BUTTON_SAVE','Сохранить');
    define('SEARCH_ADMIN_BUTTON_DELETE','Удалить');
    define('SEARCH_ADMIN_BUTTON_UP','Вверх');
    define('SEARCH_ADMIN_BUTTON_DOWN','Вниз');  
}else{
	define('SEARCH_ADMIN_MOD_NAME','Пошук');
	
	define('SEARCH_ADMIN_NOTE_YOU_SEARCH','Ви шукали');
	define('SEARCH_ADMIN_NOTE_COUNT_SEARCH','Продукція. Знайдено позицій');
	define('SEARCH_ADMIN_NOTE_PRICE_IN','Ціна по входу');
    define('SEARCH_ADMIN_NOTE_PRICE_OUT','Ціна магазина');
    
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT','Ми шукали, але не знайшли..');
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT_CAPTION','На жаль, за Вашим запитом ми нічого не знайшли :o(');
    define('SEARCH_ADMIN_NOTE_SEARCH_BUT_TEXT','Спробуйте уточнити свій запит..<br />Не менше 3 і не більше 50 символів.<br />Тільки букви і цифри..<br />Спасибі.');
	
	define('SEARCH_ADMIN_BUTTON_BACK','Назад до списку записів');
	define('SEARCH_ADMIN_BUTTON_ADD_NEW','Додати новий запис');
	define('SEARCH_ADMIN_BUTTON_VIEW_ONLINE','Подивитися на сайті');
	define('SEARCH_ADMIN_BUTTON_SAVE','Зберегти');
	define('SEARCH_ADMIN_BUTTON_DELETE','Видалити');
	define('SEARCH_ADMIN_BUTTON_UP','Вгору');
    define('SEARCH_ADMIN_BUTTON_DOWN','Вниз');
}
?>

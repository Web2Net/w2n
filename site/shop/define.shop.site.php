<?php
if($_SESSION['lang']=="en"){
    define('SHOP_SITE_MOD_NAME','Shop');
    
    define('SHOP_SITE_CHARACTER','Characteristics');
    define('SHOP_SITE_DESCRIPTION','Description');
    define('SHOP_SITE_PRESENT','Present');
    
// Price & cart
    define('SHOP_SITE_NOTE_PRICE', 'Price');
    define('SHOP_SITE_NOTE_GOOD_PRICE', 'Good price');
    define('SHOP_SITE_NOTE_SALE', 'Sale');
    define('SHOP_SITE_NOTE_ON_REQUEST', 'O/R');
    
    define('SHOP_SITE_NOTE_IN_CART','Add to cart');
    define('SHOP_SITE_NOTE_ITEM_IN_CART','Item in the cart');
// /Price & cart
    
    define('SHOP_SITE_NOTE_APPLICATION','Applications');
    define('SHOP_SITE_NOTE_GALLERY','Gallery');
    define('SHOP_SITE_NOTE_RELATED_ITEMS','Related products');
    
    define('SHOP_SITE_ATTENTION_COLOR','Dear customers, please note that due to the color reproduction of monitors, the colors in reality may differ from that shown in the photo..');
    
}
elseif($_SESSION['lang']=="ru"){
    define('SHOP_SITE_MOD_NAME','Магазин');
    
    define('SHOP_SITE_CHARACTER','Характеристики');
    define('SHOP_SITE_DESCRIPTION','Описание');
    define('SHOP_SITE_PRESENT','Подарок');
    
// Price & cart
    define('SHOP_SITE_NOTE_PRICE', 'Цена');
    define('SHOP_SITE_NOTE_GOOD_PRICE', 'Хорошая цена');
    define('SHOP_SITE_NOTE_SALE', 'Распродажа');
    define('SHOP_SITE_NOTE_ON_REQUEST', 'По запросу');
    
    define('SHOP_SITE_NOTE_IN_CART','В рюкзак');
    define('SHOP_SITE_NOTE_ITEM_IN_CART','Товар в Рюкзаке');
// /Price & cart

    define('SHOP_SITE_NOTE_APPLICATION','Варианты применения');
    define('SHOP_SITE_NOTE_GALLERY','Галерея');
    define('SHOP_SITE_NOTE_RELATED_ITEMS','Сопутствующие товары');
    
    define('SHOP_SITE_ATTENTION_COLOR','Уважаемые клиенты, обращаем Ваше внимание, что в связи с цветопередачей мониторов, расцветка в реальности может отличаться от изображенной на фото..');
      
}else{
	define('SHOP_SITE_MOD_NAME','Магазин');
	
	define('SHOP_SITE_CHARACTER','Характеристики');
	define('SHOP_SITE_DESCRIPTION','Опис');
	define('SHOP_SITE_PRESENT','Подарунок');

// Price & cart
    define('SHOP_SITE_NOTE_PRICE', 'Ціна');
    define('SHOP_SITE_NOTE_GOOD_PRICE', 'Гарна ціна');
    define('SHOP_SITE_NOTE_SALE', 'Розпродаж');
    define('SHOP_SITE_NOTE_ON_REQUEST', 'За запитом');
        
    define('SHOP_SITE_NOTE_IN_CART','У рюкзак');
    define('SHOP_SITE_NOTE_ITEM_IN_CART','Товар у рюкзаку');
// /Price & cart

    define('SHOP_SITE_NOTE_APPLICATION','Варіанти застосування');
    define('SHOP_SITE_NOTE_GALLERY','Галерея');
    define('SHOP_SITE_NOTE_RELATED_ITEMS','Супутні товари');
    	
	define('SHOP_SITE_ATTENTION_COLOR','Шановні клієнти, звертаємо Вашу увагу, що у зв\'язку з передачею кольору моніторів, забарвлення в реальності може відрізнятися від зображеного на фото ..');
	
}
?>

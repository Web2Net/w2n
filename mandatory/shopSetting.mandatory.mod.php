<?

class mandatoryShopSetting
{
    static function mandatoryElements()
    {
        define('EMAIL_BOSS',      'you@mkr.com.ua');
        define('EMAIL_ADMIN',     'vitalyyou@gmail.com,you@mkr.com.ua,oleg.leg@mail.ru,toltecos@ukr.net,toltecos.ua@gmail.com');
        define('EMAIL_FEEDBACK',  'vitalyyou@gmail.com,you@mkr.com.ua,oleg.leg@mail.ru,toltecos@ukr.net,toltecos.ua@gmail.com');
        define('EMAIL_WEBMASTER', 'you@mkr.com.ua');
        define('EMAIL_OFFICE',    'you@mkr.com.ua');
        define('EMAIL_SHOP',      'shop@berloga.in.ua');
        define('EMAIL_UNSUBCRIBE','you@mkr.com.ua');
     
if($_SESSION['lang']=="en"){
	
	define('SITE_NAME', 'Berloga');
	define('SITE_NAME_FULL', 'Berloga - online tourist equipment shop');
    define('META_T_DEFAULT', 'Berloga - online tourist equipment shop');
    define('META_K_DEFAULT', 'Hammock, poncho, raincoat, tent, Panama hat, tent, arc, mosquito, net');
    define('META_D_DEFAULT', 'We sell things without which you can do, but do not, because of the low price, small size, light weight and excellent quality..');

// Mandatory
    define('MANDATORY_BREAD_CRUMBS_FIRST', 'Berloga');
    
    define('MANDATORY_SAVE','Save');
    define('MANDATORY_SAVED','Saved');
    define('MANDATORY_BACK','Back');
    define('MANDATORY_EDIT','Edit');
    define('MANDATORY_ADD','Add');
    define('MANDATORY_OPEN','Open');
    define('MANDATORY_MOVE_UP','Move up'); 
    define('MANDATORY_MOVE_DOWN','Move down');
    define('MANDATORY_VIEW_ONLINE', 'View online'); 
    define('MANDATORY_CLICK_TO_ENLARGE','Click to enlarge');
    define('MANDATORY_VIEW_MORE', 'View more');
    define('MANDATORY_DELETE','Delete');
    define('MANDATORY_ATTANTION_DELETE','Are you sure, you want to delete the record ?');
// /Mandatory
   
    define('MANDATORY_NOTE_GOOD_PRICE','Good price');
    define('MANDATORY_NOTE_SALE','Sale');
    define('MANDATORY_NOTE_PRICE', 'Price');
    define('MANDATORY_NOTE_ON_REQUEST','O/R');
    define('MANDATORY_NOTE_IN_CART','Add to cart');
    

    define('CONTACT_ADRESS', '');
    define('NOTE_NO_PRICE', 'O/R');
    define('NOTE_APPLICATION', 'Application');
// /General

    	
    
    
    define('FEEDBACK_TITLE', 'Feedback');
    define('FEEDBACK_OK_TITLE', 'Thank you');
    define('FEEDBACK_NAME', 'Your name');
    define('FEEDBACK_PHONE', 'Phone');
    define('FEEDBACK_MESS', 'Your message');
    define('FEEDBACK_MESS_SEND', 'Your message has been sent');
    define('FEEDBACK_ONLINE', 'Send');
    
    define('NOTE_ARTICLES','Articles');
        
        define('NOTE_CART','Cart');
        

        define('NOTE_CART_IS_EMPTY','We are sorry, but your cart is empty');
        define('NOTE_MY_CART','My cart');
        define('NOTE_REVIEW_CART','Cart review');
        define('NOTE_SHOPPING_LIST','Shopping list');
        define('NOTE_REFERENCE','Vendor code');

        define('NOTE_PRICE','Price');
        define('NOTE_OLD_PRICE','Old price');
        define('NOTE_SALE','Present');
        define('NOTE_GOOD_PRICE','Price lowered');
        
        
        define('NOTE_RELATED_ITEMS','Related products');
        define('NOTE_PACKAGE','Kit');
        define('NOTE_PACKING','Packaging');
        define('NOTE_PRICE_FOR_PACKAGE','Price per set');
        define('NOTE_KOD','Code');
        
        define('NOTE_READ_MORE','More');
        define('NOTE_MAIN','Main');
        define('NOTE_SHOP','Shop');
        define('MANDATORY_SEARCH_DEVIZ','The one who searches always..');
        define('NOTE_SEARCH_ON_SITE','Search');
        define('NOTE_BEST_PROPOSITION','Best deals');
        define('NOTE_SETS','Quick sets');
        define('NOTE_BRANCH','Sectors of application');
        define('NOTE_DELETE','Remove');
        define('NOTE_CHECKOUT','Drawing up of an order');
        define('NOTE_YOUR_NAME','Your name');
        define('NOTE_COMPANY','Company');
        define('NOTE_EMAIL','Email');
        define('NOTE_PHONE','Phone');
        define('NOTE_SEND_ORDER','Send an order');
        define('NOTE_FILL','Write in');
        define('NOTE_COUNT_ITEMS','Number of goods');
        define('NOTE_PRELIMINARY_COST','Preliminary cost');
        define('NOTE_ORDER_BEEN_SEND','The order has been sent');
        define('NOTE_ORDER_OK','Your order has been sent. <br /> Our managers will contact you for further details. <br /> Thank you for your purchase! <br />');
        define('NOTE_ATTANTION_DELETE','Do you really want to put the chosen goods in the cart?');
        define('NOTE_ITEMS_NA_SYMMY','goods worth');
        define('NOTE_ORDER_NUMBER','Order №'); // logic_cart_site
        define('NOTE_ADOPT','accepted'); // logic_cart_site
        define('NOTE_NEW_ORDER','New order'); // logic_cart_site
        define('NOTE_BEZPLATNAYA_DOSTAVKA','Free shipping');
        define('NOTE_DEVIZ_MAIN','Carry less, go further');
        define('NOTE_MESS','Message');
        
        
    
  
}
elseif($_SESSION['lang']=="ru"){
	define('SITE_NAME', 'Берлога');
	define('SITE_NAME_FULL', 'Berloga - интернет магазин туристического снаряжения');
    define('META_T_DEFAULT', 'Berloga - интернет-магазин туристического снаряжения');
    define('META_K_DEFAULT', 'Гамак, пончо, плащ-палатка, панама, плащ, палатка, дуги, москитная, сетка');
    define('META_D_DEFAULT', 'Мы продаем то, без чего можно обойтись, но не стоит, по причине низкой цены, небольших габаритов, малого веса и отменного качества..');

// Mandatory
    define('MANDATORY_BREAD_CRUMBS_FIRST', 'Берлога');
    
    define('MANDATORY_SAVE','Сохранить');
    define('MANDATORY_SAVED','Данные сохранены');
    define('MANDATORY_BACK','Назад');
    define('MANDATORY_EDIT','Редактировать');
    define('MANDATORY_ADD','Добавить');
    define('MANDATORY_OPEN','Открыть');
    define('MANDATORY_MOVE_UP','Вверх'); 
    define('MANDATORY_MOVE_DOWN','Вниз');
    define('MANDATORY_VIEW_ONLINE', 'Посмотреть на сайте'); 
    define('MANDATORY_CLICK_TO_ENLARGE','Кликните для увеличения');
    define('MANDATORY_VIEW_MORE', 'Подробнее');
    define('MANDATORY_DELETE','Удалить');
    define('MANDATORY_ATTANTION_DELETE','Вы уверены, что хотите удалить запись ?');
// /Mandatory
    
    
    
    define('MANDATORY_NOTE_GOOD_PRICE','Хорошая цена');
    define('MANDATORY_NOTE_SALE','Распродажа');
    define('MANDATORY_NOTE_PRICE', 'Цена');
    define('MANDATORY_NOTE_ON_REQUEST','По запросу');
    define('MANDATORY_NOTE_IN_CART','В рюкзак');
    

    define('CONTACT_ADRESS', '');
    define('NOTE_NO_PRICE', 'По запросу');
    define('NOTE_APPLICATION', 'Варианты применения');
// /General

    	
    define('FEEDBACK_TITLE', 'Обратная связь');
    define('FEEDBACK_OK_TITLE', 'Спасибо');
    define('FEEDBACK_NAME', 'Ваше имя');
    define('FEEDBACK_PHONE', 'Телефон');
    define('FEEDBACK_MESS', 'Ваше сообщение');
    define('FEEDBACK_MESS_SEND', 'Ваше сообщение отправлено');
    define('FEEDBACK_ONLINE', 'Отправить');
    
    define('NOTE_ARTICLES','Статьи');
        
        define('NOTE_CART','Рюкзак');
        
        define('NOTE_IN_CART','В Рюкзак');
        define('NOTE_CART_IS_EMPTY','Сожалеем, но Ваш Рюкзак пуст');
        define('NOTE_MY_CART','Мой Рюкзак');
        define('NOTE_REVIEW_CART','Обзор Рюкзака');
        define('NOTE_SHOPPING_LIST','Список покупок');
        define('NOTE_REFERENCE','Артикул');

        define('NOTE_PRICE','Цена');
        define('NOTE_OLD_PRICE','Старая цена');
        define('NOTE_SALE','Подарок');
        define('NOTE_GOOD_PRICE','Цена снижена');
        define('NOTE_CLICK_TO_ENLARGE','Кликните для увеличения');
        
        
        define('NOTE_PACKAGE','Комплект');
        define('NOTE_PACKING','Упаковка');
        define('NOTE_PRICE_FOR_PACKAGE','Цена за комплект');
        define('NOTE_KOD','Код');
        
        define('NOTE_READ_MORE','Подробнее');
        define('NOTE_MAIN','Главная');
        define('NOTE_SHOP','Магазин');
        define('MANDATORY_SEARCH_DEVIZ','Кто ищет, тот всегда..');
        define('NOTE_SEARCH_ON_SITE','Поиск по сайту');
        define('NOTE_BEST_PROPOSITION','Лучшие предложения');
        define('NOTE_SETS','Готовые наборы');
        define('NOTE_BRANCH','Отрасли применения');
        define('NOTE_DELETE','Удалить');
        define('NOTE_CHECKOUT','Оформление заказа');
        define('NOTE_YOUR_NAME','Ваше имя');
        define('NOTE_COMPANY','Компания');
        define('NOTE_EMAIL','Электро@почта');
        define('NOTE_PHONE','Телефон');
        define('NOTE_SEND_ORDER','Отправить заказ');
        define('NOTE_FILL','Заполните');
        define('NOTE_COUNT_ITEMS','Количество товаров');
        define('NOTE_PRELIMINARY_COST','Предварительная стоимость');
        define('NOTE_ORDER_BEEN_SEND','Заказ отправлен');
        define('NOTE_ORDER_OK','Ваш заказ отправлен. <br />Наши менеджеры свяжутся с Вами для уточнения деталей. <br />Спасибо за покупку! <br />');
        define('NOTE_ATTANTION_DELETE','Вы действительно хотите выложить выбраный товар из рюкзака?');
        define('NOTE_ITEMS_NA_SYMMY','товаров на сумму');
        define('NOTE_ORDER_NUMBER','Заказ №'); // logic_cart_site
        define('NOTE_ADOPT','принят'); // logic_cart_site
        define('NOTE_NEW_ORDER','Новый заказ'); // logic_cart_site
        define('NOTE_BEZPLATNAYA_DOSTAVKA','Бесплатная доставка');
        define('NOTE_DEVIZ_MAIN','Неси меньше, иди дальше');
        define('NOTE_MESS','Сообщение');
        
        
    
    
    
}else{
	define('SITE_NAME', 'Берлога');
	define('SITE_NAME_FULL', 'Berloga - інтернет магазин туристичного спорядження');
    define('META_T_DEFAULT', 'Berloga - інтернет магазин туристичного спорядження');
    define('META_K_DEFAULT', 'Гамак, пончо, плащ-намет, панама, плащ, намет, дуги, москітна, сітка');
    define('META_D_DEFAULT', 'Ми продаємо те, без чого можна обійтися, але не варто, через низьку ціну, невеликих габаритів, малої ваги і відмінної якості..');

// Mandatory
    
    define('MANDATORY_BREAD_CRUMBS_FIRST', 'Берлога');
    
    define('MANDATORY_SAVE','Зберегти');
    define('MANDATORY_SAVED','Збережено');
    define('MANDATORY_BACK','Назад');
    define('MANDATORY_EDIT','Редагувати');
    define('MANDATORY_ADD','Додати');
    define('MANDATORY_OPEN','Відкрити');
    define('MANDATORY_MOVE_UP','Вгору'); 
    define('MANDATORY_MOVE_DOWN','Вниз');
    define('MANDATORY_VIEW_ONLINE', 'Подивитися на сайті'); 
    define('MANDATORY_CLICK_TO_ENLARGE','Натисніть для збільшення');
    define('MANDATORY_VIEW_MORE', 'Детальніше');
    define('MANDATORY_DELETE','Видалити');
    define('MANDATORY_ATTANTION_DELETE','Ви впевнені, що хочете видалити запис ?');
// /Mandatory    
    
    define('MANDATORY_NOTE_GOOD_PRICE','Добра ціна');
    define('MANDATORY_NOTE_SALE','Розпродаж');
    define('MANDATORY_NOTE_PRICE', 'Ціна');
    define('MANDATORY_NOTE_ON_REQUEST','За запитом');
    define('MANDATORY_NOTE_IN_CART','У кошик');
    

    define('CONTACT_ADRESS', '');
    define('NOTE_NO_PRICE', 'За запитом');
    define('NOTE_APPLICATION', 'Варіанти застосування');
// /General

   	
    define('FEEDBACK_TITLE', "Зворотній зв'язок");
    define('FEEDBACK_OK_TITLE', 'Дякуємо');
    define('FEEDBACK_NAME', "Ваше ім'я");
    define('FEEDBACK_PHONE', 'Телефон');
    define('FEEDBACK_MESS', 'Ваше повідомлення');
    define('FEEDBACK_MESS_SEND', 'Ваше повідомлення відправлено');
    define('FEEDBACK_ONLINE', 'Відправити');
    
    define('NOTE_ARTICLES','Статьи');
        
        define('NOTE_CART','Рюкзак');
        
        define('NOTE_IN_CART','В Рюкзак');
        define('NOTE_CART_IS_EMPTY','Сожалеем, но Ваш Рюкзак пуст');
        define('NOTE_MY_CART','Мой Рюкзак');
        define('NOTE_REVIEW_CART','Обзор Рюкзака');
        define('NOTE_SHOPPING_LIST','Список покупок');
        define('NOTE_REFERENCE','Артикул');

        define('NOTE_PRICE','Цена');
        define('NOTE_OLD_PRICE','Старая цена');
        define('NOTE_SALE','Подарок');
        define('NOTE_GOOD_PRICE','Цена снижена');
        
        
        
        define('NOTE_PACKAGE','Комплект');
        define('NOTE_PACKING','Упаковка');
        define('NOTE_PRICE_FOR_PACKAGE','Цена за комплект');
        define('NOTE_KOD','Код');
        
        define('NOTE_READ_MORE','Подробнее');
        define('NOTE_MAIN','Главная');
        define('NOTE_SHOP','Магазин');
        define('MANDATORY_SEARCH_DEVIZ','Хто шукає, той завжди..');
        define('NOTE_SEARCH_ON_SITE','Пошук по сайту');
        define('NOTE_BEST_PROPOSITION','Лучшие предложения');
        define('NOTE_SETS','Готовые наборы');
        define('NOTE_BRANCH','Отрасли применения');
        define('NOTE_DELETE','Удалить');
        define('NOTE_CHECKOUT','Оформление заказа');
        define('NOTE_YOUR_NAME','Ваше имя');
        define('NOTE_COMPANY','Компания');
        define('NOTE_EMAIL','Электро@почта');
        define('NOTE_PHONE','Телефон');
        define('NOTE_SEND_ORDER','Отправить заказ');
        define('NOTE_FILL','Заполните');
        define('NOTE_COUNT_ITEMS','Количество товаров');
        define('NOTE_PRELIMINARY_COST','Предварительная стоимость');
        define('NOTE_ORDER_BEEN_SEND','Заказ отправлен');
        define('NOTE_ORDER_OK','Ваш заказ отправлен. <br />Наши менеджеры свяжутся с Вами для уточнения деталей. <br />Спасибо за покупку! <br />');
        define('NOTE_ATTANTION_DELETE','Вы действительно хотите выложить выбраный товар из рюкзака?');
        define('NOTE_ITEMS_NA_SYMMY','товаров на сумму');
        define('NOTE_ORDER_NUMBER','Заказ №'); // logic_cart_site
        define('NOTE_ADOPT','принят'); // logic_cart_site
        define('NOTE_NEW_ORDER','Новый заказ'); // logic_cart_site
        define('NOTE_BEZPLATNAYA_DOSTAVKA','Бесплатная доставка');
        define('NOTE_DEVIZ_MAIN','Неси менше, йди далі');
        define('NOTE_MESS','Сообщение');
    
        
} 
   
        mandatoryShopSetting::getShopSetting("shop_setting"); // Устанавливаем курс доллара и минимальную сумму бесплатной доставки


    }
    
    static function setSetting()
    {
	$query = "SELECT * FROM `shop_setting`";
        $res = mysql_query($query);
	mysql::queryError($res,$query);

        while ($row = mysql_fetch_assoc($res))
        {
            $setting[] = $row;
        }

        return $setting;
        
    }
   
    static function getShopSetting($file_name)
    {
        $GLOBALS["shop_setting"] = INI::Get($file_name);
        $shop_setting = $GLOBALS["shop_setting"];

        define('KURS_USD',$shop_setting[0]["value"]);  
        define('MIN_SUMMA_DOSTAVKI',$shop_setting[1]['value']);
    }
  
    
}
?>

<?php
	
define('USER_ITEM_TABLE','user_item');
define('USER_TAG_TABLE','user_tag');
define('USER_ITEM_IMG_PATH', "/image/user/item");
define('USER_TAG_IMG_PATH', "/image/user/tag");

define('USER_NAME', 'Пользователи');

class User {	

    function siteUser() {
        if(isset($_SERVER['REQUEST_URI'])){
            $seodata = explode("/",str_replace("?display=ajax","",$_SERVER['REQUEST_URI']));
            $mod = $seodata[1];
            $com = $seodata[2];
            $item = $seodata[3];    
            $param = $seodata[4];
        }
        //return $c_cont;
	}

// Получаем id юзера из БД по email если такой email в базе есть. Если нет, возвращаем 0
    static function getUserIdByEmail($email){ 
        $uniq_email = mysql::checkUniqRow(USER_ITEM_TABLE, "email", $email); // Проверка на существование email юзера в БД

        if($uniq_email){ // если email юзера в БД есть - получаем id юзера
		    $query = "SELECT id FROM ".USER_ITEM_TABLE." WHERE `email`='{$email}'"; // Выборка из БД id юзера
            $res = mysql_query($query);
            mysql::queryError($res,$query);

            $row = mysql_fetch_row($res);
            $user_id = $row['0'];
        }
        else{
	        $user_id = 0;
        }
        return $user_id;
	}

// Выборка из БД всех покупок юзера по email	
	static function getBuyListUserByEmail($email){
	    $query = "SELECT * FROM ".USER_ITEM_TABLE." WHERE `email`='{$email}'"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
       
        $row = mysql_fetch_assoc($res);
        $buy_list['buy_list'] = $row['buy_list'];
        
        return $buy_list['buy_list'];	
	}


}
?>

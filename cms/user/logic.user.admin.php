<?php

class User {	
	
function admUser() {	
	
define('MOD_NAME', 'Персоны');

define('MOD_ITEM_TABLE',$_GET["mod"].'_item');
define('MOD_TAG_TABLE',$_GET["mod"].'_tag');
define('MOD_ITEM_IMG_PATH', SITE_PATH."/image/".$_GET["mod"]."/item");
define('MOD_TAG_IMG_PATH', SITE_PATH."/image/".$_GET["mod"]."/tag");

include_once("item.user.admin.php");
include_once("tag.user.admin.php");

include (SITE_PATH."/cms/inc/eval.php");

if($type=="tag"){
$c_cont=UserTag::admTag();	
}
if($type=="item"){
$c_cont=UserItem::admItem();
}


return $c_cont;
}


// Получаем id юзера из БД по email если такой email в базе есть. Если нет, возвращаем 0
    static function getUserIdByEmail($email){ 
        $uniq_email = mysql::checkUniqRow("user_item", "email", $email); // Проверка на существование email юзера в БД
SYS::varDump($uniq_email,__FILE__,__LINE__,"USER_QUERY");
        if($uniq_email){ // если email юзера в БД есть - получаем id юзера
		    $query = "SELECT id FROM `user_item` WHERE `email`='{$email}'"; // Выборка из БД id юзера
            $res = mysql_query($query);
            mysql::queryError($res,$query);
SYS::varDump($query,__FILE__,__LINE__,"USER_QUERY_RES");
            $row = mysql_fetch_row($res);
            $user_id = $row['0'];
        }
        else{
	        $user_id = 0;

        }
        return $user_id;
	}

}
?>

<?php
include_once("define.message.site.php");
	
define('MESSAGE_ITEM_TABLE','message_item');
define('MESSAGE_TAG_TABLE','message_tag');
define('MESSAGE_ITEM_IMG_PATH', "/image/message/item");
define('MESSAGE_TAG_IMG_PATH', "/image/message/tag");

define('MESSAGE_NAME', 'MESSAGE_SITE_MOD_NAME');

class Message {	

    function siteMessage() {

        if(isset($_SERVER['REQUEST_URI'])){
            $seodata = explode("/",str_replace("?display=ajax","",$_SERVER['REQUEST_URI']));
            $mod = $seodata[1];
            $com = $seodata[2];
            $item = $seodata[3];    
            $param = $seodata[4];
        }

//$param=str_replace("?display=ajax","",$param);
        $tpl=new SiteModTpl;
        if($_GET['display']=="ajax"){
	        $c_cont["content"]=$tpl->get("feedback-ok");
//$c_cont["content"]="feedback-ok";

            $arr_value['connect']=';3;';

            $email = trim($_POST['fe']); // Мыло, пришедшее в посте
            $arr_value['user_id'] = User::getUserIdByEmail($email); // Получаем id юзера из БД по email если такой email в базе есть. Если нет, возвращаем 0

            $arr_value['caption']=trim($_POST['fn']); // Имя юзера
            $arr_value['seolink']=trim($_POST['fp']); // Телефон
            $arr_value['desc_short']=trim($_POST['fe']); // мыло
            $arr_value['desc_full']=trim($_POST['fm']); // Сообщение 
            $arr_value['show']=1;
            $arr_value['hit']='';
            $arr_value['p1']='';

            $arr_value['meta_t']=$meta_t!=''?str_replace('"','&quot;',$meta_t):$arr_value['caption'];
            $arr_value['meta_d']=$meta_d!=''?str_replace('"','&quot;',$meta_d):$arr_value['desc_short'];
            $arr_value['meta_k']=$meta_k;

            $arr_value['date']=$date!=""?$date:date("Y-m-d H:i:s");

            $nowdata=getdate(time());
            $arr_value['pos']=$pos!=''&&$pos!=0?$pos:$nowdata[0];

            $db = new mysql;
            $id = $db->insertSQL ($arr_value, MESSAGE_ITEM_TABLE);

//Отправка писем для юзера и менеджеров
            Email::sendMessForAdminAndUser($arr_value['user_id'], $arr_value['caption'], $arr_value['desc_short'], $arr_value['desc_full']);
// /Отправка писем для юзера и менеджеров
        }
        return $c_cont;
    }


}
?>

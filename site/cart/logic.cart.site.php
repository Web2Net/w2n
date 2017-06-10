<?php
define('CART_ITEM_TABLE','cart_item');
define('CART_TAG_TABLE','cart_tag');
define('CART_ITEM_IMG_PATH', "/image/cart/item");
define('CART_TAG_IMG_PATH', "/image/cart/tag");

if(SHOP_ITEM_TABLE === NULL){
    define('SHOP_ITEM_TABLE','shop_item');
}
if(SHOP_ITEM_TABLE_LANG === NULL){
    define('SHOP_ITEM_TABLE_LANG','shop_item_'.$_SESSION['lang']);
}

define('CART_NAME', NOTE_CART);

class Cart {	

    function siteCart(){
        foreach ($_REQUEST as $key=>$val){
            $str="$".$key."=\$val;";
            eval($str);
        }

        if(isset($_SERVER['REQUEST_URI'])){
            $seodata = explode("/",str_replace("?display=ajax","",$_SERVER['REQUEST_URI']));
            $mod = $seodata[1];
            $com = $seodata[2];
            $item = $seodata[3];    
            $param = $seodata[4];
        }

//$param=str_replace("?display=ajax","",$param);
        $tpl=new SiteModTpl;

        if($com=="incart"){
            if($item!=NULL){
                if($param=='del'){
                    unset($_SESSION['shop_item'][$item]);
                }else{
                    $shop_item=Shop::itemDataId($item);

                    if($_SESSION['shop_item'][$item]==NULL){
                        $_SESSION['shop_item'][$item]['item']=$shop_item;
                        $_SESSION['shop_item'][$item]['hm']=$param;
                    }else{
                        $_SESSION['shop_item'][$item]['hm']=$_SESSION['shop_item'][$item]['hm']+$param;
                    }
                }
                $stoit=0;
                $count_item=0;
            }

            if($_SESSION['shop_item']!=NULL){
                foreach($_SESSION['shop_item'] as $key=>$val){
                    $cena=Price::getPrice($val['item']['postavschik'],$val['item']['price_roznica'],$val['item']['price_diler'],$val['item']['ddp']);
                    $ocena=$cena*$val['hm'];
                    $stoit=$stoit+$ocena;
                    $count_item=$count_item+$val['hm'];
                }
            }

//$count_item=count($_SESSION['shop_item']);
//unset($_SESSION['shop_item']);
            $tpl->assign('count_item',$count_item);
            $tpl->assign('stoit',$stoit);
            $tpl->assign('shop_item',$shop_item);
            $tpl->assign('count_shop_item',count($_SESSION['shop_item']));

            $c_cont["content"]=$tpl->get("viget-item-list");
        }
        if($com=="buy"){
            if($_SESSION['shop_item']!=NULL){
                $c_cont["content"]=$tpl->get("buy-item-list");
            }else{
                $c_cont["content"]='<div style="margin-top:50px;text-align:center;"><?=NOTE_CART_IS_EMPTY?><br /><img src="/design/img/cart_is_empty.png" /></div>';
            }
            $metatitle=CART_NAME;	
            $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
            $c_cont["meta"]["description"]=SITE_NAME_FULL;
            $c_cont["meta"]["keywords"]="";
        }
        if($com=="ok"&&$z_name!=""&&$z_phone!=""&&$z_mail!=""){
            $metatitle=CART_NAME;    // в этом файле
            $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".NOTE_ORDER_BEEN_SEND;// в cfg.php;
            $c_cont["meta"]["description"]=SITE_NAME_FULL;// в cfg.php;
            $c_cont["meta"]["keywords"]=META_K_DEFAULT; // в cfg.php;
            $c_cont["content"]=$tpl->get("buy-ok");
            
            $shop_connect=";";
            if($_SESSION['shop_item']!=NULL){
				foreach($_SESSION['shop_item'] as $key=>$val){
                    $shop_connect.=	$key."/".$val['hm'].";";
                }
            }

            $arr_value['connect']=';3;';

            $arr_value['caption']=Text::cutString($z_phone);
            $arr_value['seolink']=Text::cutString($z_mail);
            $arr_value['desc_short']=Text::cutString(str_replace('"','&quot;',$z_name));
            $arr_value['desc_full']=Text::cutString($desc_full);
            $arr_value['show']=1;
            $arr_value['hit']=$hit;
            $arr_value['p1']=$shop_connect;

            $arr_value['meta_t']=$meta_t!=''?str_replace('"','&quot;',$meta_t):$arr_value['caption'];
            $arr_value['meta_d']=$meta_d!=''?str_replace('"','&quot;',$meta_d):$arr_value['desc_short'];
            $arr_value['meta_k']=$meta_k;

            $arr_value['date']=$date!=""?$date:date("Y-m-d H:i:s");

            $nowdata=getdate(time());
            $arr_value['pos']=$pos!=''&&$pos!=0?$pos:$nowdata[0];
            
            $db = new mysql;
            $table=CART_ITEM_TABLE;
SYS::varDump($arr_value,__FILE__,__LINE__,'arr_value');

            $id = $db->insertSQL ($arr_value, $table);

#####  Запись юзверя или его покупок в БД  ##### 
// Все ниже следующее нужно перенести в класс user (Необходимые данные - таблица cart_item, дата покупки и email юзера)

// Выборка последней покупки из табл. cart_item по дате и email      
$query = "SELECT * FROM {$table} WHERE `date`='{$arr_value['date']}' && `seolink`='{$arr_value['seolink']}'"; 
$res = mysql_query($query);
mysql::queryError($res,$query);
while ($buy_data = mysql_fetch_assoc($res))
{
    $buy_id = $buy_data['id']; // id последней покупки он же номер заказа
}

$list_items = explode(";",substr($arr_value['p1'],1,-1)); // Список id товаров и их кол-во в чеке
SYS::varDump($list_items,__FILE__,__LINE__,'list_items');
foreach($list_items as $k=>$v){
	$itemsss = explode("/", $v);
    $id_item = $itemsss["0"]; // id товара
    $count_item = $itemsss["1"]; // кол-во этого товара в чеке
    
    $query = "SELECT * FROM ".SHOP_ITEM_TABLE." 
              LEFT JOIN ".SHOP_ITEM_TABLE_LANG." ON ".SHOP_ITEM_TABLE.".id=".SHOP_ITEM_TABLE_LANG.".pid 
              WHERE `id`='{$id_item}'";    
    
    
//    $query = "SELECT caption,price_diler FROM `shop_item` WHERE `id`='{$id_item}'";
    $res = mysql_query($query);
    mysql::queryError($res,$query);
    while ($last_buy_data = mysql_fetch_assoc($res))
    {
		$price_roznica = Price::getPrice($val['item']['postavschik'],$last_buy_data['price_diler'],$last_buy_data['price_diler'],$val['item']['ddp']);
        $buy_list .= $id_item."~".$last_buy_data['caption']."~".$count_item."~".$price_roznica."&"; // формируем "строку" покупки - "id~наименование~кол-во~цена&следующая позиция"
    }
}	
SYS::varDump($buy_list,__FILE__,__LINE__,'buy_list'); 
 
   


$table2="user_item"; // Таблица с данными юзера
$uniq_email = mysql::checkUniqRow($table2, "email", $arr_value['seolink']); // Проверка на существование email юзера в БД

if($uniq_email){ // если email юзер в БД есть - дописываем ему новую покупку 

$arr_value2['buy_list'] = User::getBuyListUserByEmail($arr_value['seolink']);// Выборка из БД всех покупок юзера

/*
$query = "SELECT * FROM {$table2} WHERE `email`='{$arr_value['seolink']}'"; 
$res = mysql_query($query);
mysql::queryError($res,$query);

    while ($row = mysql_fetch_assoc($res))
    {
       $arr_value2['buy_list'] = $row['buy_list'];
    }
*/
   
         
// Добавляем к списку существующих покупок новую в виде ДАТА || №ЗАКАЗА || ПЕРЕЧЕНЬ ПОКУПОК (id~Наименование~кол-во~цена) || СТАТУС ЗАКАЗА и перевод строки (сколько строк, столько раз юзер что-то покупал)
    $buy_list = $arr_value['date']."||".$buy_id."||".$buy_list."||".$arr_value['connect']."\r\n".$arr_value2['buy_list']; 
    $query = "UPDATE {$table2} SET `buy_list`='{$buy_list}' WHERE `email`='{$z_mail}'"; 
    $res = mysql_query($query); 
    mysql::queryError($res,$query); 
}
else{ // если email юзера в БД нет - заносим данные юзера в БД 

$arr_value2['connect']=';7;'; // связь с табл. user_tag (Разовый покупатель)
$arr_value2['level']='0'; // Покупатель (к администрации магазина отношение не имеет)
$arr_value2['name']=Text::cutString(str_replace('"','&quot;',$z_name)); // Имя
$arr_value2['email']=Text::cutString($z_mail); // Мыло
$arr_value2['buy_list'] = $arr_value['date']."||".$buy_id."||".$buy_list."||".$arr_value['connect']; // Новая покупка в виде ДАТА || №ЗАКАЗА || ПЕРЕЧЕНЬ ПОКУПОК (id~Наименование~кол-во~цена) || СТАТУС ЗАКАЗА
$arr_value2['phone']=Text::cutString($z_phone); // Телефон
$arr_value2['organization']=Text::cutString($z_company); // Компания (не обязательна)
$arr_value2['date']=date("Y-m-d H-i-s"); // Дата первой покупки, она же дата будущей регистрации (Если юзер сделал покупку, а со временем решил зарегистрироваться, то дата регистрации = дата первой покупки и в Кабинет Клиента подтянет покупки, которые он совершал без регистрации (проверка по email))

$id = $db->insertSQL ($arr_value2, $table2);
}
#####  /Запись юзверя или его покупок в БД   ##### 



            $name_from = SITE_NAME;
            $email_from = EMAIL_SHOP;
            $name_to = trim(str_replace('"','&quot;',$z_name));
            $email_to = trim($_POST['z_mail']);
            $data_charset="UTF-8";
            $send_charset="UTF-8";
            $subject = NOTE_ORDER_NUMBER.$id." ".NOTE_ADOPT." ".Time::formatMonth(date("Y-M-d H:i:s"))." ".date("H:i");
            $GLOBALS['z_id']=$id;
            $body=$tpl->get("cart-mail");

            Email::send_mime_mail($name_from,$email_from,$name_to,$email_to, $data_charset,  $send_charset, $subject, $body);

            $name_to = trim(NOTE_NEW_ORDER);
            $email_to = explode(",",trim(EMAIL_ADMIN));
            $body=$tpl->get("admin-cart-mail");

            if($email_to!=NULL){
                foreach($email_to as $key=>$val){
                    Email::send_mime_mail($name_from,$email_from,$name_to,$val,$data_charset,$send_charset,$subject, $body);
                }
            }
//mail($email_to,$subject,$body);
            unset($_SESSION['shop_item']);
        }
        return $c_cont;
    }

}
?>

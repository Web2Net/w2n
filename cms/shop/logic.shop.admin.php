<?php
include_once("item.shop.admin.php");
include_once("tag.shop.admin.php");

include_once("define.shop.admin.php");

define('SHOP_ITEM_TABLE','shop_item');
define('SHOP_ITEM_TABLE_LANG','shop_item_'.$_SESSION['lang']);
define('SHOP_TAG_TABLE','shop_tag');
define('SHOP_TAG_TABLE_LANG','shop_tag_'.$_SESSION['lang']);
define('SHOP_ITEM_IMG_PATH', SITE_PATH."/image/shop/item");
define('SHOP_TAG_IMG_PATH', SITE_PATH."/image/shop/tag");


class Shop {	

function admShop() {

define('SHOP_NAME', SHOP_ADMIN_MOD_NAME);

include (SITE_PATH."/cms/inc/eval.php");

if($type=="tag"){
$c_cont=ShopTag::admTag();	
}
if($type=="item"){
$c_cont=ShopItem::admItem();
}


return $c_cont;
}

function FunnyPrice($price){
	
$sp=explode(".",$price);
$sp[1]=substr($sp[1]."00",0,2);
$fprice="".$sp[0].".<font style='font-size:85%'>".$sp[1]."</font>";
return $fprice;

}

}

class AdmShopTpl extends Tpl{
function AdmShopTpl (){
$this->template_dir = SITE_PATH.'/cms/shop/tpl';
}}
?>

<?php
include_once("item.art.admin.php");
include_once("tag.art.admin.php");

define('ART_ITEM_TABLE','art_item');
define('ART_TAG_TABLE','art_tag');
define('ART_ITEM_IMG_PATH', SITE_PATH."/image/art/item");
define('ART_TAG_IMG_PATH', SITE_PATH."/image/art/tag");

class Art {	

function admArt() {

define('ART_NAME', 'Статьи');

foreach ($_REQUEST as $key=>$val){
$str="$".$key."=\$val;";
eval($str);}

if($type=="tag"){
$c_cont=ArtTag::admTag();	
}
if($type=="item"){
$c_cont=ArtItem::admItem();
}


return $c_cont;
}


}
?>

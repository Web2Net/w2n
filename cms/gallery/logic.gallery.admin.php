<?php
	
include_once("item.gallery.admin.php");
include_once("tag.gallery.admin.php");
include_once("define.gallery.admin.php");	

define('GALLERY_ITEM_TABLE','gallery_item');    
define('GALLERY_ITEM_TABLE_LANG','gallery_item_'.$_SESSION['lang']);    
define('GALLERY_TAG_TABLE','gallery_tag');
define('GALLERY_TAG_TABLE_LANG','gallery_tag_'.$_SESSION['lang']);
define('GALLERY_ITEM_IMG_PATH', SITE_PATH."/image/gallery/item");
define('GALLERY_TAG_IMG_PATH', SITE_PATH."/image/gallery/tag");


class Gallery {	

function admGallery() {

define('GALLERY_NAME', 'Галерея');

include (SITE_PATH."/cms/inc/eval.php");

if($type=="tag"){
$c_cont=GalleryTag::admTag();	
}
if($type=="item"){
$c_cont=GalleryItem::admItem();
}


return $c_cont;
}


}
?>

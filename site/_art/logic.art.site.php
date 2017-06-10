<?php
	
define('ART_ITEM_TABLE','art_item');
define('ART_TAG_TABLE','art_tag');
define('ART_ITEM_IMG_PATH', "/image/art/item");
define('ART_TAG_IMG_PATH', "/image/art/tag");

define('ART_NAME', NOTE_ARTICLES);

class Art {	

function siteArt() {

foreach ($_REQUEST as $key=>$val){
$str="$".$key."=\$val;";
eval($str);}

if(isset($_SERVER['REQUEST_URI'])){
$seodata = explode("/",$_SERVER['REQUEST_URI']);
$mod = $seodata[1];
$tag1 = $seodata[2];
$tag2 = $seodata[3];    
$param = $seodata[4];
}

$tpl=new SiteModTpl;

if(INI::Life('site_art_tag_list')>100){
$all_tag_list=Art::tagListShowLevel();
INI::SetXXL($all_tag_list,'site_art_tag_list');
}
$all_tag_list=INI::Get('site_art_tag_list');

$tpl->assign('all_tag_list',$all_tag_list);

if($tag1==""){
$tag1_list=Art::tagListShowLevel(1);
$tpl->assign('tag1_list',$tag1_list);
$c_cont["content"]=$tpl->get("tag1-list");

$metatitle="Статьи";
$c_cont["meta"]["title"]= SITE_NAME." ".RAZDELYALKA." ".$metatitle;
$c_cont["meta"]["description"]=SITE_NAME_FULL;
$c_cont["meta"]["keywords"]="";

}

else if($tag1!=""&&$tag2==""){
$tag1_data=Art::tagDataSeolink($tag1);
$tag2_list=Art::tagListShowConnect($tag1_data['id']);

$tpl->assign('tag1_data',$tag1_data);
$tpl->assign('tag2_list',$tag2_list);
$c_cont["content"]=$tpl->get("tag2-list");

$metatitle=$tag1_data["caption"];	
$c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
$c_cont["meta"]["description"]=$tag1_data["meta_d"];
$c_cont["meta"]["keywords"]=$tag1_data["meta_t"];
}
else if($tag1!=""&&$tag2!=""&&$param==""){
$tag2_data=Art::tagDataSeolink($tag2);
$item_list=Art::itemListShow($tag2_data['id']);

$tpl->assign('tag2_data',$tag2_data);
$tpl->assign('item_list',$item_list);
$c_cont["content"]=$tpl->get("item-list");

$metatitle=$tag2_data["caption"];
$c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
$c_cont["meta"]["description"]=$tag2_data["meta_d"];
$c_cont["meta"]["keywords"]=$tag2_data["meta_t"];
}
else if($param!=""){
$wa=explode("-",$param);
$item_id=$wa[0];

$item_data=Art::itemDataId($item_id);
$tpl->assign('item_data',$item_data);

$c_cont["content"]=$tpl->get("item-look");

$metatitle=$item_data["caption"];
$c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
$c_cont["meta"]["description"]=$item_data["meta_d"];
$c_cont["meta"]["keywords"]=$item_data["meta_t"];
}

return $c_cont;
}

function siteArtMenu(){
$tpl=new SiteModTpl;

$tag1_list=Art::tagListShowLevel(1);
$tag2_list=Art::tagListShowLevel(2);

$tpl->assign('tag1_list',$tag1_list);
$tpl->assign('tag2_list',$tag2_list);

$art_menu=$tpl->get("tag-menu");

return $art_menu;
}

function tagListShowLevel($level=''){

$select="";
$from=ART_TAG_TABLE;
$where["`show`"]=1;
if($level!=""){
$where["level"]=$level;
}else{
$where["1"]=1;
}
$sortby="pos DESC";

$db = new mysql;
$row = $db->selectSQL($select, $from, $where, $sortby);

if($row!=NULL){foreach($row as $key=>$val){
$arrcat[$val["id"]]=$val;
}}

return $arrcat;

}

function tagListShowConnect($tag){
	
$select="";
$from=ART_TAG_TABLE;
$where="connect LIKE '%;".$tag.";%' AND `show`='1'";
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,100");

if($row!=NULL){foreach($row as $key=>$val){
$arrcat[$val["id"]]=$val;
}}

return $arrcat;
}

function tagDataSeolink($seolink){
	
$select="";
$from=ART_TAG_TABLE;
$where["seolink"]=$seolink;

$db = new mysql;
$row = $db->selectSQL($select, $from, $where, "", 1);

return $row[0];
}


function itemListShow($tag){
	
$select="";
$from=ART_ITEM_TABLE;
$where="connect LIKE '%;".$tag.";%' AND `show`='1'";
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,100");

if($row!=NULL){foreach($row as $key=>$val){
$arrcat[$val["id"]]=$val;
}}

return $arrcat;
}


function itemDataId($id){
	
$select="";
$from=ART_ITEM_TABLE;
$where["id"]=$id;

$db = new mysql;
$row = $db->selectSQL($select, $from, $where, "", 1);

return $row[0];
}




}
?>

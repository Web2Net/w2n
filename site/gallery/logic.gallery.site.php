<?php
	
define('GALLERY_ITEM_TABLE','gallery_item');
define('GALLERY_ITEM_TABLE_LANG','gallery_item_'.$_SESSION['lang']);
define('GALLERY_TAG_TABLE','gallery_tag');
define('GALLERY_TAG_TABLE_LANG','gallery_tag_'.$_SESSION['lang']);
define('GALLERY_ITEM_IMG_PATH', "/image/gallery/item");
define('GALLERY_TAG_IMG_PATH', "/image/gallery/tag");

include("define.gallery.site.php");

define('GALLERY_NAME', GALLERY_SITE_MOD_NAME);



class Gallery {	

    function siteGallery() {

// foreach ($_REQUEST as $key=>$val){
// $str="$".$key."=\$val;";
// eval($str);}

        if(isset($_SERVER['REQUEST_URI'])){
            $seodata = explode("/",$_SERVER['REQUEST_URI']);
            if(isset($seodata[1])){$GLOBALS["mod"] = $mod = $seodata[1];}
            if(isset($seodata[2])){$GLOBALS["tag1"] = $tag1 = $seodata[2];}
            if(isset($seodata[3])){$GLOBALS["tag2"] = $tag2 = $seodata[3];}    
            if(isset($seodata[4])){$GLOBALS["param"] = $param = $seodata[4];}

}

$tpl=new SiteModTpl;

if(INI::Life('site_gallery_tag_list')>100){
$all_tag_list=Gallery::tagListShowLevel();
INI::SetXXL($all_tag_list,'site_gallery_tag_list');
}
$all_tag_list=INI::Get('site_gallery_tag_list');

$tpl->assign('all_tag_list',$all_tag_list);

if($tag1==""){
$tag1_list=Gallery::tagListShowLevel(1);
$tpl->assign('tag1_list',$tag1_list);
$c_cont["content"]=$tpl->get("tag1-list");

$metatitle=GALLERY_NAME; // в этом файле
$c_cont["meta"]["title"]= SITE_NAME." ".RAZDELYALKA." ".$metatitle; // в cfg.php
$c_cont["meta"]["description"]=SITE_NAME_FULL; // в cfg.php
$c_cont["meta"]["keywords"]=META_K_DEFAULT; // в cfg.php
}

else if($tag1!=""&&$tag2==""){
$tag1_data=Gallery::tagDataSeolink($tag1);
$tag2_list=Gallery::tagListShowConnect($tag1_data['id']);

$tpl->assign('tag1_data',$tag1_data);
$tpl->assign('tag2_list',$tag2_list);
$c_cont["content"]=$tpl->get("tag2-list");

$metatitle=GALLERY_NAME; // в этом файле
$c_cont["meta"]["title"]= SITE_NAME." ".RAZDELYALKA." ".$metatitle; // в cfg.php
$c_cont["meta"]["description"]=SITE_NAME_FULL; // в cfg.php
$c_cont["meta"]["keywords"]=META_K_DEFAULT; // в cfg.php
}
else if((isset($tag1) && $tag1 != "") && (isset($tag2) && $tag2 != "") && (!isset($param) || $param == "")){
if($tag2!="all"){
$tag2_data=Gallery::tagDataSeolink($tag2,$tag1);
$item_list=Gallery::itemListShow($tag2_data['id']);
}else{
$tag2_data['caption']=GALLERY_NAME;
$tag2_data['connect']=";1;";
$item_list=Gallery::itemListShow("all");
}
$tpl->assign('tag2_data',$tag2_data);
$tpl->assign('item_list',$item_list);
$c_cont["content"]=$tpl->get("item-list");

$metatitle=GALLERY_NAME; // в этом файле
$c_cont["meta"]["title"]= SITE_NAME." ".RAZDELYALKA." ".$metatitle; // в cfg.php
$c_cont["meta"]["description"]=SITE_NAME_FULL; // в cfg.php
$c_cont["meta"]["keywords"]=META_K_DEFAULT; // в cfg.php
}
else if($param!=""){
$wa=explode("-",$param);
$item_id=$wa[0];

$item_data=Gallery::itemDataId($item_id);
$tpl->assign('item_data',$item_data);

$c_cont["content"]=$tpl->get("item-look");

SYS::varDump($item_data,__FILE__,__LINE__,"item_data");
}
return $c_cont;
}

    function siteGalleryMenu(){

        $tpl=new SiteGalleryTpl;

        $tag1_list=Gallery::tagListShowLevel(1);
        $tag2_list=Gallery::tagListShowLevel(2);

        $tpl->assign('tag1_list',$tag1_list);
        $tpl->assign('tag2_list',$tag2_list);

        $Gallery_menu=$tpl->get("tag-menu");

        return $Gallery_menu;
    }

    function tagListShowLevel($level=''){
    
        if($level!=""){$levelz="`level`='".$level."'";}else{$levelz="1=1";}

        $query = "SELECT * FROM ".GALLERY_TAG_TABLE." 
                  LEFT JOIN ".GALLERY_TAG_TABLE_LANG." ON ".GALLERY_TAG_TABLE.".id=".GALLERY_TAG_TABLE_LANG.".pid 
                  WHERE `show`='1' AND ".$levelz." ORDER BY `pos` DESC";
        
        $db = new SafeMySQL();
        if($result = $db->query($query)){
            while($row = $db->fetch($result)){
                $row["caption"]=stripslashes($row["caption"]);
                $row["desc_short"]=stripslashes($row["desc_short"]);
 	        $row["desc_full"]=stripslashes($row["desc_full"]);
 	        $row["meta_t"]=stripslashes($row["meta_t"]);
 	        $row["meta_d"]=stripslashes($row["meta_d"]);
 	        $row["meta_k"]=stripslashes($row["meta_k"]);
 	 
 	        $itog[] = $row;
            }
        }       
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }
        return $arrcat;
    }

function tagListShowConnect($tag){

    $query = "SELECT * FROM ".GALLERY_TAG_TABLE." 
              LEFT JOIN ".GALLERY_TAG_TABLE_LANG." ON ".GALLERY_TAG_TABLE.".id=".GALLERY_TAG_TABLE_LANG.".pid 
              WHERE `connect` LIKE '%;".$tag.";%' AND `show`='1' ORDER BY `pos` DESC";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
  //  $row = mysql_fetch_array($res);
		if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
								
	$result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}

		
    if($itog!=NULL){
        foreach($itog as $key=>$val){
            $arrcat[$val["id"]]=$val;
        }
    }
SYS::varDump($arrcat,__FILE__,__LINE__,"GALL::tagListShowConnect");
    return $arrcat;
/*	
$select="";
$from=GALLERY_TAG_TABLE;
$where="connect LIKE '%;".$tag.";%' AND `show`='1'";
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,100");

if($row!=NULL){foreach($row as $key=>$val){
$arrcat[$val["id"]]=$val;
}}

return $arrcat;
*/
}

function tagDataSeolink($seolink,$parentseo=''){

    $query = "SELECT * FROM ".GALLERY_TAG_TABLE." 
              LEFT JOIN ".GALLERY_TAG_TABLE_LANG." ON ".GALLERY_TAG_TABLE.".id=".GALLERY_TAG_TABLE_LANG.".pid 
              WHERE `seolink`='".$seolink."' LIMIT 1";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
    $result = mysql_fetch_array($res); 
				
	$result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
	
SYS::varDump($result,__FILE__,__LINE__,"GALL::tagDataSeolink");
    return $result;
/*	
$select="";
$from=GALLERY_TAG_TABLE;
$where="seolink='{$seolink}'";
if($parentseo!=""){
$tag1_data=Gallery::tagDataSeolink($parentseo);
$where.=" AND connect LIKE '%;{$tag1_data['id']};%'";
}

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, "", 1);

return $row[0];
*/
}




function itemListShow($tag){

        $query = "SELECT * FROM ".GALLERY_ITEM_TABLE." 
                  LEFT JOIN ".GALLERY_ITEM_TABLE_LANG." ON ".GALLERY_ITEM_TABLE.".id=".GALLERY_ITEM_TABLE_LANG.".pid 
                  WHERE `show`='1' ORDER BY `pos` DESC";
     
        $db = new SafeMySQL();
        if($result = $db->query($query)){
            while($row = $db->fetch($result)){
                $row["caption"]=stripslashes($row["caption"]);
                $row["desc_short"]=stripslashes($row["desc_short"]);
 	        $row["desc_full"]=stripslashes($row["desc_full"]);
 	        $row["meta_t"]=stripslashes($row["meta_t"]);
 	        $row["meta_d"]=stripslashes($row["meta_d"]);
 	        $row["meta_k"]=stripslashes($row["meta_k"]);
 	 
 	        $itog[] = $row;
            }
        }       
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }
        return $arrcat; 
/*	
$select="";
$from=GALLERY_ITEM_TABLE;
if($tag=="all"){
$where="`show`='1'";
}else{
$where="connect LIKE '%;".$tag.";%' AND `show`='1'";
}
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,100");

if($row!=NULL){foreach($row as $key=>$val){
$arrcat[$val["id"]]=$val;
}}

return $arrcat;
*/
}

    static function itemListSpecial($spec_where){ // Надо ИЗМЕНИТЬ выборку.. RAND() - слишком долго для большой таблицы))

        $query = "SELECT * FROM ".GALLERY_ITEM_TABLE." 
                  LEFT JOIN ".GALLERY_ITEM_TABLE_LANG." ON ".GALLERY_ITEM_TABLE.".id=".GALLERY_ITEM_TABLE_LANG.".pid 
                  WHERE ".$spec_where." AND `show`='1' ORDER BY RAND() DESC LIMIT 12";
    
        $db = new SafeMySQL();
        if($result = $db->query($query)){
            while($row = $db->fetch($result)){
                $row["caption"]=stripslashes($row["caption"]);
                $row["desc_short"]=stripslashes($row["desc_short"]);
 	        $row["desc_full"]=stripslashes($row["desc_full"]);
 	        $row["meta_t"]=stripslashes($row["meta_t"]);
 	        $row["meta_d"]=stripslashes($row["meta_d"]);
 	        $row["meta_k"]=stripslashes($row["meta_k"]);
 	 
 	        $itog[] = $row;
            }
        }       
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }
        return $arrcat;
}


function itemDataId($id){
	
    $query = "SELECT * FROM ".GALLERY_ITEM_TABLE." 
              LEFT JOIN ".GALLERY_ITEM_TABLE_LANG." ON ".GALLERY_ITEM_TABLE.".id=".GALLERY_ITEM_TABLE_LANG.".pid 
              WHERE `pid`='".$id."' LIMIT 1";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
    $result = mysql_fetch_array($res); 
				
	$result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);

SYS::varDump($result,__FILE__,__LINE__,"GALL::itemDataId");
    return $result;
/*	
$select="";
$from=GALLERY_ITEM_TABLE;
$where["id"]=$id;

$db = new mysql;
$row = $db->selectSQL($select, $from, $where, "", 1);

return $row[0];
*/
}




}

class SiteGalleryTpl extends Tpl{
function SiteGalleryTpl (){
$this->template_dir = SITE_PATH.'/site/gallery/tpl';
}}

?>

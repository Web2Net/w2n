<?php

class GalleryItem {	

    function admItem() {

include (SITE_PATH."/cms/inc/eval.php");

        $tpl_item=new AdmModTpl;


        if($com=="list"){	
            if($display!="ajax"){
                $_SESSION['refresh_page']=PAGE_URL;
            }

            $item_list=GalleryItem::itemListId($tag);
            $tag_list=GalleryTag::tagListId();

            $tpl_item->assign('item_list',$item_list);
            $tpl_item->assign('tag_list',$tag_list);
            if($display=="ajax"){
                $c_cont=$tpl_item->get("ajax-item-list");
            }else{
                $c_cont=$tpl_item->get("item-list");
            }
        }
//SYS::varDump($item_list,__FILE__,__LINE__,"Gal::itemList");
        if($cmd=="update"||$cmd=="insert"){
	        $connect_real = array_unique($connect);

            $arr_value['connect']=';';
            if($connect_real!=NULL){
		    	foreach($connect_real as $key=>$val){
                    $arr_value['connect'].=$val.';';	
                }
	    	}

            $arr_value['seolink']=$seolink!=""?$seolink:Text::cirilToLatin($arr_value['caption']);
            $arr_value['show']=$show;
            $arr_value['hit']=$hit;

			$arr_value2['caption']=str_replace('"','&quot;',$caption);
			$arr_value2['desc_short']=str_replace('"','&quot;',$desc_short);
			$arr_value2['desc_full']=$desc_full;
			$arr_value2['meta_t']=$meta_t!=''?str_replace('"','&quot;',$meta_t):$arr_value['caption'];
            $arr_value2['meta_d']=$meta_d!=''?str_replace('"','&quot;',$meta_d):$arr_value['desc_short'];
            $arr_value2['meta_k']=$meta_k;
			
            $arr_value['date']=$date!=""?$date:date("Y-m-d H:i:s");

            $nowdata=getdate(time());
            $arr_value['pos']=$pos!=''&&$pos!=0?$pos:$nowdata[0];

            $table=GALLERY_ITEM_TABLE;
            $table2=GALLERY_ITEM_TABLE_LANG;

if($id!=""&&$id!="new"){
	$where['id']=$id;
	$db = new mysql;
	$res = $db->updateSQL ($table, $arr_value, $where);	
	
	$arr_value2['pid']=$id;
	$where2['pid']=$id;
	$res2 = $db->updateSQL ($table2, $arr_value2, $where2);		
}else{
	$db = new mysql;
	$id = $db->insertSQL ($arr_value, $table);
				
//*********** Создание языковых записей *********//	
$site_langs = Lang::getSiteLangs();  // Получаем доступные языки
   
if($site_langs !== NULL){   
    foreach($site_langs as $key=>$val){   
	    if($val['lang']==$_SESSION['lang']){
		    $arr_value2['pid']=$id;
	        $id2 = $db->insertSQL ($arr_value2, $table2);	
	    }else{
	        $table_lang="gallery_item_".$val['lang'];
	        $arr_value3['pid']=$id;
	        $id3 = $db->insertSQL ($arr_value3, $table_lang);
        }
    }
}
	            rename(GALLERY_ITEM_IMG_PATH."/new",GALLERY_ITEM_IMG_PATH."/".$id);
	            $url="/cms/?".str_replace("com=add","com=edit", getenv("QUERY_STRING"));
	            $url=str_replace("id=new","id=".$id, $url);
	            header("Location: ".$url."&save=ok");
            }
            $_SESSION['dplay']="tab";
        }

		if($com=="add"||$com=="edit"){	
            $tag_list=GalleryTag::tagListId();
            $tpl_item->assign('tag_list',$tag_list);

            $tag_list1=GalleryTag::tagListConnectId(1);
            $tpl_item->assign('tag_list1',$tag_list1);

            $tag_list2=GalleryTag::tagListConnectId(2);
            $tpl_item->assign('tag_list2',$tag_list2);

            if($com=="edit"){
                $item_data=GalleryItem::itemData($id);
                $tpl_item->assign('item_data',$item_data);	
            }	

            $c_cont=$tpl_item->get("item-add-edit");	
        }

		return $c_cont;
    }


function itemListData($tag){
	
$select="";
$from=GALLERY_ITEM_TABLE;
$where="connect LIKE '%;".$tag.";%'";
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,70");

return $row;
}


    function itemListId($tag){
	    $query = "SELECT * FROM ".GALLERY_ITEM_TABLE." 
              LEFT JOIN ".GALLERY_ITEM_TABLE_LANG." ON ".GALLERY_ITEM_TABLE.".id=".GALLERY_ITEM_TABLE_LANG.".pid 
              WHERE `connect` LIKE '%;".$tag.";%' ORDER BY `pos` DESC";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
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

    return $arrcat;
/*	
$select="";
$from=GALLERY_ITEM_TABLE;
$where="connect LIKE '%;".$tag.";%'";
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,70");

if($row!=NULL){foreach($row as $key=>$val){
$arrcat[$val["id"]]=$val;
}}

return $arrcat;
*/
    }

function itemCountTag($tag){
	
$select="COUNT(id)";
$from=GALLERY_ITEM_TABLE;
$where="connect LIKE '%".$tag.";%'";
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,70");

return $row[0]["COUNT(id)"];
}

function itemData($id){
	$query = "SELECT * FROM ".GALLERY_ITEM_TABLE." 
              LEFT JOIN ".GALLERY_ITEM_TABLE_LANG." ON ".GALLERY_ITEM_TABLE.".id=".GALLERY_ITEM_TABLE_LANG.".pid 
              WHERE `id`='".$id."' LIMIT 1";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
    $result = mysql_fetch_array($res); 
				
	$result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
	

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



function Event($event,$table,$id){
$from=$table;
$where="id={$id}";
$db = new mysql;
$row = $db->origSelectSQL("id,pos", $from, $where,"pos ASC","0,1");

$pos_start=$row[0]["pos"];
$id_start=$row[0]["id"];

if($event=='moveDown'){
$from2=$table;	
$where2="pos<{$pos_start}";
$db = new mysql;
$row2 = $db->origSelectSQL("id,pos", $from2, $where2,"pos DESC","0,1");
$pos_end=$row2[0]["pos"];?><br><?
$id_end=$row2[0]["id"];
}

if($event=='moveUp'){
$from2=$table;	
$where2="pos>{$pos_start}";
$db = new mysql;
$row2 = $db->origSelectSQL("id,pos", $from2, $where2,"pos ASC","0,1");
$pos_end=$row2[0]["pos"];
$id_end=$row2[0]["id"];
}
	
if($pos_end!=""){
$arr_value1['pos']=$pos_end;
$arr_value2['pos']=$pos_start;
$whereu1['id']=$id_start;
$whereu2['id']=$id_end;
$db = new mysql;
$db->updateSQL ($from, $arr_value1, $whereu1);
$db->updateSQL ($from, $arr_value2, $whereu2);
}
//return $res;
}


}



/*
	



if($com=="update"){

$text_autor="Alice";

$arr_value['category_id']=$category_id;
$arr_value['date']=isset($date) && $date!=""?$date:date("Y-m-d H:i:s");
$arr_value['web_link']=$web_link;
$arr_value['ilike']=$ilike;
$arr_value['caption']=str_replace('"','&quot;',$caption);
$arr_value['short_text']=str_replace('"','&quot;',$short_text);
$arr_value['full_text']=$full_text;
$arr_value['video']=$video;
$arr_value['text_autor']=$text_autor;
$arr_value['foto_autor']=$foto_autor;
$arr_value['image']=$image;
$arr_value['image_small']=$image_small;
if($gallery_id!=0){$arr_value['gallery_id']=$gallery_id;}
$arr_value['smi']=$smi;
if($category_id!=5){
$arr_value['seo']=Text::cirilToLatin($arr_value['caption']);
}
$arr_value['meta_title']=$meta_title!=''?str_replace('"','&quot;',$meta_title):$arr_value['caption'];
$arr_value['meta_description']=$meta_description!=''?str_replace('"','&quot;',$meta_description):$arr_value['short_text'];
$arr_value['meta_keywords']=$meta_keywords;
//$arr_value['see']=$see;
$arr_value['enabled']=$enabled;
$nowdata=getdate(time());
$arr_value['pos']=isset($pos)?$pos:$nowdata[0];
$arr_value['source_id']=$source_id;

$table="art_Fotogallery";

if($id!=""){
	
$where['id']=$id;
$db = new mysql;
$res = $db->updateSQL ($table, $arr_value, $where);

}else{

$db = new mysql;
$id = $db->insertSQL ($arr_value, $table);	
	
}
$loc_url=str_replace("com=update","com=edit",PAGE_URL);
$loc_url=str_replace("&id=".$id."","",$loc_url);
$loc_url=$loc_url."&category_id=".$category_id."&id=".$id."&upd=ok";

header("Location: ".$loc_url."");

}

if($com=="delete"){
	
$from="art_Fotogallery";	
$where['id']=$id;	
$db = new mysql;
$res = $db->deleteSQL ($from, $where);
$loc_url=str_replace("com=delete","com=view",PAGE_URL);
$loc_url=str_replace("&id=".$id."","",$loc_url);
header("Location: ".$loc_url."");
}

}

 return $c_cont;

}


*/

?>

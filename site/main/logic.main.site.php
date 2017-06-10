<?php

class Main {	

static function siteMain() {
	
$c_cont["content"]="";	
$tpl=new SiteModTpl;

/*
foreach ($_REQUEST as $key=>$val){
$str="$".$key."=\$val;";
eval($str);}
*/

if(isset($_SERVER['REQUEST_URI'])){
$seodata = explode("/",$_SERVER['REQUEST_URI']);
if(isset($seodata[1])){$mod = $seodata[1];}
if(isset($seodata[2])){$tag1 = $seodata[2];}
if(isset($seodata[3])){$tag2 = $seodata[3];}    
if(isset($seodata[4])){$param = $seodata[4];}
}

if(isset($tag1) && $tag1=="best-proposition"){
	
$spec_where="on_main!=0 AND `show`='1'";
$best_prop=Shop::itemListSpecial($spec_where);
$tpl->assign('best_prop',$best_prop);
$c_cont["content"].=$tpl->get("best-prop-full");

}else if(isset($tag1) && $tag1=="quick-setting"){
	
$spec_where="connect LIKE '%;48;%' AND on_main!=0 AND `show`='1'";
$quick_set=Shop::itemListSpecial($spec_where);
$tpl->assign('quick_set',$quick_set);
$c_cont["content"].=$tpl->get("quick-set-full");

}else{

$spec_where="on_main!=0 AND `show`='1'";
$best_prop=Shop::itemListSpecial($spec_where);
$tpl->assign('best_prop',$best_prop);
$c_cont["content"].=$tpl->get("best-prop");
//SYS::varDump($best_prop,__FILE__,__LINE__,"best_prop");


//$spec_where="connect LIKE '%;48;%' AND on_main!=0 AND `show`='1'";
//$quick_set=Shop::itemListSpecial($spec_where);
//$tpl->assign('quick_set',$quick_set);
//$c_cont["content"].=$tpl->get("quick-set");
//SYS::varDump($quick_set,__FILE__,__LINE__,"quick_set");

//$spec_where="hit!=0 AND `show`='1'";
$spec_where="`show`='1'";
$gallery_top=Gallery::itemListSpecial($spec_where);
$tpl->assign('gallery_top',$gallery_top);
$c_cont["content"].=$tpl->get("gallery-top");
//SYS::varDump($gallery_top,__FILE__,__LINE__,"gallery_top");

//$branch_top=Gallery::tagListShowConnect(1);
//$tpl->assign('branch_top',$branch_top);
//$c_cont["content"].=$tpl->get("branch-top");
//SYS::varDump($branch_top,__FILE__,__LINE__,"branch_top");

//$spec_where="on_main!=0 AND `show`='1'";
//$detail_top=Shop::itemListSpecial($spec_where);
//$tpl->assign('detail_top',$detail_top);
//$c_cont["content"].=$tpl->get("detail-top");
//SYS::varDump($detail_top,__FILE__,__LINE__,"detail_top");

}

$c_cont["meta"]["title"]=META_T_DEFAULT;
$c_cont["meta"]["description"]=META_D_DEFAULT;
$c_cont["meta"]["keywords"]=META_K_DEFAULT;

return $c_cont;
}



}

class SiteMainTpl extends Tpl{
function SiteMainTpl (){

	    $this->template_dir = SITE_PATH.'/site/main/tpl';	
}}

?>

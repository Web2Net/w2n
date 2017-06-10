<?php

//if (!defined('SID')) { 
session_start();
//}
/*
echo $_SESSION['bro_width'];
echo "<br />";
echo BRO_WIDTH;
*/
include_once (SITE_PATH."/kernel/kernel.php");
include_once (SITE_PATH."/kernel/auth.class.php");
include_once (SITE_PATH."/kernel/email.class.php");

include_once (SITE_PATH."/mandatory/shopSetting.mandatory.mod.php");
// Установки магазина
mandatoryShopSetting::mandatoryElements(); // Обязательные настройки магазина. Курс валют, мин сумма доставки, название сайта, адреса, телефоны и прочая инфа
// /Установки магазина
include_once ("lang/lang.class.php");
include_once ("setting/setting.class.php");


include_once ("main/logic.main.site.php");
include_once ("art/logic.art.site.php");
include_once ("shop/logic.shop.site.php");
include_once ("gallery/logic.gallery.site.php");
include_once ("cart/logic.cart.site.php");
include_once ("search/search.mod.site.php");
include_once ("message/logic.message.site.php");
include_once ("user/logic.user.site.php");

include_once ("feedback/feedback.mod.site.php");

include_once (SITE_PATH."/cms/price.mod.admin.php");


if(isset($_GET["display"]) && $_GET["display"]=="mobi"){
$_SESSION["display"]="mobi";
}
if(isset($_GET["display"]) && $_GET["display"]=="full"){
$_SESSION["display"]="full";
}
/*
foreach ($_REQUEST as $key=>$val)
{
    $str="$".$key."=\$val;";
    eval($str);
}
*/
$seolink=$_SERVER['REQUEST_URI'];

if(isset($seolink))
{
    $seodata = explode("/",$seolink);
    if(isset($seodata[1])){$mod = $GLOBALS["mod"] = $seodata[1];}
    if(isset($seodata[2])){$tag1 = $GLOBALS["tag1"] = $seodata[2];}
    if(isset($seodata[3])){$tag2  = $GLOBALS["tag2"]= $seodata[3];}    
    if(isset($seodata[4])){$param = $GLOBALS["param"] = $seodata[4];}
}

    if((!isset($_SESSION['display']) || $_SESSION['display'] == "") && (!isset($_GET['display']) || $_GET['display'] == "")){
	    include_once SITE_PATH."/lib/devices/Mobile_Detect.php";
        $detect = new Mobile_Detect();

		if($detect->isMobile() || $detect->isTablet()){
			$_SESSION["display"]="mobi";
		}
		else{
			$_SESSION["display"]="full";
		}
	}    

class SiteModTpl extends Tpl{
    function SiteModTpl (){
//$this->template_dir = SITE_PATH.'/site/'.$GLOBALS["mod"].'/tpl';
        if(isset($_SESSION["display"]) && $_SESSION["display"]=="mobi"){
		    $this->template_dir = SITE_PATH.'/site/'.$GLOBALS["mod"].'/tpl/mobi';	
		}else{
		    $this->template_dir = SITE_PATH.'/site/'.$GLOBALS["mod"].'/tpl';
	    }
    }
}



SYS::varDump($seodata,__FILE__,__LINE__,'seodata');

if($mod==""){$mod="main";}

if(isset($mod) && $mod=='main'){
	$c_cont=Main::siteMain();
	}
if(isset($mod) && $mod=='shop'){
	$c_cont=Shop::siteShop();
	}
if(isset($mod) && $mod=='art'){
	$c_cont=Art::siteArt();
	}
if(isset($mod) && $mod=='cart'){
	$c_cont=Cart::siteCart();
	}
if(isset($mod) && $mod=='gallery'){
	$c_cont=Gallery::siteGallery();
	}
if(isset($mod) && $mod=='message'){
	$c_cont=Message::siteMessage();
	}
if(isset($mod) && $mod=='user'){
	$c_cont=User::siteUser();
	}
	
if(isset($mod) && $mod=='feedback'){
	$c_cont=Feedback::viewFeedbackModPage();
	}
if(isset($mod) && $mod=="search")
{
    $c_cont=Search::viewSearchModPage();
}


/*


if(isset($mod) && $mod=="ajax")
{
    if($param=="shoppingplus")
    {
        Shopping::shoppingPlus();
    }
    if($param=="shoppingminus")
    {
        Shopping::shoppingMinus();
    }
    if($param=="list-style"||$param=="grid-style")
    {
        $ds=explode("-",$param);
        $_SESSION["liststyle"]=$ds[0];
    }
}

//SYS::varDump($seolink,__FILE__,__LINE__,'seolink');

else if(isset($mod) && $mod=="article")
{
    $c_cont=Article::viewArticleModPage();
}
else if(isset($mod) && $mod=="page")
{
    $c_cont=Page::viewPageModPage();
}
else if(isset($mod) && $mod=="items")
{
    $c_cont=Items::viewItemsModPage();
}
else if(isset($mod) && $mod=="search")
{
    $c_cont=Search::viewSearchModPage();
}
else if(isset($mod) && $mod=="feedback")
{
    $c_cont=Feedback::viewFeedbackModPage();
}
else
{
    //$c_cont=Block::mainPage();
}
*/
/*
if(isset($ext) && $ext == 'ajax')
{
	echo $c_cont;
}
else
{
*/

//$main_menu=Menu::viewMenu();
//$tpl = new SiteTpl;

    //$main_menu=Menu::viewMenu();
    
/*  ------------- Потуги -------------- */    
   //$main_menu=Shop::siteShop(); // Через БД
//    $menu=INI::Get('site_main_menu'); // Через файл   
//    $main_menu=$menu["main_menu"];
   
//SYS::varDump($main_menu,__FILE__,__LINE__,'main_menu');
/*  -------------- /Потуги ------------- */  

    $tpl = new SiteTpl;

  $shop_menu=Shop::siteShopMenu();
  $shop_menu_mobi=Shop::siteShopMobiMenu();  
  
  SYS::varDump($shop_menu,__FILE__,__LINE__,' shop_menu'); 
    
$tpl->assign('shop_menu', $shop_menu);
$tpl->assign('shop_menu_mobi', $shop_menu_mobi);
$tpl->assign('c_cont', $c_cont["content"]);
$tpl->assign('meta', $c_cont["meta"]);
    
    
    
    
SYS::varDump($_REQUEST,__FILE__,__LINE__,'REQUEST'); 
SYS::varDump($_SESSION,__FILE__,__LINE__,'SESSION'); 

SYS::varSQLLog('MySQL log'); 

    
if(isset($mod) && $mod=="print")
{
//    echo $mod;
    SYS::varDump($_SESSION,__FILE__,__LINE__,'PRINT');
    $c_cont["content"]=$tpl->get("print");
}
else
{
//	Mobile_Detect //
//session_destroy();
//exit("Усе..");

    
	
	if(isset($_GET['display']) && $_GET['display'] !== "ajax"){
		$_SESSION["display"] = $_GET['display'];
	}
	
	
    if(isset($_GET['display']) && $_GET['display'] != "" && ($_GET['display'] == 'mobi' || $_GET['display'] == "full")){	
	$linka = explode('?',PAGE_URL);
	header("Location: ".$linka[0]."");
	}

//var_dump($_SESSION);	
//	/Mobile_Detect //
	if($_GET["display"]!="ajax"){
		if($_SESSION["display"]=="mobi"){
        $tpl->display('mobi');	
        }else{
        $tpl->display('index');	        
        }	
	}else{
	    echo $c_cont["content"];
    }
}
    unset($main_menu);
    unset($tpl);
//}
?>

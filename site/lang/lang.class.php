<?php
$seolink=$_SERVER['REQUEST_URI'];
if(isset($seolink))
{
    $seodata = explode("/",$seolink);
    $mod = $GLOBALS["mod"] = $seodata[1];
}
//*********** Языки и еже с ними *********//
//echo $_SESSION['lang'];
//unset($_SESSION['lang']);
define('LANG_DEFAULT', Lang::getDefaultSiteLang()); //язык сайта по умолчанию;
//$_SESSION['lang'] = LANG_DEFAULT;
//if(Setting::setSetting("multi_lang")) // Если на сайте разрешена мультиязычность
//{
     $site_langs = Lang::getSiteLangs();  // Получаем доступные языки   
     
     if($site_langs !== NULL)
     {   
         foreach($site_langs as $key=>$val)
         {   
             if(!$_SESSION['lang']) // Если языки еще не переключались, устанавливаем язык по умолчанию
             {
                 $_SESSION['lang'] = LANG_DEFAULT;  // Загоняем дефаултный язык в сессию 
             }
             else
             {
                  if($mod == $val['lang'])  // Если юзер переключает язык
                 {   
                     Lang::swichLang($val['lang']);  // Загоняем нужный язык в сессию
                 } 
             }
         }
     } 
//}  
//*********** /Языки и еже с ними *********//
class Lang 
{
     static function getDefaultSiteLang()
     {
         $db = new mysql;
         
         $from="`cfg_lang`";
         $where="`enable`='1' AND `default` = '1'";
         $row = $db->origSelectSQL("", $from, $where, "", "");
         
         $lang_default = $row['0']['lang'];
         return $lang_default;
     }
    
//     static function getDefaultSiteLang(){
//         $db = new DB;
//         
//         $row = DB::run("SELECT * FROM `cfg_lang` WHERE `enable`='1' AND `default` = '1'")->fetch();
//  
//         $lang_default = $row['lang'];
//         return $lang_default;
//     }
    
     static function getSiteLangs()
     {
         $db = new mysql;
         
         $from="`cfg_lang`";
         $where="`enable`='1'";
         $site_langs = $db->origSelectSQL("", $from, $where, "", "");
         
         return $site_langs;
     }
    
//     static function getSiteLangs()
//     {
//         $db = new DB;
//         
//         $site_langs = DB::run("SELECT * FROM `cfg_lang` WHERE `enable`='1'")->fetchAll(PDO::FETCH_KEY_PAIR);
//         
//         return $site_langs;
//     }
    
    static function getAllSiteLangs()
    {
        $db = new mysql;
        
        $from="`cfg_lang`";
        $where="1=1";
        $all_site_langs = $db->origSelectSQL("", $from, $where, "", "");
        
        return $all_site_langs;
    }
    
    static function swichLang($lang)
    {
        $_SESSION['lang'] = $lang;
        header("Location: ".$_SERVER['HTTP_REFERER']."");    
        
        return  $_SESSION['lang'];
    }
}

?>

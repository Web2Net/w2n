<?php
$seolink=$_SERVER['REQUEST_URI'];
if(isset($seolink)){
    $seodata = explode("/",$seolink);
    $mod = $GLOBALS["mod"] = $seodata[1];
}
//*********** Языки и еже с ними *********//
//echo $_SESSION['lang'];
//unset($_SESSION['lang']);
define('LANG_DEFAULT', Lang::getDefaultSiteLang()); //язык сайта по умолчанию;

//
//if(Setting::setSetting("multi_lang")) // Если на сайте разрешена мультиязычность
//{
     $site_langs = Lang::getSiteLangs();  // Получаем доступные языки   

     if($site_langs !== NULL){   
         foreach($site_langs as $key=>$val){   
             if(!$_SESSION['lang']){ // Если языки еще не переключались, устанавливаем язык по умолчанию
                 $_SESSION['lang'] = LANG_DEFAULT;  // Загоняем дефаултный язык в сессию 
             }
             else{
                  if($mod == $val['lang']){  // Если юзер переключает язык
                     Lang::swichLang($val['lang']);  // Загоняем нужный язык в сессию
                 } 
             }
         }
     } 
//}
// else{
//     $_SESSION['lang'] = LANG_DEFAULT;
// }
//*********** /Языки и еже с ними *********//
class Lang 
{

     static function getDefaultSiteLang(){  //язык сайта по умолчанию;
         $e = "1";
         $d = "1";
         
         $db = new SafeMySQL();
         $lang_default = $db->getOne('SELECT lang FROM `cfg_lang` WHERE `enable`=?s AND `default`=?s', $e,$d);

         return $lang_default;
     }
    
    
     static function getSiteLangs(){   // Получаем доступные языки
         $e = "1";
         
         $db = new SafeMySQL();
         $site_langs = $db->getInd('caption','SELECT * FROM `cfg_lang` WHERE `enable`=?s', $e);
         
         return $site_langs;
     }
    
    static function getAllSiteLangs(){ // Получить полный список языков
         $db = new SafeMySQL();
         $all_site_langs = $db->getInd('caption','SELECT * FROM `cfg_lang`');
        
        return $all_site_langs;
    }
    
    static function swichLang($lang){ // Переключалка языков.  
    // Нужно добавить проверку $lang..
        $_SESSION['lang'] = $lang;
        header("Location: ".$_SERVER['HTTP_REFERER']."");    
        
        return  $_SESSION['lang'];
    }
}

?>

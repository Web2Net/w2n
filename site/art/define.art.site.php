<?php
if($_SESSION['lang']=="en"){
    define('ART_SITE_MOD_NAME','Information');
    
    define('ART_AUTHOR','Author');
    
    
}
elseif($_SESSION['lang']=="ru"){
    define('ART_SITE_MOD_NAME','Информация');
    
    define('ART_AUTHOR','Автор');
    
   
}else{
	define('ART_SITE_MOD_NAME','Інформація');
	
	define('ART_AUTHOR','Автор');
	
	
}
?>

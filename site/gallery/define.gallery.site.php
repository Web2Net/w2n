<?php
if($_SESSION['lang']=="en"){
    define('GALLERY_SITE_MOD_NAME','Gallery');
    
    
}
elseif($_SESSION['lang']=="ru"){
    define('GALLERY_SITE_MOD_NAME','Галерея');
    
      
}else{
	define('GALLERY_SITE_MOD_NAME','Галерея');
	
	
}
?>

<?php
	
include_once ("cfg.php");
include_once ("error.class.php");
include ("sys.util.php");
include ("ini.util.php");		
include ("time.util.php");
include ("text.util.php");
include ("gd.util.php");
//include_once ("mysql.class.php");
include_once ("db.class.php");
include ("template.class.php");
include ("email.class.php");


class SiteTpl extends Tpl
{
	function SiteTpl ()
	{
/*		if(isset($_SESSION['bro_width']) && $_SESSION['bro_width'] < '1000'){
		    $this->template_dir = SITE_PATH.'/site/tpl/mobi';	
		}else{
		    $this->template_dir = SITE_PATH.'/site/tpl';
	    }
*/
$this->template_dir = SITE_PATH.'/site/tpl';
	}
}

class AdmTpl extends Tpl
{
	function AdmTpl ()
	{
		$this->template_dir = SITE_PATH.'/cms/tpl';
	}
}

//SYS::varDump($GLOBALS,__FILE__,__LINE__,"GLOBALS");
//new errorHandler();

// $level="9";
// $db = new SafeMySQL();
// $data = $db->getInd('login','SELECT login,password FROM user_item WHERE level=?s', $level);
// echo "<pre>";
// var_dump($data);
// echo "</pre>";
?>

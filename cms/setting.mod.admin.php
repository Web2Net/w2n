<?php
class Setting
{
    function admSetting()
    {
		$table = "shop_setting"; 
		 
        $tpl=new AdmTpl;	
SYS::varDump($_REQUEST,__FILE__,__LINE__,"EVALsetting");		
        foreach ($_REQUEST as $key=>$val)
        {
            $str="$".$key."=\"".$val."\";";
            eval($str);
        }

        if($com=="kurs_usd" || $com=="min_summa_dostavki") // Меняем курс валюты или минимальную сумму доставки
        {
        	$query = "UPDATE `{$table}` SET value='{$_POST[$com]}' WHERE `description` = '{$com}';";
		}
        $res = mysql_query($query);
		mysql::queryError($res,$query);
Auth::userDo($query);  // Запись того, что юзер делает       
        $shop_setting = mandatoryShopSetting::setSetting();
SYS::varDump($shop_setting,__FILE__,__LINE__,"shop_setting");        

        INI::SetXXL($shop_setting,"shop_setting"); 
        header( 'Location: '.$_SERVER['HTTP_REFERER'].'', true, 303 );    
    }




    

}
?>

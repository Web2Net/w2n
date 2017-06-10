<?
class Price
{
    static function admPrice(){
        $tpl = new Tpl;
SYS::varDump($_REQUEST,__FILE__,__LINE__,"EVAL_Price");        
        foreach ($_REQUEST as $key=>$val)
        {
            $str="$".$key."=\$val;";
            eval($str);
        }
        
//        Price::dumpTable(TABLE_ITEMS); // Создаем копию таблицы
//        Price::backupAllTables(); // Создаем копию БД

        if($com == "upload_erc")
        {
            $postavschik = "erc";

            $file = SITE_PATH."/price/price_{$postavschik}.csv"; // прайс
            Price::decodeFile($file); // Декодим
            Price::checkFile($file); // Удаляем повторяющиеся строки из файла
            Mysql::deleteAllFields(TABLE_TEMP_ITEMS); // Удаление всех записей из таблицы
        Price_erc::createTempTable(TABLE_TEMP_ITEMS,$file,$postavschik);  // Записываем данные из файла во временную таблицу
            Price::deleteSomeFilds(TABLE_TEMP_ITEMS); // Удаление из таблицы записей с некоторыми пустыми полями
        $img_arr = Price_erc::getNewImgItemsFromTempTable(TABLE_ITEMS,TABLE_TEMP_ITEMS); // Получение новых изо товаров из нового прайса          
        Price_erc::updateImgFromArray($img_arr,"../product-image/");   // Закачиваем новые изо        
            Price::setStatysArch(TABLE_ITEMS,$postavschik); // Переводим весть товар поставщика в статус "архивный"
            Price::updateExistenceItems(TABLE_ITEMS,TABLE_TEMP_ITEMS,$postavschik); // Перезаписываем товар, который уже существует в TABLE_ITEMS из TABLE_TEMP_ITEMS
            Price::insNewItems(TABLE_ITEMS,TABLE_TEMP_ITEMS,$postavschik); // Добавляем новый товар из временной таблицы (из TABLE_TEMP_ITEMS в TABLE_ITEMS)
            Price::deleteSomeFilds(TABLE_ITEMS);  // Удаление из таблицы записей с некоторыми пустыми полями

            $c_cont=$tpl->get("price-uploaded"); 
        }
        elseif($com == "upload_mti")
        {
            $postavschik = "mti";
	        
	        $file = SITE_PATH."/price/price_{$postavschik}.csv"; // прайс
            Price::decodeFile($file); // Декодим
            Price::checkFile($file); // Удаляем повторяющиеся строки из файла
            Mysql::deleteAllFields(TABLE_TEMP_ITEMS); // Удаление всех записей из таблицы
        Price_mti::createTempTable(TABLE_TEMP_ITEMS,$file,$postavschik);  // Записываем данные из файла во временную таблицу
            Price::deleteSomeFilds(TABLE_TEMP_ITEMS); // Удаление из таблицы записей с некоторыми пустыми полями
        
            Price::setStatysArch(TABLE_ITEMS,$postavschik); // Переводим весть товар поставщика в статус "архивный"
            Price::updateExistenceItems(TABLE_ITEMS,TABLE_TEMP_ITEMS,$postavschik); // Перезаписываем товар, который уже существует в TABLE_ITEMS из TABLE_TEMP_ITEMS
            Price::insNewItems(TABLE_ITEMS,TABLE_TEMP_ITEMS,$postavschik); // Добавляем новый товар из временной таблицы (из TABLE_TEMP_ITEMS в TABLE_ITEMS)
            Price::deleteSomeFilds(TABLE_ITEMS);  // Удаление из таблицы записей с некоторыми пустыми полями
            
            $c_cont=$tpl->get("price-uploaded"); 
        }
        elseif($com == "upload_mkr")
        {
            $postavschik = "mkr";

            $file = SITE_PATH."/price/price_{$postavschik}.csv"; // прайс
            Price::decodeFile($file); // Декодим
            Price::checkFile($file); // Удаляем повторяющиеся строки из файла
            Mysql::deleteAllFields(TABLE_TEMP_ITEMS); // Удаление всех записей из таблицы
//        Price_erc::createTempTable(TABLE_TEMP_ITEMS,$file,$postavschik);  // Записываем данные из файла во временную таблицу
            Price::deleteSomeFilds(TABLE_TEMP_ITEMS); // Удаление из таблицы записей с некоторыми пустыми полями
     
            Price::setStatysArch(TABLE_ITEMS,$postavschik); // Переводим весть товар поставщика в статус "архивный"
            Price::updateExistenceItems(TABLE_ITEMS,TABLE_TEMP_ITEMS,$postavschik); // Перезаписываем товар, который уже существует в TABLE_ITEMS из TABLE_TEMP_ITEMS
            Price::insNewItems(TABLE_ITEMS,TABLE_TEMP_ITEMS,$postavschik); // Добавляем новый товар из временной таблицы (из TABLE_TEMP_ITEMS в TABLE_ITEMS)
            Price::deleteSomeFilds(TABLE_ITEMS);  // Удаление из таблицы записей с некоторыми пустыми полями

            $c_cont=$tpl->get("price-uploaded"); 
        }
        elseif($com == "upload_dtr")
        {
            $postavschik = "dtr";
            $file = SITE_URL."/price/price_dtr.csv"; // прайс
            Price::decodeFile($file); // Декодим
            $file_category = Price_dtr::getFileCategory($file); // выделяем название категории
            $file_dtr = Price_dtr::preparationFileToFileByCategory($file,$file_category,$postavschik); //создаем свой файл с нужными полями и т.д.
	    
	    Price::updateAllFields($postavschik,$file_category); // Изменение ВСЕ полей "наличие товара" во ВСЕЙ таблице на "arch" (архивный)
            $change_price = Price_dtr::changeRecordsInDB($file_dtr,$postavschik);  // перезаписываем БД
            
            $c_cont=$tpl->get("price-uploaded");
        }
        elseif($com == "upload_mti")
        {
            $postavschik = "mti";
	        // $old_price = Price_mti::getOldKodFromDB($postavschik); // получаем все уникальные поля из таблицы товаров

            $file = SITE_URL."/price/price_mti.csv"; // прайс
            Price::decodeFile($file); // Декодим


            $file_category = Price_mti::getFileCategory($file); // выделяем название категории
            $file_mti = Price_mti::preparationFileToFileByCategory($file,$file_category,$postavschik); //создаем свой файл с нужными полями и т.д.
            Price::updateAllFields($postavschik,$file_category); // Изменение ВСЕ полей "наличие товара" во ВСЕЙ таблице на "arch" (архивный)
            $change_price = Price_mti::changeRecordsInDB($file_mti,$postavschik);  // перезаписываем БД
            
            $c_cont=$tpl->get("price-uploaded"); 
        }
        elseif($com == "upload_KancMaster")
        {
            $postavschik = "km";
            $file = SITE_URL."/price/price_km.csv"; // прайс
            Price::decodeFile($file); // Декодим
//$old_price = Price::getOldKodFromDB($postavschik); // получаем все уникальные поля из таблицы товаров
            $file_kancmaster = Price::preparationFileToFileByCategory_KM($file);
            $change_price = Price::changeRecordsInDB_KM($file,$postavschik);
//echo "Здается мине, что прайс.csv не в порядке...";
        }
        else
        {
            $c_cont=$tpl->get("price");
        }
        return $c_cont;
    }
    
    static function decodeFile($file){
    
        header('Content-type: text/html; charset=utf-8');
        if(!setlocale(LC_ALL, 'ru_RU.utf8')) setlocale(LC_ALL, 'en_US.utf8');
        //if(setlocale(LC_ALL, 0) == 'C') die('Не поддерживается ни одна из перечисленных локалей (ru_RU.utf8, en_US.utf8)');

        $handle = fopen('php://memory', 'w+');
        fwrite($handle, iconv('windows-1251', 'utf-8', file_get_contents($file)));
        rewind($handle);
        //while (($row = @fgetcsv($handle, 1024, ';')) !== false) //print_r($row);
        fclose($handle);        
    }
    static function checkFile($file){ 
    
        	$sFile = $file;
            file_put_contents($sFile, array_unique(file($sFile)));
    }	
    static function deleteSomeFilds($table){ // Удаление пустых, нулевых и "битых" строк в таблице
    
        $query = "DELETE FROM `{$table}` WHERE `1Cid` = '' OR `price_diler` = '0.00' OR `price_roznica` = '0.00'"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
    }
    static function setStatysArch($table,$postavschik){  // Переводим весть товар поставщика в статус "архивный"
        $query = "UPDATE `{$table}` SET `nalichie`='arch' WHERE `postavschik`='{$postavschik}'";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
    }
    static function updateExistenceItems($table_1, $table_2, $postavshik){  // Перезаписываем товар, который уже существует в TABLE_ITEMS из TABLE_TEMP_ITEMS
		$query = "UPDATE {$table_1},{$table_2} SET 
		{$table_1}.price_diler={$table_2}.price_diler, 
		{$table_1}.price_roznica={$table_2}.price_roznica,
		{$table_1}.nalichie={$table_2}.nalichie,
		{$table_1}.connect={$table_2}.connect,
		{$table_1}.last_update={$table_2}.last_update 
		WHERE {$table_1}.1Cid={$table_2}.1Cid"; 
		$res = mysql_query($query);
		Mysql::queryError($res,$query);
	}
	static function insNewItems($table_1, $table_2, $postavshik){  // Добавляем новый товар из временной таблицы
		
		$query = "INSERT INTO {$table_1} (
		         `1Cid`,
		         `category`,
		         `subcategory`,
		         `brand`,
		         `caption_short`,
		         `caption_full`,
		         `description_short`,
		         `description_full`,
		         `note_1`,
		         `note_2`,
		         `note_3`,
		         `note_4`,
		         `note_5`,
		         `img_small`,
		         `img`,
		         `price_diler`,
		         `price_roznica`,
		         `garantiya`,
		         `connect`,
		         `meta_t`,
		         `meta_k`,
		         `meta_d`,
		         `postavschik`,
		         `nalichie`,
		         `last_update`,
		         `ddp`,
		         `date_create`) 
		          SELECT 
		          {$table_2}.`1Cid`,
		          {$table_2}.`category`,
		          {$table_2}.`subcategory`,
		          {$table_2}.`brand`,
		          {$table_2}.`caption_short`,
		          {$table_2}.`caption_full`,
		          {$table_2}.`description_short`,
		          {$table_2}.`description_full`,
		          {$table_2}.`note_1`,
		          {$table_2}.`note_2`,
		          {$table_2}.`note_3`,
		          {$table_2}.`note_4`,
		          {$table_2}.`note_5`,
		          {$table_2}.`img_small`,
		          {$table_2}.`img`,
		          {$table_2}.`price_diler`,
		          {$table_2}.`price_roznica`,
		          {$table_2}.`garantiya`,
		          {$table_2}.`connect`,
		          {$table_2}.`meta_t`,
		          {$table_2}.`meta_k`,
		          {$table_2}.`meta_d`,
		          {$table_2}.`postavschik`,
		          {$table_2}.`nalichie`,
		          {$table_2}.`last_update`,
		          {$table_2}.`ddp`,
		          {$table_2}.`last_update`
		          FROM {$table_2} LEFT JOIN {$table_1} ON {$table_1}.1Cid = {$table_2}.1Cid WHERE {$table_1}.1Cid IS NULL";
		$res = mysql_query($query);
		Mysql::queryError($res,$query);
	} 

    static function getPrice($postavschik,$price_rozn,$price_diler,$ddp){  // Добавляет к цене поставщика определенный % и формирует цену в зависимости от курса у.е., поставщика и прочих шняг
     
        if($postavschik == "erc")
        {
            if($ddp == "0")
            {
                if($price_diler > 0 AND $price_diler <= 50)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_0_50)*KURS_USD;   
                }
                elseif($price_diler > 50 AND $price_diler <= 100)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_50_100)*KURS_USD;   
                }
                elseif($price_diler > 100 AND $price_diler <= 200)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_100_200)*KURS_USD;   
                }
                elseif($price_diler > 200 AND $price_diler <= 500)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_200_500)*KURS_USD;   
                }
                elseif($price_diler > 500 AND $price_diler <= 1000)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_500_1000)*KURS_USD;   
                }
                elseif($price_diler > 1000)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_1000_)*KURS_USD;   
                }
                else
                {
                    $price_final = 0;   
                }
            }
            else
            {            
                if($price_diler > 0 AND $price_diler <= 700)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_0_50);   
                }
                elseif($price_diler > 700 AND $price_diler <= 1400)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_50_100);   
                }
                elseif($price_diler > 1400 AND $price_diler <= 2800)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_100_200);   
                }
                elseif($price_diler > 2800 AND $price_diler <= 7000)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_200_500);   
                }
                elseif($price_diler > 700 AND $price_diler <= 14000)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_500_1000);   
                }
                elseif($price_diler > 14000)
                {
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI_1000_);   
                }
                else
                {
                    $price_final = 0;   
                }  
            }

/*           
            $cena_x = $price_rozn/KURS_BEZN;
            if($cena_x > $price_diler) // грн
            {
                $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI)*KURS_USD;
                if($price_final < $price_rozn)
                {
                    $price_final = $price_rozn;
                }
            }
            else // у.е.
            {
                $price_final = ($price_rozn + $price_rozn/100*PROCENT_NADBAVKI)*KURS_USD;
            }
*/
            
        }
        elseif($postavschik == "mti")
        {
            $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI)*KURS_USD;
        }
        elseif($postavschik == "dtr")
        {
            $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI)*KURS_USD;
        }
        elseif($postavschik == "mkr")
        {
            $price_final = $price_rozn; //($price_rozn + $price_rozn/100*PROCENT_NADBAVKI)*KURS_USD;
        }
        else
        {
		    $price_final = $price_diler*KURS_USD;	
		}
//SYS::varDump($price_final,__FILE__,__LINE__,"price_final");
         return round($price_final,2);
         //return $price_final;
    }

    
///////////////////////////////////    
    
    static function backupAllTables()
    {
// Создание Бэкапа перед заливкой нового прайса
        $file=$_SERVER['DOCUMENT_ROOT']."/price/Dump_BD/dump_".date("Y-m-d_H-i").".sql";
        if(!file_exists($file))  //если файла нету... тогда
        {
            $fp = fopen($file, "w"); // создаем файл
            fclose ($fp);
        }
        mysql::backupTables($file);  // CООБВЕННО БЭКАПИМ
// /Создание Бэкапа перед заливкой нового прайса
    }

    static function updateAllFields($postavschik)
    {
        $query = "UPDATE `".TABLE_ITEMS."` SET `style`='arch', `volume`='arch' WHERE `postavschik`='{$postavschik}'";
        $res = mysql_query($query);
    }

    static function getOldKodFromDB($val)
    {
        $select="1Cid";
        $from="shop_product";
        $where = "`postavschik` = '{$val}'";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, "", "");
//SYS::varDump($row,__FILE__,__LINE__);
        return $row;
            
    }

    static function newFileAboutEmptyConnect($item_kod,$item_caption)
    {
	$folder = "/home/tov-sov/data/www/mkr.kiev.ua/price/stek/".date("Y_m_d");
	if(!file_exists($folder))
	{
            mkdir($folder, 0755);		    
	}
	$file_new = "{$folder}/new_items.html";
        if(!file_exists($file_new))
	{
            $fn = fopen($file_new, "w");		    
	}
        else
        {  
	    $fn = fopen($file_new, "a");
        }
        fwrite($fn, "<div style='border:1px solid #eee;padding:5px;'><a href='http://mkr.kiev.ua/cms/?mod=shop&com=product&prodid={$item_kod}' target='_blank'>{$item_kod}</a> - {$item_caption}</div><div style='height:5px'></div>");
        
        fclose ($fn);
    }


    
}

?>

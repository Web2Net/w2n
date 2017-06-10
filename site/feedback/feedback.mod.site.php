<?	
class Feedback
{
 	 
    function viewFeedbackModPage()
    {
	    foreach ($_REQUEST as $key=>$val)
        {
            // echo $key." - ".$val."<br />";
            $str="$".$key."=\$val;";
            eval($str);
        }                          

        $seodata=explode("/",$seolink);
        $mod=$seodata[0];  //echo $mod." - \$mod<br />";
        $rub=$seodata[1];  //echo $rub." - \$rub<br />";

        $tpl_art = new SiteTpl;    
        $tpl_art->assign('page', $page);
        
        $rub=urldecode($rub);

        $page["content"] = $tpl_art->get('feedback_sps');
        $page["meta"]["title"] = "Бумеранг - Обратная связь";
        $page["meta"]["description"] = "Бумеранг - Обратная связь";
        $page["meta"]["keywords"] = "Бумеранг - Обратная связь";
        $arr_value['type'] = "online";  
     
        $page["meta"]["some_meta"] = "";
        
        if(isset($_POST['feedback_online']))
        {
            foreach($_REQUEST as $key=>$val)
            {
                $var = explode("__",$key);
                if($var['0'] == "form")
                {
                    $val = Text::wordBreak($val,"20"); 
                    $arr_value[$var['1']] = Text::cutString($val); 
                }
            }

            
// Запись сообщения в БД           
            $db = new mysql;
            $table = "feedback"; 
            
            $arr_value['ip'] = $_SERVER['REMOTE_ADDR'];
            $arr_value['date'] = date("Y-m-d H:i");
//echo date("Y-m-d | H:i", $arr_value['date']);
            
            $db->insertSQL ($arr_value, $table);
///////////////////////////////////////  

// Запись сообщения в БД  (в таблицу к юзеру)
$table2="user_item"; // Таблица с данными юзера
$uniq_email = mysql::checkUniqRow($table2, "email", $arr_value['email']); // Проверка на существование email юзера в БД
if($uniq_email){ // если email юзер в БД есть - дописываем ему новуе сообщение 
// Выборка из БД всех сообщения юзера
$query = "SELECT * FROM {$table2} WHERE `email`='{$arr_value['email']}'"; 
$res = mysql_query($query);
    mysql::queryError($res,$query);
    while ($row = mysql_fetch_assoc($res))
    {
       $arr_value2['feedback_list'] = $row['feedback_list'];
    }
Sys::varDump($row,__FILE__,__LINE__,"FEEDBACK_LIST");    
// Добавляем к списку существующих сообщение новое в виде ДАТА || Сооющение и перевод строки (сколько строк, столько раз юзер что-то писал)
    $feedback_list = $arr_value['date']."||".$arr_value['mess']."\r\n".$arr_value2['feedback_list']; 
    $query = "UPDATE {$table2} SET `feedback_list`='{$feedback_list}' WHERE `email`='{$arr_value['email']}'"; 
    $res = mysql_query($query); 
    mysql::queryError($res,$query); 

}
else{ // если email юзера в БД нет - заносим данные юзера в БД 
$arr_value2['connect']=';7;'; // связь с табл. user_tag (Разовый покупатель)
$arr_value2['level']='0'; // Покупатель (к администрации магазина отношение не имеет)
$arr_value2['name']=Text::cutString($arr_value['name']); // Имя
$arr_value2['email']=Text::cutString($arr_value['email']); // Мыло
$arr_value2['feedback_list'] = $arr_value['date']."||".$arr_value['mess']; // Новая сообщение в виде ДАТА || СООБЩЕНИЕ
$arr_value2['phone']=Text::cutString($arr_value['phone']); // Телефон
$arr_value2['date']=date("Y-m-d H-i-s"); // Дата первого сообщения, она же дата будущей регистрации (Если юзер отправил сообщение, а со временем решил зарегистрироваться, то дата регистрации = дата первого сообщения и в Кабинет Клиента подтянет сообщения, которые он отправлял без регистрации (проверка по email))

$id = $db->insertSQL ($arr_value2, $table2);

}
         
            //$msg = Feedback::completeMessage($_POST); 
//Sys::varDump($msg);
//$ok = Feedback::sendOnline(); 
//var_dump($msg);


  $name_from = SITE_NAME;
  $email_from = EMAIL_SHOP;
  $name_to = trim(str_replace('"','&quot;',$_POST['form__name']));
//$email_to = trim($_POST['form__email']);
  $data_charset="UTF-8";
  $send_charset="UTF-8";
  $subject = "Новое сообщение ".SITE_NAME.". ".Time::formatMonth(date("Y-M-d H:i:s"))." ".date("H:i");
//$GLOBALS['z_id']=$id;
//$body=$tpl->get("cart-mail");

//Email::send_mime_mail($name_from,$email_from,$name_to,$email_to, $data_charset,  $send_charset, $subject, $body);

//$name_to = trim('Новый заказ');
//define('EMAIL_SHOP','toltecos@ukr.net');
$email_to = explode(",",trim(EMAIL_FEEDBACK));
$body=$tpl_art->get('feedback_mail');
/*
$body = "
Имя - {$_POST['form__name']}<br />\r\n
E-mail - {$email}<br />\r\n
Телефон - {$_POST['form__phone']}
<br /><br /><hr />
Сообщение:<br />\r\n".stripcslashes($txt->cut($_POST['form__mess']));
*/
if($email_to!=NULL){

    foreach($email_to as $key=>$val){
        Email::send_mime_mail($name_from,$email_from,$name_to,$val,$data_charset,$send_charset,$subject,$body);
    }

}
           
////////////////////////////////////
            $page["content"] = $tpl_art->get('feedback_sps');        
        }
        
        return $page;
    }
    
    function completeMessage($var)
    {    
          if(is_array($var))
          {   
              foreach($var as $key=>$val)
              { 
                  $ms = explode("__",$key);
                  if($ms['0'] == "form")
                  {
                      $msg[$ms['1']] = $val;  
                  }
              }
          }
          else
          {
              $msg = $var;
          }
          return $msg;
    }
 
    
    
    function sendOnline()             
    {
        //$charset = "windows-1251";
        $charset = "utf-8";
        //$charset = "KOI8-R";
        
        $my_email = EMAIL_FEEDBACK;
        $subject = "Письмо с сайта";
        
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        $txt = new Text;
        $email = $txt->cut($_POST['form__email']);
        $content = 
"
Имя - {$_POST['form__name']}<br />\r\n
E-mail - {$email}<br />\r\n
Телефон - {$_POST['form__phone']}
<br /><br /><hr />
Сообщение:<br />\r\n".stripcslashes($txt->cut($_POST['form__mess']));
                    
        //$content = iconv('UTF-8', 'Windows-1251', $content);

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($content, 70);
// Отправляем
        $send = mail($my_email, $subject, $message, $headers); 
        if($send)
        {
           //Sys::varDump($send); 
        }
        else
        {
            return false;
        }
        
        
    }
    
    function sendFeedback()             
    {
        //$charset = "windows-1251";
        $charset = "utf-8";
        //$charset = "KOI8-R";
        
        $my_email = EMAIL_BOSS;
        $subject = "Запись на прием";
        
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        $txt = new Text;
        $email = $txt->cut($_POST['form__email']);
        $content = "
IP - ".$_SERVER['REMOTE_ADDR']."<br />\r\n
Имя - {$_POST['form__name']}.<br />\n
Дата рождения - {$_POST['form__birth']}.<br />\n 
Адрес - {$_POST['form__address']}.<br />\n
e-mail - {$email}.<br />\n 
причина обращения - {$_POST['form__why']}.<br />\n 
телефон - {$_POST['form__tel']}.<br />\n 
желаемая дата - {$_POST['form__your_date']}.<br />\n 
желаемое время - {$_POST['form__your_time']}.<br />\n 
способ подтверждения заявки - {$_POST['form__method']}.<br />\n
Обращение<hr />"
.stripcslashes($txt->cut($_POST['form__message']));
                    
        //$content = iconv('UTF-8', 'Windows-1251', $content);

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($content, 70);
// Отправляем
        $send = mail($my_email, $subject, $message, $headers); 
        if($send)
        {
           //Sys::varDump($send); 
        }
        else
        {
            return false;
        }
        
        
    }
    
    function sendAdver()             
    {
        //$charset = "windows-1251";
        $charset = "utf-8";
        //$charset = "KOI8-R";
        
        $my_email = EMAIL_BOSS;
        $subject = "Заявка на рекламу";
        
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        $txt = new Text;
        $email = $txt->cut($_POST['form__email']);
        $content = "
IP - ".$_SERVER['REMOTE_ADDR']."<br />\r\n
Имя - {$_POST['form__name']}.<br />\n
Дата рождения - {$_POST['form__birth']}.<br />\n 
Адрес - {$_POST['form__address']}.<br />\n
e-mail - {$email}.<br />\n 
вид рекламы (строчная/блочная) - {$_POST['form__why']}.<br />\n 
телефон - {$_POST['form__tel']}.<br />\n 
период действия (от/до) - {$_POST['form__your_date']}.<br />\n 
период оплаты - {$_POST['form__your_time']}.<br />\n 
способ оплаты - {$_POST['form__method']}.<br />\n
текст рекламы/код банера<hr />"
.stripcslashes($txt->cut($_POST['form__message']));
                    
        //$content = iconv('UTF-8', 'Windows-1251', $content);

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($content, 70);
// Отправляем
        $send = mail($my_email, $subject, $message, $headers); 
        if($send)
        {
           //Sys::varDump($send); 
        }
        else
        {
            return false;
        }
        
        
    }
    
    function sendMail($msg)
    {
        $my_email = EMAIL_BOSS;
        $subject = SITE_URL;
        $txt = new Text;
        $email = $txt->cut($_POST['form__email']);
        $content = "
                   Имя - {$msg['name']}.<br />\n
                   Дата рождения - {$msg['birth']}.<br />\n 
                   Адрес - {$msg['address']}.<br />\n
                   e-mail - {$msg['email']}.<br />\n 
                   причина обращения - {$msg['why']}.<br />\n 
                   телефон - {$msg['tel']}.<br />\n 
                   желаемая дата - {$msg['your_date']}.<br />\n 
                   желаемое время - {$msg['your_time']}.<br />\n 
                   способ подтверждения заявки - {$msg['method']}.<br />\n
                   Обращение<hr />
                   {$msg['message']}.<br />\n  ";
        
        $EOL = "\r\n";
        $headers = "Content-Type: text/html; charset='".CHARSET."'{$EOL}";
        $headers .= "From: {$my_email}{$EOL}";
        $headers .= "Reply-To: {$my_email}{$EOL}";
        $headers .= "Return-Path: {$my_email}{$EOL}";
        $headers .= "Errors-To: {$my_email}{$EOL}";
        $headers .= "Disposition-Notification-To: {$my_email}{$EOL}{$EOL}";
        $header.="Subject: {$subject}";
        $header.="Content-type: text/html; charset='".CHARSET."'{$EOL}";
        $msg = "<HTML>{$EOL}";
        $msg .= "<HEAD>{$EOL}";
        $msg .= "</HEAD>{$EOL}";
        $msg .= "<BODY>{$EOL}";
        $msg .= $content;
        $msg .= "</BODY>{$EOL}";
        $msg .= "</HTML>";

        $send = mail(EMAIL_ADMIN, $subject, $msg, $headers);
        if($send)
        {
           //Sys::varDump($send); 
        }
        else
        {
            return false;
        }
        
        
    }
    
    function checkEmptyForm($val)
    {
         if($val == "")
         {
             $val = 0;
         }
         else
         {
             return trim($val);
         }
    }

}
?>

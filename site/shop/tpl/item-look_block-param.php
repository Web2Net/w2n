<?
$i=0;
$spec_where="article = '{$item_data['article']}' AND `show`='1' AND flagman!='1'";
$friend_list=Shop::itemListSpecial($spec_where);

$multi_param="";
if($friend_list){
	foreach($friend_list as $key=>$valf){
        $param_str=substr($valf['param_connect'],1,-1);
        $now2param=explode(";",$param_str);
        $param_code=str_replace(";","-",$valf['param_connect']);

echo "<script>item_paramcode2id['{$param_code}']={$valf['id']};</script>";

        $friend_list_id[$param_code]=$valf['id'];

        $friend_list_param[$now2param[0]]['p2'][]=$now2param[1];
        $friend_list_param[$now2param[0]]['itemid'][]=$valf['id'];

        $price_roznicaf = Price::getPrice($valf['postavschik'],$valf['price_roznica'],$valf['price_diler'],$valf['ddp']);
        $multi_param.=$valf['param_connect'];$paco[$valf['id']]=$valf['param_connect'];

        $param_connect_f=explode(";",substr($valf["param_connect"],1,-1));
        $code_r="";

        $param_item_l=Shop::paramItemData($param_connect_f[1]);
        $code_l=$param_item_l['value1'];
        unset($param_connect_f[1]);
        if($param_connect_f!=NULL){
			foreach($param_connect_f as $key=>$val){
                $param_item_r=Shop::paramItemData($val);
                $code_r.="-".$param_item_r['value1'];
            }
        }
?>
    <script>
	itemPrice[<?=$valf['id']?>]="<?if($price_roznicaf!=0){?><?=$price_roznicaf?> <font><?=CURRENCY?></font><?}else{?><?=SHOP_SITE_NOTE_ON_REQUEST?><?}?>";	
	itemCaption[<?=$valf['id']?>]="<?=trim(str_replace('"',"'",str_replace(array("\r\n", "\r", "\n"),'',$valf['caption'])))?>";
	itemDescShort[<?=$valf['id']?>]="<?=trim(str_replace('"',"'",str_replace(array("\r\n", "\r", "\n"),'',$valf['desc_short'])))?>";	
	itemDesc[<?=$valf['id']?>]="<?=trim(str_replace('"',"'",str_replace(array("\r\n", "\r", "\n"),'',$valf['desc_full'])))?>";		
        itemCode[<?=$valf['id']?>]="<?=$code_l?>-<?=$valf['article']?><?=$code_r?>";		
    </script>


<!--<?=$valf['id']?>-<?=$valf['caption']?>-<?=$valf['param_connect']?>-<?=$valf['p1']?><br />-->

<?$i++;}}?>
<?$multi_param=str_replace(";;",";",$multi_param);?>

<?if($friend_list_param){
    foreach($friend_list_param as $key=>$valz){?>
    <div id="param1_<?=$key?>" style="display:none;"><?=$key?>-
	    <ul class="param2">	
<script>
  var p_<?=$key?>=new Array();
  var itemid_<?=$key?>=new Array();	
</script>
<?if($valz['p2']){
    foreach($valz['p2'] as $keya=>$valy){?>
        <script>p_<?=$key?>[<?=$keya?>]='<?=$valy?>';</script>
	        <li><?=$valy?></li>	
    <?}}?>
	    </ul>
	    <ul class="itemid">
<?if($valz['itemid']){
    foreach($valz['itemid'] as $keyb=>$vali){?>
<script>itemid_<?=$key?>[<?=$keyb?>]=<?=$vali?>;</script>
	        <li><?=$vali?></li>	
<?}}?>
	    </ul>
<script>
friend_list_param[<?=$key?>]=p_<?=$key?>;
friend_list_id[<?=$key?>]=itemid_<?=$key?>;
</script>		
    </div>
<?}}?>	
	
<?
$now1param=explode(";",substr($item_data["param_connect"],1,-1));

$i=1;
$param_tag_con=explode(";",substr($item_data["p1"],1,-1));
if($param_tag_con){foreach($param_tag_con as $key=>$valpt){
$param_tag_data[$valpt]=Shop::paramTagData($valpt);
$param_item_list[$valpt]=Shop::paramItemList($valpt);
?>

    <div align="left" style="margin-top:7px;"><b style="color: black;"><?=$param_tag_data[$valpt]['desc_short']?></b></div>
    <div class="param" style="margin:12px 0px 20px 0px;vertical-align:top;" align="left" id="pnum_<?=$i?>">
        <table width="100%" cellpadding="0" cellspacing="0"><tr><td valign="top">
<?
if($param_item_list[$valpt]){foreach($param_item_list[$valpt] as $key=>$val){
if(strstr($multi_param,";{$val["id"]};")){
if(strstr($item_data['param_connect'],";{$val["id"]};")){$pa1[$val['id']]=' checked="checked"';}
?>
            <label class="tooltip yellow-tooltip" data-title="<?=$val['caption']?>" for="p1_<?=$val['id']?>" style="width: 35px;vertical-align:top;" id="label_<?=$val['id']?>" onClick="loadItem()">
                <input class="paraminput" style="display:none;" type="radio" id="p1_<?=$val['id']?>" name="p1[<?=$param_tag_data[substr($val["connect"],1,-1)]['id']?>]" value="<?=$val['id']?>"<?=$pa1[$val['id']]?>>
                <img id="p1_img_<?=$val['id']?>" src="/image/param/item/<?=$val['id']?>/1.png" style="margin:0px;cursor:pointer;" class="chekbo r5" />
			</label>
<?}}}?>
        </td></tr></table>
    </div>


<?
$i++;if($i>2)$i=1;}}
SYS::varDump($param_tag_data,__FILE__,__LINE__,'param_tag');
?>

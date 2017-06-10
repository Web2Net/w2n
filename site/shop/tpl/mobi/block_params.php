
<div style="height:10px;"></div>
<script>
var friend_list_param = new Array();
var friend_list_id = new Array();
var itemPrice = new Array();
var itemCaption = new Array();
var itemDescShort = new Array();
var itemDesc = new Array();
var itemCode = new Array();

var item_paramcode2id = new Array();
</script>
<?
$i=0;
$spec_where="article = '{$item_data['article']}' AND `show`='1' AND flagman!='1'";
$friend_list=Shop::itemListSpecial($spec_where);

$multi_param="";
if($friend_list){foreach($friend_list as $key=>$valf){?>
<?
$param_str=substr($valf['param_connect'],1,-1);
$now2param=explode(";",$param_str);
$param_code=str_replace(";","-",$valf['param_connect']);
?>
<script>
item_paramcode2id['<?=$param_code?>']=<?=$valf['id']?>;
</script>
<?
$friend_list_id[$param_code]=$valf['id'];

$friend_list_param[$now2param[0]]['p2'][]=$now2param[1];
$friend_list_param[$now2param[0]]['itemid'][]=$valf['id'];
?>
<?
$price_roznicaf = Price::getPrice($valf['postavschik'],$valf['price_roznica'],$valf['price_diler'],$valf['ddp']);
$multi_param.=$valf['param_connect'];$paco[$valf['id']]=$valf['param_connect'];

$param_connect_f=explode(";",substr($valf["param_connect"],1,-1));
$code_r="";

$param_item_l=Shop::paramItemData($param_connect_f[1]);
$code_l=$param_item_l['value1'];
unset($param_connect_f[1]);
if($param_connect_f!=NULL){foreach($param_connect_f as $key=>$val){
$param_item_r=Shop::paramItemData($val);
$code_r.="-".$param_item_r['value1'];
}}

?>
    <script>
	itemPrice[<?=$valf['id']?>]="<?if($price_roznicaf!=0){?><?=$price_roznicaf?> <font><?=CURRENCY?></font><?}else{?><?=SHOP_SITE_NOTE_ON_REQUEST?><?}?>";	
	itemCaption[<?=$valf['id']?>]="<?=trim(str_replace('"',"'",str_replace(array("\r\n", "\r", "\n"),'',$valf['caption'])))?>";
	itemDescShort[<?=$valf['id']?>]="<?=trim(str_replace('"',"'",str_replace(array("\r\n", "\r", "\n"),'',$valf['desc_short'])))?>";	
	itemDesc[<?=$valf['id']?>]="<?=trim(str_replace('"',"'",str_replace(array("\r\n", "\r", "\n"),'',$valf['desc_full'])))?>";		
    itemCode[<?=$valf['id']?>]="<?=$code_l?>-<?=$valf['article']?><?=$code_r?>";		
    </script>

<!--
<?=$valf['id']?>-<?=$valf['caption']?>-<?=$valf['param_connect']?>-<?=$valf['p1']?><br />
-->
<?$i++;}}?>
<?$multi_param=str_replace(";;",";",$multi_param);?>

<?if($friend_list_param){foreach($friend_list_param as $key=>$valz){?>
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


</td><td valign="top">
<h1><?=$item_data['caption']?></h1>
<!--
<div style="color: black;margin-bottom:7px;font-size:14px;">
<?//=NOTE_PACKING?>:
<span style=""><?//=$item_data["package"]?></span>
&nbsp;&nbsp;&nbsp;
<?//=NOTE_KOD?>:
<?
$param_connectus=explode(";",substr($item_data["param_connect"],1,-1));

$param_item_r=Shop::paramItemData($param_connectus[0]);
$param_item_l=Shop::paramItemData($param_connectus[1]);
?>
<span style="" id="article"><?=$param_item_l['value1']!=''?$param_item_l['value1'].'-':''?><?=$item_data["article"]?><?=$param_item_r['value1']!=''?'-'.$param_item_r['value1']:''?></span>
</div>
-->
<div class="desc3" style="color: black;margin-bottom:25px;">
<!--  <div style="color: black;margin-bottom:12px;" id="itemdescshort"><?//=$item_data['desc_short']?></div>  -->

<div style="height:5px;"></div>
<div align="left">
<?
//$param_con=explode(";",substr($multi_param,1,-1));
//if($param_con){foreach($param_con as $key=>$val){
//$param_item_data[$val]=Shop::paramItemData($val);
//}}
?>
    <div id="debug" style="display:none;"></div>
<?
$now1param=explode(";",substr($item_data["param_connect"],1,-1));

$i=1;
$param_tag_con=explode(";",substr($item_data["p1"],1,-1));
if($param_tag_con){foreach($param_tag_con as $key=>$valpt){
$param_tag_data[$valpt]=Shop::paramTagData($valpt);
$param_item_list[$valpt]=Shop::paramItemList($valpt);
?>

    <div align="center" class="desc1"><?=$param_tag_data[$valpt]['desc_short']?></div>
    <div class="param" style="margin:12px 0px 20px 0px;vertical-align:top;text-align:center" id="pnum_<?=$i?>">
        <table width="100%" cellpadding="0" cellspacing="0"><tr><td valign="top">
      
<script>
function nowItem(id){
$("#debug").html("Item = "+id+"<br>");
$("#itemcaption").html(itemCaption[id]);
if(itemDescShort[id]!=""){$("#itemdescshort").html(itemDescShort[id]);}else{$("#itemdescshort").html(itemDescShort['default']);}
if(itemDesc[id]!=""){$("#itemdesc").html(itemDesc[id]);}else{$("#itemdesc").html(itemDesc['default']);}
$("#article").html(itemCode[id]);

$("#prodimg1").error(function() {
    $("#prodimg1").attr("src","/design/img/noimage_740x480.png");
})
.attr("src","/image/shop/item/"+id+"/1.png");
  
$("#prodimg2").error(function() {
    $(".wrap_item_look.item_look.prodimg2").hide();
})
.attr("src","/image/shop/item/"+id+"/2.png");
$(".wrap_item_look.item_look.prodimg2").show();
$("#aprodimg2").show();
 
$("#prodimg3").error(function() { 
    $(".wrap_item_look.item_look.prodimg3").hide();
})
.attr("src","/image/shop/item/"+id+"/3.png");
$(".wrap_item_look.item_look.prodimg3").show();
$("#aprodimg3").show();

$("#prodimg4").error(function() {
    $(".wrap_item_look.item_look.prodimg4").hide();
})
.attr("src","/image/shop/item/"+id+"/4.png");
$(".wrap_item_look.item_look.prodimg4").show();
$("#aprodimg4").show();

$("#prodimg5").error(function() {
    $(".wrap_item_look.item_look.prodimg5").hide();
})
.attr("src","/image/shop/item/"+id+"/5.png");
$(".wrap_item_look.item_look.prodimg5").show();
$("#aprodimg5").show();

$("#itemprice").html(itemPrice[id]);
$("#itemprice2").html(itemPrice[id]);
$("#item").attr("value",id);

}

function loadItem(){
var paramcode = "-";
$("input:checked").each(function() {
paramcode += "" + this.value + "-";
});
//alert(item_paramcode2id[paramcode]);
nowItem(item_paramcode2id[paramcode]);
}

function param1show(id){
//alert(friend_list_id[id]);
nowItem(friend_list_id[id]);
}

function param2show(id){
//$("#pnum_2 img").css({opacity:0.2});
//$("#pnum_2 img").css("cursor","default");
//$("#pnum_2 input").remove();
$("#debug").html(" ");
var friend_list=friend_list_param[id];
var friend_id=friend_list_id[id];
for (var key in friend_list) { 
    var val = friend_list[key];
    //if(val.indexOf(id)!== -1){
    $("#p1_img_"+val+"").css({opacity:1});
    $("#p1_img_"+val+"").css("cursor","pointer"); 
    $("#label_"+val+"").prepend('<input style="display:none;" type="radio" id="p1_'+val+'" name="p2" value="'+friend_id[key]+'" onClick="javascript:nowItem('+friend_id[key]+');">');   
    $("#debug").append("OK "+friend_id[key]+" ");

    //alert (key+' = '+val); 
    //}
} 
}
/*
$(document).ready(function() {
if($("#aprodimg2").attr("href")=="/design/img/spacer.gif"){
$("#aprodimg2").hide();
$("#aprodimg2").attr("rel","");
 }
 if($("#aprodimg3").attr("href")=="/design/img/spacer.gif"){
 $("#aprodimg3").hide();
 $("#aprodimg3").attr("rel","");
 }
 if($("#aprodimg4").attr("href")=="/design/img/spacer.gif"){
 $("#aprodimg4").hide();
 $("#aprodimg4").attr("rel","");
 }
 if($("#aprodimg5").attr("href")=="/design/img/spacer.gif"){
 $("#aprodimg5").hide();
$("#aprodimg5").attr("rel","");
 }
});
*/

</script> 
<?
if($param_item_list[$valpt]){foreach($param_item_list[$valpt] as $key=>$val){
if(strstr($multi_param,";{$val["id"]};")){
if(strstr($item_data['param_connect'],";{$val["id"]};")){$pa1[$val['id']]=' checked="checked"';}
?>
<!--
<script>
$(document).ready(function() {
    $("#label_<?=$val['id']?>").click(function(){ 
//alert("AAAAAAAAAAAAAAAA");
	    var paramcode = "-";
        $("input:checked").each(function() {
            paramcode += "" + this.value + "-";
        });
    });
});
</script>
-->
<label class="tooltip yellow-tooltip" data-title="<?=$val['caption']?>" for="p1_<?=$val['id']?>" style="width:35px;vertical-align:top;" id="label_<?=$val['id']?>" onClick="loadItem()">
<input class="paraminput" style="display:none;" type="radio" id="p1_<?=$val['id']?>" name="p1[<?=$param_tag_data[substr($val["connect"],1,-1)]['id']?>]" value="<?=$val['id']?>"<?=$pa1[$val['id']]?>>
<img id="p1_img_<?=$val['id']?>" src="/image/param/item/<?=$val['id']?>/1.png" style="margin:0px;cursor:pointer;width:125px;" class="chekbo r20" /></label>
<?}}}?>
</td></tr></table>
</div>

<?
$i++;if($i>2)$i=1;}}
?>
</div>
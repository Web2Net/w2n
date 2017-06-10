<script type="text/javascript">
$(document).ready(function(){
$("#cart, #cart2").load('/cart/incart/?display=ajax');

});


function inCart(){
var item=$("#item").attr("value")+'/'+$("#hm").attr("value");
//alert(item);
$("#cart, #cart2").load('/cart/incart/'+item+'?display=ajax');
var id=$("#item").attr("value");
//alert("#cartButton_"+id);
$("#cartButton_"+id+" input").hide();
$("#cartButton_"+id+" div").show();
}

function inCart2(id,hm){
var item=id+'/'+hm;
//alert(item);
$("#cart, #cart2").load('/cart/incart/'+item+'?display=ajax');
//alert(item);
$("#cartButton_"+id+" input").hide();
$("#cartButton_"+id+" div").show();
}

function inCartBuy(id,hm){
var vhm=$("#vhm_"+id).attr("value");
//alert(vhm);
vhm=parseInt(vhm)+parseInt(hm);

if(vhm>0){
//var Boo=document.getElementById("cart_"+id);
//Boo.value=parseInt(vhm);
//$("#cart_"+id).attr("value",vhm);
$("#cart_"+id).val(vhm);
var price=$("#buyprice_"+id).val();
var fprice=parseFloat(price)*parseInt(vhm);
var fprice2=fprice.toFixed(2);
var price_arr=fprice2.split('.');
fprice2=price_arr[0]+".<font>"+price_arr[1]+"</font>";
if(fprice==0){fprice2='По запросу';}
$("#fullprice_"+id).html(fprice2);

$("#cart, #cart2").load('/cart/incart/'+id+'/'+hm+'?display=ajax');

}}

function inCartDel(id){
var chu=$("#cart, #cart2").load('/cart/incart/'+id+'/del?display=ajax');

$("#cartItem_"+id).remove();
var cc=$("#shoppingcount").val();
//alert(cc);
if(cc<2){
$("#shopping").html('<div class="caption"><?=NOTE_CART_IS_EMPTY?><br /><br /><img src="/design/img/cart_is_empty.png" /></div>');
}
}

function inCartBuy2(id,hm){
if (hm<1) {hm=1;}
if (hm>999) {hm=999;}
var vhm=$("#vhm_"+id).attr("value");
var hmn=-1*parseInt(vhm);

if(hm>0){
$("#cart_"+id).val(hm);

var price=$("#buyprice_"+id).val();
var fprice=parseFloat(price)*parseInt(hm);
var fprice2=fprice.toFixed(2);
var price_arr=fprice2.split('.');
fprice2=price_arr[0]+".<font>"+price_arr[1]+"</font>";
if(fprice==0){fprice2='По запросу';}
$("#fullprice_"+id).html(fprice2);

$("#cart, #cart2").load('/cart/incart/'+id+'/'+hmn+'?display=ajax');
$("#cart, #cart2").load('/cart/incart/'+id+'/'+hm+'?display=ajax');
}
}
</script>

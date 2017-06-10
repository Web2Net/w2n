var friend_list_param = new Array();
var friend_list_id = new Array();
var itemPrice = new Array();
var itemCaption = new Array();
var itemDescShort = new Array();
var itemDesc = new Array();
var itemCode = new Array();

var item_paramcode2id = new Array();

function seeFoto(num,fotourl){
var sf=$("#prodimg"+num).attr("src");
if(num==1){
fotourlm = sf.replace(/\/[0-9]m.png/,"/1m.png");
//alert(fotourlm);
}else{
fotourlm = sf.replace("s.png","m.png");
}
$("#prodimg1").attr("src",fotourlm);

}

function nowItem(id){
$("#debug").html("Item = "+id+"<br>");
$("#itemcaption").html(itemCaption[id]);
if(itemDescShort[id]!=""){$("#itemdescshort").html(itemDescShort[id]);}else{$("#itemdescshort").html(itemDescShort['default']);}
if(itemDesc[id]!=""){$("#itemdesc").html(itemDesc[id]);}else{$("#itemdesc").html(itemDesc['default']);}
$("#article").html(itemCode[id]);

$("#prodimg1")
  .error(function() {
    $("#prodimg1").attr("src","/design/img/noimage_740x480.png");
  })
  .attr("src","/image/shop/item/"+id+"/1m.png");
  
$("#aprodimg1").attr("href","/image/shop/item/"+id+"/1.png");
$("#aprodimg1").attr("rel","fbox-gallery-"+id+"");

$("#prodimg2")
  .error(function() {
$("#prodimg2").attr("src","/design/img/spacer.gif");
$("#aprodimg2").hide();
$("#aprodimg2").attr("rel","");

  //$("#prodimg2").attr("src","/design/img/spacer.gif");
  })
  .attr("src","/image/shop/item/"+id+"/2s.png");

$("#aprodimg2").attr("href","/image/shop/item/"+id+"/2.png");
$("#aprodimg2").attr("rel","fbox-gallery-"+id+"");
$("#aprodimg2").show();
 
$("#prodimg3")
  .error(function() { 
$("#prodimg3").attr("src","/design/img/spacer.gif");
$("#aprodimg3").hide();
$("#aprodimg3").attr("rel","");

  })
  .attr("src","/image/shop/item/"+id+"/3s.png");

$("#aprodimg3").attr("href","/image/shop/item/"+id+"/3.png");
$("#aprodimg3").attr("rel","fbox-gallery-"+id+"");
$("#aprodimg3").show();

$("#prodimg4")
  .error(function() {
$("#prodimg4").attr("src","/design/img/spacer.gif");
$("#aprodimg4").hide();
$("#aprodimg4").attr("rel","");

  })
  .attr("src","/image/shop/item/"+id+"/4s.png");

$("#aprodimg4").attr("href","/image/shop/item/"+id+"/4.png");
$("#aprodimg4").attr("rel","fbox-gallery-"+id+"");
$("#aprodimg4").show();

$("#prodimg5")
  .error(function() {
$("#prodimg5").attr("src","/design/img/spacer.gif");
$("#aprodimg5").hide();
$("#aprodimg5").attr("rel","");

   //$("#aprodimg5").remove();
  })
  .attr("src","/image/shop/item/"+id+"/5s.png");

$("#aprodimg5").attr("href","/image/shop/item/"+id+"/5.png");
$("#aprodimg5").attr("rel","fbox-gallery-"+id+"");
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
window.location.href ='#'+item_paramcode2id[paramcode];
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

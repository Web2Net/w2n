<?$price_roznica = Price::getPrice($item_data['postavschik'],$item_data['price_roznica'],$item_data['price_diler'],$item_data['ddp']);?>
<table style="width: 100%" cellpadding="0" cellspacing="0">
<?if($item_data['good_price'] == 1){
	$price_old = round($price_roznica+$price_roznica/100*10,0);
	?>
	<tr>
		<td style="padding-top:5px;"><div><?=NOTE_OLD_PRICE?> : <strike><?=$price_old?></strike> <?=CURRENCY?></div></td>
	</tr>
<?}?>

	<tr>
		<td valign="top" style="padding-top:12px;">
<div><b><?=SHOP_SITE_NOTE_PRICE?> :</b></div>		
		</td>
		<td valign="top" style="padding-top:7px;">
<script>

function changeSkoka(val){
$("#hm").attr("value",val);
//alert($("#hm").attr("value"));
}

</script> 		
<div class="form">
<form method="POST" class="order wareItem">
<input name="wId" type="hidden" value="67">
<input name="t" type="hidden" value="ware">
<input name="skoka" id="skoka" type="text" style="padding:5px 7px;" onChange="changeSkoka(this.value);" value="1">&nbsp; x <span  id="itemprice2"><?=$price_roznica?></span> <?//=CURRENCY?> 
</form>
</div>
		
		</td>
	</tr>
	<tr>
		<td valign="bottom" style="padding-bottom:5px;">

<div style="font: 25px Arial;color: #000000;">
<?if($price_roznica!=0){?>
<span style="font: 31px Arial;color: #684302;" id="itemprice"><?=$price_roznica?> <?=CURRENCY?></span>
<?}else{?>
<span style="font: 31px Arial;color: #636060;" id="itemprice"><?=SHOP_SITE_NOTE_ON_REQUEST?></span>
<?}?>
</div>
		
		</td>
		<td valign="bottom">
		
<input name="item" id="item" type="hidden" value="<?=$item_data["id"]?>">
<input name="hm" id="hm" type="hidden" value="1">
<span id="cartButton_<?=$item_data["id"]?>">
<input name="incart" type="submit" value="<?=SHOP_SITE_NOTE_IN_CART?>" onClick="inCart()">
<div style="display:none;width:175px;margin-top:-32px;">
    <a href="/cart/buy">
        <nobr><img src="/design/icon/Ok_32x32.png" width="28" align="left" style="margin:-4px 4px 0px 0px;" /><?=SHOP_SITE_NOTE_ITEM_IN_CART?></nobr>
    </a>
</div>
</span>

		</td>
	</tr>
</table>
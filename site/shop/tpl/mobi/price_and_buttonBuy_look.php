<?$price_roznica = Price::getPrice($item_data['postavschik'],$item_data['price_roznica'],$item_data['price_diler'],$item_data['ddp']);?>
<table style="width: 100%" cellpadding="0" cellspacing="0">
<?if($item_data['good_price'] == 1){
	$price_old = round($price_roznica+$price_roznica/100*10,0);
	?>
	<tr>
		<td style="padding-top:5px;"><div class="desc1" style="text-decoration:line-through;"><?=NOTE_OLD_PRICE?> : <?=$price_old?> <?=CURRENCY?></div></td>
	</tr>
<?}?>

	<tr>
		<td valign="top" style="padding-top:12px;">
            <div class="caption2"><?=SHOP_SITE_NOTE_PRICE?></div>		
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
                    <input name="wId" type="hidden" value="67" />
                    <input name="t" type="hidden" value="ware" />
                    <input name="skoka" id="skoka" class="desc1 r20" type="text" style="padding:5px 7px;" onChange="changeSkoka(this.value);" value="1">&nbsp; X <span class="desc1" id="itemprice2"><?=$price_roznica?></span> <?//=CURRENCY?> 
                </form>
            </div>
		</td>
	</tr>
	<tr>
		<td valign="bottom" style="padding-bottom:5px;">

<div class="caption1">

<?if($price_roznica!=0){?>
<span id="itemprice">
<?=$price_roznica?> <?=CURRENCY?></span>


<?}else{?>

<span style="font: 31px Arial;color: #636060;" id="itemprice"><?=SHOP_SITE_NOTE_ON_REQUEST?></span>
<?}?>
</div>
		
		</td>
		<td valign="bottom">
		
<input name="item" id="item" type="hidden" value="<?=$item_data["id"]?>">
<input name="hm" id="hm" type="hidden" value="1">
<span id="cartButton_<?=$item_data["id"]?>">
<input class="r20" name="incart" type="submit" value="<?=SHOP_SITE_NOTE_IN_CART?>" onClick="inCart()">
<div style="display:none;width:300px;margin-top:-32px;text-align:right;">
    <a href="/cart/buy">
        <nobr><img class="r10" src="/design/img/mobi/ico_ok.png" style="margin:-4px 4px 0px 0px;" /><?=SHOP_SITE_NOTE_ITEM_IN_CART?></nobr>
    </a>
</div>
</span>

		</td>
	</tr>
</table>

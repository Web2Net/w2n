<?if($item_data['gallery_connect']!=""){?>
<div class="polosa"><a class="polosa_a" href="/gallery/varianty-primeneniya/all"><?=SHOP_SITE_NOTE_GALLERY?></a></div>
<div class="both br_10"></div>
<div class="wrap_hor_scroll_img">
<?
$gallery_con=explode(";",substr($item_data['gallery_connect'],1,-1));
if($gallery_con){foreach($gallery_con as $key=>$valg){
$gal_item_data=Gallery::itemDataId($valg);

?>
<div class="wrap_item_look" style="position:relative;width:95%;">		
	<a class="fbox" href="/image/gallery/item/<?=$valg?>/1.png" title="<?=$gal_item_data['caption']?>" rel="fbox-gallery-main">	
		<img class="width_pct_100 r30" src="/image/gallery/item/<?=$valg?>/1.png" title="<?=$gal_item_data['caption']?>" alt="<?=$gal_item_data['caption']?>" />
<?if($valg['meta_d'] !== ""){?>
    	<div class="main_gallery_description r30">
			<span class="font_white"><?=$item_data['caption']?></span>
		</div>
<?}?>	
	</div>
<?}}?>
</div>
<?}?>
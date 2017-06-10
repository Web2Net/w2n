<?if($item_data['branch_connect']!=""){?>
<div class="polosa"><a class="polosa_a" href="/gallery/varianty-primeneniya"><?=SHOP_SITE_NOTE_APPLICATION?></a></div>


<?
$gallery_tag_list1=Gallery::tagListShowConnect(1);
$branch_c=explode(";",substr($item_data['branch_connect'],1,-1));
?>
<div align="left" style="padding:0px 12px;display:table;">
<?if($branch_c){foreach($branch_c as $key=>$valb){?>
    <a href="/gallery/varianty-primeneniya/<?=$gallery_tag_list1[$valb]['seolink']?>" id="branch_<?=$gallery_tag_list1[$valb]['seolink']?>" style="text-decoration:none;">
        <span class="caption2"><?=$gallery_tag_list1[$valb]['caption']?></span>
    </a> 
<?}}?>
</div>
<?}?>
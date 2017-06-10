<?if($item_data['companion_connect']!=""){?>
<div class="polosa"><?=SHOP_SITE_NOTE_RELATED_ITEMS?></div>
<div class="both br_10"></div>
<div class="wrap_hor_scroll_img">

<?if($item_data['companion_connect']!=""){
$companion_con=explode(";",substr($item_data['companion_connect'],1,-1));}
if($companion_con){foreach($companion_con as $key=>$valg){?>
<?
$img1=SHOP_ITEM_IMG_PATH."/".$valg."/1.png";
if(!file_exists(getenv("DOCUMENT_ROOT").$img1))$img1="/design/img/noimage_740x480.png";
$companion_data=Shop::itemDataId($valg);
$companion_list[$companion_data['id']]=$companion_data;
}}?>

  
<?
$item_list=$companion_list;
if($item_list!=NULL){?>
<?foreach($item_list as $key=>$val){?>
<?
$img1=SHOP_ITEM_IMG_PATH."/".$val["id"]."/1.png";
if(!file_exists(getenv("DOCUMENT_ROOT").$img1))$img1="/design/img/noimage_740x480.png";
$tag1_list=Shop::tagListShowLevel(1);
$tag2_list=Shop::tagListShowLevel(2);

?>

    <div class="wrap_item_look">
<?
        if($val['good_price']==1){
?>
        <div class="wrap_sale_bestprice">
            <span class="bestprice r5"><?=NOTE_GOOD_PRICE?></span>
        </div>
<?
        }
		else if($val['sell_out']==1){
?>
        <div class="wrap_sale_bestprice">
            <span class="sale r5"><?=NOTE_SALE?></span>
        </div>
      <?}?>
        <a href="/shop/<?=$tag1_list[str_replace(";","",$tag2_list[str_replace(";","",$val['connect'])]['connect'])]['seolink']?>/<?=$tag2_list[str_replace(";","",$val['connect'])]['seolink']?>/<?=$val["id"]?>-<?=$val["seolink"]?>" title="<?=MANDATORY_VIEW_MORE?>">
          <img class="width_pct_100 r30 best_prop" src="<?=$img1?>" title="<?=$val['caption']?>" alt="<?=$val['caption']?>" />
            <div class="caption3" style="padding-left:50px; font-size:250%;"><?=$val["caption"]?></div>
<!--        <div class="desc3"><?=$val["meta_d"]?></div>  -->
          </a>
        <?include SITE_PATH."/site/shop/tpl/mobi/price_and_buttonBuy_list_ver2.php";?>
    </div>


<?}}?>

</div>
<?}?>
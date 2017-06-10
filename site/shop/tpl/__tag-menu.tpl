<style>
    .sub-menu_bg{
	    background:#ffffff url("/design/img/bg_sub_menu.png") center center no-repeat;
	}    
</style>
<div class="mainWrap">
	
    <a id="touch-menu" class="mobile-menu" href="#" >Каталог продукции</a>
    
    <nav>
		<ul class="menu">
<?if($tag1_list!=NULL){?>
<?foreach($tag1_list as $key=>$val){?>
               <li>
                   <a id="shop_level1_<?=$val['id']?>" href="/shop/<?=$val['seolink']?>">
                       <?=$val["caption"]?>
                   </a>
                   <ul class="sub-menu sub-menu_bg">
<?
$connect_tag=explode(";",substr($val['connect'], 1, -1));$i2=1;
if($connect_tag[0]!=''){foreach($connect_tag as $key2=>$child_id){
$val2=$tag2_list[$child_id];
if($val2["caption"] !== NULL){
?>
                       <li>
						   <a style="" href="/shop/<?=$val["seolink"]?>/<?=$val2["seolink"]?>"><?=$val2["caption"]?></a>
					   </li>
<?}?>
<?}}?>               
                    </ul>
                </li>            
<?}}?> 
        </ul>
    </nav>
</div>
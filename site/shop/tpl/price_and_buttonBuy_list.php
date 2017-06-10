<?
$val['ddp']="0";
                $price_roznica = Price::getPrice($val['postavschik'],$val['price_roznica'],$val['price_diler'],$val['ddp']);
                $dp=explode(".",$price_roznica);
?>
                    <table width="90%" class="price">
					    <tr>
						    <td style="height:70px;margin-bottom:12px;" valign="bottom" align="center">
                                <div style="margin-bottom:12px;"><?=NOTE_PRICE?>: 
<?                  if($price_roznica!=0){
                        if($dp[1]==""){$dp[1]=="";}
?>
                                    <span style="color: #684302;"><?=$dp[0]?>.<font><?=$dp[1]?></font></span> <?=CURRENCY?>
<?                  }else{?>
                                    <span style="font-size:17px;line-height:25px;padding:7px;"><?=NOTE_NO_PRICE?></span> 
<?                  }?>
                                </div>
								<div class="buy" id="cartButton_<?=$val["id"]?>">
                                    <input name="incart" type="submit" value="<?=NOTE_IN_CART?>" style="text-align:center;padding-left:0;" onClick="inCart2(<?=$val["id"]?>,1)">
                                    <div style="display:none;width:100%;margin-top:10px;">
									    <a href="/cart/buy" style="font-size:120%;">
										    <nobr><img src="/design/icon/Ok_32x32.png" width="28" align="left" style="margin:-4px 4px 0px 0px;" /><?=SHOP_SITE_NOTE_ITEM_IN_CART?></nobr>
										</a>
									</div>
                                </div>
                            </td>
						</tr>
					</table>
<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define( "ROOTPATH", "../../" );
include( ROOTPATH."includes/admin.inc.php" );
include( "language/".$sLan.".php" );
include( "func/upload.inc.php" );
needauth( 0 );
$act = $_POST['act'];
switch ( $act )
{
				case "addyunzone" :
								needauth( 311 );
								$zone = htmlspecialchars( $_POST['zone'] );
								$xuhao = htmlspecialchars( $_POST['xuhao'] );
								$msql->query( "insert into {P}_shop_yunzone set \r\n\t\t`pid`='0',\r\n\t\t`zone`='{$zone}',\r\n\t\t`xuhao`='{$xuhao}'\r\n\t\t" );
								$id = $msql->instid( );
								echo "OK_".$id;
								exit( );
								break;
				case "modiyunzone" :
								needauth( 311 );
								$zoneid = htmlspecialchars( $_POST['zoneid'] );
								$zone = htmlspecialchars( $_POST['zone'] );
								$xuhao = htmlspecialchars( $_POST['xuhao'] );
								$msql->query( "update {P}_shop_yunzone set \r\n\t\t\t`zone`='{$zone}',\r\n\t\t\t`xuhao`='{$xuhao}' where id='{$zoneid}'  \r\n\t\t" );
								echo "OK";
								exit( );
								break;
				case "delyunzone" :
								needauth( 311 );
								$zoneid = htmlspecialchars( $_POST['zoneid'] );
								$msql->query( "select id from {P}_shop_yunzone where pid='{$zoneid}'" );
								if ( $msql->next_record( ) )
								{
												echo $strYunZoneNTC1;
												exit( );
								}
								$msql->query( "delete from {P}_shop_yunzone where id='{$zoneid}'" );
								echo "OK";
								exit( );
								break;
				case "delsubzone" :
								needauth( 311 );
								$zoneid = htmlspecialchars( $_POST['zoneid'] );
								$msql->query( "select id from {P}_shop_yunzone where pid='{$zoneid}'" );
								if ( $msql->next_record( ) )
								{
												echo $strYunZoneNTC1;
												exit( );
								}
								$msql->query( "delete from {P}_shop_yunzone where id='{$zoneid}'" );
								echo "OK";
								exit( );
								break;
				case "addsubzone" :
								needauth( 311 );
								$pid = htmlspecialchars( $_POST['pid'] );
								$zone = htmlspecialchars( $_POST['zone'] );
								$xuhao = htmlspecialchars( $_POST['xuhao'] );
								$msql->query( "insert into {P}_shop_yunzone set \r\n\t\t`pid`='{$pid}',\r\n\t\t`zone`='{$zone}',\r\n\t\t`xuhao`='{$xuhao}'\r\n\t\t" );
								$id = $msql->instid( );
								echo "OK_".$id;
								exit( );
								break;
				case "opensubzone" :
								needauth( 311 );
								$pid = htmlspecialchars( $_POST['pid'] );
								$str = "";
								$newsubxuhao = 1;
								$msql->query( "select * from {P}_shop_yunzone where pid='{$pid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$str .= "<div class='subcat' id='subcat_".$msql->f( "id" )."'>";
												$str .= "<input id='subxuhao_".$msql->f( "id" )."' type='text' size='3' value='".$msql->f( "xuhao" )."' class='inputx' /> ";
												$str .= "<input id='subzone_".$msql->f( "id" )."' type='text'  size='28' value='".$msql->f( "zone" )."' class='inputx' /> ";
												$str .= "<input type='button' class='button_subzone_modify' id='subZoneModi_".$msql->f( "id" )."' value='".$strModify."' /> ";
												$str .= "<input type='button' class='button_subzone_del' id='subZoneDel_".$msql->f( "id" )."' value='".$strDelete."' /> ";
												$str .= "</div>";
												$newsubxuhao = $msql->f( "xuhao" ) + 1;
								}
								$str .= "<div class='subcat' id='addsubcat_".$pid."'>";
								$str .= "<input id='newsubxuhao_".$pid."' type='text' size='3' value='".$newsubxuhao."' class='inputx' /> ";
								$str .= "<input id='newsubzone_".$pid."' type='text' size='28' value='".$strYunNTC4."' class='inputx' onFocus=\"this.value=''\" /> ";
								$str .= "<input type='button' id='addSubZone_".$pid."' value='".$strYunSubZoneAdd."' class='button_subzone_add' /> ";
								$str .= "</div>";
								echo $str;
								exit( );
								break;
				case "getyunzonelist" :
								$yunzonestr = $_POST['yunzonestr'];
								$arr = explode( "|", $yunzonestr );
								$showzonestr = "";
								$i = 1;
								for ( ;	$i < sizeof( $arr ) - 1;	$i++	)
								{
												if ( $arr[$i] != "" )
												{
																$zoneid = $arr[$i];
																$msql->query( "select * from {P}_shop_yunzone where id='{$zoneid}'" );
																if ( $msql->next_record( ) )
																{
																				$zone = $msql->f( "zone" );
																				$pid = $msql->f( "pid" );
																				if ( $pid == 0 )
																				{
																								$showzonestr .= $zone."\n";
																				}
																				else
																				{
																								$fsql->query( "select * from {P}_shop_yunzone where id='{$pid}'" );
																								if ( $fsql->next_record( ) )
																								{
																												$topzone = $fsql->f( "zone" );
																												$showzonestr .= $topzone."/".$zone."\n";
																								}
																				}
																}
												}
								}
								echo $showzonestr;
								exit( );
								break;
				case "memberpricelist" :
								$str = "<div style='border:1px #def solid;background-color:#f7fbfe;padding:10px 10px 15px 10px'>";
								$msql->query( "select * from {P}_member_type" );
								while ( $msql->next_record( ) )
								{
												$membertypeid = $msql->f( "membertypeid" );
												$membertype = $msql->f( "membertype" );
												$fsql->query( "select * from {P}_shop_pricerule where membertypeid='{$membertypeid}'" );
												if ( $fsql->next_record( ) )
												{
																$pr = $fsql->f( "pr" );
												}
												else
												{
																$pr = "1.00";
																$tsql->query( "insert into {P}_shop_pricerule set `membertypeid`='{$membertypeid}',`pr`='1.00'" );
												}
												$str .= "<div style='float:left;width:150px;height:25px;font:bold 12px/25px simsun'>".$membertype." </div><div style='float:left;width:200px;height:25px'>".$strPriceRlue3."<input type='text' class='input' name='priceset[".$membertypeid."]' value='".$pr."'></div><br clear='all' />";
								}
								$str .= "</div>";
								echo $str;
								exit( );
								break;
				case "goodsmemberprice" :
								$price = $_POST['price'];
								$str = "";
								$msql->query( "select * from {P}_shop_config where `variable`='PriceRule'" );
								if ( $msql->next_record( ) )
								{
												$pricerule = $msql->f( "value" );
								}
								if ( $pricerule == "2" )
								{
												$str = "<tr id='tr_memberprice'><td height='30' align='right' >".$strGoodsPrice2."</td><td >&nbsp;</td>";
												$str .= "<td height='30' id='td_memberprice'><div id='memberpriceDiv' style='width:480px;border:1px #def solid;background-color:#f7fbfe;padding:10px 10px 15px 10px'>";
												$msql->query( "select * from {P}_member_type" );
												while ( $msql->next_record( ) )
												{
																$membertypeid = $msql->f( "membertypeid" );
																$membertype = $msql->f( "membertype" );
																$fsql->query( "select * from {P}_shop_pricerule where membertypeid='{$membertypeid}'" );
																if ( $fsql->next_record( ) )
																{
																				$pr = $fsql->f( "pr" );
																				$memberprice = number_format( $price * $pr, 2, ".", "" );
																}
																else
																{
																				$memberprice = number_format( $price, 2, ".", "" );
																}
																$str .= "<div style='float:left;width:120px;height:25px;font:12px/25px simsun'>".$membertype." </div><div style='float:left;width:200px;height:25px'><input type='text' class='input' name='memberprice[".$membertypeid."]' value='".$memberprice."'> ".$strHbDanwei."</div><br clear='all' />";
												}
												$str .= "</div></td></tr>";
								}
								echo $str;
								exit( );
								break;
				case "modimemberprice" :
								$gid = $_POST['gid'];
								$price = $_POST['price'];
								$str = "";
								$msql->query( "select * from {P}_shop_config where `variable`='PriceRule'" );
								if ( $msql->next_record( ) )
								{
												$pricerule = $msql->f( "value" );
								}
								if ( $pricerule == "2" )
								{
												$str = "<tr id='tr_memberprice'><td height='30' align='right' >".$strGoodsPrice2."</td><td >&nbsp;</td>";
												$str .= "<td height='30' id='td_memberprice'><div id='memberpriceDiv' style='width:480px;border:1px #def solid;background-color:#f7fbfe;padding:10px 10px 15px 10px'>";
												$msql->query( "select * from {P}_member_type" );
												while ( $msql->next_record( ) )
												{
																$membertypeid = $msql->f( "membertypeid" );
																$membertype = $msql->f( "membertype" );
																$fsql->query( "select * from {P}_shop_memberprice where membertypeid='{$membertypeid}' and gid='{$gid}'" );
																if ( $fsql->next_record( ) )
																{
																				$memberprice = $fsql->f( "price" );
																				$memberprice = number_format( $memberprice, 2, ".", "" );
																}
																else
																{
																				$memberprice = number_format( $price, 2, ".", "" );
																}
																$str .= "<div style='float:left;width:120px;height:25px;font:12px/25px simsun'>".$membertype." </div><div style='float:left;width:200px;height:25px'><input type='text' class='input' name='memberprice[".$membertypeid."]' value='".$memberprice."'> ".$strHbDanwei."</div><br clear='all' />";
												}
												$str .= "</div></td></tr>";
								}
								echo $str;
								exit( );
								break;
				case "getmarketprice" :
								$price = $_POST['price'];
								$msql->query( "select * from {P}_shop_config where `variable`='MarketPrice'" );
								if ( $msql->next_record( ) )
								{
												$MarketPrice = $msql->f( "value" );
								}
								$p = number_format( $price * $MarketPrice, 2, ".", "" );
								echo $p;
								exit( );
								break;
				case "proplist" :
								$catid = $_POST['catid'];
								$nowid = $_POST['nowid'];
								if ( $nowid != "" && $nowid != "0" )
								{
												$msql->query( "select * from {P}_shop_con where  id='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$prop1 = $msql->f( "prop1" );
																$prop2 = $msql->f( "prop2" );
																$prop3 = $msql->f( "prop3" );
																$prop4 = $msql->f( "prop4" );
																$prop5 = $msql->f( "prop5" );
																$prop6 = $msql->f( "prop6" );
																$prop7 = $msql->f( "prop7" );
																$prop8 = $msql->f( "prop8" );
																$prop9 = $msql->f( "prop9" );
																$prop10 = $msql->f( "prop10" );
																$prop11 = $msql->f( "prop11" );
																$prop12 = $msql->f( "prop12" );
																$prop13 = $msql->f( "prop13" );
																$prop14 = $msql->f( "prop14" );
																$prop15 = $msql->f( "prop15" );
																$prop16 = $msql->f( "prop16" );
												}
								}
								$str = "<table width='100%'   border='0' align='center'  cellpadding='2' cellspacing='0' >";
								$i = 1;
								$msql->query( "select * from {P}_shop_prop where catid='{$catid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$propname = $msql->f( "propname" );
												$pn = "prop".$i;
												$str .= "<tr>";
												$str .= "<td width='100' height='30' align='right' >".$propname."</td><td width='5' >&nbsp;</td>";
												$str .= "<td height='30' >";
												$str .= "<input type='text' name='".$pn."' value='".$$pn."' class='input' style='width:499px;' />";
												$str .= "</td>";
												$str .= "</tr>";
												$i++;
								}
								$str .= "</table>";
								echo $str;
								exit( );
								break;
				case "addpage" :
								needauth( 320 );
								$nowid = $_POST['nowid'];
								$xuhao = 0;
								if ( $nowid != "" && $nowid != "0" )
								{
												$msql->query( "select max(xuhao) from {P}_shop_pages where gid='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$xuhao = $msql->f( "max(xuhao)" );
												}
												$xuhao = $xuhao + 1;
												$msql->query( "insert into {P}_shop_pages set gid='{$nowid}',xuhao='{$xuhao}' " );
								}
								echo "OK";
								exit( );
								break;
				case "shoppageslist" :
								$nowid = $_POST['nowid'];
								$pageinit = $_POST['pageinit'];
								$str = "<ul>";
								$str .= "<li id='p_0' class='pages'>1</li>";
								$i = 2;
								$id = 0;
								$msql->query( "select id from {P}_shop_pages where gid='{$nowid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$id = $msql->f( "id" );
												$str .= "<li id='p_".$id."' class='pages'>".$i."</li>";
												$i++;
								}
								if ( $pageinit != "new" )
								{
												$id = $pageinit;
								}
								$str .= "<li id='addpage' class='addbutton'>".$strShopPagesAdd."</li>";
								if ( $pageinit != "0" )
								{
												$str .= "<li id='pagedelete' class='addbutton'>".$strShopPagesDel."</li>";
												$str .= "<li id='backtomodi' class='addbutton'>".$strBack."</li>";
								}
								$str .= "</ul><input id='shoppagesid' name='shoppagesid' type='hidden' value='".$id."'>";
								echo $str;
								exit( );
								break;
				case "getcontent" :
								$nowid = $_POST['nowid'];
								$shoppageid = $_POST['shoppageid'];
								if ( $shoppageid == "-1" )
								{
												$src = "";
								}
								else if ( $shoppageid == "0" )
								{
												$msql->query( "select src from {P}_shop_con where id='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$src = $msql->f( "src" );
												}
								}
								else
								{
												$msql->query( "select src from {P}_shop_pages where id='{$shoppageid}'" );
												if ( $msql->next_record( ) )
												{
																$src = $msql->f( "src" );
												}
												else
												{
																$src = "";
												}
								}
								echo $src;
								exit( );
								break;
				case "shopmodify" :
								needauth( 320 );
								$id = $_POST['id'];
								$pid = $_POST['pid'];
								$catid = $_POST['catid'];
								$page = $_POST['page'];
								$body = $_POST['body'];
								$canshu = $_POST['canshu'];
								$title = htmlspecialchars( $_POST['title'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$memo = htmlspecialchars( $_POST['memo'] );
								$oldcatid = $_POST['oldcatid'];
								$oldcatpath = $_POST['oldcatpath'];
								$brandid = $_POST['brandid'];
								$bn = htmlspecialchars( $_POST['bn'] );
								$price = htmlspecialchars( $_POST['price'] );
								$price0 = htmlspecialchars( $_POST['price0'] );
								$danwei = htmlspecialchars( $_POST['danwei'] );
								$weight = htmlspecialchars( $_POST['weight'] );
								$kucun = htmlspecialchars( $_POST['kucun'] );
								$cent = htmlspecialchars( $_POST['cent'] );
								$prop1 = htmlspecialchars( $_POST['prop1'] );
								$prop2 = htmlspecialchars( $_POST['prop2'] );
								$prop3 = htmlspecialchars( $_POST['prop3'] );
								$prop4 = htmlspecialchars( $_POST['prop4'] );
								$prop5 = htmlspecialchars( $_POST['prop5'] );
								$prop6 = htmlspecialchars( $_POST['prop6'] );
								$prop7 = htmlspecialchars( $_POST['prop7'] );
								$prop8 = htmlspecialchars( $_POST['prop8'] );
								$prop9 = htmlspecialchars( $_POST['prop9'] );
								$prop10 = htmlspecialchars( $_POST['prop10'] );
								$prop11 = htmlspecialchars( $_POST['prop11'] );
								$prop12 = htmlspecialchars( $_POST['prop12'] );
								$prop13 = htmlspecialchars( $_POST['prop13'] );
								$prop14 = htmlspecialchars( $_POST['prop14'] );
								$prop15 = htmlspecialchars( $_POST['prop15'] );
								$prop16 = htmlspecialchars( $_POST['prop16'] );
								$prop17 = htmlspecialchars( $_POST['prop17'] );
								$prop18 = htmlspecialchars( $_POST['prop18'] );
								$prop19 = htmlspecialchars( $_POST['prop19'] );
								$prop20 = htmlspecialchars( $_POST['prop20'] );
								$tags = $_POST['tags'];
								$memberprice = $_POST['memberprice'];
								$pic = $_FILES['jpg'];
								$body = url2path( $body );
								$canshu = url2path( $canshu );
								if ( 0 < $pic['size'] )
								{
												$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								}
								if ( $bn == "" )
								{
												echo $Meta.$strShopNotice10;
												exit( );
								}
								if ( $title == "" )
								{
												echo $Meta.$strShopNotice6;
												exit( );
								}
								if ( $price == "" )
								{
												echo $Meta.$strShopNotice11;
												exit( );
								}
								if ( $price0 == "" )
								{
												echo $Meta.$strShopNotice12;
												exit( );
								}
								if ( $danwei == "" )
								{
												echo $Meta.$strShopNotice13;
												exit( );
								}
								if ( $kucun == "" )
								{
												echo $Meta.$strShopNotice14;
												exit( );
								}
								if ( $weight == "" )
								{
												echo $Meta.$strShopNotice15;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strShopNotice7;
												exit( );
								}
								if ( 65000 < strlen( $memo ) )
								{
												echo $Meta.$strShopNotice4;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strShopNotice5;
												exit( );
								}
								$uptime = time( );
								$msql->query( "select catpath from {P}_shop_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "shop/pics/".$nowdate;
												$arr = newuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $uppath );
												if ( $arr[0] != "err" )
												{
																$src = $arr[3];
												}
												else
												{
																echo $Meta.$arr[1];
																exit( );
												}
												$msql->query( "select src from {P}_shop_con where id='{$id}'" );
												if ( $msql->next_record( ) )
												{
																$oldsrc = $msql->f( "src" );
												}
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																unlink( ROOTPATH.$oldsrc );
												}
												$msql->query( "update {P}_shop_con set src='{$src}' where id='{$id}'" );
								}
								$t = 0;
								for ( ;	$t < sizeof( $tags );	$t++	)
								{
												if ( $tags[$t] != "" )
												{
																$tagstr .= $tags[$t].",";
												}
								}
								$msql->query( "update {P}_shop_con set \r\n\t\t\ttitle='{$title}',\r\n\t\t\tmemo='{$memo}',\r\n\t\t    body='{$body}',\r\n\t\t\tcanshu='{$canshu}',\r\n\t\t\tcatid='{$catid}',\r\n\t\t\tcatpath='{$catpath}',\r\n\t\t\tuptime='{$uptime}',\r\n\t\t\tauthor='{$author}',\r\n\t\t\tsource='{$source}',\r\n\t\t\ttags='{$tagstr}',\r\n\t\t\tbrandid='{$brandid}',\r\n\t\t\tbn='{$bn}',\r\n\t\t\tprice='{$price}',\r\n\t\t\tprice0='{$price0}',\r\n\t\t\tdanwei='{$danwei}',\r\n\t\t\tweight='{$weight}',\r\n\t\t\tkucun='{$kucun}',\r\n\t\t\tcent='{$cent}',\r\n\t\t\tprop1='{$prop1}',\r\n\t\t\tprop2='{$prop2}',\r\n\t\t\tprop3='{$prop3}',\r\n\t\t\tprop4='{$prop4}',\r\n\t\t\tprop5='{$prop5}',\r\n\t\t\tprop6='{$prop6}',\r\n\t\t\tprop7='{$prop7}',\r\n\t\t\tprop8='{$prop8}',\r\n\t\t\tprop9='{$prop9}',\r\n\t\t\tprop10='{$prop10}',\r\n\t\t\tprop11='{$prop11}',\r\n\t\t\tprop12='{$prop12}',\r\n\t\t\tprop13='{$prop13}',\r\n\t\t\tprop14='{$prop14}',\r\n\t\t\tprop15='{$prop15}',\r\n\t\t\tprop16='{$prop16}',\r\n\t\t\tprop17='{$prop17}',\r\n\t\t\tprop18='{$prop18}',\r\n\t\t\tprop19='{$prop19}',\r\n\t\t\tprop20='{$prop20}'\r\n\t\t\twhere id='{$id}'\r\n\t\t" );
								if ( $memberprice != "" && is_array( $memberprice ) )
								{
												do
												{
																$val = each( &$memberprice )[1];
																$key = each( &$memberprice )[0];
																if ( !each( &$memberprice ) )
																{
																				break;
																}
																else
																{
																				$msql->query( "select id from {P}_shop_memberprice where `membertypeid`='{$key}' and `gid`='{$id}' limit 0,1" );
																}
																if ( $msql->next_record( ) )
																{
																				$fsql->query( "update {P}_shop_memberprice set `price`='{$val}' where `membertypeid`='{$key}' and `gid`='{$id}'" );
																}
																else
																{
																				$fsql->query( "insert into {P}_shop_memberprice set `price`='{$val}',`membertypeid`='{$key}',`gid`='{$id}'" );
																}
												} while ( 1 );
								}
								echo "OK";
								exit( );
								break;
				case "contentmodify" :
								needauth( 320 );
								$shoppagesid = $_POST['shoppagesid'];
								$pic = $_FILES['jpg'];
								$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								if ( $pic['size'] <= 0 )
								{
												echo $Meta.$strShopNotice3;
												exit( );
								}
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "shop/pics/".$nowdate;
												$arr = newuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $uppath );
												if ( $arr[0] != "err" )
												{
																$src = $arr[3];
												}
												else
												{
																echo $Meta.$arr[1];
																exit( );
												}
												$msql->query( "select src from {P}_shop_pages where id='{$shoppagesid}'" );
												if ( $msql->next_record( ) )
												{
																$oldsrc = $msql->f( "src" );
												}
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																unlink( ROOTPATH.$oldsrc );
												}
												$msql->query( "update {P}_shop_pages set src='{$src}' where id='{$shoppagesid}'" );
								}
								echo "OK";
								exit( );
								break;
				case "shopadd" :
								needauth( 319 );
								$catid = $_POST['catid'];
								$body = $_POST['body'];
								$title = htmlspecialchars( $_POST['title'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$memo = htmlspecialchars( $_POST['memo'] );
								$brandid = $_POST['brandid'];
								$bn = htmlspecialchars( $_POST['bn'] );
								$price = htmlspecialchars( $_POST['price'] );
								$price0 = htmlspecialchars( $_POST['price0'] );
								$danwei = htmlspecialchars( $_POST['danwei'] );
								$weight = htmlspecialchars( $_POST['weight'] );
								$kucun = htmlspecialchars( $_POST['kucun'] );
								$cent = htmlspecialchars( $_POST['cent'] );
								$prop1 = htmlspecialchars( $_POST['prop1'] );
								$prop2 = htmlspecialchars( $_POST['prop2'] );
								$prop3 = htmlspecialchars( $_POST['prop3'] );
								$prop4 = htmlspecialchars( $_POST['prop4'] );
								$prop5 = htmlspecialchars( $_POST['prop5'] );
								$prop6 = htmlspecialchars( $_POST['prop6'] );
								$prop7 = htmlspecialchars( $_POST['prop7'] );
								$prop8 = htmlspecialchars( $_POST['prop8'] );
								$prop9 = htmlspecialchars( $_POST['prop9'] );
								$prop10 = htmlspecialchars( $_POST['prop10'] );
								$prop11 = htmlspecialchars( $_POST['prop11'] );
								$prop12 = htmlspecialchars( $_POST['prop12'] );
								$prop13 = htmlspecialchars( $_POST['prop13'] );
								$prop14 = htmlspecialchars( $_POST['prop14'] );
								$prop15 = htmlspecialchars( $_POST['prop15'] );
								$prop16 = htmlspecialchars( $_POST['prop16'] );
								$prop17 = htmlspecialchars( $_POST['prop17'] );
								$prop18 = htmlspecialchars( $_POST['prop18'] );
								$prop19 = htmlspecialchars( $_POST['prop19'] );
								$prop20 = htmlspecialchars( $_POST['prop20'] );
								$tags = $_POST['tags'];
								$memberprice = $_POST['memberprice'];
								$pic = $_FILES['jpg'];
								$body = url2path( $body );
								trylimit( "_shop_con", 30, "id" );
								$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								if ( $bn == "" )
								{
												echo $Meta.$strShopNotice10;
												exit( );
								}
								if ( $title == "" )
								{
												echo $Meta.$strShopNotice6;
												exit( );
								}
								if ( $price == "" )
								{
												echo $Meta.$strShopNotice11;
												exit( );
								}
								if ( $price0 == "" )
								{
												echo $Meta.$strShopNotice12;
												exit( );
								}
								if ( $danwei == "" )
								{
												echo $Meta.$strShopNotice13;
												exit( );
								}
								if ( $kucun == "" )
								{
												echo $Meta.$strShopNotice14;
												exit( );
								}
								if ( $weight == "" )
								{
												echo $Meta.$strShopNotice15;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strShopNotice7;
												exit( );
								}
								if ( 65000 < strlen( $memo ) )
								{
												echo $Meta.$strShopNotice4;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strShopNotice5;
												exit( );
								}
								$uptime = time( );
								$dtime = time( );
								$msql->query( "select catpath from {P}_shop_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "shop/pics/".$nowdate;
												$arr = newuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $uppath );
												if ( $arr[0] != "err" )
												{
																$src = $arr[3];
												}
												else
												{
																echo $Meta.$arr[1];
																exit( );
												}
								}
								$t = 0;
								for ( ;	$t < sizeof( $tags );	$t++	)
								{
												if ( $tags[$t] != "" )
												{
																$tagstr .= $tags[$t].",";
												}
								}
								$msql->query( "insert into {P}_shop_con set\r\n\t\tcatid='{$catid}',\r\n\t\tcatpath='{$catpath}',\r\n\t\ttitle='{$title}',\r\n\t\tbody='{$body}',\r\n\t\tdtime='{$dtime}',\r\n\t\txuhao='0',\r\n\t\tcl='0',\r\n\t\ttj='0',\r\n\t\tiffb='1',\r\n\t\tifbold='0',\r\n\t\tifred='0',\r\n\t\ttype='gif',\r\n\t\tsrc='{$src}',\r\n\t\tbrandid='{$brandid}',\r\n\t\tbn='{$bn}',\r\n\t\tprice='{$price}',\r\n\t\tprice0='{$price0}',\r\n\t\tdanwei='{$danwei}',\r\n\t\tweight='{$weight}',\r\n\t\tkucun='{$kucun}',\r\n\t\tcent='{$cent}',\r\n\t\tuptime='{$dtime}',\r\n\t\tauthor='{$author}',\r\n\t\tsource='{$source}',\r\n\t\tmemberid='0',\r\n\t\ttags='{$tagstr}',\r\n\t\tsecure='0',\r\n\t\tmemo='{$memo}',\r\n\t\tprop1='{$prop1}',\r\n\t\tprop2='{$prop2}',\r\n\t\tprop3='{$prop3}',\r\n\t\tprop4='{$prop4}',\r\n\t\tprop5='{$prop5}',\r\n\t\tprop6='{$prop6}',\r\n\t\tprop7='{$prop7}',\r\n\t\tprop8='{$prop8}',\r\n\t\tprop9='{$prop9}',\r\n\t\tprop10='{$prop10}',\r\n\t\tprop11='{$prop11}',\r\n\t\tprop12='{$prop12}',\r\n\t\tprop13='{$prop13}',\r\n\t\tprop14='{$prop14}',\r\n\t\tprop15='{$prop15}',\r\n\t\tprop16='{$prop16}',\r\n\t\tprop17='{$prop17}',\r\n\t\tprop18='{$prop18}',\r\n\t\tprop19='{$prop19}',\r\n\t\tprop20='{$prop20}'\r\n\t\t" );
								$gid = $msql->instid( );
								if ( $memberprice != "" && is_array( $memberprice ) )
								{
												do
												{
																$val = each( &$memberprice )[1];
																$key = each( &$memberprice )[0];
																if ( each( &$memberprice ) )
																{
																				$msql->query( "insert into {P}_shop_memberprice set `price`='{$val}',`membertypeid`='{$key}',`gid`='{$gid}'" );
																}
												} while ( 1 );
								}
								echo "OK";
								exit( );
								break;
				case "pagedelete" :
								needauth( 320 );
								$delpagesid = $_POST['delpagesid'];
								$nowid = $_POST['nowid'];
								$i = 0;
								$msql->query( "select id from {P}_shop_pages where gid='{$nowid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$id[$i] = $msql->f( "id" );
												if ( $id[$i] == $delpagesid )
												{
																if ( $i == 0 )
																{
																				$lastid = 0;
																}
																else
																{
																				$lastid = $id[$i - 1];
																}
												}
												$i++;
								}
								if ( $lastid == 0 && 1 < $i )
								{
												$lastid = $id[1];
								}
								$msql->query( "select src from {P}_shop_pages where id='{$delpagesid}'" );
								if ( $msql->next_record( ) )
								{
												$oldsrc = $msql->f( "src" );
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																unlink( ROOTPATH.$oldsrc );
												}
								}
								$msql->query( "delete from  {P}_shop_pages where id='{$delpagesid}'" );
								echo $lastid;
								exit( );
								break;
				case "addzl" :
								needauth( 313 );
								$catid = htmlspecialchars( $_POST['catid'] );
								if ( $catid == "" )
								{
												echo $strZlNTC1;
												exit( );
								}
								$msql->query( "select cat from {P}_shop_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$cat = $msql->f( "cat" );
												$cat = str_replace( "'", "", $cat );
								}
								else
								{
												echo $strZlNTC2;
												exit( );
								}
								$pagename = "class_".$catid;
								@mkdir( @"../class/".@$catid, 511 );
								$fd = fopen( "../class/temp.php", "r" );
								$str = fread( $fd, "2000" );
								$str = str_replace( "TEMP", $pagename, $str );
								fclose( $fd );
								$filename = "../class/".$catid."/index.php";
								$fp = fopen( $filename, "w" );
								fwrite( $fp, $str );
								fclose( $fp );
								@chmod( @$filename, 493 );
								$msql->query( "update {P}_shop_cat set `ifchannel`='1' where catid='{$catid}'" );
								$msql->query( "select id from {P}_base_pageset where coltype='shop' and pagename='{$pagename}'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												$fsql->query( "insert into {P}_base_pageset set \r\n\t\t\t`name`='{$cat}',\r\n\t\t\t`coltype`='shop',\r\n\t\t\t`pagename`='{$pagename}',\r\n\t\t\t`pagetitle`='{$cat}',\r\n\t\t\t`buildhtml`='index'\r\n\t\t\t" );
								}
								echo "OK";
								exit( );
								break;
				case "delzl" :
								needauth( 313 );
								$catid = htmlspecialchars( $_POST['catid'] );
								if ( $catid == "" )
								{
												echo $strZlNTC1;
												exit( );
								}
								$msql->query( "select catid from {P}_shop_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												echo $strZlNTC2;
												exit( );
								}
								$pagename = "class_".$catid;
								$msql->query( "delete from {P}_base_pageset where coltype='shop' and pagename='{$pagename}'" );
								$msql->query( "delete from {P}_base_plus where plustype='shop' and pluslocat='{$pagename}'" );
								$msql->query( "update {P}_shop_cat set `ifchannel`='0' where catid='{$catid}'" );
								if ( $catid != "" && 1 <= strlen( $catid ) && !strstr( $catid, "." ) && !strstr( $catid, "/" ) )
								{
												delfold( "../class/".$catid );
								}
								echo "OK";
								exit( );
								break;
				case "setbrandrelcat" :
								$c = $_POST['c'];
								$brandid = $_POST['brandid'];
								$msql->query( "delete from {P}_shop_brandcat where `brandid`='{$brandid}'" );
								if ( $c != "" && is_array( $c ) )
								{
												do
												{
																$val = each( &$c )[1];
																$key = each( &$c )[0];
																if ( each( &$c ) )
																{
																				$msql->query( "insert into {P}_shop_brandcat set `brandid`='{$brandid}',`catid`='{$val}'" );
																}
												} while ( 1 );
								}
								echo "OK";
								exit( );
								break;
				case "getcatrelbrand" :
								$catid = $_POST['catid'];
								$nowid = $_POST['nowid'];
								if ( $nowid != "" && $nowid != "0" )
								{
												$msql->query( "select brandid from {P}_shop_con where `id`='{$nowid}' limit 0,1" );
												if ( $msql->next_record( ) )
												{
																$shopbrandid = $msql->f( "brandid" );
												}
								}
								$str = "";
								$msql->query( "select * from {P}_shop_brandcat where `catid`='{$catid}'" );
								while ( $msql->next_record( ) )
								{
												$brandid = $msql->f( "brandid" );
												$fsql->query( "select brand from {P}_shop_brand where `id`='{$brandid}' limit 0,1" );
												if ( $fsql->next_record( ) )
												{
																$brand = $fsql->f( "brand" );
																if ( $shopbrandid == $brandid )
																{
																				$str .= "<option value='".$brandid."' selected>".$brand."</option>";
																}
																else
																{
																				$str .= "<option value='".$brandid."'>".$brand."</option>";
																}
												}
								}
								echo $str;
								exit( );
								break;
				case "ordertui" :
								needauth( 328 );
								trylimit( "_shop_order", 50, "orderid" );
								$orderid = $_POST['orderid'];
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$ifpay = $msql->f( "ifpay" );
												$ifyun = $msql->f( "ifyun" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												if ( $ifok == "1" )
												{
																echo "1003";
																exit( );
												}
												if ( $ifpay == "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $ifyun == "1" )
												{
																echo "1002";
																exit( );
												}
												if ( $iftui == "1" )
												{
																echo "OK";
																exit( );
												}
												$fsql->query( "select id from {P}_shop_orderitems where orderid='{$orderid}' and ifyun='1'" );
												if ( $fsql->next_record( ) )
												{
																echo "1004";
																exit( );
												}
												$fsql->query( "update {P}_shop_order set iftui='1' where orderid='{$orderid}'" );
												$fsql->query( "update {P}_shop_orderitems set iftui='1' where orderid='{$orderid}'" );
												echo "OK";
												exit( );
								}
								else
								{
												echo "1000";
												exit( );
								}
								echo "OK";
								exit( );
								break;
				case "orderok" :
								needauth( 325 );
								trylimit( "_shop_order", 50, "orderid" );
								$orderid = $_POST['orderid'];
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$ifpay = $msql->f( "ifpay" );
												$ifyun = $msql->f( "ifyun" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												if ( $ifpay != "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $ifyun != "1" )
												{
																echo "1002";
																exit( );
												}
												if ( $iftui == "1" )
												{
																echo "1003";
																exit( );
												}
												if ( $ifok == "1" )
												{
																echo "OK";
																exit( );
												}
												$fsql->query( "select id from {P}_shop_orderitems where orderid='{$orderid}' and ifyun='0'" );
												if ( $fsql->next_record( ) )
												{
																echo "1004";
																exit( );
												}
												$fsql->query( "update {P}_shop_order set ifok='1' where orderid='{$orderid}'" );
												echo "OK";
												exit( );
								}
								else
								{
												echo "1000";
												exit( );
								}
								echo "OK";
								exit( );
								break;
				case "orderitemyun" :
								needauth( 324 );
								trylimit( "_shop_order", 50, "orderid" );
								$itemid = $_POST['itemid'];
								$now = time( );
								$msql->query( "select * from {P}_shop_orderitems where id='{$itemid}'" );
								if ( $msql->next_record( ) )
								{
												$orderid = $msql->f( "orderid" );
												$gid = $msql->f( "gid" );
												$nums = $msql->f( "nums" );
												$itemyun = $msql->f( "ifyun" );
												if ( $itemyun == "1" )
												{
																echo "1005";
																exit( );
												}
								}
								else
								{
												echo "1000";
												exit( );
								}
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$ifpay = $msql->f( "ifpay" );
												$ifyun = $msql->f( "ifyun" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												if ( $iftui == "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $ifok == "1" )
												{
																echo "1002";
																exit( );
												}
								}
								else
								{
												echo "1003";
												exit( );
								}
								$msql->query( "select kucun from {P}_shop_con where id='{$gid}'" );
								if ( $msql->next_record( ) )
								{
												$kucun = $msql->f( "kucun" );
								}
								if ( $kucun < $nums )
								{
												echo "1004";
												exit( );
								}
								$fsql->query( "update {P}_shop_orderitems set ifyun='1',yuntime='{$now}' where id='{$itemid}'" );
								$fsql->query( "update {P}_shop_con set kucun=kucun-{$nums},salenums=salenums+{$nums} where id='{$gid}'" );
								$msql->query( "select id from {P}_shop_orderitems where orderid='{$orderid}' and ifyun!='1'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												$fsql->query( "update {P}_shop_order set ifyun='1',yuntime='{$now}' where orderid='{$orderid}'" );
								}
								echo "OK";
								exit( );
								break;
				case "orderitemtui" :
								needauth( 327 );
								$itemid = $_POST['itemid'];
								$now = time( );
								$msql->query( "select * from {P}_shop_orderitems where id='{$itemid}'" );
								if ( $msql->next_record( ) )
								{
												$orderid = $msql->f( "orderid" );
												$gid = $msql->f( "gid" );
												$nums = $msql->f( "nums" );
												$itemyun = $msql->f( "ifyun" );
												if ( $itemyun != "1" )
												{
																echo "1005";
																exit( );
												}
								}
								else
								{
												echo "1000";
												exit( );
								}
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$ifpay = $msql->f( "ifpay" );
												$ifyun = $msql->f( "ifyun" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												if ( $iftui == "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $ifok == "1" )
												{
																echo "1002";
																exit( );
												}
								}
								else
								{
												echo "1003";
												exit( );
								}
								$fsql->query( "update {P}_shop_orderitems set ifyun='0',yuntime='0' where id='{$itemid}'" );
								$fsql->query( "update {P}_shop_con set kucun=kucun+{$nums},salenums=salenums-{$nums} where id='{$gid}'" );
								$fsql->query( "update {P}_shop_order set ifyun='0',yuntime='0' where orderid='{$orderid}'" );
								echo "OK";
								exit( );
								break;
				case "orderpaychk" :
								needauth( 323 );
								trylimit( "_shop_order", 50, "orderid" );
								$orderid = $_POST['orderid'];
								$dtime = time( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$logname = $_COOKIE['SYSNAME'];
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$OrderNo = $msql->f( "OrderNo" );
												$memberid = $msql->f( "memberid" );
												$ifpay = $msql->f( "ifpay" );
												$ifyun = $msql->f( "ifyun" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												$paytotal = $msql->f( "paytotal" );
												$payid = $msql->f( "payid" );
												$paytype = $msql->f( "paytype" );
												$tcent = $msql->f( "totalcent" );
												if ( $ifpay == "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $iftui == "1" )
												{
																echo "1002";
																exit( );
												}
												if ( $ifok == "1" )
												{
																echo "1003";
																exit( );
												}
								}
								else
								{
												echo "1000";
												exit( );
								}
								if ( $payid == "0" && $memberid != "0" )
								{
												$msql->query( "select account from {P}_member where memberid='{$memberid}'" );
												if ( $msql->next_record( ) )
												{
																$account = $msql->f( "account" );
																if ( $paytotal <= $account && 0 <= $paytotal )
																{
																				$fsql->query( "update {P}_member set account=account-{$paytotal},buytotal=buytotal+{$paytotal} where memberid='{$memberid}'" );
																				$fsql->query( "update {P}_shop_order set ifpay='1',paytime='{$dtime}' where orderid='{$orderid}'" );
																				$fsql->query( "insert into {P}_member_buylist set \r\n\t\t\t\t\t\t`buyfrom`='{$strModuleShop}',\r\n\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t`orderid`='{$orderid}',\r\n\t\t\t\t\t\t`payid`='0',\r\n\t\t\t\t\t\t`paytype`='{$strMemberAccountPay}',\r\n\t\t\t\t\t\t`paytotal`='{$paytotal}',\r\n\t\t\t\t\t\t`daytime`='{$dtime}',\r\n\t\t\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t\t\t`OrderNo`='{$OrderNo}',\r\n\t\t\t\t\t\t`logname`='{$logname}'\r\n\t\t\t\t\t" );
																				include_once( ROOTPATH."shop/includes/shop.inc.php" );
																				$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
																				$centid = $GLOBALS['SHOPCONF']['CentId'];
																				$centcol = "cent".$centid;
																				if ( $centopen == "1" )
																				{
																								$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`+{$tcent} where memberid='{$memberid}'" );
																								$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t\t\t`memo`='{$strPayCentEvent}',\r\n\t\t\t\t\t\t\t`".$centcol."`='{$tcent}'\r\n\t\t\t\t\t\t" );
																				}
																				echo "OK";
																				exit( );
																}
																else
																{
																				echo "1005";
																				exit( );
																}
												}
												else
												{
																echo "1004";
																exit( );
												}
								}
								if ( $payid != "0" && $memberid != "0" )
								{
												$fsql->query( "update {P}_member set buytotal=buytotal+{$paytotal},paytotal=paytotal+{$paytotal} where memberid='{$memberid}'" );
												$fsql->query( "update {P}_shop_order set ifpay='1',paytime='{$dtime}' where orderid='{$orderid}'" );
												$fsql->query( "insert into {P}_member_buylist set \r\n\t\t\t\t`buyfrom`='{$strModuleShop}',\r\n\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t`orderid`='{$orderid}',\r\n\t\t\t\t`payid`='{$payid}',\r\n\t\t\t\t`paytype`='{$paytype}',\r\n\t\t\t\t`paytotal`='{$paytotal}',\r\n\t\t\t\t`daytime`='{$dtime}',\r\n\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t`OrderNo`='{$OrderNo}',\r\n\t\t\t\t`logname`='{$logname}'\r\n\t\t\t" );
												$fsql->query( "insert into {P}_member_pay set \r\n\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t`payid`='{$payid}',\r\n\t\t\t\t`oof`='{$paytotal}',\r\n\t\t\t\t`method`='{$paytype}',\r\n\t\t\t\t`type`='{$strPayFromChk}',\r\n\t\t\t\t`addtime`='{$dtime}',\r\n\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t`logname`='{$logname}'\r\n\t\t\t" );
												include_once( ROOTPATH."shop/includes/shop.inc.php" );
												$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
												$centid = $GLOBALS['SHOPCONF']['CentId'];
												$centcol = "cent".$centid;
												if ( $centopen == "1" )
												{
																$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`+{$tcent} where memberid='{$memberid}'" );
																$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t`memo`='{$strPayCentEvent}',\r\n\t\t\t\t\t`".$centcol."`='{$tcent}'\r\n\t\t\t\t" );
												}
								}
								if ( $payid != "0" && $memberid == "0" )
								{
												$fsql->query( "update {P}_shop_order set ifpay='1',paytime='{$dtime}' where orderid='{$orderid}'" );
								}
								echo "OK";
								exit( );
								break;
				case "orderunpay" :
								needauth( 326 );
								trylimit( "_shop_order", 50, "orderid" );
								$orderid = $_POST['orderid'];
								$dtime = time( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$logname = $_COOKIE['SYSNAME'];
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$OrderNo = $msql->f( "OrderNo" );
												$memberid = $msql->f( "memberid" );
												$ifpay = $msql->f( "ifpay" );
												$ifyun = $msql->f( "ifyun" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												$paytotal = $msql->f( "paytotal" );
												$payid = $msql->f( "payid" );
												$paytype = $msql->f( "paytype" );
												$tcent = $msql->f( "totalcent" );
												if ( $ifpay != "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $iftui == "1" )
												{
																echo "1002";
																exit( );
												}
												if ( $ifok == "1" )
												{
																echo "1003";
																exit( );
												}
								}
								else
								{
												echo "1000";
												exit( );
								}
								if ( $memberid != "0" )
								{
												$msql->query( "select memberid from {P}_member where memberid='{$memberid}'" );
												if ( $msql->next_record( ) )
												{
																$fsql->query( "update {P}_member set account=account+{$paytotal},buytotal=buytotal-{$paytotal} where memberid='{$memberid}'" );
																$fsql->query( "update {P}_shop_order set ifpay='0',paytime='0' where orderid='{$orderid}'" );
																$fsql->query( "insert into {P}_member_buylist set \r\n\t\t\t\t\t\t`buyfrom`='{$strModuleShop}',\r\n\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t`orderid`='{$orderid}',\r\n\t\t\t\t\t\t`payid`='0',\r\n\t\t\t\t\t\t`paytype`='{$strOrderUnPay}',\r\n\t\t\t\t\t\t`paytotal`='-{$paytotal}',\r\n\t\t\t\t\t\t`daytime`='{$dtime}',\r\n\t\t\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t\t\t`OrderNo`='{$OrderNo}',\r\n\t\t\t\t\t\t`logname`='{$logname}'\r\n\t\t\t\t\t" );
																include_once( ROOTPATH."shop/includes/shop.inc.php" );
																$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
																$centid = $GLOBALS['SHOPCONF']['CentId'];
																$centcol = "cent".$centid;
																if ( $centopen == "1" )
																{
																				$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`-{$tcent} where memberid='{$memberid}'" );
																				$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t\t\t`memo`='{$strOrderUnPay}',\r\n\t\t\t\t\t\t\t`".$centcol."`='-{$tcent}'\r\n\t\t\t\t\t\t" );
																}
																echo "OK";
																exit( );
												}
												else
												{
																echo "1004";
																exit( );
												}
								}
								else
								{
												$fsql->query( "update {P}_shop_order set ifpay='0',paytime='0' where orderid='{$orderid}'" );
								}
								echo "OK";
								exit( );
								break;
				case "modigoodstotal" :
								needauth( 322 );
								trylimit( "_shop_order", 50, "orderid" );
								$orderid = $_POST['orderid'];
								$nowprice = $_POST['nowprice'];
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$ifpay = $msql->f( "ifpay" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												$oldgoodstotal = $msql->f( "goodstotal" );
												$oldtotal = $msql->f( "paytotal" );
												if ( $ifpay == "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $ifok == "1" )
												{
																echo "1002";
																exit( );
												}
												if ( $iftui == "1" )
												{
																echo "1003";
																exit( );
												}
												$newtotal = $oldtotal - ( $oldgoodstotal - $nowprice );
												$fsql->query( "update {P}_shop_order set goodstotal='{$nowprice}',totaloof='{$newtotal}',paytotal='{$newtotal}' where orderid='{$orderid}'" );
												$newtotal = number_format( $newtotal, 2, ".", "" );
												echo "OK_".$newtotal;
												exit( );
								}
								else
								{
												echo "1000";
												exit( );
								}
								break;
				case "modiyunfei" :
								needauth( 322 );
								trylimit( "_shop_order", 50, "orderid" );
								$orderid = $_POST['orderid'];
								$nowprice = $_POST['nowprice'];
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$ifpay = $msql->f( "ifpay" );
												$ifok = $msql->f( "ifok" );
												$iftui = $msql->f( "iftui" );
												$oldyunfei = $msql->f( "yunfei" );
												$oldtotal = $msql->f( "paytotal" );
												if ( $ifpay == "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $ifok == "1" )
												{
																echo "1002";
																exit( );
												}
												if ( $iftui == "1" )
												{
																echo "1003";
																exit( );
												}
												$newtotal = $oldtotal - ( $oldyunfei - $nowprice );
												$fsql->query( "update {P}_shop_order set yunfei='{$nowprice}',totaloof='{$newtotal}',paytotal='{$newtotal}' where orderid='{$orderid}'" );
												$newtotal = number_format( $newtotal, 2, ".", "" );
												echo "OK_".$newtotal;
												exit( );
								}
								else
								{
												echo "1000";
												exit( );
								}
								break;
				case "ordermodibz" :
								needauth( 321 );
								$orderid = $_POST['orderid'];
								$bztext = htmlspecialchars( $_POST['bztext'] );
								$fsql->query( "update {P}_shop_order set `bz`='{$bztext}' where orderid='{$orderid}'" );
								echo "OK";
								break;
}
?>

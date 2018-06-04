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
include( "func/comm.inc.php" );
needauth( 721 );
$act = $_POST['act'];
switch ( $act )
{
				case "proplist" :
								$catid = $_POST['catid'];
								$nowid = $_POST['nowid'];
								if ( $nowid != "" && $nowid != "0" )
								{
												$msql->query( "select * from {P}_hz_con where id='{$nowid}'" );
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
								$str = "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>";
								$i = 1;
								$msql->query( "select * from {P}_hz_prop where catid='{$catid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$propname = $msql->f( "propname" );
												$pn = "prop".$i;
												$str .= "<tr>";
												$str .= "<td width='100' height='30' align='center'>".$propname."</td>";
												$str .= "<td height='30'>";
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
								$nowid = $_POST['nowid'];
								$xuhao = 0;
								if ( $nowid != "" && $nowid != "0" )
								{
												$msql->query( "select max(xuhao) from {P}_hz_pages where productid='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$xuhao = $msql->f( "max(xuhao)" );
												}
												$xuhao = $xuhao + 1;
												$msql->query( "insert into {P}_hz_pages set productid='{$nowid}',xuhao='{$xuhao}' " );
								}
								echo "OK";
								exit( );
								break;
				case "productpageslist" :
								$nowid = $_POST['nowid'];
								$pageinit = $_POST['pageinit'];
								$str = "<ul>";
								$str .= "<li id='p_0' class='pages'>1</li>";
								$i = 2;
								$id = 0;
								$msql->query( "select id from {P}_hz_pages where productid='{$nowid}' order by xuhao" );
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
								$str .= "<li id='addpage' class='addbutton'>".$strHzPagesAdd."</li>";
								if ( $pageinit != "0" )
								{
												$str .= "<li id='pagedelete' class='addbutton'>".$strHzPagesDel."</li>";
												$str .= "<li id='backtomodi' class='addbutton'>".$strBack."</li>";
								}
								$str .= "</ul><input id='productpagesid' name='productpagesid' type='hidden' value='".$id."'>";
								echo $str;
								exit( );
								break;
				case "getcontent" :
								$nowid = $_POST['nowid'];
								$productpageid = $_POST['productpageid'];
								if ( $productpageid == "-1" )
								{
												$src = "";
								}
								else if ( $productpageid == "0" )
								{
												$msql->query( "select src from {P}_hz_con where id='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$src = $msql->f( "src" );
												}
								}
								else
								{
												$msql->query( "select src from {P}_hz_pages where id='{$productpageid}'" );
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
				case "productmodify" :
								trylimit( "_hz_con", 20, "id" );
								$id = $_POST['id'];
								$pid = $_POST['pid'];
								$catid = $_POST['catid'];
								$page = $_POST['page'];
								$body = $_POST['body'];
								$title = htmlspecialchars( $_POST['title'] );
								$cent = htmlspecialchars( $_POST['cent'] );
								$kucun = htmlspecialchars( $_POST['kucun'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$memo = htmlspecialchars( $_POST['memo'] );
								$oldcatid = $_POST['oldcatid'];
								$oldcatpath = $_POST['oldcatpath'];
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
								$pic = $_FILES['jpg'];
								$body = url2path( $body );
								if ( 0 < $pic['size'] )
								{
												$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								}
								if ( $title == "" )
								{
												echo $Meta.$strHzNotice3;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strHzNotice4;
												exit( );
								}
								if ( $cent == "" )
								{
												echo $Meta.$strHzNotice5;
												exit( );
								}
								if ( $kucun == "" )
								{
												echo $Meta.$strHzNotice6;
												exit( );
								}
								if ( 65000 < strlen( $memo ) )
								{
												echo $Meta.$strHzNotice7;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strHzNotice8;
												exit( );
								}
								$uptime = time( );
								$msql->query( "select catpath from {P}_hz_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "huanzeng/pics/".$nowdate;
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
												$msql->query( "select src from {P}_hz_con where id='{$id}'" );
												if ( $msql->next_record( ) )
												{
																$oldsrc = $msql->f( "src" );
												}
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																unlink( ROOTPATH.$oldsrc );
												}
												$msql->query( "update {P}_hz_con set src='{$src}' where id='{$id}'" );
								}
								$msql->query( "update {P}_hz_con set \r\n\t\t\ttitle='{$title}',\r\n\t\t\tcent='{$cent}',\r\n\t\t\tkucun='{$kucun}',\r\n\t\t\tmemo='{$memo}',\r\n\t\t    body='{$body}',\r\n\t\t\tcatid='{$catid}',\r\n\t\t\tcatpath='{$catpath}',\r\n\t\t\tuptime='{$uptime}',\r\n\t\t\tauthor='{$author}',\r\n\t\t\tsource='{$source}',\r\n\t\t\tproj='{$projpath}',\r\n\t\t\ttags='{$tagstr}',\r\n\t\t\tprop1='{$prop1}',\r\n\t\t\tprop2='{$prop2}',\r\n\t\t\tprop3='{$prop3}',\r\n\t\t\tprop4='{$prop4}',\r\n\t\t\tprop5='{$prop5}',\r\n\t\t\tprop6='{$prop6}',\r\n\t\t\tprop7='{$prop7}',\r\n\t\t\tprop8='{$prop8}',\r\n\t\t\tprop9='{$prop9}',\r\n\t\t\tprop10='{$prop10}',\r\n\t\t\tprop11='{$prop11}',\r\n\t\t\tprop12='{$prop12}',\r\n\t\t\tprop13='{$prop13}',\r\n\t\t\tprop14='{$prop14}',\r\n\t\t\tprop15='{$prop15}',\r\n\t\t\tprop16='{$prop16}',\r\n\t\t\tprop17='{$prop17}',\r\n\t\t\tprop18='{$prop18}',\r\n\t\t\tprop19='{$prop19}',\r\n\t\t\tprop20='{$prop20}'\r\n\t\t\twhere id='{$id}'\r\n\t\t" );
								echo "OK";
								exit( );
								break;
				case "contentmodify" :
								$productpagesid = $_POST['productpagesid'];
								$pic = $_FILES['jpg'];
								$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								if ( $pic['size'] <= 0 )
								{
												echo $Meta.$strHzNotice9;
												exit( );
								}
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "huanzeng/pics/".$nowdate;
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
												$msql->query( "select src from {P}_hz_pages where id='{$productpagesid}'" );
												if ( $msql->next_record( ) )
												{
																$oldsrc = $msql->f( "src" );
												}
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																unlink( ROOTPATH.$oldsrc );
												}
												$msql->query( "update {P}_hz_pages set src='{$src}' where id='{$productpagesid}'" );
								}
								echo "OK";
								exit( );
								break;
				case "productadd" :
								trylimit( "_hz_con", 20, "id" );
								$catid = $_POST['catid'];
								$body = $_POST['body'];
								$title = htmlspecialchars( $_POST['title'] );
								$cent = htmlspecialchars( $_POST['cent'] );
								$kucun = htmlspecialchars( $_POST['kucun'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$memo = htmlspecialchars( $_POST['memo'] );
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
								$pic = $_FILES['jpg'];
								$body = url2path( $body );
								$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								if ( $title == "" )
								{
												echo $Meta.$strHzNotice3;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strHzNotice4;
												exit( );
								}
								if ( $cent == "" )
								{
												echo $Meta.$strHzNotice5;
												exit( );
								}
								if ( $kucun == "" )
								{
												echo $Meta.$strHzNotice6;
												exit( );
								}
								if ( 65000 < strlen( $memo ) )
								{
												echo $Meta.$strHzNotice7;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strHzNotice8;
												exit( );
								}
								$uptime = time( );
								$dtime = time( );
								$msql->query( "select catpath from {P}_hz_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "huanzeng/pics/".$nowdate;
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
								$msql->query( "insert into {P}_hz_con set\r\n\t\t\tcatid='{$catid}',\r\n\t\t\tcatpath='{$catpath}',\r\n\t\t\ttitle='{$title}',\r\n\t\t\tcent='{$cent}',\r\n\t\t\tkucun='{$kucun}',\r\n\t\t\tbody='{$body}',\r\n\t\t\tdtime='{$dtime}',\r\n\t\t\txuhao='0',\r\n\t\t\tcl='0',\r\n\t\t\ttj='0',\r\n\t\t\tiffb='1',\r\n\t\t\tifbold='0',\r\n\t\t\tifred='0',\r\n\t\t\ttype='gif',\r\n\t\t\tsrc='{$src}',\r\n\t\t\tuptime='{$dtime}',\r\n\t\t\tauthor='{$author}',\r\n\t\t\tsource='{$source}',\r\n\t\t\tmemberid='0',\r\n\t\t\tproj='{$projpath}',\r\n\t\t\ttags='{$tagstr}',\r\n\t\t\tsecure='0',\r\n\t\t\tmemo='{$memo}',\r\n\t\t\tprop1='{$prop1}',\r\n\t\t\tprop2='{$prop2}',\r\n\t\t\tprop3='{$prop3}',\r\n\t\t\tprop4='{$prop4}',\r\n\t\t\tprop5='{$prop5}',\r\n\t\t\tprop6='{$prop6}',\r\n\t\t\tprop7='{$prop7}',\r\n\t\t\tprop8='{$prop8}',\r\n\t\t\tprop9='{$prop9}',\r\n\t\t\tprop10='{$prop10}',\r\n\t\t\tprop11='{$prop11}',\r\n\t\t\tprop12='{$prop12}',\r\n\t\t\tprop13='{$prop13}',\r\n\t\t\tprop14='{$prop14}',\r\n\t\t\tprop15='{$prop15}',\r\n\t\t\tprop16='{$prop16}',\r\n\t\t\tprop17='{$prop17}',\r\n\t\t\tprop18='{$prop18}',\r\n\t\t\tprop19='{$prop19}',\r\n\t\t\tprop20='{$prop20}'\r\n\t\t" );
								echo "OK";
								exit( );
								break;
				case "pagedelete" :
								$delpagesid = $_POST['delpagesid'];
								$nowid = $_POST['nowid'];
								$i = 0;
								$msql->query( "select id from {P}_hz_pages where productid='{$nowid}' order by xuhao" );
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
								$msql->query( "select src from {P}_hz_pages where id='{$delpagesid}'" );
								if ( $msql->next_record( ) )
								{
												$oldsrc = $msql->f( "src" );
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																unlink( ROOTPATH.$oldsrc );
												}
								}
								$msql->query( "delete from  {P}_hz_pages where id='{$delpagesid}'" );
								echo $lastid;
								exit( );
								break;
				case "orderyun" :
								trylimit( "_hz_order", 20, "orderid" );
								needauth( 722 );
								$orderid = $_POST['orderid'];
								$nowtime = time( );
								$fsql->query( "select * from {P}_hz_order where orderid='{$orderid}'" );
								if ( $fsql->next_record( ) )
								{
												$ifyun = $fsql->f( "ifyun" );
								}
								if ( $ifyun == "0" )
								{
												$msql->query( "update {P}_hz_order set ifyun='1',yuntime='{$nowtime}' where orderid='{$orderid}'" );
												$fsql->query( "select * from {P}_hz_orderitems where orderid='{$orderid}'" );
												while ( $fsql->next_record( ) )
												{
																$id = $fsql->f( "id" );
																$gid = $fsql->f( "gid" );
																$nums = $fsql->f( "nums" );
																$msql->query( "update {P}_hz_con set kucun=kucun-{$nums} where id='{$gid}'" );
												}
												$msql->query( "update {P}_hz_orderitems set ifyun='1',yuntime='{$nowtime}' where orderid='{$orderid}'" );
								}
								echo "OK";
								exit( );
								break;
				case "ordertuiding" :
								trylimit( "_hz_order", 20, "orderid" );
								needauth( 722 );
								$orderid = $_POST['orderid'];
								$nowtime = time( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$msql->query( "select * from {P}_hz_order where orderid='{$orderid}'" );
								if ( $msql->next_record( ) )
								{
												$OrderNo = $msql->f( "OrderNo" );
												$memberid = $msql->f( "memberid" );
												$user = $msql->f( "user" );
												$totalcent = $msql->f( "totalcent" );
												$ifpay = $msql->f( "ifpay" );
												$ifyun = $msql->f( "ifyun" );
												$iftui = $msql->f( "iftui" );
												if ( $ifyun == "1" )
												{
																echo "1001";
																exit( );
												}
												if ( $ifpay == "1" && 0 < $memberid )
												{
																$centid = $GLOBALS['HZCONF']['CentType'];
																$centcol = "cent".$centid;
																$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`+{$totalcent} where memberid='{$memberid}'" );
																$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t`dtime`='{$nowtime}',\r\n\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t`memo`='{$strPayCentEvent}',\r\n\t\t\t\t\t`".$centcol."`='{$totalcent}'\r\n\t\t\t\t" );
																$fsql->query( "update {P}_hz_order set ifpay='0' where orderid='{$orderid}'" );
												}
												if ( $ifyun == "1" )
												{
																$fsql->query( "select * from {P}_hz_orderitems where orderid='{$orderid}'" );
																while ( $fsql->next_record( ) )
																{
																				$gid = $fsql->f( "gid" );
																				$nums = $fsql->f( "nums" );
																				$tsql->query( "update {P}_hz_con set kucun=kucun+{$nums} where id='{$gid}'" );
																}
																$fsql->query( "update {P}_hz_order set ifyun='0' where orderid='{$orderid}'" );
												}
												if ( $iftui == "1" )
												{
																echo "OK";
																exit( );
												}
												$fsql->query( "update {P}_hz_order set iftui='1' where orderid='{$orderid}'" );
												$fsql->query( "update {P}_hz_orderitems set iftui='1' where orderid='{$orderid}'" );
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
}
?>

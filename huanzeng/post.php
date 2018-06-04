<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define( "ROOTPATH", "../" );
include( ROOTPATH."includes/common.inc.php" );
include( "language/".$sLan.".php" );
include( "includes/hz.inc.php" );
$act = $_POST['act'];
switch ( $act )
{
				case "contentpages" :
								$hzid = $_POST['hzid'];
								$str = "<li id='p_0' class='pages'>1</li>";
								$i = 2;
								$id = 0;
								$msql->query( "select id from {P}_hz_pages where productid='{$hzid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$id = $msql->f( "id" );
												$str .= "<li id='p_".$id."' class='pages'>".$i."</li>";
												$i++;
								}
								echo $str;
								exit( );
								break;
				case "getcontent" :
								$hzid = $_POST['hzid'];
								$hzpageid = $_POST['hzpageid'];
								$RP = $_POST['RP'];
								if ( $hzpageid == "0" )
								{
												$msql->query( "select src from {P}_hz_con where id='{$hzid}'" );
												if ( $msql->next_record( ) )
												{
																$src = $msql->f( "src" );
												}
								}
								else
								{
												$msql->query( "select src from {P}_hz_pages where id='{$hzpageid}'" );
												if ( $msql->next_record( ) )
												{
																$src = $msql->f( "src" );
												}
								}
								echo $src;
								exit( );
								break;
				case "chkkucun" :
								$gid = $_POST['gid'];
								$nums = $_POST['nums'];
								if ( !islogin( ) )
								{
												echo "1000";
												exit( );
								}
								else
								{
												$memberid = $_COOKIE['MEMBERID'];
												$centid = $GLOBALS['HZCONF']['CentType'];
												$centcol = "cent".$centid;
												$fsql->query( "select * from {P}_member where memberid='{$memberid}'" );
												if ( $fsql->next_record( ) )
												{
																$mcent = $fsql->f( $centcol );
												}
								}
								$msql->query( "select * from {P}_hz_con where `id`='{$gid}'" );
								if ( $msql->next_record( ) )
								{
												$cent = $msql->f( "cent" );
												$kucun = $msql->f( "kucun" );
								}
								if ( $mcent < $cent )
								{
												echo "1001";
												exit( );
								}
								if ( $nums <= $kucun )
								{
												echo "OK";
												exit( );
								}
								else
								{
												echo "1002";
												exit( );
								}
								break;
				case "getmemberinfo" :
								if ( islogin( ) )
								{
												$memberid = $_COOKIE['MEMBERID'];
												$fsql->query( "select * from {P}_hz_mzone where memberid='{$memberid}'" );
												if ( $fsql->next_record( ) )
												{
																$name = $fsql->f( "name" );
																$zone = $fsql->f( "zone" );
																$postcode = $fsql->f( "postcode" );
																$tel = $fsql->f( "tel" );
												}
												$str = "var M={N:'".$name."',Z:'".$zone."',P:'".$postcode."',T:'".$tel."'}";
												echo $str;
												exit( );
								}
								break;
				case "orderformsubmit" :
								$name = $_POST['name'];
								$address = $_POST['address'];
								$postcode = $_POST['postcode'];
								$tel = $_POST['tel'];
								$bz = htmlspecialchars( $_POST['bz'] );
								$CARTSTR = $_COOKIE['HZCART'];
								$array = explode( "#", $CARTSTR );
								$tnums = sizeof( $array ) - 1;
								if ( $tnums < 1 )
								{
												echo "1000";
												exit( );
								}
								if ( !islogin( ) )
								{
												echo "1001";
												exit( );
								}
								else
								{
												$memberid = $_COOKIE['MEMBERID'];
												$user = $_COOKIE['MUSER'];
								}
								$tcent = 0;
								$t = 0;
								for ( ;	$t < $tnums;	$t++	)
								{
												$fff = explode( "|", $array[$t] );
												$gid = $fff[0];
												$acc = $fff[1];
												$fsql->query( "select * from {P}_hz_con where id='{$gid}'" );
												if ( $fsql->next_record( ) )
												{
																$title = $fsql->f( "title" );
																$cent = $fsql->f( "cent" );
																$kucun = $fsql->f( "kucun" );
																if ( $acc <= 0 )
																{
																				echo "1002";
																				exit( );
																}
																if ( $kucun < $acc )
																{
																				echo "1003";
																				exit( );
																}
																$cent = $cent * $acc;
																$arr[] = array( "memberid" => $memberid, "gid" => $gid, "goods" => $title, "nums" => $acc, "cent" => $cent );
																$items .= $title."(".$acc.") ";
												}
												$tcent = $tcent + $cent;
								}
								$centid = $GLOBALS['HZCONF']['CentType'];
								$centcol = "cent".$centid;
								$msql->query( "select * from {P}_member where memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
												$mcent = $msql->f( $centcol );
												if ( $mcent < $tcent && 0 < $tcent )
												{
																echo "1004";
																exit( );
												}
								}
								$dtime = time( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$msql->query( "insert into {P}_hz_order set\r\n\t\t\t`memberid`='{$memberid}',\r\n\t\t\t`user`='{$user}',\r\n\t\t\t`name`='{$name}',\r\n\t\t\t`tel`='{$tel}',\r\n\t\t\t`address`='{$address}',\r\n\t\t\t`postcode`='{$postcode}',\r\n\t\t\t`totalcent`='{$tcent}',\r\n\t\t\t`iflook`='0',\r\n\t\t\t`ifyun`='0',\r\n\t\t\t`ifpay`='0',\r\n\t\t\t`ifok`='0',\r\n\t\t\t`iftui`='0',\r\n\t\t\t`ip`='{$ip}',\r\n\t\t\t`dtime`='{$dtime}',\r\n\t\t\t`paytime`='0',\r\n\t\t\t`yuntime`='0',\r\n\t\t\t`bz`='{$bz}',\r\n\t\t\t`items`='{$items}'\r\n\t\t" );
								$orderid = $msql->instid( );
								$OrderNo = $orderid + 100000;
								$msql->query( "update {P}_hz_order set OrderNo='{$OrderNo}' where orderid='{$orderid}'" );
								$inums = sizeof( $arr );
								$i = 0;
								for ( ;	$i < $inums;	$i++	)
								{
												$memberid = $arr[$i]['memberid'];
												$gid = $arr[$i]['gid'];
												$goods = $arr[$i]['goods'];
												$nums = $arr[$i]['nums'];
												$cent = $arr[$i]['cent'];
												$msql->query( "insert into {P}_hz_orderitems set\r\n\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t`orderid`='{$orderid}',\r\n\t\t\t\t`gid`='{$gid}',\r\n\t\t\t\t`goods`='{$goods}',\r\n\t\t\t\t`nums`='{$nums}',\r\n\t\t\t\t`cent`='{$cent}',\r\n\t\t\t\t`ifyun`='0',\r\n\t\t\t\t`iftui`='0',\r\n\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t`yuntime`='0'\r\n\t\t\t" );
								}
								$fsql->query( "select * from {P}_hz_mzone where memberid='{$memberid}'" );
								if ( $fsql->next_record( ) )
								{
												$msql->query( "update {P}_hz_mzone set\r\n\t\t\t\t`name`='{$name}',\r\n\t\t\t\t`zone`='{$address}',\r\n\t\t\t\t`postcode`='{$postcode}',\r\n\t\t\t\t`tel`='{$tel}'\r\n\t\t\twhere `memberid`='{$memberid}'" );
								}
								else
								{
												$msql->query( "insert into {P}_hz_mzone set\r\n\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t`name`='{$name}',\r\n\t\t\t\t`zone`='{$address}',\r\n\t\t\t\t`postcode`='{$postcode}',\r\n\t\t\t\t`tel`='{$tel}'\r\n\t\t\t" );
								}
								if ( islogin( ) )
								{
												$msql->query( "select * from {P}_member where memberid='{$memberid}'" );
												if ( $msql->next_record( ) )
												{
																$mcent = $msql->f( $centcol );
																if ( $tcent <= $mcent && 0 <= $tcent )
																{
																				$fsql->query( "update {P}_hz_order set ifpay='1',paytime='{$dtime}' where orderid='{$orderid}'" );
																				$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`-{$tcent} where memberid='{$memberid}'" );
																				$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t\t`memo`='{$strPayCentEvent}',\r\n\t\t\t\t\t\t`".$centcol."`='-{$tcent}'\r\n\t\t\t\t\t" );
																}
												}
								}
								echo "OK_".$orderid."_".$tcent;
								exit( );
								break;
}
?>

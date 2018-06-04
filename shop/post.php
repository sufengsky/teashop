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
include( "includes/shop.inc.php" );
$act = $_POST['act'];
switch ( $act )
{
				case "contentpages" :
								$shopid = $_POST['shopid'];
								$str = "<li id='p_0' class='pages'>1</li>";
								$i = 2;
								$id = 0;
								$msql->query( "select id from {P}_shop_pages where gid='{$shopid}' order by xuhao" );
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
								$shopid = $_POST['shopid'];
								$shoppageid = $_POST['shoppageid'];
								$RP = $_POST['RP'];
								if ( $shoppageid == "0" )
								{
												$msql->query( "select src from {P}_shop_con where id='{$shopid}'" );
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
								}
								echo $src;
								exit( );
								break;
				case "getnewcomment" :
								$rid = $_POST['rid'];
								$RP = $_POST['RP'];
								$fsql->query( "select * from {P}_comment where iffb='1' and catid='11' and pid='0' and rid='{$rid}' order by dtime desc limit 0,1" );
								if ( $fsql->next_record( ) )
								{
												$id = $fsql->f( "id" );
												$memberid = $fsql->f( "memberid" );
												$title = $fsql->f( "title" );
												$body = $fsql->f( "body" );
												$dtime = $fsql->f( "dtime" );
												$uptime = $fsql->f( "uptime" );
												$cl = $fsql->f( "cl" );
												$lastname = $fsql->f( "lastname" );
												$pj1 = $fsql->f( "pj1" );
												$count = 0;
												$body = strip_tags( $body );
												if ( $memberid == "-1" )
												{
																$pname = $strGuest;
																$nowface = "1";
																$memberurl = "#";
												}
												else
												{
																$tsql->query( "select * from {P}_member where memberid='{$memberid}'" );
																if ( $tsql->next_record( ) )
																{
																				$pname = $tsql->f( "pname" );
																				$nowface = $tsql->f( "nowface" );
																}
																$memberurl = $RP."member/home.php?mid=".$memberid;
												}
												$dtime = date( "Y-m-d", $dtime );
												$title = csubstr( $title, 0, 20 );
												$body = csubstr( $body, 0, 120 )." ...";
												$link = $RP."comment/html/?".$id.".html";
												$face = $RP."member/face/".$nowface.".gif";
												$pjstr = shopstarnums( $pj1, $RP );
												$var = array( "title" => $title, "dtime" => $dtime, "pname" => $pname, "body" => $body, "count" => $count, "cl" => $cl, "link" => $link, "memberurl" => $memberurl, "lastname" => $lastname, "face" => $face, "pjstr" => $pjstr, "target" => $target );
												$Temp = loadcommontemp( "tpl_shop_comment.htm" );
												$TempArr = splittbltemp( $Temp );
												$str = showtpltemp( $TempArr['list'], $var );
								}
								echo $str;
								exit( );
								break;
				case "zhichi" :
								$shopid = $_POST['shopid'];
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$memberid = $_COOKIE['MEMBERID'];
								$mstr = "|".$memberid."|";
								$msql->query( "select tplog,zhichi,memberid from {P}_shop_con where id='{$shopid}'" );
								if ( $msql->next_record( ) )
								{
												$tplog = $msql->f( "tplog" );
												$zhichi = $msql->f( "zhichi" );
												$mid = $msql->f( "memberid" );
								}
								if ( strstr( $tplog, $mstr ) )
								{
												echo "L1";
												exit( );
								}
								else
								{
												$tplog = $tplog.$mstr;
								}
								$msql->query( "update {P}_shop_con set zhichi=zhichi+1,tplog='{$tplog}' where id='{$shopid}'" );
								$num = $zhichi + 1;
								echo $num;
								exit( );
								break;
				case "fandui" :
								$shopid = $_POST['shopid'];
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$memberid = $_COOKIE['MEMBERID'];
								$mstr = "|".$memberid."|";
								$msql->query( "select tplog,fandui,memberid from {P}_shop_con where id='{$shopid}'" );
								if ( $msql->next_record( ) )
								{
												$tplog = $msql->f( "tplog" );
												$fandui = $msql->f( "fandui" );
												$mid = $msql->f( "memberid" );
								}
								if ( strstr( $tplog, $mstr ) )
								{
												echo "L1";
												exit( );
								}
								else
								{
												$tplog = $tplog.$mstr;
								}
								$msql->query( "update {P}_shop_con set fandui=fandui+1,tplog='{$tplog}' where id='{$shopid}'" );
								$num = $fandui + 1;
								echo $num;
								exit( );
								break;
				case "addfav" :
								$shopid = $_POST['shopid'];
								$url = $_POST['url'];
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$memberid = $_COOKIE['MEMBERID'];
								$msql->query( "select title from {P}_shop_con where id='{$shopid}'" );
								if ( $msql->next_record( ) )
								{
												$title = $msql->f( "title" );
								}
								$msql->query( "select id from {P}_member_fav where url='{$url}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
												echo "L1";
												exit( );
								}
								$msql->query( "insert into {P}_member_fav set title='{$title}',url='{$url}',memberid='{$memberid}'" );
								echo "OK";
								exit( );
								break;
				case "chkkucun" :
								$gid = $_POST['gid'];
								$nums = $_POST['nums'];
								$msql->query( "select kucun from {P}_shop_con where `id`='{$gid}'" );
								if ( $msql->next_record( ) )
								{
												$kucun = $msql->f( "kucun" );
								}
								if ( $nums <= $kucun )
								{
												echo "OK";
												exit( );
								}
								else
								{
												echo "1000";
												exit( );
								}
								break;
				case "getyunzone" :
								$pid = $_POST['pid'];
								$str = "";
								$msql->query( "select * from {P}_shop_yunzone where pid='{$pid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$zoneid = $msql->f( "id" );
												$zone = $msql->f( "zone" );
												$str .= "<option value='".$zoneid."'>".$zone."</option>";
								}
								echo $str;
								exit( );
								break;
				case "getyunmethod" :
								$zoneid = $_POST['zoneid'];
								$zonestr = "|".$zoneid."|";
								$str = "";
								$msql->query( "select * from {P}_shop_yun where `zonestr` like '%".$zonestr."%' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$yunid = $msql->f( "id" );
												$yunname = $msql->f( "yunname" );
												$str .= "<option value='".$yunid."'>".$yunname."</option>";
								}
								echo $str;
								exit( );
								break;
				case "getyunintro" :
								$yunid = $_POST['yunid'];
								$msql->query( "select * from {P}_shop_yun where id='{$yunid}'" );
								if ( $msql->next_record( ) )
								{
												$memo = $msql->f( "memo" );
								}
								$memo = nl2br( $memo );
								echo $memo;
								exit( );
								break;
				case "getpaymethod" :
								if ( islogin( ) )
								{
												$str = "<option value='0'>".$strMemberAccountPay."</option>";
								}
								else
								{
												$str = "";
								}
								$msql->query( "select * from {P}_member_paycenter where ifuse='1' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$id = $msql->f( "id" );
												$pcenter = $msql->f( "pcenter" );
												$str .= "<option value='".$id."'>".$pcenter."</option>";
								}
								echo $str;
								exit( );
								break;
				case "getpaymethodintro" :
								$payid = $_POST['payid'];
								$msql->query( "select * from {P}_member_paycenter where id='{$payid}'" );
								if ( $msql->next_record( ) )
								{
												$intro = $msql->f( "intro" );
								}
								$intro = nl2br( $intro );
								echo $intro;
								exit( );
								break;
				case "accountyunfei" :
								$yunid = $_POST['yunid'];
								$tweight = $_POST['tweight'];
								$tjine = $_POST['tjine'];
								$msql->query( "select * from {P}_shop_yun where id='{$yunid}'" );
								if ( $msql->next_record( ) )
								{
												$yunname = $msql->f( "yunname" );
												$dinge = $msql->f( "dinge" );
												$yunfei = $msql->f( "yunfei" );
												$gs = $msql->f( "gs" );
												$dgs = $msql->f( "dgs" );
												$baojia = $msql->f( "baojia" );
												$baofei = $msql->f( "baofei" );
												$baodi = $msql->f( "baodi" );
								}
								if ( $dinge == "0" )
								{
												$yunfei = countyunfeiw( $tweight, $tjine, $gs );
								}
								if ( $dinge == "2" )
								{
												$yunfei = countyunfeip( $tweight, $tjine, $dgs );
								}
								$yunfei = number_format( $yunfei, 2, ".", "" );
								if ( $baojia == "1" )
								{
												$bao = $tjine * $baofei / 100;
												if ( $bao < $baodi )
												{
																$bao = $baodi;
												}
												$bao = number_format( $bao, 2, ".", "" );
								}
								else
								{
												$bao = "0.00";
								}
								echo "var J={Y:'".$yunfei."',B:'".$bao."'}";
								exit( );
								break;
				case "getmemberaccount" :
								if ( islogin( ) )
								{
												$memberid = $_COOKIE['MEMBERID'];
												$fsql->query( "select account from {P}_member where memberid='{$memberid}'" );
												if ( $fsql->next_record( ) )
												{
																$account = $fsql->f( "account" );
																echo $account;
												}
												else
												{
																echo "0";
												}
								}
								else
								{
												echo "0";
								}
								exit( );
								break;
				case "getmemberinfo" :
								if ( islogin( ) )
								{
												$memberid = $_COOKIE['MEMBERID'];
												$fsql->query( "select * from {P}_member where memberid='{$memberid}'" );
												if ( $fsql->next_record( ) )
												{
																$name = $fsql->f( "name" );
																$tel = $fsql->f( "tel" );
																$mov = $fsql->f( "mov" );
																$postcode = $fsql->f( "postcode" );
																$email = $fsql->f( "email" );
																$qq = $fsql->f( "qq" );
												}
												$fsql->query( "select * from {P}_shop_order where memberid='{$memberid}' order by dtime desc limit 0,1" );
												if ( $fsql->next_record( ) )
												{
																$s_name = $fsql->f( "s_name" );
																$s_tel = $fsql->f( "s_tel" );
																$s_mobi = $fsql->f( "s_mobi" );
																$s_postcode = $fsql->f( "s_postcode" );
																$s_addr = $fsql->f( "s_addr" );
																$s_qq = $fsql->f( "s_qq" );
																$yunzoneid = $fsql->f( "yunzoneid" );
																$yunid = $fsql->f( "yunid" );
												}
												$fsql->query( "select pid from {P}_shop_yunzone where id='{$yunzoneid}'" );
												if ( $fsql->next_record( ) )
												{
																$zonepid = $fsql->f( "pid" );
												}
												$str = "var M={N:'".$name."',T:'".$tel."',M:'".$mov."',P:'".$postcode."',E:'".$email."',Q:'".$qq."',";
												$str .= "SN:'".$s_name."',ST:'".$s_tel."',SM:'".$s_mobi."',SP:'".$s_postcode."',SA:'".$s_addr."',SQ:'".$s_qq."',SZ:'".$yunzoneid."',SZP:'".$zonepid."',SYU:'".$yunid."'}";
												echo $str;
												exit( );
								}
								break;
				case "orderformsubmit" :
								$name = $_POST['name'];
								$tel = $_POST['tel'];
								$mobi = $_POST['mobi'];
								$email = $_POST['email'];
								$qq = $_POST['qq'];
								$s_name = $_POST['s_name'];
								$s_tel = $_POST['s_tel'];
								$s_addr = $_POST['s_addr'];
								$s_mobi = $_POST['s_mobi'];
								$s_postcode = $_POST['s_postcode'];
								$s_qq = $_POST['s_qq'];
								$bz = htmlspecialchars( $_POST['bz'] );
								$zoneid = $_POST['zoneid'];
								$yunmethod = $_POST['yunmethod'];
								$payid = $_POST['payid'];
								$nomemberorder = $GLOBALS['SHOPCONF']['NoMemberOrder'];
								$CARTSTR = $_COOKIE['SHOPCART'];
								$array = explode( "#", $CARTSTR );
								$tnums = sizeof( $array ) - 1;
								if ( $tnums < 1 )
								{
												echo "1000";
												exit( );
								}
								if ( $nomemberorder != "1" && !islogin( ) )
								{
												echo "1005";
												exit( );
								}
								if ( $zoneid == "" || $zoneid == "0" )
								{
												echo "1001";
												exit( );
								}
								if ( $yunmethod == "" || $yunmethod == "0" )
								{
												echo "1004";
												exit( );
								}
								if ( $payid == "" )
								{
												echo "1002";
												exit( );
								}
								if ( $payid == "0" && !islogin( ) )
								{
												echo "1003";
												exit( );
								}
								if ( islogin( ) )
								{
												$memberid = $_COOKIE['MEMBERID'];
												$user = $_COOKIE['MUSER'];
								}
								else
								{
												$memberid = 0;
								}
								$tjine = 0;
								$tweight = 0;
								$kk = 0;
								$t = 0;
								for ( ;	$t < $tnums;	$t++	)
								{
												$fff = explode( "|", $array[$t] );
												$gid = $fff[0];
												$acc = $fff[1];
												$fsql->query( "select * from {P}_shop_con where id='{$gid}'" );
												if ( $fsql->next_record( ) )
												{
																$bn = $fsql->f( "bn" );
																$title = $fsql->f( "title" );
																$danwei = $fsql->f( "danwei" );
																$price = $fsql->f( "price" );
																$cent = $fsql->f( "cent" );
																$weight = $fsql->f( "weight" );
																$price = getmemberprice( $gid, $price );
																$jine = $price * $acc;
																$weight = $weight * $acc;
																$cent = accountcent( $cent, $price ) * $acc;
																$arr[] = array( "memberid" => $memberid, "gid" => $gid, "bn" => $bn, "goods" => $title, "price" => $price, "weight" => $weight, "nums" => $acc, "danwei" => $danwei, "jine" => $jine, "cent" => $cent );
																$items .= $title."(".$acc.") ";
												}
												$tjine = $tjine + $jine;
												$tcent = $tcent + $cent;
												$tweight = $tweight + $weight;
												$kk++;
								}
								$tjine = number_format( $tjine, 2, ".", "" );
								$msql->query( "select * from {P}_shop_yun where id='{$yunmethod}'" );
								if ( $msql->next_record( ) )
								{
												$yunname = $msql->f( "yunname" );
												$dinge = $msql->f( "dinge" );
												$yunfei = $msql->f( "yunfei" );
												$gs = $msql->f( "gs" );
												$dgs = $msql->f( "dgs" );
												$baojia = $msql->f( "baojia" );
												$baofei = $msql->f( "baofei" );
												$baodi = $msql->f( "baodi" );
								}
								if ( $dinge == "0" )
								{
												$yunfei = countyunfeiw( $tweight, $tjine, $gs );
								}
								if ( $dinge == "2" )
								{
												$yunfei = countyunfeip( $tweight, $tjine, $dgs );
								}
								$yunfei = number_format( $yunfei, 2, ".", "" );
								if ( $baojia == "1" )
								{
												$bao = $tjine * $baofei / 100;
												if ( $bao < $baodi )
												{
																$bao = $baodi;
												}
												$bao = number_format( $bao, 2, ".", "" );
								}
								else
								{
												$bao = "0.00";
								}
								$ordertotal = $tjine + $yunfei + $bao;
								$ordertotal = number_format( $ordertotal, 2, ".", "" );
								if ( $payid != "0" )
								{
												$msql->query( "select * from {P}_member_paycenter where id='{$payid}'" );
												if ( $msql->next_record( ) )
												{
																$pcenter = $msql->f( "pcenter" );
																$pcentertype = $msql->f( "pcentertype" );
												}
								}
								else
								{
												$pcenter = $strMemberAccountPay;
								}
								$dtime = time( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$msql->query( "insert into {P}_shop_order set\r\n\t\t`memberid`='{$memberid}',\r\n\t\t`user`='{$user}',\r\n\t\t`name`='{$name}',\r\n\t\t`tel`='{$tel}',\r\n\t\t`mobi`='{$mobi}',\r\n\t\t`qq`='{$qq}',\r\n\t\t`email`='{$email}',\r\n\t\t`s_name`='{$s_name}',\r\n\t\t`s_tel`='{$s_tel}',\r\n\t\t`s_addr`='{$s_addr}',\r\n\t\t`s_postcode`='{$s_postcode}',\r\n\t\t`s_mobi`='{$s_mobi}',\r\n\t\t`s_qq`='{$s_qq}',\r\n\t\t`s_time`='{$s_time}',\r\n\t\t`goodstotal`='{$tjine}',\r\n\t\t`yunzoneid`='{$zoneid}',\r\n\t\t`yunid`='{$yunmethod}',\r\n\t\t`yuntype`='{$yunname}',\r\n\t\t`yunifbao`='{$baojia}',\r\n\t\t`yunbaofei`='{$bao}',\r\n\t\t`yunfei`='{$yunfei}',\r\n\t\t`totaloof`='{$ordertotal}',\r\n\t\t`totalcent`='{$tcent}',\r\n\t\t`totalweight`='{$tweight}',\r\n\t\t`payid`='{$payid}',\r\n\t\t`paytype`='{$pcenter}',\r\n\t\t`paytotal`='{$ordertotal}',\r\n\t\t`iflook`='1',\r\n\t\t`ifyun`='0',\r\n\t\t`ifpay`='0',\r\n\t\t`ifok`='0',\r\n\t\t`iftui`='0',\r\n\t\t`ip`='{$ip}',\r\n\t\t`dtime`='{$dtime}',\r\n\t\t`paytime`='0',\r\n\t\t`yuntime`='0',\r\n\t\t`bz`='{$bz}',\r\n\t\t`items`='{$items}'\r\n\t\t" );
								$orderid = $msql->instid( );
								$OrderNo = $orderid + 100000;
								$msql->query( "update {P}_shop_order set OrderNo='{$OrderNo}' where orderid='{$orderid}'" );
								$inums = sizeof( $arr );
								$i = 0;
								for ( ;	$i < $inums;	$i++	)
								{
												$memberid = $arr[$i]['memberid'];
												$gid = $arr[$i]['gid'];
												$bn = $arr[$i]['bn'];
												$goods = $arr[$i]['goods'];
												$price = $arr[$i]['price'];
												$weight = $arr[$i]['weight'];
												$nums = $arr[$i]['nums'];
												$danwei = $arr[$i]['danwei'];
												$jine = $arr[$i]['jine'];
												$cent = $arr[$i]['cent'];
												$msql->query( "insert into {P}_shop_orderitems set\r\n\r\n\t\t\t`memberid`='{$memberid}',\r\n\t\t\t`orderid`='{$orderid}',\r\n\t\t\t`gid`='{$gid}',\r\n\t\t\t`bn`='{$bn}',\r\n\t\t\t`goods`='{$goods}',\r\n\t\t\t`price`='{$price}',\r\n\t\t\t`weight`='{$weight}',\r\n\t\t\t`nums`='{$nums}',\r\n\t\t\t`danwei`='{$danwei}',\r\n\t\t\t`jine`='{$jine}',\r\n\t\t\t`cent`='{$cent}',\r\n\t\t\t`ifyun`='0',\r\n\t\t\t`iftui`='0',\r\n\t\t\t`dtime`='{$dtime}',\r\n\t\t\t`yuntime`='0'\r\n\t\t\t" );
								}
								if ( islogin( ) )
								{
												$fsql->query( "update {P}_member set \r\n\t\t\t`name`='{$name}',\r\n\t\t\t`tel`='{$tel}',\r\n\t\t\t`mov`='{$mobi}',\r\n\t\t\t`email`='{$email}',\r\n\t\t\t`qq`='{$qq}' where memberid='{$memberid}'" );
								}
								if ( $payid == "0" && islogin( ) )
								{
												$msql->query( "select account from {P}_member where memberid='{$memberid}'" );
												if ( $msql->next_record( ) )
												{
																$account = $msql->f( "account" );
																if ( $ordertotal <= $account && 0 <= $ordertotal )
																{
																				$fsql->query( "update {P}_member set account=account-{$ordertotal},buytotal=buytotal+{$ordertotal} where memberid='{$memberid}'" );
																				$fsql->query( "update {P}_shop_order set iflook='1',ifpay='1',paytime='{$dtime}' where orderid='{$orderid}'" );
																				$fsql->query( "insert into {P}_member_buylist set \r\n\t\t\t\t\t\t`buyfrom`='{$strModuleShop}',\r\n\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t`orderid`='{$orderid}',\r\n\t\t\t\t\t\t`payid`='0',\r\n\t\t\t\t\t\t`paytype`='{$strMemberAccountPay}',\r\n\t\t\t\t\t\t`paytotal`='{$ordertotal}',\r\n\t\t\t\t\t\t`daytime`='{$dtime}',\r\n\t\t\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t\t\t`OrderNo`='{$OrderNo}',\r\n\t\t\t\t\t\t`logname`='{$user}'\r\n\t\t\t\t\t" );
																				$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
																				$centid = $GLOBALS['SHOPCONF']['CentId'];
																				$centcol = "cent".$centid;
																				if ( $centopen == "1" )
																				{
																								$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`+{$tcent} where memberid='{$memberid}'" );
																								$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t\t\t`memo`='{$strPayCentEvent}',\r\n\t\t\t\t\t\t\t`".$centcol."`='{$tcent}'\r\n\t\t\t\t\t\t" );
																				}
																				membercentupdate( $memberid, "313" );
																				echo "OK_PAYED_".$orderid;
																				exit( );
																}
												}
								}
								echo "OK_".$orderid;
								exit( );
								break;
				case "payfrommemberaccount" :
								$orderid = $_POST['orderid'];
								if ( !islogin( ) )
								{
												echo "1006";
												exit( );
								}
								$dtime = time( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$user = $_COOKIE['MUSER'];
								$memberid = $_COOKIE['MEMBERID'];
								$msql->query( "select * from {P}_shop_order where orderid='{$orderid}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
												$memberid = $msql->f( "memberid" );
												$OrderNo = $msql->f( "OrderNo" );
												$paytotal = $msql->f( "paytotal" );
												$payid = $msql->f( "payid" );
												$ifpay = $msql->f( "ifpay" );
												$iftui = $msql->f( "iftui" );
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
												if ( $payid == "0" )
												{
																$msql->query( "select account from {P}_member where memberid='{$memberid}'" );
																if ( $msql->next_record( ) )
																{
																				$account = $msql->f( "account" );
																				if ( $paytotal <= $account && 0 <= $paytotal )
																				{
																								$fsql->query( "update {P}_member set account=account-{$paytotal},buytotal=buytotal+{$paytotal} where memberid='{$memberid}'" );
																								$fsql->query( "update {P}_shop_order set iflook='1',ifpay='1',paytime='{$dtime}' where orderid='{$orderid}'" );
																								$fsql->query( "insert into {P}_member_buylist set \r\n\t\t\t\t\t\t\t\t`buyfrom`='{$strModuleShop}',\r\n\t\t\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t\t\t`orderid`='{$orderid}',\r\n\t\t\t\t\t\t\t\t`payid`='0',\r\n\t\t\t\t\t\t\t\t`paytype`='{$strMemberAccountPay}',\r\n\t\t\t\t\t\t\t\t`paytotal`='{$paytotal}',\r\n\t\t\t\t\t\t\t\t`daytime`='{$dtime}',\r\n\t\t\t\t\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t\t\t\t\t`OrderNo`='{$OrderNo}',\r\n\t\t\t\t\t\t\t\t`logname`='{$user}'\r\n\t\t\t\t\t\t\t" );
																								$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
																								$centid = $GLOBALS['SHOPCONF']['CentId'];
																								$centcol = "cent".$centid;
																								if ( $centopen == "1" )
																								{
																												$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`+{$tcent} where memberid='{$memberid}'" );
																												$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t\t\t\t\t`memo`='{$strPayCentEvent}',\r\n\t\t\t\t\t\t\t\t\t`".$centcol."`='{$tcent}'\r\n\t\t\t\t\t\t\t\t" );
																								}
																								membercentupdate( $memberid, "313" );
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
																				echo "1005";
																				exit( );
																}
												}
												else
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
								break;
				case "orderlook" :
								$orderno = $_POST['orderno'];
								$sname = $_POST['sname'];
								$fsql->query( "select orderid from {P}_shop_order where OrderNo='{$orderno}' and s_name='{$sname}'" );
								if ( $fsql->next_record( ) )
								{
												$md = substr( md5( $orderno.$sname ), 0, 5 );
												echo "OK_".$md;
												exit( );
								}
								else
								{
												echo "1000";
												exit( );
								}
								break;
}
?>

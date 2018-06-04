<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

function getpayval( $back_pcenter )
{
				global $msql;
				$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
				$msql->query( "select * from {P}_member_paycenter where hbtype='{$back_pcenter}' and ifuse='1' limit 0,1" );
				if ( $msql->next_record( ) )
				{
								$pv['payid'] = $msql->f( "id" );
								$pv['pcenteruser'] = $msql->f( "pcenteruser" );
								$pv['pcenterkey'] = $msql->f( "pcenterkey" );
								$pv['key1'] = $msql->f( "key1" );
								$pv['key2'] = $msql->f( "key2" );
								return $pv;
				}
				else
				{
								echo $Meta."支付返回调试错误：没有和".$back_pcenter."匹配的可用支付方式";
								exit( );
				}
}

function payback( $back_payid, $back_coltype, $back_orderid, $back_fee )
{
				global $msql;
				global $fsql;
				$back_coltype = strtolower( $back_coltype );
				$dtime = time( );
				$ip = $_SERVER['REMOTE_ADDR'];
				$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
				if ( $back_coltype == "" )
				{
								echo $Meta."支付返回调试错误：缺少模块代码";
								exit( );
				}
				$msql->query( "select * from {P}_base_coltype where coltype='{$back_coltype}'" );
				if ( $msql->next_record( ) )
				{
								$colname = $msql->f( "colname" );
				}
				else
				{
								echo $Meta."支付返回调试错误：指定的模块(".$back_coltype.")不存在";
								exit( );
				}
				switch ( $back_coltype )
				{
								case "shop" :
												$msql->query( "select * from {P}_shop_order where orderid='{$back_orderid}' and paytotal='{$back_fee}'" );
												if ( $msql->next_record( ) )
												{
																$memberid = $msql->f( "memberid" );
																$payid = $msql->f( "payid" );
																$paytype = $msql->f( "paytype" );
																$ifpay = $msql->f( "ifpay" );
																$iftui = $msql->f( "iftui" );
																$OrderNo = $msql->f( "OrderNo" );
																$tcent = $msql->f( "totalcent" );
																if ( $back_payid != $payid )
																{
																				echo $Meta."支付返回调试错误：支付方式编号不匹配(可能是同一支付接口存在多条支付方式记录)";
																				exit( );
																}
																if ( $ifpay == "1" )
																{
																				echo $Meta."订单[shop](".$back_orderid.")已经是付款状态了，不能重复提交";
																				exit( );
																}
																if ( $iftui == "1" )
																{
																				echo $Meta."订单[shop](".$back_orderid.")已经退订，支付确认失败";
																				exit( );
																}
																if ( $memberid == "0" )
																{
																				$fsql->query( "update {P}_shop_order set ifpay='1',paytime='{$dtime}' where orderid='{$back_orderid}' and paytotal='{$back_fee}'" );
																				header( "location:".ROOTPATH."shop/orderpay.php?act=ok&orderid=".$back_orderid );
																				exit( );
																}
																else
																{
																				$mymemberid = $_COOKIE['MEMBERID'];
																				$user = $_COOKIE['MUSER'];
																				if ( $mymemberid == $memberid )
																				{
																								$fsql->query( "update {P}_member set buytotal=buytotal+{$back_fee},paytotal=paytotal+{$back_fee} where memberid='{$memberid}'" );
																								$fsql->query( "update {P}_shop_order set ifpay='1',paytime='{$dtime}' where orderid='{$back_orderid}' and paytotal='{$back_fee}'" );
																								$fsql->query( "insert into {P}_member_buylist set \r\n\t\t\t\t\t\t`buyfrom`='{$colname}',\r\n\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t`orderid`='{$back_orderid}',\r\n\t\t\t\t\t\t`payid`='{$payid}',\r\n\t\t\t\t\t\t`paytype`='{$paytype}',\r\n\t\t\t\t\t\t`paytotal`='{$back_fee}',\r\n\t\t\t\t\t\t`daytime`='{$dtime}',\r\n\t\t\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t\t\t`OrderNo`='{$OrderNo}',\r\n\t\t\t\t\t\t`logname`='{$user}'\r\n\t\t\t\t\t\t" );
																								$fsql->query( "insert into {P}_member_pay set \r\n\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t`payid`='{$payid}',\r\n\t\t\t\t\t\t`oof`='{$back_fee}',\r\n\t\t\t\t\t\t`method`='{$paytype}',\r\n\t\t\t\t\t\t`type`='订单付款',\r\n\t\t\t\t\t\t`addtime`='{$dtime}',\r\n\t\t\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t\t\t`logname`='{$user}'\r\n\t\t\t\t\t\t" );
																								include( ROOTPATH."shop/includes/shop.inc.php" );
																								$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
																								$centid = $GLOBALS['SHOPCONF']['CentId'];
																								$centcol = "cent".$centid;
																								if ( $centopen == "1" )
																								{
																												$fsql->query( "update {P}_member set `".$centcol."`=`".$centcol."`+{$tcent} where memberid='{$memberid}'" );
																												$fsql->query( "insert into {P}_member_centlog set \r\n\t\t\t\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t\t\t\t`dtime`='{$dtime}',\r\n\t\t\t\t\t\t\t\t`event`='0',\r\n\t\t\t\t\t\t\t\t`memo`='订单付款',\r\n\t\t\t\t\t\t\t\t`".$centcol."`='{$tcent}'\r\n\t\t\t\t\t\t\t" );
																								}
																								membercentupdate( $memberid, "313" );
																								header( "location:".ROOTPATH."shop/orderpay.php?act=ok&orderid=".$back_orderid );
																								exit( );
																				}
																				else
																				{
																								echo $Meta."支付返回调试错误：当前登录的会员和订单会员身份不符";
																								exit( );
																				}
																}
												}
												else
												{
																echo $Meta."支付返回调试错误：指定的订单[shop](".$back_orderid.")不存在或订单数据不匹配";
																exit( );
												}
												break;
								case "member" :
												$msql->query( "select * from {P}_member_onlinepay where id='{$back_orderid}' and paytotal='{$back_fee}'" );
												if ( $msql->next_record( ) )
												{
																$memberid = $msql->f( "memberid" );
																$payid = $msql->f( "payid" );
																$paytype = $msql->f( "paytype" );
																$paytotal = $msql->f( "paytotal" );
																$ifpay = $msql->f( "ifpay" );
																if ( $back_payid != $payid )
																{
																				echo $Meta."支付返回调试错误：支付方式编号不匹配(可能是同一支付接口存在多条支付方式记录)";
																				exit( );
																}
																if ( $ifpay == "1" )
																{
																				echo $Meta."本次充值(".$back_orderid.")已经完成，不能重复提交";
																				exit( );
																}
																$mymemberid = $_COOKIE['MEMBERID'];
																$user = $_COOKIE['MUSER'];
																if ( $mymemberid == $memberid )
																{
																				$fsql->query( "update {P}_member_onlinepay set ifpay='1',backtime='{$dtime}' where id='{$back_orderid}' and paytotal='{$back_fee}'" );
																				$fsql->query( "update {P}_member set account=account+{$back_fee},paytotal=paytotal+{$back_fee} where memberid='{$memberid}'" );
																				$fsql->query( "insert into {P}_member_pay set \r\n\t\t\t\t\t`memberid`='{$memberid}',\r\n\t\t\t\t\t`payid`='{$payid}',\r\n\t\t\t\t\t`oof`='{$back_fee}',\r\n\t\t\t\t\t`method`='{$paytype}',\r\n\t\t\t\t\t`type`='帐户充值',\r\n\t\t\t\t\t`addtime`='{$dtime}',\r\n\t\t\t\t\t`ip`='{$ip}',\r\n\t\t\t\t\t`logname`='{$user}'\r\n\t\t\t\t\t" );
																				header( "location:".ROOTPATH."member/member_onlinepay.php?act=ok&payorderid=".$back_orderid );
																				exit( );
																}
																else
																{
																				echo $Meta."支付返回调试错误：当前登录的会员和充值提交时的会员身份不符";
																				exit( );
																}
												}
												else
												{
																echo $Meta."支付返回调试错误：指定的充值记录(".$back_orderid.")不存在或充值记录数据不匹配";
																exit( );
												}
												break;
								default :
												echo $Meta."支付返回调试错误：模块代码(".$back_coltype.")不可识别";
												exit( );
												break;
				}
}

?>

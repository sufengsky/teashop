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
needauth( 321 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/orderpay.js\"></script>\r\n</head>\r\n<body>\r\n";
$orderid = $_GET['orderid'];
$msql->query( "select * from {P}_shop_order where `orderid`='{$orderid}' limit 0,1" );
if ( $msql->next_record( ) )
{
				$OrderNo = $msql->f( "OrderNo" );
				$user = $msql->f( "user" );
				$name = $msql->f( "name" );
				$memberid = $msql->f( "memberid" );
				$goodstotal = $msql->f( "goodstotal" );
				$yunzoneid = $msql->f( "yunzoneid" );
				$yunid = $msql->f( "yunid" );
				$yuntype = $msql->f( "yuntype" );
				$yunifbao = $msql->f( "yunifbao" );
				$yunbaofei = $msql->f( "yunbaofei" );
				$yunfei = $msql->f( "yunfei" );
				$totaloof = $msql->f( "totaloof" );
				$paytotal = $msql->f( "paytotal" );
				$payid = $msql->f( "payid" );
				$paytype = $msql->f( "paytype" );
				$ifpay = $msql->f( "ifpay" );
				$ifok = $msql->f( "ifok" );
				$iftui = $msql->f( "iftui" );
}
if ( $memberid == "0" )
{
				$user = "非会员";
}
echo "  <div class=\"tablezone\">\r\n  <table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\r\n    <tr>\r\n      <td>订 单 号：</td>\r\n      <td width=\"160\">";
echo $OrderNo;
echo "</td>\r\n      <td>订 购 人：</td>\r\n      <td>";
echo $name;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\">会员帐号：</td>\r\n      <td width=\"160\">";
echo $user;
echo "</td>\r\n      <td width=\"70\">商品总价：</td>\r\n      <td>";
echo $goodstotal;
echo " 元</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\">配送费用：</td>\r\n      <td width=\"160\">";
echo $yunfei;
echo " 元 </td>\r\n      <td width=\"70\">保险费用：</td>\r\n      <td>";
echo $yunbaofei;
echo " 元</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\">订单总额：</td>\r\n      <td width=\"160\">";
echo $paytotal;
echo " 元</td>\r\n      <td width=\"70\">付款方式：</td>\r\n      <td>";
echo $paytype;
echo "</td>\r\n    </tr>\r\n  </table>\r\n</div>\r\n<div class=\"listzone\" style=\"margin:10px;padding:15px;font:12px/25px Verdana, Arial, Helvetica, sans-serif\">\r\n<input name=\"orderid\" type=\"hidden\" id=\"orderid\" value='";
echo $orderid;
echo "' />\r\n";
if ( $ifok == "1" )
{
				echo "订单是已完成状态，不能进行付款确认";
}
else if ( $iftui == "1" )
{
				echo "订单已退订，不能进行付款确认";
}
else if ( $ifpay == "1" )
{
				echo "订单已付款，不能重复进行付款确认";
}
else if ( $payid == "0" )
{
				echo "本订单的付款方式是会员帐户扣款，进行付款确认时将从会员帐户扣除订单所需费用<br />";
				$fsql->query( "select account from {P}_member where memberid='{$memberid}'" );
				if ( $fsql->next_record( ) )
				{
								$account = $fsql->f( "account" );
				}
				if ( $account < $paytotal )
				{
								echo "订单总金额：".$paytotal." 元，会员帐户余额：".$account." 元，会员帐户余额不足";
				}
				else
				{
								echo "订单总金额：".$paytotal." 元，会员帐户余额：".$account." 元，可以从会员帐户扣款";
								echo "<br /><br /><input type='button' class='button' value='会员帐户扣款' id='orderpaychk'>";
				}
}
else
{
				$fsql->query( "select * from {P}_member_paycenter where id='{$payid}'" );
				if ( $fsql->next_record( ) )
				{
								$pcenter = $fsql->f( "pcenter" );
								$pcentertype = $fsql->f( "pcentertype" );
								if ( $pcentertype == "0" )
								{
												if ( $memberid == "0" )
												{
																echo "本订单是非会员订购，所选付款方式是".$pcenter."，是非会员线下支付<br />";
																echo "线下支付的后台订单付款确认，用于确定已通过线下方式收到款<br />";
																echo "非会员订单付款确认，将直接把订单状态改变为已付款状态，不发生会员帐户处理<br />";
																echo "<br /><input type='button' class='button' value='确定已通过".$pcenter."收到款' id='orderpaychk'>";
												}
												else
												{
																echo "本订单是会员订购，所选付款方式是".$pcenter."，是会员线下支付<br />";
																echo "线下支付的后台订单付款确认，用于确定已通过线下方式收到款<br />";
																echo "会员订单付款确认，将同时进行会员帐户充值和消费扣款，会员帐户余额不变<br />";
																echo "<br /><input type='button' class='button' value='确定已通过".$pcenter."收到款' id='orderpaychk'>";
												}
								}
								else if ( $memberid == "0" )
								{
												echo "本订单是非会员订购，所选付款方式是".$pcenter."，是非会员在线支付<br />";
												echo "在线支付的后台订单付款确认，用于通过在线支付平台付款但未能正常返回的情况<br />";
												echo "非会员订单付款确认，将直接把订单状态改变为已付款状态，不发生会员帐户处理<br />";
												echo "<br /><input type='button' class='button' value='确定已通过".$pcenter."收到款' id='orderpaychk'>";
								}
								else
								{
												echo "本订单是会员订购，所选付款方式是".$pcenter."，是会员在线支付<br />";
												echo "在线支付的后台订单付款确认，用于通过在线支付平台付款但未能正常返回的情况<br />";
												echo "会员订单付款确认，将同时进行会员帐户充值和消费扣款，会员帐户余额不变<br />";
												echo "<br /><input type='button' class='button' value='确定已通过".$pcenter."收到款' id='orderpaychk'>";
								}
				}
				else
				{
								echo "订单所选付款方式不存在，可能已被管理员删除";
				}
}
echo "</div>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>";
?>

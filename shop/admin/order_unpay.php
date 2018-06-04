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
				echo "订单是已完成状态，不能进行退款确认";
}
else if ( $iftui == "1" )
{
				echo "订单已退订，不能进行退款确认";
}
else if ( $ifpay != "1" )
{
				echo "订单未付款，不能进行退款确认";
}
else if ( $memberid == "0" )
{
				echo "本订单是非会员订购，订单退款确认时只将订单变为未付款状态，请另外进行实际退款行为<br />";
				echo "<br /><input type='button' class='button' value='将订单确认为未付款状态' id='orderunpay'>";
}
else
{
				echo "本订单是会员订购，订单退款确认时订单款项退到会员帐户，并产生消费负记录<br />";
				echo "<br /><input type='button' class='button' value='退款到会员帐户' id='orderunpay'>";
}
echo "</div>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>";
?>

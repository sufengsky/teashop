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
echo "cript type=\"text/javascript\" src=\"js/orderdetail.js\"></script>\r\n\r\n</head>\r\n<body>\r\n";
$orderid = $_GET['orderid'];
$msql->query( "select * from {P}_shop_order where `orderid`='{$orderid}' limit 0,1" );
if ( $msql->next_record( ) )
{
				$OrderNo = $msql->f( "OrderNo" );
				$memberid = $msql->f( "memberid" );
				$user = $msql->f( "user" );
				$name = $msql->f( "name" );
				$tel = $msql->f( "tel" );
				$mobi = $msql->f( "mobi" );
				$qq = $msql->f( "qq" );
				$email = $msql->f( "email" );
				$s_name = $msql->f( "s_name" );
				$s_tel = $msql->f( "s_tel" );
				$s_addr = $msql->f( "s_addr" );
				$s_postcode = $msql->f( "s_postcode" );
				$s_mobi = $msql->f( "s_mobi" );
				$s_qq = $msql->f( "s_qq" );
				$goodstotal = $msql->f( "goodstotal" );
				$yunzoneid = $msql->f( "yunzoneid" );
				$yunid = $msql->f( "yunid" );
				$yuntype = $msql->f( "yuntype" );
				$yunifbao = $msql->f( "yunifbao" );
				$yunbaofei = $msql->f( "yunbaofei" );
				$yunfei = $msql->f( "yunfei" );
				$totaloof = $msql->f( "totaloof" );
				$paytotal = $msql->f( "paytotal" );
				$totalweight = $msql->f( "totalweight" );
				$paytype = $msql->f( "paytype" );
				$ifpay = $msql->f( "ifpay" );
				$ifyun = $msql->f( "ifyun" );
				$ifok = $msql->f( "ifok" );
				$iftui = $msql->f( "iftui" );
				$bz = $msql->f( "bz" );
				$paytime = $msql->f( "paytime" );
				$yuntime = $msql->f( "yuntime" );
}
if ( $memberid == "0" )
{
				$user = "非会员";
}
if ( $ifpay == "1" )
{
				$paystat = "已付款";
				$paytime = date( "Y-m-d", $paytime );
}
else
{
				$paystat = "未付款";
				$paytime = "未付款";
}
if ( $ifyun == "1" )
{
				$yunstat = "已发货";
				$yuntime = date( "Y-m-d", $yuntime );
}
else
{
				$yunstat = "未发货";
				$yuntime = "未发货";
}
if ( $ifok == "1" )
{
				$okstat = "已完成";
}
else
{
				$okstat = "处理中";
}
if ( $iftui == "1" )
{
				$tuistat = "退订订单";
}
else
{
				$tuistat = "有效订单";
}
$msql->query( "select * from {P}_shop_yunzone where id='{$yunzoneid}'" );
if ( $msql->next_record( ) )
{
				$zonepid = $msql->f( "pid" );
				$zonestr = $msql->f( "zone" );
				if ( $zonepid != "0" )
				{
								$fsql->query( "select * from {P}_shop_yunzone where id='{$zonepid}'" );
								if ( $fsql->next_record( ) )
								{
												$pzone = $fsql->f( "zone" );
												$zonestr = $pzone." ".$zonestr;
								}
				}
}
echo "<div id=\"shoporderdetail\" style=\"margin:20px;width:630px\">\r\n<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CDE6FF\">\r\n    <tr >\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">订 单 号： </td>\r\n      <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $OrderNo;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">订 购 人：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $name;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">联系电话：</td>\r\n      <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $tel;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">手机号码：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $mobi;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">电子邮箱：</td>\r\n      <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $email;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">QQ号码：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $qq;
echo "</td>\r\n    </tr>\r\n  </table>\r\n  <br />\r\n  <div id=\"fahuodan\">\r\n  <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CDE6FF\">\r\n    <tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">收 货 人：</td>\r\n      <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $s_name;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">联系电话：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $s_tel;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">手机号码：</td>\r\n      <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $s_mobi;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">QQ号码：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $s_qq;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">配送地区：</td>\r\n      <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $zonestr;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">邮政编码：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $s_postcode;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">详细地址：</td>\r\n      <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $s_addr;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">配送方法：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $yuntype;
echo "</td>\r\n    </tr>\r\n  </table>\r\n\r\n\r\n\r\n  <br />\r\n  <table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" style=\"border:1px #def solid\">\r\n  <tr>\r\n    <td width=\"3\" height=\"23\" class=\"biaoti\">&nbsp;</td>\r\n    <td width=\"75\" height=\"23\" class=\"biaoti\">商品编号</td>\r\n    <td height=\"23\" class=\"biaoti\">商品名称</td>\r\n    <td width=\"80\" height=\"23\" class=\"biaoti\">单价(元)</td>\r\n    <td width=\"39\" heig";
echo "ht=\"23\" class=\"biaoti\">数量</td>\r\n\t<td width=\"39\" height=\"23\" class=\"biaoti\">单位</td>\r\n    <td width=\"80\" height=\"23\" class=\"biaoti\">小计(元)</td>\r\n    </tr>\r\n ";
$msql->query( "select * from {P}_shop_orderitems where orderid='{$orderid}'" );
while ( $msql->next_record( ) )
{
				$itemid = $msql->f( "id" );
				$memberid = $msql->f( "memberid" );
				$orderid = $msql->f( "orderid" );
				$gid = $msql->f( "gid" );
				$bn = $msql->f( "bn" );
				$goods = $msql->f( "goods" );
				$price = $msql->f( "price" );
				$weight = $msql->f( "weight" );
				$nums = $msql->f( "nums" );
				$danwei = $msql->f( "danwei" );
				$jine = $msql->f( "jine" );
				$cent = $msql->f( "cent" );
				$iftui = $msql->f( "iftui" );
				$ifyun = $msql->f( "ifyun" );
				$msg = $msql->f( "msg" );
				echo "  <tr>\r\n    <td width=\"3\" height=\"25\">&nbsp;</td>\r\n    <td width=\"75\" height=\"25\">";
				echo $bn;
				echo "</td>\r\n    <td height=\"25\">";
				echo $goods;
				echo "</td>\r\n    <td width=\"80\" height=\"25\">";
				echo $price;
				echo "</td>\r\n    <td width=\"39\" height=\"25\" id=\"nums_";
				echo $itemid;
				echo "\">";
				echo $nums;
				echo "</td>\r\n    <td width=\"39\" height=\"25\">";
				echo $danwei;
				echo "</td>\r\n    <td width=\"80\" height=\"25\">";
				echo $jine;
				echo "</td>\r\n    </tr>\r\n\r\n\r\n";
}
echo "</table>\r\n</div>\r\n\r\n<br />\r\n<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CDE6FF\">\r\n  <tr>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">商品总价：</td>\r\n    <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $goodstotal;
echo " 元</td>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">配送费用：</td>\r\n    <td bgcolor=\"#FFFFFF\">";
echo $yunfei;
echo " 元 </td>\r\n  </tr>\r\n  <tr>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">保险费用：</td>\r\n    <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $yunbaofei;
echo " 元</td>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">订单总额：</td>\r\n    <td bgcolor=\"#FFFFFF\">";
echo $paytotal;
echo " 元</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">付款方式：</td>\r\n    <td width=\"230\" bgcolor=\"#FFFFFF\">";
echo $paytype;
echo "</td>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">是否付款：</td>\r\n    <td bgcolor=\"#FFFFFF\">";
echo $paystat;
echo "</td>\r\n  </tr>\r\n</table>\r\n<br />\r\n<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CDE6FF\">\r\n  <tr>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">订购备注：</td>\r\n    <td bgcolor=\"#FFFFFF\">\r\n\t<input type=\"hidden\" id=\"orderid\" value=\"";
echo $orderid;
echo "\" />\r\n\t";
if ( $ifok != "1" && $iftui != "1" )
{
				echo "\t<textarea rows=\"3\" id=\"bztext\" style=\"border:0px;width:500px;height:60px\">";
				echo $bz;
				echo "</textarea>\r\n\t<input type=\"button\" class=\"button\" id=\"savebz\" value=\"保存备注信息\" style=\"display:none\" />\r\n\t";
}
else
{
				echo nl2br( $bz );
}
echo "    \r\n</td>\r\n    </tr>\r\n</table>\r\n</div>\r\n<br />\r\n<div id=\"printout\"> <div id=\"print_fahuo_button\">[打印发货清单]</div><div id=\"print_button\">[打印订单]</div>\r\n订单状态：[";
echo $paystat;
echo "] [";
echo $yunstat;
echo "] [";
echo $okstat;
echo "]  [付款日期：";
echo $paytime;
echo "] [发货日期：";
echo $yuntime;
echo "] </div>\r\n\r\n\r\n\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>";
?>

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
needauth( 722 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/order_detail.js\"></script>\r\n</head>\r\n<body>\r\n\r\n<div id=\"notice\" class=\"noticediv\"></div>\r\n<div class=\"popzone\">\r\n";
$orderid = $_GET['orderid'];
$msql->query( "select * from {P}_hz_order where `orderid`='{$orderid}' limit 0,1" );
if ( $msql->next_record( ) )
{
				$OrderNo = $msql->f( "OrderNo" );
				$memberid = $msql->f( "memberid" );
				$user = $msql->f( "user" );
				$name = $msql->f( "name" );
				$tel = $msql->f( "tel" );
				$address = $msql->f( "address" );
				$postcode = $msql->f( "postcode" );
				$totalcent = $msql->f( "totalcent" );
				$iflook = $msql->f( "iflook" );
				$ifpay = $msql->f( "ifpay" );
				$ifyun = $msql->f( "ifyun" );
				$ifok = $msql->f( "ifok" );
				$iftui = $msql->f( "iftui" );
				$ip = $msql->f( "ip" );
				$dtime = $msql->f( "dtime" );
				$yuntime = $msql->f( "yuntime" );
				$paytime = $msql->f( "paytime" );
				$bz = $msql->f( "bz" );
				$items = $msql->f( "items" );
}
$dtime = date( "Y-m-d", $dtime );
if ( $ifpay == "1" )
{
				$paystat = "已支付";
}
else
{
				$paystat = "未支付";
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
if ( $ifdel == "1" )
{
				$tuistat = "退订订单";
}
else
{
				$tuistat = "有效订单";
}
echo "<div id=\"orderdetail\" style=\"margin:20px;width:630px\">\r\n<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CDE6FF\">\r\n    <tr >\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">订 单 号： </td>\r\n      <td width=\"200\" bgcolor=\"#FFFFFF\">";
echo $OrderNo;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">会 员 名：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $user;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">订 购 人：</td>\r\n      <td width=\"200\" bgcolor=\"#FFFFFF\">";
echo $name;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">联系电话：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $tel;
echo "</td>\r\n    </tr>\r\n\t<tr>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">送货地址：</td>\r\n      <td width=\"200\" bgcolor=\"#FFFFFF\">";
echo $address;
echo "</td>\r\n      <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">邮政编码：</td>\r\n      <td bgcolor=\"#FFFFFF\">";
echo $postcode;
echo "</td>\r\n    </tr>\r\n  </table>\r\n  <br />\r\n  <div id=\"fahuodan\">\r\n  <table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" style=\"border:1px #def solid\">\r\n  <tr>\r\n    <td width=\"3\" height=\"23\" class=\"biaoti\">&nbsp;</td>\r\n    <td width=\"35\" height=\"23\" class=\"biaoti\">ID</td>\r\n    <td class=\"biaoti\">赠品名称</td>\r\n    <td width=\"80\" height=\"23\" class=\"biaoti\">所需积分(分)</td>\r\n    <td width=\"39\" heig";
echo "ht=\"23\" class=\"biaoti\">数量</td>\r\n\t<td width=\"80\" height=\"23\" class=\"biaoti\">小计(分)</td>\r\n    </tr>\r\n ";
$msql->query( "select * from {P}_hz_orderitems where orderid='{$orderid}'" );
while ( $msql->next_record( ) )
{
				$itemid = $msql->f( "id" );
				$memberid = $msql->f( "memberid" );
				$orderid = $msql->f( "orderid" );
				$gid = $msql->f( "gid" );
				$goods = $msql->f( "goods" );
				$nums = $msql->f( "nums" );
				$jcent = $msql->f( "cent" );
				$iftui = $msql->f( "iftui" );
				$fsql->query( "select * from {P}_hz_con where id='{$gid}'" );
				if ( $fsql->next_record( ) )
				{
								$cent = $fsql->f( "cent" );
				}
				$tcent += $jcent;
				echo "  <tr>\r\n    <td width=\"3\" height=\"25\">&nbsp;</td>\r\n    <td width=\"35\" height=\"25\">";
				echo $itemid;
				echo "</td>\r\n    <td height=\"25\">";
				echo $goods;
				echo "</td>\r\n    <td width=\"80\" height=\"25\">";
				echo $cent;
				echo "</td>\r\n    <td width=\"39\" height=\"25\">";
				echo $nums;
				echo "</td>\r\n    <td width=\"80\" height=\"25\">";
				echo $jcent;
				echo "</td>\r\n    </tr>\r\n\r\n\r\n";
}
echo "</table>\r\n</div>\r\n\r\n<br />\r\n<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CDE6FF\">\r\n  <tr>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">所需积分：</td>\r\n    <td bgcolor=\"#FFFFFF\">";
echo $tcent;
echo " 分</td>\r\n    </tr>\r\n</table>\r\n<br />\r\n<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CDE6FF\">\r\n  <tr>\r\n    <td width=\"78\" align=\"center\" bgcolor=\"#F2F9FD\">订购备注：</td>\r\n    <td height=\"70\" valign=\"top\" bgcolor=\"#FFFFFF\">";
echo $bz;
echo "</td>\r\n  </tr>\r\n</table>\r\n</div>\r\n<br />\r\n<div id=\"printout\"><div id=\"print_button\">[打印订单]</div>\r\n订单状态：[";
echo $yunstat;
echo "] [订购日期：";
echo $dtime;
echo "] [发货日期：";
echo $yuntime;
echo "] </div>\r\n\r\n</div>\r\n</body>\r\n</html>";
?>

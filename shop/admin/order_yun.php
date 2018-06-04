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
echo "cript type=\"text/javascript\" src=\"js/orderyun.js\"></script>\r\n</head>\r\n<body>\r\n";
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
}
if ( $memberid == "0" )
{
				$user = "非会员";
}
if ( $ifpay == "1" )
{
				$paystr = "已付款";
}
else
{
				$paystr = "未付款";
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
echo "<div class=\"tablezone\">\r\n<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\r\n    <tr >\r\n      <td width=\"70\">订 单 号： </td>\r\n      <td width=\"260\">";
echo $OrderNo;
echo "</td>\r\n      <td width=\"70\">订 购 人：</td>\r\n      <td>";
echo $name;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td>联系电话：</td>\r\n      <td>";
echo $tel;
echo "</td>\r\n      <td>手机号码：</td>\r\n      <td>";
echo $mobi;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td>电子邮箱：</td>\r\n      <td>";
echo $email;
echo "</td>\r\n      <td>QQ号码：</td>\r\n      <td>";
echo $qq;
echo "</td>\r\n    </tr>\r\n  </table></div>\r\n  <div class=\"tablezone\">\r\n  <table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\r\n    <tr>\r\n      <td>收 货 人：</td>\r\n      <td>";
echo $s_name;
echo "</td>\r\n      <td>联系电话：</td>\r\n      <td>";
echo $s_tel;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\">手机号码：</td>\r\n      <td width=\"260\">";
echo $s_mobi;
echo "</td>\r\n      <td width=\"70\">QQ号码：</td>\r\n      <td>";
echo $s_qq;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\">配送地区：</td>\r\n      <td width=\"260\">";
echo $zonestr;
echo "</td>\r\n      <td width=\"70\">邮政编码：</td>\r\n      <td>";
echo $s_postcode;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\">详细地址：</td>\r\n      <td width=\"260\">";
echo $s_addr;
echo "</td>\r\n      <td width=\"70\">配送方法：</td>\r\n      <td>";
echo $yuntype;
echo "</td>\r\n    </tr>\r\n    <tr>\r\n      <td>商品总价：</td>\r\n      <td>";
echo $goodstotal;
echo " 元</td>\r\n      <td>配送费用：</td>\r\n      <td>";
echo $yunfei;
echo " 元 </td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\">保险费用：</td>\r\n      <td width=\"260\">";
echo $yunbaofei;
echo " 元</td>\r\n      <td width=\"70\">订单总额：</td>\r\n      <td>";
echo $paytotal;
echo " 元</td>\r\n    </tr>\r\n    <tr>\r\n      <td>付款方式：</td>\r\n      <td>";
echo $paytype;
echo "</td>\r\n      <td>是否付款：</td>\r\n      <td>";
echo $paystr;
echo "</td>\r\n    </tr>\r\n  </table>\r\n</div>\r\n\r\n<div class=\"listzone\" style=\"margin:10px\">\r\n<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\r\n  <tr>\r\n    <td width=\"3\" height=\"23\" class=\"biaoti\">&nbsp;</td>\r\n    <td width=\"75\" height=\"23\" class=\"biaoti\">商品编号</td>\r\n    <td height=\"23\" class=\"biaoti\">商品名称</td>\r\n    <td width=\"70\" height=\"23\" class=\"biaoti\">单价(元)</td>\r\n    <td width=\"39\"";
echo " height=\"23\" class=\"biaoti\">数量</td>\r\n\t<td width=\"39\" height=\"23\" class=\"biaoti\">单位</td>\r\n    <td width=\"70\" height=\"23\" class=\"biaoti\">小计(元)</td>\r\n    <td width=\"50\" height=\"23\" class=\"biaoti\">库存</td>\r\n    <td height=\"23\" colspan=\"2\" class=\"biaoti\">配送</td>\r\n    </tr>\r\n ";
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
				$yuntime = $msql->f( "yuntime" );
				$msg = $msql->f( "msg" );
				$yuntime = date( "Y-n-j", $yuntime );
				if ( $ifyun == "1" )
				{
								$yunimg = "toolbar_ok.gif";
								$yuntext = "退货";
				}
				else
				{
								$yunimg = "toolbar_no.gif";
								$yuntext = "发货";
				}
				$fsql->query( "select kucun from {P}_shop_con where id='{$gid}'" );
				if ( $fsql->next_record( ) )
				{
								$kucun = $fsql->f( "kucun" );
				}
				if ( $kucun < $nums && $ifyun != "1" )
				{
								$dis = " disabled ";
				}
				else
				{
								$dis = " ";
				}
				echo "  <tr>\r\n    <td width=\"3\" height=\"25\">&nbsp;</td>\r\n    <td width=\"75\" height=\"25\">";
				echo $bn;
				echo "</td>\r\n    <td height=\"25\">";
				echo $goods;
				echo "</td>\r\n    <td width=\"70\" height=\"25\">";
				echo $price;
				echo "</td>\r\n    <td width=\"39\" height=\"25\" id=\"nums_";
				echo $itemid;
				echo "\">";
				echo $nums;
				echo "</td>\r\n    <td width=\"39\" height=\"25\">";
				echo $danwei;
				echo "</td>\r\n    <td width=\"70\" height=\"25\">";
				echo $jine;
				echo "</td>\r\n    <td width=\"50\" height=\"25\" id=\"kucun_";
				echo $itemid;
				echo "\">";
				echo $kucun;
				echo "</td>\r\n    <td width=\"30\" height=\"25\"><img id=\"yunstat_";
				echo $itemid;
				echo "\" src=\"images/";
				echo $yunimg;
				echo "\"  border=\"0\"  /></td>\r\n\t<td width=\"50\" height=\"25\" align=\"center\">\r\n\t  <input name=\"cc\" type=\"button\" id=\"doyun_";
				echo $itemid;
				echo "\" class=\"doyun\" value=\"";
				echo $yuntext;
				echo "\" ";
				echo $dis;
				echo " /></td>\r\n  </tr>\r\n\r\n\r\n";
}
echo "</table>\r\n\r\n\r\n</div>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>";
?>

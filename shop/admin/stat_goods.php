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
needauth( 331 );
$tp = $_REQUEST['tp'];
$key = $_GET['key'];
$showtime = $_GET['showtime'];
$showtype = $_GET['showtype'];
$startday = $_GET['startday'];
$endday = $_GET['endday'];
if ( $startday == "" || $endday == "" )
{
				$endday = date( "Y-m-d" );
				$enddayArr = explode( "-", $endday );
				$endtime = mktime( 23, 59, 59, $enddayArr[1], $enddayArr[2], $enddayArr[0] );
				$starttime = $endtime - 691199;
				$startday = date( "Y-m-d", $starttime );
}
else
{
				$enddayArr = explode( "-", $endday );
				$endtime = mktime( 23, 59, 59, $enddayArr[1], $enddayArr[2], $enddayArr[0] );
				$startdayArr = explode( "-", $startday );
				$starttime = mktime( 0, 0, 0, $startdayArr[1], $startdayArr[2], $startdayArr[0] );
}
if ( $showtime == "" )
{
				$showtime = "dtime";
}
if ( $showtype == "" )
{
				$showtype = "goods";
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/Date/WdatePicker.js\"></script>\r\n</head>\r\n\r\n<body>\r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\r\n \r\n  <tr> \r\n      <td height=\"28\"  > \r\n        <table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\">\r\n           <tr> \r\n            <td> <form name=\"search\" action=\"stat_goods.php\" method=\"get\" id=\"ordersearch\">\r\n         ";
echo "     ";
echo "<s";
echo "elect name=\"showtime\" id=\"showtime\">\r\n     \t\t\t <option value=\"dtime\" ";
echo seld( $showtime, "dtime" );
echo ">按订单提交时间</option>\r\n     \t\t\t <option value=\"yuntime\" ";
echo seld( $showtime, "yuntime" );
echo ">按商品配送时间</option>\r\n   \t\t\t </select>\r\n\t\t\t <input name=\"startday\" type=\"text\"  class=\"input\" id=\"startday\" style=\"cursor:pointer\" onClick=\"WdatePicker()\"  value=\"";
echo $startday;
echo "\" size=\"9\"  readonly/>\r\n             -\r\n\t\t\t <input name=\"endday\" type=\"text\"  class=\"input\" id=\"endday\" style=\"cursor:pointer\" onClick=\"WdatePicker()\"  value=\"";
echo $endday;
echo "\" size=\"9\"  readonly/>\r\n              &nbsp; &nbsp;\r\n\t\t\t ";
echo "<s";
echo "elect name=\"showtype\" id=\"showtype\">\r\n     \t\t\t <option value=\"goods\" ";
echo seld( $showtype, "goods" );
echo ">按商品名称查询</option>\r\n     \t\t\t <option value=\"bn\" ";
echo seld( $showtype, "bn" );
echo ">按商品编号查询</option>\r\n   \t\t\t </select>\r\n\t\t\t \r\n\t\t\t\r\n              <input type=\"text\" name=\"key\" value=\"";
echo $key;
echo "\"  size=\"18\" class=\"input\" />\r\n              <input type=\"submit\" name=\"Submit\" value=\"查询\" class=\"button\" />\r\n              <input name=\"tp\" type=\"hidden\" id=\"tp\" value=\"search\" />\r\n            </form></td>\r\n          </tr>\r\n        </table>\r\n    </td>\r\n   \r\n  \r\n     \r\n   \r\n  </tr> \r\n</table>\r\n\r\n</div>\r\n";
if ( $tp == "search" && $key != "" )
{
				trylimit( "_shop_order", 50, "orderid" );
				$scl = " iftui!='1' ";
				if ( $showtime == "yuntime" )
				{
								$scl .= " and yuntime>{$starttime} and yuntime<{$endtime} ";
				}
				else
				{
								$scl .= " and dtime>{$starttime} and dtime<{$endtime} ";
				}
				if ( $showtype == "bn" )
				{
								$scl .= " and bn='{$key}' ";
				}
				else
				{
								$scl .= " and goods='{$key}' ";
				}
				echo "<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n          <tr>\r\n            <td width=\"32\"  class=\"biaoti\" style=\"padding-left:10px\">序号</td>\r\n            <td width=\"75\" height=\"23\"  class=\"biaoti\" >商品编号</td>\r\n            <td height=\"23\"  class=\"biaoti\" >商品名称</td>\r\n            <td width=\"70\"  class=\"biaoti\" >商品价格</td>\r\n       ";
				echo "     <td width=\"50\"  class=\"biaoti\" >数量</td>\r\n            <td width=\"50\" height=\"23\"  class=\"biaoti\" >单位</td>\r\n            <td width=\"70\"  class=\"biaoti\" >金额</td>\r\n            <td width=\"70\"  class=\"biaoti\" >订购人</td>\r\n            <td width=\"70\" height=\"23\"  class=\"biaoti\" >下单时间</td>\r\n\t\t    <td width=\"70\"  class=\"biaoti\" >配送时间</td>\r\n\t\t    <td width=\"33\" height=\"23\" align=\"cente";
				echo "r\"  class=\"biaoti\" >订单</td>\r\n\t      </tr>\r\n          ";
				$p = 1;
				$tnums = 0;
				$tjine = 0;
				$msql->query( "select * from {P}_shop_orderitems where {$scl} order by dtime desc" );
				while ( $msql->next_record( ) )
				{
								$orderid = $msql->f( "orderid" );
								$memberid = $msql->f( "memberid" );
								$gid = $msql->f( "gid" );
								$goods = $msql->f( "goods" );
								$bn = $msql->f( "bn" );
								$price = $msql->f( "price" );
								$nums = $msql->f( "nums" );
								$weight = $msql->f( "weight" );
								$danwei = $msql->f( "danwei" );
								$jine = $msql->f( "jine" );
								$cent = $msql->f( "cent" );
								$ifyun = $msql->f( "ifyun" );
								$iftui = $msql->f( "iftui" );
								$dtime = $msql->f( "dtime" );
								$yuntime = $msql->f( "yuntime" );
								$dtime = date( "y-m-d", $dtime );
								if ( $ifyun == "1" )
								{
												$yuntime = date( "y-m-d", $yuntime );
								}
								else
								{
												$yuntime = "未配送";
								}
								$fsql->query( "select * from {P}_shop_order where orderid='{$orderid}'" );
								if ( $fsql->next_record( ) )
								{
												$name = $fsql->f( "name" );
												$ifpay = $fsql->f( "ifpay" );
								}
								if ( $ifpay == "1" )
								{
												$tnums += $nums;
												$tjine += $jine;
												echo " \r\n          <tr class=\"list\" id=\"tr_";
												echo $orderid;
												echo "\" >\r\n            <td   width=\"32\" valign=\"top\"  style=\"padding-left:10px\">";
												echo $p;
												echo "</td>\r\n            <td   width=\"75\" valign=\"top\"  >";
												echo $bn;
												echo " </td>\r\n\t\t\t <td valign=\"top\">";
												echo $goods;
												echo " </td>\r\n\t\t\t <td width=\"70\" valign=\"top\" >\r\n\t\t\t ";
												echo $price;
												echo "\t\t\t </td>\r\n\t\t\t <td width=\"50\" valign=\"top\">\r\n\t\t\t ";
												echo $nums;
												echo "\t\t\t </td>\r\n\t\t\t <td width=\"50\" valign=\"top\" id=\"paytotal_";
												echo $orderid;
												echo "\">";
												echo $danwei;
												echo "</td>\r\n            <td width=\"70\" valign=\"top\" >";
												echo $jine;
												echo "             </td>\r\n            <td   width=\"70\" valign=\"top\">";
												echo $name;
												echo " </td>\r\n            <td   width=\"70\" valign=\"top\">";
												echo $dtime;
												echo " </td>\r\n            <td   width=\"70\" valign=\"top\">";
												echo $yuntime;
												echo " </td>\r\n            <td  width=\"33\" align=\"center\" valign=\"top\" ><a href=\"order_detail.php?orderid=";
												echo $orderid;
												echo "\"><img src=\"images/look.png\" width=\"24\" height=\"24\"  border=\"0\" /></a> </td>\r\n          </tr>\r\n        \r\n";
												$p++;
								}
				}
				$tjine = number_format( $tjine, 2, ".", "" );
				echo " \r\n        <tr class=\"list\" >\r\n            <td valign=\"top\"  class=\"biaoti1\" style=\"padding-left:10px\">合计</td>\r\n            <td width=\"75\" valign=\"top\" class=\"biaoti1\"  >-</td>\r\n            <td valign=\"top\" class=\"biaoti1\">-</td>\r\n            <td valign=\"top\" class=\"biaoti1\" >-</td>\r\n            <td width=\"50\" valign=\"top\" class=\"biaoti1\">";
				echo $tnums;
				echo "</td>\r\n            <td width=\"50\" valign=\"top\"  class=\"biaoti1\">-</td>\r\n            <td valign=\"top\" class=\"biaoti1\" >";
				echo $tjine;
				echo "</td>\r\n            <td valign=\"top\"  class=\"biaoti1\">-</td>\r\n            <td valign=\"top\"  class=\"biaoti1\">-</td>\r\n            <td valign=\"top\"  class=\"biaoti1\">-</td>\r\n            <td align=\"center\" valign=\"top\" class=\"biaoti1\" >-</td>\r\n    </tr> \r\n \r\n</table>\r\n</div>\r\n";
}
else
{
				echo "<div style=\"margin:10px;font:12px/25px Verdana, Arial, Helvetica, sans-serif\">\r\n请输入商品名称或商品编号，对指定商品进行销售统计\r\n</div>\r\n";
}
echo "</body>\r\n</html>\r\n";
?>

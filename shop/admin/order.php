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
include( ROOTPATH."includes/pages.inc.php" );
include( "language/".$sLan.".php" );
needauth( 321 );
$step = $_REQUEST['step'];
$page = $_REQUEST['page'];
$key = $_GET['key'];
$shownum = $_REQUEST['shownum'];
$showpay = $_GET['showpay'];
$showyun = $_GET['showyun'];
$showtui = $_GET['showtui'];
$showok = $_GET['showok'];
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
if ( $showpay == "" )
{
				$showpay = "all";
}
if ( $showyun == "" )
{
				$showyun = "all";
}
if ( $showok == "" )
{
				$showok = "0";
}
if ( $showtui == "" )
{
				$showtui = "0";
}
if ( $shownum == "" || $shownum < 10 )
{
				$shownum = 10;
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/order.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/Date/WdatePicker.js\"></script>\r\n</head>\r\n\r\n<body>\r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\r\n \r\n  <tr> \r\n      <td height=\"28\"  > \r\n        <table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\">\r\n           <tr> \r\n            <td> <form name=\"search\" action=\"order.php\" method=\"get\" id=\"ordersearch\">\r\n             <i";
echo "nput name=\"startday\" type=\"text\"  class=\"input\" id=\"startday\" style=\"cursor:pointer\" onClick=\"WdatePicker()\"  value=\"";
echo $startday;
echo "\" size=\"10\"  readonly/>-\r\n\t\t\t <input name=\"endday\" type=\"text\"  class=\"input\" id=\"endday\" style=\"cursor:pointer\" onClick=\"WdatePicker()\"  value=\"";
echo $endday;
echo "\" size=\"10\"  readonly/>\r\n              \r\n\t\t\t   ";
echo "<s";
echo "elect name=\"showpay\" id=\"showpay\">\r\n      \t\t\t<option value=\"all\"  ";
echo seld( $showpay, "all" );
echo ">付款状态</option>\r\n     \t\t\t <option value=\"0\" ";
echo seld( $showpay, "0" );
echo ">未付款</option>\r\n     \t\t\t <option value=\"1\" ";
echo seld( $showpay, "1" );
echo ">已付款</option>\r\n   \t\t\t </select>\r\n   \t\t\t ";
echo "<s";
echo "elect name=\"showyun\" id=\"showyun\">\r\n     \t\t\t <option value=\"all\"  ";
echo seld( $showyun, "all" );
echo ">配送状态</option>\r\n    \t\t\t  <option value=\"0\"  ";
echo seld( $showyun, "0" );
echo ">未配送</option>\r\n    \t\t\t  <option value=\"1\"  ";
echo seld( $showyun, "1" );
echo ">已配送</option>\r\n   \t\t\t </select>\r\n\t  \t\t";
echo "<s";
echo "elect name=\"showok\" id=\"showok\">\r\n    \t\t\t  <option value=\"0\"  ";
echo seld( $showok, "0" );
echo ">处理中订单</option>\r\n      \t\t\t<option value=\"1\"  ";
echo seld( $showok, "1" );
echo ">已完成订单</option>\r\n   \t\t\t </select>\r\n\t\t\t ";
echo "<s";
echo "elect name=\"showtui\" id=\"showtui\">\r\n    \t\t\t  <option value=\"0\" ";
echo seld( $showtui, "0" );
echo ">有效订单</option>\r\n      \t\t\t<option value=\"1\" ";
echo seld( $showtui, "1" );
echo ">退订订单</option>\r\n   \t\t\t </select>\r\n\t\t\t  ";
echo "<s";
echo "elect name=\"shownum\">\r\n                <option value=\"10\"  ";
echo seld( $shownum, "10" );
echo ">每页10条</option>\r\n                <option value=\"20\" ";
echo seld( $shownum, "20" );
echo ">每页20条</option>\r\n                <option value=\"30\" ";
echo seld( $shownum, "30" );
echo ">每页30条</option>\r\n                <option value=\"50\" ";
echo seld( $shownum, "50" );
echo ">每页50条</option>\r\n              </select>\r\n              <input type=\"text\" name=\"key\" value=\"";
echo $key;
echo "\"  size=\"12\" class=\"input\" />\r\n              <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=\"button\" />\r\n            </form></td>\r\n          </tr>\r\n        </table>\r\n    </td>\r\n   \r\n  \r\n     \r\n   \r\n  </tr> \r\n</table>\r\n\r\n</div>\r\n";
$scl = " dtime>{$starttime} and dtime<{$endtime} ";
if ( $showpay == "1" || $showpay == "0" )
{
				$scl .= " and ifpay='{$showpay}' ";
}
if ( $showyun == "1" || $showyun == "0" )
{
				$scl .= " and ifyun='{$showyun}' ";
}
if ( $showok == "1" || $showok == "0" )
{
				$scl .= " and ifok='{$showok}' ";
}
if ( $showtui == "1" || $showtui == "0" )
{
				$scl .= " and iftui='{$showtui}' ";
}
if ( $key != "" )
{
				trylimit( "_shop_order", 50, "orderid" );
				$scl .= " and (OrderNo='{$key}' or items regexp '{$key}' or name regexp '{$key}' or s_name regexp '{$key}') ";
}
if ( $showtui == "1" )
{
				$dodis = " style='display:none' ";
}
else
{
				$dodis = " ";
}
$msql->query( "select count(orderid) from {P}_shop_order where {$scl}" );
if ( $msql->next_record( ) )
{
				$totalnums = $msql->f( "count(orderid)" );
}
$pages = new pages( );
$pages->setvar( array( "key" => $key, "shownum" => $shownum, "showpay" => $showpay, "showyun" => $showyun, "showok" => $showok, "showtui" => $showtui, "startday" => $startday, "endday" => $endday ) );
$pages->set( $shownum, $totalnums );
$pagelimit = $pages->limit( );
echo "<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n          <tr>\r\n            <td width=\"65\" height=\"23\"  class=\"biaoti\" style=\"padding-left:10px\">订单号</td>\r\n            <td width=\"65\" height=\"23\"  class=\"biaoti\" >订购人</td>\r\n            <td height=\"23\"  class=\"biaoti\" >订购商品</td>\r\n            <td width=\"70\"  class=\"biaoti\" >商品总价</";
echo "td>\r\n            <td width=\"50\"  class=\"biaoti\" >运费</td>\r\n            <td width=\"50\"  class=\"biaoti\" >保险</td>\r\n            <td width=\"65\" height=\"23\"  class=\"biaoti\" >订单总额</td>\r\n            <td width=\"70\" height=\"23\"  class=\"biaoti\" >下单时间</td>\r\n\t\t    <td width=\"33\" height=\"23\" align=\"center\"  class=\"biaoti\" ";
echo $dodis;
echo ">付款</td>\r\n            <td width=\"33\" height=\"23\" align=\"center\"  class=\"biaoti\" ";
echo $dodis;
echo ">配送</td>\r\n            <td width=\"33\" height=\"23\" align=\"center\"  class=\"biaoti\" ";
echo $dodis;
echo ">完成</td>\r\n            <td width=\"33\" height=\"23\" align=\"center\"  class=\"biaoti\" >详情</td>\r\n\t\t    <td height=\"23\" width=\"33\"  class=\"biaoti\" align=\"center\" ";
echo $dodis;
echo ">退订</td>\r\n          </tr>\r\n          ";
$msql->query( "select * from {P}_shop_order where {$scl} order by dtime desc limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$orderid = $msql->f( "orderid" );
				$OrderNo = $msql->f( "OrderNo" );
				$memberid = $msql->f( "memberid" );
				$user = $msql->f( "user" );
				$name = $msql->f( "name" );
				$goodstotal = $msql->f( "goodstotal" );
				$yunzoneid = $msql->f( "yunzoneid" );
				$yunid = $msql->f( "yunid" );
				$yuntype = $msql->f( "yuntype" );
				$yunfei = $msql->f( "yunfei" );
				$yunbaofei = $msql->f( "yunbaofei" );
				$paytotal = $msql->f( "paytotal" );
				$iflook = $msql->f( "iflook" );
				$payid = $msql->f( "payid" );
				$paytype = $msql->f( "paytype" );
				$ifpay = $msql->f( "ifpay" );
				$ifyun = $msql->f( "ifyun" );
				$ifok = $msql->f( "ifok" );
				$iftui = $msql->f( "iftui" );
				$dtime = $msql->f( "dtime" );
				$paytime = $msql->f( "paytime" );
				$yuntime = $msql->f( "yuntime" );
				$items = $msql->f( "items" );
				$dtime = date( "y-m-d", $dtime );
				$paytime = date( "y-m-d", $paytime );
				$uptime = date( "y-m-d", $uptime );
				switch ( $ifok )
				{
								case "0" :
												$okimg = "toolbar_no.gif";
												break;
								case "1" :
												$okimg = "toolbar_ok.gif";
												break;
				}
				switch ( $ifpay )
				{
								case "0" :
												$payimg = "toolbar_no.gif";
												break;
								case "1" :
												$payimg = "toolbar_ok.gif";
												break;
				}
				switch ( $ifyun )
				{
								case "0" :
												$yunimg = "toolbar_no.gif";
												break;
								case "1" :
												$yunimg = "toolbar_ok.gif";
												break;
				}
				if ( $memberid == "0" )
				{
								$user = "非会员";
				}
				echo " \r\n          <tr class=\"list\" id=\"tr_";
				echo $orderid;
				echo "\" >\r\n            <td   width=\"65\" valign=\"top\"  style=\"padding-left:10px\">";
				echo $OrderNo;
				echo " </td>\r\n\t\t\t <td width=\"65\" valign=\"top\">";
				echo $name;
				echo "</td>\r\n\t\t\t <td valign=\"top\">";
				echo $items;
				echo " </td>\r\n\t\t\t <td width=\"70\" valign=\"top\" >\r\n\t\t\t ";
				if ( $ifpay != "1" && $ifok != "1" && iftui != "1" )
				{
								echo "\t\t\t <input id=\"goodstotal_";
								echo $orderid;
								echo "\" class=\"modiprice\" value=\"";
								echo $goodstotal;
								echo "\" style=\"width:65px\" readonly />\r\n\t\t\t ";
				}
				else
				{
								echo $goodstotal;
				}
				echo "\t\t\t </td>\r\n\t\t\t <td width=\"50\" valign=\"top\">\r\n\t\t\t ";
				if ( $ifpay != "1" && $ifok != "1" && iftui != "1" )
				{
								echo "\t\t\t <input id=\"yunfei_";
								echo $orderid;
								echo "\" class=\"modiyunfei\" value=\"";
								echo $yunfei;
								echo "\" style=\"width:45px\" readonly />\r\n\t\t\t  ";
				}
				else
				{
								echo $yunfei;
				}
				echo "\t\t\t </td>\r\n\t\t\t <td width=\"50\" valign=\"top\" id=\"yunbaofei_";
				echo $orderid;
				echo "\">";
				echo $yunbaofei;
				echo "</td>\r\n\t\t\t <td width=\"65\" valign=\"top\" id=\"paytotal_";
				echo $orderid;
				echo "\">";
				echo $paytotal;
				echo "</td>\r\n            <td   width=\"70\" valign=\"top\">";
				echo $dtime;
				echo " </td>\r\n           \r\n            <td   width=\"33\" align=\"center\" valign=\"top\"  ";
				echo $dodis;
				echo "><img id=\"orderpay_";
				echo $orderid;
				echo "\" src=\"images/";
				echo $payimg;
				echo "\"  border=\"0\" class=\"orderpay\" style=\"cursor:pointer\" /></td>\r\n            <td   width=\"33\" align=\"center\" valign=\"top\"  ";
				echo $dodis;
				echo "><img id=\"orderyun_";
				echo $orderid;
				echo "\" src=\"images/";
				echo $yunimg;
				echo "\"  border=\"0\" class=\"orderyun\"  style=\"cursor:pointer\" /></td>\r\n            <td   width=\"33\" align=\"center\" valign=\"top\"  ";
				echo $dodis;
				echo "><img id=\"orderok_";
				echo $orderid;
				echo "\" src=\"images/";
				echo $okimg;
				echo "\"  border=\"0\" class=\"orderok\"  style=\"cursor:pointer\" /></td>\r\n            <td  width=\"33\" align=\"center\" valign=\"top\" ><a href=\"order_detail.php?orderid=";
				echo $orderid;
				echo "\"><img src=\"images/look.png\" width=\"24\" height=\"24\"  border=\"0\" /></a> </td>\r\n            <td  width=\"33\" align=\"center\" valign=\"top\"  ";
				echo $dodis;
				echo "><img id=\"ordertui_";
				echo $orderid;
				echo "\" src=\"images/delete.png\"  border=\"0\" class=\"ordertui\"  style=\"cursor:pointer\" />\r\n\t\t\t</td>\r\n          </tr>\r\n          ";
}
echo " \r\n       \r\n \r\n</table>\r\n</div>\r\n\r\n\r\n\r\n";
$pagesinfo = $pages->shownow( );
echo "<div id=\"showpages\">\r\n\t  <div id=\"pagesinfo\">";
echo $strPagesTotalStart.$totalnums.$strPagesTotalEnd;
echo " ";
echo $strPagesMeiye.$pagesinfo['shownum'].$strPagesTotalEnd;
echo " ";
echo $strPagesYeci;
echo " ";
echo $pagesinfo['now']."/".$pagesinfo['total'];
echo "</div>\r\n\t  <div id=\"pages\">";
echo $pages->output( 1 );
echo "</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

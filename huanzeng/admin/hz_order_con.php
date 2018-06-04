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
needauth( 722 );
$step = $_REQUEST['step'];
$page = $_REQUEST['page'];
$key = $_GET['key'];
$shownum = $_REQUEST['shownum'];
$showyun = $_GET['showyun'];
$showtui = $_GET['showtui'];
$showtype = $_REQUEST['showtype'];
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
if ( $showyun == "" )
{
				$showyun = "all";
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
echo "cript type=\"text/javascript\" src=\"js/hz_order_con.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/Date/WdatePicker.js\"></script>\r\n</head>\r\n\r\n<body>\r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\r\n \r\n  <tr> \r\n      <td height=\"28\"  > \r\n        <table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\">\r\n           <tr> \r\n            <td> <form name=\"search\" action=\"hz_order_con.php\" method=\"get\" id=\"ordersearch\">\r\n       ";
echo "      <input name=\"startday\" type=\"text\"  class=\"input\" id=\"startday\" style=\"cursor:pointer\" onClick=\"WdatePicker()\"  value=\"";
echo $startday;
echo "\" size=\"10\"  readonly/>-\r\n\t\t\t <input name=\"endday\" type=\"text\"  class=\"input\" id=\"endday\" style=\"cursor:pointer\" onClick=\"WdatePicker()\"  value=\"";
echo $endday;
echo "\" size=\"10\"  readonly/>\r\n\t\t\t ";
echo "<s";
echo "elect name=\"showyun\" id=\"showyun\">\r\n     \t\t\t <option value=\"all\"  ";
echo seld( $showyun, "all" );
echo ">订单状态</option>\r\n    \t\t\t  <option value=\"0\"  ";
echo seld( $showyun, "0" );
echo ">未发货</option>\r\n    \t\t\t  <option value=\"1\"  ";
echo seld( $showyun, "1" );
echo ">已发货</option>\r\n   \t\t\t </select>\r\n\t\t\t ";
echo "<s";
echo "elect name=\"showtui\" id=\"showtui\">\r\n    \t\t\t<option value=\"0\" ";
echo seld( $showtui, "0" );
echo ">正常订单</option>\r\n      \t\t\t<option value=\"1\" ";
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
echo ">每页50条</option>\r\n              </select>\r\n\t\t\t  ";
echo "<s";
echo "elect name=\"showtype\" id=\"showtype\">\r\n    \t\t\t<option value=\"orderno\" ";
echo seld( $showtype, "orderno" );
echo ">按订单号搜索</option>\r\n      \t\t\t<option value=\"goodsname\" ";
echo seld( $showtype, "goodsname" );
echo ">按赠品名称搜索</option>\r\n\t\t\t\t<option value=\"user\" ";
echo seld( $showtype, "user" );
echo ">按会员账号搜索</option>\r\n   \t\t\t </select>\r\n              <input type=\"text\" name=\"key\" value=\"";
echo $key;
echo "\"  size=\"12\" class=\"input\" />\r\n              <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=\"button\" />\r\n            </form></td>\r\n          </tr>\r\n        </table>\r\n    </td>\r\n   \r\n  </tr> \r\n</table>\r\n\r\n</div>\r\n";
$scl = " dtime>{$starttime} and dtime<{$endtime} ";
if ( $showyun == "1" || $showyun == "0" )
{
				$scl .= " and ifyun='{$showyun}' ";
}
if ( $showtui == "1" || $showtui == "0" )
{
				$scl .= " and iftui='{$showtui}' ";
}
if ( $key != "" )
{
				if ( $showtype == "orderno" )
				{
								$scl .= " and OrderNo='{$key}' ";
				}
				else if ( $showtype == "goodsname" )
				{
								$scl .= " and (items regexp '{$key}') ";
				}
				else if ( $showtype == "user" )
				{
								$scl .= " and user='{$key}' ";
				}
}
if ( $showtui == "1" || $showok == "1" )
{
				$dodis = " style='display:none' ";
}
else
{
				$dodis = " ";
}
$msql->query( "select count(orderid) from {P}_hz_order where {$scl}" );
if ( $msql->next_record( ) )
{
				$totalnums = $msql->f( "count(orderid)" );
}
$pages = new pages( );
$pages->setvar( array( "key" => $key, "shownum" => $shownum, "showyun" => $showyun, "showtui" => $showtui, "startday" => $startday, "endday" => $endday ) );
$pages->set( $shownum, $totalnums );
$pagelimit = $pages->limit( );
echo "<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n          <tr>\r\n            <td width=\"35\" height=\"23\"  class=\"biaoti\" style=\"padding-left:10px\">ID</td>\r\n            <td width=\"65\"  class=\"biaoti\" style=\"padding-left:10px\">订单号</td>\r\n            <td height=\"23\"  class=\"biaoti\" >订购摘要</td>\r\n            <td width=\"65\"  class=\"biaoti\" >积分</";
echo "td>\r\n            <td width=\"65\"  class=\"biaoti\" >会员帐号</td>\r\n            <td width=\"90\" height=\"23\"  class=\"biaoti\" >订购时间</td>\r\n\t\t    <td width=\"33\" height=\"23\" align=\"center\"  class=\"biaoti\" ";
echo $dodis;
echo ">发货</td>\r\n            <td width=\"33\" height=\"23\" align=\"center\"  class=\"biaoti\" >详情</td>\r\n\t\t    <td height=\"23\" width=\"33\"  class=\"biaoti\" align=\"center\" ";
echo $dodis;
echo ">退订</td>\r\n          </tr>\r\n";
$msql->query( "select * from {P}_hz_order where {$scl} order by dtime desc limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$orderid = $msql->f( "orderid" );
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
				$dtime = date( "y-m-d", $dtime );
				$paytime = date( "y-m-d", $paytime );
				switch ( $ifyun )
				{
								case "0" :
												$yunimg = "toolbar_no.gif";
												$title_yun = "按这里发货";
												$title_tui = "按这里退订";
												break;
								case "1" :
												$yunimg = "toolbar_ok.gif";
												$title_yun = "已发货";
												$title_tui = "已发货，不可退订";
												break;
				}
				echo " \r\n          <tr class=\"list\" id=\"tr_";
				echo $orderid;
				echo "\" >\r\n             <td width=\"35\" valign=\"top\"  style=\"padding-left:10px\">";
				echo $orderid;
				echo "</td>\r\n\t\t\t <td width=\"65\" valign=\"top\"  style=\"padding-left:10px\">";
				echo $OrderNo;
				echo "</td>\r\n\t\t\t <td valign=\"top\">";
				echo $items;
				echo " </td>\r\n\t\t\t <td width=\"65\" valign=\"top\" > ";
				echo $totalcent;
				echo "</td>\r\n\t\t     <td width=\"65\" valign=\"top\" >";
				echo $user;
				echo "</td>\r\n\t        <td width=\"90\" valign=\"top\">";
				echo $dtime;
				echo " </td>\r\n           \r\n            <td width=\"33\" align=\"center\" valign=\"top\" ";
				echo $dodis;
				echo "><img id=\"orderyun_";
				echo $orderid;
				echo "\" src=\"images/";
				echo $yunimg;
				echo "\"  border=\"0\" class=\"orderyun\" style=\"cursor:pointer\" title=\"";
				echo $title_yun;
				echo "\" /></td>\r\n            <td width=\"33\" align=\"center\" valign=\"top\" ><a href=\"order_detail.php?orderid=";
				echo $orderid;
				echo "\"><img src=\"images/look.png\" width=\"24\" height=\"24\"  border=\"0\" alt=\"查看详情\" /></a></td>\r\n            <td width=\"33\" align=\"center\" valign=\"top\" ";
				echo $dodis;
				echo "><img id=\"ordertui_";
				echo $orderid;
				echo "_";
				echo $ifyun;
				echo "\" src=\"images/delete.png\"  border=\"0\" class=\"ordertui\" style=\"cursor:pointer\" title=\"";
				echo $title_tui;
				echo "\" /></td>\r\n          </tr>\r\n          ";
}
echo " \r\n</table>\r\n</div>\r\n\r\n\r\n\r\n";
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

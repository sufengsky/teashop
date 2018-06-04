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
needauth( 723 );
$step = $_REQUEST['step'];
$tp = $_REQUEST['tp'];
$key = $_GET['key'];
$ifall = $_GET['ifall'];
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
if ( $ifall == "" )
{
				$ifall = "all";
}
if ( $key == "" )
{
				$key = "请输入赠品名称";
}
if ( $ifall == "dan" )
{
				$ifshowkey = "inline";
}
else
{
				$ifshowkey = "none";
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/Date/WdatePicker.js\"></script>\r\n";
echo "<s";
echo "cript>\r\nfunction keyFocus(obj){\r\n\tvar oldkey=obj.value;\r\n\tif(oldkey==\"请输入赠品名称\"){\r\n\t\tobj.value=\"\";\r\n\t\tobj.style.color=\"#555555\";\r\n\t}\r\n}\r\n\r\nfunction keyBlur(obj){\r\n\tvar nowkey=obj.value;\r\n\tif(nowkey==\"\"){\r\n\t\tobj.value=\"请输入赠品名称\";\r\n\t\tobj.style.color=\"#aaaaaa\";\r\n\t}\r\n}\r\n\r\nfunction ifshowKey(obj){\r\n\tvar ifshowkey=obj.value;\r\n\tif(ifshowkey==\"dan\"){\r\n\t\t$(\"#key\").css({display:\"in";
echo "line\"});\r\n\t}else{\r\n\t\t$(\"#key\").css({display:\"none\"});\r\n\t}\r\n}\r\n\r\nfunction checkAll(){\r\n\tvar ifall=$(\"#ifall\")[0].value;\r\n\tif(ifall==\"dan\"){\r\n\t\tvar key=$(\"#key\")[0].value;\r\n\t\tif(key==\"\" || key==\"请输入赠品名称\"){\r\n\t\t\talert(\"请输入赠品名称\");\r\n\t\t}else{\r\n\t\t\t$(\"#ordersearch\").submit();\r\n\t\t}\r\n\t}else{\r\n\t\t$(\"#ordersearch\").submit();\r\n\t}\r\n}\r\n</script>\r\n</head>\r\n\r\n<body>\r\n<div class=\"searchzone\">\r";
echo "\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\r\n \r\n  <tr> \r\n      <td height=\"28\"  > \r\n        <table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\">\r\n           <tr> \r\n            <td> <form name=\"search\" action=\"hz_tongji_sell.php\" method=\"get\" id=\"ordersearch\">\r\n             <input name=\"startday\" type=\"text\"  class=\"input\" id=\"startday\" style=\"cursor:pointer\" onClick=\"WdateP";
echo "icker()\"  value=\"";
echo $startday;
echo "\" size=\"9\"  readonly/>\r\n             -\r\n\t\t\t <input name=\"endday\" type=\"text\"  class=\"input\" id=\"endday\" style=\"cursor:pointer\" onClick=\"WdatePicker()\"  value=\"";
echo $endday;
echo "\" size=\"9\"  readonly/>\r\n\t\t\t ";
echo "<s";
echo "elect name=\"ifall\" id=\"ifall\" onchange=\"ifshowKey(this);\">\r\n      \t\t\t<option value=\"all\"  ";
echo seld( $ifall, "all" );
echo ">全部赠品</option>\r\n     \t\t\t <option value=\"dan\" ";
echo seld( $ifall, "dan" );
echo ">单个赠品</option>\r\n   \t\t\t </select>\r\n              <input type=\"text\" name=\"key\" id=\"key\" value=\"";
echo $key;
echo "\" size=\"15\" class=\"input\" style=\"color:#aaaaaa; display:";
echo $ifshowkey;
echo ";\" onFocus=\"keyFocus(this);\" onBlur=\"keyBlur(this);\" />\r\n              <input type=\"button\" name=\"button\" value=\"查询\" class=\"button\" onClick=\"checkAll();\" />\r\n              <input name=\"tp\" type=\"hidden\" id=\"tp\" value=\"search\" />\r\n            </form></td>\r\n          </tr>\r\n        </table>\r\n    </td>\r\n   \r\n  </tr> \r\n</table>\r\n\r\n</div>\r\n";
if ( $tp == "search" )
{
				$scl = " dtime>{$starttime} and dtime<{$endtime} and iftui='0' ";
				if ( $ifall == "dan" )
				{
								if ( $key != "" && $key != "请输入赠品名称" )
								{
												$scl .= " and goods='{$key}' ";
								}
				}
				echo "<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n          <tr>\r\n            <td width=\"32\"  class=\"biaoti\" style=\"padding-left:10px\">序号</td>\r\n            <td height=\"23\"  class=\"biaoti\" >赠品名称</td>\r\n            <td width=\"100\"  class=\"biaoti\" >提交时间</td>\r\n            <td width=\"85\"  class=\"biaoti\" >所需积分（分）</td>\r\n         ";
				echo "   <td width=\"50\"  class=\"biaoti\" >订购数量</td>\r\n            <td width=\"75\"  class=\"biaoti\" >会员账号</td>\r\n            <td width=\"80\" height=\"23\"  class=\"biaoti\" >小计（分）</td>\r\n            <td width=\"80\" height=\"23\" align=\"center\"  class=\"biaoti\" >相关订单</td>\r\n\t      </tr>\r\n          ";
				$p = 1;
				$t_cent = 0;
				$t_nums = 0;
				$msql->query( "select * from {P}_hz_orderitems where {$scl} order by dtime desc" );
				while ( $msql->next_record( ) )
				{
								$id = $msql->f( "id" );
								$memberid = $msql->f( "memberid" );
								$orderid = $msql->f( "orderid" );
								$gid = $msql->f( "gid" );
								$goods = $msql->f( "goods" );
								$nums = $msql->f( "nums" );
								$jcent = $msql->f( "cent" );
								$dtime = $msql->f( "dtime" );
								$dtime = date( "Y-m-d", $dtime );
								$fsql->query( "select * from {P}_hz_order where orderid='{$orderid}'" );
								if ( $fsql->next_record( ) )
								{
												$OrderNo = $fsql->f( "OrderNo" );
												$user = $fsql->f( "user" );
								}
								$fsql->query( "select * from {P}_hz_con where id='{$gid}'" );
								if ( $fsql->next_record( ) )
								{
												$cent = $fsql->f( "cent" );
								}
								$t_cent += $jcent;
								$t_nums += $nums;
								echo " \r\n          <tr class=\"list\" id=\"tr_";
								echo $orderid;
								echo "\" >\r\n            <td width=\"32\" valign=\"top\" style=\"padding-left:10px\">";
								echo $p;
								echo "</td>\r\n            <td valign=\"top\">";
								echo $goods;
								echo "</td>\r\n\t\t\t <td width=\"100\" valign=\"top\">";
								echo $dtime;
								echo "</td>\r\n\t\t\t <td width=\"85\" valign=\"top\" >";
								echo $cent;
								echo "</td>\r\n\t\t\t <td width=\"50\" valign=\"top\">";
								echo $nums;
								echo "</td>\r\n\t\t\t <td width=\"75\" valign=\"top\">";
								echo $user;
								echo "</td>\r\n\t\t\t <td width=\"80\" valign=\"top\">";
								echo $jcent;
								echo "</td>\r\n            <td  width=\"80\" align=\"center\" valign=\"top\" ><a href=\"order_detail.php?orderid=";
								echo $orderid;
								echo "\">";
								echo $OrderNo;
								echo "</a> </td>\r\n          </tr>\r\n        \r\n          ";
								$p++;
				}
				echo " \r\n        <tr class=\"list\" >\r\n            <td valign=\"top\"  class=\"biaoti1\" style=\"padding-left:10px\">合计</td>\r\n            <td valign=\"top\" class=\"biaoti1\">-</td>\r\n            <td width=\"100\" valign=\"top\" class=\"biaoti1\" >-</td>\r\n            <td width=\"85\" valign=\"top\" class=\"biaoti1\" >-</td>\r\n            <td width=\"50\" valign=\"top\" class=\"biaoti1\">";
				echo $t_nums;
				echo "</td>\r\n            <td width=\"75\" valign=\"top\" class=\"biaoti1\">-</td>\r\n            <td width=\"80\" valign=\"top\"  class=\"biaoti1\">";
				echo $t_cent;
				echo "</td>\r\n            <td width=\"80\" align=\"center\" valign=\"top\" class=\"biaoti1\" >-</td>\r\n    </tr> \r\n</table>\r\n</div>\r\n";
}
else
{
				echo "<div style=\"margin:10px;font:12px/25px Verdana, Arial, Helvetica, sans-serif\">\r\n请选择查询条件，或输入赠品名称等关键词，对指定范围的订单进行查询和统计\r\n</div>\r\n";
}
echo "</body>\r\n</html>\r\n";
?>

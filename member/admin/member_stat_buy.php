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
include( "func/member.inc.php" );
needauth( 70 );
$tp = $_REQUEST['tp'];
$fromM = $_REQUEST['fromM'];
$fromY = $_REQUEST['fromY'];
$fromD = $_REQUEST['fromD'];
$ToM = $_REQUEST['ToM'];
$ToY = $_REQUEST['ToY'];
$ToD = $_REQUEST['ToD'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body >\r\n\r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\" height=\"29\">\r\n  <tr>\r\n    <form method=\"get\" action=\"member_stat_buy.php\">\r\n      <td colspan=\"2\">";
echo daylist( "fromY", "fromM", "fromD", $fromY, $fromM, $fromD );
echo " - ";
echo daylist( "toY", "toM", "toD", $toY, $toM, $toD );
echo "       \r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=button>\r\n        \r\n          <input type=\"hidden\" name=\"tp\" value=\"search\">\r\n          <input type=\"hidden\" name=\"memberid\" value=\"";
echo $memberid;
echo "\">\r\n      </td> </form>\r\n  </tr>\r\n</table>\r\n\r\n</div>\r\n\r\n";
if ( $tp == "search" )
{
				trylimit( "_member", 200, "memberid" );
}
echo "<div class=\"listzone\">\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n    <tr>\r\n      <td  class=\"biaoti\" width=\"3\">&nbsp;</td>\r\n      <td  class=\"biaoti\" width=\"85\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyTime;
echo "</span></td> \r\n      <td width=\"70\" height=\"28\"  class=\"biaoti\">";
echo $strMemberUser;
echo "</td>\r\n      <td  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strMemberFrom23;
echo "</span></td>\r\n      <td width=\"95\" height=\"28\"  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyPaytype;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"65\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyFrom;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"65\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyJine;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"70\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyOrder;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"60\">";
echo "<s";
echo "pan class=\"title\">";
echo $strSalesname;
echo "</span></td>\r\n      <td width=\"80\"  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strLogName;
echo "</span></td>\r\n    </tr>\r\n";
if ( $fromM == "" || $toM == "" )
{
				$fromY = date( "Y", time( ) );
				$fromM = date( "n", time( ) );
				$fromD = date( "j", time( ) );
				$toY = date( "Y", time( ) );
				$toM = date( "n", time( ) );
				$toD = date( "j", time( ) );
}
$fromtime = mktime( 0, 0, 0, $fromM, $fromD, $fromY );
$totime = mktime( 23, 59, 59, $toM, $toD, $toY );
$scl = " id!='0' ";
if ( $memberid != "" )
{
				$scl .= " and memberid='{$memberid}' ";
}
$scl .= " and daytime>={$fromtime} and daytime<={$totime} ";
$msql->query( "select * from {P}_member_buylist where {$scl} order by id desc" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$memberid = $msql->f( "memberid" );
				$orderid = $msql->f( "orderid" );
				$buyfrom = $msql->f( "buyfrom" );
				$paytype = $msql->f( "paytype" );
				$daytime = $msql->f( "daytime" );
				$paytotal = $msql->f( "paytotal" );
				$ip = $msql->f( "ip" );
				$OrderNo = $msql->f( "OrderNo" );
				$logname = $msql->f( "logname" );
				$daytime = date( "Y-m-d", $daytime );
				$total = $total + $paytotal;
				$fsql->query( "select * from {P}_member where memberid='{$memberid}'" );
				if ( $fsql->next_record( ) )
				{
								$mymembergroupid = $fsql->f( "membergroupid" );
								$membertypeid = $fsql->f( "membertypeid" );
								$user = $fsql->f( "user" );
								$name = $fsql->f( "name" );
								$salesname = $fsql->f( "salesname" );
								$company = $fsql->f( "company" );
				}
				switch ( $mymembergroupid )
				{
								case "2" :
												$showmyname = $company;
												break;
								default :
												$showmyname = $name;
												break;
				}
				echo " <tr class=\"list\">\r\n  <td width=\"3\">&nbsp;</td>\r\n  <td width=\"85\">";
				echo $daytime;
				echo "</td> \r\n        <td width=\"70\"  > ";
				echo $user;
				echo " </td>\r\n        <td>";
				echo $showmyname;
				echo "</td>\r\n        <td width=\"95\"   height=\"26\">";
				echo $paytype;
				echo "</td>\r\n        <td width=\"65\">";
				echo $buyfrom;
				echo "</td>\r\n        <td width=\"65\">";
				echo $paytotal;
				echo "</td>\r\n        <td width=\"70\">";
				echo $OrderNo;
				echo "</td>\r\n        <td width=\"60\">";
				echo $salesname;
				echo "</td>\r\n        <td width=\"80\">";
				echo $logname;
				echo "</td>\r\n</tr>\r\n\r\n    ";
}
$total = number_format( $total, 2, ".", "" );
echo " \r\n <tr>\r\n   <td  class=\"biaoti1\" width=\"3\">&nbsp;</td>\r\n      <td  class=\"biaoti1\" width=\"85\">";
echo "<s";
echo "pan class=\"title\">";
echo $strHeji;
echo "</span></td> \r\n      <td width=\"70\" height=\"28\"  class=\"biaoti1\">-</td>\r\n      <td  class=\"biaoti1\">-</td>\r\n      <td width=\"95\" height=\"28\"  class=\"biaoti1\">";
echo "<s";
echo "pan class=\"title\">-</span></td>\r\n      <td  class=\"biaoti1\" width=\"65\">";
echo "<s";
echo "pan class=\"title\">-</span></td>\r\n      <td  class=\"biaoti1\" width=\"65\">";
echo "<s";
echo "pan class=\"title\">";
echo $total;
echo "</span></td>\r\n      <td  class=\"biaoti1\" width=\"70\">";
echo "<s";
echo "pan class=\"title\">-</span></td>\r\n      <td  class=\"biaoti1\" width=\"60\">";
echo "<s";
echo "pan class=\"title\">-</span></td>\r\n      <td width=\"80\"  class=\"biaoti1\">";
echo "<s";
echo "pan class=\"title\">-</span></td>\r\n    </tr>\r\n  </table>\r\n</div>\r\n<br /><br /><br />\r\n</body>\r\n</html>\r\n";
?>

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
needauth( 68 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body >\r\n\r\n";
$step = $_REQUEST['step'];
$memberid = $_REQUEST['memberid'];
$id = $_REQUEST['id'];
if ( $memberid == "" )
{
				echo "ERROR:NO MEMBERID";
				exit( );
}
$scl = " memberid='{$memberid}' ";
$totalnums = tblcount( "_member_buylist", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "memberid" => $memberid ) );
$pages->set( 20, $totalnums );
$pagelimit = $pages->limit( );
echo "<div class=\"formzone\">\r\n<div class=\"namezone\" >";
echo $strAccBuyList;
echo " - [ ";
echo memberid2user( $memberid );
echo " ]</div>\r\n\r\n<div class=\"tablezone\">\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n    <tr> \r\n      <td width=\"160\" height=\"28\"  class=\"innerbiaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyTime;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"120\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyPaytype;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" height=\"28\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyJine;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"90\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyFrom;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"100\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccBuyOrder;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"80\">";
echo "<s";
echo "pan class=\"title\">";
echo $strLogName;
echo "</span></td>\r\n      </tr>\r\n";
$msql->query( "select * from {P}_member_buylist where {$scl} order by id desc limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$payid = $msql->f( "payid" );
				$paytype = $msql->f( "paytype" );
				$buyfrom = $msql->f( "buyfrom" );
				$paytotal = $msql->f( "paytotal" );
				$daytime = $msql->f( "daytime" );
				$ip = $msql->f( "ip" );
				$orderid = $msql->f( "orderid" );
				$OrderNo = $msql->f( "OrderNo" );
				$logname = $msql->f( "logname" );
				$daytime = date( "Y-n-j H:i:s", $daytime );
				echo "<tr class=\"list\"> \r\n        <td width=\"160\"  > ";
				echo $daytime;
				echo " </td>\r\n        <td width=\"120\">";
				echo $paytype;
				echo "</td>\r\n        <td   height=\"26\">";
				echo $paytotal;
				echo "</td>\r\n        <td width=\"90\">";
				echo $buyfrom;
				echo "</td>\r\n        <td width=\"100\">";
				echo $OrderNo;
				echo "</td>\r\n        <td width=\"80\">";
				echo $logname;
				echo "</td>\r\n      </tr>\r\n\r\n    ";
}
echo " \r\n  </table>\r\n  </div>\r\n  ";
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
echo "</div>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

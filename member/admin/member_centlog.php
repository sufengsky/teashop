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
include( ROOTPATH."includes/pages.inc.php" );
include( "func/member.inc.php" );
needauth( 52 );
$step = $_REQUEST['step'];
$memberid = $_REQUEST['memberid'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n<body>\r\n";
if ( $step == "addcent" )
{
				needauth( 66 );
				$cent1 = $_POST['cent1'];
				$cent2 = $_POST['cent2'];
				$cent3 = $_POST['cent3'];
				$cent4 = $_POST['cent4'];
				$cent5 = $_POST['cent5'];
				$memo = $_POST['memo'];
				$tsql->query( "update {P}_member set\r\n\t`cent1`=cent1+{$cent1},\r\n\t`cent2`=cent2+{$cent2},\r\n\t`cent3`=cent3+{$cent3},\r\n\t`cent4`=cent4+{$cent4},\r\n\t`cent5`=cent5+{$cent5}\r\n\twhere memberid='{$memberid}'" );
				$now = time( );
				$tsql->query( "insert into {P}_member_centlog set\r\n\t`memberid`='{$memberid}',\r\n\t`dtime`='{$now}',\r\n\t`event`='0',\r\n\t`memo`='{$memo}',\r\n\t`cent1`='{$cent1}',\r\n\t`cent2`='{$cent2}',\r\n\t`cent3`='{$cent3}',\r\n\t`cent4`='{$cent4}',\r\n\t`cent5`='{$cent5}'\r\n\t " );
				echo "<script>parent.\$.unblockUI()</script>";
				exit( );
}
$msql->query( "select * from {P}_member_centset" );
if ( $msql->next_record( ) )
{
				$centname1 = $msql->f( "centname1" );
				$centname2 = $msql->f( "centname2" );
				$centname3 = $msql->f( "centname3" );
				$centname4 = $msql->f( "centname4" );
				$centname5 = $msql->f( "centname5" );
}
echo "\r\n<div class=\"formzone\">\r\n<div class=\"namezone\" >";
echo $strCentAdd;
echo "</div>\r\n\r\n<div class=\"tablezone\">\r\n<form method=\"post\" name='regform' action=\"member_centlog.php\">\r\n<table  border=\"0\" cellspacing=\"1\" cellpadding=\"3\">\r\n  <tr>\r\n    <td>";
echo $centname1;
echo "</td>\r\n    <td><input name=\"cent1\" type=\"text\" id=\"cent1\" value=\"0\" size=\"3\" class=\"input\" /></td>\r\n    <td>";
echo $centname2;
echo "</td>\r\n    <td><input name=\"cent2\" type=\"text\" id=\"cent2\" value=\"0\" size=\"3\" class=\"input\" /></td>\r\n    <td>";
echo $centname3;
echo "</td>\r\n    <td><input name=\"cent3\" type=\"text\" id=\"cent3\" value=\"0\" size=\"3\" class=\"input\" /></td>\r\n    <td>";
echo $centname4;
echo "</td>\r\n    <td><input name=\"cent4\" type=\"text\" id=\"cent4\" value=\"0\" size=\"3\" class=\"input\" /></td>\r\n    <td>";
echo $centname5;
echo "</td>\r\n    <td><input name=\"cent5\" type=\"text\" id=\"cent5\" value=\"0\" size=\"3\" class=\"input\" /></td>\r\n    <td><input name=\"memo\" type=\"text\" id=\"memo\" value=\"";
echo $strCentFormAdmin;
echo "\" size=\"25\" class=\"input\" /></td>\r\n    <td><input type=\"submit\" name=\"Submit\" value=\"";
echo $strCentAdd;
echo "\" class=\"button\" /></td>\r\n    <td><input type=\"hidden\" name=\"memberid\" value=\"";
echo $memberid;
echo "\" />\r\n      <input type=\"hidden\" name=\"step\" value=\"addcent\" /></td>\r\n  </tr>\r\n</table>\r\n</form>\r\n</div>\r\n<div class=\"namezone\" >";
echo $strCentList;
echo "</div>\r\n\r\n<div class=\"tablezone\">\r\n";
$scl = " memberid='{$memberid}' ";
$totalnums = tblcount( "_member_centlog", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "memberid" => $memberid ) );
$pages->set( 20, $totalnums );
$pagelimit = $pages->limit( );
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n  <tr>\r\n    <td width=\"160\" height=\"28\"  class=\"innerbiaoti\">";
echo $strCentL3;
echo "</td>\r\n    <td  class=\"innerbiaoti\">";
echo $strCentEvent;
echo "</td>\r\n    <td  class=\"innerbiaoti\" width=\"50\">";
echo $centname1;
echo "</td>\r\n    <td  class=\"innerbiaoti\" width=\"50\">";
echo $centname2;
echo "</td>\r\n    <td  class=\"innerbiaoti\" width=\"50\">";
echo $centname3;
echo "</td>\r\n    <td  class=\"innerbiaoti\" width=\"50\">";
echo $centname4;
echo "</td>\r\n    <td  class=\"innerbiaoti\" width=\"50\">";
echo $centname5;
echo "</td>\r\n    </tr>\r\n  ";
$msql->query( "select * from {P}_member_centlog where {$scl} order by dtime desc limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$event = $msql->f( "event" );
				$dtime = $msql->f( "dtime" );
				$cent1 = $msql->f( "cent1" );
				$cent2 = $msql->f( "cent2" );
				$cent3 = $msql->f( "cent3" );
				$cent4 = $msql->f( "cent4" );
				$cent5 = $msql->f( "cent5" );
				$memo = $msql->f( "memo" );
				if ( $event == "0" )
				{
								$eventname = $memo;
				}
				else
				{
								$fsql->query( "select name from {P}_member_centrule where event='{$event}' " );
								if ( $fsql->next_record( ) )
								{
												$eventname = $fsql->f( "name" );
								}
				}
				$dtime = date( "Y/m/d H:i:s", $dtime );
				echo "  <tr class=\"list\">\r\n    <td width=\"160\" height=\"26\"  >";
				echo $dtime;
				echo " </td>\r\n    <td  >";
				echo $eventname;
				echo " </td>\r\n    <td width=\"50\">";
				echo $cent1;
				echo "</td>\r\n    <td width=\"50\">";
				echo $cent2;
				echo "</td>\r\n    <td width=\"50\">";
				echo $cent3;
				echo "</td>\r\n    <td width=\"50\">";
				echo $cent4;
				echo "</td>\r\n    <td width=\"50\">";
				echo $cent5;
				echo "</td>\r\n    </tr>\r\n  ";
}
echo "</table>\r\n</div>\r\n";
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
echo "</div>\r\n</div>\r\n</div>\r\n</body>\r\n</html>";
?>

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
echo "</title>\r\n</head>\r\n\r\n<body >\r\n\r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\" height=\"29\">\r\n  <tr>\r\n    <form method=\"get\" action=\"member_stat_cent.php\">\r\n      <td colspan=\"2\">";
echo daylist( "fromY", "fromM", "fromD", $fromY, $fromM, $fromD );
echo " - ";
echo daylist( "toY", "toM", "toD", $toY, $toM, $toD );
echo "       \r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=button>\r\n        \r\n          <input type=\"hidden\" name=\"tp\" value=\"search\">\r\n          <input type=\"hidden\" name=\"memberid\" value=\"";
echo $memberid;
echo "\">\r\n      </td> </form>\r\n  </tr>\r\n</table>\r\n\r\n</div>\r\n\r\n";
$msql->query( "select * from {P}_member_centset" );
if ( $msql->next_record( ) )
{
				$centname1 = $msql->f( "centname1" );
				$centname2 = $msql->f( "centname2" );
				$centname3 = $msql->f( "centname3" );
				$centname4 = $msql->f( "centname4" );
				$centname5 = $msql->f( "centname5" );
}
echo "\r\n";
if ( $tp == "search" )
{
				trylimit( "_member", 200, "memberid" );
}
echo "<div class=\"listzone\">\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n    <tr>\r\n      <td  class=\"biaoti\" width=\"3\">&nbsp;</td>\r\n      <td  class=\"biaoti\" width=\"150\">";
echo "<s";
echo "pan class=\"title\">";
echo $strCentL3;
echo "</span></td> \r\n      <td width=\"70\" height=\"28\"  class=\"biaoti\">";
echo $strMemberUser;
echo "</td>\r\n      <td  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strMemberFrom23;
echo "</span></td>\r\n      <td width=\"120\" height=\"28\"  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strCentEvent;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $centname1;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $centname2;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $centname3;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $centname4;
echo "</span></td>\r\n      <td width=\"50\"  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $centname5;
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
$scl .= " and dtime>={$fromtime} and dtime<={$totime} ";
$msql->query( "select * from {P}_member_centlog where {$scl} order by id desc" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$memberid = $msql->f( "memberid" );
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
				$dtime = date( "Y-m-d H:i:s", $dtime );
				$totalcent1 = $totalcent1 + $cent1;
				$totalcent2 = $totalcent2 + $cent2;
				$totalcent3 = $totalcent3 + $cent3;
				$totalcent4 = $totalcent4 + $cent4;
				$totalcent5 = $totalcent5 + $cent5;
				$fsql->query( "select * from {P}_member where memberid='{$memberid}'" );
				if ( $fsql->next_record( ) )
				{
								$mymembergroupid = $fsql->f( "membergroupid" );
								$membertypeid = $fsql->f( "membertypeid" );
								$user = $fsql->f( "user" );
								$name = $fsql->f( "name" );
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
				echo " <tr class=\"list\">\r\n  <td width=\"3\">&nbsp;</td>\r\n  <td width=\"150\">";
				echo $dtime;
				echo "</td> \r\n        <td width=\"70\"  > ";
				echo $user;
				echo " </td>\r\n        <td>";
				echo $showmyname;
				echo "</td>\r\n        <td width=\"120\"   height=\"26\">";
				echo $eventname;
				echo "</td>\r\n        <td width=\"50\">";
				echo $cent1;
				echo "</td>\r\n        <td width=\"50\">";
				echo $cent2;
				echo "</td>\r\n        <td width=\"50\">";
				echo $cent3;
				echo "</td>\r\n        <td width=\"50\">";
				echo $cent4;
				echo "</td>\r\n        <td width=\"50\">";
				echo $cent5;
				echo "</td>\r\n</tr>\r\n\r\n    ";
}
echo " \r\n <tr>\r\n   <td  class=\"biaoti1\" width=\"3\">&nbsp;</td>\r\n      <td  class=\"biaoti1\" width=\"150\">";
echo "<s";
echo "pan class=\"title\">";
echo $strHeji;
echo "</span></td> \r\n      <td width=\"70\" height=\"28\"  class=\"biaoti1\">-</td>\r\n      <td  class=\"biaoti1\">-</td>\r\n      <td width=\"120\" height=\"28\"  class=\"biaoti1\">";
echo "<s";
echo "pan class=\"title\">-</span></td>\r\n      <td  class=\"biaoti1\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $totalcent1;
echo "</span></td>\r\n      <td  class=\"biaoti1\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $totalcent2;
echo "</span></td>\r\n      <td  class=\"biaoti1\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $totalcent3;
echo "</span></td>\r\n      <td  class=\"biaoti1\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $totalcent4;
echo "</span></td>\r\n      <td width=\"50\"  class=\"biaoti1\">";
echo "<s";
echo "pan class=\"title\">";
echo $totalcent5;
echo "</span></td>\r\n    </tr>\r\n  </table>\r\n</div>\r\n<br /><br /><br />\r\n</body>\r\n</html>\r\n";
?>

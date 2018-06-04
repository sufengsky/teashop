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
$memo = $_REQUEST['memo'];
$ip = $_SERVER['REMOTE_ADDR'];
$id = $_REQUEST['id'];
$fpnum = $_REQUEST['fpnum'];
$memo = $_REQUEST['memo'];
if ( $memberid == "" )
{
				echo "ERROR:NO MEMBERID";
				exit( );
}
if ( $step == "modify" )
{
				needauth( 67 );
				$msql->query( "update {P}_member_pay set fpnum='{$fpnum}',memo='{$memo}' where id='{$id}' and memberid='{$memberid}'" );
}
$scl = " memberid='{$memberid}' ";
$totalnums = tblcount( "_member_pay", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "memberid" => $memberid ) );
$pages->set( 20, $totalnums );
$pagelimit = $pages->limit( );
echo "<div class=\"formzone\">\r\n<div class=\"namezone\" >";
echo $strAccList;
echo " - [ ";
echo memberid2user( $memberid );
echo " ]</div>\r\n\r\n<div class=\"tablezone\">\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n    <tr> \r\n      <td width=\"80\" height=\"28\"  class=\"innerbiaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo "<s";
echo "pan class=\"con\">";
echo $strAccAddTime;
echo "</span></span></td>\r\n      <td width=\"65\"  class=\"innerbiaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccAddMoney6;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"75\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccAddMoney2;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" height=\"28\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccAddMoney3;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"80\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccAddMoney4;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"80\">";
echo "<s";
echo "pan class=\"title\">";
echo $strAccAddMoney5;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"80\">";
echo "<s";
echo "pan class=\"title\">";
echo $strLogName;
echo "</span></td>\r\n      <td  class=\"innerbiaoti\" width=\"39\">";
echo "<s";
echo "pan class=\"title\">";
echo $strModify;
echo "</span></td>\r\n      </tr>\r\n";
$msql->query( "select * from {P}_member_pay where {$scl} order by id desc limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$oof = $msql->f( "oof" );
				$method = $msql->f( "method" );
				$type = $msql->f( "type" );
				$payhb = $msql->f( "payhb" );
				$addtime = $msql->f( "addtime" );
				$fpnum = $msql->f( "fpnum" );
				$memo = $msql->f( "memo" );
				$logname = $msql->f( "logname" );
				$addtime = date( "Y-n-j", $addtime );
				echo "<form method=get action=\"paylist.php\">\r\n<tr class=\"list\"> \r\n        <td width=\"80\"  > ";
				echo $addtime;
				echo " </td>\r\n        <td width=\"65\">";
				echo $type;
				echo "</td>\r\n        <td width=\"75\">";
				echo $method;
				echo "</td>\r\n        <td   height=\"26\">";
				echo $oof;
				echo "</td>\r\n        <td width=\"80\"><input name=\"memo\" type=\"text\" class=\"input\" id=\"memo\" value=\"";
				echo $memo;
				echo "\" size=\"20\" />\r\n          <input type=\"hidden\" name=\"memberid\" value=\"";
				echo $memberid;
				echo "\" />\r\n          <input type=\"hidden\" name=\"step\" value=\"modify\" />\r\n          <input type=\"hidden\" name=\"id\" value=\"";
				echo $id;
				echo "\" />          </td>\r\n        <td width=\"80\"><input type=\"text\" name=\"fpnum\" class=\"input\" size=\"15\" value=\"";
				echo $fpnum;
				echo "\" /></td>\r\n        <td width=\"80\">";
				echo $logname;
				echo "</td>\r\n        <td width=\"39\"><input name=\"imageField\" type=\"image\" src=\"images/modi.png\" width=\"24\" height=\"24\" border=\"0\" ></td>\r\n        </tr>\r\n\t  </form>\r\n    ";
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

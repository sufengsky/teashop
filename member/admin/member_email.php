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
include( ROOTPATH."includes/ebmail.inc.php" );
include( "language/".$sLan.".php" );
include( "func/member.inc.php" );
needauth( 55 );
$memberid = $_REQUEST['memberid'];
$step = $_REQUEST['step'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n</head>\r\n\r\n<body>\r\n";
if ( $step == "send" )
{
				$toemail = $_POST['toemail'];
				$fromemail = $_POST['fromemail'];
				$fromtitle = $_POST['fromtitle'];
				$message = $_POST['message'];
				ebmail( $toemail, $fromemail, $fromtitle, $message );
				echo "<script>parent.\$.unblockUI()</script>";
				exit( );
}
echo " \r\n";
$msql->query( "select * from {P}_member where memberid='{$memberid}'" );
if ( $msql->next_record( ) )
{
				$email = $msql->f( "email" );
				$name = $msql->f( "name" );
}
echo "<div class=\"formzone\">\r\n<form method=\"post\" action=\"member_email.php\">\r\n<div class=\"namezone\" >";
echo $strMemberMailSend;
echo "</div>\r\n<div class=\"tablezone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\">\r\n   \r\n    <tr> \r\n      <td width=\"125\"  align=\"right\">";
echo $strMemberMailTitle;
echo " : </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"fromtitle\" size=\"66\"  class=\"input\" value=\"";
echo $GLOBALS['CONF']['SiteName'].$strMemberMailPub;
echo "\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"125\"  align=\"right\">";
echo $strMemberMailTo;
echo " : </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"toemail\" size=\"66\" value=\"";
echo $email;
echo "\"  class=\"input\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"125\"  align=\"right\">";
echo $strMemberMailCon;
echo " : </td>\r\n      <td > \r\n        <textarea name=\"message\" cols=\"65\" rows=\"13\"  class=\"textarea\">";
echo $name.$strMemberMailHello."\r\n\r\n\r\n\r\n\r\n\r\n\r\n".$GLOBALS['CONF']['SiteName']." \r\n".$GLOBALS['CONF']['SiteHttp']." \r\n";
echo "</textarea>\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"125\"  align=\"right\">";
echo $strMemberMailFrom;
echo " : </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"fromemail\" size=\"66\" value=\"";
echo $GLOBALS['CONF']['SiteEmail'];
echo "\"  class=\"input\" />\r\n      </td>\r\n    </tr>\r\n   \r\n\r\n</table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strMemberMailSD;
echo "\"  class=\"button\" />\r\n        <input type=\"hidden\" name=\"memberid\" value=\"";
echo $memberid;
echo "\" />\r\n        <input type=\"hidden\" name=\"step\" value=\"send\" />\r\n\r\n</div>\r\n</form>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

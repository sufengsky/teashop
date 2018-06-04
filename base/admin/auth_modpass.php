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
needauth( 2 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body>\r\n\r\n\r\n";
$step = $_REQUEST['step'];
$user = $_REQUEST['user'];
$newpass = $_REQUEST['newpass'];
$repass = $_REQUEST['repass'];
$password = $_REQUEST['password'];
if ( $step == "modify" )
{
				if ( $newpass !== $repass )
				{
								err( $strPasswdNTC1, "", "" );
				}
				$oldmd = md5( $password );
				$newmd = md5( $newpass );
				$msql->query( "select * from {P}_base_admin where user='{$user}' and password='{$oldmd}'" );
				if ( $msql->next_record( ) )
				{
								$fsql->query( "update {P}_base_admin set password='{$newmd}'  where user='{$user}' and password='{$oldmd}'" );
								if ( $user == $_COOKIE['SYSUSER'] )
								{
												sayok( $strPasswdNTC2, ROOTPATH."admin.php", $strPasswdNTC3 );
								}
								else
								{
												sayok( $strPasswdNTC4, "", "" );
								}
				}
				else
				{
								err( $strPasswdNTC5, "", "" );
				}
}
else
{
				echo "<div class=\"formzone\">\r\n<form method=\"post\" action=\"auth_modpass.php\">\r\n<div class=\"namezone\">\r\n";
				echo $strSetMenu3;
				echo "</div>\r\n<div class=\"tablezone\">\r\n<table width=\"480\" border=\"0\" cellspacing=\"1\" cellpadding=\"4\">\r\n    <tr> \r\n      <td height=\"25\" width=\"125\" > \r\n        <div align=\"right\">";
				echo $strPasswdModiUser;
				echo "</div>\r\n      </td>\r\n      <td height=\"25\" > \r\n        <input type=\"text\" name=\"user\" class=input style=\"width:150px\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td height=\"25\" width=\"125\" > \r\n        <div align=\"right\">";
				echo $strPasswdModiOld;
				echo "</div>\r\n      </td>\r\n      <td height=\"25\" > \r\n        <input type=\"password\" name=\"password\" value=\"\" class=input style=\"width:150px\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td height=\"25\" width=\"125\" > \r\n        <div align=\"right\">";
				echo $strPasswdModiNew;
				echo "</div>\r\n      </td>\r\n      <td height=\"25\" > \r\n        <input type=\"password\" name=\"newpass\" class=input style=\"width:150px\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td height=\"25\" width=\"125\" > \r\n        <div align=\"right\">";
				echo $strPasswdModiRe;
				echo "</div>\r\n      </td>\r\n      <td height=\"25\" > \r\n        <input type=\"password\" name=\"repass\" class=input style=\"width:150px\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td height=\"25\" > \r\n        <div align=\"right\"><font color=\"#FFFFFF\"></font></div>\r\n        <div align=\"center\">        </div>\r\n      </td>\r\n    <td height=\"25\" ><input type=\"submit\" name=\"cc\" value=\"";
				echo $strSubmit;
				echo "\" class=\"button\" />\r\n      <input type=\"hidden\" name=\"step\" value=\"modify\" /></td>\r\n    </tr>\r\n\r\n</table>\r\n</div>\r\n</form>\r\n</div>\r\n";
}
echo " \r\n</body>\r\n</html>\r\n";
?>

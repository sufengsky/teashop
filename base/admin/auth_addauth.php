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
needauth( 3 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/comm.js\"></script>\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body>\r\n\r\n";
$step = $_REQUEST['step'];
$user = $_REQUEST['user'];
$password = $_REQUEST['password'];
$name = $_REQUEST['name'];
$job = $_REQUEST['job'];
$jobid = $_REQUEST['jobid'];
if ( $step == "add" )
{
				trylimit( "_base_admin", 2, "id" );
				if ( $user != "" && $password != "" )
				{
								$msql->query( "select * from {P}_base_admin where user='{$user}'" );
								if ( $msql->next_record( ) )
								{
												err( $strAuthNTC1, "", "" );
								}
								$mdpass = md5( $password );
								$msql->query( "insert into {P}_base_admin set\r\n\t\t`user`='{$user}',\r\n\t\t`password`='{$mdpass}',\r\n\t\t`name`='{$name}',\r\n\t\t`job`='{$job}',\r\n\t\t`jobid`='{$jobid}',\r\n\t\t`moveable`='1'\r\n\t\t" );
								$msql->query( "delete from {P}_base_adminrights where user='{$user}'" );
								$msql->query( "select * from {P}_base_adminauth" );
								while ( $msql->next_record( ) )
								{
												$auth_auth = $msql->f( "auth" );
												$vStr = "a".$auth_auth;
												if ( $_POST[$vStr] == "1" )
												{
																$fsql->query( "insert into {P}_base_adminrights values(0,'{$auth_auth}','{$user}')" );
												}
								}
								sayok( $strAuthNTC2, "", "" );
				}
				else
				{
								err( $strAuthNTC3, "", "" );
				}
}
else
{
				echo " \r\n<form method=\"post\" action=\"auth_addauth.php\">\r\n\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
				echo $strSetMenu4;
				echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\r\n    <tr> \r\n      <td width=\"70\"  > \r\n        <div align=\"right\">";
				echo $strAuthUser;
				echo "</div>\r\n      </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"user\" class=\"input\" style=\"width:200px\">\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"70\"  > \r\n        <div align=\"right\">";
				echo $strAuthPass;
				echo "</div>\r\n      </td>\r\n      <td  > \r\n        <input type=\"password\" name=\"password\" class=\"input\" style=\"width:200px\">\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"70\"  ><div align=\"right\">";
				echo $strAuthUserName;
				echo "</div></td>\r\n      <td  ><input type=\"text\" name=\"name\" class=\"input\" style=\"width:200px\" />\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td  ><div align=\"right\">";
				echo $strAuthJob;
				echo "</div></td>\r\n      <td  ><input name=\"job\" type=\"text\" class=\"input\" id=\"job\" style=\"width:200px\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"70\"  > \r\n        <div align=\"right\">";
				echo $strAuthJobId;
				echo "</div>\r\n      </td>\r\n      <td  > \r\n        <input name=\"jobid\" type=\"text\" class=input id=\"jobid\" style=\"width:200px\" />\r\n</td>\r\n    </tr>\r\n  </table>\r\n  </div>\r\n<div class=\"namezone\">";
				echo $strAuthSet;
				echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\r\n   <tr> \r\n          \r\n      <td class=\"innerbiaoti\" width=\"50\" height=\"28\">";
				echo $strAuth;
				echo "</td>\r\n          \r\n      <td  class=\"innerbiaoti\" width=\"80\" height=\"28\">";
				echo $strNumber;
				echo "</td>\r\n          \r\n      <td  class=\"innerbiaoti\" width=\"180\" height=\"28\">";
				echo $strAuthGroup;
				echo "</td>\r\n\r\n          \r\n      <td class=\"innerbiaoti\" height=\"28\">";
				echo $strAuthName;
				echo "</td>\r\n          \r\n        </tr>\r\n";
				$msql->query( "select * from {P}_base_adminauth order by auth" );
				while ( $msql->next_record( ) )
				{
								$auth_auth = $msql->f( "auth" );
								$auth_name = $msql->f( "name" );
								$auth_intro = $msql->f( "intro" );
								$auth_pname = $msql->f( "pname" );
								$coltype = $msql->f( "coltype" );
								echo " \r\n          <tr class=\"list\"> \r\n            \r\n      <td width=\"50\" height=\"23\"> \r\n        <input type=\"checkbox\" name=\"a";
								echo $auth_auth;
								echo "\" value=\"1\"  class=\"authcheckbox\" />\r\n            </td>\r\n      <td   width=\"80\" height=\"23\">";
								echo $auth_auth;
								echo "</td>\r\n      <td   width=\"180\" height=\"23\">";
								echo coltype2sname( $coltype );
								echo "</td>\r\n            \r\n      <td height=\"23\">";
								echo "{$auth_name}";
								echo "</td>\r\n            \r\n          </tr>\r\n         \r\n          ";
				}
				echo " \r\n <tr class=\"list\">\r\n            <td height=\"23\" colspan=\"2\">\r\n              <input id=\"selAll\" type=\"checkbox\" name=\"\" value=\"1\" />\r\n          ";
				echo $strSelAll;
				echo "</td>\r\n            <td height=\"23\">&nbsp;</td>\r\n            <td height=\"23\">&nbsp;</td>\r\n        </tr>\r\n    <tr> \r\n      <td colspan=\"5\" > \r\n       \r\n          \r\n          <input type=\"hidden\" name=\"step\" value=\"add\" />\r\n        \r\n      </td>\r\n    </tr>\r\n  </table>\r\n  </div>\r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"cc\" value=\"";
				echo $strSubmit;
				echo "\" class=\"button\" />\r\n</div>\r\n</div>\r\n\r\n</form>\r\n";
}
echo " \r\n        \r\n</body>\r\n</html>\r\n";
?>

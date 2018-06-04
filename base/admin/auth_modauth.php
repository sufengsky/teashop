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
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript>\r\nfunction cm(nn){\r\nqus=confirm(\"";
echo $strDeleteConfirm;
echo "\")\r\nif(qus!=0){\r\nwindow.location='auth_modauth.php?step=del&user='+nn;\r\n}\r\n}\r\n</script>\r\n</head>\r\n\r\n<body>\r\n\r\n";
$step = $_REQUEST['step'];
if ( $step == "del" )
{
				$user = $_REQUEST['user'];
				$msql->query( "select moveable from {P}_base_admin where user='{$user}'" );
				if ( $msql->next_record( ) )
				{
								$moveable = $msql->f( "moveable" );
				}
				if ( $moveable != "1" )
				{
								err( $strAuthDelNTC1, "", "" );
				}
				$msql->query( "delete from {P}_base_adminrights where user='{$user}'" );
				$msql->query( "delete from {P}_base_admin where user='{$user}'" );
				echo "<script>window.location='auth_modauth.php'</script>";
}
echo "\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strSetMenu5;
echo "</div>\r\n<div class=\"tablezone\">\r\n    \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" >\r\n        <tr > \r\n          <td height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strAuthUser;
echo "          </td>\r\n          <td height=\"28\" class=\"innerbiaoti\"> \r\n            ";
echo $strAuthUserName;
echo "          </td>\r\n          <td class=\"innerbiaoti\">";
echo $strAuthJob;
echo " </td>\r\n          <td class=\"innerbiaoti\">";
echo $strAuthJobId;
echo " </td>\r\n          <td height=\"28\" width=\"100\" class=\"innerbiaoti\"> \r\n           ";
echo $strAuthModify;
echo "          </td>\r\n        <td width=\"100\" class=\"innerbiaoti\">";
echo $strDeleteAcc;
echo "</td>\r\n        </tr>\r\n       \r\n        ";
$msql->query( "select * from {P}_base_admin order by id" );
while ( $msql->next_record( ) )
{
				$user = $msql->f( "user" );
				$name = $msql->f( "name" );
				$job = $msql->f( "job" );
				$jobid = $msql->f( "jobid" );
				$moveable = $msql->f( "moveable" );
				if ( $moveable != "1" )
				{
								$dis = " disabled ";
				}
				else
				{
								$dis = "";
				}
				echo " \r\n        <form method=\"post\" action=\"auth_modauth1.php\">\r\n          <tr class=\"list\"> \r\n            <td height=\"22\"> ";
				echo "{$user}";
				echo " \r\n              <input type=\"hidden\" name=\"user\" value=\"";
				echo "{$user}";
				echo "\">\r\n             \r\n            </td>\r\n            <td height=\"22\"> ";
				echo $name;
				echo " </td>\r\n            <td>";
				echo $job;
				echo " </td>\r\n            <td>";
				echo $jobid;
				echo " </td>\r\n            <td height=\"22\" width=\"100\"  > \r\n             \r\n                <input type=\"submit\" name=\"Button22\" value=\"";
				echo $strAuthModify;
				echo "\" class=button>\r\n              \r\n            </td>\r\n          <td width=\"100\"  ><input type=\"button\" name=\"Button22\" value=\"";
				echo $strDeleteAcc;
				echo "\" onClick=\"cm('";
				echo $user;
				echo "'); return false;\" class=\"button\" ";
				echo $dis;
				echo " /></td>\r\n          </tr>\r\n        </form>\r\n        ";
}
echo " \r\n    </table>\r\n     \r\n     \r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

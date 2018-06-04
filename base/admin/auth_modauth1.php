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
echo "</title>\r\n</head>\r\n\r\n<body >\r\n";
$user = $_REQUEST['user'];
$step = $_REQUEST['step'];
if ( $step == "modify" )
{
				$msql->query( "delete from {P}_base_adminrights where user='{$user}'" );
				$msql->query( "select * from {P}_base_adminauth" );
				while ( $msql->next_record( ) )
				{
								$auth_auth = $msql->f( "auth" );
								$vStr = "a"."{$auth_auth}";
								if ( $_POST[$vStr] == "1" )
								{
												$fsql->query( "insert into {P}_base_adminrights values(0,'{$auth_auth}','{$user}')" );
								}
				}
				$adminname = $_REQUEST['name'];
				$adminjob = $_REQUEST['job'];
				$adminjobid = $_REQUEST['jobid'];
				$msql->query( "update {P}_base_admin set name='{$adminname}',job='{$adminjob}',jobid='{$adminjobid}' where user='{$user}'" );
				sayok( $strAuthModifyOk, "auth_modauth.php", "" );
}
else
{
				$msql->query( "select * from {P}_base_admin where user='{$user}'" );
				if ( $msql->next_record( ) )
				{
								$adminname = $msql->f( "name" );
								$adminjob = $msql->f( "job" );
								$adminjobid = $msql->f( "jobid" );
				}
				$msql->query( "select * from {P}_base_adminrights where user='{$user}'" );
				$i = 0;
				while ( $msql->next_record( ) )
				{
								$AuthArr[$i] = $msql->f( "auth" );
								$i++;
				}
				$nums = $i - 1;
				echo "\r\n<div class=\"formzone\">\r\n<form method=\"post\" action=\"auth_modauth1.php\">\r\n\r\n<div class=\"namezone\">\r\n";
				echo $strAuthModi2;
				echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\r\n    <tr>\r\n      <td width=\"70\"  ><div align=\"right\">";
				echo $strAuthUserName;
				echo "</div></td>\r\n      <td  ><input type=\"text\" name=\"name\" class=\"input\" style=\"width:200px\"  value=\"";
				echo $adminname;
				echo "\" />\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td  ><div align=\"right\">";
				echo $strAuthJob;
				echo "</div></td>\r\n      <td  ><input name=\"job\" type=\"text\" class=\"input\" id=\"job\" style=\"width:200px\" value=\"";
				echo $adminjob;
				echo "\" />\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"70\"  > \r\n        <div align=\"right\">";
				echo $strAuthJobId;
				echo "</div>\r\n      </td>\r\n      <td  > \r\n        <input name=\"jobid\" type=\"text\" class=\"input\" id=\"jobid\" style=\"width:200px\" value=\"";
				echo $adminjobid;
				echo "\" />\r\n      </td>\r\n    </tr>\r\n  </table>\r\n  </div>\r\n<div class=\"namezone\">\r\n";
				echo $strAuthModi;
				echo " - ";
				echo $user;
				echo "</div>\r\n<div class=\"tablezone\">\r\n      \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\">\r\n        <tr> \r\n          <td width=\"50\"  class=\"innerbiaoti\">";
				echo $strAuth;
				echo "</td>\r\n          <td  class=\"innerbiaoti\" width=\"80\">";
				echo $strNumber;
				echo "</td>\r\n          <td  class=\"innerbiaoti\" width=\"180\">";
				echo $strAuthGroup;
				echo "</td>\r\n          <td  class=\"innerbiaoti\">";
				echo $strAuthName;
				echo "</td>\r\n         \r\n        </tr>\r\n       \r\n";
				$msql->query( "select * from {P}_base_adminauth order by auth" );
				while ( $msql->next_record( ) )
				{
								$auth_auth = $msql->f( "auth" );
								$auth_name = $msql->f( "name" );
								$auth_intro = $msql->f( "intro" );
								$auth_pname = $msql->f( "pname" );
								$coltype = $msql->f( "coltype" );
								$ifcheck = "";
								$n = 0;
								for ( ;	$n <= $nums;	$n++	)
								{
												if ( $AuthArr[$n] == $auth_auth )
												{
																$ifcheck = " checked ";
												}
								}
								echo " \r\n          <tr class=\"list\"> \r\n            <td width=\"50\"> \r\n              <input type=\"checkbox\" name=\"a";
								echo "{$auth_auth}";
								echo "\" value=\"1\" ";
								echo $ifcheck;
								echo "  class=\"authcheckbox\" />\r\n            </td>\r\n            <td width=\"80\">";
								echo $auth_auth;
								echo "</td>\r\n            <td   width=\"180\">";
								echo coltype2sname( $coltype );
								echo "</td>\r\n            <td>";
								echo $auth_name;
								echo "</td>\r\n            \r\n          </tr>\r\n          ";
				}
				echo " \r\n           <tr class=\"list\">\r\n            <td height=\"23\" colspan=\"2\">\r\n              <input id=\"selAll\" type=\"checkbox\" name=\"\" value=\"1\" />\r\n           ";
				echo $strSelAll;
				echo "</td>\r\n            <td height=\"23\">&nbsp;</td>\r\n            <td height=\"23\">&nbsp;</td>\r\n        </tr>\r\n\t\t  \r\n\t\t  <tr> \r\n            <td colspan=\"5\"  class=\"innerbiaoti\"> \r\n              \r\n            </td>\r\n          </tr>\r\n       \r\n    </table>\r\n\t\r\n    </div>\r\n\t  <div class=\"adminsubmit\"> \r\n                <input type=\"submit\" name=\"cc\" value=\"";
				echo $strModify;
				echo "\" class=button>\r\n                <input type=\"hidden\" name=\"step\" value=\"modify\">\r\n                <input type=\"hidden\" name=\"user\" value=\"";
				echo "{$user}";
				echo "\">\r\n     </div>\r\n\t   </form>\r\n\t   \r\n</div>\r\n      ";
}
echo "\r\n   \r\n</body>\r\n</html>\r\n";
?>

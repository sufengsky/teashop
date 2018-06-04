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
include( "func/member.inc.php" );
needauth( 67 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body >\r\n\r\n\r\n";
$step = $_REQUEST['step'];
$memberid = $_REQUEST['memberid'];
$payid = $_REQUEST['payid'];
$oof = $_REQUEST['oof'];
$method = $_REQUEST['method'];
$type = $_REQUEST['type'];
$memo = $_REQUEST['memo'];
$ip = $_SERVER['REMOTE_ADDR'];
if ( $step == "add" )
{
				trylimit( "_member_pay", 50, "id" );
				if ( $oof == "" )
				{
								err( $strAccAddNTC1, "", "" );
				}
				else
				{
								$daytime = time( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$logname = $_COOKIE['SYSNAME'];
								$msql->query( "insert into {P}_member_pay set \r\n\t`memberid`='{$memberid}',\r\n\t`payid`='{$payid}',\r\n\t`oof`='{$oof}',\r\n\t`method`='{$method}',\r\n\t`type`='{$strAccAddMoney1}',\r\n\t`addtime`='{$daytime}',\r\n\t`fpnum`='',\r\n\t`memo`='{$memo}',\r\n\t`ip`='{$ip}',\r\n\t`logname`='{$logname}'\r\n\t" );
								$msql->query( "update {P}_member set account=account+{$oof},paytotal=paytotal+{$oof} where memberid='{$memberid}'" );
								sayok( $strAccAddNTC2, "member_common.php?searchmodle=account", "" );
				}
}
echo "<div class=\"formzone\">\r\n<div class=\"namezone\">";
echo $strAccAddMoney;
echo "</div>\r\n<div class=\"tablezone\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" align=\"center\">\r\n    <form action=\"addacc.php\" method=\"post\" name=\"form1\" id=\"form1\">\r\n      <tr>\r\n        <td height=\"8\" colspan=\"2\"  class=\"con\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"125\" height=\"25\" align=\"center\" class=\"con\">";
echo $strMemberUser;
echo "</td>\r\n        <td  class=\"con\" height=\"25\">";
echo memberid2user( $memberid );
echo "</td>\r\n      </tr>\r\n      <tr>\r\n        <td class=\"con\" height=\"25\" width=\"125\" align=\"center\">";
echo $strAccAddMoney2;
echo "</td>\r\n        <td  class=\"con\" height=\"25\">";
echo "<s";
echo "elect name=\"method\">\r\n            \r\n            ";
$msql->query( "select * from {P}_member_paycenter order by xuhao" );
while ( $msql->next_record( ) )
{
				$method = $msql->f( "pcenter" );
				echo "<option value='".$method."'>".$method."</option>";
}
echo "            <option value=\"";
echo $strAccAddMethod2;
echo "\">";
echo $strAccAddMethod2;
echo "</option>\r\n          </select>\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td class=\"con\" height=\"25\" width=\"125\" align=\"center\">";
echo $strAccAddMoney3;
echo "</td>\r\n        <td  class=\"con\" height=\"25\"><input type=\"text\" name=\"oof\" size=\"8\" class=\"input\" />\r\n            </td>\r\n      </tr>\r\n      <tr>\r\n        <td class=\"con\" height=\"25\" width=\"125\" align=\"center\">";
echo $strAccAddMoney4;
echo "</td>\r\n        <td  class=\"con\" height=\"25\"><input type=\"text\" name=\"memo\" size=\"50\" class=\"input\" />\r\n            <input type=\"hidden\" name=\"memberid\" value=\"";
echo $memberid;
echo "\" />\r\n            <input type=\"hidden\" name=\"step\" value=\"add\" />\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td class=\"con\" height=\"32\" align=\"center\">&nbsp;</td>\r\n      <td class=\"con\" height=\"32\"><input type=\"submit\" name=\"Submit\" value=\"";
echo $strMemberAddAcc;
echo "\" />\r\n        <input type=\"button\" name=\"Submit2\" value=\"";
echo $strCancel;
echo "\" onclick=\"self.location='member_common.php?searchmodle=account'\" /></td>\r\n      </tr>\r\n    </form>\r\n  </table>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

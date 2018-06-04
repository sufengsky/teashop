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
needauth( 56 );
$memberid = $_REQUEST['memberid'];
$nowtype = $_REQUEST['nowtype'];
$user = $_REQUEST['user'];
$step = $_REQUEST['step'];
$page = $_REQUEST['page'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/common.js\"></script>\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n</head>\r\n\r\n<body>\r\n";
if ( $step == "mod" )
{
				$a = $_POST['a'];
				$s = $_POST['s'];
				$msql->query( "delete from {P}_member_rights where memberid='{$memberid}'" );
				$msql->query( "select * from {P}_member_secure" );
				while ( $msql->next_record( ) )
				{
								$secureid = $msql->f( "id" );
								$securetype = $msql->f( "securetype" );
								$sArr = $s[$secureid];
								if ( is_array( $sArr ) )
								{
												$sStr = ":".implode( ":", $sArr ).":";
								}
								else
								{
												$sStr = $sArr;
								}
								if ( $a[$secureid] == "1" )
								{
												$fsql->query( "insert into {P}_member_rights set\r\n\t\t\t\tmemberid='{$memberid}',\r\n\t\t\t\tsecureid='{$secureid}',\r\n\t\t\t\tsecuretype='{$securetype}',\r\n\t\t\t\tsecureset='{$sStr}'\r\n\t\t\t\t\r\n\t\t\t" );
								}
				}
				sayok( $strMemberRightNotice, "member_rights.php?memberid={$memberid}&nowtype={$nowtype}&user={$user}&page={$page}", "" );
}
$msql->query( "select * from {P}_member_rights where memberid='{$memberid}'" );
$i = 0;
while ( $msql->next_record( ) )
{
				$SecureArr[$i] = $msql->f( "secureid" );
				$SecureSetArr[$i] = $msql->f( "secureset" );
				$i++;
}
$nums = $i - 1;
echo "<div class=\"formzone\">\r\n<form method=\"post\" action=\"member_rights.php\">\r\n\r\n<div class=\"namezone\" >";
echo $strMemberRightSet;
echo " - ";
echo $user;
echo "</div>\r\n\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\">\r\n    <tr>\r\n      <td  class=\"innerbiaoti\" width=\"50\">";
echo $strMemberAuthId;
echo "</td> \r\n      <td  class=\"innerbiaoti\" width=\"50\">";
echo $strColType;
echo "</td>\r\n      <td  class=\"innerbiaoti\" width=\"160\">";
echo $strMemberTypeRD;
echo " \r\n      </td>\r\n\r\n      <td  class=\"innerbiaoti\" height=\"28\" width=\"100\">";
echo $strMemberTypeR;
echo "\t  &nbsp; <input id=\"selAll\" type=\"checkbox\" name=\"\" value=\"1\" />";
echo $strSelAll;
echo "\t  </td>\r\n      <td  class=\"innerbiaoti\" height=\"28\">";
echo $strMemberTypeRSet;
echo " </td>\r\n    </tr>\r\n    ";
$msql->query( "select * from {P}_member_secure order by id" );
while ( $msql->next_record( ) )
{
				$secureid = $msql->f( "id" );
				$coltype = $msql->f( "coltype" );
				$securetype = $msql->f( "securetype" );
				$securename = $msql->f( "securename" );
				$ifcheck = "";
				$nowset = "0";
				$n = 0;
				for ( ;	$n <= $nums;	$n++	)
				{
								if ( $SecureArr[$n] == $secureid )
								{
												$ifcheck = " checked ";
												$nowset = $SecureSetArr[$n];
												break;
								}
								else
								{
												$ifcheck = "";
												$nowset = "0";
								}
				}
				echo " \r\n    <tr class=\"list\">\r\n      <td   width=\"50\">";
				echo $secureid;
				echo "</td> \r\n      \r\n      <td   width=\"50\">";
				echo coltype2sname( $coltype );
				echo "</td>\r\n      <td   width=\"160\">";
				echo $securename;
				echo " </td>\r\n\r\n      <td   height=\"26\" width=\"100\"> \r\n        <input type=\"checkbox\" name=\"a[";
				echo $secureid;
				echo "]\" value=\"1\" ";
				echo $ifcheck;
				echo " class=\"authcheckbox\" />\r\n        \r\n      </td>\r\n      <td   height=\"26\">\r\n";
				if ( $securetype == "con" )
				{
								echo "<s";
								echo "elect name=\"s[";
								echo $secureid;
								echo "]\" >\r\n          ";
								$u = 0;
								for ( ;	$u <= 9;	$u++	)
								{
												if ( $u == $nowset )
												{
																echo "<option value='".$u."' selected>".$u."</option>";
												}
												else
												{
																echo "<option value='".$u."'>".$u."</option>";
												}
								}
								echo "        </select> &nbsp;\r\n\r\n";
								echo $strMemberTypeRRank;
				}
				else if ( $securetype == "class" )
				{
								$tsql->query( "select classtbl from {P}_base_coltype where coltype='{$coltype}'" );
								if ( $tsql->next_record( ) )
								{
												$classtbl = $tsql->f( "classtbl" );
								}
								$tsql->query( "select * from {P}".$classtbl." where pid='0'" );
								while ( $tsql->next_record( ) )
								{
												$cat = $tsql->f( "cat" );
												$catid = $tsql->f( "catid" );
												if ( strstr( $nowset, ":".$catid.":" ) )
												{
																echo "<li style='list-style-type:none;float:left;margin:3px;white-space:nowrap'><input type='checkbox' name='s[".$secureid."][]' value='".$catid."' checked /> ".$cat." &nbsp;</li>";
												}
												else
												{
																echo "<li style='list-style-type:none;float:left;margin:3px;white-space:nowrap'><input type='checkbox' name='s[".$secureid."][]' value='".$catid."' /> ".$cat." &nbsp;</li>";
												}
								}
				}
				else if ( $securetype == "banzhu" )
				{
								$tsql->query( "select classtbl from {P}_base_coltype where coltype='{$coltype}'" );
								if ( $tsql->next_record( ) )
								{
												$classtbl = $tsql->f( "classtbl" );
								}
								$tsql->query( "select * from {P}".$classtbl." where pid='0'" );
								while ( $tsql->next_record( ) )
								{
												$cat = $tsql->f( "cat" );
												$catid = $tsql->f( "catid" );
												if ( strstr( $nowset, ":".$catid.":" ) )
												{
																echo "<li style='list-style-type:none;float:left;margin:3px;white-space:nowrap'><input type='checkbox' name='s[".$secureid."][]' value='".$catid."' checked /> ".$cat." &nbsp;</li>";
												}
												else
												{
																echo "<li style='list-style-type:none;float:left;margin:3px;white-space:nowrap'><input type='checkbox' name='s[".$secureid."][]' value='".$catid."' /> ".$cat." &nbsp;</li>";
												}
								}
								if ( strstr( $nowset, ":PERSON:" ) )
								{
												echo "<li style='list-style-type:none;float:left;margin:3px;white-space:nowrap'><input type='checkbox' name='s[".$secureid."][]' value='PERSON' checked /> ".$strPersonZone." &nbsp;</li>";
								}
								else
								{
												echo "<li style='list-style-type:none;float:left;margin:3px;white-space:nowrap'><input type='checkbox' name='s[".$secureid."][]' value='PERSON' /> ".$strPersonZone." &nbsp;</li>";
								}
				}
				else
				{
								echo "<input type=\"hidden\" name=\"s[";
								echo $secureid;
								echo "]\"  value=\"";
								echo $nowset;
								echo "\" > &nbsp;-\r\n\r\n";
				}
				echo " &nbsp;&nbsp; </td>\r\n      \r\n    </tr>\r\n    ";
}
echo " \r\n   \r\n</table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n        <input type=\"submit\" name=\"cc\" value=\"";
echo $strModify;
echo "\" class=\"button\">\r\n        <input type=\"button\" name=\"cc2\" value=\"";
echo $strBack;
echo "\" class=\"button\" onClick=\"self.location='member_common.php?membertypeid=";
echo $nowtype;
echo "&page=";
echo $page;
echo "'\">\r\n        <input type=\"hidden\" name=\"step\" value=\"mod\">\r\n        <input type=\"hidden\" name=\"nowtype\" value=\"";
echo $nowtype;
echo "\">\r\n        <input type=\"hidden\" name=\"memberid\" value=\"";
echo $memberid;
echo "\">\r\n        <input type=\"hidden\" name=\"user\" value=\"";
echo $user;
echo "\">\r\n        <input type=\"hidden\" name=\"page\" value=\"";
echo $page;
echo "\">\r\n</div>\r\n</form>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

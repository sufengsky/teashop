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
needauth( 50 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n ";
echo "<S";
echo "CRIPT>\r\nfunction cm(nn){\r\nqus=confirm(\"";
echo $strMemberTypeNotice1;
echo "\")\r\nif(qus!=0){\r\nwindow.location='member_type.php?step=del&membertypeid='+nn;\r\n}\r\n}\r\n</SCRIPT>\r\n</head>\r\n\r\n<body >\r\n\r\n\r\n";
$step = $_REQUEST['step'];
$membertypeid = $_REQUEST['membertypeid'];
if ( $step == "del" )
{
				$msql->query( "select * from {P}_member where membertypeid='{$membertypeid}'" );
				if ( $msql->next_record( ) )
				{
								err( $strMemberTypeNotice2, "", "" );
				}
				$msql->query( "delete from {P}_member_notice where  membertypeid='{$membertypeid}'" );
				$msql->query( "delete from {P}_member_defaultrights where  membertypeid='{$membertypeid}'" );
				$msql->query( "delete from {P}_member_regstep where  membertypeid='{$membertypeid}'" );
				$msql->query( "delete from {P}_member_type where  membertypeid='{$membertypeid}'" );
				sayok( $strMemberTypeNotice3, "member_type.php", "" );
}
echo "<div class=\"formzone\">\r\n\r\n<div class=\"namezone\" style=\"float:left;margin:10px 10px 0px 10px\">";
echo $strSetMenu2;
echo "</div>\r\n<div style=\"float:right;margin-right:3px;margin-top:5px\">\r\n<input type=\"button\" name=\"Submit\" value=\"";
echo $strMemberTypeAdd;
echo "\"  class=\"button\" onclick=\"window.location='member_type_add.php'\" />\r\n </div>\r\n<div class=\"tablezone\" style=\"clear:both;\">\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n    <tr> \r\n      <td width=\"120\" height=\"28\"  class=\"innerbiaoti\">";
echo $strMemberGroup;
echo "</td>\r\n      <td  class=\"innerbiaoti\">";
echo $strMemberType;
echo "</td>\r\n      <td  class=\"innerbiaoti\" width=\"100\">";
echo $strMemberTypeRegAllow;
echo "</td>\r\n      <td  class=\"innerbiaoti\" height=\"28\" width=\"70\">";
echo $strMemberTypeCs;
echo "</td>\r\n      <td  class=\"innerbiaoti\" height=\"28\" width=\"70\">";
echo $strMemberTypeRight;
echo "</td>\r\n      <td  class=\"innerbiaoti\" height=\"28\" width=\"70\">";
echo $strDelete;
echo "</td>\r\n    </tr>\r\n    ";
$msql->query( "select * from {P}_member_type order by membertypeid" );
while ( $msql->next_record( ) )
{
				$membertypeid = $msql->f( "membertypeid" );
				$membertype = $msql->f( "membertype" );
				$membergroupid = $msql->f( "membergroupid" );
				$ifcanreg = $msql->f( "ifcanreg" );
				$ifchecked = $msql->f( "ifchecked" );
				$fsql->query( "select * from {P}_member_group where id='{$membergroupid}'" );
				if ( $fsql->next_record( ) )
				{
								$membergroup = $fsql->f( "membergroup" );
				}
				echo "<tr class=\"list\"> \r\n        <td width=\"120\"  > ";
				echo $membergroup;
				echo "        </td>\r\n        <td>";
				echo $membertype;
				echo "</td>\r\n        <td width=\"100\">";
				showyn( $ifcanreg );
				echo "</td>\r\n        <td   height=\"26\" width=\"70\"><a href=\"member_type_setup.php?membertypeid=";
				echo $membertypeid;
				echo "\"><img src=\"images/set.png\"  border=\"0\"></a></td>\r\n        <td   height=\"26\" width=\"70\"><a href=\"member_type_rights.php?membertypeid=";
				echo $membertypeid;
				echo "\"><img src=\"images/auth.png\"  border=\"0\"></a></td>\r\n        <td   height=\"26\" width=\"70\"><img src=\"images/delete.png\"  style=\"cursor:pointer\"  onClick=\"cm('";
				echo "{$membertypeid}";
				echo "')\"></td>\r\n      </tr>\r\n    ";
}
echo " \r\n  </table>\r\n  </div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

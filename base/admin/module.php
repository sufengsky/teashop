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
needauth( 6 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/module.js\"></script>\r\n\r\n</head>\r\n<body>\r\n\r\n<div class=\"formzone\">\r\n<div class=\"rightzone\">\r\n<div id=\"notice\" style=\"display:none\"></div>\r\n\r\n<form action=\"\" method=\"post\"  name=\"getNewCol\" id=\"getNewCol\">\r\n   ";
echo "<s";
echo "elect name=\"instcoltype\" id=\"instcoltype\" style=\"width:150px;display:none\">\r\n   </select>\r\n   <input name=\"phpwebUser\" type=\"hidden\" id=\"phpwebUser\" value=\"";
echo $GLOBALS['CONF']['phpwebUser'];
echo "\" />\r\n  <input type=\"button\" id=\"getcolbutton\" name=\"getcolbutton\" value=\"";
echo $strGetCollist;
echo "\" class=\"button\" />\r\n  <input type=\"button\" id=\"instbutton\" name=\"instbutton\" value=\"";
echo $strColInstall;
echo "\" class=\"button\" style=\"display:none\" />\r\n</form>\r\n\r\n</div>\r\n<div class=\"namezone\">\r\n";
echo $strSetMenu6;
echo "</div>\r\n<div class=\"tablezone\">\r\n    \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" >\r\n        <tr > \r\n          <td width=\"110\" height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strColName;
echo "          </td>\r\n          <td width=\"110\" height=\"28\" class=\"innerbiaoti\"> \r\n            ";
echo $strColSName;
echo " </td>\r\n          <td width=\"110\" class=\"innerbiaoti\">";
echo $strColType;
echo " </td>\r\n          <td class=\"innerbiaoti\">";
echo $strColPlusNum;
echo " </td>\r\n          <td width=\"80\" class=\"innerbiaoti\">";
echo $strColIU;
echo "</td>\r\n          <td width=\"80\" height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strColPlusGl;
echo "          </td>\r\n        </tr>\r\n       \r\n        ";
$msql->query( "select * from {P}_base_coltype order by moveable asc,id asc" );
while ( $msql->next_record( ) )
{
				$coltype = $msql->f( "coltype" );
				$colname = $msql->f( "colname" );
				$sname = $msql->f( "sname" );
				$moveable = $msql->f( "moveable" );
				$installed = $msql->f( "installed" );
				$fsql->query( "select count(id) from {P}_base_plusdefault where coltype='{$coltype}'" );
				if ( $fsql->next_record( ) )
				{
								$plusnum = $fsql->f( "count(id)" );
				}
				echo " \r\n          <tr class=\"list\" id=\"tr_";
				echo $coltype;
				echo "\"> \r\n            <td width=\"110\" height=\"22\"> ";
				echo $colname;
				echo " \r\n            </td>\r\n            <td width=\"110\" height=\"22\">  ";
				echo $sname;
				echo "</td>\r\n            <td width=\"110\">";
				echo $coltype;
				echo " </td>\r\n            <td>";
				echo $plusnum;
				echo " </td>\r\n            <td width=\"80\">\r\n\t\t\t";
				if ( $moveable == "1" )
				{
								echo "\t\t\t<input type=\"button\" id=\"uninstall_";
								echo $coltype;
								echo "\" name=\"Button11\" value=\"";
								echo $strColUnInstall;
								echo "\" class=\"uninstall\"    ";
								echo switchdis( 100 );
								echo " />\r\n\t\t\t";
				}
				else
				{
								echo "\t\t\t<input type=\"button\"  name=\"Button11\" value=\"";
								echo $strColUnInstall;
								echo "\" class=\"nouninstall\" disabled=\"true\" />\r\n\t\t\t";
				}
				echo "\t\t\t</td>\r\n            <td width=\"80\" height=\"22\"  > \r\n                ";
				if ( $coltype == "base" )
				{
								echo "\t\t\t\t<input type=\"button\" name=\"Button22\" value=\"";
								echo $strPlusBorderGl;
								echo "\" class=\"button1\" onClick=\"self.location='plusborder.php'\" ";
								echo switchdis( 100 );
								echo " />\r\n\t\t\t\t";
				}
				else
				{
								echo "\t\t\t\t<input type=\"button\" name=\"Button22\" value=\"";
								echo $strColPlusGl;
								echo "\" class=\"button\" onClick=\"self.location='plus.php?coltype=";
								echo $coltype;
								echo "'\"  ";
								echo switchdis( 100 );
								echo "  />\r\n\t\t\t\t";
				}
				echo "              \r\n            </td>\r\n          </tr>\r\n        ";
}
echo " \r\n    </table>\r\n     \r\n     \r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

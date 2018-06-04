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
$coltype = $_GET['coltype'];
if ( $coltype == "" )
{
				exit( );
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/module.js\"></script>\r\n\r\n</head>\r\n<body>\r\n\r\n<div class=\"formzone\">\r\n<div class=\"rightzone\">\r\n<div id=\"notice\" style=\"display:none\"></div>\r\n<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" name=\"plusInput\" id=\"plusInput\" >\r\n  <input type=\"file\" name=\"datafile\" id=\"datafile\" size=\"35\" class=\"input\"  ";
echo switchdis( 100 );
echo "  />\r\n  <input type=\"submit\" id=\"addplus\" name=\"addplus\" value=\"";
echo $strPlusInput;
echo "\" class=\"button\"  ";
echo switchdis( 100 );
echo "  />\r\n  <input name=\"act\" type=\"hidden\" id=\"act\" value=\"plusinput\" />\r\n</form>\r\n\r\n</div>\r\n\r\n<div class=\"namezone\">\r\n";
echo $strColPlusGl;
echo "</div>\r\n<div class=\"tablezone\">\r\n    \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" >\r\n        <tr > \r\n          <td height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strPlusName;
echo "           / ";
echo $strPlusLable;
echo " </td>\r\n          <td width=\"110\" class=\"innerbiaoti\">";
echo $strPlusLocat;
echo "</td>\r\n          <td width=\"39\" class=\"innerbiaoti\" >";
echo $strTempNum;
echo " </td>\r\n          <td width=\"150\" class=\"innerbiaoti\">";
echo $strTempFileDef;
echo " </td>\r\n          <td width=\"68\" class=\"innerbiaoti\">";
echo $strPlusOutput;
echo " </td>\r\n          <td width=\"55\" height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strColTempGl;
echo "          </td>\r\n        </tr>\r\n       \r\n        ";
$msql->query( "select * from {P}_base_plusdefault where coltype='{$coltype}' order by id" );
while ( $msql->next_record( ) )
{
				$pluslable = $msql->f( "pluslable" );
				$plusname = $msql->f( "plusname" );
				$tempname = $msql->f( "tempname" );
				$plustype = $msql->f( "plustype" );
				$pluslocat = $msql->f( "pluslocat" );
				$tempnum = 0;
				$fsql->query( "select count(id) from {P}_base_plustemp where pluslable='{$pluslable}'" );
				if ( $fsql->next_record( ) )
				{
								$tempnum = $fsql->f( "count(id)" );
				}
				$tempnum = $tempnum + 1;
				echo " \r\n          <tr class=\"list\"> \r\n            <td height=\"22\"> ";
				echo $plusname;
				echo "<br />\r\n            ";
				echo $pluslable;
				echo "            </td>\r\n            <td width=\"110\"  >";
				echo $plustype;
				echo "/";
				echo $pluslocat;
				echo "</td>\r\n            <td width=\"39\"  >";
				echo $tempnum;
				echo " </td>\r\n            <td width=\"150\"  >";
				echo $tempname;
				echo " </td>\r\n            <td width=\"68\"  ><input type=\"button\" id='po_";
				echo $pluslable;
				echo "' name=\"plusoutput\" value=\"";
				echo $strPlusOutput1;
				echo "\" class=\"plusoutput\"    ";
				echo switchdis( 100 );
				echo "  />\r\n            </td>\r\n            <td width=\"55\" height=\"22\"  > \r\n             \r\n                <input type=\"button\" name=\"Button22\" value=\"";
				echo $strColTempGl;
				echo "\" class=\"button\" onClick=\"self.location='plustemp.php?pluslable=";
				echo $pluslable;
				echo "'\"   ";
				echo switchdis( 100 );
				echo "  />\r\n              \r\n            </td>\r\n          </tr>\r\n        ";
}
echo " \r\n    </table>\r\n     \r\n     \r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

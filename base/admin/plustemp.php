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
$pluslable = $_GET['pluslable'];
if ( $pluslable == "" )
{
				exit( );
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/module.js\"></script>\r\n\r\n</head>\r\n<body>\r\n\r\n<div class=\"formzone\">\r\n<div class=\"rightzone\">\r\n";
echo $strTempName;
echo " <input type=\"text\" id=\"addtempcname\" class=\"input\" size=\"30\"  ";
echo switchdis( 100 );
echo " /> &nbsp;\r\n";
echo $strTempFile;
echo " <input type=\"text\" id=\"addtempname\" class=\"input\" size=\"30\"  ";
echo switchdis( 100 );
echo " />\r\n<input type=\"hidden\" id=\"addtemppluslable\" value=\"";
echo $pluslable;
echo "\" />\r\n<input type=\"button\" id=\"addtemp\" name=\"addtemp\" value=\"";
echo $strTempAdd;
echo "\" class=\"button\"   ";
echo switchdis( 100 );
echo " />\r\n\r\n</div>\r\n<div class=\"namezone\">\r\n";
echo $strColTempGl;
echo "</div>\r\n<div class=\"tablezone\">\r\n    \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" id=\"plustemplist\">\r\n        <tr > \r\n          <td height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strPlusLable;
echo "          </td>\r\n          <td height=\"28\" class=\"innerbiaoti\"> \r\n            ";
echo $strTempName;
echo " </td>\r\n          <td class=\"innerbiaoti\"> ";
echo $strTempFile;
echo "</td>\r\n          <td width=\"60\" height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strDelete;
echo "          </td>\r\n        </tr>\r\n";
$msql->query( "select tempname from {P}_base_plusdefault where pluslable='{$pluslable}' limit 0,1" );
if ( $msql->next_record( ) )
{
				$tempname = $msql->f( "tempname" );
}
echo "      \r\n  <tr > \r\n            <td height=\"22\"> ";
echo $pluslable;
echo " \r\n            </td>\r\n            <td height=\"22\">  ";
echo $strTempFileDef;
echo "</td>\r\n            <td>";
echo $tempname;
echo "</td>\r\n            <td width=\"60\" height=\"22\"  >--- \r\n             \r\n            </td>\r\n        </tr>\r\n";
$msql->query( "select * from {P}_base_plustemp where pluslable='{$pluslable}' order by id" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$pluslable = $msql->f( "pluslable" );
				$cname = $msql->f( "cname" );
				$tempname = $msql->f( "tempname" );
				echo " \r\n          <tr id=\"tr_";
				echo $id;
				echo "\"> \r\n            <td height=\"22\"> ";
				echo $pluslable;
				echo " \r\n            </td>\r\n            <td height=\"22\">  ";
				echo $cname;
				echo "</td>\r\n            <td>";
				echo $tempname;
				echo "</td>\r\n            <td width=\"60\" height=\"22\"  ><img id=\"del_";
				echo $id;
				echo "\" src=\"images/delete.png\" width=\"24\" height=\"24\" class=\"tempdel\" /> \r\n             \r\n            </td>\r\n          </tr>\r\n        ";
}
echo " \r\n    </table>\r\n     \r\n     \r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

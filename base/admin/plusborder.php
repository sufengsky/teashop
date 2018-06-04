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
echo "cript type=\"text/javascript\" src=\"js/module.js\"></script>\r\n\r\n</head>\r\n<body>\r\n\r\n<div class=\"formzone\">\r\n<div class=\"rightzone\">\r\n";
echo $strPlusBorderNo;
echo "<input type=\"text\" class=\"input\" id=\"bordertempid\" size=\"4\" maxlength=\"4\" /> \r\n&nbsp;\r\n";
echo $strPlusBorderName;
echo " <input type=\"text\" id=\"bordertempname\" class=\"input\" size=\"25\" />\r\n";
echo "<s";
echo "elect name=\"bordertype\" id=\"bordertype\">\r\n  <option value=\"border\">";
echo $strPlusBorderType1;
echo "</option>\r\n  <option value=\"lable\">";
echo $strPlusBorderType2;
echo "</option>\r\n</select>\r\n";
echo "<s";
echo "elect name=\"borderselcolor\" id=\"borderselcolor\">\r\n  <option value=\"no\">";
echo $strPlusBorderNoColor;
echo "</option>\r\n  <option value=\"yes\">";
echo $strPlusBorderSelColor;
echo "</option>\r\n</select>\r\n<input type=\"button\" id=\"addborder\" name=\"addborder\" value=\"";
echo $strPlusBorderAdd;
echo "\" class=\"button\" />\r\n\r\n</div>\r\n<div class=\"namezone\">\r\n";
echo $strPlusBorderGl;
echo "</div>\r\n<div class=\"tablezone\">\r\n    \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" id=\"borderlist\">\r\n        <tr > \r\n          <td height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strPlusBorderType;
echo "          </td>\r\n          <td height=\"28\" class=\"innerbiaoti\"> \r\n            ";
echo $strPlusBorderNo;
echo " </td>\r\n          <td class=\"innerbiaoti\"> ";
echo $strPlusBorderName;
echo "</td>\r\n          <td width=\"60\" height=\"28\" class=\"innerbiaoti\"> \r\n           ";
echo $strDelete;
echo "          </td>\r\n        </tr>\r\n\r\n";
$msql->query( "select * from {P}_base_border order by tempid" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$bordertype = $msql->f( "bordertype" );
				$tempid = $msql->f( "tempid" );
				$tempname = $msql->f( "tempname" );
				if ( $bordertype == "lable" )
				{
								$btype = $strPlusBorderType2;
				}
				else
				{
								$btype = $strPlusBorderType1;
				}
				echo " \r\n          <tr id=\"tr_";
				echo $tempid;
				echo "\" > \r\n            <td height=\"22\" > ";
				echo $btype;
				echo " \r\n            </td>\r\n            <td height=\"22\">  ";
				echo $tempid;
				echo "</td>\r\n            <td>";
				echo $tempname;
				echo "</td>\r\n            <td width=\"60\" height=\"22\"  ><img id=\"del_";
				echo $tempid;
				echo "\" src=\"images/delete.png\" width=\"24\" height=\"24\" class=\"borderdel\" /> \r\n             \r\n            </td>\r\n          </tr>\r\n        ";
}
echo " \r\n    </table>\r\n     \r\n     \r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

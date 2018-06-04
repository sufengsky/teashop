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
needauth( 311 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/yun.js\"></script>\r\n</head>\r\n\r\n<body >\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strYunZoneSet;
echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n  <tr>\r\n   <td width=\"50\" class=\"innerbiaoti\">";
echo $strXuhao;
echo "</td>\r\n    <td class=\"innerbiaoti\">";
echo $strYunZone;
echo "</td>\r\n    <td class=\"innerbiaoti\">&nbsp;</td>\r\n    <td class=\"innerbiaoti\">&nbsp;</td>\r\n  </tr>\r\n  </table>\r\n<div id=\"bigcatall\">\r\n";
$newxuhao = 1;
$msql->query( "select * from {P}_shop_yunzone where pid=0 order by xuhao" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$zone = $msql->f( "zone" );
				$xuhao = $msql->f( "xuhao" );
				echo " \r\n<div class=\"bigcat\" id=\"bigcat_";
				echo $id;
				echo "\">\r\n        <input id=\"xuhao_";
				echo $id;
				echo "\" type=\"text\" size=\"3\" value=\"";
				echo $xuhao;
				echo "\" class=\"input\" />\r\n        <input id=\"zone_";
				echo $id;
				echo "\" type=\"text\" size=\"39\" value=\"";
				echo $zone;
				echo "\" class=\"input\" />\r\n     \t <input type=\"button\" class=\"button_zone_modify\" id=\"topZoneModi_";
				echo $id;
				echo "\" value=\"";
				echo $strModify;
				echo "\">\r\n\t\t <input type=\"button\" class=\"button_zone_del\" id=\"topZoneDel_";
				echo $id;
				echo "\" value=\"";
				echo $strDelete;
				echo "\">\r\n\t\t <input type=\"button\" class=\"button_zone_open\" id=\"topZoneOpen_";
				echo $id;
				echo "\" value=\"";
				echo $strYunZoneOpen;
				echo "\">\r\n</div>\r\n";
				$newxuhao = $xuhao + 1;
}
echo " \r\n\r\n</div>\r\n<br />\r\n<div class=\"bigcat\" id=\"addnewcat\">\r\n        <input id=\"newxuhao\" type=\"text\" size=\"3\" value=\"";
echo $newxuhao;
echo "\" class=\"input\" />\r\n        <input id=\"newzone\" type=\"text\" size=\"39\" value=\"";
echo $strYunNTC2;
echo "\" class=\"input\" onFocus=\"this.value=''\" />\r\n     \t <input type=\"button\" id=\"addYunZone\" value=\"";
echo $strYunZoneAdd;
echo "\" class=\"button\" />\r\n</div>\r\n\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

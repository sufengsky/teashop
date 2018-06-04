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
echo "cript type=\"text/javascript\" src=\"js/selzone.js\"></script>\r\n</head>\r\n<body>\r\n\r\n\r\n<div class=\"popzone\">\r\n<div class=\"selall\">\r\n<div class=\"selsave\">\r\n  <input type=\"button\" id=\"saveyunzone\" class=\"graybutton\" value=\"";
echo $strSave;
echo "\" />\r\n   <input type=\"button\" id=\"closeyunzone\" class=\"graybutton\" value=\"";
echo $strClose;
echo "\" />\r\n</div>\r\n\t<input name=\"selall\" type=\"checkbox\" id=\"selall\"  value=\"1\" /> ";
echo $strSelAll;
echo "</div>\r\n";
$msql->query( "select * from {P}_shop_yunzone where pid='0' order by xuhao" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$zone = $msql->f( "zone" );
				echo "\t<div class=\"selbigzone\" id=\"selbigzone_";
				echo $id;
				echo "\">\r\n\t\t<div class=\"togDiv\" id=\"togDiv_";
				echo $id;
				echo "\">\r\n\t\t\t<div class=\"togDivImg_open\" id=\"togDivImg_";
				echo $id;
				echo "\"></div>\r\n\t\t</div>\r\n\t<input name=\"z\" type=\"checkbox\" id=\"z_";
				echo $id;
				echo "\" class=\"selbig\" value=\"";
				echo $id;
				echo "\" /> ";
				echo $zone;
				echo "\t</div>\r\n\t<div class=\"selsubzoneall\" id=\"selsubzoneall_";
				echo $id;
				echo "\">\r\n\t";
				$fsql->query( "select * from {P}_shop_yunzone where pid='{$id}' order by xuhao" );
				while ( $fsql->next_record( ) )
				{
								$subid = $fsql->f( "id" );
								$subzone = $fsql->f( "zone" );
								echo "\t\t\t<div class=\"selsubzone\" id=\"selsubzone_";
								echo $subid;
								echo "\">\r\n\t\t\t<input name=\"z\" type=\"checkbox\" id=\"s_";
								echo $subid;
								echo "\" class=\"selsub_";
								echo $id;
								echo "\" value=\"";
								echo $subid;
								echo "\" /> ";
								echo $subzone;
								echo "\t\t\t</div>\r\n\t";
				}
				echo "\t</div>\r\n\t\r\n";
}
echo "\r\n</div>\r\n</body>\r\n</html>";
?>

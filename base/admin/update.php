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
needauth( 7 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/update.js\"></script>\r\n\r\n</head>\r\n\r\n<body ondragstart=\"window.event.returnValue=false\" oncontextmenu=\"window.event.returnValue=false\" onselectstart=\"event.returnValue=false\">\r\n\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">";
echo $strSetMenu8;
echo "</div>\r\n<div id=\"noupdateed\" class=\"tablezone\"></div>\r\n<div id=\"updateed\" class=\"tablezone\"></div>\r\n\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

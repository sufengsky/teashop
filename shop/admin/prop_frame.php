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
$catid = $_GET['catid'];
$pid = $_GET['pid'];
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link   href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strColPropTitle;
echo "</title>\r\n\r\n";
echo "<S";
echo "CRIPT>\r\n\r\n function sok(k){\r\n  returnValue = k;\r\n  self.close();\r\n }\r\n\r\n\r\n\r\n</SCRIPT>\r\n</HEAD>\r\n<BODY><IFRAME width=100% height=100%\r\nsrc=\"prop.php?catid=";
echo $catid;
echo "&pid=";
echo $pid;
echo "\" frameBorder=0></IFRAME>\r\n</BODY></HTML>";
?>

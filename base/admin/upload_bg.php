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
include( "func/upload.inc.php" );
include( "func/plus.inc.php" );
needauth( 5 );
$step = $_REQUEST['step'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n</head>\r\n\r\n<body >\r\n";
if ( $step == "add" )
{
				$uppic = $_FILES['jpg'];
				if ( 0 < $uppic['size'] )
				{
								$uppath = "effect/source/bg";
								$arr = newuploadimage( $uppic['tmp_name'], $uppic['type'], $uppic['size'], $uppath );
								$pic = $arr[3];
								echo "<script>parent.\$().pageBgimgList();parent.\$.unblockUI()</script>";
								exit( );
				}
				else
				{
								echo "<script>alert('".$strUploadNotice1."');</script>";
				}
}
echo "<form action=\"upload_bg.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"form\" style=\"margin:0px\">\r\n\t\t<table width=\"100%\" height=\"100\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\t\t\t<tr> \r\n              <td align=\"center\" >\r\n\t\t\t    ";
echo $strPlusPic;
echo " &nbsp;\r\n\t\t\t    <input name=\"jpg\" type=\"file\" id=\"jpg\" style='WIDTH:250px;' class=\"input\" />\r\n\t\t\t   <input type=\"submit\" name=\"submit\"   value=\"";
echo $strConfirm;
echo "\"  class=\"button\"  />\r\n\t\t\t   <input name=\"step\" type=\"hidden\" id=\"step\" value=\"add\" />\r\n              </td>\r\n            </tr>\r\n\t\t\t   \r\n</table>\r\n</form>\r\n</body>\r\n</html>\r\n";
?>

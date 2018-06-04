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
needauth( 316 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/brand.js\"></script>\r\n<body >\r\n";
$step = $_REQUEST['step'];
if ( $step == "add" )
{
				$brand = htmlspecialchars( $_POST['brand'] );
				$xuhao = htmlspecialchars( $_POST['xuhao'] );
				$url = htmlspecialchars( $_POST['url'] );
				$intro = $_POST['intro'];
				$tj = $_POST['tj'];
				$pic = $_FILES['jpg'];
				$intro = url2path( $intro );
				if ( $brand == "" )
				{
								err( $strBrandNotice1, "", "" );
				}
				if ( 50 < strlen( $brand ) )
				{
								err( $strBrandNotice2, "", "" );
				}
				if ( 65000 < strlen( $intro ) )
				{
								err( $strBrandNotice3, "", "" );
				}
				if ( 0 < $pic['size'] )
				{
								$nowdate = date( "Ymd", time( ) );
								$picpath = "../pics/".$nowdate;
								@mkdir( @$picpath, 511 );
								$uppath = "shop/pics/".$nowdate;
								$arr = newuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $uppath );
								if ( $arr[0] != "err" )
								{
												$src = $arr[3];
								}
								else
								{
												err( $arr[1], "", "" );
												exit( );
								}
				}
				$msql->query( "insert into {P}_shop_brand set \r\n\tbrand='{$brand}',\r\n\turl='{$url}',\r\n\txuhao='{$xuhao}',\r\n\tintro='{$intro}',\r\n\ttj='{$tj}',\r\n\tlogo='{$src}'\r\n\t" );
				sayok( $strBrandNotice4, "brand.php", "" );
}
echo " \r\n\r\n<form action=\"brandadd.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"form\" id=\"addBrandForm\">\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strBrandAdd;
echo "</div>\r\n<div class=\"tablezone\">\r\n  \r\n\r\n      <table width=\"100%\" cellpadding=\"2\" align=\"center\"  border=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td width=\"100\" height=\"30\" align=\"center\" >";
echo $strBrandName;
echo "</td>\r\n          <td height=\"30\" ><input name=\"brand\" type=\"text\" class=\"input\" id=\"brand\" value=\"\" size=\"35\"   maxlength=\"50\" />\r\n          <font color=\"#FF0000\">*</font> </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strBrandLogo;
echo "</td>\r\n          <td height=\"30\" ><input name=\"jpg\" type=\"file\" class=\"input\" size=\"50\"  /></td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strBrandUrl;
echo "</td>\r\n          <td height=\"30\" ><input name=\"url\" type=\"text\" class=\"input\" id=\"url\" value=\"http://\" size=\"50\"   maxlength=\"100\" />\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strBrandIntro;
echo "</td>\r\n          <td height=\"30\" >\r\n\t\t  <input type=\"hidden\" name=\"intro\" value=\"";
echo $intro;
echo "\" />\t\t\t\r\n        ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"intro\";\r\n            editor.editorWidth = \"680px\";\r\n            editor.editorHeight = \"230px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"shop/pics/\";\r\n            editor.iconPa";
echo "th = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n\t\t  </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strPaiXuhao;
echo "</td>\r\n          <td height=\"30\" ><input name=\"xuhao\" type=\"text\" class=\"input\" id=\"xuhao\" value=\"0\" size=\"5\"   maxlength=\"5\" />\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strBrandTj;
echo "</td>\r\n          <td height=\"30\" ><input name=\"tj\" type=\"checkbox\" id=\"tj\" value=\"1\" /></td>\r\n        </tr>\r\n          \r\n          \r\n        \r\n      </table>\r\n\t \r\n</div>  \r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"submit\"  value=\"";
echo $strSubmit;
echo "\" class=\"button\" onClick=\"KindSubmit();\" />\r\n<input type=\"hidden\" name=\"step\" value=\"add\" />\r\n</div> \r\n</div>\r\n</form>\r\n</body>\r\n</html>\r\n";
?>

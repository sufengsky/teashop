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
needauth( 319 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/shop.js\"></script>\r\n";
echo "<s";
echo "tyle type=\"text/css\">\r\n<!--\r\n.style1 {color: #FF3300}\r\n-->\r\n</style>\r\n</head>\r\n<body >\r\n\r\n<form id=\"shopAddForm\" name=\"form\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">\r\n\r\n<div class=\"formzone\">\r\n\r\n<div class=\"namezone\">\r\n";
echo $strShopFabu;
echo "</div>\r\n<div class=\"tablezone\">\r\n<div  id=\"notice\" class=\"noticediv\"></div>\r\n\r\n";
$pid = $_REQUEST['pid'];
if ( !isset( $pid ) || $pid == "" )
{
				$pid = 0;
}
$msql->query( "select * from {P}_shop_config" );
while ( $msql->next_record( ) )
{
				$variable = $msql->f( "variable" );
				$value = $msql->f( "value" );
				$GLOBALS['SHOPCONF'][$variable] = $value;
}
$danwei = $GLOBALS['SHOPCONF']['DefaultDanwei'];
$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
$centmodle = $GLOBALS['SHOPCONF']['CentModle'];
echo "\r\n<table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n    <tr> \r\n      <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strShopCat;
echo "</td>\r\n      <td width=\"5\" >&nbsp;</td>\r\n      <td height=\"30\" > \r\n        ";
echo "<s";
echo "elect id=\"selcatid\" name=\"catid\" >\r\n          ";
$fsql->query( "select * from {P}_shop_cat  order by catpath" );
while ( $fsql->next_record( ) )
{
				$lpid = $fsql->f( "pid" );
				$lcatid = $fsql->f( "catid" );
				$cat = $fsql->f( "cat" );
				$catpath = $fsql->f( "catpath" );
				$lcatpath = explode( ":", $catpath );
				$i = 0;
				for ( ;	$i < sizeof( $lcatpath ) - 2;	$i++	)
				{
								$tsql->query( "select catid,cat from {P}_shop_cat where catid='{$lcatpath[$i]}'" );
								if ( $tsql->next_record( ) )
								{
												$ncatid = $tsql->f( "cat" );
												$ncat = $tsql->f( "cat" );
												$ppcat .= $ncat."/";
								}
				}
				if ( $pid == $lcatid )
				{
								echo "<option value='".$lcatid."' selected>".$ppcat.$cat."</option>";
				}
				else
				{
								echo "<option value='".$lcatid."'>".$ppcat.$cat."</option>";
				}
				$ppcat = "";
}
echo " \r\n\t\t</select>\r\n\t\t</td>\r\n    </tr>\r\n\t<tr> \r\n      <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strBrand;
echo "</td>\r\n      <td width=\"5\" >&nbsp;</td>\r\n      <td height=\"30\" > \r\n        ";
echo "<s";
echo "elect id=\"brandid\" name=\"brandid\" >\r\n\t\t</select>\r\n\t\t</td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strGoodsBn;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"bn\" type=\"text\" class=\"input\" id=\"bn\" size=\"35\" maxlength=\"30\" />\r\n        ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n    </tr>\r\n\t <tr> \r\n      <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strShopAddTitle;
echo "</td>\r\n      <td width=\"5\" >&nbsp;</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"title\" style='WIDTH: 499px;font-size:12px;' maxlength=\"200\" class=\"input\" />\r\n        ";
echo "<s";
echo "pan class=\"style1\">* </span> </td>\r\n    </tr>\r\n   \r\n\t\r\n\t</table>\r\n\t<div id=\"proplist\">\r\n\t\r\n\t</div>\r\n\t<table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n\t<tr id=\"tr_price\">\r\n\t  <td height=\"30\" align=\"right\" >";
echo $strGoodsPrice;
echo "</td>\r\n\t  <td width=\"5\" >&nbsp;</td>\r\n\t  <td height=\"30\" ><input name=\"price\" type=\"text\" class=\"input\" id=\"newprice\" value=\"0\" size=\"12\" maxlength=\"12\" />  ";
echo $strHbDanwei;
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strGoodsPrice0;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"price0\" type=\"text\" class=\"input\" id=\"price0\" value=\"0\" size=\"12\" maxlength=\"12\" />\r\n          ";
echo $strHbDanwei;
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strGoodsDanwei;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"danwei\" type=\"text\" class=\"input\" id=\"danwei\" value=\"";
echo $danwei;
echo "\" size=\"12\" maxlength=\"12\" />\r\n        ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strGoodsWeight;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"weight\" type=\"text\" class=\"input\" id=\"weight\" size=\"12\" maxlength=\"12\" />\r\n          ";
echo $strZlDanwei;
echo " ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strGoodsKucun;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"kucun\" type=\"text\" class=\"input\" id=\"kucun\" value=\"0\" size=\"12\" maxlength=\"12\" />\r\n        ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t  \r\n\t   ";
if ( $centopen == "1" && $centmodle == "1" )
{
				echo "\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
				echo $strGoodsCent;
				echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"cent\" type=\"text\" class=\"input\" id=\"cent\" value=\"0\" size=\"12\" maxlength=\"12\" />     </td>\r\n\t  </tr>\r\n\t  ";
}
echo "\t  \r\n\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strShopAddImg;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input type=\"file\" name=\"jpg\" class=\"input\" style=\"WIDTH: 499px;\" />\r\n          ";
echo "<s";
echo "pan class=\"style1\"> </span> </td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strShopMemo;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><textarea name=\"memo\" style=\"WIDTH: 499px;font-size:12px;\" class=\"textarea\" rows=\"5\"></textarea>\r\n      </td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td height=\"30\" align=\"right\" >";
echo $strShopTag;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" >\r\n\t  <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"10\" />\r\n        <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"10\" />\r\n        <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"10\" />\r\n        <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"10\" />\r\n ";
echo "       <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"10\" /></td>\r\n    </tr>\r\n\t<tr>\r\n      <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strShopAddCon;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" > \r\n         <input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t\t";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"680px\";\r\n            editor.editorHeight = \"300px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"shop/pics/\";\r\n            editor.iconPat";
echo "h = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n       </td>\r\n    </tr>\r\n    \r\n   \r\n\r\n</table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"cc\"  onClick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\" />\r\n<input type=\"hidden\" name=\"act\" value=\"shopadd\">\r\n<input type=\"hidden\" name=\"pid\" value=\"";
echo $pid;
echo "\">\r\n<input type=\"hidden\" id=\"nowid\"  value=\"\" />\r\n<input type=\"hidden\" name=\"author\"  value=\"";
echo $_COOKIE['SYSNAME'];
echo "\" />\r\n<input type=\"hidden\" name=\"source\"  value=\"\" />\r\n</div>\r\n\r\n</div>\r\n</form>\r\n";
echo "<s";
echo "cript>\r\n$(document).ready(function() {\r\n$().getPropList();\r\n$().getCatRelBrand();\r\n});\r\n</script>\r\n</body>\r\n</html>\r\n";
?>

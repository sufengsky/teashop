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
needauth( 320 );
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
echo "tyle type=\"text/css\">\r\n<!--\r\n.style1 {color: #FF3300}\r\n-->\r\n</style>\r\n\r\n</head>\r\n<body >\r\n";
$id = $_REQUEST['id'];
$pid = $_REQUEST['pid'];
$msql->query( "select * from {P}_shop_config" );
while ( $msql->next_record( ) )
{
				$variable = $msql->f( "variable" );
				$value = $msql->f( "value" );
				$GLOBALS['SHOPCONF'][$variable] = $value;
}
$centopen = $GLOBALS['SHOPCONF']['CentOpen'];
$centmodle = $GLOBALS['SHOPCONF']['CentModle'];
$msql->query( "select * from {P}_shop_con where  id='{$id}'" );
if ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$catid = $msql->f( "catid" );
				$title = $msql->f( "title" );
				$memo = $msql->f( "memo" );
				$body = $msql->f( "body" );
				$canshu = $msql->f( "canshu" );
				$xuhao = $msql->f( "xuhao" );
				$cl = $msql->f( "cl" );
				$tj = $msql->f( "tj" );
				$ifnew = $msql->f( "ifnew" );
				$ifred = $msql->f( "ifred" );
				$iffb = $msql->f( "iffb" );
				$src = $msql->f( "src" );
				$type = $msql->f( "type" );
				$author = $msql->f( "author" );
				$source = $msql->f( "source" );
				$secure = $msql->f( "secure" );
				$oldcatid = $msql->f( "catid" );
				$oldcatpath = $msql->f( "catpath" );
				$tags = $msql->f( "tags" );
				$bn = $msql->f( "bn" );
				$weight = $msql->f( "weight" );
				$kucun = $msql->f( "kucun" );
				$cent = $msql->f( "cent" );
				$price = $msql->f( "price" );
				$price0 = $msql->f( "price0" );
				$brandid = $msql->f( "brandid" );
				$danwei = $msql->f( "danwei" );
				$body = htmlspecialchars( $body );
				$body = path2url( $body );
				$canshu = htmlspecialchars( $canshu );
				$canshu = path2url( $canshu );
				$dtime = date( "Y-m-d H:i:s", $msql->f( "dtime" ) );
				$uptime = date( "Y-m-d H:i:s", $msql->f( "uptime" ) );
				$tags = explode( ",", $tags );
}
echo " \r\n\r\n<form id=\"shopForm\" name=\"form\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strShopModify;
echo "</div>\r\n<div class=\"tablezone\">\r\n<div  id=\"notice\" class=\"noticediv\"></div>\r\n      <table class=\"shopmodizone\" width=\"100%\" cellpadding=\"2\" align=\"center\"  border=\"0\" cellspacing=\"0\">\r\n         \r\n\t\t  <tr> \r\n            <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strShopCat;
echo "</td>\r\n            <td width=\"5\" >&nbsp;</td>\r\n            <td height=\"30\" > \r\n              ";
echo "<s";
echo "elect id=\"selcatid\" name=\"catid\" >\r\n                ";
$fsql->query( "select * from {P}_shop_cat order by catpath" );
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
				if ( $catid == $lcatid )
				{
								echo "<option value='".$lcatid."' selected>".$ppcat.$cat."</option>";
				}
				else
				{
								echo "<option value='".$lcatid."'>".$ppcat.$cat."</option>";
				}
				$ppcat = "";
}
echo " \r\n              </select>\r\n            </td>\r\n          </tr>\r\n\t\t  <tr>\r\n            <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strBrand;
echo "</td>\r\n            <td >&nbsp;</td>\r\n            <td height=\"30\" >\r\n\t\t\t ";
echo "<s";
echo "elect id=\"brandid\" name=\"brandid\" >\r\n              </select>\r\n            </td>\r\n\t    </tr>\r\n\t\t  <tr>\r\n            <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strGoodsBn;
echo "</td>\r\n            <td >&nbsp;</td>\r\n            <td height=\"30\" ><input name=\"bn\" type=\"text\" class=\"input\" id=\"bn\" value=\"";
echo $bn;
echo "\" size=\"35\" maxlength=\"30\" />\r\n                ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t    </tr>\r\n\t\t   <tr> \r\n            <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strShopAddTitle;
echo "</td>\r\n            <td width=\"5\" >&nbsp;</td>\r\n            <td height=\"30\" > \r\n              <input type=\"text\" id=\"title\" name=\"title\" style='WIDTH: 499px;' maxlength=\"200\" class=\"input\" value=\"";
echo $title;
echo "\" />\r\n              <font color=\"#FF0000\">*</font> </td>\r\n          </tr>\r\n      </table>\r\n\t  <div id=\"proplist\" class=\"shopmodizone\">\r\n\t  </div>\r\n\t   <table class=\"shopmodizone\" width=\"100%\" cellpadding=\"2\" align=\"center\"  border=\"0\" cellspacing=\"0\">\r\n\t\t  <tr id=\"tr_price\">\r\n\t  <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strGoodsPrice;
echo "</td>\r\n\t  <td width=\"5\" >&nbsp;</td>\r\n\t  <td height=\"30\" ><input name=\"price\" type=\"text\" class=\"input\" id=\"modiprice\" value=\"";
echo $price;
echo "\" size=\"12\" maxlength=\"12\" />\r\n\t    <input name=\"oldprice\" type=\"hidden\" id=\"oldprice\" value=\"";
echo $price;
echo "\"  />  \r\n\t  ";
echo $strHbDanwei;
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strGoodsPrice0;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"price0\" type=\"text\" class=\"input\" id=\"price0\" value=\"";
echo $price0;
echo "\" size=\"12\" maxlength=\"12\" />\r\n          ";
echo $strHbDanwei;
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strGoodsDanwei;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"danwei\" type=\"text\" class=\"input\" id=\"danwei\" value=\"";
echo $danwei;
echo "\" size=\"12\" maxlength=\"12\" />\r\n        ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strGoodsWeight;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"weight\" type=\"text\" class=\"input\" id=\"weight\" value=\"";
echo $weight;
echo "\" size=\"12\" maxlength=\"12\" />\r\n          ";
echo $strZlDanwei;
echo " ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strGoodsKucun;
echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"kucun\" type=\"text\" class=\"input\" id=\"kucun\" value=\"";
echo $kucun;
echo "\" size=\"12\" maxlength=\"12\" />\r\n        ";
echo "<s";
echo "pan class=\"style1\">*</span></td>\r\n\t  </tr>\r\n\t  \r\n\t   ";
if ( $centopen == "1" && $centmodle == "1" )
{
				echo "\t<tr>\r\n      <td width=\"100\" height=\"30\" align=\"right\" >";
				echo $strGoodsCent;
				echo "</td>\r\n      <td >&nbsp;</td>\r\n      <td height=\"30\" ><input name=\"cent\" type=\"text\" class=\"input\" id=\"cent\" value=\"";
				echo $cent;
				echo "\" size=\"12\" maxlength=\"12\" />     </td>\r\n\t  </tr>\r\n\t  ";
}
echo "      </table>\r\n\t\t  \r\n\t\t   <table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n\r\n  \t\t\t\r\n\t\t  <tr> \r\n            <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strShopAddImg;
echo "</td>\r\n            <td width=\"5\" >&nbsp;</td>\r\n            <td height=\"30\" > \r\n              <input id=\"uppic\" type=\"file\" name=\"jpg\" class=\"input\" style='WIDTH: 499px;' />\r\n\t\t\t  <input  type='submit' name='modi' value='";
echo $strShopUpload;
echo "' class='savebutton' />\r\n\t\t    </td>\r\n          </tr>\r\n\t\t  \r\n\t\t   <tr>\r\n\t\t     <td height=\"30\" align=\"right\" >&nbsp;</td>\r\n\t\t     <td width=\"5\" >&nbsp;</td>\r\n\t\t     <td height=\"30\" ><div id=\"shoppages\"></div></td>\r\n        </tr>\r\n\t\t<tr>\r\n\t\t     <td align=\"right\" ></td>\r\n\t\t     <td width=\"5\" >&nbsp;</td>\r\n\t\t     <td ><img id=\"picpriview\" src=\"images/loading.gif\" /></td>\r\n\t\t     </tr>\r\n      </table>\r\n\t\r\n\t\t \r\n         <ta";
echo "ble class=\"shopmodizone\" width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n\t\t <tr>\r\n            <td width=\"100\" height=\"30\" align=\"right\" >";
echo $strShopMemo;
echo "</td>\r\n            <td width=\"5\" >&nbsp;</td>\r\n            <td height=\"30\" ><textarea name=\"memo\" style=\"WIDTH: 499px;\" class=\"textarea\" rows=\"5\">";
echo $memo;
echo "</textarea>\r\n            </td>\r\n          </tr>\r\n\t\t <tr>\r\n           <td height=\"30\" align=\"right\" >";
echo $strShopTag;
echo "</td>\r\n           <td >&nbsp;</td>\r\n           <td height=\"30\" ><input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[0];
echo "\" size=\"10\" />\r\n               <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[1];
echo "\" size=\"10\" />\r\n               <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[2];
echo "\" size=\"10\" />\r\n               <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[3];
echo "\" size=\"10\" />\r\n               <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[4];
echo "\" size=\"10\" /></td>\r\n\t\t   </tr>\r\n\t\t  \r\n\t\t  <tr>\r\n\t\t    <td height=\"30\" align=\"right\" >&nbsp;</td>\r\n\t\t    <td >&nbsp;</td>\r\n\t\t    <td height=\"30\">\r\n\t\t\t<div style=\"width:682px;border-bottom:1px #e8e8e8 solid;height:30px;margin-top:10px;\">\r\n\t\t\t<div id=\"bt_intro\" style=\"float:left;cursor:pointer;background:#e8e8e8;width:80px;height:29px;line-height:30px;border:1px #ddd solid;border-bottom:0px;text-align:center\"";
echo ">商品介绍</div>\r\n\t\t\t<div id=\"bt_canshu\"  style=\"float:left;cursor:pointer;width:80px;hheight:30px;line-height:29px;margin-left:-1px;border:1px #ddd solid;border-bottom:0px;text-align:center\">详细参数</div>\r\n\t\t\t</div>\r\n\t\t\t</td>\r\n\t       </tr>\r\n\t\t  <tr>\r\n      <td height=\"30\" width=\"100\" align=\"right\" >&nbsp;</td>\r\n      <td width=\"5\" >&nbsp;</td>\r\n      <td height=\"30\" > \r\n         <input type=\"hidden\" ";
echo "id=\"text_body\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t <input type=\"hidden\" id=\"text_canshu\" name=\"canshu\" value=\"";
echo $canshu;
echo "\" />\r\n\t\t  <input type=\"hidden\" id=\"text_type\" name=\"ttp\" value=\"body\" />\r\n\t\t <div id=\"mod_intro\">\r\n\t\t\t";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"680px\";\r\n            editor.editorHeight = \"300px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"shop/pics/\";\r\n            editor.iconPat";
echo "h = \"../../kedit/icons/\";\r\n            editor.show();\r\n            \r\n             </script>\r\n\t\t</div>\r\n\t\t<div id=\"mod_canshu\" >\r\n\t\t\r\n\t\t</div>\r\n       </td>\r\n    </tr>\r\n          <tr> \r\n            <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strFbtime;
echo "</td>\r\n            <td width=\"5\" >&nbsp;</td>\r\n            <td height=\"30\" >";
echo $dtime;
echo "</td>\r\n          </tr>\r\n          <tr> \r\n            <td height=\"30\" width=\"100\" align=\"right\" >";
echo $strUptime;
echo "</td>\r\n            <td width=\"5\" >&nbsp;</td>\r\n            <td height=\"30\" >";
echo $uptime;
echo " </td>\r\n          </tr>\r\n          \r\n          \r\n        \r\n      </table>\r\n\t \r\n</div>  \r\n<div class=\"adminsubmit\">\r\n<input id=\"adminsubmit\" type=\"submit\" name=\"modi\"  value=\"";
echo $strSave;
echo "\" class=\"button\" />\r\n<input type=\"hidden\" id=\"act\" name=\"act\" value=\"shopmodify\" />\r\n<input type=\"hidden\" id=\"nowid\" name=\"id\" value=\"";
echo $id;
echo "\" />\r\n<input type=\"hidden\" name=\"oldcatid\" value=\"";
echo $oldcatid;
echo "\" />\r\n<input type=\"hidden\" name=\"oldcatpath\" value=\"";
echo $oldcatpath;
echo "\" />\r\n<input type=\"hidden\" name=\"pid\" value=\"";
echo $pid;
echo "\" />\r\n<input type=\"hidden\" name=\"page\" value=\"";
echo $page;
echo "\" />\r\n<input type=\"hidden\" name=\"source\" value=\"";
echo $source;
echo "\" />\r\n<input type=\"hidden\" name=\"author\"  value=\"";
echo $author;
echo "\" />\r\n</div> \r\n</div>\r\n</form>\r\n";
echo "<s";
echo "cript>\r\n$(document).ready(function() {\r\n$().getPropList();\r\n$().getCatRelBrand();\r\n$().getPriceList();\r\n$().getShopPages(0);\r\n$().getContent(0);\r\n});\r\n</script>\r\n</body>\r\n</html>\r\n";
?>

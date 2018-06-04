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
needauth( 316 );
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
echo "cript type=\"text/javascript\" src=\"js/brand.js\"></script>\r\n</head>\r\n<body>\r\n\r\n\r\n<div class=\"popzone\">\r\n<form id=\"brcForm\" action=\"\" method=\"post\">\r\n<div class=\"selall\">\r\n\t<div class=\"selsave\">\r\n  \t<input type=\"submit\" id=\"saverelcat\" class=\"graybutton\" name=\"saverelcat\" value=\"";
echo $strSave;
echo "\" />\r\n  \t<input type=\"button\" id=\"closerelcat\" class=\"graybutton\" value=\"";
echo $strClose;
echo "\" />\r\n\t</div>\r\n\t<input name=\"selall\" type=\"checkbox\" id=\"selall\"  value=\"1\" /> ";
echo $strSelAll;
echo "</div>\r\n<div  id=\"notice\" class=\"noticediv\"></div>\r\n";
$brandid = $_REQUEST['brandid'];
$msql->query( "select * from {P}_shop_cat order by catpath" );
while ( $msql->next_record( ) )
{
				$catid = $msql->f( "catid" );
				$cat = $msql->f( "cat" );
				$catpath = $msql->f( "catpath" );
				$padding = strlen( $catpath ) * 4;
				$idpath = substr( str_replace( ":", "_", $catpath ), 0, 0 - 1 );
				$fsql->query( "select id from {P}_shop_brandcat where `brandid`='{$brandid}' and `catid`='{$catid}' limit 0,1" );
				if ( $fsql->next_record( ) )
				{
								$chkstr = "checked";
				}
				else
				{
								$chkstr = "";
				}
				echo "\t\r\n\t<div style=\"height:22px;padding-left:";
				echo $padding;
				echo "px\">\r\n\t<input name=\"c[]\" type=\"checkbox\" id=\"_";
				echo $idpath;
				echo "\" class=\"relcheck\" value=\"";
				echo $catid;
				echo "\"  ";
				echo $chkstr;
				echo " /> ";
				echo $cat;
				echo "\t</div>\r\n\t\r\n";
}
echo "<input name=\"brandid\" type=\"hidden\" id=\"brandid\" value=\"";
echo $brandid;
echo "\" />\r\n<input name=\"act\" type=\"hidden\" id=\"act\" value=\"setbrandrelcat\" />\r\n</form>\r\n</div>\r\n</body>\r\n</html>";
?>

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
include( ROOTPATH."includes/pages.inc.php" );
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
echo "cript type=\"text/javascript\" src=\"js/brand.js\"></script>\r\n\r\n</head>\r\n<body>\r\n\r\n";
$step = $_REQUEST['step'];
$page = $_REQUEST['page'];
if ( $step == "del" )
{
				$id = $_REQUEST['id'];
				$msql->query( "select logo from {P}_shop_brand where id='{$id}'" );
				if ( $msql->next_record( ) )
				{
								$src = $msql->f( "logo" );
								if ( file_exists( ROOTPATH.$src ) && $src != "" )
								{
												unlink( ROOTPATH.$src );
								}
				}
				$msql->query( "delete from {P}_shop_brandcat where  brandid='{$id}'" );
				$msql->query( "delete from {P}_shop_brand where  id='{$id}'" );
}
$scl = " id!='0' ";
$totalnums = tblcount( "_shop_brand", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "key" => $key ) );
$pages->set( 10, $totalnums );
$pagelimit = $pages->limit( );
echo "\r\n<div class=\"formzone\">\r\n<div class=\"tabtopzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr> \r\n      <td> \r\n<div class=\"namezone\">\r\n";
echo $strBrandSet;
echo "</div>\r\n\r\n      </td>\r\n    <td width=\"100\" align=\"right\"><input type=\"button\" name=\"Submit\" value=\"";
echo $strBrandAdd;
echo "\" class=\"button\" onClick=\"self.location='brandadd.php'\"></td>\r\n  </tr>\r\n</table>\r\n </div> \r\n<div class=\"tablezone\">\r\n <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" >\r\n  <tr> \r\n    <td class=\"innerbiaoti\" height=\"28\" width=\"39\" >";
echo $strNumber;
echo "</td>\r\n    <td class=\"innerbiaoti\" height=\"28\" width=\"39\" >";
echo $strXuhao;
echo "</td>\r\n\t <td width=\"50\" class=\"innerbiaoti\" >";
echo $strBrandLogo1;
echo "</td>\r\n    <td width=\"120\" class=\"innerbiaoti\" >";
echo $strBrandName;
echo "</td>\r\n    <td class=\"innerbiaoti\" >";
echo $strBrandUrl;
echo "</td>\r\n    <td width=\"35\" align=\"center\" class=\"innerbiaoti\" >";
echo $strShopTj;
echo "</td>\r\n    <td width=\"35\" align=\"center\" class=\"innerbiaoti\" >";
echo $strRelation;
echo "</td>\r\n    <td width=\"35\" align=\"center\" class=\"innerbiaoti\" >";
echo $strModify;
echo "</td>\r\n    <td width=\"35\" height=\"28\" align=\"center\" class=\"innerbiaoti\" >";
echo $strDelete;
echo "</td>\r\n  </tr>\r\n  ";
$msql->query( "select * from {P}_shop_brand where {$scl} order by xuhao limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$brand = $msql->f( "brand" );
				$logo = $msql->f( "logo" );
				$url = $msql->f( "url" );
				$intro = $msql->f( "intro" );
				$xuhao = $msql->f( "xuhao" );
				$tj = $msql->f( "tj" );
				echo " \r\n  <tr class=\"list\"> \r\n    <td height=\"28\" width=\"39\" > ";
				echo $id;
				echo " </td>\r\n    <td width=\"39\" >";
				echo $xuhao;
				echo " </td>\r\n    <td width=\"50\" >\r\n\t";
				if ( $logo == "" )
				{
								echo "<img id='preview_".$id."' class='preview' src='images/noimage.gif' >";
				}
				else
				{
								echo "<img id='preview_".$id."' class='preview' src='images/image.gif' >";
				}
				echo " <input type=\"hidden\" id=\"previewsrc_";
				echo $id;
				echo "\"  value=\"";
				echo $logo;
				echo "\">\r\n\r\n\t\r\n\t</td>\r\n    <td width=\"120\" >";
				echo $brand;
				echo "</td>\r\n    <td ><a href='";
				echo $url;
				echo "' target='_blank'>";
				echo $url;
				echo "</a></td>\r\n    <td width=\"35\" align=\"center\" >";
				showyn( $tj );
				echo " </td>\r\n    <td width=\"35\" align=\"center\" ><img src=\"images/set.png\" class=\"brandrelset\" id=\"brandrelset_";
				echo $id;
				echo "\" width=\"24\" height=\"24\"  style=\"cursor:pointer\" /> </td>\r\n    <td width=\"35\" align=\"center\" ><img src=\"images/edit.png\" width=\"24\" height=\"24\"  style=\"cursor:pointer\" onclick=\"window.location='brandmodify.php?id=";
				echo $id;
				echo "'\" /> </td>\r\n    <td width=\"35\" height=\"28\" align=\"center\" > <img src=\"images/delete.png\"  style=\"cursor:pointer\" onClick=\"window.location='brand.php?step=del&id=";
				echo $id;
				echo "&page=";
				echo $page;
				echo "'\">\r\n    </td>\r\n  </tr>\r\n  ";
}
echo " \r\n</table>\r\n\r\n</div>\r\n\r\n";
$pagesinfo = $pages->shownow( );
echo "<div id=\"showpages\">\r\n\t  <div id=\"pagesinfo\">";
echo $strPagesTotalStart.$totalnums.$strPagesTotalEnd;
echo " ";
echo $strPagesMeiye.$pagesinfo['shownum'].$strPagesTotalEnd;
echo " ";
echo $strPagesYeci;
echo " ";
echo $pagesinfo['now']."/".$pagesinfo['total'];
echo "</div>\r\n\t  <div id=\"pages\">";
echo $pages->output( 1 );
echo "</div>\r\n</div>\r\n</div>\r\n\r\n</body>\r\n</html>\r\n";
?>

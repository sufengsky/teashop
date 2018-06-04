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
needauth( 301 );
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
echo "cript type=\"text/javascript\" src=\"js/page.js\"></script>\r\n</head>\r\n\r\n<body>\r\n\r\n";
$step = $_REQUEST['step'];
if ( $step == "del" )
{
				$id = $_GET['id'];
				$msql->query( "select id from {P}_page where groupid='{$id}'" );
				if ( $msql->next_record( ) )
				{
								err( $strGroupNTC4, "", "" );
								exit( );
				}
				$msql->query( "select * from {P}_page_group where id='{$id}'" );
				if ( $msql->next_record( ) )
				{
								$moveable = $msql->f( "moveable" );
								$delfolder = $msql->f( "folder" );
								$delfolder_main = $delfolder."_main";
				}
				else
				{
								err( $strGroupNTC3, "", "" );
								exit( );
				}
				if ( $moveable != "1" )
				{
								err( $strGroupNTC1, "", "" );
								exit( );
				}
				$msql->query( "delete from {P}_base_pageset where coltype='page' and pagename='{$delfolder}'" );
				$msql->query( "delete from {P}_base_pageset where coltype='page' and pagename='{$delfolder_main}'" );
				$msql->query( "delete from {P}_base_plus where plustype='page' and pluslocat='{$delfolder}'" );
				$msql->query( "delete from {P}_base_plus where plustype='page' and pluslocat='{$delfolder_main}'" );
				$msql->query( "delete from {P}_page where groupid='{$id}'" );
				$msql->query( "delete from {P}_page_group where id='{$id}'" );
				if ( $delfolder != "" && 1 < strlen( $delfolder ) && !strstr( $delfolder, "." ) && !strstr( $delfolder, "/" ) )
				{
								delfold( "../".$delfolder );
				}
}
echo " \r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n  <tr> \r\n   <td >\r\n      <form method=\"get\" action=\"group.php\">\r\n        <input type=\"text\" name=\"key\" size=\"30\" class=\"input\" />\r\n        <input type=\"submit\" name=\"Submit2\" value=\"";
echo $strSearchTitle;
echo "\" class=\"button\">\r\n     </form>\r\n    </td> \r\n\t\r\n      <td align=\"right\" > \r\n\t  \r\n\t  <form id=\"addGroupForm\" method=\"post\" action=\"\">\r\n       ";
echo $strGroupName;
echo "  <input name=\"act\" type=\"hidden\" id=\"act\" value=\"addgroup\" />\r\n        <input type=\"text\" name=\"groupname\" class=\"input\" size=\"18\" />&nbsp;\r\n        ";
echo $strGroupFolder;
echo " \r\n        &nbsp;<input name=\"folder\" type=\"text\" class=\"input\" id=\"newfolder\" size=\"12\" maxlength=\"16\" />\r\n        &nbsp;<input type=\"submit\" name=\"cd\" value=\"";
echo $strGroupAdd;
echo "\" class=\"button\" />\r\n      </form>\r\n\t  <div  id=\"notice\" class=\"noticediv\"></div>\r\n\t  </td>\r\n      \r\n    \r\n  </tr>\r\n</table>\r\n</div>\r\n\r\n\r\n";
$scl = "  id!='0' ";
if ( $key != "" )
{
				$scl .= " and groupname regexp '{$key}'  ";
}
$totalnums = tblcount( "_page_group", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "key" => $key ) );
$pages->set( 10, $totalnums );
$pagelimit = $pages->limit( );
echo "<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n  <tr>\r\n    <td  class=\"biaoti\" width=\"50\" align=\"center\">";
echo $strNumber;
echo "</td>\r\n    <td  class=\"biaoti\" width=\"130\" height=\"26\">";
echo $strGroupName;
echo " \r\n      </td>\r\n    <td width=\"100\"  class=\"biaoti\">";
echo $strGroupFolder;
echo "</td>\r\n    <td  class=\"biaoti\">";
echo $strGroupUrl;
echo "</td>\r\n    <td width=\"50\"  class=\"biaoti\">";
echo $strGroupEdit;
echo "</td>\r\n    <td width=\"50\"  class=\"biaoti\">";
echo $strDelete;
echo "</td>\r\n    </tr>\r\n  ";
$msql->query( "select * from {P}_page_group where {$scl} order by id desc limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$groupname = $msql->f( "groupname" );
				$moveable = $msql->f( "moveable" );
				$folder = $msql->f( "folder" );
				$url = "page/".$folder."/";
				$href = "../".$folder."/";
				echo " \r\n  <tr class=list>\r\n    <td  width=\"50\" align=\"center\">";
				echo $id;
				echo "</td>\r\n   \r\n      <td  width=\"130\" height=\"30\"> \r\n       ";
				echo $groupname;
				echo "      \r\n \r\n      </td>\r\n      <td width=\"100\"  >";
				echo $folder;
				echo " </td>\r\n      <td  ><a href='";
				echo $href;
				echo "' target='_blank'>";
				echo $url;
				echo "</a> </td>\r\n      <td width=\"50\"  ><img id='pr_";
				echo $folder;
				echo "' class='pdv_enter' src=\"images/edit.png\"  style=\"cursor:pointer\"  border=\"0\" /> </td>\r\n      <td width=\"50\"  >\r\n\t  ";
				if ( $moveable == "1" )
				{
								echo "\t  \t  <img src=\"images/delete.png\"  style=\"cursor:pointer\"   onclick=\"self.location='group.php?step=del&id=";
								echo $id;
								echo "'\" /> \r\n\t";
				}
				else
				{
								echo "---";
				}
				echo "\t  </td>\r\n    </tr>\r\n  ";
}
echo " \r\n</table>\r\n</div>\r\n";
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
echo "</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

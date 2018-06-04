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
$step = $_REQUEST['step'];
$groupid = $_REQUEST['groupid'];
$page = $_REQUEST['page'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/page.js\"></script>\r\n\r\n\r\n</head>\r\n<body>\r\n\r\n";
if ( $step == "del" )
{
				$id = $_REQUEST['id'];
				$msql->query( "select * from {P}_page where  id='{$id}'" );
				if ( $msql->next_record( ) )
				{
								$groupid = $msql->f( "groupid" );
								$pagefolder = $msql->f( "pagefolder" );
				}
				if ( $pagefolder != "" && 0 < strlen( $pagefolder ) )
				{
								$fsql->query( "select folder from {P}_page_group where id='{$groupid}'" );
								if ( $fsql->next_record( ) )
								{
												$folder = $fsql->f( "folder" );
								}
								@unlink( @"../".@$folder."/".@$pagefolder.".php" );
								$oldpagename = $folder."_".$pagefolder;
								$msql->query( "delete from {P}_base_pageset where coltype='page' and pagename='{$oldpagename}'" );
								$msql->query( "delete from {P}_base_plus where plustype='page' and pluslocat='{$oldpagename}'" );
								$msql->query( "delete from {P}_base_plusplan where plustype='page' and pluslocat='{$oldpagename}'" );
				}
				$msql->query( "delete from {P}_page where  id='{$id}'" );
}
$scl = " id!='0' ";
if ( $_REQUEST['groupid'] != "" )
{
				$scl .= " and groupid='".$_REQUEST['groupid']."' ";
}
$totalnums = tblcount( "_page", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "groupid" => $groupid ) );
$pages->set( 10, $totalnums );
$pagelimit = $pages->limit( );
echo "\r\n<div class=\"formzone\">\r\n<div class=\"tablecapzone\">\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tr>\r\n      <td width=\"200\"><form  name=\"selgroup\" method=\"get\" action=\"\" >\r\n         ";
echo "<s";
echo "elect name=\"pp\" onchange=\"self.location=this.options[this.selectedIndex].value\" >\r\n         \r\n          ";
$msql->query( "select * from {P}_page_group" );
while ( $msql->next_record( ) )
{
				$lgroupid = $msql->f( "id" );
				$groupname = $msql->f( "groupname" );
				if ( $groupid == $lgroupid )
				{
								echo "<option value='page.php?groupid=".$lgroupid."' selected>".$strGroupSel.$groupname."</option>";
				}
				else
				{
								echo "<option value='page.php?groupid=".$lgroupid."'>".$strGroupSel.$groupname."</option>";
				}
}
echo "        </select>\r\n    </form>\r\n\t</td>\r\n      <td><div class=\"addsub\" onClick=\"window.location='page_add.php?groupid=";
echo $groupid;
echo "'\" id=\"addsubbutton\">";
echo "<s";
echo "pan style=\"padding-left:52px;\">";
echo $strPageAdd;
echo "</span></div>\r\n</td>\r\n    </tr>\r\n  </table>\r\n  </div>\r\n<div class=\"tablezone\">\r\n <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" >\r\n  <tr> \r\n    <td class=\"innerbiaoti\" align=\"center\" height=\"28\" width=\"50\" >";
echo $strNumber;
echo "</td>\r\n    <td class=\"innerbiaoti\" width=\"39\" >";
echo $strXuhao;
echo "</td>\r\n    <td width=\"50\" class=\"innerbiaoti\" >";
echo $strPagePicSrc1;
echo "</td>\r\n    <td class=\"innerbiaoti\" width=\"70\" >";
echo $strGroupNow;
echo "</td>\r\n    <td width=\"120\" height=\"28\" class=\"innerbiaoti\" >";
echo $strPageTitle;
echo "</td>\r\n    <td class=\"innerbiaoti\" >";
echo "<s";
echo "pan class=\"biaoti\">";
echo $strPageFolder;
echo "</span></td>\r\n    <td class=\"innerbiaoti\" width=\"39\" >";
echo $strModify;
echo "</td>\r\n    <td width=\"39\" class=\"innerbiaoti\" >";
echo "<s";
echo "pan class=\"biaoti\">";
echo $strGroupEdit;
echo "</span></td>\r\n    <td class=\"innerbiaoti\" height=\"28\" width=\"39\" >";
echo $strDelete;
echo "</td>\r\n  </tr>\r\n  ";
$msql->query( "select * from {P}_page where {$scl} order by xuhao limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$title = $msql->f( "title" );
				$xuhao = $msql->f( "xuhao" );
				$groupid = $msql->f( "groupid" );
				$pagefolder = $msql->f( "pagefolder" );
				$src = $msql->f( "src" );
				$fsql->query( "select * from {P}_page_group where id='{$groupid}'" );
				if ( $fsql->next_record( ) )
				{
								$groupname = $fsql->f( "groupname" );
								$folder = $fsql->f( "folder" );
				}
				if ( $pagefolder != "" && 0 < strlen( $pagefolder ) )
				{
								$browseurl = $folder."/".$pagefolder.".php";
								$pvdpath = $folder."/".$pagefolder.".php";
				}
				else
				{
								$browseurl = $folder."/?".$id.".html";
								$pvdpath = $folder;
				}
				echo " \r\n  <tr class=\"list\"> \r\n    <td  align=\"center\" height=\"28\" width=\"50\" > ";
				echo $id;
				echo " </td>\r\n    <td width=\"39\" >";
				echo $xuhao;
				echo " </td>\r\n    <td width=\"50\" >\r\n\t";
				if ( $src == "" )
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
				echo $src;
				echo "\">\r\n\r\n\t</td>\r\n    <td width=\"70\" >";
				echo $groupname;
				echo " </td>\r\n    <td width=\"120\" >";
				echo $title;
				echo "</td>\r\n    <td ><a href=\"../";
				echo $browseurl;
				echo "\" target=\"_blank\">page/";
				echo $browseurl;
				echo "</a></td>\r\n    <td width=\"39\" ><img src=\"images/modi.png\" width=\"24\" height=\"24\"  style=\"cursor:pointer\" onclick=\"window.location='page_edit.php?id=";
				echo $id;
				echo "&groupid=";
				echo $groupid;
				echo "'\" /> </td>\r\n    <td width=\"39\"  ><img id='pr_";
				echo $pvdpath;
				echo "' class='pdv_enter' src=\"images/edit.png\"  style=\"cursor:pointer\"  border=\"0\" /></td>\r\n    <td height=\"28\" width=\"39\" > <img src=\"images/delete.png\"  style=\"cursor:pointer\" onClick=\"window.location='page.php?step=del&id=";
				echo $id;
				echo "&groupid=";
				echo $_REQUEST['groupid'];
				echo "&page=";
				echo $page;
				echo "'\"> \r\n    </td>\r\n  </tr>\r\n  ";
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

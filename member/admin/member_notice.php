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
include( "func/member.inc.php" );
needauth( 57 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n ";
echo "<S";
echo "CRIPT>\r\nfunction cm(nn){\r\nqus=confirm(\"";
echo $strDeleteConfirm;
echo "\")\r\nif(qus!=0){\r\nwindow.location='member_notice.php?step=del&id='+nn;\r\n}\r\n}\r\n</SCRIPT>\r\n</head>\r\n\r\n<body>\r\n";
$step = $_REQUEST['step'];
$title = $_REQUEST['title'];
$xuhao = $_REQUEST['xuhao'];
$ifnew = $_REQUEST['ifnew'];
$ifred = $_REQUEST['ifred'];
$id = $_REQUEST['id'];
$page = $_REQUEST['page'];
$pid = $_REQUEST['pid'];
$key = $_REQUEST['key'];
if ( $step == "mod" )
{
				$msql->query( "update {P}_member_notice set xuhao='{$xuhao}',ifnew='{$ifnew}',ifred='{$ifred}' where id='{$id}'  " );
}
if ( $step == "del" )
{
				$msql->query( "delete from {P}_member_notice where id='{$id}' " );
}
echo " \r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strMemberNCManage;
echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n  ";
$scl = " id!='' ";
$totalnums = tblcount( "_member_notice", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "key" => $key ) );
$pages->set( 10, $totalnums );
$pagelimit = $pages->limit( );
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\">\r\n  <tr> \r\n    <td width=\"60\" height=\"28\"  class=\"innerbiaoti\">";
echo $strXuhao;
echo "</td>\r\n    <td height=\"28\" class=\"innerbiaoti\" width=\"120\">";
echo $strMemberNCTo;
echo "</td>\r\n    <td height=\"28\" class=\"innerbiaoti\">";
echo $strMemberNCTitle;
echo "</td>\r\n    <td height=\"28\" width=\"50\"  class=\"innerbiaoti\">";
echo $strMemberNCBrowse;
echo "</td>\r\n    <td height=\"28\" width=\"50\"  class=\"innerbiaoti\">";
echo $strMemberNCNew;
echo "</td>\r\n    <td height=\"28\" width=\"50\"  class=\"innerbiaoti\">";
echo $strMemberNCRed;
echo "</td>\r\n    <td height=\"28\" width=\"32\"  class=\"innerbiaoti\">";
echo $strModify;
echo "</td>\r\n    <td height=\"28\" width=\"32\"  class=\"innerbiaoti\"> \r\n      <div align=\"center\">";
echo $strEdit;
echo "</div>\r\n    </td>\r\n    <td height=\"28\" width=\"32\"  class=\"innerbiaoti\"> \r\n      <div align=\"center\">";
echo $strDelete;
echo "</div>\r\n    </td>\r\n  </tr>\r\n  ";
$msql->query( "select * from {P}_member_notice where {$scl} order by id desc  limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$membertypeid = $msql->f( "membertypeid" );
				$title = $msql->f( "title" );
				$xuhao = $msql->f( "xuhao" );
				$cl = $msql->f( "cl" );
				$ifnew = $msql->f( "ifnew" );
				$ifred = $msql->f( "ifred" );
				echo " \r\n  <form action=\"member_notice.php\" method=\"get\">\r\n    <tr class=\"list\"> \r\n      <td width=\"60\"  > \r\n        <input type=\"text\" name=\"xuhao\" size=\"3\" value=\"";
				echo $xuhao;
				echo "\" class=input>\r\n      </td>\r\n      <td  width=\"120\">";
				echo membertypeid2membertype( $membertypeid );
				echo "</td>\r\n      <td > \r\n       ";
				echo $title;
				echo "        <input type=\"hidden\" name=\"id\" value=\"";
				echo $id;
				echo "\">\r\n        <input type=\"hidden\" name=\"page\" value=\"";
				echo $page;
				echo "\">\r\n        <input type=\"hidden\" name=\"pid\" value=\"";
				echo $pid;
				echo "\">\r\n        <input type=\"hidden\" name=\"key\" value=\"";
				echo $key;
				echo "\">\r\n        </td>\r\n      <td width=\"50\" >";
				echo $cl;
				echo "</td>\r\n      <td width=\"50\" > \r\n        ";
				echo "<s";
				echo "elect name=\"ifnew\">\r\n          <option value=\"1\" ";
				echo seld( $ifnew, "1" );
				echo ">";
				echo $strYes;
				echo "</option>\r\n          <option value=\"0\" ";
				echo seld( $ifnew, "0" );
				echo ">";
				echo $strNo;
				echo "</option>\r\n        </select>\r\n      </td>\r\n      <td width=\"50\" > \r\n        ";
				echo "<s";
				echo "elect name=\"ifred\">\r\n          <option value=\"1\" ";
				echo seld( $ifred, "1" );
				echo ">";
				echo $strYes;
				echo "</option>\r\n          <option value=\"0\" ";
				echo seld( $ifred, "0" );
				echo ">";
				echo $strNo;
				echo "</option>\r\n        </select>\r\n      </td>\r\n      <td width=\"32\" >  \r\n        <input type=\"hidden\" name=\"step\" value=\"mod\">\r\n         \r\n        <input type=\"image\" border=\"0\" name=\"imageField\" src=\"images/modi.png\">\r\n      </td>\r\n      <td width=\"32\" > \r\n        <div align=\"center\"> <img src=\"images/edit.png\" style=\"cursor:pointer\"  onClick=\"window.location='member_notice_mod.php?id=";
				echo $id;
				echo "'\"> \r\n        </div>\r\n      </td>\r\n      <td width=\"32\"  align=\"center\"> <img src=\"images/delete.png\"  style=\"cursor:pointer\"  onClick=\"cm('";
				echo "{$id}";
				echo "')\"> \r\n      </td>\r\n    </tr>\r\n  </form>\r\n  ";
}
echo " \r\n</table>\r\n</div>\r\n</div>\r\n\r\n";
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
echo "</div>\r\n</div>\r\n\r\n\r\n</body>\r\n</html>\r\n";
?>

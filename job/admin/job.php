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
needauth( 222 );
$step = $_REQUEST['step'];
$page = $_REQUEST['page'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n<body>\r\n\r\n";
if ( $step == "del" )
{
				trylimit( "_job", 5, "id" );
				$id = $_REQUEST['id'];
				$msql->query( "delete from {P}_job where  id='{$id}'" );
}
$scl = " id!='0' ";
$totalnums = tblcount( "_job", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "key" => $key ) );
$pages->set( 10, $totalnums );
$pagelimit = $pages->limit( );
echo "\r\n<div class=\"formzone\">\r\n\r\n<div class=\"tablezone\">\r\n <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" >\r\n  <tr> \r\n    <td class=\"innerbiaoti\" height=\"28\" width=\"50\" >";
echo $strNumber;
echo "</td>\r\n    <td class=\"innerbiaoti\" >";
echo $strJobF1;
echo "</td>\r\n    <td width=\"75\" class=\"innerbiaoti\" >";
echo $strJobF2;
echo "</td>\r\n    <td width=\"75\" class=\"innerbiaoti\" >";
echo $strJobF7;
echo "</td>\r\n    <td width=\"75\" class=\"innerbiaoti\" >";
echo $strJobF13;
echo "</td>\r\n    <td width=\"95\" class=\"innerbiaoti\" >";
echo $strUptime;
echo "</td>\r\n    <td class=\"innerbiaoti\" width=\"39\" >";
echo $strLook;
echo "</td>\r\n    <td class=\"innerbiaoti\" width=\"39\" >";
echo $strModify;
echo "</td>\r\n   \r\n    <td class=\"innerbiaoti\" height=\"28\" width=\"39\" >";
echo $strDelete;
echo "</td>\r\n  </tr>\r\n  ";
$msql->query( "select * from {P}_job where {$scl} order by dtime desc limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$jobname = $msql->f( "jobname" );
				$jobtype = $msql->f( "jobtype" );
				$experience = $msql->f( "experience" );
				$education = $msql->f( "education" );
				$langneed = $msql->f( "langneed" );
				$langlevel = $msql->f( "langlevel" );
				$pnums = $msql->f( "pnums" );
				$jobaddr = $msql->f( "jobaddr" );
				$jobintro = $msql->f( "jobintro" );
				$jobstat = $msql->f( "jobstat" );
				$contact = $msql->f( "contact" );
				$tel = $msql->f( "tel" );
				$email = $msql->f( "email" );
				$dtime = $msql->f( "dtime" );
				$uptime = $msql->f( "uptime" );
				$iffb = $msql->f( "iffb" );
				$uptime = date( "Y/n/j", $uptime );
				if ( $jobstat == "1" )
				{
								$showjobstat = $strJobF13_1;
				}
				else
				{
								$showjobstat = $strJobF13_2;
				}
				echo " \r\n  <tr class=\"list\"> \r\n    <td height=\"28\" width=\"50\" > ";
				echo $id;
				echo " </td>\r\n    <td >";
				echo $jobname;
				echo " </td>\r\n    <td width=\"75\" >";
				echo $jobtype;
				echo "</td>\r\n    <td width=\"75\" >";
				echo $pnums;
				echo "</td>\r\n    <td width=\"75\" >";
				echo $showjobstat;
				echo "</td>\r\n    <td width=\"95\" >";
				echo $uptime;
				echo "</td>\r\n    <td width=\"39\" ><img src=\"images/look.png\" width=\"24\" height=\"24\"  style=\"cursor:pointer\" onclick=\"window.open('../html/?";
				echo $id;
				echo ".html','_blank')\" /> </td>\r\n    <td width=\"39\" ><img src=\"images/edit.png\" width=\"24\" height=\"24\"  style=\"cursor:pointer\" onclick=\"window.location='jobmodify.php?id=";
				echo $id;
				echo "'\" /> </td>\r\n    <td height=\"28\" width=\"39\" > <img src=\"images/delete.png\"  style=\"cursor:pointer\" onClick=\"window.location='job.php?step=del&id=";
				echo $id;
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

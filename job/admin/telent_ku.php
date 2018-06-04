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
needauth( 224 );
$step = $_REQUEST['step'];
$page = $_REQUEST['page'];
$key = $_REQUEST['key'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript>\r\n\r\nfunction SelAll(theForm){\r\n\t\tfor ( i = 0 ; i < theForm.elements.length ; i ++ )\r\n\t\t{\r\n\t\t\tif ( theForm.elements[i].type == \"checkbox\" && theForm.elements[i].name != \"SELALL\" )\r\n\t\t\t{\r\n\t\t\t\ttheForm.elements[i].checked = ! theForm.elements[i].checked ;\r\n\t\t\t}\r\n\t\t}\r\n}\r\n</script>\r\n</head>\r\n\r\n<body>\r\n";
if ( $step == "delall" )
{
				trylimit( "_job_telent", 20, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "delete from {P}_job_telent where id='{$ids}'" );
				}
}
if ( $step == "delku" )
{
				trylimit( "_job_telent", 20, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_job_telent set fav='0' where id='{$ids}'" );
				}
}
if ( 2 < $page )
{
				trylimit( "_job_telent", 20, "id" );
}
echo "<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">\r\n  <tr> \r\n   \r\n                  \r\n      <td  height=\"30\"><form method=\"get\" action=\"telent_ku.php\" >\r\n        ";
echo "<s";
echo "elect name=\"shownum\">\r\n          <option value=\"10\"  ";
echo seld( $shownum, "10" );
echo ">";
echo $strSelNum10;
echo "</option>\r\n          <option value=\"20\" ";
echo seld( $shownum, "20" );
echo ">";
echo $strSelNum20;
echo "</option>\r\n          <option value=\"30\" ";
echo seld( $shownum, "30" );
echo ">";
echo $strSelNum30;
echo "</option>\r\n          <option value=\"50\" ";
echo seld( $shownum, "50" );
echo ">";
echo $strSelNum50;
echo "</option>\r\n        </select>\r\n        <input name=\"key\" type=\"text\" id=\"key\" class=\"input\" />\r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=\"button\" />       \r\n      </form>           \r\n      </td>\r\n\r\n             \r\n    \r\n  </tr>\r\n</table>\r\n</div>\r\n\r\n";
if ( !isset( $shownum ) || $shownum < 10 )
{
				$shownum = 10;
}
$scl = " fav='1' ";
if ( $key != "" )
{
				$scl .= " and (jobname regexp '{$key}' or title regexp '{$key}')";
}
$totalnums = tblcount( "_job_telent", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "shownum" => $shownum, "key" => $key ) );
$pages->set( $shownum, $totalnums );
$pagelimit = $pages->limit( );
echo " \r\n\r\n<form name=\"delfm\" action=\"telent_ku.php\" method=\"post\">\r\n<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" align=\"center\">\r\n    <tr>\r\n      <td width=\"36\" align=\"center\"  class=\"biaoti\" >";
echo $strSel;
echo "</td> \r\n      <td width=\"60\" height=\"26\" class=\"biaoti\">";
echo $strNumber;
echo "</td>\r\n      <td class=\"biaoti\">";
echo $strJobF1;
echo "</td>\r\n      <td width=\"150\" class=\"biaoti\">";
echo $strJobF15;
echo "</td>\r\n      <td class=\"biaoti\" width=\"150\">";
echo $strFormTime;
echo "</td>\r\n      <td width=\"39\" height=\"26\" class=\"biaoti\">";
echo $strLook;
echo "</td>\r\n      </tr>\r\n    ";
$fsql->query( "select * from {P}_job_telent where {$scl} order by id desc limit {$pagelimit}" );
while ( $fsql->next_record( ) )
{
				$id = $fsql->f( "id" );
				$jobid = $fsql->f( "jobid" );
				$jobname = $fsql->f( "jobname" );
				$title = $fsql->f( "title" );
				$name = $fsql->f( "name" );
				$email = $fsql->f( "email" );
				$time = $fsql->f( "time" );
				$uptime = $fsql->f( "uptime" );
				$stat = $fsql->f( "stat" );
				$memberid = $fsql->f( "memberid" );
				echo " \r\n    <tr class=\"list\">\r\n      <td width=\"36\" align=\"center\"><input type=\"checkbox\" name=\"dall[]\" value=\"";
				echo $id;
				echo "\" />\r\n      </td> \r\n      <td  width=\"60\">";
				echo $id;
				echo " </td>\r\n      <td>";
				echo $jobname;
				echo "</td>\r\n      <td width=\"150\" >";
				echo $title;
				echo "</td>\r\n      <td  width=\"150\" >";
				echo date( "y/m/d H:i", $time );
				echo "</td>\r\n      <td  width=\"39\"><a href=\"look.php?id=";
				echo $id;
				echo "\"><img src=\"images/look.png\"  border=\"0\"></a></td>\r\n      </tr>\r\n    ";
}
echo " \r\n  \r\n</table>\r\n</div>\r\n\r\n<div class=\"piliang\"> \r\n        <input type=\"checkbox\" name=\"SELALL\" value=\"1\" onClick=\"SelAll(this.form)\">\r\n        ";
echo $strSelAll;
echo "&nbsp; \r\n        <input name=\"step\" type=\"radio\" value=\"delall\" checked=\"checked\">\r\n        ";
echo $strDelete;
echo "        &nbsp;\r\n        <input name=\"step\" type=\"radio\" value=\"delku\" />\r\n        ";
echo $strJobDelKu;
echo " &nbsp; <a style=\"cursor:pointer;font-weight:bold\" onClick=\"delfm.submit()\">\r\n\t\t[";
echo $strSubmit;
echo "]</a> \r\n        <input type=\"hidden\" name=\"page\" size=\"3\" value=\"";
echo $page;
echo "\" />\r\n        <input type=\"hidden\" name=\"shownum\" value=\"";
echo $shownum;
echo "\" />\r\n       \r\n  </div>\r\n\t  </form>\r\n";
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

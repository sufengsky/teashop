<?php

define( "ROOTPATH", "../../" );
include( ROOTPATH."includes/admin.inc.php" );
include( ROOTPATH."includes/pages.inc.php" );
include( "language/".$sLan.".php" );
needauth( 132 );
$page = $_REQUEST['page'];
$step = $_REQUEST['step'];
$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$xuhao = $_REQUEST['xuhao'];
$tj = $_REQUEST['tj'];
$iffb = $_REQUEST['iffb'];
$key = $_REQUEST['key'];
$secure = $_REQUEST['secure'];
$showtj = $_REQUEST['showtj'];
$showfb = $_REQUEST['showfb'];
$showpid = $_REQUEST['showpid'];
$shownum = $_REQUEST['shownum'];
$sc = $_REQUEST['sc'];
$ord = $_REQUEST['ord'];
$showcatid = $_REQUEST['showcatid'];
$tp = $_REQUEST['tp'];
if ( !isset( $shownum ) || $shownum < 10 )
{
				$shownum = 10;
}
if ( !isset( $showpid ) )
{
				$showpid = "0";
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n ";
echo "<S";
echo "CRIPT>\r\n\r\n\r\nfunction Dpop(url,w,h){\r\n\tres = showModalDialog(url, null, 'dialogWidth: '+w+'px; dialogHeight: '+h+'px; center: yes; resizable: no; scroll: no; status: no;');\r\n \tif(res==\"ok\"){window.location.reload();}\r\n \r\n}\r\nfunction ordsc(nn,sc){\r\nif(nn!='";
echo "{$ord}";
echo "'){\r\n\twindow.location='bbs.php?page=";
echo $page;
echo "&sc=";
echo $sc;
echo "&showpid=";
echo $showpid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n}else{\r\n\tif(sc=='asc' || sc==''){\r\n\twindow.location='bbs.php?page=";
echo "{$page}";
echo "&sc=desc&showpid=";
echo $showpid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n\t}else{\r\n\twindow.location='bbs.php?page=";
echo "{$page}";
echo "&sc=asc&showpid=";
echo $showpid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n\t}\r\n\r\n}\r\n\r\n\r\n}\r\n\r\nfunction SelAll(theForm){\r\n\t\tfor ( i = 0 ; i < theForm.elements.length ; i ++ )\r\n\t\t{\r\n\t\t\tif ( theForm.elements[i].type == \"checkbox\" && theForm.elements[i].name != \"SELALL\" )\r\n\t\t\t{\r\n\t\t\t\ttheForm.elements[i].checked = ! theForm.elements[i].checked ;\r\n\t\t\t}\r\n\t\t}\r\n}\r\n\r\n</SCRIPT>\r\n</head>\r\n\r\n<body>\r\n";
if ( $step == "fball" )
{
				trylimit( "_comment", 300, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_comment set iffb='1' where id='{$ids}'" );
				}
}
if ( $step == "notfball" )
{
				trylimit( "_comment", 300, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_comment set iffb='0' where id='{$ids}'" );
				}
}
if ( $step == "tjall" )
{
				trylimit( "_comment", 300, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_comment set tuijian='1' where id='{$ids}'" );
				}
}
if ( $step == "nottjall" )
{
				trylimit( "_comment", 300, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_comment set tuijian='0' where id='{$ids}'" );
				}
}
if ( $step == "delall" )
{
				trylimit( "_comment", 500, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "select * from {P}_comment where id='{$ids}'" );
								if ( $msql->next_record( ) )
								{
												$picsrc = $msql->f( "picsrc" );
												if ( file_exists( ROOTPATH.$picsrc ) && 10 < strlen( $picsrc ) && !strstr( $picsrc, "../" ) )
												{
																unlink( ROOTPATH.$picsrc );
												}
								}
								$msql->query( "delete from {P}_comment where id='{$ids}'" );
								if ( $ids != "0" )
								{
												$msql->query( "select * from {P}_comment where pid='{$ids}'" );
												while ( $msql->next_record( ) )
												{
																$picsrc = $msql->f( "picsrc" );
																if ( file_exists( ROOTPATH.$picsrc ) && 10 < strlen( $picsrc ) && !strstr( $picsrc, "../" ) )
																{
																				unlink( ROOTPATH.$picsrc );
																}
												}
												$msql->query( "delete from {P}_comment where pid='{$ids}'" );
								}
				}
}
echo "\r\n\r\n";
if ( !isset( $ord ) || $ord == "" )
{
				$ord = "uptime";
}
if ( !isset( $sc ) || $sc == "" )
{
				$sc = "desc";
}
if ( $tp == "search" )
{
				trylimit( "_comment", 500, "id" );
}
$scl = "  id!='0' ";
if ( $key != "" )
{
				$scl .= " and (title regexp '{$key}' or body regexp '{$key}') ";
}
if ( $showtj != "" && $showtj != "all" )
{
				$scl .= " and tuijian='{$showtj}' ";
}
if ( $showcatid != "" && $showcatid != "all" )
{
				$scl .= " and catid='{$showcatid}' ";
}
if ( $showfb != "" && $showfb != "all" )
{
				$scl .= " and iffb='{$showfb}' ";
}
if ( $showpid != "" && $showpid != "all" )
{
				if ( $showpid == "0" )
				{
								$scl .= " and pid='0' ";
				}
				else
				{
								$scl .= " and pid!='0' ";
				}
}
$totalnums = tblcount( "_comment", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "shownum" => $shownum, "showpid" => $showpid, "showcatid" => $showcatid, "sc" => $sc, "ord" => $ord, "showtj" => $showtj, "showfb" => $showfb, "key" => $key ) );
$pages->set( $shownum, $totalnums );
$pagelimit = $pages->limit( );
echo " \r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" align=\"center\" height=\"28\">\r\n  <tr> \r\n    <form method=\"get\" action=\"bbs.php\" >\r\n                  \r\n      <td class=title height=\"30\"> \r\n        ";
echo "<s";
echo "elect name=\"showcatid\">\r\n          <option value='all'>";
echo $strSelCat;
echo "</option>\r\n          ";
$fsql->query( "select * from {P}_comment_cat order by xuhao" );
while ( $fsql->next_record( ) )
{
				$lcatid = $fsql->f( "catid" );
				$cat = $fsql->f( "cat" );
				if ( $showcatid == $lcatid )
				{
								echo "<option value='".$lcatid."' selected>".$cat."</option>";
				}
				else
				{
								echo "<option value='".$lcatid."'>".$cat."</option>";
				}
}
echo "        </select>\r\n        ";
echo "<s";
echo "elect name=\"showtj\">\r\n          <option value=\"all\" >";
echo $strSelTj;
echo "</option>\r\n          <option value=\"1\"  ";
echo seld( $showtj, "1" );
echo ">";
echo $strSelTjYes;
echo "</option>\r\n          <option value=\"0\" ";
echo seld( $showtj, "0" );
echo ">";
echo $strSelTjNo;
echo "</option>\r\n        </select>\r\n";
echo "<s";
echo "elect name=\"showfb\">\r\n          <option value=\"all\" >";
echo $strSelFb;
echo "</option>\r\n          <option value=\"1\"  ";
echo seld( $showfb, "1" );
echo ">";
echo $strSelFbYes;
echo "</option>\r\n          <option value=\"0\" ";
echo seld( $showfb, "0" );
echo ">";
echo $strSelFbNo;
echo "</option>\r\n        </select>\r\n";
echo "<s";
echo "elect name=\"shownum\">\r\n\r\n          <option value=\"10\"  ";
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
echo "</option>\r\n        </select>\r\n";
echo "<s";
echo "elect name=\"showpid\">\r\n  <option value=\"all\" >";
echo $strCommentShowAll;
echo "</option>\r\n  <option value=\"0\"  ";
echo seld( $showpid, "0" );
echo ">";
echo $strCommentShowMain;
echo "</option>\r\n  <option value=\"1\" ";
echo seld( $showpid, "1" );
echo ">";
echo $strCommentShowBack;
echo "</option>\r\n</select>\r\n<input type=\"text\" name=\"key\" size=\"23\" class=input value=\"";
echo $key;
echo "\" />\r\n          \r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=button>\r\n        ";
echo "<s";
echo "pan class=\"piliang\">\r\n        <input name=\"tp\" type=\"hidden\" id=\"tp\" value=\"search\" />\r\n        </span>        </td>\r\n      </form>\r\n             \r\n    <td class=title colspan=\"2\" align=\"right\">&nbsp; </td>\r\n  </tr>\r\n</table>\r\n\r\n</div>\r\n<form name=\"delfm\" method=\"post\" action=\"bbs.php\">\r\n<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n  <tr class=list> \r\n";
echo "    <td width=\"30\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('id','";
echo $sc;
echo "')\">";
echo $strSel;
echo "</td>\r\n    <td width=\"50\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('id','";
echo $sc;
echo "')\">";
echo $strBianhao;
ordsc( $ord, "id", $sc );
echo "</td>\r\n    <td height=\"28\" width=\"60\"  class=\"biaoti\"  >";
echo $strCommentType;
echo "</td>\r\n    <td height=\"28\" class=\"biaoti\" style=\"cursor:pointer\" onClick=\"ordsc('title','";
echo $sc;
echo "')\">";
echo $strTitle;
ordsc( $ord, "title", $sc );
echo "</td>\r\n    <td height=\"28\" width=\"139\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('uptime','";
echo $sc;
echo "')\">";
echo $strUptime;
ordsc( $ord, "uptime", $sc );
echo "</td>\r\n    <td height=\"28\" width=\"50\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('cl','";
echo $sc;
echo "')\">";
echo $strClick;
ordsc( $ord, "cl", $sc );
echo "</td>\r\n    <td height=\"28\" width=\"50\"  class=\"biaoti\"  >";
echo $strCommentType2;
echo "</td>\r\n    <td height=\"28\" width=\"39\"  class=\"biaoti\">";
echo $strFabu;
echo "</td>\r\n    <td height=\"28\" width=\"39\"  class=\"biaoti\">";
echo $strTuiJian;
echo " \r\n    </td>\r\n    <td height=\"28\" width=\"39\"  class=\"biaoti\"> \r\n      ";
echo $strLook;
echo "    </td>\r\n  </tr>\r\n  \r\n    ";
$msql->query( "select * from {P}_comment where {$scl}  order by {$ord} {$sc}  limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$pid = $msql->f( "pid" );
				$title = $msql->f( "title" );
				$body = $msql->f( "body" );
				$xuhao = $msql->f( "xuhao" );
				$cl = $msql->f( "cl" );
				$tj = $msql->f( "tuijian" );
				$iffb = $msql->f( "iffb" );
				$uptime = $msql->f( "uptime" );
				$uptime = date( "Y-m-d H:i", $uptime );
				if ( $pid == 0 )
				{
								$look = "../html/?".$id.".html";
								$type = $strCommentType1;
				}
				else
				{
								$look = "../html/?".$pid.".html";
								$type = $strCommentType2;
				}
				$fsql->query( "select count(id) from {P}_comment where pid='{$id}'" );
				if ( $fsql->next_record( ) )
				{
								$count = $fsql->f( "count(id)" );
				}
				echo " \r\n    <tr class=list> \r\n      <td width=\"30\" height=\"26\"> \r\n        <input type=\"checkbox\" name=\"dall[]\" value=\"";
				echo $id;
				echo "\">\r\n      </td>\r\n      <td width=\"50\" height=\"26\"> ";
				echo $id;
				echo " </td>\r\n      <td width=\"60\">";
				echo $type;
				echo "</td>\r\n      <td>";
				echo $title;
				echo "      </td>\r\n      <td width=\"139\">";
				echo $uptime;
				echo "</td>\r\n      <td width=\"50\">";
				echo $cl;
				echo "</td>\r\n      <td width=\"50\">";
				echo $count;
				echo "</td>\r\n      <td width=\"39\"> ";
				showyn( $iffb );
				echo "</td>\r\n      <td width=\"39\"> ";
				showyn( $tj );
				echo " </td>\r\n      <td width=\"39\"> \r\n        <img src=\"images/look.png\" style=\"cursor:pointer\" onClick=\"window.open('";
				echo $look;
				echo "','_blank')\"> \r\n      </td>\r\n    </tr>\r\n    ";
}
echo " \r\n   \r\n</table>\r\n</div>\r\n\r\n<div class=\"piliang\"> \r\n<input type=\"checkbox\" name=\"SELALL\" value=\"1\" onClick=\"SelAll(this.form)\" />\r\n        ";
echo $strSelAll;
echo "&nbsp; \r\n        <input type=\"radio\" name=\"step\" value=\"delall\" />\r\n        ";
echo $strDelete;
echo " \r\n        <input type=\"radio\" name=\"step\" value=\"fball\" checked />\r\n        ";
echo $strFb;
echo " \r\n        <input type=\"radio\" name=\"step\" value=\"notfball\" />\r\n        ";
echo $strNotFb;
echo " \r\n        <input type=\"radio\" name=\"step\" value=\"tjall\" />\r\n        ";
echo $strTj;
echo " \r\n        <input type=\"radio\" name=\"step\" value=\"nottjall\" />\r\n        ";
echo $strNotTj;
echo " &nbsp;&nbsp;<a style=\"cursor:pointer;font-weight:bold\" onClick=\"delfm.submit()\">[ \r\n        ";
echo $strSubmit;
echo " ]</a> \r\n        <input type=\"hidden\" name=\"page\" size=\"3\" value=\"";
echo $page;
echo "\" />\r\n        <input type=\"hidden\" name=\"ord\" size=\"3\" value=\"";
echo $ord;
echo "\" />\r\n        <input type=\"hidden\" name=\"sc\" size=\"3\" value=\"";
echo $sc;
echo "\" />\r\n        <input type=\"hidden\" name=\"key\" size=\"3\" value=\"";
echo $key;
echo "\" />\r\n        <input type=\"hidden\" name=\"showtj\" value=\"";
echo $showtj;
echo "\" />\r\n        <input type=\"hidden\" name=\"showfb\" value=\"";
echo $showfb;
echo "\" />\r\n        <input type=\"hidden\" name=\"shownum\" value=\"";
echo $shownum;
echo "\" />\r\n        <input type=\"hidden\" name=\"showpid\" value=\"";
echo $showpid;
echo "\" />\r\n</div>\r\n</form>\r\n\r\n\r\n";
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
echo "</div>\r\n</div>\r\n<br />\r\n</body>\r\n</html>\r\n";
?>

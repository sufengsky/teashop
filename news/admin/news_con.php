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
needauth( 122 );
$pid = $_REQUEST['pid'];
$page = $_REQUEST['page'];
$step = $_REQUEST['step'];
$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$xuhao = $_REQUEST['xuhao'];
$tj = $_REQUEST['tj'];
$iffb = $_REQUEST['iffb'];
$ifbold = $_REQUEST['ifbold'];
$ifred = $_REQUEST['ifred'];
$key = $_REQUEST['key'];
$secure = $_REQUEST['secure'];
$showtj = $_REQUEST['showtj'];
$showfb = $_REQUEST['showfb'];
$shownum = $_REQUEST['shownum'];
$sc = $_REQUEST['sc'];
$ord = $_REQUEST['ord'];
$bg = $_REQUEST['bg'];
if ( !isset( $pid ) || $pid == "" )
{
				$pid = "all";
}
if ( !isset( $shownum ) || $shownum < 10 )
{
				$shownum = 10;
}
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
echo "cript type=\"text/javascript\" src=\"js/news.js\"></script>\r\n\r\n ";
echo "<S";
echo "CRIPT>\r\n\r\n\r\nfunction Dpop(url,w,h){\r\n\tres = showModalDialog(url, null, 'dialogWidth: '+w+'px; dialogHeight: '+h+'px; center: yes; resizable: no; scroll: no; status: no;');\r\n \tif(res==\"ok\"){window.location.reload();}\r\n \r\n}\r\nfunction ordsc(nn,sc){\r\nif(nn!='";
echo "{$ord}";
echo "'){\r\n\twindow.location='news_con.php?page=";
echo $page;
echo "&sc=";
echo $sc;
echo "&pid=";
echo $pid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n}else{\r\n\tif(sc=='asc' || sc==''){\r\n\twindow.location='news_con.php?page=";
echo "{$page}";
echo "&sc=desc&pid=";
echo $pid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n\t}else{\r\n\twindow.location='news_con.php?page=";
echo "{$page}";
echo "&sc=asc&pid=";
echo $pid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n\t}\r\n\r\n}\r\n\r\n\r\n}\r\n\r\nfunction SelAll(theForm){\r\n\t\tfor ( i = 0 ; i < theForm.elements.length ; i ++ )\r\n\t\t{\r\n\t\t\tif ( theForm.elements[i].type == \"checkbox\" && theForm.elements[i].name != \"SELALL\" )\r\n\t\t\t{\r\n\t\t\t\ttheForm.elements[i].checked = ! theForm.elements[i].checked ;\r\n\t\t\t}\r\n\t\t}\r\n}\r\n\r\n\r\n\r\n</SCRIPT>\r\n</head>\r\n\r\n<body >\r\n";
if ( $step == "setfb" )
{
				trylimit( "_news_con", 200, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$iffb = $_POST['iffb'];
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_news_con set iffb='{$iffb}' where id='{$ids}'" );
				}
}
if ( $step == "settj" )
{
				trylimit( "_news_con", 200, "id" );
				$dall = $_POST['dall'];
				$tj = $_POST['tj'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_news_con set tj='{$tj}' where id='{$ids}'" );
				}
}
if ( $step == "setsecure" )
{
				trylimit( "_news_con", 200, "id" );
				$dall = $_POST['dall'];
				$secure = $_POST['secure'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_news_con set secure='{$secure}' where id='{$ids}'" );
				}
}
if ( $step == "setbold" )
{
				trylimit( "_news_con", 200, "id" );
				$dall = $_POST['dall'];
				$bold = $_POST['bold'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_news_con set ifbold='{$bold}' where id='{$ids}'" );
				}
}
if ( $step == "setcolor" )
{
				trylimit( "_news_con", 200, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$nowcolor = $_POST['nowcolor'];
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_news_con set ifred='{$nowcolor}' where id='{$ids}'" );
				}
}
if ( $step == "delall" )
{
				trylimit( "_news_con", 200, "id" );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "select src from {P}_news_con where id='{$ids}'" );
								if ( $msql->next_record( ) )
								{
												$src = $msql->f( "src" );
												if ( file_exists( ROOTPATH.$src ) && $src != "" )
												{
																@unlink( @ROOTPATH.@$src );
												}
								}
								$msql->query( "select fileurl from {P}_news_con where id='{$ids}'" );
								if ( $msql->next_record( ) )
								{
												$src = $msql->f( "fileurl" );
												if ( file_exists( ROOTPATH.$src ) && $src != "" && !strstr( $src, "http://" ) )
												{
																@unlink( @ROOTPATH.@$src );
												}
								}
								$msql->query( "delete from {P}_news_pages where newsid='{$ids}'" );
								$msql->query( "delete from {P}_comment where catid='1' and rid='{$ids}'" );
								$msql->query( "delete from {P}_news_con where id='{$ids}'" );
				}
}
if ( $step == "refresh" )
{
				$newtime = time( );
				$msql->query( "update {P}_news_con set uptime='{$newtime}' where id='{$id}'" );
}
echo "\r\n";
if ( !isset( $ord ) || $ord == "" )
{
				$ord = "id";
}
if ( !isset( $sc ) || $sc == "" )
{
				$sc = "desc";
}
$scl = "  id!='0' ";
if ( $key != "" )
{
				$scl .= " and (title regexp '{$key}' or body regexp '{$key}') ";
}
if ( $showtj != "" && $showtj != "all" )
{
				$scl .= " and tj='{$showtj}' ";
}
if ( $showfb != "" && $showfb != "all" )
{
				$scl .= " and iffb='{$showfb}' ";
}
if ( $pid != "" && $pid != "all" )
{
				if ( $pid == "0" )
				{
								$scl .= " and catid='0' ";
				}
				else
				{
								$fmdpath = fmpath( $pid );
								$scl .= " and catpath regexp '{$fmdpath}' ";
				}
}
$totalnums = tblcount( "_news_con", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "shownum" => $shownum, "pid" => $pid, "sc" => $sc, "ord" => $ord, "showtj" => $showtj, "showfb" => $showfb, "key" => $key ) );
$pages->set( $shownum, $totalnums );
$pagelimit = $pages->limit( );
echo " \r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">\r\n  <tr> \r\n    <form method=\"get\" action=\"news_con.php\" >\r\n                  \r\n      <td  height=\"30\"> \r\n        ";
echo "<s";
echo "elect name=\"pid\">\r\n          <option value='all'>";
echo $strNewsSelCat;
echo "</option>\r\n\t\t    <option value='0' ";
echo seld( $pid, "0" );
echo ">";
echo $strNewsBlog;
echo "</option>\r\n          ";
$fsql->query( "select * from {P}_news_cat order by catpath" );
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
								$tsql->query( "select catid,cat from {P}_news_cat where catid='{$lcatpath[$i]}'" );
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
echo "        </select>\r\n        ";
echo "<s";
echo "elect name=\"showtj\">\r\n          <option value=\"all\" >";
echo $strNewsSelTj;
echo "</option>\r\n          <option value=\"1\"  ";
echo seld( $showtj, "1" );
echo ">";
echo $strNewsSelTjYes;
echo "</option>\r\n          <option value=\"0\" ";
echo seld( $showtj, "0" );
echo ">";
echo $strNewsSelTjNo;
echo "</option>\r\n        </select>\r\n";
echo "<s";
echo "elect name=\"showfb\">\r\n          <option value=\"all\" >";
echo $strNewsSelFb;
echo "</option>\r\n          <option value=\"1\"  ";
echo seld( $showfb, "1" );
echo ">";
echo $strNewsSelFbYes;
echo "</option>\r\n          <option value=\"0\" ";
echo seld( $showfb, "0" );
echo ">";
echo $strNewsSelFbNo;
echo "</option>\r\n        </select>\r\n";
echo "<s";
echo "elect name=\"shownum\">\r\n\r\n          <option value=\"10\"  ";
echo seld( $shownum, "10" );
echo ">";
echo $strNewsSelNum10;
echo "</option>\r\n          <option value=\"20\" ";
echo seld( $shownum, "20" );
echo ">";
echo $strNewsSelNum20;
echo "</option>\r\n          <option value=\"30\" ";
echo seld( $shownum, "30" );
echo ">";
echo $strNewsSelNum30;
echo "</option>\r\n          <option value=\"50\" ";
echo seld( $shownum, "50" );
echo ">";
echo $strNewsSelNum50;
echo "</option>\r\n        </select>\r\n<input type=\"text\" name=\"key\" size=\"16\" class=\"input\" value=\"";
echo $key;
echo "\" />       \r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=button>\r\n                    \r\n      </td>\r\n    </form>\r\n             \r\n    <td  colspan=\"2\" align=\"right\"> \r\n\t<form  method=\"get\" action=\"news_conadd.php\">\r\n      <input type=\"Submit\" name=\"Button\" value=\"";
echo $strNewsAddButton;
echo "\" class=\"button\" >\r\n\t  </form>\r\n    </td>\r\n  </tr>\r\n</table>\r\n</div>\r\n\r\n<form name=\"delfm\" method=\"post\" action=\"news_con.php\">\r\n<div class=\"listzone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" >\r\n  <tr class=\"list\"> \r\n    <td width=\"30\" align=\"center\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ord('id','";
echo $sc;
echo "')\">";
echo $strSel;
echo "</td>\r\n    <td width=\"39\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('id','";
echo $sc;
echo "')\">";
echo $strNewsList2;
ordsc( $ord, "id", $sc );
echo "</td>\r\n    <td  class=\"biaoti\" width=\"30\">";
echo $strNewsList3;
echo " \r\n    </td>\r\n    <td height=\"28\" class=\"biaoti\" style=\"cursor:pointer\" onClick=\"ordsc('title','";
echo $sc;
echo "')\">";
echo $strNewsList4;
ordsc( $ord, "title", $sc );
echo "</td>\r\n    <td width=\"75\"  class=\"biaoti\"  >";
echo $strNewsCatTitle;
echo "</td>\r\n    <td height=\"28\" width=\"80\"  class=\"biaoti\"  >";
echo $strNewsFBR;
echo "</td>\r\n    <td height=\"28\" width=\"75\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('dtime','";
echo $sc;
echo "')\">";
echo $strFbtime;
ordsc( $ord, "dtime", $sc );
echo "</td>\r\n    <td width=\"35\"  class=\"biaoti\">";
echo $strNewsCheck;
echo "</td>\r\n    <td width=\"35\" height=\"28\"  class=\"biaoti\">";
echo $strNewsList6;
echo " \r\n    </td>\r\n    <td width=\"35\" height=\"28\"  class=\"biaoti\">";
echo $strNewsList7;
echo "</td>\r\n    <td width=\"35\"  class=\"biaoti\"  >";
echo $strSecure;
echo "</td>\r\n    <td width=\"39\"  class=\"biaoti\"  style=\"cursor:pointer\" onclick=\"ordsc('xuhao','";
echo $sc;
echo "')\">";
echo $strXuhao;
ordsc( $ord, "xuhao", $sc );
echo "</td>\r\n    <td width=\"35\"  class=\"biaoti\">";
echo $strNewsList9;
echo "</td>\r\n    <td width=\"35\"  class=\"biaoti\">";
echo $strReflesh;
echo "</td>\r\n    </tr>\r\n\r\n    ";
$msql->query( "select * from {P}_news_con where {$scl}  order by {$ord} {$sc}  limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$catid = $msql->f( "catid" );
				$memberid = $msql->f( "memberid" );
				$title = $msql->f( "title" );
				$xuhao = $msql->f( "xuhao" );
				$cl = $msql->f( "cl" );
				$tj = $msql->f( "tj" );
				$ifbold = $msql->f( "ifbold" );
				$ifred = $msql->f( "ifred" );
				$iffb = $msql->f( "iffb" );
				$author = $msql->f( "author" );
				$src = $msql->f( "src" );
				$type = $msql->f( "type" );
				$secure = $msql->f( "secure" );
				$uptime = $msql->f( "uptime" );
				$dtime = $msql->f( "dtime" );
				$uptime = date( "y/m/d", $uptime );
				$dtime = date( "y/m/d", $dtime );
				if ( $ifred == "0" )
				{
								$tcolor = "#555";
				}
				else
				{
								$tcolor = $ifred;
				}
				if ( $ifbold == "0" )
				{
								$tbold = "nomal";
				}
				else
				{
								$tbold = "bold";
				}
				if ( $catid == "0" )
				{
								$cat = $strNewsBlog;
				}
				else
				{
								$fsql->query( "select cat from {P}_news_cat where catid='{$catid}'" );
								if ( $fsql->next_record( ) )
								{
												$cat = $fsql->f( "cat" );
								}
				}
				$browseurl = ROOTPATH."news/html/?".$id.".html";
				echo " \r\n    <tr class=\"list\"> \r\n      <td width=\"30\" align=\"center\" height=\"26\"> \r\n        <input type=\"checkbox\" name=\"dall[]\" value=\"";
				echo $id;
				echo "\" />\r\n      </td>\r\n      <td width=\"39\" height=\"26\"> ";
				echo $id;
				echo " </td>\r\n      <td width=\"30\">";
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
				echo "\">\r\n      \r\n      </td>\r\n      <td><a href=\"";
				echo $browseurl;
				echo "\" target=\"_blank\" style=\"color:";
				echo $tcolor;
				echo ";font-weight:";
				echo $tbold;
				echo "\">";
				echo $title;
				echo "</a></td>\r\n      <td width=\"75\" >";
				echo $cat;
				echo "</td>\r\n      <td width=\"80\" >";
				echo $author;
				echo "</td>\r\n      <td width=\"75\">";
				echo $dtime;
				echo "</td>\r\n      <td width=\"35\">";
				showyn( $iffb );
				echo "</td>\r\n      <td width=\"35\"> ";
				showyn( $tj );
				echo " </td>\r\n      <td width=\"35\"> ";
				showyn( $ifbold );
				echo " </td>\r\n      <td width=\"35\"> ";
				echo $secure;
				echo "</td>\r\n      <td width=\"39\">";
				echo $xuhao;
				echo " </td>\r\n      <td width=\"35\"><img src=\"images/edit.png\" style=\"cursor:pointer\"  onclick=\"window.location='news_conmod.php?id=";
				echo $id;
				echo "&pid=";
				echo $pid;
				echo "&page=";
				echo $page;
				echo "'\" /></td>\r\n      <td width=\"35\"><img src=\"images/update.png\"  style=\"cursor:pointer\" onclick=\"self.location='news_con.php?step=refresh&id=";
				echo $id;
				echo "'\" /> </td>\r\n      </tr>\r\n    ";
}
echo " \r\n   </table>\r\n  </div>\r\n      <div class=\"piliang\"> \r\n        <input type=\"checkbox\" name=\"SELALL\" value=\"1\" onClick=\"SelAll(this.form)\">\r\n        ";
echo $strSelAll;
echo "&nbsp; \r\n        <input type=\"radio\" name=\"step\" value=\"delall\">\r\n        ";
echo $strDelete;
echo " \r\n        <input type=\"radio\" name=\"step\" value=\"setfb\" checked>\r\n\t\t";
echo "<s";
echo "elect name=\"iffb\" id=\"iffb\">\r\n          <option value=\"1\">";
echo $strNewsFb;
echo "</option>\r\n           <option value=\"0\">";
echo $strNewsNotFb;
echo "</option>\r\n        </select>\r\n\t\t\r\n        <input type=\"radio\" name=\"step\" value=\"settj\">\r\n        ";
echo "<s";
echo "elect name=\"tj\" id=\"tj\">\r\n          <option value=\"1\">";
echo $strNewsTj;
echo "</option>\r\n           <option value=\"0\">";
echo $strNewsNotTj;
echo "</option>\r\n        </select>\r\n        <input type=\"radio\" name=\"step\" value=\"setsecure\">\r\n        ";
echo "<s";
echo "elect name=\"secure\" id=\"secure\">\r\n          <option value=\"0\">";
echo $strSecure1;
echo "</option>\r\n          <option value=\"1\">1</option>\r\n          <option value=\"2\">2</option>\r\n          <option value=\"3\">3</option>\r\n          <option value=\"4\">4</option>\r\n          <option value=\"5\">5</option>\r\n          <option value=\"6\">6</option>\r\n          <option value=\"7\">7</option>\r\n          <option value=\"8\">8</option>\r\n          <option value=\"9\">9</option>\r\n        </select>\r\n        \r\n        <input type=\"";
echo "radio\" name=\"step\" value=\"setbold\">\r\n        ";
echo "<s";
echo "elect name=\"bold\" id=\"bold\">\r\n          <option value=\"1\">";
echo $strNewsBold;
echo "</option>\r\n          <option value=\"0\">";
echo $strNewsNotBold;
echo "</option>\r\n        </select>\r\n       \r\n        <input type=\"radio\" name=\"step\" value=\"setcolor\">\r\n\t\t";
echo "<s";
echo "elect name=\"nowcolor\" id=\"nowcolor\">\r\n          <option value=\"0\">";
echo $strDefColor;
echo "</option>\r\n          <option value=\"#ff0000\" style=\"background:#ff0000\">&nbsp;</option>\r\n\t\t   <option value=\"#ff6600\" style=\"background:#ff6600\">&nbsp;</option>\r\n\t\t   <option value=\"#0080c0\" style=\"background:#0080c0\">&nbsp;</option>\r\n\t\t    <option value=\"#008000\" style=\"background:#008000\">&nbsp;</option>\r\n\t\t\t<option value=\"#ffcc00\" style=\"background:#ffcc00\">&nbsp;</option>\r\n\t\t\t<option value=\"#800080\" style";
echo "=\"background:#800080\">&nbsp;</option>\r\n\t\t\t<option value=\"#804040\" style=\"background:#804040\">&nbsp;</option>\r\n\t\t\t<option value=\"#ff00ff\" style=\"background:#ff00ff\">&nbsp;</option>\r\n\t\t\t<option value=\"#80ffff\" style=\"background:#80ffff\">&nbsp;</option>\r\n\t\t\t<option value=\"#000000\" style=\"background:#000000\">&nbsp;</option>\r\n\t\t</select>\r\n         \r\n\t\t<input class=\"button\" type=\"button\" value=\"";
echo $strSubmit;
echo "\" onClick=\"delfm.submit()\">\r\n        <input type=\"hidden\" name=\"page\" size=\"3\" value=\"";
echo $page;
echo "\" />\r\n        <input type=\"hidden\" name=\"ord\" size=\"3\" value=\"";
echo $ord;
echo "\" />\r\n        <input type=\"hidden\" name=\"sc\" size=\"3\" value=\"";
echo $sc;
echo "\" />\r\n        <input type=\"hidden\" name=\"key\" size=\"3\" value=\"";
echo $key;
echo "\" />\r\n       \r\n        <input type=\"hidden\" name=\"showtj\" value=\"";
echo $showtj;
echo "\" />\r\n        <input type=\"hidden\" name=\"showfb\" value=\"";
echo $showfb;
echo "\" />\r\n        <input type=\"hidden\" name=\"pid\" value=\"";
echo "{$pid}";
echo "\" />\r\n        <input type=\"hidden\" name=\"shownum\" value=\"";
echo $shownum;
echo "\" />\r\n       \r\n      </div>\r\n  \r\n\r\n\r\n  </form>\r\n";
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
echo "</div>\r\n</div>\r\n\r\n</body>\r\n</html>\r\n";
?>

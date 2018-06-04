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
needauth( 721 );
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
echo "cript type=\"text/javascript\" src=\"js/hz.js\"></script>\r\n\r\n";
echo "<S";
echo "CRIPT>\r\n\r\nfunction ordsc(nn,sc){\r\nif(nn!='";
echo $ord;
echo "'){\r\n\twindow.location='hz_con.php?page=";
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
echo "&ord='+nn;\r\n}else{\r\n\tif(sc=='asc' || sc==''){\r\n\twindow.location='hz_con.php?page=";
echo $page;
echo "&sc=desc&pid=";
echo $pid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n\t}else{\r\n\twindow.location='hz_con.php?page=";
echo $page;
echo "&sc=asc&pid=";
echo $pid;
echo "&showtj=";
echo $showtj;
echo "&showfb=";
echo $showfb;
echo "&shownum=";
echo $shownum;
echo "&ord='+nn;\r\n\t}\r\n\r\n}\r\n\r\n}\r\n\r\n</SCRIPT>\r\n</head>\r\n\r\n<body >\r\n";
if ( $step == "setfb" )
{
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$iffb = $_POST['iffb'];
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_hz_con set iffb='{$iffb}' where id='{$ids}'" );
				}
}
if ( $step == "settj" )
{
				$dall = $_POST['dall'];
				$tj = $_POST['tj'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_hz_con set tj='{$tj}' where id='{$ids}'" );
				}
}
if ( $step == "setsecure" )
{
				$dall = $_POST['dall'];
				$secure = $_POST['secure'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_hz_con set secure='{$secure}' where id='{$ids}'" );
				}
}
if ( $step == "setbold" )
{
				$dall = $_POST['dall'];
				$bold = $_POST['bold'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_hz_con set ifbold='{$bold}' where id='{$ids}'" );
				}
}
if ( $step == "setcolor" )
{
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$nowcolor = $_POST['nowcolor'];
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_hz_con set ifred='{$nowcolor}' where id='{$ids}'" );
				}
}
if ( $step == "delall" )
{
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "select src from {P}_hz_con where id='{$ids}'" );
								if ( $msql->next_record( ) )
								{
												$src = $msql->f( "src" );
												if ( file_exists( ROOTPATH.$src ) && $src != "" )
												{
																unlink( ROOTPATH.$src );
												}
								}
								$msql->query( "select src from {P}_hz_pages where productid='{$ids}'" );
								while ( $msql->next_record( ) )
								{
												$src = $msql->f( "src" );
												if ( file_exists( ROOTPATH.$src ) && $src != "" )
												{
																unlink( ROOTPATH.$src );
												}
								}
								$msql->query( "delete from {P}_hz_pages where productid='{$ids}'" );
								$msql->query( "delete from {P}_hz_con where id='{$ids}'" );
				}
}
if ( $step == "refresh" )
{
				$newtime = time( );
				$msql->query( "update {P}_hz_con set uptime='{$newtime}' where id='{$id}'" );
}
echo "\r\n";
if ( !isset( $ord ) || $ord == "" )
{
				$ord = "uptime";
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
$totalnums = tblcount( "_hz_con", "id", $scl );
$pages = new pages( );
$pages->setvar( array( "shownum" => $shownum, "pid" => $pid, "sc" => $sc, "ord" => $ord, "showtj" => $showtj, "showfb" => $showfb, "key" => $key ) );
$pages->set( $shownum, $totalnums );
$pagelimit = $pages->limit( );
echo " \r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">\r\n  <tr> \r\n    <form method=\"get\" action=\"hz_con.php\" >\r\n                  \r\n      <td  height=\"30\"> \r\n        ";
echo "<s";
echo "elect name=\"pid\">\r\n          <option value='all'>";
echo $strHzSelCat;
echo "</option>\r\n          ";
$fsql->query( "select * from {P}_hz_cat order by catpath" );
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
								$tsql->query( "select catid,cat from {P}_hz_cat where catid='{$lcatpath[$i]}'" );
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
echo $strHzSelTj;
echo "</option>\r\n          <option value=\"1\"  ";
echo seld( $showtj, "1" );
echo ">";
echo $strHzSelTjYes;
echo "</option>\r\n          <option value=\"0\" ";
echo seld( $showtj, "0" );
echo ">";
echo $strHzSelTjNo;
echo "</option>\r\n        </select>\r\n\t\t";
echo "<s";
echo "elect name=\"showfb\">\r\n          <option value=\"all\" >";
echo $strHzSelFb;
echo "</option>\r\n          <option value=\"1\"  ";
echo seld( $showfb, "1" );
echo ">";
echo $strHzSelFbYes;
echo "</option>\r\n          <option value=\"0\" ";
echo seld( $showfb, "0" );
echo ">";
echo $strHzSelFbNo;
echo "</option>\r\n        </select>\r\n\t\t\r\n\t\t";
echo "<s";
echo "elect name=\"shownum\">\r\n\r\n          <option value=\"10\"  ";
echo seld( $shownum, "10" );
echo ">";
echo $strHzSelNum10;
echo "</option>\r\n          <option value=\"20\" ";
echo seld( $shownum, "20" );
echo ">";
echo $strHzSelNum20;
echo "</option>\r\n          <option value=\"30\" ";
echo seld( $shownum, "30" );
echo ">";
echo $strHzSelNum30;
echo "</option>\r\n          <option value=\"50\" ";
echo seld( $shownum, "50" );
echo ">";
echo $strHzSelNum50;
echo "</option>\r\n        </select>\r\n<input type=\"text\" name=\"key\" size=\"23\" class=\"input\" value=\"";
echo $key;
echo "\" />       \r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=button>\r\n                    \r\n      </td>\r\n    </form>\r\n             \r\n    <td  colspan=\"2\" align=\"right\"> \r\n\t<form  method=\"get\" action=\"hz_conadd.php\">\r\n      <input type=\"Submit\" name=\"Button\" value=\"";
echo $strHzFabu;
echo "\" class=\"button\" >\r\n\t  </form>\r\n    </td>\r\n  </tr>\r\n</table>\r\n</div>\r\n\r\n<form name=\"delfm\" method=\"post\" action=\"hz_con.php\">\r\n<div class=\"listzone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" >\r\n  <tr class=\"list\"> \r\n    <td width=\"30\" align=\"center\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ord('id','";
echo $sc;
echo "')\">";
echo $strSel;
echo "</td>\r\n    <td width=\"39\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('id','";
echo $sc;
echo "')\">";
echo $strNumber;
ordsc( $ord, "id", $sc );
echo "</td>\r\n    <td  class=\"biaoti\" width=\"30\">";
echo $strPic;
echo "    </td>\r\n    <td height=\"28\" class=\"biaoti\" style=\"cursor:pointer\" onClick=\"ordsc('title','";
echo $sc;
echo "')\">";
echo $strHzAddTitle;
ordsc( $ord, "title", $sc );
echo "</td>\r\n    <td width=\"75\"  class=\"biaoti\"  >";
echo $strHzCat;
echo "</td>\r\n    <td width=\"75\"  class=\"biaoti\"  >需要积分</td>\r\n    <td width=\"75\"  class=\"biaoti\"  >库存</td>\r\n    <td height=\"28\" width=\"75\"  class=\"biaoti\"  style=\"cursor:pointer\" onClick=\"ordsc('uptime','";
echo $sc;
echo "')\">";
echo $strUptime;
ordsc( $ord, "uptime", $sc );
echo "</td>\r\n    <td width=\"35\" height=\"28\"  class=\"biaoti\">";
echo $strIfFabu;
echo "</td>\r\n    <td width=\"35\" height=\"28\"  class=\"biaoti\" style=\"display:none;\">";
echo $strTuiJian;
echo "    </td>\r\n    <td width=\"35\"  class=\"biaoti\"><div align=\"center\">";
echo $strReflesh;
echo "</div></td>\r\n    <td width=\"35\" height=\"28\"  class=\"biaoti\"> \r\n      <div align=\"center\">";
echo $strModify;
echo "</div>    </td>\r\n    </tr>\r\n\r\n    ";
$msql->query( "select * from {P}_hz_con where {$scl}  order by {$ord} {$sc}  limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$catid = $msql->f( "catid" );
				$memberid = $msql->f( "memberid" );
				$title = $msql->f( "title" );
				$cent = $msql->f( "cent" );
				$kucun = $msql->f( "kucun" );
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
				$uptime = date( "y/m/d", $uptime );
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
								$cat = $strPersonPic;
				}
				else
				{
								$fsql->query( "select cat from {P}_hz_cat where catid='{$catid}'" );
								if ( $fsql->next_record( ) )
								{
												$cat = $fsql->f( "cat" );
								}
				}
				$browseurl = ROOTPATH."huanzeng/html/?".$id.".html";
				echo " \r\n    <tr class=\"list\"> \r\n      <td width=\"30\" align=\"center\" height=\"26\"> \r\n        <input type=\"checkbox\" name=\"dall[]\" value=\"";
				echo $id;
				echo "\" class=\"hzcheckbox\" />      </td>\r\n      <td width=\"39\" height=\"26\"> ";
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
				echo "\">      </td>\r\n      <td><a href=\"";
				echo $browseurl;
				echo "\" target=\"_blank\" style=\"color:";
				echo $tcolor;
				echo ";font-weight:";
				echo $tbold;
				echo "\">";
				echo $title;
				echo "</a></td>\r\n      <td width=\"75\" >";
				echo $cat;
				echo "</td>\r\n      <td width=\"75\" >";
				echo $cent;
				echo "</td>\r\n      <td width=\"75\" >";
				echo $kucun;
				echo "</td>\r\n      <td width=\"75\">";
				echo $uptime;
				echo "</td>\r\n      <td width=\"35\"> ";
				showyn( $iffb );
				echo "</td>\r\n      <td width=\"35\" style=\"display:none;\"> ";
				showyn( $tj );
				echo " </td>\r\n      <td width=\"35\"><img src=\"images/update.png\"  style=\"cursor:pointer\" onclick=\"self.location='hz_con.php?step=refresh&id=";
				echo $id;
				echo "'\" /> </td>\r\n      <td width=\"35\"> \r\n        <div align=\"center\"> <img src=\"images/edit.png\" style=\"cursor:pointer\" onClick=\"window.location='hz_conmod.php?id=";
				echo $id;
				echo "&pid=";
				echo $pid;
				echo "&page=";
				echo $page;
				echo "'\">        </div>      </td>\r\n      </tr>\r\n    ";
}
echo " \r\n   </table>\r\n  </div>\r\n      <div class=\"piliang\"> \r\n        <input type=\"checkbox\" name=\"SELALL\" value=\"1\" id=\"hzselall\" />\r\n        ";
echo $strSelAll;
echo "&nbsp; \r\n        <input type=\"radio\" name=\"step\" value=\"delall\">\r\n        ";
echo $strDelete;
echo " \r\n      <input type=\"radio\" name=\"step\" value=\"setfb\" checked>\r\n\t\t";
echo "<s";
echo "elect name=\"iffb\" id=\"iffb\">\r\n          <option value=\"1\">";
echo $strHzFb;
echo "</option>\r\n           <option value=\"0\">";
echo $strHzNotFb;
echo "</option>\r\n        </select>\r\n\t\t\r\n        <input type=\"radio\" name=\"step\" value=\"settj\" style=\"display:none;\" />\r\n        ";
echo "<s";
echo "elect name=\"tj\" id=\"tj\" style=\"display:none;\">\r\n          <option value=\"1\">";
echo $strHzTj;
echo "</option>\r\n           <option value=\"0\">";
echo $strHzNotTj;
echo "</option>\r\n        </select>\r\n        <input class=\"button\" type=\"button\" value=\"";
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
echo "</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

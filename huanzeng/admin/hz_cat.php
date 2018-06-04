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
needauth( 721 );
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
echo "cript type=\"text/javascript\" src=\"js/hz.js\"></script>\r\n</head>\r\n\r\n<body >\r\n";
$pid = $_REQUEST['pid'];
$step = $_REQUEST['step'];
$cc = $_REQUEST['cc'];
if ( !isset( $pid ) || $pid == "" )
{
				$pid = 0;
}
if ( $step == "add" && $_REQUEST['cat'] != "" && $_REQUEST['cat'] != " " )
{
				$cat = $_REQUEST['cat'];
				$cat = htmlspecialchars( $cat );
				if ( $pid != "0" )
				{
								$msql->query( "select catpath from {P}_hz_cat where catid='{$pid}'" );
								if ( $msql->next_record( ) )
								{
												$pcatpath = $msql->f( "catpath" );
								}
				}
				$msql->query( "select max(xuhao) from {P}_hz_cat where pid='{$pid}'" );
				if ( $msql->next_record( ) )
				{
								$maxxuhao = $msql->f( "max(xuhao)" );
								$nowxuhao = $maxxuhao + 1;
				}
				$msql->query( "insert into {P}_hz_cat set\r\n\t\t`pid`='{$pid}',\r\n\t\t`cat`='{$cat}',\r\n\t\t`xuhao`='{$nowxuhao}',\r\n\t\t`catpath`='{$catpath}',\r\n\t\t`nums`='0',\r\n\t\t`tj`='0',\r\n\t\t`ifchannel`='0'\r\n\t" );
				$nowcatid = $msql->instid( );
				$nowpath = fmpath( $nowcatid );
				$catpath = $pcatpath.$nowpath.":";
				$msql->query( "update {P}_hz_cat set catpath='{$catpath}' where catid='{$nowcatid}'" );
}
if ( $step == "del" )
{
				$catid = $_GET['catid'];
				$pid = $_GET['pid'];
				$msql->query( "select id from {P}_hz_con where catid='{$catid}' " );
				if ( $msql->next_record( ) )
				{
								err( $strHzNotice1, "", "" );
								exit( );
				}
				$msql->query( "select catid from {P}_hz_cat where pid='{$catid}'" );
				if ( $msql->next_record( ) )
				{
								err( $strHzNotice2, "", "" );
								exit( );
				}
				$msql->query( "delete from {P}_hz_cat where catid='{$catid}'" );
}
if ( $step == "modi" )
{
				$cat = $_GET['cat'];
				$catid = $_GET['catid'];
				$pid = $_GET['pid'];
				$xuhao = $_GET['xuhao'];
				$tj = $_GET['tj'];
				$cat = htmlspecialchars( $cat );
				$msql->query( "update {P}_hz_cat set cat='{$cat}',xuhao='{$xuhao}' where catid='{$catid}' " );
				$msql->query( "update {P}_hz_cat set tj='{$tj}' where catpath regexp '".fmpath( $catid )."' " );
}
echo " \r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" height=\"30\">\r\n  <tr> \r\n   \r\n                  \r\n      <td width=\"80\"  height=\"30\"> \r\n\t  ";
echo "<s";
echo "elect name=\"pid\" onChange=\"self.location=this.options[this.selectedIndex].value\">\r\n\t  <option value='hz_cat.php'>";
echo $strHzSelCat;
echo "</option>\r\n         ";
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
								echo "<option value='hz_cat.php?pid=".$lcatid."' selected>".$ppcat.$cat."</option>";
				}
				else
				{
								echo "<option value='hz_cat.php?pid=".$lcatid."'>".$ppcat.$cat."</option>";
				}
				$ppcat = "";
}
echo "        </select>\r\n        \r\n                    \r\n      </td>\r\n    \r\n             \r\n  \r\n      <td align=\"right\" > <form name=\"addcat\" method=\"get\" action=\"hz_cat.php\"  onSubmit=\"return catCheckform(this)\">\r\n        <input type=\"hidden\" name=\"step\" value=\"add\" />\r\n        ";
echo "<s";
echo "elect name=\"pid\" id=\"pid\" >\r\n          <option value='0'>";
echo $strCatTopAdd;
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
												$ppcat .= $ncat."&gt;";
								}
				}
				if ( $pid == $lcatid )
				{
								echo "<option value='".$lcatid."' selected>".$strCatLocat1.$ppcat.$cat."</option>";
				}
				else
				{
								echo "<option value='".$lcatid."'>".$strCatLocat1.$ppcat.$cat."</option>";
				}
				$ppcat = "";
}
echo "        </select>\r\n        <input name=\"cat\" type=\"text\" class=\"input\" value=\"";
echo $strHzCatName;
echo "\" size=\"15\" onFocus=\"this.value=''\" />\r\n        <input type=\"Submit\" name=\"Submit\" value=\"";
echo $strCatAdd;
echo "\" class=\"button\" />\r\n      </form>\r\n\t</td> \r\n  </tr>\r\n</table>\r\n\r\n</div>\r\n\r\n<div class=\"listzone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n  <tr>\r\n    <td width=\"38\"  class=\"biaoti\">";
echo $strNumber;
echo "</td> \r\n    <td width=\"38\"  class=\"biaoti\">";
echo $strXuhao;
echo "</td>\r\n    <td width=\"135\"  class=\"biaoti\">";
echo $strCat;
echo " </td>\r\n    <td  class=\"biaoti\">";
echo $strHzUrl;
echo "</td>\r\n\t<td width=\"38\"  class=\"biaoti\">";
echo $strTuiJian;
echo "</td>\r\n    <td width=\"38\"  class=\"biaoti\">";
echo $strColProp;
echo "</td>\r\n    <td width=\"38\"  class=\"biaoti\">";
echo $strModify;
echo "</td>\r\n    <td width=\"38\"  class=\"biaoti\">";
echo $strDelete;
echo "</td>\r\n  </tr>\r\n  ";
$msql->query( "select * from {P}_hz_cat where  pid='{$pid}' order by xuhao" );
while ( $msql->next_record( ) )
{
				$catid = $msql->f( "catid" );
				$cat = $msql->f( "cat" );
				$xuhao = $msql->f( "xuhao" );
				$pid = $msql->f( "pid" );
				$tj = $msql->f( "tj" );
				$catpath = $msql->f( "catpath" );
				$ifchannel = $msql->f( "ifchannel" );
				if ( $ifchannel == "1" )
				{
								$href = "../class/index.php?catid=".$catid;
								$url = "http://.../huanzeng/class/".$catid."/";
				}
				else
				{
								$href = "../class/index.php?catid=".$catid;
								$url = "http://.../huanzeng/class/?".$catid.".html";
				}
				echo " \r\n  <tr class=\"list\">\r\n    <td width=\"38\">";
				echo $catid;
				echo "    </td> \r\n    <form method=\"get\" action=\"hz_cat.php\">\r\n      <td width=\"38\"> \r\n        <input type=\"text\" name=\"xuhao\" size=\"3\" value=\"";
				echo $xuhao;
				echo "\" class=\"input\" />      </td>\r\n      <td width=\"135\"> \r\n        <input type=\"text\" name=\"cat\" size=\"16\" value=\"";
				echo $cat;
				echo "\" class=\"input\" />\r\n          <input type=\"hidden\" name=\"catid\" value=\"";
				echo $catid;
				echo "\" />\r\n        <input type=\"hidden\" name=\"step\" value=\"modi\" />\r\n        <input type=\"hidden\" name=\"pid\" value=\"";
				echo $pid;
				echo "\" />      </td>\r\n      <td><a href='";
				echo $href;
				echo "' target='_blank'>";
				echo $url;
				echo "</a> </td>\r\n\t  <td width=\"38\"  ><input type=\"checkbox\" name=\"tj\" value=\"1\" ";
				echo checked( $tj, "1" );
				echo " /></td>\r\n      <td width=\"38\"><img src=\"images/prop.png\" border=0 style=\"cursor:pointer;display:";
				echo $listdis;
				echo "\" onClick=\"Dpop('prop_frame.php?catid=";
				echo $catid;
				echo "&pid=";
				echo $pid;
				echo "','600','520')\"  ></td>\r\n      <td width=\"38\"><input type=\"image\"  name=\"imageField\" src=\"images/modi.png\"></td>\r\n      <td width=\"38\"><img src=\"images/delete.png\"  style=\"cursor:pointer\"   border=0 onClick=\"self.location='hz_cat.php?step=del&catid=";
				echo $catid;
				echo "&pid=";
				echo $pid;
				echo "'\"></td>\r\n    </form>\r\n  </tr>\r\n  ";
}
echo " \r\n</table>\r\n</div>\r\n\r\n</body>\r\n</html>\r\n";
?>

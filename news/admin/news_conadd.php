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
include( "func/upload.inc.php" );
needauth( 125 );
$pid = $_REQUEST['pid'];
if ( !isset( $pid ) || $pid == "" )
{
				$pid = 0;
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/news.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/calendar.js\"></script>\r\n</head>\r\n<body >\r\n\r\n<form id=\"newsAddForm\" name=\"form\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">\r\n\r\n<div class=\"formzone\">\r\n\r\n<div class=\"namezone\">\r\n";
echo $strNewsFabu;
echo "</div>\r\n<div class=\"tablezone\">\r\n<div  id=\"notice\" class=\"noticediv\"></div>\r\n\r\n<table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n    <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsCatTitle;
echo "</td>\r\n      <td height=\"30\" > \r\n        ";
echo "<s";
echo "elect id=\"selcatid\" name=\"catid\" >\r\n          ";
$fsql->query( "select * from {P}_news_cat  order by catpath" );
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
echo " \r\n        </select>\r\n        <font color=\"#FF0000\">*</font> </td>\r\n    </tr>\r\n\t\r\n\t\r\n    <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsAddTitle;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"title\" style='WIDTH: 499px;font-size:12px;' maxlength=\"200\" class=\"input\" />\r\n        <font color=\"#FF0000\">*</font> </td>\r\n    </tr>\r\n\t</table>\r\n\t<div id=\"proplist\">\r\n\t\r\n\t</div>\r\n\t<table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n    <tr>\r\n      <td width=\"100\" height=\"30\" align=\"center\" >";
echo $strMemo;
echo "</td>\r\n      <td height=\"30\" ><textarea name=\"memo\" style=\"WIDTH: 499px;font-size:12px;\" class=\"textarea\" rows=\"3\"></textarea>\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsAddImg;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"file\" name=\"jpg\" class=\"input\" style=\"WIDTH: 499px;\" />\r\n      </td>\r\n    </tr>\r\n\t\r\n\r\n\t<tr>\r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsAddCon;
echo "</td>\r\n      <td height=\"30\" > \r\n         <input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t\t";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"680px\";\r\n            editor.editorHeight = \"300px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"news/pics/\";\r\n            editor.iconPat";
echo "h = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n        <input type=\"hidden\" name=\"act\" value=\"newsadd\">\r\n        <input type=\"hidden\" name=\"pid\" value=\"";
echo $pid;
echo "\">\r\n\t\t<input type=\"hidden\" id=\"nowid\"  value=\"\" />\r\n      </td>\r\n    </tr>\r\n   \r\n    <tr>\r\n      <td height=\"30\" align=\"center\" >";
echo $strNewsTag;
echo "</td>\r\n      <td height=\"30\" >\r\n\t  <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"11\" />\r\n        <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"11\" />\r\n        <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"11\" />\r\n        <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"11\" />\r\n        <input name=\"tag";
echo "s[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"\" size=\"11\" /></td>\r\n    </tr>\r\n\t<tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsFileDown;
echo "</td>\r\n      <td height=\"30\" valign=top> \r\n        \r\n          <input id=\"divsuo\" type=\"file\" name=\"file\" style='WIDTH: 499px;display:none' class=\"input\" />\r\n          <input id=\"divurl\" type=\"text\" name=\"fileurl\" style='WIDTH: 499px;' value=\"http://\" class=\"input\" />\r\n          <input type=\"radio\" name=\"addtype\" value=\"addurl\" checked onClick=\"document.getElementById('divurl').style.display='inline';d";
echo "ocument.getElementById('divsuo').style.display='none';\">\r\n        ";
echo $strDownAddUrl;
echo " \r\n        <input type=\"radio\" name=\"addtype\" value=\"addfile\" onClick=\"document.getElementById('divurl').style.display='none';document.getElementById('divsuo').style.display='inline';\">\r\n        ";
echo $strDownAddUpload;
echo " \r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsAddAuthor;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"author\" style='WIDTH: 499px;font-size:12px;' maxlength=\"100\" class=\"input\" value=\"";
echo $_COOKIE['SYSNAME'];
echo "\">\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsAddSource;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"source\" style='WIDTH: 499px;font-size:12px;' maxlength=\"100\" class=\"input\" value=\"\">\r\n      </td>\r\n    </tr>\r\n\t<tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strNewsAddProj;
echo "</td>\r\n      <td height=\"30\" >";
$catstr .= "<SCRIPT language=javascript src='js/multicat.js'></SCRIPT>";
$catstr .= "<table cellspacing=0 cellpadding=0><tr><td ><select style='WIDTH: 239px;font-size:12px;' multiple size=5 name=spe_funct>";
$fsql->query( "select * from {P}_news_proj order by id desc" );
while ( $fsql->next_record( ) )
{
				$projid = $fsql->f( "id" );
				$project = $fsql->f( "project" );
				$NowPath = fmpath( $projid );
				$catstr .= "<option value=".$NowPath.">".$project."</option>";
				$ppcat = "";
}
$catstr .= "</select></td><td width=20>\r\n<input style='width:20px;height=37px;font-size:12px;border:1px outset;' onClick=\"JavaScript:AddItem('spe_funct', 'spe_selec[]')\" type=button value='+' name='Input'>\r\n<input style='width:20px;height=37px;font-size:12px;border:1px outset;' onClick=\"JavaScript:DelItem('spe_selec[]')\" type=button value='-' name='Input'>\r\n\t\t\t\t</td>\r\n\t\t\t\t<td>\r\n\t\t\t\t  <select  style='WIDTH: 239px;font-size:12px' multiple size=5 name=spe_selec[]>";
$catstr .= "</select></td><td valign=bottom></td><td width=20 align=center  valign='bottom'></td></tr></table>";
echo $catstr;
echo "</td>\r\n    </tr>\r\n\t\r\n\t<tr>\r\n\t  <td width=\"100\" height=\"30\" align=\"center\" >";
echo $strDownCent;
echo "</td>\r\n\t  <td height=\"30\" >\r\n\t  ";
$msql->query( "select * from {P}_member_centset" );
if ( $msql->next_record( ) )
{
				$centname1 = $msql->f( "centname1" );
				$centname2 = $msql->f( "centname2" );
				$centname3 = $msql->f( "centname3" );
				$centname4 = $msql->f( "centname4" );
				$centname5 = $msql->f( "centname5" );
}
echo "\t  ";
echo "<s";
echo "elect name=\"downcentid\">\r\n\t    <option value=\"1\">";
echo $centname1;
echo "</option>\r\n\t\t<option value=\"2\">";
echo $centname2;
echo "</option>\r\n\t\t<option value=\"3\">";
echo $centname3;
echo "</option>\r\n\t\t<option value=\"4\">";
echo $centname4;
echo "</option>\r\n\t\t<option value=\"5\">";
echo $centname5;
echo "</option>\r\n\t    </select>\r\n\t\t<input name=\"downcent\" type=\"text\" class=\"input\" id=\"downcent\"  value=\"0\" size=\"3\" maxlength=\"5\" />\r\n\t  \r\n\t  </td>\r\n\t  </tr>\r\n\t<tr>\r\n\t  <td height=\"30\" align=\"center\" >";
echo $strFbtime;
echo "</td>\r\n\t  <td height=\"30\" >\r\n\t  ";
$fbtime = date( "Y-m-d", time( ) );
echo "\t  <input name=\"fbtime\" type=\"text\" class=\"input\" id=\"fbtime\"  value=\"";
echo $fbtime;
echo "\" size=\"10\" maxlength=\"10\"   onClick=\"getDateString(this,oCalendarChs)\"  style=\"cursor:pointer\" readonly  /></td>\r\n\t  </tr>\r\n\t<tr>\r\n      <td height=\"30\" align=\"center\" >";
echo $strNewsToUrl;
echo "</td>\r\n      <td height=\"30\" ><input name=\"tourl\" type=\"text\" class=\"input\" id=\"tourl\" style='WIDTH: 499px;font-size:12px;' value=\"http://\" maxlength=\"200\" />          </td>\r\n\t  </tr>\r\n\t<tr>\r\n\t  <td height=\"30\" align=\"center\" >&nbsp;</td>\r\n\t  <td height=\"30\" >";
echo $strNewsToUrlNTC;
echo "</td>\r\n\t  </tr>\r\n  \r\n   \r\n\r\n</table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"cc\"  onClick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\" />\r\n</div>\r\n\r\n</div>\r\n</form>\r\n";
echo "<s";
echo "cript>\r\n$().getPropList();\r\n</script>\r\n</body>\r\n</html>\r\n";
?>

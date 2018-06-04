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
echo "cript type=\"text/javascript\" src=\"js/hz.js\"></script>\r\n\r\n</head>\r\n\r\n<body >\r\n    \r\n";
$id = $_REQUEST['id'];
$pid = $_REQUEST['pid'];
$msql->query( "select * from {P}_hz_con where  id='{$id}'" );
if ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$catid = $msql->f( "catid" );
				$title = $msql->f( "title" );
				$cent = $msql->f( "cent" );
				$kucun = $msql->f( "kucun" );
				$memo = $msql->f( "memo" );
				$body = $msql->f( "body" );
				$xuhao = $msql->f( "xuhao" );
				$cl = $msql->f( "cl" );
				$tj = $msql->f( "tj" );
				$ifnew = $msql->f( "ifnew" );
				$ifred = $msql->f( "ifred" );
				$iffb = $msql->f( "iffb" );
				$src = $msql->f( "src" );
				$type = $msql->f( "type" );
				$author = $msql->f( "author" );
				$source = $msql->f( "source" );
				$secure = $msql->f( "secure" );
				$oldproj = $msql->f( "proj" );
				$oldcatid = $msql->f( "catid" );
				$oldcatpath = $msql->f( "catpath" );
				$tags = $msql->f( "tags" );
				$body = htmlspecialchars( $body );
				$body = path2url( $body );
				$dtime = date( "Y-m-d H:i:s", $msql->f( "dtime" ) );
				$uptime = date( "Y-m-d H:i:s", $msql->f( "uptime" ) );
}
echo " \r\n\r\n<form id=\"productForm\" name=\"form\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strHzModify;
echo "</div>\r\n<div class=\"tablezone\">\r\n<div  id=\"notice\" class=\"noticediv\"></div>\r\n      <table class=\"productmodizone\" width=\"100%\" cellpadding=\"2\" align=\"center\"  border=\"0\" cellspacing=\"0\">\r\n         \r\n\t\t  <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzSelCat;
echo "</td>\r\n            <td height=\"30\" > \r\n              ";
echo "<s";
echo "elect id=\"selcatid\" name=\"catid\" >\r\n                ";
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
				if ( $catid == $lcatid )
				{
								echo "<option value='".$lcatid."' selected>".$ppcat.$cat."</option>";
				}
				else
				{
								echo "<option value='".$lcatid."'>".$ppcat.$cat."</option>";
				}
				$ppcat = "";
}
echo " \r\n              </select>\r\n            </td>\r\n          </tr>\r\n\t\t   <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddTitle;
echo "</td>\r\n            <td height=\"30\" > \r\n              <input type=\"text\" id=\"title\" name=\"title\" style='WIDTH: 499px;' maxlength=\"200\" class=\"input\" value=\"";
echo $title;
echo "\" />\r\n              <font color=\"#FF0000\">*</font> </td>\r\n          </tr>\r\n\t\t  <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddCent;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"cent\" style='WIDTH: 499px;font-size:12px;' maxlength=\"200\" class=\"input\" value=\"";
echo $cent;
echo "\" />\r\n        ";
echo "<s";
echo "pan style=\"color:#ff0000;\">* </span> </td>\r\n    </tr>\r\n\t<tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddKuCun;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"kucun\" style='WIDTH: 499px;font-size:12px;' maxlength=\"200\" class=\"input\" value=\"";
echo $kucun;
echo "\" />\r\n        ";
echo "<s";
echo "pan style=\"color:#ff0000;\">* </span> </td>\r\n    </tr>\r\n      </table>\r\n\t\t   \r\n\t\t   <div id=\"proplist\" class=\"productmodizone\">\r\n\t\t   </div>\r\n\t\t   \r\n\t\t <table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n\t\t  <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddImg;
echo "</td>\r\n            <td height=\"30\" > \r\n              <input id=\"uppic\" type=\"file\" name=\"jpg\" class=\"input\" style='WIDTH: 499px;' />\r\n\t\t\t  <input  type='submit' name='modi' onClick=\"KindSubmit();\" value='";
echo $strHzUpload;
echo "' class='savebutton' />\r\n\t\t    </td>\r\n          </tr>\r\n\t\t  \r\n\t\t   <tr>\r\n\t\t     <td height=\"30\" align=\"center\" >&nbsp;</td>\r\n\t\t     <td height=\"30\" ><div id=\"productpages\"></div></td>\r\n        </tr>\r\n\t\t<tr>\r\n\t\t     <td align=\"center\" ></td>\r\n\t\t     <td ><img id=\"picpriview\" src=\"images/loading.gif\" /></td>\r\n\t       </tr>\r\n      </table>\r\n\t\r\n\t\t \r\n         <table class=\"productmodizone\" width=\"100%\"   border=\"0\" align=";
echo "\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n\t\t <tr>\r\n            <td width=\"100\" height=\"30\" align=\"center\" >";
echo $strHzMemo;
echo "</td>\r\n            <td height=\"30\" ><textarea name=\"memo\" style=\"WIDTH: 499px;\" class=\"textarea\" rows=\"5\">";
echo $memo;
echo "</textarea>            </td>\r\n          </tr>\r\n\t\t  \r\n\t\t  <tr>\r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddCon;
echo "</td>\r\n      <td height=\"30\" > \r\n         <input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t\t";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"680px\";\r\n            editor.editorHeight = \"300px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"huanzeng/pics/\";\r\n            editor.ico";
echo "nPath = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>       </td>\r\n    </tr>\r\n          <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strFbtime;
echo "</td>\r\n            <td height=\"30\" >";
echo $dtime;
echo "</td>\r\n          </tr>\r\n          <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strUptime;
echo "</td>\r\n            <td height=\"30\" >";
echo $uptime;
echo " </td>\r\n          </tr>\r\n      </table>\r\n\t \r\n</div>  \r\n<div class=\"adminsubmit\">\r\n<input id=\"adminsubmit\" type=\"submit\" name=\"modi\" onClick=\"KindSubmit();\"  value=\"";
echo $strSave;
echo "\" class=\"button\" />\r\n<input type=\"hidden\" id=\"act\" name=\"act\" value=\"productmodify\" />\r\n<input type=\"hidden\" id=\"nowid\" name=\"id\" value=\"";
echo $id;
echo "\" />\r\n<input type=\"hidden\" name=\"oldcatid\" value=\"";
echo $oldcatid;
echo "\" />\r\n<input type=\"hidden\" name=\"oldcatpath\" value=\"";
echo $oldcatpath;
echo "\" />\r\n<input type=\"hidden\" name=\"pid\" value=\"";
echo $pid;
echo "\" />\r\n<input type=\"hidden\" name=\"page\" value=\"";
echo $page;
echo "\" />\r\n<input type=\"hidden\" name=\"source\" value=\"";
echo $source;
echo "\" />\r\n<input type=\"hidden\" name=\"author\"  value=\"";
echo $author;
echo "\" />\r\n</div> \r\n</div>\r\n</form>\r\n";
echo "<s";
echo "cript>\r\n$().getPropList();\r\n$().getProductPages(0);\r\n$().getContent(0);\r\n</script>\r\n</body>\r\n</html>\r\n";
?>

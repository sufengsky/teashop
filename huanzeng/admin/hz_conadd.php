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
needauth( 721 );
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
echo "cript type=\"text/javascript\" src=\"js/hz.js\"></script>\r\n</head>\r\n<body >\r\n\r\n<form id=\"productAddForm\" name=\"form\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">\r\n\r\n<div class=\"formzone\">\r\n\r\n<div class=\"namezone\">\r\n";
echo $strHzFabu;
echo "</div>\r\n<div class=\"tablezone\">\r\n<div  id=\"notice\" class=\"noticediv\"></div>\r\n\r\n<table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n    <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzSelCat;
echo "</td>\r\n      <td height=\"30\" > \r\n        ";
echo "<s";
echo "elect id=\"selcatid\" name=\"catid\" >\r\n          ";
$fsql->query( "select * from {P}_hz_cat  order by catpath" );
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
echo " \r\n        </select>        </td>\r\n    </tr>\r\n\t <tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddTitle;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"title\" style='WIDTH: 499px;font-size:12px;' maxlength=\"200\" class=\"input\" />\r\n        ";
echo "<s";
echo "pan style=\"color:#ff0000;\">* </span> </td>\r\n    </tr>\r\n\t\r\n\t</table>\r\n\t<div id=\"proplist\">\r\n\t\r\n\t</div>\r\n\t<table width=\"100%\"   border=\"0\" align=\"center\"  cellpadding=\"2\" cellspacing=\"0\" >\r\n\t<tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddCent;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"cent\" style='WIDTH: 499px;font-size:12px;' maxlength=\"200\" class=\"input\" />\r\n        ";
echo "<s";
echo "pan style=\"color:#ff0000;\">* </span> </td>\r\n    </tr>\r\n\t<tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddKuCun;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"text\" name=\"kucun\" style='WIDTH: 499px;font-size:12px;' maxlength=\"200\" class=\"input\" />\r\n        ";
echo "<s";
echo "pan style=\"color:#ff0000;\">* </span> </td>\r\n    </tr>\r\n\t<tr> \r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddImg;
echo "</td>\r\n      <td height=\"30\" > \r\n        <input type=\"file\" name=\"jpg\" class=\"input\" style=\"WIDTH: 499px;\" />\r\n       </td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"100\" height=\"30\" align=\"center\" >";
echo $strHzMemo;
echo "</td>\r\n      <td height=\"30\" ><textarea name=\"memo\" style=\"WIDTH: 499px;font-size:12px;\" class=\"textarea\" rows=\"5\"></textarea>      </td>\r\n    </tr>\r\n\t\r\n\t<tr>\r\n      <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strHzAddCon;
echo "</td>\r\n      <td height=\"30\" > \r\n         <input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t\t";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"680px\";\r\n            editor.editorHeight = \"300px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"huanzeng/pics/\";\r\n            editor.ico";
echo "nPath = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>       </td>\r\n    </tr>\r\n</table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"cc\"  onClick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\" />\r\n<input type=\"hidden\" name=\"act\" value=\"productadd\">\r\n<input type=\"hidden\" name=\"pid\" value=\"";
echo $pid;
echo "\">\r\n<input type=\"hidden\" id=\"nowid\"  value=\"\" />\r\n<input type=\"hidden\" name=\"author\"  value=\"";
echo $_COOKIE['SYSNAME'];
echo "\" />\r\n<input type=\"hidden\" name=\"source\"  value=\"\" />\r\n</div>\r\n\r\n</div>\r\n</form>\r\n";
echo "<s";
echo "cript>\r\n$().getPropList();\r\n</script>\r\n</body>\r\n</html>\r\n";
?>

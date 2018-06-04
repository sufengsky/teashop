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
include( "func/member.inc.php" );
needauth( 57 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body>\r\n";
$step = $_REQUEST['step'];
$body = $_REQUEST['body'];
$title = $_POST['title'];
$id = $_REQUEST['id'];
if ( $step == "2" )
{
				if ( $title == "" )
				{
								err( $strMemberNC1, "", "" );
				}
				if ( 200 < strlen( $title ) )
				{
								err( $strMemberNC2, "", "" );
				}
				if ( 65000 < strlen( $body ) )
				{
								err( $strMemberNC3, "", "" );
				}
				$body = url2path( $body );
				$title = htmlspecialchars( $title );
				$msql->query( "update {P}_member_notice set body='{$body}',title='{$title}' where id='{$id}' " );
				sayok( $strModifyOk, "member_notice.php", "" );
}
$msql->query( "select * from {P}_member_notice where id='{$id}'" );
if ( $msql->next_record( ) )
{
				$body = $msql->f( "body" );
				$title = $msql->f( "title" );
				$id = $msql->f( "id" );
				$body = htmlspecialchars( $body );
				$body = path2url( $body );
}
echo "<div class=\"formzone\">\r\n<form name=\"form\" action=\"member_notice_mod.php\" method=\"post\" enctype=\"multipart/form-data\">\r\n\r\n<div class=\"namezone\">\r\n";
echo $strMemberNCEdit;
echo "</div>\r\n<div class=\"tablezone\">\r\n  <table width=\"100%\" cellpadding=\"6\" align=\"center\" border=\"0\" cellspacing=\"0\">\r\n    <tr>\r\n      <td width=\"120\" height=\"30\" align=\"right\" >";
echo $strMemberNCTitle;
echo " : </td>\r\n      <td height=\"30\" ><input name=\"title\" type=\"text\" class=\"input\" value=\"";
echo $title;
echo "\" size=\"60\" maxlength=\"200\" />\r\n          <font color=\"#FF0000\">*</font> </td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"120\" align=\"right\">";
echo $strMemberNCCon;
echo " :  </td>\r\n      <td height=\"18\"><input  name=\"body\" type=\"hidden\" value=\"";
echo $body;
echo "\" />\r\n\t  ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"700px\";\r\n            editor.editorHeight = \"300px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"member/pics/\";\r\n            editor.iconP";
echo "ath = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n      </td>\r\n    </tr>\r\n  </table>\r\n</div>\r\n<div class=\"adminsubmit\"> \r\n<input type=\"submit\" name=\"submit\"   value=\"";
echo $strSubmit;
echo "\" class=\"button\" onClick=\"KindSubmit();\" />\r\n<input type=\"hidden\" name=\"step\" value=\"2\" />\r\n<input type=\"hidden\" name=\"id\" value=\"";
echo $id;
echo "\" />\r\n</div>\r\n</form>\r\n\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

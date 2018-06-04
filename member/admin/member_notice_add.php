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
if ( $step == "add" )
{
				$body = $_POST['body'];
				$title = $_POST['title'];
				$membertypeid = $_POST['membertypeid'];
				if ( 65000 < strlen( $body ) )
				{
								err( $strMemberNC3, "", "" );
				}
				if ( $title == "" )
				{
								err( $strMemberNC1, "", "" );
				}
				if ( 200 < strlen( $title ) )
				{
								err( $strMemberNC2, "", "" );
				}
				$title = htmlspecialchars( $title );
				$body = url2path( $body );
				$dtime = time( );
				$msql->query( "insert into {P}_member_notice values(\r\n\t0,\r\n\t'{$membertypeid}',\r\n\t'{$title}',\r\n\t'{$body}',\r\n\t'{$dtime}',\r\n\t'0',\r\n\t'0',\r\n\t'0',\r\n\t'0'\r\n\r\n\t)" );
				sayok( $strMemberNCPubok, "member_notice.php", $strMemberNCList );
}
echo " \r\n<div class=\"formzone\">\r\n<form name=\"form\" action=\"member_notice_add.php\" method=\"post\" enctype=\"multipart/form-data\" >\r\n\r\n<div class=\"namezone\">\r\n";
echo $strMemberNCPub;
echo "</div>\r\n<div class=\"tablezone\">\r\n<table width=\"100%\" cellpadding=\"5\" align=\"center\"  style=\"border-collapse: collapse\" border=\"0\" cellspacing=\"0\">\r\n        \r\n<tr>\r\n          <td height=\"30\" width=\"120\" align=\"right\" >";
echo $strMemberNCTo;
echo " :</td>\r\n          <td height=\"30\" >\r\n            ";
echo "<s";
echo "elect name=\"membertypeid\" >\r\n              ";
echo "<option value='0'>".$strMemberAll."</option>";
$fsql->query( "select * from {P}_member_type  order by membertypeid" );
while ( $fsql->next_record( ) )
{
				$lmembertypeid = $fsql->f( "membertypeid" );
				$lmembertype = $fsql->f( "membertype" );
				echo "<option value='".$lmembertypeid."'>".$lmembertype."</option>";
}
echo " \r\n            </select>\r\n          </td>\r\n        </tr>\r\n          <tr> \r\n            <td height=\"30\" width=\"120\" align=\"right\" >";
echo $strMemberNCTitle;
echo " :</td>\r\n            <td height=\"30\" > \r\n              <input type=\"text\" name=\"title\" size=\"60\" maxlength=\"200\" class=input>\r\n              <font color=\"#FF0000\">*</font> </td>\r\n          </tr>\r\n          <tr> \r\n            <td width=\"120\" height=\"18\" align=\"right\">";
echo "<s";
echo "pan >";
echo $strMemberNCCon;
echo "</span>  :\r\n              \r\n            \r\n            </td>\r\n          <td height=\"18\"><input  name=\"body\" type=\"hidden\" />\r\n\t\t  ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"700px\";\r\n            editor.editorHeight = \"300px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"member/pics/\";\r\n            editor.iconP";
echo "ath = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n\t\t  </td>\r\n          </tr>\r\n         \r\n      </table>\r\n</div>\r\n<div class=\"adminsubmit\"> \r\n<input type=\"submit\" name=\"submit\"  onClick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\">\r\n<input type=\"hidden\" name=\"step\" value=\"add\">\r\n</div>\r\n </form>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

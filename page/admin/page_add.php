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
needauth( 301 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/page.js\"></script>\r\n</head>\r\n\r\n<body >\r\n";
$step = $_REQUEST['step'];
$groupid = $_REQUEST['groupid'];
if ( $step == "add" )
{
				$title = htmlspecialchars( $_POST['title'] );
				$pagefolder = htmlspecialchars( $_POST['pagefolder'] );
				$url = htmlspecialchars( $_POST['url'] );
				$memo = htmlspecialchars( $_POST['memo'] );
				$body = $_POST['body'];
				$pic = $_FILES['jpg'];
				trylimit( "_page", 20, "id" );
				$body = url2path( $body );
				if ( $title == "" )
				{
								err( $strHtmNotice1, "", "" );
				}
				if ( 200 < strlen( $title ) )
				{
								err( $strHtmNotice2, "", "" );
				}
				if ( 65000 < strlen( $body ) )
				{
								err( $strHtmNotice3, "", "" );
				}
				if ( 0 < $pic['size'] )
				{
								$nowdate = date( "Ymd", time( ) );
								$picpath = "../pics/".$nowdate;
								@mkdir( @$picpath, 511 );
								$uppath = "page/pics/".$nowdate;
								$arr = newuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $uppath );
								if ( $arr[0] != "err" )
								{
												$src = $arr[3];
								}
								else
								{
												err( $arr[1], "", "" );
								}
				}
				else
				{
								$src = "";
				}
				if ( $pagefolder != "" )
				{
								if ( strlen( $pagefolder ) < 1 || 16 < strlen( $pagefolder ) )
								{
												err( $strHtmNotice11, "", "" );
								}
								if ( !eregi( "^[0-9a-z]{0,16}\$", $pagefolder ) )
								{
												err( $strHtmNotice11, "", "" );
								}
								if ( strstr( $pagefolder, "/" ) || strstr( $pagefolder, "." ) )
								{
												err( $strHtmNotice11, "", "" );
								}
								$arr = array( "index", "main", "default", "detail", "admin", "images", "includes", "language", "module", "page", "templates", "js", "css" );
								if ( in_array( $pagefolder, $arr ) == true )
								{
												err( $strHtmNotice12, "", "" );
								}
								$fsql->query( "select id from {P}_page where groupid='{$groupid}' and pagefolder='{$pagefolder}'" );
								if ( $fsql->next_record( ) )
								{
												err( $strHtmNotice13, "", "" );
								}
								$fsql->query( "select folder from {P}_page_group where id='{$groupid}'" );
								if ( $fsql->next_record( ) )
								{
												$folder = $fsql->f( "folder" );
								}
								$pagename = $folder."_".$pagefolder;
								$fd = fopen( "../temp.php", "r" );
								$str = fread( $fd, "2000" );
								$str = str_replace( "TEMP", $pagename, $str );
								fclose( $fd );
								$filename = "../".$folder."/".$pagefolder.".php";
								$fp = fopen( $filename, "w" );
								fwrite( $fp, $str );
								fclose( $fp );
								@chmod( @$filename, 493 );
								$msql->query( "insert into {P}_base_pageset set \r\n\t\t\t`name`='{$title}',\r\n\t\t\t`coltype`='page',\r\n\t\t\t`pagename`='{$pagename}',\r\n\t\t\t`buildhtml`='0'\r\n\t\t" );
				}
				$msql->query( "select max(xuhao) from {P}_page where groupid='{$groupid}'" );
				if ( $msql->next_record( ) )
				{
								$newxuhao = $msql->f( "max(xuhao)" ) + 1;
				}
				$msql->query( "insert into {P}_page set \r\n\tgroupid='{$groupid}',\r\n\ttitle='{$title}',\r\n\tmemo='{$memo}',\r\n\txuhao='{$newxuhao}',\r\n\tpagefolder='{$pagefolder}',\r\n\turl='{$url}',\r\n\tsrc='{$src}',\r\n\tbody='{$body}'\r\n\t" );
				sayok( $strHtmNotice7, "page.php?groupid=".$groupid, "" );
}
echo " \r\n\r\n";
$msql->query( "select max(id) from {P}_page" );
if ( $msql->next_record( ) )
{
				$ftempname = $msql->f( "max(id)" );
}
echo "<form action=\"page_add.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"form\" id=\"addPageForm\">\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strHtmAdd;
echo "</div>\r\n<div class=\"tablezone\">\r\n  \r\n\r\n      <table width=\"100%\" cellpadding=\"2\" align=\"center\"  style=\"border-collapse: collapse\" border=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strGroupSel1;
echo "</td>\r\n          <td height=\"30\" >";
echo "<s";
echo "elect name=\"groupid\">\r\n              ";
$msql->query( "select * from {P}_page_group" );
while ( $msql->next_record( ) )
{
				$lgroupid = $msql->f( "id" );
				$groupname = $msql->f( "groupname" );
				if ( $groupid == $lgroupid )
				{
								echo "<option value='".$lgroupid."' selected>".$groupname."</option>";
				}
				else
				{
								echo "<option value='".$lgroupid."'>".$groupname."</option>";
				}
}
echo "          </select></td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strPagePbModle;
echo "</td>\r\n          <td height=\"30\" >            ";
echo "<s";
echo "elect name=\"addselmodle\" id=\"addselmodle\">\r\n            <option value=\"1\">";
echo $strPageFolderS2;
echo "</option>\r\n            <option value=\"0\">";
echo $strPageFolderS1;
echo "</option>\r\n          </select></td>\r\n        </tr>\r\n        <tr id=\"tr_fold\">\r\n          <td height=\"30\" align=\"center\" >";
echo $strPagePbName;
echo "</td>\r\n          <td height=\"30\" ><input name=\"pagefolder\" type=\"text\" class=\"input\" id=\"pagefolder\"  value=\"";
echo $ftempname;
echo "\" size=\"20\"  maxlength=\"30\" />\r\n.PHP</td>\r\n        </tr>\r\n         \r\n          <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strPageTitle;
echo "</td>\r\n            <td height=\"30\" > \r\n              <input name=\"title\" id=\"title\" type=\"text\" class=\"input\" value=\"\" size=\"51\"  maxlength=\"200\" />\r\n              <font color=\"#FF0000\">*</font> </td>\r\n          </tr>\r\n\t\t  \r\n\t\t   <tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strPagePicSrc;
echo "</td>\r\n            <td height=\"30\" ><input name=\"jpg\" type=\"file\" id=\"jpg\" size=\"50\" class=\"input\" /></td>\r\n          </tr>\r\n\t\t  \r\n\r\n\t\t \r\n\t\t  <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strPageCon;
echo "</td>\r\n            <td height=\"30\" > \r\n             <input type=\"hidden\" name=\"body\" value=\"\" />\r\n\t\t\t ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"700px\";\r\n            editor.editorHeight = \"350px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"page/pics/\";\r\n            editor.iconPat";
echo "h = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n              <input type=\"hidden\" name=\"step\" value=\"add\" />\r\n              <input type=\"hidden\" name=\"id\" value=\"";
echo $id;
echo "\" />\r\n            </td>\r\n          </tr>\r\n\t\t  <tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strPageMemo;
echo "</td>\r\n            <td height=\"30\" ><textarea name=\"memo\" rows=\"3\" class=\"textarea\" id=\"memo\" style=\"width:500px\">";
echo $memo;
echo "</textarea>\r\n            </td>\r\n\t    </tr>\r\n\t\t  <tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strPageToUrl;
echo "</td>\r\n            <td height=\"30\" ><input name=\"url\" style=\"width:500px\" type=\"text\" class=\"input\" id=\"url\" value=\"";
echo $url;
echo "\"  maxlength=\"200\" />            </td>\r\n\t    </tr>\r\n          \r\n          \r\n        \r\n      </table>\r\n\t \r\n</div>  \r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"submit\"  onClick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\"  ";
echo switchdis( 120 );
echo " />\r\n</div> \r\n</div>\r\n</form>\r\n</body>\r\n</html>\r\n";
?>

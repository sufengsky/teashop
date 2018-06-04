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
echo "cript type=\"text/javascript\" src=\"js/page.js\"></script>\r\n\r\n</head>\r\n\r\n<body >\r\n";
$id = $_REQUEST['id'];
$step = $_REQUEST['step'];
$groupid = $_REQUEST['groupid'];
if ( $step == "2" )
{
				$id = $_POST['id'];
				$title = htmlspecialchars( $_POST['title'] );
				$pagefolder = htmlspecialchars( $_POST['pagefolder'] );
				$old_pagefolder = htmlspecialchars( $_POST['old_pagefolder'] );
				$old_groupid = $_POST['old_groupid'];
				$url = htmlspecialchars( $_POST['url'] );
				$memo = htmlspecialchars( $_POST['memo'] );
				$body = $_POST['body'];
				$xuhao = $_POST['xuhao'];
				$pic = $_FILES['jpg'];
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
				$body = url2path( $body );
				if ( $groupid != $old_groupid && $pagefolder != $old_pagefolder )
				{
								err( $strHtmNotice14, "", "" );
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
								$msql->query( "select src from {P}_page where id='{$id}'" );
								if ( $msql->next_record( ) )
								{
												$oldsrc = $msql->f( "src" );
								}
								if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
								{
												unlink( ROOTPATH.$oldsrc );
								}
								$msql->query( "update {P}_page set src='{$src}'  where id='{$id}'" );
				}
				if ( $pagefolder != "" && $old_pagefolder != $pagefolder )
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
								$fsql->query( "select id from {P}_page where groupid='{$groupid}' and pagefolder='{$pagefolder}' and id!='{$id}'" );
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
								@unlink( @"../".@$folder."/".@$old_pagefolder.".php" );
								$oldpagename = $folder."_".$old_pagefolder;
								if ( $old_pagefolder == "" )
								{
												$msql->query( "insert into {P}_base_pageset set \r\n\t\t\t`name`='{$title}',\r\n\t\t\t`coltype`='page',\r\n\t\t\t`pagename`='{$pagename}',\r\n\t\t\t`buildhtml`='0'\r\n\t\t\t" );
								}
								else
								{
												$msql->query( "update {P}_base_pageset set pagename='{$pagename}' where coltype='page' and pagename='{$oldpagename}'" );
								}
								$msql->query( "update {P}_base_plus set pluslocat='{$pagename}' where plustype='page' and pluslocat='{$oldpagename}'" );
								$msql->query( "update {P}_base_plusplan set pluslocat='{$pagename}' where plustype='page' and pluslocat='{$oldpagename}'" );
				}
				if ( $old_pagefolder != "" && $pagefolder == "" )
				{
								$fsql->query( "select folder from {P}_page_group where id='{$groupid}'" );
								if ( $fsql->next_record( ) )
								{
												$folder = $fsql->f( "folder" );
								}
								@unlink( @"../".@$folder."/".@$old_pagefolder.".php" );
								$oldpagename = $folder."_".$old_pagefolder;
								$msql->query( "delete from {P}_base_pageset where coltype='page' and pagename='{$oldpagename}'" );
								$msql->query( "delete from {P}_base_plus where plustype='page' and pluslocat='{$oldpagename}'" );
								$msql->query( "delete from {P}_base_plusplan where plustype='page' and pluslocat='{$oldpagename}'" );
				}
				if ( $groupid != $old_groupid && $pagefolder == $old_pagefolder && $pagefolder != "" )
				{
								$fsql->query( "select folder from {P}_page_group where id='{$groupid}'" );
								if ( $fsql->next_record( ) )
								{
												$folder = $fsql->f( "folder" );
								}
								$fsql->query( "select folder from {P}_page_group where id='{$old_groupid}'" );
								if ( $fsql->next_record( ) )
								{
												$oldfolder = $fsql->f( "folder" );
								}
								$filename = "../".$folder."/".$pagefolder.".php";
								$oldfilename = "../".$oldfolder."/".$pagefolder.".php";
								$pagename = $folder."_".$pagefolder;
								$fd = fopen( "../temp.php", "r" );
								$str = fread( $fd, "2000" );
								$str = str_replace( "TEMP", $pagename, $str );
								fclose( $fd );
								$fp = fopen( $filename, "w" );
								fwrite( $fp, $str );
								fclose( $fp );
								@chmod( @$filename, 493 );
								@unlink( @$oldfilename );
								$oldpagename = $oldfolder."_".$pagefolder;
								$msql->query( "update {P}_base_pageset set pagename='{$pagename}' where coltype='page' and pagename='{$oldpagename}'" );
								$msql->query( "update {P}_base_plus set pluslocat='{$pagename}' where plustype='page' and pluslocat='{$oldpagename}'" );
								$msql->query( "update {P}_base_plusplan set pluslocat='{$pagename}' where plustype='page' and pluslocat='{$oldpagename}'" );
				}
				$msql->query( "update {P}_page set \r\n\t\t\ttitle='{$title}',\r\n\t\t\txuhao='{$xuhao}',\r\n\t\t\tmemo='{$memo}',\r\n\t\t\turl='{$url}',\r\n\t\t\tgroupid='{$groupid}',\r\n\t\t\tpagefolder='{$pagefolder}',\r\n\t\t\tbody='{$body}'\r\n\t\t\twhere id='{$id}'\r\n\t" );
				sayok( $strHtmNotice6, "page.php?groupid=".$groupid, "" );
}
echo " \r\n\r\n    \r\n";
$msql->query( "select * from {P}_page where  id='{$id}'" );
if ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$body = $msql->f( "body" );
				$title = $msql->f( "title" );
				$xuhao = $msql->f( "xuhao" );
				$groupid = $msql->f( "groupid" );
				$pagefolder = $msql->f( "pagefolder" );
				$url = $msql->f( "url" );
				$memo = $msql->f( "memo" );
}
$body = htmlspecialchars( $body );
$body = path2url( $body );
if ( $pagefolder == "" )
{
				$showtr = "style='display:none'";
				$modiselmodle = "0";
}
else
{
				$showtr = "";
				$modiselmodle = "1";
}
echo " \r\n\r\n<form  method=\"post\" action=\"page_edit.php\" enctype=\"multipart/form-data\" name=\"form\" id=\"modiPageForm\">\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strHtmEdit;
echo "</div>\r\n<div class=\"tablezone\">\r\n  \r\n\r\n      <table width=\"100%\" cellpadding=\"2\" align=\"center\"  style=\"border-collapse: collapse\" border=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strIdx;
echo "</td>\r\n          <td height=\"30\" ><input type=\"text\" name=\"xuhao\" style=\"width:25px\" value=\"";
echo $xuhao;
echo "\" class=\"input\" maxlength=\"9\" />\r\n          </td>\r\n        </tr>\r\n          <tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strGroupSel1;
echo "</td>\r\n            <td height=\"30\" > ";
echo "<s";
echo "elect name=\"groupid\" id=\"groupid\">\r\n         \r\n          ";
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
echo "        </select></td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strPagePbModle;
echo "</td>\r\n            <td height=\"30\" >";
echo "<s";
echo "elect name=\"modiselmodle\" id=\"modiselmodle\">\r\n              <option value=\"1\" ";
echo seld( $modiselmodle, "1" );
echo ">";
echo $strPageFolderS2;
echo "</option>\r\n              <option value=\"0\" ";
echo seld( $modiselmodle, "0" );
echo ">";
echo $strPageFolderS1;
echo "</option>\r\n            </select></td>\r\n          </tr>\r\n          <tr id=\"tr_fold\" ";
echo $showtr;
echo ">\r\n            <td height=\"30\" align=\"center\" >";
echo $strPagePbName;
echo "</td>\r\n            <td height=\"30\" ><input name=\"pagefolder\" type=\"text\" class=\"input\" id=\"pagefolder\" value=\"";
echo $pagefolder;
echo "\" size=\"20\"  maxlength=\"30\" />\r\n.PHP</td>\r\n          </tr>\r\n         \r\n          <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strPageTitle;
echo "</td>\r\n            <td height=\"30\" > \r\n              <input name=\"title\" id=\"title\" type=\"text\" class=\"input\" value=\"";
echo $title;
echo "\" size=\"36\"  maxlength=\"200\" />\r\n              <font color=\"#FF0000\">*</font> </td>\r\n          </tr>\r\n\t\t  \r\n \t\t\t<tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strPagePicSrc;
echo "</td>\r\n            <td height=\"30\" ><input name=\"jpg\" type=\"file\" id=\"jpg\" size=\"50\" class=\"input\" /></td>\r\n          </tr>\r\n\t\t \r\n\t\t  <tr> \r\n            <td height=\"30\" width=\"100\" align=\"center\" >";
echo $strPageCon;
echo "</td>\r\n            <td height=\"30\" > \r\n             <input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t\t ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"700px\";\r\n            editor.editorHeight = \"350px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"page/pics/\";\r\n            editor.iconPat";
echo "h = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n              <input type=\"hidden\" name=\"step\" value=\"2\" />\r\n              <input type=\"hidden\" name=\"id\" value=\"";
echo $id;
echo "\" />\r\n              <input name=\"old_groupid\" type=\"hidden\" id=\"old_groupid\" value=\"";
echo $groupid;
echo "\" />\r\n              <input name=\"old_pagefolder\" type=\"hidden\" id=\"old_pagefolder\" value=\"";
echo $pagefolder;
echo "\" /></td>\r\n          </tr>\r\n\t\t  <tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strPageMemo;
echo "</td>\r\n            <td height=\"30\" ><textarea name=\"memo\" rows=\"3\" class=\"textarea\" id=\"memo\" style=\"width:500px\">";
echo $memo;
echo "</textarea>\r\n            </td>\r\n\t    </tr>\r\n\t\t  <tr>\r\n            <td height=\"30\" align=\"center\" >";
echo $strPageToUrl;
echo "</td>\r\n            <td height=\"30\" ><input name=\"url\" type=\"text\" class=\"input\" id=\"url\" value=\"";
echo $url;
echo "\" style=\"width:500px\"  maxlength=\"200\" />            </td>\r\n\t    </tr>\r\n          \r\n          \r\n        \r\n      </table>\r\n\t \r\n</div>  \r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"submit\"  onClick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\"  ";
echo switchdis( 120 );
echo " />\r\n</div> \r\n</div>\r\n</form>\r\n</body>\r\n</html>\r\n";
?>

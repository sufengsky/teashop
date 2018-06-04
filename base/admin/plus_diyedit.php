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
needauth( 0 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n</head>\r\n<body>\r\n\r\n<div class=\"formzone\">\r\n<div class=\"rightzone\">\r\n\r\n</div>\r\n<div class=\"namezone\">\r\n";
echo $strDiyEdit;
echo "</div>\r\n<div class=\"tablezone\">\r\n";
$step = $_REQUEST['step'];
$nowplusid = $_REQUEST['nowplusid'];
if ( $step == "2" )
{
				$body = $_POST['body'];
				$updatemode = $_POST['updatemode'];
				$ids = $_POST['ids'];
				if ( 65000 < strlen( $body ) )
				{
								err( $strDiyNotice3, "", "" );
								exit( );
				}
				$body = url2path( $body );
				$msql->query( "update {P}_base_plus set `body`='{$body}' where `pluslable`='modEdit' and id='{$nowplusid}'" );
				if ( $updatemode == "all" )
				{
								$nums = sizeof( $ids );
								$i = 0;
								for ( ;	$i < $nums;	++$i	)
								{
												$idall = $ids[$i];
												$msql->query( "update {P}_base_plus set `body`='{$body}' where `pluslable`='modEdit' and id='{$idall}'" );
								}
								continue;
				}
				sayok( $strDiyNotice5, "plus_diyedit.php?nowplusid=".$nowplusid, "" );
				exit( );
}
if ( $nowplusid == "" )
{
				$fsql->query( "select id from {P}_base_plus where `pluslable`='modEdit' order by plustype limit 0,1" );
				if ( $fsql->next_record( ) )
				{
								$nowplusid = $fsql->f( "id" );
				}
}
echo "\r\n  <form  name=\"selpluslocat\" method=\"get\" action=\"\" >\r\n\t  ";
echo "<s";
echo "elect name=\"pp\" onchange=\"self.location=this.options[this.selectedIndex].value\" >\r\n        ";
$msql->query( "select * from {P}_base_plus where `pluslable`='modEdit' order by plustype" );
while ( $msql->next_record( ) )
{
				$plusid = $msql->f( "id" );
				$plustype = $msql->f( "plustype" );
				$pluslocat = $msql->f( "pluslocat" );
				$plustitle = $msql->f( "title" );
				$fsql->query( "select `colname` from {P}_base_coltype where `coltype`='{$plustype}' limit 0,1" );
				if ( $fsql->next_record( ) )
				{
								$colname = $fsql->f( "colname" );
				}
				$fsql->query( "select `name` from {P}_base_pageset where `coltype`='{$plustype}' and `pagename`='{$pluslocat}' limit 0,1" );
				if ( $fsql->next_record( ) )
				{
								$pagecname = $fsql->f( "name" );
				}
				if ( $nowplusid == $plusid )
				{
								echo "<option value='plus_diyedit.php?nowplusid=".$plusid."' selected>".$colname." |- ".$pagecname." |- ".$plustitle."</option>";
				}
				else
				{
								echo "<option value='plus_diyedit.php?nowplusid=".$plusid."'>".$colname." |- ".$pagecname." |- ".$plustitle."</option>";
				}
}
echo "      </select>\r\n\t  <br /><br />\r\n</form>\r\n\t\r\n\t";
$msql->query( "select * from {P}_base_plus where `id`='{$nowplusid}' limit 0,1" );
if ( $msql->next_record( ) )
{
				$body = $msql->f( "body" );
				$title = $msql->f( "title" );
				$width = $msql->f( "width" );
				$height = $msql->f( "height" );
}
else
{
				err( $strDiyEditNotice1, "", "" );
}
$commonnums = 0;
$msql->query( "select id from {P}_base_plus where `id`!='{$nowplusid}' and `title`='{$title}' and `width`='{$width}' and `height`='{$height}' and `body`='{$body}'" );
while ( $msql->next_record( ) )
{
				$ids = $msql->f( "id" );
				$idstr .= "<input type='hidden' name='ids[]' value='".$ids."' />";
				++$commonnums;
}
$body = htmlspecialchars( $body );
$body = path2url( $body );
echo "\t<form  method=\"post\" action=\"plus_diyedit.php\" enctype=\"multipart/form-data\" name=\"form\" id=\"modiEditForm\">\r\n\t\r\n\t<input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t\t ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"780px\";\r\n            editor.editorHeight = \"250px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"diy/pics/\";\r\n            editor.iconPath";
echo " = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n              <input type=\"hidden\" name=\"step\" value=\"2\" />\r\n              <input type=\"hidden\" name=\"nowplusid\" value=\"";
echo $nowplusid;
echo "\" />\r\n\t\t\t  \r\n              <br />\r\n              ";
echo "<s";
echo "pan class=\"adminsubmit\">\r\n              <input type=\"submit\" name=\"submit\"  onclick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\"  />\r\n              \r\n\t\t\t  ";
if ( 0 < $commonnums )
{
				echo "&nbsp; <input name='updatemode' type='checkbox' id='updatemode' value='all' checked='checked' /> ".$idstr.$strDiyNotice2.$commonnums.$strDiyNotice21;
}
echo "      </span>            \r\n\t</form>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

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
echo $strDiyBottomEdit;
echo "</div>\r\n<div class=\"tablezone\">\r\n";
$step = $_REQUEST['step'];
$nowplusid = $_REQUEST['nowplusid'];
if ( $step == "2" )
{
				$updatemode = $_POST['updatemode'];
				$body = $_POST['body'];
				if ( 65000 < strlen( $body ) )
				{
								err( $strDiyBottomNotice3, "", "" );
								exit( );
				}
				$body = url2path( $body );
				if ( $updatemode == "all" )
				{
								$msql->query( "update {P}_base_plus set `body`='{$body}' where `pluslable`='modButtomInfo'" );
								sayok( $strDiyBottomNotice4, "plus_bottomedit.php", "" );
								exit( );
				}
				else
				{
								$msql->query( "update {P}_base_plus set `body`='{$body}' where `pluslable`='modButtomInfo' and id='{$nowplusid}'" );
								sayok( $strDiyBottomNotice5, "plus_bottomedit.php?nowplusid=".$nowplusid, "" );
								exit( );
				}
}
if ( $nowplusid == "" )
{
				$msql->query( "select id from {P}_base_plus where `pluslable`='modButtomInfo' and `plustype`='index' and `pluslocat`='index'  limit 0,1" );
				if ( $msql->next_record( ) )
				{
								$nowplusid = $msql->f( "id" );
				}
				else
				{
								$fsql->query( "select id from {P}_base_plus where `pluslable`='modButtomInfo' order by plustype limit 0,1" );
								if ( $fsql->next_record( ) )
								{
												$nowplusid = $fsql->f( "id" );
								}
				}
}
echo "\r\n  <form  name=\"selpluslocat\" method=\"get\" action=\"\" >\r\n\t  ";
echo "<s";
echo "elect name=\"pp\" onchange=\"self.location=this.options[this.selectedIndex].value\" >\r\n        ";
$msql->query( "select * from {P}_base_plus where `pluslable`='modButtomInfo' order by plustype" );
while ( $msql->next_record( ) )
{
				$plusid = $msql->f( "id" );
				$plustype = $msql->f( "plustype" );
				$pluslocat = $msql->f( "pluslocat" );
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
								echo "<option value='plus_bottomedit.php?nowplusid=".$plusid."' selected>".$colname." |- ".$pagecname."</option>";
				}
				else
				{
								echo "<option value='plus_bottomedit.php?nowplusid=".$plusid."'>".$colname." |- ".$pagecname."</option>";
				}
}
echo "      </select>\r\n\t  <br /><br />\r\n</form>\r\n\t\r\n\t";
$msql->query( "select `body` from {P}_base_plus where `id`='{$nowplusid}' limit 0,1" );
if ( $msql->next_record( ) )
{
				$body = $msql->f( "body" );
				$body = htmlspecialchars( $body );
				$body = path2url( $body );
}
else
{
				err( $strDiyBottomNotice1, "", "" );
}
echo "\t<form  method=\"post\" action=\"plus_bottomedit.php\" enctype=\"multipart/form-data\" name=\"form\" id=\"modiEditForm\">\r\n\t\r\n\t<input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t\t ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/KindEditor.js\"></script>\r\n            ";
echo "<s";
echo "cript type=\"text/javascript\">\r\n            var editor = new KindEditor(\"editor\");\r\n            editor.hiddenName = \"body\";\r\n            editor.editorWidth = \"780px\";\r\n            editor.editorHeight = \"250px\";\r\n            editor.skinPath = \"../../kedit/skins/default/\";\r\n\t\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\t\teditor.imageAttachPath=\"diy/pics/\";\r\n            editor.iconPath";
echo " = \"../../kedit/icons/\";\r\n            editor.show();\r\n            function KindSubmit() {\r\n\t          editor.data();\r\n            }\r\n             </script>\r\n              <input type=\"hidden\" name=\"step\" value=\"2\" />\r\n              <input type=\"hidden\" name=\"nowplusid\" value=\"";
echo $nowplusid;
echo "\" />\r\n              <br />\r\n              ";
echo "<s";
echo "pan class=\"adminsubmit\">\r\n              <input type=\"submit\" name=\"submit\"  onclick=\"KindSubmit();\" value=\"";
echo $strSubmit;
echo "\" class=\"button\"  />\r\n              <input name=\"updatemode\" type=\"checkbox\" id=\"updatemode\" value=\"all\" checked=\"checked\" />\r\n      ";
echo $strDiyBottomEdit2;
echo " </span>            \r\n\t</form>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

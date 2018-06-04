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
include( "func/plus.inc.php" );
needauth( 5 );
$plustype = $_REQUEST['plustype'];
$pluslocat = $_REQUEST['pluslocat'];
$pluslable = $_REQUEST['pluslable'];
$step = $_REQUEST['step'];
$modno = $_REQUEST['modno'];
if ( !isset( $modno ) || $modno == "" )
{
				$modno = 1;
}
if ( $step == "add" )
{
				trylimit( "_base_plus", 800, "id" );
				$display = plusvalnone( $_POST['display'] );
				$showborder = $_POST['showborders'];
				$catid = $_POST['catid'];
				$plusname = $_POST['plusname'];
				$coltype = $_POST['coltype'];
				$width = $_POST['width'];
				$height = $_POST['height'];
				$top = $_POST['top'];
				$left = $_POST['left'];
				$zindex = $_POST['zindex'];
				$padding = $_POST['padding'];
				$tempname = $_POST['tempname'];
				$tempcolor = $_POST['tempcolor'];
				$title = htmlspecialchars( $_POST['title'] );
				$cutbody = $_POST['cutbody'];
				$shownums = $_POST['shownums'];
				$ord = $_POST['ord'];
				$sc = $_POST['sc'];
				$showtj = $_POST['showtj'];
				$cutword = $_POST['cutword'];
				$target = $_POST['target'];
				$body = $_POST['body'];
				$code = $_POST['code'];
				$movi = htmlspecialchars( $_POST['movi'] );
				$text = htmlspecialchars( $_POST['text'] );
				$link = htmlspecialchars( $_POST['link'] );
				$piclink = htmlspecialchars( $_POST['piclink'] );
				$word = htmlspecialchars( $_POST['word'] );
				$word1 = htmlspecialchars( $_POST['word1'] );
				$word2 = htmlspecialchars( $_POST['word2'] );
				$word3 = htmlspecialchars( $_POST['word3'] );
				$word4 = htmlspecialchars( $_POST['word4'] );
				$text1 = htmlspecialchars( $_POST['text1'] );
				$link1 = htmlspecialchars( $_POST['link1'] );
				$link2 = htmlspecialchars( $_POST['link2'] );
				$link3 = htmlspecialchars( $_POST['link3'] );
				$link4 = htmlspecialchars( $_POST['link4'] );
				$tags = htmlspecialchars( $_POST['tags'] );
				$sourceurl = htmlspecialchars( $_POST['sourceurl'] );
				$borderlable = htmlspecialchars( $_POST['borderlable'] );
				$borderroll = $_POST['borderroll'];
				$picw = $_POST['picw'];
				$pich = $_POST['pich'];
				$fittype = $_POST['fittype'];
				$groupid = $_POST['groupid'];
				$projid = $_POST['projid'];
				$overflow = $_POST['overflow'];
				$bodyzone = $_POST['bodyzone'];
				$bordercolor = $_POST['bordercolor'];
				$backgroundcolor = $_POST['backgroundcolor'];
				$borderwidth = $_POST['borderwidth'];
				$borderstyle = $_POST['borderstyle'];
				$showbar = $_POST['showbar'];
				$barbg = $_POST['barbg'];
				$barcolor = $_POST['barcolor'];
				$morelink = htmlspecialchars( $_POST['morelink'] );
				$body = url2path( $body );
				$uppic = $_FILES['jpg'];
				$upatt = $_FILES['att'];
				if ( 0 < $uppic['size'] )
				{
								$nowdate = date( "Ymd", time( ) );
								$picpath = "../../diy/pics/".$nowdate;
								@mkdir( @$picpath, 511 );
								$uppath = "diy/pics/".$nowdate;
								$arr = newuploadimage( $uppic['tmp_name'], $uppic['type'], $uppic['size'], $uppath );
								$pic = $arr[3];
								$oldsrc = plusvalsel( $_POST['pic'] );
								if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && $oldsrc != "0" && !strstr( $oldsrc, "../" ) && !strstr( $oldsrc, "http://" ) )
								{
												@unlink( @ROOTPATH.@$oldsrc );
								}
				}
				else
				{
								$pic = $_POST['pic'];
				}
				if ( 0 < $upatt['size'] )
				{
								$nowdate = date( "Ymd", time( ) );
								$attpath = "../../diy/attach/".$nowdate;
								@mkdir( @$attpath, 511 );
								$uppath = "diy/attach/".$nowdate;
								$arr = newuploadfile( $upatt['tmp_name'], $upatt['type'], $upatt['name'], $upatt['size'], $uppath );
								$attach = $arr[3];
								$oldsrc = plusvalsel( $_POST['attach'] );
								if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && $oldsrc != "0" && !strstr( $oldsrc, "../" ) && !strstr( $oldsrc, "http://" ) )
								{
												@unlink( @ROOTPATH.@$oldsrc );
								}
				}
				else
				{
								$attach = $_POST['attach'];
				}
				if ( !isset( $_POST['setglobal'] ) || $_POST['setglobal'] == "" || $_POST['setglobal'] == "0" )
				{
								$fsql->query( "insert into {P}_base_plus set \r\n\t`coltype`='{$coltype}',\r\n\t`plusname`='{$plusname}',\r\n\t`display`='{$display}',\r\n\t`pluslable`='{$pluslable}',\r\n\t`pluslocat`='{$pluslocat}',\r\n\t`plustype`='{$plustype}',\r\n\t`tempname`='{$tempname}',\r\n\t`tempcolor`='{$tempcolor}',\r\n\t`title`='{$title}',\r\n\t`showborder`='{$showborder}',\r\n\t`bordercolor`='{$bordercolor}',\r\n\t`backgroundcolor`='{$backgroundcolor}',\r\n\t`borderwidth`='{$borderwidth}',\r\n\t`borderstyle`='{$borderstyle}',\r\n\t`borderlable`='{$borderlable}',\r\n\t`borderroll`='{$borderroll}',\r\n\t`showbar`='{$showbar}',\r\n\t`barbg`='{$barbg}',\r\n\t`barcolor`='{$barcolor}',\r\n\t`morelink`='{$morelink}',\r\n\t`width`='{$width}',\r\n\t`height`='{$height}',\r\n\t`top`='{$top}',\r\n\t`left`='{$left}',\r\n\t`zindex`='{$zindex}',\r\n\t`padding`='{$padding}',\r\n\t`cutbody`='{$cutbody}',\r\n\t`picw`='{$picw}',\r\n\t`pich`='{$pich}',\r\n\t`fittype`='{$fittype}',\r\n\t`shownums`='{$shownums}',\r\n\t`ord`='{$ord}',\r\n\t`sc`='{$sc}',\r\n\t`showtj`='{$showtj}',\r\n\t`cutword`='{$cutword}',\r\n\t`target`='{$target}',\r\n\t`catid`='{$catid}',\r\n\t`body`='{$body}',\r\n\t`pic`='{$pic}',\r\n\t`attach`='{$attach}',\r\n\t`movi`='{$movi}',\r\n\t`sourceurl`='{$sourceurl}',\r\n\t`text`='{$text}',\r\n\t`link`='{$link}',\r\n\t`piclink`='{$piclink}',\r\n\t`word`='{$word}',\r\n\t`word1`='{$word1}',\r\n\t`word2`='{$word2}',\r\n\t`word3`='{$word3}',\r\n\t`word4`='{$word4}',\r\n\t`text1`='{$text1}',\r\n\t`code`='{$code}',\r\n\t`link1`='{$link1}',\r\n\t`link2`='{$link2}',\r\n\t`link3`='{$link3}',\r\n\t`link4`='{$link4}',\r\n\t`tags`='{$tags}',\r\n\t`groupid`='{$groupid}',\r\n\t`projid`='{$projid}',\r\n\t`overflow`='{$overflow}',\r\n\t`bodyzone`='{$bodyzone}',\r\n\t`modno`='{$modno}'\r\n\r\n\r\n\t" );
								$plusid = $fsql->instid( );
				}
				if ( $_POST['setglobal'] == "1" )
				{
								$msql->query( "delete from {P}_base_plus where pluslable='{$pluslable}'" );
								$msql->query( "select * from {P}_base_pageset" );
								while ( $msql->next_record( ) )
								{
												$plustype = $msql->f( "coltype" );
												$pluslocat = $msql->f( "pagename" );
												$fsql->query( "insert into {P}_base_plus set \r\n\t\t`coltype`='{$coltype}',\r\n\t\t`plusname`='{$plusname}',\r\n\t\t`display`='{$display}',\r\n\t\t`pluslable`='{$pluslable}',\r\n\t\t`pluslocat`='{$pluslocat}',\r\n\t\t`plustype`='{$plustype}',\r\n\t\t`tempname`='{$tempname}',\r\n\t\t`tempcolor`='{$tempcolor}',\r\n\t\t`title`='{$title}',\r\n\t\t`showborder`='{$showborder}',\r\n\t\t`bordercolor`='{$bordercolor}',\r\n\t\t`backgroundcolor`='{$backgroundcolor}',\r\n\t\t`borderwidth`='{$borderwidth}',\r\n\t\t`borderstyle`='{$borderstyle}',\r\n\t\t`borderlable`='{$borderlable}',\r\n\t\t`borderroll`='{$borderroll}',\r\n\t\t`showbar`='{$showbar}',\r\n\t\t`barbg`='{$barbg}',\r\n\t\t`barcolor`='{$barcolor}',\r\n\t\t`morelink`='{$morelink}',\r\n\t\t`width`='{$width}',\r\n\t\t`height`='{$height}',\r\n\t\t`top`='{$top}',\r\n\t\t`left`='{$left}',\r\n\t\t`zindex`='{$zindex}',\r\n\t\t`padding`='{$padding}',\r\n\t\t`cutbody`='{$cutbody}',\r\n\t\t`picw`='{$picw}',\r\n\t\t`pich`='{$pich}',\r\n\t\t`fittype`='{$fittype}',\r\n\t\t`shownums`='{$shownums}',\r\n\t\t`ord`='{$ord}',\r\n\t\t`sc`='{$sc}',\r\n\t\t`showtj`='{$showtj}',\r\n\t\t`cutword`='{$cutword}',\r\n\t\t`target`='{$target}',\r\n\t\t`catid`='{$catid}',\r\n\t\t`body`='{$body}',\r\n\t\t`pic`='{$pic}',\r\n\t\t`attach`='{$attach}',\r\n\t\t`movi`='{$movi}',\r\n\t\t`sourceurl`='{$sourceurl}',\r\n\t\t`text`='{$text}',\r\n\t\t`link`='{$link}',\r\n\t\t`piclink`='{$piclink}',\r\n\t\t`word`='{$word}',\r\n\t\t`word1`='{$word1}',\r\n\t\t`word2`='{$word2}',\r\n\t\t`word3`='{$word3}',\r\n\t\t`word4`='{$word4}',\r\n\t\t`text1`='{$text1}',\r\n\t\t`code`='{$code}',\r\n\t\t`link1`='{$link1}',\r\n\t\t`link2`='{$link2}',\r\n\t\t`link3`='{$link3}',\r\n\t\t`link4`='{$link4}',\r\n\t\t`tags`='{$tags}',\r\n\t\t`groupid`='{$groupid}',\r\n\t\t`projid`='{$projid}',\r\n\t\t`overflow`='{$overflow}',\r\n\t\t`bodyzone`='{$bodyzone}',\r\n\t\t`modno`='{$modno}'\r\n\t\t" );
												if ( $plustype == $_REQUEST['plustype'] && $pluslocat == $_REQUEST['pluslocat'] )
												{
																$plusid = $fsql->instid( );
												}
								}
				}
				if ( $_POST['ifrefresh'] == "1" )
				{
								echo "<script>parent.location.reload()</script>";
								exit( );
				}
				else
				{
								echo "<script>parent.\$().plusAddBack('pdv_".$plusid."','".$bodyzone."');parent.\$.unblockUI()</script>";
								exit( );
				}
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/plus.js\"></script>\r\n</head>\r\n\r\n<body >\r\n\r\n";
$msql->query( "select * from {P}_base_plusdefault where  pluslable='{$pluslable}'" );
if ( $msql->next_record( ) )
{
				$set_plusname = $msql->f( "plusname" );
				$set_tempname = $msql->f( "tempname" );
				$set_tempcolor = $msql->f( "tempcolor" );
				$set_showborder = $msql->f( "showborder" );
				$set_width = $msql->f( "width" );
				$set_height = $msql->f( "height" );
				$set_top = $msql->f( "top" );
				$set_left = $msql->f( "left" );
				$set_zindex = $msql->f( "zindex" );
				$set_padding = $msql->f( "padding" );
				$set_shownums = $msql->f( "shownums" );
				$set_ord = $msql->f( "ord" );
				$set_sc = $msql->f( "sc" );
				$set_showtj = $msql->f( "showtj" );
				$set_cutword = $msql->f( "cutword" );
				$set_target = $msql->f( "target" );
				$set_catid = $msql->f( "catid" );
				$set_cutbody = $msql->f( "cutbody" );
				$set_picw = $msql->f( "picw" );
				$set_pich = $msql->f( "pich" );
				$set_fittype = $msql->f( "fittype" );
				$set_title = $msql->f( "title" );
				$set_body = $msql->f( "body" );
				$set_pic = $msql->f( "pic" );
				$set_attach = $msql->f( "attach" );
				$set_movi = $msql->f( "movi" );
				$set_text = $msql->f( "text" );
				$set_link = $msql->f( "link" );
				$set_piclink = $msql->f( "piclink" );
				$set_word = $msql->f( "word" );
				$set_word1 = $msql->f( "word1" );
				$set_word2 = $msql->f( "word2" );
				$set_word3 = $msql->f( "word3" );
				$set_word4 = $msql->f( "word4" );
				$set_text1 = $msql->f( "text1" );
				$set_code = $msql->f( "code" );
				$set_link1 = $msql->f( "link1" );
				$set_link2 = $msql->f( "link2" );
				$set_link3 = $msql->f( "link3" );
				$set_link4 = $msql->f( "link4" );
				$set_tags = $msql->f( "tags" );
				$set_sourceurl = $msql->f( "sourceurl" );
				$set_groupid = $msql->f( "groupid" );
				$set_projid = $msql->f( "projid" );
				$set_setglobal = $msql->f( "setglobal" );
				$set_display = $msql->f( "display" );
				$set_overflow = $msql->f( "overflow" );
				$set_bodyzone = $msql->f( "bodyzone" );
				$set_bordercolor = $msql->f( "bordercolor" );
				$set_backgroundcolor = $msql->f( "backgroundcolor" );
				$set_borderwidth = $msql->f( "borderwidth" );
				$set_borderstyle = $msql->f( "borderstyle" );
				$set_borderlable = $msql->f( "borderlable" );
				$set_borderroll = $msql->f( "borderroll" );
				$set_showbar = $msql->f( "showbar" );
				$set_barbg = $msql->f( "barbg" );
				$set_barcolor = $msql->f( "barcolor" );
				$set_morelink = $msql->f( "morelink" );
				$classtbl = $msql->f( "classtbl" );
				$grouptbl = $msql->f( "grouptbl" );
				$projtbl = $msql->f( "projtbl" );
				$ifrefresh = $msql->f( "ifrefresh" );
				$coltype = $msql->f( "coltype" );
}
$plusname = $set_plusname;
$tempname = $set_tempname;
$tempcolor = $set_tempcolor;
$title = $set_title;
$shownums = $set_shownums;
$ord = $set_ord;
$sc = $set_sc;
$showtj = $set_showtj;
$showborder = $set_showborder;
$width = $set_width;
$height = $set_height;
$top = $set_top;
$left = $set_left;
$zindex = $set_zindex;
$padding = $set_padding;
$cutbody = $set_cutbody;
$picw = $set_picw;
$pich = $set_pich;
$fittype = $set_fittype;
$cutword = $set_cutword;
$target = $set_target;
$catid = $set_catid;
$body = $set_body;
$pic = $set_pic;
$attach = $set_attach;
$text = $set_text;
$movi = $set_movi;
$link = $set_link;
$sourceurl = $set_sourceurl;
$piclink = $set_piclink;
$word = $set_word;
$word1 = $set_word1;
$word2 = $set_word2;
$word3 = $set_word3;
$word4 = $set_word4;
$text1 = $set_text1;
$code = $set_code;
$link1 = $set_link1;
$link2 = $set_link2;
$link3 = $set_link3;
$link4 = $set_link4;
$tags = $set_tags;
$groupid = $set_groupid;
$projid = $set_projid;
$display = $set_display;
$overflow = $set_overflow;
$bodyzone = $set_bodyzone;
$bordercolor = $set_bordercolor;
$backgroundcolor = $set_backgroundcolor;
$borderwidth = $set_borderwidth;
$borderstyle = $set_borderstyle;
$borderlable = $set_borderlable;
$borderroll = $set_borderroll;
$showbar = $set_showbar;
$barbg = $set_barbg;
$barcolor = $set_barcolor;
$morelink = $set_morelink;
$body = htmlspecialchars( $body );
echo " \r\n\r\n<form action=\"plusadd.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"form\" style=\"margin:0px\">\r\n\r\n\r\n<div class=\"scrollex\">\r\n\r\n<div class=\"adminnav\" >\r\n<div style=\"float:right;display:inline;color:#666;font:12px/18px Arial\">";
echo $strPlusLable." - ".$pluslable;
echo "</div>\r\n\r\n";
$msql->query( "select * from {P}_base_pageset where coltype='{$plustype}' and  pagename='{$pluslocat}'" );
if ( $msql->next_record( ) )
{
				$pagename = $msql->f( "name" );
}
echo $strPlusSetup." &gt; ".$pagename." &gt; ".$set_plusname;
echo "\r\n\r\n</div>\r\n<div class=\"scrollzone\">\r\n\r\n<div id=\"setborder\" class=\"pluszone\">";
echo $strPlusZone2;
echo "</div>\r\n\t<div id=\"s_setborder\"  class=\"pluszonex\">\r\n\r\n<div class=\"setupborder\">\r\n\t\t<div class=\"bordersettype\">\r\n\t\t<input name=\"usetemp\" type=\"checkbox\" id=\"usetemp\" value=\"1\" />\r\n\t\t";
echo $strBorderType1;
echo " &nbsp;\r\n\t\t<input name=\"usediy\" type=\"checkbox\" id=\"usediy\" value=\"1\" />\r\n\t\t";
echo $strBorderType2;
echo "\t\t&nbsp; &nbsp;";
echo "<s";
echo "pan id=\"hiddenpborder\">";
echo $strPlusBarHidden;
echo "</span>\r\n\t  </div>\r\n\t\r\n\t<div id=\"bordtempzone\" class=\"bordtempzone\"></div>\r\n\t\r\n\t\r\n    <table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" id=\"diyborder\">\r\n            <tr > \r\n              <td width=\"70\">";
echo $strPlusBP;
echo "</td>\r\n              <td width=\"70\" >\r\n\t\t\t  ";
echo "<s";
echo "elect name=\"borderwidth\" id=\"borderwidth\" >\r\n\t\t\t <option value=\"0\" ";
echo seld( $borderwidth, "0" );
echo ">0px</option>\r\n\t\t\t <option value=\"1\" ";
echo seld( $borderwidth, "1" );
echo ">1px</option>\r\n\t\t\t <option value=\"2\" ";
echo seld( $borderwidth, "2" );
echo ">2px</option>\r\n\t\t\t <option value=\"3\" ";
echo seld( $borderwidth, "3" );
echo ">3px</option>\r\n\t\t\t <option value=\"4\" ";
echo seld( $borderwidth, "4" );
echo ">4px</option>\r\n\t\t\t <option value=\"5\" ";
echo seld( $borderwidth, "5" );
echo ">5px</option>\r\n\t\t\t <option value=\"6\" ";
echo seld( $borderwidth, "6" );
echo ">6px</option>\r\n\t\t\t <option value=\"7\" ";
echo seld( $borderwidth, "7" );
echo ">7px</option>\r\n\t\t\t <option value=\"8\" ";
echo seld( $borderwidth, "8" );
echo ">8px</option>\r\n\t\t\t <option value=\"9\" ";
echo seld( $borderwidth, "9" );
echo ">9px</option>\r\n\t\t\t <option value=\"10\" ";
echo seld( $borderwidth, "10" );
echo ">10px</option>\r\n\t\t</select>\r\n\t\t</td>\r\n            <td width=\"70\" >";
echo $strPlusBorderColor;
echo "</td>\r\n              <td width=\"60\" ><input  type=\"text\" id=\"bordercolor\" class=\"selcolor\" style=\"background:";
echo $bordercolor;
echo "\" name=\"bordercolor\" size=\"7\"   maxlength=\"7\" value=\"";
echo $bordercolor;
echo "\" /></td>\r\n            </tr>\r\n            <tr >\r\n              <td width=\"70\">";
echo $strPlusBorderStyle;
echo "</td>\r\n              <td width=\"70\" >\r\n\t\t\t  \t";
echo "<s";
echo "elect name=\"borderstyle\" id=\"borderstyle\" >\r\n                  <option value=\"solid\" ";
echo seld( $borderstyle, "solid" );
echo ">";
echo $strPlusBs1;
echo "</option>\r\n                  <option value=\"dashed\" ";
echo seld( $borderstyle, "dashed" );
echo ">";
echo $strPlusBs2;
echo "</option>\r\n                  <option value=\"dotted\" ";
echo seld( $borderstyle, "dotted" );
echo ">";
echo $strPlusBs3;
echo "</option>\r\n                  <option value=\"double\" ";
echo seld( $borderstyle, "double" );
echo ">";
echo $strPlusBs4;
echo "</option>\r\n                </select></td>\r\n              <td width=\"70\" >";
echo $strPlusBG;
echo "</td>\r\n              <td width=\"60\" ><input id=\"backgroundcolor\" class=\"selcolor\" name=\"backgroundcolor\"  style=\"background:";
echo $backgroundcolor;
echo "\" type=\"text\" value=\"";
echo $backgroundcolor;
echo "\" size=\"7\"  maxlength=\"7\" /></td>\r\n            </tr>\r\n            <tr >\r\n              <td width=\"70\">";
echo $strPlusBar;
echo "</td>\r\n              <td width=\"70\" >";
echo "<s";
echo "elect name=\"showbar\" id=\"showbar\" >\r\n                <option value=\"block\" ";
echo seld( $showbar, "block" );
echo ">";
echo $strShow;
echo "</option>\r\n                <option value=\"none\" ";
echo seld( $showbar, "none" );
echo ">";
echo $strHidden;
echo "</option>\r\n              </select></td>\r\n              <td width=\"70\" >";
echo $strPlusBarGg;
echo "</td>\r\n              <td width=\"60\" ><input  id=\"barbg\" class=\"selcolor\" style=\"background:";
echo $barbg;
echo "\" type=\"text\" name=\"barbg\" size=\"7\"  maxlength=\"7\" value=\"";
echo $barbg;
echo "\" /></td>\r\n            </tr>\r\n            <tr >\r\n              <td width=\"70\">&nbsp;</td>\r\n              <td width=\"70\" >&nbsp;</td>\r\n              <td width=\"70\" >";
echo $strPlusBarColor;
echo "</td>\r\n              <td width=\"60\" ><input  id=\"barcolor\" class=\"selcolor\" style=\"background:";
echo $barcolor;
echo "\" type=\"text\" name=\"barcolor\" size=\"7\"  maxlength=\"7\" value=\"";
echo $barcolor;
echo "\" /></td>\r\n            </tr>\r\n\t\t</table>\r\n\t\t\r\n\t\t<div id=\"bordertempcoloropt\" class=\"bordertempcoloropt\">\r\n\t<li id=\"btsel_A\" class=\"tempcoloropt\" style=\"background:#2266aa\"></li>\r\n\t<li id=\"btsel_B\" class=\"tempcoloropt\" style=\"background:#0099cc\"></li>\r\n\t<li id=\"btsel_C\" class=\"tempcoloropt\" style=\"background:#20b747\"></li>\r\n\t<li id=\"btsel_D\" class=\"tempcoloropt\" style=\"background:#009999\"></li>\r\n\t<li id=\"btsel_";
echo "E\" class=\"tempcoloropt\" style=\"background:#bbbbbb\"></li>\r\n\t<li id=\"btsel_F\" class=\"tempcoloropt\" style=\"background:#666666\"></li>\r\n\t<li id=\"btsel_G\" class=\"tempcoloropt\" style=\"background:#ff6600\"></li>\r\n\t<li id=\"btsel_H\" class=\"tempcoloropt\" style=\"background:#ff9900\"></li>\r\n\t<li id=\"btsel_I\" class=\"tempcoloropt\" style=\"background:#ffcc00\"></li>\r\n\t<li id=\"btsel_J\" class=\"tempcoloropt\" style=\"background:#88";
echo "6640\"></li>\r\n\t<li id=\"btsel_K\" class=\"tempcoloropt\" style=\"background:#EE0000\"></li>\r\n\t<li id=\"btsel_L\" class=\"tempcoloropt\" style=\"background:#ff77cc\"></li>\r\n\t<li id=\"btsel_M\" class=\"tempcoloropt\" style=\"background:#E10055\"></li>\r\n\t<li id=\"btsel_N\" class=\"tempcoloropt\" style=\"background:#446d8c\"></li>\r\n\t<li id=\"btsel_O\" class=\"tempcoloropt\" style=\"background:#c677ee\"></li>\r\n\t<li id=\"btsel_P\" class=\"tempcolor";
echo "opt\" style=\"background:#92c300\"></li>\r\n\t</div>\r\n\t\r\n\t\t<div id=\"colorSelector\"></div>\r\n\t\t<div id=\"borderlablezone\">\r\n\t\t";
echo $strPlusLableNo;
echo "\t\t<input name=\"borderlable\"  type=\"text\" class=\"input\" id=\"borderlable\" style=\"width:150px\"  value=\"";
echo $borderlable;
echo "\" maxlength=\"150\" />\r\n\t\t";
echo "<s";
echo "elect name=\"borderroll\" id=\"borderroll\" >\r\n                   <option value=\"click\" ";
echo seld( $borderroll, "click" );
echo ">";
echo $strPlusLablerolll;
echo "</option>\r\n                   <option value=\"over\"  ";
echo seld( $borderroll, "over" );
echo ">";
echo $strPlusLableroll2;
echo "</option>\r\n\t\t\t\t   <option value=\"auto\"  ";
echo seld( $borderroll, "auto" );
echo ">";
echo $strPlusLableroll3;
echo "</option>\r\n         </select>\r\n\t\t</div>\r\n\t\t\t\r\n\t</div>\r\n\t\t<div class=\"previewout\">\r\n\t\t<div id=\"previewborder\" class=\"previewborder\"></div>\r\n\t\t</div>\r\n\t    <input  type=\"hidden\" id=\"showborders\" name=\"showborders\" value=\"";
echo $showborder;
echo "\" />\r\n\t\t<input  type=\"hidden\" id=\"seledbordertemp\" name=\"seledbordertemp\" value=\"";
echo $showborder;
echo "\" />\r\n\t\t\t\t\r\n\t</div>\r\n\t\r\n\t<div id=\"settemplate\" class=\"pluszone\">";
echo $strPlusZone1;
echo "</div>\r\n\t<div id=\"s_settemplate\"  class=\"pluszonex\">\r\n\t<div class=\"setupplustemp\">\r\n\t\t<div id=\"plustempzone\" class=\"plustempzone\"></div>\r\n\t</div>\r\n\t\t\r\n\t\t<div id=\"plustempcoloropt\" class=\"plustempcoloropt\">\r\n\t\t<li id=\"ptsel_A\" class=\"ptempcoloropt\" style=\"background:#2266aa\"></li>\r\n\t\t<li id=\"ptsel_B\" class=\"ptempcoloropt\" style=\"background:#0099cc\"></li>\r\n\t\t<li id=\"ptsel_C\" class=\"ptempcoloropt\" style=\"backgro";
echo "und:#20b747\"></li>\r\n\t\t<li id=\"ptsel_D\" class=\"ptempcoloropt\" style=\"background:#009999\"></li>\r\n\t\t<li id=\"ptsel_E\" class=\"ptempcoloropt\" style=\"background:#bbbbbb\"></li>\r\n\t\t<li id=\"ptsel_F\" class=\"ptempcoloropt\" style=\"background:#666666\"></li>\r\n\t\t<li id=\"ptsel_G\" class=\"ptempcoloropt\" style=\"background:#ff6600\"></li>\r\n\t\t<li id=\"ptsel_H\" class=\"ptempcoloropt\" style=\"background:#ff9900\"></li>\r\n\t\t<li id=\"ptsel_I";
echo "\" class=\"ptempcoloropt\" style=\"background:#ffcc00\"></li>\r\n\t\t<li id=\"ptsel_J\" class=\"ptempcoloropt\" style=\"background:#886640\"></li>\r\n\t\t<li id=\"ptsel_K\" class=\"ptempcoloropt\" style=\"background:#EE0000\"></li>\r\n\t\t<li id=\"ptsel_L\" class=\"ptempcoloropt\" style=\"background:#ff77cc\"></li>\r\n\t\t<li id=\"ptsel_M\" class=\"ptempcoloropt\" style=\"background:#E10055\"></li>\r\n\t\t<li id=\"ptsel_N\" class=\"ptempcoloropt\" style=\"back";
echo "ground:#446d8c\"></li>\r\n\t\t<li id=\"ptsel_O\" class=\"ptempcoloropt\" style=\"background:#c677ee\"></li>\r\n\t\t<li id=\"ptsel_P\" class=\"ptempcoloropt\" style=\"background:#92c300\"></li>\r\n\t\t</div>\r\n\t\r\n\t\r\n\t\r\n\t\t\t<input type=\"hidden\" id=\"tempname\" name=\"tempname\"  value=\"";
echo $tempname;
echo "\" class=\"input\" />\r\n\t\t\t<input type=\"hidden\" id=\"set_tempname\" name=\"stn\" value=\"";
echo $set_tempname;
echo "\" />\r\n            <input type=\"hidden\" id=\"tempcolor\" name=\"tempcolor\"  value=\"";
echo $tempcolor;
echo "\" class=\"input\" />\r\n\r\n\t\r\n\t</div>\r\n\t\r\n\t\r\n\t\r\n\t<div id=\"setcanshu\" class=\"pluszone\">";
echo $strPlusZone3;
echo "</div>\r\n\t<div id=\"s_setcanshu\"  class=\"pluszonex\">\r\n\t\r\n\t\t<table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\r\n\t\t\t\r\n\t\t\t <tr >\r\n                 <td>";
echo $strPlusTitle;
echo "</td>\r\n                 <td ><input type=\"text\" id=\"coltitle\"  name=\"title\" size=\"30\"  maxlength=\"30\" value=\"";
echo $title;
echo "\" class=\"input\" /></td>\r\n\t\t       </tr>\r\n\t\t\t   <tr ";
echo plustrdis( $set_morelink );
echo ">\r\n                 <td>";
echo $strPlusMoreLink;
echo "</td>\r\n                 <td ><input type=\"text\" name=\"morelink\" size=\"39\" value=\"";
echo $morelink;
echo "\" class=\"input\" /></td>\r\n\t\t       </tr>\r\n            <tr >\r\n              <td>";
echo $strPlusPadding;
echo "</td>\r\n              <td >";
echo "<s";
echo "elect name=\"padding\" id=\"padding\" >\r\n                <option value=\"0\" ";
echo seld( $padding, "0" );
echo ">0px</option>\r\n                <option value=\"1\"  ";
echo seld( $padding, "1" );
echo ">1px</option>\r\n                <option value=\"2\"  ";
echo seld( $padding, "2" );
echo ">2px</option>\r\n                <option value=\"3\"  ";
echo seld( $padding, "3" );
echo ">3px</option>\r\n                <option value=\"4\"  ";
echo seld( $padding, "4" );
echo ">4px</option>\r\n                <option value=\"5\"  ";
echo seld( $padding, "5" );
echo ">5px</option>\r\n                <option value=\"6\"  ";
echo seld( $padding, "6" );
echo ">6px</option>\r\n                <option value=\"7\"  ";
echo seld( $padding, "7" );
echo ">7px</option>\r\n                <option value=\"8\"  ";
echo seld( $padding, "8" );
echo ">8px</option>\r\n                <option value=\"9\"  ";
echo seld( $padding, "9" );
echo ">9px</option>\r\n                <option value=\"10\"  ";
echo seld( $padding, "10" );
echo ">10px</option>\r\n                <option value=\"12\"  ";
echo seld( $padding, "12" );
echo ">12px</option>\r\n                <option value=\"15\"  ";
echo seld( $padding, "15" );
echo ">15px</option>\r\n                <option value=\"20\"  ";
echo seld( $padding, "20" );
echo ">20px</option>\r\n                <option value=\"25\"  ";
echo seld( $padding, "25" );
echo ">25px</option>\r\n                <option value=\"30\"  ";
echo seld( $padding, "30" );
echo ">30px</option>\r\n                <option value=\"35\"  ";
echo seld( $padding, "35" );
echo ">35px</option>\r\n                <option value=\"50\"  ";
echo seld( $padding, "50" );
echo ">50px</option>\r\n              </select></td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t<tr >\r\n\t\t\t   <td>";
echo $strPlusFlow;
echo "</td>\r\n\t\t\t   <td >";
echo "<s";
echo "elect name=\"overflow\" id=\"overflow\"  style=\"\">\r\n                   <option value=\"hidden\" ";
echo seld( $overflow, "hidden" );
echo ">";
echo $strPlusFlow1;
echo "</option>\r\n                   <option value=\"visible\"  ";
echo seld( $overflow, "visible" );
echo ">";
echo $strPlusFlow2;
echo "</option>\r\n                 </select>\r\n\t           </td>\r\n\t\t\t </tr>\r\n\r\n\t\t\t<tr  ";
echo plustrdis( $set_showtj );
echo ">\r\n\t\t\t  <td>";
echo $strPlusShowTj;
echo "</td>\r\n\t\t\t  <td >\r\n\t\t\t  ";
echo "<s";
echo "elect name=\"showtj\" >\r\n                <option value=\"0\" ";
echo seld( $showtj, "0" );
echo ">";
echo $strPlusShowTj0;
echo "</option>\r\n                <option value=\"1\" ";
echo seld( $showtj, "1" );
echo ">";
echo $strPlusShowTj1;
echo "</option>\r\n              </select>\r\n\t\t\t  </td>\r\n\t\t  </tr>\r\n\t\t  <tr  ";
echo plustrdis( $set_ord );
echo ">\r\n\t\t\t  <td>";
echo $strPlusord;
echo "</td>\r\n\t\t\t  <td >\r\n\t\t\t  ";
echo "<s";
echo "elect name=\"ord\" >\r\n\t\t\t  \t ";
if ( strstr( $set_ord, "|" ) )
{
				$ordArr = explode( "|", $set_ord );
				$r = 0;
				for ( ;	$r < sizeof( $ordArr );	$r++	)
				{
								echo "<option value='".$ordArr[$r]."'>".$ordArr[$r]."</option>";
				}
}
else
{
				echo "<option value='id'>id</option>";
}
echo "              </select>\r\n\t\t\t  </td>\r\n\t\t  </tr>\r\n\t\t  <tr  ";
echo plustrdis( $set_sc );
echo ">\r\n\t\t\t  <td>";
echo $strPlussc;
echo "</td>\r\n\t\t\t  <td >\r\n\t\t\t  ";
echo "<s";
echo "elect name=\"sc\" >\r\n                <option value=\"desc\" ";
echo seld( $sc, "desc" );
echo ">";
echo $strPlussc1;
echo "</option>\r\n\t\t\t\t <option value=\"asc\" ";
echo seld( $sc, "asc" );
echo ">";
echo $strPlussc2;
echo "</option>\r\n              </select>\r\n\t\t\t  </td>\r\n\t\t  </tr>\r\n\t\t\t<tr  ";
echo plustrdis( $set_shownums );
echo "> \r\n              <td width=\"90\">";
echo $strPlusshownums;
echo "</td>\r\n              <td > \r\n                \r\n                <input  type=\"text\" name=\"shownums\" size=\"3\"  maxlength=\"3\" value=\"";
echo $shownums;
echo "\" class=\"input\" />\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_picw );
echo "> \r\n              <td width=\"90\">";
echo $strPlusPicW;
echo "</td>\r\n              <td > \r\n                \r\n                <input  type=\"text\" name=\"picw\" size=\"3\"  maxlength=\"3\" value=\"";
echo $picw;
echo "\">\r\n                PX\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_pich );
echo "> \r\n              <td width=\"90\">";
echo $strPlusPicH;
echo "</td>\r\n              <td > \r\n                \r\n                <input  type=\"text\" name=\"pich\" size=\"3\"  maxlength=\"3\" value=\"";
echo $pich;
echo "\">\r\n                PX\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_fittype );
echo "> \r\n              <td width=\"90\">";
echo $strPlusFitType;
echo "</td>\r\n              <td > \r\n                \r\n               ";
echo "<s";
echo "elect name=\"fittype\" >\r\n                  <option value=\"fill\" ";
echo seld( $fittype, "fill" );
echo ">";
echo $strPlusFitType1;
echo "</option>\r\n                  <option value=\"auto\" ";
echo seld( $fittype, "auto" );
echo ">";
echo $strPlusFitType2;
echo "</option>\r\n\t\t\t\t  <option value=\"exp\" ";
echo seld( $fittype, "exp" );
echo ">";
echo $strPlusFitType3;
echo "</option>\r\n                </select> &nbsp; ";
echo $strPlusFitNtc;
echo "              </td>\r\n            </tr>\r\n            \r\n           \r\n           \r\n            <tr  ";
echo plustrdis( $set_cutword );
echo "> \r\n              <td width=\"90\">";
echo $strPluscutword;
echo "</td>\r\n              <td > \r\n                \r\n                <input type=\"text\" name=\"cutword\" size=\"3\"  maxlength=\"3\" value=\"";
echo $cutword;
echo "\" class=\"input\" /> \r\n              </td>\r\n            </tr>\r\n\t\t\t <tr  ";
echo plustrdis( $set_cutbody );
echo "> \r\n              <td width=\"90\">";
echo $strPlusCutBody;
echo "</td>\r\n              <td > \r\n                \r\n                <input type=\"text\" name=\"cutbody\" size=\"3\"  maxlength=\"3\" value=\"";
echo $cutbody;
echo "\" class=\"input\" /> \r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_tags );
echo "> \r\n              <td width=\"90\">";
echo $strPlusTag;
echo "</td>\r\n              <td > \r\n                \r\n                <input type=\"text\" name=\"tags\" size=\"10\"  maxlength=\"20\" value=\"";
echo $tags;
echo "\" class=\"input\" /> \r\n              </td>\r\n            </tr>\r\n            \r\n            <tr  ";
echo plustrdis( $set_target );
echo "> \r\n              <td width=\"90\">";
echo $strPlustarget;
echo "</td>\r\n              <td > \r\n                ";
echo "<s";
echo "elect name=\"target\"  style='WIDTH: 247px;'>\r\n                  <option value=\"_self\" ";
echo seld( $target, "_self" );
echo ">";
echo $strSelf;
echo "</option>\r\n                  <option value=\"_blank\" ";
echo seld( $target, "_blank" );
echo ">";
echo $strBlank;
echo "</option>\r\n                </select>\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_pic );
echo "> \r\n              <td width=\"90\">";
echo $strPlusPic;
echo "</td>\r\n              <td >\r\n\t\t\t   <input name=\"jpg\" type=\"file\" id=\"jpg\" style='WIDTH:300px;' class=\"input\" />\r\n\t\t\t   <input name=\"pic\" type=\"hidden\" id=\"pic\" value=\"";
echo $pic;
echo "\">\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_attach );
echo "> \r\n              <td width=\"90\">";
echo $strPlusAttach;
echo "</td>\r\n              <td >\r\n\t\t\t   <input name=\"att\" type=\"file\" id=\"att\" style='WIDTH:300px;' class=\"input\" />\r\n\t\t\t   <input name=\"attach\" type=\"hidden\" id=\"attach\" value=\"";
echo $attach;
echo "\">\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_piclink );
echo "> \r\n              <td width=\"90\">";
echo $strPlusPicLink;
echo "</td>\r\n              <td>\r\n\t\t\t   <input name=\"piclink\" type=\"input\" class=\"input\" id=\"piclink\" style='WIDTH: 320px;' value=\"";
echo $piclink;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_movi );
echo "> \r\n              <td width=\"90\">";
echo $strPlusMovi;
echo "</td>\r\n              <td >\r\n\t\t\t   <textarea name=\"movi\" rows=\"5\" class=\"textarea\" id=\"movi\" style=\"WIDTH: 320px;\" >";
echo $movi;
echo "</textarea>\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_word );
echo "> \r\n              <td width=\"90\">";
echo $strPlusWord;
echo "</td>\r\n              <td >\r\n\t\t\t   <input name=\"word\" type=\"text\" class=\"input\" id=\"word\" style='WIDTH: 320px;' value=\"";
echo $word;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_link );
echo "> \r\n              <td width=\"90\">";
echo $strPlusLink;
echo "</td>\r\n              <td>\r\n\t\t\t   <input name=\"link\" type=\"text\" class=\"input\" id=\"link\" style='WIDTH: 320px;' value=\"";
echo $link;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_text );
echo "> \r\n              <td width=\"90\">";
echo $strPlusText;
echo "</td>\r\n              <td >\r\n\t\t\t    <textarea name=\"text\" rows=\"5\" class=\"textarea\" id=\"text\" style=\"WIDTH: 320px;\" >";
echo $text;
echo "</textarea>\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_word1 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusWord;
echo "</td>\r\n              <td >\r\n\t\t\t   <input name=\"word1\" type=\"text\" class=\"input\" id=\"word1\" style='WIDTH: 320px;' value=\"";
echo $word1;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_link1 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusLink;
echo "</td>\r\n              <td>\r\n\t\t\t   <input name=\"link1\" type=\"text\" class=\"input\" id=\"link1\" style='WIDTH: 320px;' value=\"";
echo $link1;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_text1 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusText;
echo "</td>\r\n              <td >\r\n\t\t\t    <textarea name=\"text1\" rows=\"5\" class=\"textarea\" id=\"text1\" style=\"WIDTH: 320px;\" >";
echo $text1;
echo "</textarea>\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_word2 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusWord;
echo "</td>\r\n              <td >\r\n\t\t\t   <input name=\"word2\" type=\"text\" class=\"input\" id=\"word2\" style='WIDTH: 320px;' value=\"";
echo $word2;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_link2 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusLink;
echo "</td>\r\n              <td>\r\n\t\t\t   <input name=\"link2\" type=\"text\" class=\"input\" id=\"link2\" style='WIDTH: 320px;' value=\"";
echo $link2;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_word3 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusWord;
echo "</td>\r\n              <td >\r\n\t\t\t   <input name=\"word3\" type=\"text\" class=\"input\" id=\"word3\" style='WIDTH: 320px;' value=\"";
echo $word3;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_link3 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusLink;
echo "</td>\r\n              <td>\r\n\t\t\t   <input name=\"link3\" type=\"text\" class=\"input\" id=\"link3\" style='WIDTH: 320px;' value=\"";
echo $link3;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_word4 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusWord;
echo "</td>\r\n              <td >\r\n\t\t\t   <input name=\"word4\" type=\"text\" class=\"input\" id=\"word4\" style='WIDTH: 320px;' value=\"";
echo $word4;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_link4 );
echo "> \r\n              <td width=\"90\">";
echo $strPlusLink;
echo "</td>\r\n              <td>\r\n\t\t\t   <input name=\"link4\" type=\"text\" class=\"input\" id=\"link4\" style='WIDTH: 320px;' value=\"";
echo $link4;
echo "\" >\r\n              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t<tr  ";
echo plustrdis( $set_code );
echo "> \r\n              <td width=\"90\">";
echo $strPlusCode;
echo "</td>\r\n              <td >\r\n\t\t\t    <textarea name=\"code\" rows=\"6\" class=\"textarea\" id=\"code\" style=\"WIDTH: 500px;\" >";
echo $code;
echo "</textarea>\r\n              </td>\r\n            </tr>\r\n\t\t\t\t\t\t\r\n            <tr  ";
echo plustrdis( $set_catid );
echo "> \r\n              <td width=\"90\">";
echo $strPluscatid;
echo "</td>\r\n              <td> \r\n\r\n";
if ( $set_catid != "-1" )
{
				echo "\t\t\t  \r\n                 ";
				echo "<s";
				echo "elect name='catid' style='WIDTH:247px;' >\r\n                  <option value=\"0\" ";
				echo seld( $catid, "0" );
				echo ">";
				echo $strPluscatidDef;
				echo "</option>\r\n                  ";
				$fsql->query( "select * from {P}".$classtbl." order by catpath" );
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
												$tsql->query( "select catid,cat from {P}".$classtbl." where catid='{$lcatpath[$i]}'" );
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
				echo " \r\n                </select>\r\n";
}
echo "              </td>\r\n            </tr>\r\n\t\t\t\r\n\t\t\t\r\n<tr  ";
echo plustrdis( $set_groupid );
echo "> \r\n              <td width=\"90\">";
echo $strPlusGroup;
echo "</td>\r\n              <td> \r\n\r\n";
if ( $set_groupid != "-1" )
{
				echo "\t\t\t  \r\n                 ";
				echo "<s";
				echo "elect name='groupid' style='WIDTH:247px;' >\r\n                  ";
				$fsql->query( "select * from {P}".$grouptbl );
				while ( $fsql->next_record( ) )
				{
								$lgroupid = $fsql->f( "id" );
								$groupname = $fsql->f( "groupname" );
								if ( $groupid == $lgroupid )
								{
												echo "<option value='".$lgroupid."' selected>".$groupname."</option>";
								}
								else
								{
												echo "<option value='".$lgroupid."'>".$groupname."</option>";
								}
				}
				echo " \r\n                </select>\r\n";
}
echo "              </td>\r\n</tr>        \r\n\t\t\t\r\n\t\t\t\r\n<tr  ";
echo plustrdis( $set_projid );
echo "> \r\n              <td width=\"90\">";
echo $strPlusProjid;
echo "</td>\r\n              <td> \r\n\r\n";
if ( $set_projid != "-1" )
{
				echo "\t\t\t  \r\n                 ";
				echo "<s";
				echo "elect name='projid' style='WIDTH:247px;' >\r\n\t\t\t\t  <option value=\"0\" ";
				echo seld( $projid, "0" );
				echo ">";
				echo $strPlusProjDef;
				echo "</option>\r\n                  ";
				$fsql->query( "select * from {P}".$projtbl );
				while ( $fsql->next_record( ) )
				{
								$lprojid = $fsql->f( "id" );
								$project = $fsql->f( "project" );
								if ( $projid == $lprojid )
								{
												echo "<option value='".$lprojid."' selected>".$project."</option>";
								}
								else
								{
												echo "<option value='".$lprojid."'>".$project."</option>";
								}
				}
				echo " \r\n                </select>\r\n";
}
echo "              </td>\r\n</tr>   \t\t\t\r\n\t\t\t<tr >\r\n\t\t\t  <td>";
echo $strPlusWei;
echo "</td>\r\n\t\t\t  <td >\r\n\t\t\t  ";
echo "<s";
echo "elect name=\"bodyzone\" id=\"bodyzone\" >\r\n                   <option value=\"top\" ";
echo seld( $bodyzone, "top" );
echo ">";
echo $strPlusAddTo.$strPlusBodyZone1;
echo "</option>\r\n                   <option value=\"content\"  ";
echo seld( $bodyzone, "content" );
echo ">";
echo $strPlusAddTo.$strPlusBodyZone2;
echo "</option>\r\n                   <option value=\"bottom\"  ";
echo seld( $bodyzone, "bottom" );
echo ">";
echo $strPlusAddTo.$strPlusBodyZone3;
echo "</option>\r\n                   <option value=\"bodyex\"  ";
echo seld( $bodyzone, "bodyex" );
echo ">";
echo $strPlusAddTo.$strPlusBodyZone0;
echo "</option>\r\n                 </select>\r\n\t\t\t  </td>\r\n\t\t  </tr>\r\n\t\t\t<tr >\r\n\t\t\t     <td>";
echo $strPlusSize;
echo "</td>\r\n\t\t\t     <td >\r\n\t\t\t\t<input name=\"width\" size=\"3\" maxlength=\"4\" type=\"text\" id=\"width\"  class=\"input\" value=\"";
echo $width;
echo "\"  /> X \r\n\t\t\t\t<input name=\"height\"  size=\"3\" maxlength=\"4\" type=\"text\" id=\"height\"  class=\"input\" value=\"";
echo $height;
echo "\"  /> PX \r\n\t\t\t\t </td>\r\n\t\t       </tr>\r\n\t\t\t   <tr >\r\n\t\t\t     <td>";
echo $strPlusTop;
echo "</td>\r\n\t\t\t\t <td>\r\n\t\t\t\t<input name=\"top\"  size=\"3\" maxlength=\"4\" type=\"text\" id=\"top\"  class=\"input\" value=\"";
echo $top;
echo "\"  /> - \r\n\t\t\t\t<input name=\"left\"  size=\"3\" maxlength=\"4\" type=\"text\" id=\"left\"  class=\"input\" value=\"";
echo $left;
echo "\"  /> PX \r\n\r\n\t\t\t\t </td>\r\n\t\t       </tr>\r\n\t\t\t   \r\n</table>\r\n       \r\n\t<div class=\"editzone\" ";
echo plustrdis( $set_body );
echo ">\r\n   \r\n\t\t<input type=\"hidden\" name=\"body\" value=\"";
echo $body;
echo "\" />\r\n\t\t<div id=\"kedit\" style=\"position:relative\">\r\n\t\t ";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../kedit/memberEditor.js\"></script>\r\n\t\t";
echo "<s";
echo "cript type=\"text/javascript\">\r\n\t\tvar editor = new KindEditor(\"editor\");\r\n\t\teditor.hiddenName = \"body\";\r\n\t\teditor.editorWidth = \"580px\";\r\n\t\teditor.editorHeight = \"200px\";\r\n\t\teditor.skinPath = \"../../kedit/skins/default/\";\r\n\t\teditor.uploadPath = \"../../kedit/upload_cgi/upload.php\";\r\n\t\teditor.imageAttachPath=\"";
echo $plustype;
echo "/pics/\";\r\n\t\teditor.iconPath = \"../../kedit/icons/\";\r\n\t\teditor.show();\r\n\t\tfunction KindSubmit() {\r\n\t\t  editor.data();\r\n\t\t}\r\n\t\t </script>\r\n\t\t</div>\r\n\t\t</div>\r\n\t</div>\r\n\t\r\n\t";
if ( $sourceurl != "-1" && $sourceurl != "" && $sourceurl != "0" && strstr( $sourceurl, "/" ) )
{
				$SourceArr = explode( "/", $sourceurl );
				$sourcename = $SourceArr[1];
				$sourcefolder = $SourceArr[0];
				echo "\t<div id=\"setsource\" class=\"pluszone\">";
				echo $strPlusZone4;
				echo "</div>\r\n\t<div id=\"s_setsource\"  class=\"pluszonex\">\r\n\t<div id=\"sourcezone\"></div>\r\n\t</div>\r\n\t";
				echo "<s";
				echo "cript>\r\n\t$(document).ready(function(){\r\n\t\t$().getPicSource();\r\n\t});\r\n\t</script>\r\n\t";
}
echo "\t<input name=\"sourcename\" type=\"hidden\" id=\"sourcename\" value=\"";
echo $sourcename;
echo "\" size=\"35\" />\r\n\t<input name=\"sourcefolder\" type=\"hidden\" id=\"sourcefolder\" value=\"";
echo $sourcefolder;
echo "\" size=\"35\" />\r\n\t<input name=\"sourceurl\" type=\"hidden\" id=\"sourceurl\" value=\"";
echo $sourceurl;
echo "\" size=\"35\" />\r\n    \r\n</div>\r\n\r\n\r\n<div class=\"adminsubmit\" style=\"text-align:center\">\r\n<div style=\"float:right;margin-right:20px\">\r\n<input type=\"submit\" name=\"submit\"   value=\"";
echo $strConfirm;
echo "\"  class=\"button\"  onClick=\"KindSubmit();\" />\r\n<input onClick=\"parent.$.unblockUI()\" type=\"button\" value=\"";
echo $strWindowClose;
echo "\" class=\"button\"  name=\"button2\" >\r\n<input type=\"hidden\" name=\"step\" value=\"add\">\r\n<input type=\"hidden\" name=\"pluslable\" id=\"pluslable\" value=\"";
echo $pluslable;
echo "\">\r\n<input name=\"plusname\" type=\"hidden\" id=\"plusname\" value=\"";
echo $plusname;
echo "\">\r\n<input type=\"hidden\" name=\"pluslocat\" value=\"";
echo $pluslocat;
echo "\">\r\n<input type=\"hidden\" name=\"plustype\" value=\"";
echo $plustype;
echo "\">\r\n<input type=\"hidden\" name=\"modno\" value=\"";
echo $modno;
echo "\">\r\n<input name=\"zindex\"  type=\"hidden\" id=\"zindex\"  value=\"";
echo $zindex;
echo "\"  />\r\n<input name=\"coltype\"  type=\"hidden\" id=\"coltype\"  value=\"";
echo $coltype;
echo "\"  />\r\n<input name=\"display\"  type=\"hidden\" id=\"display\" value=\"block\"  />     \r\n<input name=\"ifrefresh\"  type=\"hidden\" id=\"ifrefresh\"  value=\"";
echo $ifrefresh;
echo "\"  />\r\n</div>\r\n\r\n\r\n<div class=\"plusglobal\">\r\n<table  border=\"0\" cellspacing=\"1\" cellpadding=\"1\">\r\n             <tr >\r\n\t\t\t   \r\n\t\t\t   <td ";
echo plustrdis( $set_setglobal );
echo ">\r\n\t\t\t   <input name=\"setglobal\" type=\"checkbox\" id=\"setglobal\" value=\"1\" /> \r\n\t\t\t  </td>\r\n\t\t\t \r\n\t\t\t   <td ";
echo plustrdis( $set_setglobal );
echo ">\r\n\t\t\t    ";
echo $strPlusAddGlobal1;
echo "\t\t\t  </td>\r\n\t\t    </tr>\r\n\t\t</table>\r\n\r\n</div>\r\n\r\n\r\n</div>\r\n</div>\r\n</form>\r\n\r\n\r\n\r\n\r\n</body>\r\n</html>\r\n";
?>

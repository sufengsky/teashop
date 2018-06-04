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
$step = $_REQUEST['step'];
$id = $_REQUEST['id'];
if ( $_POST['globaldel'] == "1" )
{
				$pluslable = $_POST['pluslable'];
				$bodyzone = $_POST['bodyzone'];
				$msql->query( "delete from {P}_base_plus where pluslable='{$pluslable}'" );
				echo "<script>parent.\$().plusDelBack('pdv_".$id."','".$bodyzone."');parent.\$.unblockUI()</script>";
				exit( );
}
if ( $step == "modi" )
{
				$display = plusvalnone( $_POST['display'] );
				$showborder = $_POST['showborders'];
				$catid = $_POST['catid'];
				$plustype = $_POST['plustype'];
				$pluslable = $_POST['pluslable'];
				$coltype = $_POST['coltype'];
				$plusname = $_POST['plusname'];
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
								$fsql->query( "update {P}_base_plus set \r\n\t\t`coltype`='{$coltype}',\r\n\t\t`display`='{$display}',\r\n\t\t`tempname`='{$tempname}',\r\n\t\t`tempcolor`='{$tempcolor}',\r\n\t\t`title`='{$title}',\r\n\t\t`showborder`='{$showborder}',\r\n\t\t`bordercolor`='{$bordercolor}',\r\n\t\t`backgroundcolor`='{$backgroundcolor}',\r\n\t\t`borderwidth`='{$borderwidth}',\r\n\t\t`borderstyle`='{$borderstyle}',\r\n\t\t`borderlable`='{$borderlable}',\r\n\t\t`borderroll`='{$borderroll}',\r\n\t\t`showbar`='{$showbar}',\r\n\t\t`barbg`='{$barbg}',\r\n\t\t`barcolor`='{$barcolor}',\r\n\t\t`morelink`='{$morelink}',\r\n\t\t`width`='{$width}',\r\n\t\t`height`='{$height}',\r\n\t\t`top`='{$top}',\r\n\t\t`left`='{$left}',\r\n\t\t`zindex`='{$zindex}',\r\n\t\t`padding`='{$padding}',\r\n\t\t`cutbody`='{$cutbody}',\r\n\t\t`picw`='{$picw}',\r\n\t\t`pich`='{$pich}',\r\n\t\t`fittype`='{$fittype}',\r\n\t\t`shownums`='{$shownums}',\r\n\t\t`ord`='{$ord}',\r\n\t\t`sc`='{$sc}',\r\n\t\t`showtj`='{$showtj}',\r\n\t\t`cutword`='{$cutword}',\r\n\t\t`target`='{$target}',\r\n\t\t`body`='{$body}',\r\n\t\t`pic`='{$pic}',\r\n\t\t`attach`='{$attach}',\r\n\t\t`movi`='{$movi}',\r\n\t\t`sourceurl`='{$sourceurl}',\r\n\t\t`text`='{$text}',\r\n\t\t`link`='{$link}',\r\n\t\t`piclink`='{$piclink}',\r\n\t\t`word`='{$word}',\r\n\t\t`word1`='{$word1}',\r\n\t\t`word2`='{$word2}',\r\n\t\t`word3`='{$word3}',\r\n\t\t`word4`='{$word4}',\r\n\t\t`text1`='{$text1}',\r\n\t\t`code`='{$code}',\r\n\t\t`link1`='{$link1}',\r\n\t\t`link2`='{$link2}',\r\n\t\t`link3`='{$link3}',\r\n\t\t`link4`='{$link4}',\r\n\t\t`tags`='{$tags}',\r\n\t\t`groupid`='{$groupid}',\r\n\t\t`projid`='{$projid}',\r\n\t\t`overflow`='{$overflow}',\r\n\t\t`bodyzone`='{$bodyzone}',\r\n\t\t`catid`='{$catid}'\r\n\t\t where id='{$id}' " );
				}
				if ( $_POST['setglobal'] == "1" )
				{
								$fsql->query( "update {P}_base_plus set \r\n\t\t`coltype`='{$coltype}',\r\n\t\t`display`='{$display}',\r\n\t\t`tempname`='{$tempname}',\r\n\t\t`tempcolor`='{$tempcolor}',\r\n\t\t`title`='{$title}',\r\n\t\t`showborder`='{$showborder}',\r\n\t\t`bordercolor`='{$bordercolor}',\r\n\t\t`backgroundcolor`='{$backgroundcolor}',\r\n\t\t`borderwidth`='{$borderwidth}',\r\n\t\t`borderstyle`='{$borderstyle}',\r\n\t\t`borderlable`='{$borderlable}',\r\n\t\t`borderroll`='{$borderroll}',\r\n\t\t`showbar`='{$showbar}',\r\n\t\t`barbg`='{$barbg}',\r\n\t\t`barcolor`='{$barcolor}',\r\n\t\t`morelink`='{$morelink}',\r\n\t\t`width`='{$width}',\r\n\t\t`height`='{$height}',\r\n\t\t`top`='{$top}',\r\n\t\t`left`='{$left}',\r\n\t\t`zindex`='{$zindex}',\r\n\t\t`padding`='{$padding}',\r\n\t\t`cutbody`='{$cutbody}',\r\n\t\t`picw`='{$picw}',\r\n\t\t`pich`='{$pich}',\r\n\t\t`fittype`='{$fittype}',\r\n\t\t`shownums`='{$shownums}',\r\n\t\t`ord`='{$ord}',\r\n\t\t`sc`='{$sc}',\r\n\t\t`showtj`='{$showtj}',\r\n\t\t`cutword`='{$cutword}',\r\n\t\t`target`='{$target}',\r\n\t\t`body`='{$body}',\r\n\t\t`pic`='{$pic}',\r\n\t\t`attach`='{$attach}',\r\n\t\t`movi`='{$movi}',\r\n\t\t`sourceurl`='{$sourceurl}',\r\n\t\t`text`='{$text}',\r\n\t\t`link`='{$link}',\r\n\t\t`piclink`='{$piclink}',\r\n\t\t`word`='{$word}',\r\n\t\t`word1`='{$word1}',\r\n\t\t`word2`='{$word2}',\r\n\t\t`word3`='{$word3}',\r\n\t\t`word4`='{$word4}',\r\n\t\t`text1`='{$text1}',\r\n\t\t`code`='{$code}',\r\n\t\t`link1`='{$link1}',\r\n\t\t`link2`='{$link2}',\r\n\t\t`link3`='{$link3}',\r\n\t\t`link4`='{$link4}',\r\n\t\t`tags`='{$tags}',\r\n\t\t`groupid`='{$groupid}',\r\n\t\t`projid`='{$projid}',\r\n\t\t`overflow`='{$overflow}',\r\n\t\t`bodyzone`='{$bodyzone}',\r\n\t\t`catid`='{$catid}'\r\n\t\t where pluslable='{$pluslable}' " );
				}
				if ( $_POST['ifrefresh'] == "1" )
				{
								echo "<script>parent.location.reload()</script>";
								exit( );
				}
				else
				{
								echo "<script>parent.\$().PlusSet('pdv_".$id."','".$bodyzone."');parent.\$.unblockUI()</script>";
								exit( );
				}
}
?>

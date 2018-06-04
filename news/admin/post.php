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
needauth( 122 );
$act = $_POST['act'];
switch ( $act )
{
				case "proplist" :
								$catid = $_POST['catid'];
								$nowid = $_POST['nowid'];
								if ( $nowid != "" && $nowid != "0" )
								{
												$msql->query( "select * from {P}_news_con where  id='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$prop1 = $msql->f( "prop1" );
																$prop2 = $msql->f( "prop2" );
																$prop3 = $msql->f( "prop3" );
																$prop4 = $msql->f( "prop4" );
																$prop5 = $msql->f( "prop5" );
																$prop6 = $msql->f( "prop6" );
																$prop7 = $msql->f( "prop7" );
																$prop8 = $msql->f( "prop8" );
																$prop9 = $msql->f( "prop9" );
																$prop10 = $msql->f( "prop10" );
																$prop11 = $msql->f( "prop11" );
																$prop12 = $msql->f( "prop12" );
																$prop13 = $msql->f( "prop13" );
																$prop14 = $msql->f( "prop14" );
																$prop15 = $msql->f( "prop15" );
																$prop16 = $msql->f( "prop16" );
												}
								}
								$str = "<table width='100%'   border='0' align='center'  cellpadding='2' cellspacing='0' >";
								$i = 1;
								$msql->query( "select * from {P}_news_prop where catid='{$catid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$propname = $msql->f( "propname" );
												$pn = "prop".$i;
												$str .= "<tr>";
												$str .= "<td width='100' height='30' align='center' >".$propname."</td>";
												$str .= "<td height='30' >";
												$str .= "<input type='text' name='".$pn."' value='".$$pn."' class='input' style='width:499px;' />";
												$str .= "</td>";
												$str .= "</tr>";
												$i++;
								}
								$str .= "</table>";
								echo $str;
								exit( );
								break;
				case "addpage" :
								$nowid = $_POST['nowid'];
								$xuhao = 0;
								if ( $nowid != "" && $nowid != "0" )
								{
												$msql->query( "select max(xuhao) from {P}_news_pages where newsid='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$xuhao = $msql->f( "max(xuhao)" );
												}
												$xuhao = $xuhao + 1;
												$msql->query( "insert into {P}_news_pages set newsid='{$nowid}',xuhao='{$xuhao}' " );
								}
								echo "OK";
								exit( );
								break;
				case "newspageslist" :
								$nowid = $_POST['nowid'];
								$pageinit = $_POST['pageinit'];
								$str = "<ul>";
								$str .= "<li id='p_0' class='pages'>1</li>";
								$i = 2;
								$id = 0;
								$msql->query( "select id from {P}_news_pages where newsid='{$nowid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$id = $msql->f( "id" );
												$str .= "<li id='p_".$id."' class='pages'>".$i."</li>";
												$i++;
								}
								if ( $pageinit != "new" )
								{
												$id = $pageinit;
								}
								$str .= "<li id='addpage' class='addbutton'>".$strNewsPagesAdd."</li>";
								if ( $pageinit != "0" )
								{
												$str .= "<li id='pagedelete' class='addbutton'>".$strNewsPagesDel."</li>";
												$str .= "<li id='backtomodi' class='addbutton'>".$strBack."</li>";
								}
								$str .= "<input  type='submit' name='modi'  onClick='KindSubmit();' value='".$strSave."' class='savebutton' />";
								$str .= "</ul><input id='newspagesid' name='newspagesid' type='hidden' value='".$id."'>";
								echo $str;
								exit( );
								break;
				case "getcontent" :
								$nowid = $_POST['nowid'];
								$newspageid = $_POST['newspageid'];
								if ( $newspageid == "-1" )
								{
												$body = "";
								}
								else if ( $newspageid == "0" )
								{
												$msql->query( "select body from {P}_news_con where id='{$nowid}'" );
												if ( $msql->next_record( ) )
												{
																$body = $msql->f( "body" );
												}
								}
								else
								{
												$msql->query( "select body from {P}_news_pages where id='{$newspageid}'" );
												if ( $msql->next_record( ) )
												{
																$body = $msql->f( "body" );
												}
												else
												{
																$body = "";
												}
								}
								$body = path2url( $body );
								echo $body;
								exit( );
								break;
				case "newsmodify" :
								$id = $_POST['id'];
								$pid = $_POST['pid'];
								$catid = $_POST['catid'];
								$page = $_POST['page'];
								$title = htmlspecialchars( $_POST['title'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$tourl = trim( htmlspecialchars( $_POST['tourl'] ) );
								$xuhao = htmlspecialchars( $_POST['xuhao'] );
								$body = $_POST['body'];
								$memo = $_POST['memo'];
								$fbtime = $_POST['fbtime'];
								$htime = $_POST['htime'];
								$oldcatid = $_POST['oldcatid'];
								$oldcatpath = $_POST['oldcatpath'];
								$prop1 = htmlspecialchars( $_POST['prop1'] );
								$prop2 = htmlspecialchars( $_POST['prop2'] );
								$prop3 = htmlspecialchars( $_POST['prop3'] );
								$prop4 = htmlspecialchars( $_POST['prop4'] );
								$prop5 = htmlspecialchars( $_POST['prop5'] );
								$prop6 = htmlspecialchars( $_POST['prop6'] );
								$prop7 = htmlspecialchars( $_POST['prop7'] );
								$prop8 = htmlspecialchars( $_POST['prop8'] );
								$prop9 = htmlspecialchars( $_POST['prop9'] );
								$prop10 = htmlspecialchars( $_POST['prop10'] );
								$prop11 = htmlspecialchars( $_POST['prop11'] );
								$prop12 = htmlspecialchars( $_POST['prop12'] );
								$prop13 = htmlspecialchars( $_POST['prop13'] );
								$prop14 = htmlspecialchars( $_POST['prop14'] );
								$prop15 = htmlspecialchars( $_POST['prop15'] );
								$prop16 = htmlspecialchars( $_POST['prop16'] );
								$prop17 = htmlspecialchars( $_POST['prop17'] );
								$prop18 = htmlspecialchars( $_POST['prop18'] );
								$prop19 = htmlspecialchars( $_POST['prop19'] );
								$prop20 = htmlspecialchars( $_POST['prop20'] );
								$downcentid = htmlspecialchars( $_POST['downcentid'] );
								$downcent = htmlspecialchars( $_POST['downcent'] );
								$tags = $_POST['tags'];
								$spe_selec = $_POST['spe_selec'];
								$pic = $_FILES['jpg'];
								$file = $_FILES['file'];
								$fileurl = $_POST['fileurl'];
								if ( 0 < $pic['size'] || 0 < $file['size'] )
								{
												$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								}
								if ( $title == "" )
								{
												echo $Meta.$strNewsNotice6;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strNewsNotice7;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strNewsNotice5;
												exit( );
								}
								if ( strstr( $tourl, "." ) )
								{
												echo $Meta.$strNewsNotice15;
												exit( );
								}
								$timearr = explode( "-", $fbtime );
								$htimearr = explode( "-", $htime );
								$yy = $timearr[0];
								$mm = $timearr[1];
								$dd = $timearr[2];
								$hh = $htimearr[0];
								$ii = $htimearr[1];
								$ss = $htimearr[2];
								$dtime = mktime( $hh, $ii, $ss, $mm, $dd, $yy );
								$uptime = time( );
								$body = url2path( $body );
								$title = str_replace( "{#", "", $title );
								$title = str_replace( "#}", "", $title );
								$memo = str_replace( "{#", "", $memo );
								$memo = str_replace( "#}", "", $memo );
								$body = str_replace( "{#", "{ #", $body );
								$body = str_replace( "#}", "# }", $body );
								$msql->query( "select catpath from {P}_news_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								$count_pro = count( $spe_selec );
								$i = 0;
								for ( ;	$i < $count_pro;	$i++	)
								{
												$projid = $spe_selec[$i];
												$projpath .= $projid.":";
								}
								if ( 0 < $file['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../upload/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "news/upload/".$nowdate;
												$filearr = newuploadfile( $file['tmp_name'], $file['type'], $file['name'], $file['size'], $uppath );
												if ( $filearr[0] != "err" )
												{
																$fileurl = $filearr[3];
												}
												else
												{
																echo $Meta.$filearr[1];
																exit( );
												}
												$msql->query( "select fileurl from {P}_news_con where id='{$id}'" );
												if ( $msql->next_record( ) )
												{
																$oldfileurl = $msql->f( "fileurl" );
												}
												if ( file_exists( ROOTPATH.$oldfileurl ) && $oldfileurl != "" && !strstr( $oldfileurl, "../" ) )
												{
																unlink( ROOTPATH.$oldfileurl );
												}
								}
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "news/pics/".$nowdate;
												$arr = newuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $uppath );
												if ( $arr[0] != "err" )
												{
																$src = $arr[3];
												}
												else
												{
																echo $Meta.$arr[1];
																exit( );
												}
												$msql->query( "select src from {P}_news_con where id='{$id}'" );
												if ( $msql->next_record( ) )
												{
																$oldsrc = $msql->f( "src" );
												}
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																unlink( ROOTPATH.$oldsrc );
												}
												$msql->query( "update {P}_news_con set src='{$src}' where id='{$id}'" );
								}
								$t = 0;
								for ( ;	$t < sizeof( $tags );	$t++	)
								{
												if ( $tags[$t] != "" )
												{
																$tagstr .= $tags[$t].",";
												}
								}
								$msql->query( "update {P}_news_con set \r\n\t\t\ttitle='{$title}',\r\n\t\t\tmemo='{$memo}',\r\n\t\t\tfileurl='{$fileurl}',\r\n\t\t\tcatid='{$catid}',\r\n\t\t\tcatpath='{$catpath}',\r\n\t\t\tdtime='{$dtime}',\r\n\t\t\tuptime='{$uptime}',\r\n\t\t\txuhao='{$xuhao}',\r\n\t\t\tauthor='{$author}',\r\n\t\t\tsource='{$source}',\r\n\t\t\tproj='{$projpath}',\r\n\t\t\ttags='{$tagstr}',\r\n\t\t\tprop1='{$prop1}',\r\n\t\t\tprop2='{$prop2}',\r\n\t\t\tprop3='{$prop3}',\r\n\t\t\tprop4='{$prop4}',\r\n\t\t\tprop5='{$prop5}',\r\n\t\t\tprop6='{$prop6}',\r\n\t\t\tprop7='{$prop7}',\r\n\t\t\tprop8='{$prop8}',\r\n\t\t\tprop9='{$prop9}',\r\n\t\t\tprop10='{$prop10}',\r\n\t\t\tprop11='{$prop11}',\r\n\t\t\tprop12='{$prop12}',\r\n\t\t\tprop13='{$prop13}',\r\n\t\t\tprop14='{$prop14}',\r\n\t\t\tprop15='{$prop15}',\r\n\t\t\tprop16='{$prop16}',\r\n\t\t\tprop17='{$prop17}',\r\n\t\t\tprop18='{$prop18}',\r\n\t\t\tprop19='{$prop19}',\r\n\t\t\tprop20='{$prop20}',\r\n\t\t\tdowncentid='{$downcentid}',\r\n\t\t\tdowncent='{$downcent}',\r\n\t\t\ttourl='{$tourl}',\r\n\t\t\tbody='{$body}'\r\n\t\t\twhere id='{$id}'\r\n\t\t" );
								echo "OK";
								exit( );
								break;
				case "contentmodify" :
								$newspagesid = $_POST['newspagesid'];
								$body = $_POST['body'];
								if ( 65000 < strlen( $body ) )
								{
												echo $strNewsNotice5;
												exit( );
								}
								$body = url2path( $body );
								$msql->query( "update {P}_news_pages set body='{$body}' where id='{$newspagesid}'" );
								echo "OK";
								exit( );
								break;
				case "newsadd" :
								$catid = $_POST['catid'];
								$body = $_POST['body'];
								$title = htmlspecialchars( $_POST['title'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$tourl = trim( htmlspecialchars( $_POST['tourl'] ) );
								$memo = $_POST['memo'];
								$fbtime = $_POST['fbtime'];
								$prop1 = htmlspecialchars( $_POST['prop1'] );
								$prop2 = htmlspecialchars( $_POST['prop2'] );
								$prop3 = htmlspecialchars( $_POST['prop3'] );
								$prop4 = htmlspecialchars( $_POST['prop4'] );
								$prop5 = htmlspecialchars( $_POST['prop5'] );
								$prop6 = htmlspecialchars( $_POST['prop6'] );
								$prop7 = htmlspecialchars( $_POST['prop7'] );
								$prop8 = htmlspecialchars( $_POST['prop8'] );
								$prop9 = htmlspecialchars( $_POST['prop9'] );
								$prop10 = htmlspecialchars( $_POST['prop10'] );
								$prop11 = htmlspecialchars( $_POST['prop11'] );
								$prop12 = htmlspecialchars( $_POST['prop12'] );
								$prop13 = htmlspecialchars( $_POST['prop13'] );
								$prop14 = htmlspecialchars( $_POST['prop14'] );
								$prop15 = htmlspecialchars( $_POST['prop15'] );
								$prop16 = htmlspecialchars( $_POST['prop16'] );
								$prop17 = htmlspecialchars( $_POST['prop17'] );
								$prop18 = htmlspecialchars( $_POST['prop18'] );
								$prop19 = htmlspecialchars( $_POST['prop19'] );
								$prop20 = htmlspecialchars( $_POST['prop20'] );
								$downcentid = htmlspecialchars( $_POST['downcentid'] );
								$downcent = htmlspecialchars( $_POST['downcent'] );
								$tags = $_POST['tags'];
								trylimit( "_news_con", 100, "id" );
								$fileurl = $_POST['fileurl'];
								$pic = $_FILES['jpg'];
								$file = $_FILES['file'];
								$spe_selec = $_POST['spe_selec'];
								if ( 0 < $pic['size'] || 0 < $file['size'] )
								{
												$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								}
								if ( $title == "" )
								{
												echo $Meta.$strNewsNotice6;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strNewsNotice7;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strNewsNotice5;
												exit( );
								}
								if ( strstr( $tourl, "." ) )
								{
												echo $Meta.$strNewsNotice15;
												exit( );
								}
								$timearr = explode( "-", $fbtime );
								$yy = $timearr[0];
								$mm = $timearr[1];
								$dd = $timearr[2];
								$hh = date( "H", time( ) );
								$ii = date( "i", time( ) );
								$ss = date( "s", time( ) );
								$dtime = mktime( $hh, $ii, $ss, $mm, $dd, $yy );
								$uptime = $dtime;
								$msql->query( "select catpath from {P}_news_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								$body = url2path( $body );
								$title = str_replace( "{#", "", $title );
								$title = str_replace( "#}", "", $title );
								$memo = str_replace( "{#", "", $memo );
								$memo = str_replace( "#}", "", $memo );
								$body = str_replace( "{#", "{ #", $body );
								$body = str_replace( "#}", "# }", $body );
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "news/pics/".$nowdate;
												$arr = newuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $uppath );
												if ( $arr[0] != "err" )
												{
																$src = $arr[3];
												}
												else
												{
																echo $Meta.$arr[1];
																exit( );
												}
								}
								if ( 0 < $file['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = "../upload/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "news/upload/".$nowdate;
												$filearr = newuploadfile( $file['tmp_name'], $file['type'], $file['name'], $file['size'], $uppath );
												if ( $filearr[0] != "err" )
												{
																$fileurl = $filearr[3];
												}
												else
												{
																echo $Meta.$filearr[1];
																exit( );
												}
								}
								$count_pro = count( $spe_selec );
								$i = 0;
								for ( ;	$i < $count_pro;	$i++	)
								{
												$projid = $spe_selec[$i];
												$projpath .= $projid.":";
								}
								$t = 0;
								for ( ;	$t < sizeof( $tags );	$t++	)
								{
												if ( $tags[$t] != "" )
												{
																$tagstr .= $tags[$t].",";
												}
								}
								$msql->query( "insert into {P}_news_con set\r\n\t\tcatid='{$catid}',\r\n\t\tcatpath='{$catpath}',\r\n\t\ttitle='{$title}',\r\n\t\tbody='{$body}',\r\n\t\tdtime='{$dtime}',\r\n\t\txuhao='0',\r\n\t\tcl='0',\r\n\t\ttj='0',\r\n\t\tiffb='1',\r\n\t\tifbold='0',\r\n\t\tifred='0',\r\n\t\ttype='gif',\r\n\t\tsrc='{$src}',\r\n\t\tuptime='{$uptime}',\r\n\t\tauthor='{$author}',\r\n\t\tsource='{$source}',\r\n\t\tmemberid='0',\r\n\t\tproj='{$projpath}',\r\n\t\ttags='{$tagstr}',\r\n\t\tsecure='0',\r\n\t\tmemo='{$memo}',\r\n\t\tprop1='{$prop1}',\r\n\t\tprop2='{$prop2}',\r\n\t\tprop3='{$prop3}',\r\n\t\tprop4='{$prop4}',\r\n\t\tprop5='{$prop5}',\r\n\t\tprop6='{$prop6}',\r\n\t\tprop7='{$prop7}',\r\n\t\tprop8='{$prop8}',\r\n\t\tprop9='{$prop9}',\r\n\t\tprop10='{$prop10}',\r\n\t\tprop11='{$prop11}',\r\n\t\tprop12='{$prop12}',\r\n\t\tprop13='{$prop13}',\r\n\t\tprop14='{$prop14}',\r\n\t\tprop15='{$prop15}',\r\n\t\tprop16='{$prop16}',\r\n\t\tprop17='{$prop17}',\r\n\t\tprop18='{$prop18}',\r\n\t\tprop19='{$prop19}',\r\n\t\tprop20='{$prop20}',\r\n\t\tdowncentid='{$downcentid}',\r\n\t\tdowncent='{$downcent}',\r\n\t\ttourl='{$tourl}',\r\n\t\tfileurl='{$fileurl}'\r\n\t\t" );
								echo "OK";
								exit( );
								break;
				case "pagedelete" :
								$delpagesid = $_POST['delpagesid'];
								$nowid = $_POST['nowid'];
								$i = 0;
								$msql->query( "select id from {P}_news_pages where newsid='{$nowid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$id[$i] = $msql->f( "id" );
												if ( $id[$i] == $delpagesid )
												{
																if ( $i == 0 )
																{
																				$lastid = 0;
																}
																else
																{
																				$lastid = $id[$i - 1];
																}
												}
												$i++;
								}
								if ( $lastid == 0 && 1 < $i )
								{
												$lastid = $id[1];
								}
								$msql->query( "delete from  {P}_news_pages where id='{$delpagesid}'" );
								echo $lastid;
								exit( );
								break;
				case "addproj" :
								$project = htmlspecialchars( $_POST['project'] );
								$folder = htmlspecialchars( $_POST['folder'] );
								if ( $project == "" )
								{
												echo $strProjNTC1;
												exit( );
								}
								if ( strlen( $folder ) < 2 || 16 < strlen( $folder ) )
								{
												echo $strProjNTC2;
												exit( );
								}
								if ( !eregi( "^[0-9a-z]{1,16}\$", $folder ) )
								{
												echo $strProjNTC3;
												exit( );
								}
								if ( strstr( $folder, "/" ) || strstr( $folder, "." ) )
								{
												echo $strProjNTC3;
												exit( );
								}
								$arr = array( "main", "html", "class", "detail", "query", "index", "admin", "newsgl", "newsfabu", "newsmodify", "newscat", "news" );
								if ( in_array( $folder, $arr ) == true )
								{
												echo $strProjNTC4;
												exit( );
								}
								if ( file_exists( "../project/".$folder ) )
								{
												echo $strProjNTC4;
												exit( );
								}
								$msql->query( "select id from {P}_news_proj where folder='{$folder}'" );
								if ( $msql->next_record( ) )
								{
												echo $strProjNTC4;
												exit( );
								}
								$pagename = "proj_".$folder;
								@mkdir( @"../project/".@$folder, 511 );
								$fd = fopen( "../project/temp.php", "r" );
								$str = fread( $fd, "2000" );
								$str = str_replace( "TEMP", $pagename, $str );
								fclose( $fd );
								$filename = "../project/".$folder."/index.php";
								$fp = fopen( $filename, "w" );
								fwrite( $fp, $str );
								fclose( $fp );
								@chmod( @$filename, 493 );
								$msql->query( "insert into {P}_news_proj set \r\n\t\t\t`project`='{$project}',\r\n\t\t\t`folder`='{$folder}'\r\n\t\t" );
								$msql->query( "insert into {P}_base_pageset set \r\n\t\t\t`name`='{$project}',\r\n\t\t\t`coltype`='news',\r\n\t\t\t`pagename`='{$pagename}',\r\n\t\t\t`pagetitle`='{$project}',\r\n\t\t\t`buildhtml`='index'\r\n\t\t" );
								echo "OK";
								exit( );
								break;
				case "addzl" :
								$catid = htmlspecialchars( $_POST['catid'] );
								if ( $catid == "" )
								{
												echo $strZlNTC1;
												exit( );
								}
								$msql->query( "select cat from {P}_news_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$cat = $msql->f( "cat" );
												$cat = str_replace( "'", "", $cat );
								}
								else
								{
												echo $strZlNTC2;
												exit( );
								}
								$pagename = "class_".$catid;
								@mkdir( @"../class/".@$catid, 511 );
								$fd = fopen( "../class/temp.php", "r" );
								$str = fread( $fd, "2000" );
								$str = str_replace( "TEMP", $pagename, $str );
								fclose( $fd );
								$filename = "../class/".$catid."/index.php";
								$fp = fopen( $filename, "w" );
								fwrite( $fp, $str );
								fclose( $fp );
								@chmod( @$filename, 493 );
								$msql->query( "update {P}_news_cat set `ifchannel`='1' where catid='{$catid}'" );
								$msql->query( "select id from {P}_base_pageset where coltype='news' and pagename='{$pagename}'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												$fsql->query( "insert into {P}_base_pageset set \r\n\t\t\t`name`='{$cat}',\r\n\t\t\t`coltype`='news',\r\n\t\t\t`pagename`='{$pagename}',\r\n\t\t\t`pagetitle`='{$cat}',\r\n\t\t\t`buildhtml`='index'\r\n\t\t\t" );
								}
								echo "OK";
								exit( );
								break;
				case "delzl" :
								$catid = htmlspecialchars( $_POST['catid'] );
								if ( $catid == "" )
								{
												echo $strZlNTC1;
												exit( );
								}
								$msql->query( "select catid from {P}_news_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												echo $strZlNTC2;
												exit( );
								}
								$pagename = "class_".$catid;
								$msql->query( "delete from {P}_base_pageset where coltype='news' and pagename='{$pagename}'" );
								$msql->query( "delete from {P}_base_plus where plustype='news' and pluslocat='{$pagename}'" );
								$msql->query( "update {P}_news_cat set `ifchannel`='0' where catid='{$catid}'" );
								if ( $catid != "" && 1 <= strlen( $catid ) && !strstr( $catid, "." ) && !strstr( $catid, "/" ) )
								{
												delfold( "../class/".$catid );
								}
								echo "OK";
								exit( );
								break;
}
?>

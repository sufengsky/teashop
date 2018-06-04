<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define( "ROOTPATH", "../" );
include( ROOTPATH."includes/common.inc.php" );
include( "language/".$sLan.".php" );
include( "includes/news.inc.php" );
$act = $_POST['act'];
switch ( $act )
{
				case "newspageslist" :
								$nowid = $_POST['nowid'];
								$pageinit = $_POST['pageinit'];
								$nowid = htmlspecialchars( $nowid );
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
				case "addpage" :
								$nowid = $_POST['nowid'];
								$nowid = htmlspecialchars( $nowid );
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								if ( securefunc( "122" ) == false )
								{
												echo $strNoRights;
												exit( );
								}
								$msql->query( "select id from {P}_news_con where id='{$nowid}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												echo $strNoRights;
												exit( );
								}
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
				case "pagedelete" :
								$delpagesid = $_POST['delpagesid'];
								$nowid = $_POST['nowid'];
								$nowid = htmlspecialchars( $nowid );
								$delpagesid = htmlspecialchars( $delpagesid );
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								if ( securefunc( "122" ) == false )
								{
												echo "NORIGHTS";
												exit( );
								}
								$msql->query( "select id from {P}_news_con where id='{$nowid}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												echo "NORIGHTS";
												exit( );
								}
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
				case "getbody" :
								$nowid = $_POST['nowid'];
								$newspageid = $_POST['newspageid'];
								$nowid = htmlspecialchars( $nowid );
								$newspageid = htmlspecialchars( $newspageid );
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
				case "contentmodify" :
								$newspagesid = $_POST['newspagesid'];
								$body = $_POST['body'];
								$id = $_POST['id'];
								$newspagesid = htmlspecialchars( $newspagesid );
								$id = htmlspecialchars( $id );
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								if ( securefunc( "122" ) == false )
								{
												echo $strNoRights;
												exit( );
								}
								if ( securefunc( "123" ) == true )
								{
												$iffb = 1;
								}
								else
								{
												$iffb = 0;
								}
								$msql->query( "select id from {P}_news_con where id='{$id}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
								}
								else
								{
												echo $strNoRights;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $strNewsNTC3;
												exit( );
								}
								$body = url2path( $body );
								$msql->query( "update {P}_news_pages set body='{$body}' where id='{$newspagesid}' and newsid='{$id}'" );
								$msql->query( "update {P}_news_con set iffb='{$iffb}' where id='{$id}'" );
								echo "OK";
								exit( );
								break;
				case "newsfabu" :
								$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								if ( securefunc( "121" ) == false )
								{
												echo $Meta.$strNoRights;
												exit( );
								}
								if ( securefunc( "123" ) == true )
								{
												$iffb = 1;
								}
								else
								{
												$iffb = 0;
								}
								$title = htmlspecialchars( $_POST['title'] );
								$catid = htmlspecialchars( $_POST['catid'] );
								$pcatid = htmlspecialchars( $_POST['pcatid'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$memo = htmlspecialchars( $_POST['memo'] );
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
								$tags = $_POST['tags'];
								$spe_selec = $_POST['spe_selec'];
								$body = $_POST['body'];
								$body = url2path( $body );
								$pic = $_FILES['jpg'];
								$fileurl = $_POST['fileurl'];
								$file = $_FILES['file'];
								$msql->query( "select catpath from {P}_news_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								$catArr = explode( ":", $catpath );
								$bigcatid = intval( $catArr[0] );
								$secureset = secureclass( "126" );
								if ( $_POST['catid'] != "0" && !strstr( $secureset, ":".$bigcatid.":" ) )
								{
												echo $Meta.$strNoRights;
												exit( );
								}
								if ( 0 < $pic['size'] )
								{
												if ( securefunc( "124" ) == false )
												{
																echo $Meta.$strUploadNotice4;
																exit( );
												}
								}
								if ( 0 < $file['size'] )
								{
												if ( securefunc( "125" ) == false )
												{
																echo $Meta.$strUploadNotice5;
																exit( );
												}
								}
								if ( $title == "" )
								{
												echo $Meta.$strNewsNTC1;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strNewsNTC2;
												exit( );
								}
								if ( $body == "" )
								{
												echo $Meta.$strNewsNTC4;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strNewsNTC3;
												exit( );
								}
								$DenyArr = explode( ",", $GLOBALS['NEWSCONF']['KeywordDeny'] );
								$i = 0;
								for ( ;	$i < sizeof( $DenyArr );	$i++	)
								{
												if ( 2 < strlen( $DenyArr[$i] ) )
												{
																if ( strstr( $body, $DenyArr[$i] ) || strstr( $title, $DenyArr[$i] ) )
																{
																				echo $strNewsNotice13;
																				exit( );
																}
												}
								}
								$title = str_replace( "{#", "", $title );
								$title = str_replace( "#}", "", $title );
								$memo = str_replace( "{#", "", $memo );
								$memo = str_replace( "#}", "", $memo );
								$body = str_replace( "{#", "{ #", $body );
								$body = str_replace( "#}", "# }", $body );
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = ROOTPATH."news/pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$updir = "news/pics/".$nowdate;
												$arr = newsuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $updir );
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
								else
								{
												$src = "";
								}
								if ( 0 < $file['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = ROOTPATH."news/upload/".$nowdate;
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
								$t = 0;
								for ( ;	$t < sizeof( $tags );	$t++	)
								{
												if ( $tags[$t] != "" )
												{
																$tagstr .= $tags[$t].",";
												}
								}
								$count_pro = count( $spe_selec );
								$i = 0;
								for ( ;	$i < $count_pro;	$i++	)
								{
												$projid = $spe_selec[$i];
												$projpath .= $projid.":";
								}
								$dtime = time( );
								$msql->query( "insert into {P}_news_con set\r\n\t\tcatid='{$catid}',\r\n\t\tcatpath='{$catpath}',\r\n\t\tpcatid='{$pcatid}',\r\n\t\ttitle='{$title}',\r\n\t\tbody='{$body}',\r\n\t\tdtime='{$dtime}',\r\n\t\txuhao='0',\r\n\t\tcl='0',\r\n\t\ttj='0',\r\n\t\tiffb='{$iffb}',\r\n\t\tifbold='0',\r\n\t\tifred='',\r\n\t\t`type`='',\r\n\t\tsrc='{$src}',\r\n\t\tuptime='{$dtime}',\r\n\t\tauthor='{$author}',\r\n\t\tsource='{$source}',\r\n\t\tmemberid='{$memberid}',\r\n\t\tproj='{$projpath}',\r\n\t\ttags='{$tagstr}',\r\n\t\tsecure='0',\r\n\t\tprop1='{$prop1}',\r\n\t\tprop2='{$prop2}',\r\n\t\tprop3='{$prop3}',\r\n\t\tprop4='{$prop4}',\r\n\t\tprop5='{$prop5}',\r\n\t\tprop6='{$prop6}',\r\n\t\tprop7='{$prop7}',\r\n\t\tprop8='{$prop8}',\r\n\t\tprop9='{$prop9}',\r\n\t\tprop10='{$prop10}',\r\n\t\tprop11='{$prop11}',\r\n\t\tprop12='{$prop12}',\r\n\t\tprop13='{$prop13}',\r\n\t\tprop14='{$prop14}',\r\n\t\tprop15='{$prop15}',\r\n\t\tprop16='{$prop16}',\r\n\t\tprop17='{$prop17}',\r\n\t\tprop18='{$prop18}',\r\n\t\tprop19='{$prop19}',\r\n\t\tprop20='{$prop20}',\r\n\t\tfileurl='{$fileurl}',\r\n\t\tmemo='{$memo}'\r\n\t\t" );
								$id = $msql->instid( );
								membercentupdate( $memberid, "121" );
								echo "OK";
								exit( );
								break;
				case "newsmodify" :
								$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								if ( securefunc( "122" ) == false )
								{
												echo $Meta.$strNoRights;
												exit( );
								}
								if ( securefunc( "123" ) == true )
								{
												$iffb = 1;
								}
								else
								{
												$iffb = 0;
								}
								$id = $_POST['id'];
								$title = htmlspecialchars( $_POST['title'] );
								$catid = htmlspecialchars( $_POST['catid'] );
								$pcatid = htmlspecialchars( $_POST['pcatid'] );
								$author = htmlspecialchars( $_POST['author'] );
								$source = htmlspecialchars( $_POST['source'] );
								$memo = htmlspecialchars( $_POST['memo'] );
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
								$tags = $_POST['tags'];
								$spe_selec = $_POST['spe_selec'];
								$body = $_POST['body'];
								$body = url2path( $body );
								$pic = $_FILES['jpg'];
								$fileurl = $_POST['fileurl'];
								$file = $_FILES['file'];
								$msql->query( "select catpath from {P}_news_cat where catid='{$catid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								$catArr = explode( ":", $catpath );
								$bigcatid = intval( $catArr[0] );
								$secureset = secureclass( "126" );
								if ( $_POST['catid'] != "0" && !strstr( $secureset, ":".$bigcatid.":" ) )
								{
												echo $Meta.$strNoRights;
												exit( );
								}
								if ( 0 < $pic['size'] )
								{
												if ( securefunc( "124" ) == false )
												{
																echo $Meta.$strUploadNotice4;
																exit( );
												}
								}
								if ( 0 < $file['size'] )
								{
												if ( securefunc( "125" ) == false )
												{
																echo $Meta.$strUploadNotice5;
																exit( );
												}
								}
								if ( $title == "" )
								{
												echo $Meta.$strNewsNTC1;
												exit( );
								}
								if ( 200 < strlen( $title ) )
								{
												echo $Meta.$strNewsNTC2;
												exit( );
								}
								if ( $body == "" )
								{
												echo $Meta.$strNewsNTC4;
												exit( );
								}
								if ( 65000 < strlen( $body ) )
								{
												echo $Meta.$strNewsNTC3;
												exit( );
								}
								$DenyArr = explode( ",", $GLOBALS['NEWSCONF']['KeywordDeny'] );
								$i = 0;
								for ( ;	$i < sizeof( $DenyArr );	$i++	)
								{
												if ( 2 < strlen( $DenyArr[$i] ) )
												{
																if ( strstr( $body, $DenyArr[$i] ) || strstr( $title, $DenyArr[$i] ) )
																{
																				echo $strNewsNotice13;
																				exit( );
																}
												}
								}
								$title = str_replace( "{#", "", $title );
								$title = str_replace( "#}", "", $title );
								$memo = str_replace( "{#", "", $memo );
								$memo = str_replace( "#}", "", $memo );
								$body = str_replace( "{#", "{ #", $body );
								$body = str_replace( "#}", "# }", $body );
								if ( 0 < $pic['size'] )
								{
												$nowdate = date( "Ymd", time( ) );
												$picpath = ROOTPATH."news/pics/".$nowdate;
												@mkdir( @$picpath, 511 );
												$updir = "news/pics/".$nowdate;
												$arr = newsuploadimage( $pic['tmp_name'], $pic['type'], $pic['size'], $updir );
												if ( $arr[0] != "err" )
												{
																$src = $arr[3];
																$msql->query( "select src from {P}_news_con where memberid='{$memberid}' and id='{$id}'" );
																if ( $msql->next_record( ) )
																{
																				$oldsrc = $msql->f( "src" );
																				if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
																				{
																								@unlink( @ROOTPATH.@$oldsrc );
																				}
																}
																$msql->query( "update {P}_news_con set src='{$src}' where memberid='{$memberid}' and id='{$id}'" );
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
												$picpath = ROOTPATH."news/upload/".$nowdate;
												@mkdir( @$picpath, 511 );
												$uppath = "news/upload/".$nowdate;
												$filearr = newuploadfile( $file['tmp_name'], $file['type'], $file['name'], $file['size'], $uppath );
												if ( $filearr[0] != "err" )
												{
																$fileurl = $filearr[3];
																$msql->query( "select fileurl from {P}_news_con where memberid='{$memberid}' and id='{$id}'" );
																if ( $msql->next_record( ) )
																{
																				$oldsrc = $msql->f( "fileurl" );
																				if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) && !strstr( $oldsrc, "http://" ) )
																				{
																								@unlink( @ROOTPATH.@$oldsrc );
																				}
																}
												}
												else
												{
																echo $Meta.$filearr[1];
																exit( );
												}
								}
								$t = 0;
								for ( ;	$t < sizeof( $tags );	$t++	)
								{
												if ( $tags[$t] != "" )
												{
																$tagstr .= $tags[$t].",";
												}
								}
								$count_pro = count( $spe_selec );
								$i = 0;
								for ( ;	$i < $count_pro;	$i++	)
								{
												$projid = $spe_selec[$i];
												$projpath .= $projid.":";
								}
								$dtime = time( );
								$msql->query( "update {P}_news_con set \r\n\t\tcatid='{$catid}',\r\n\t\tcatpath='{$catpath}',\r\n\t\tpcatid='{$pcatid}',\r\n\t\ttitle='{$title}',\r\n\t\tbody='{$body}',\r\n\t\tuptime='{$dtime}',\r\n\t\tiffb='{$iffb}',\r\n\t\ttags='{$tagstr}',\r\n\t\tauthor='{$author}',\r\n\t\tsource='{$source}',\r\n\t\tproj='{$projpath}',\r\n\t\tprop1='{$prop1}',\r\n\t\tprop2='{$prop2}',\r\n\t\tprop3='{$prop3}',\r\n\t\tprop4='{$prop4}',\r\n\t\tprop5='{$prop5}',\r\n\t\tprop6='{$prop6}',\r\n\t\tprop7='{$prop7}',\r\n\t\tprop8='{$prop8}',\r\n\t\tprop9='{$prop9}',\r\n\t\tprop10='{$prop10}',\r\n\t\tprop11='{$prop11}',\r\n\t\tprop12='{$prop12}',\r\n\t\tprop13='{$prop13}',\r\n\t\tprop14='{$prop14}',\r\n\t\tprop15='{$prop15}',\r\n\t\tprop16='{$prop16}',\r\n\t\tprop17='{$prop17}',\r\n\t\tprop18='{$prop18}',\r\n\t\tprop19='{$prop19}',\r\n\t\tprop20='{$prop20}',\r\n\t\tfileurl='{$fileurl}',\r\n\t\tmemo='{$memo}'\r\n\r\n\t\twhere memberid='{$memberid}' and id='{$id}'" );
								echo "OK";
								exit( );
								break;
				case "proplist" :
								$catid = $_POST['catid'];
								$nowid = $_POST['nowid'];
								$nowid = htmlspecialchars( $nowid );
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
								$str = "<table width='100%'   border='0' align='center'  cellpadding='2' cellspacing='1' >";
								$i = 1;
								$msql->query( "select * from {P}_news_prop where catid='{$catid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$propname = $msql->f( "propname" );
												$pn = "prop".$i;
												$str .= "<tr>";
												$str .= "<td width='80' height='30' align='center' >".$propname."</td>";
												$str .= "<td height='30' >";
												$str .= "<input type='text' name='".$pn."' value='".$$pn."' class='input' style='width:399px;' />";
												$str .= "</td>";
												$str .= "</tr>";
												$i++;
								}
								$str .= "</table>";
								echo $str;
								exit( );
								break;
				case "addcat" :
								$newcat = htmlspecialchars( $_POST['newcat'] );
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								if ( securefunc( "127" ) == false )
								{
												echo "0";
												exit( );
								}
								$msql->query( "select max(xuhao) from {P}_news_pcat where memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
												$newxuhao = $msql->f( "max(xuhao)" ) + 1;
								}
								$msql->query( "insert into {P}_news_pcat set \r\n\t\t`memberid`='{$memberid}',\r\n\t\t`pid`='0',\r\n\t\t`xuhao`='{$newxuhao}',\r\n\t\t`cat`='{$newcat}'\r\n\t\t" );
								$catid = $msql->instid( );
								$str = "<tr class='list' id='tr_".$catid."'>\r\n\t\t<td width='50' align='center'>".$catid."</td><td>\r\n\t\t<input id='catxuhao_".$catid."' name='xuhao' type='text' class='input'  value='".$newxuhao."' size='3' />\r\n\t\t<input id='cat_".$catid."' name='cat' type='text' class='input'  value='".$newcat."' size='30' /></td><td>\r\n\t\t<span id='gcat_".$catid."' class='cat_del'>".$strDelete."</span>\t\r\n\t\t<span id='gcat_".$catid."' class='cat_modify'>".$strModify."</span> \r\n\t\t</td>\r\n\t\t</tr>";
								echo $str;
								exit( );
								break;
				case "modicat" :
								$catid = htmlspecialchars( $_POST['catid'] );
								$cat = htmlspecialchars( $_POST['cat'] );
								$xuhao = htmlspecialchars( $_POST['xuhao'] );
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								if ( securefunc( "127" ) == false )
								{
												echo $strNoRights;
												exit( );
								}
								$msql->query( "update {P}_news_pcat set cat='{$cat}',xuhao='{$xuhao}' where catid='{$catid}' and memberid='{$memberid}'" );
								echo "OK";
								exit( );
								break;
				case "delcat" :
								$catid = htmlspecialchars( $_POST['catid'] );
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								if ( securefunc( "127" ) == false )
								{
												echo $strNoRights;
												exit( );
								}
								$msql->query( "delete from {P}_news_pcat where catid='{$catid}' and memberid='{$memberid}'" );
								echo "OK";
								exit( );
								break;
				case "contentpages" :
								$newsid = $_POST['newsid'];
								$newsid = htmlspecialchars( $newsid );
								$str = "<li id='p_0' class='pages'>1</li>";
								$i = 2;
								$id = 0;
								$msql->query( "select id from {P}_news_pages where newsid='{$newsid}' order by xuhao" );
								while ( $msql->next_record( ) )
								{
												$id = $msql->f( "id" );
												$str .= "<li id='p_".$id."' class='pages'>".$i."</li>";
												$i++;
								}
								echo $str;
								exit( );
								break;
				case "getcontent" :
								$newsid = $_POST['newsid'];
								$newspageid = $_POST['newspageid'];
								$RP = $_POST['RP'];
								$newsid = htmlspecialchars( $newsid );
								$newspageid = htmlspecialchars( $newspageid );
								if ( $newspageid == "0" )
								{
												$msql->query( "select body from {P}_news_con where id='{$newsid}'" );
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
								}
								$body = str_replace( "[ROOTPATH]", $RP, $body );
								echo $body;
								exit( );
								break;
				case "getnewcomment" :
								$rid = $_POST['rid'];
								$RP = $_POST['RP'];
								$rid = htmlspecialchars( $rid );
								$fsql->query( "select * from {P}_comment where iffb='1' and catid='1' and pid='0' and rid='{$rid}' order by dtime desc limit 0,1" );
								if ( $fsql->next_record( ) )
								{
												$id = $fsql->f( "id" );
												$memberid = $fsql->f( "memberid" );
												$title = $fsql->f( "title" );
												$body = $fsql->f( "body" );
												$dtime = $fsql->f( "dtime" );
												$uptime = $fsql->f( "uptime" );
												$cl = $fsql->f( "cl" );
												$lastname = $fsql->f( "lastname" );
												$pj1 = $fsql->f( "pj1" );
												$count = 0;
												$body = strip_tags( $body );
												if ( $memberid == "-1" )
												{
																$pname = $strGuest;
																$nowface = "1";
																$memberurl = "#";
												}
												else
												{
																$tsql->query( "select * from {P}_member where memberid='{$memberid}'" );
																if ( $tsql->next_record( ) )
																{
																				$pname = $tsql->f( "pname" );
																				$nowface = $tsql->f( "nowface" );
																}
																$memberurl = $RP."member/home.php?mid=".$memberid;
												}
												$dtime = date( "Y-m-d", $dtime );
												$title = csubstr( $title, 0, 20 );
												$body = csubstr( $body, 0, 120 )." ...";
												$link = $RP."comment/html/?".$id.".html";
												$face = $RP."member/face/".$nowface.".gif";
												$pjstr = pstarnums( $pj1, $RP );
												$var = array( "title" => $title, "dtime" => $dtime, "pname" => $pname, "body" => $body, "count" => $count, "cl" => $cl, "link" => $link, "memberurl" => $memberurl, "lastname" => $lastname, "face" => $face, "pjstr" => $pjstr, "target" => $target );
												$Temp = loadcommontemp( "tpl_news_comment.htm" );
												$TempArr = splittbltemp( $Temp );
												$str = showtpltemp( $TempArr['list'], $var );
								}
								echo $str;
								exit( );
								break;
				case "zhichi" :
								$newsid = $_POST['newsid'];
								$newsid = htmlspecialchars( $newsid );
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$memberid = $_COOKIE['MEMBERID'];
								$mstr = "|".$memberid."|";
								$msql->query( "select tplog,zhichi,memberid from {P}_news_con where id='{$newsid}'" );
								if ( $msql->next_record( ) )
								{
												$tplog = $msql->f( "tplog" );
												$zhichi = $msql->f( "zhichi" );
												$mid = $msql->f( "memberid" );
								}
								if ( strstr( $tplog, $mstr ) )
								{
												echo "L1";
												exit( );
								}
								else
								{
												$tplog = $tplog.$mstr;
								}
								$msql->query( "update {P}_news_con set zhichi=zhichi+1,tplog='{$tplog}' where id='{$newsid}'" );
								membercentupdate( $mid, "122" );
								$num = $zhichi + 1;
								echo $num;
								exit( );
								break;
				case "fandui" :
								$newsid = $_POST['newsid'];
								$newsid = htmlspecialchars( $newsid );
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$memberid = $_COOKIE['MEMBERID'];
								$mstr = "|".$memberid."|";
								$msql->query( "select tplog,fandui,memberid from {P}_news_con where id='{$newsid}'" );
								if ( $msql->next_record( ) )
								{
												$tplog = $msql->f( "tplog" );
												$fandui = $msql->f( "fandui" );
												$mid = $msql->f( "memberid" );
								}
								if ( strstr( $tplog, $mstr ) )
								{
												echo "L1";
												exit( );
								}
								else
								{
												$tplog = $tplog.$mstr;
								}
								$msql->query( "update {P}_news_con set fandui=fandui+1,tplog='{$tplog}' where id='{$newsid}'" );
								membercentupdate( $mid, "123" );
								$num = $fandui + 1;
								echo $num;
								exit( );
								break;
				case "addfav" :
								$newsid = $_POST['newsid'];
								$url = $_POST['url'];
								$newsid = htmlspecialchars( $newsid );
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$memberid = $_COOKIE['MEMBERID'];
								$msql->query( "select title from {P}_news_con where id='{$newsid}'" );
								if ( $msql->next_record( ) )
								{
												$title = $msql->f( "title" );
								}
								$msql->query( "select id from {P}_member_fav where url='{$url}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
												echo "L1";
												exit( );
								}
								$msql->query( "insert into {P}_member_fav set title='{$title}',url='{$url}',memberid='{$memberid}'" );
								echo "OK";
								exit( );
								break;
				case "ifbanzhu" :
								$newsid = $_POST['newsid'];
								$newsid = htmlspecialchars( $newsid );
								if ( !islogin( ) )
								{
												echo "NO";
												exit( );
								}
								$msql->query( "select catpath from {P}_news_con where id='{$newsid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
								}
								$arr = explode( ":", $catpath );
								$bigcatid = intval( $arr[0] );
								if ( $bigcatid == "" || $bigcatid == "0" )
								{
												$bigcatid = "PERSON";
								}
								$secureset = securebanzhu( "129" );
								if ( strstr( $secureset, ":".$bigcatid.":" ) )
								{
												echo "YES";
												exit( );
								}
								else
								{
												echo "NO";
												exit( );
								}
								break;
				case "banzhutj" :
								$newsid = $_POST['newsid'];
								$newsid = htmlspecialchars( $newsid );
								if ( !islogin( ) )
								{
												echo $strNoRights;
												exit( );
								}
								$msql->query( "select catpath,tj,memberid from {P}_news_con where id='{$newsid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
												$tj = $msql->f( "tj" );
												$mid = $msql->f( "memberid" );
								}
								$arr = explode( ":", $catpath );
								$bigcatid = intval( $arr[0] );
								if ( $bigcatid == "" || $bigcatid == "0" )
								{
												$bigcatid = "PERSON";
								}
								$secureset = securebanzhu( "129" );
								if ( !strstr( $secureset, ":".$bigcatid.":" ) )
								{
												echo $strNoRights;
												exit( );
								}
								if ( $tj != "0" )
								{
												echo $strNewsNTC6;
												exit( );
								}
								$msql->query( "update {P}_news_con set tj='1' where id='{$newsid}'" );
								membercentupdate( $mid, "124" );
								echo "OK";
								exit( );
								break;
				case "banzhudel" :
								$newsid = $_POST['newsid'];
								$koufen = $_POST['koufen'];
								$newsid = htmlspecialchars( $newsid );
								$koufen = htmlspecialchars( $koufen );
								if ( !islogin( ) )
								{
												echo $strNoRights;
												exit( );
								}
								$msql->query( "select catpath,memberid from {P}_news_con where id='{$newsid}'" );
								if ( $msql->next_record( ) )
								{
												$catpath = $msql->f( "catpath" );
												$mid = $msql->f( "memberid" );
								}
								$arr = explode( ":", $catpath );
								$bigcatid = intval( $arr[0] );
								if ( $bigcatid == "" || $bigcatid == "0" )
								{
												$bigcatid = "PERSON";
								}
								$secureset = securebanzhu( "129" );
								if ( !strstr( $secureset, ":".$bigcatid.":" ) )
								{
												echo $strNoRights;
												exit( );
								}
								$fsql->query( "select src,fileurl from {P}_news_con where id='{$newsid}'" );
								if ( $fsql->next_record( ) )
								{
												$oldsrc = $fsql->f( "src" );
												$fileurl = $fsql->f( "fileurl" );
												if ( file_exists( ROOTPATH.$oldsrc ) && $oldsrc != "" && !strstr( $oldsrc, "../" ) )
												{
																@unlink( @ROOTPATH.@$oldsrc );
												}
												if ( file_exists( ROOTPATH.$fileurl ) && $fileurl != "" && !strstr( $fileurl, "../" ) && !strstr( $fileurl, "http://" ) )
												{
																@unlink( @ROOTPATH.@$fileurl );
												}
								}
								$fsql->query( "delete from {P}_news_pages where newsid='{$newsid}'" );
								$fsql->query( "delete from {P}_news_con where id='{$newsid}'" );
								if ( $koufen == "yes" )
								{
												membercentupdate( $mid, "125" );
								}
								echo "OK";
								exit( );
								break;
				case "download" :
								$newsid = $_POST['newsid'];
								$RP = $_POST['RP'];
								$newsid = htmlspecialchars( $newsid );
								$msql->query( "select * from {P}_news_con where id='{$newsid}'" );
								if ( $msql->next_record( ) )
								{
												$fileurl = $msql->f( "fileurl" );
												$downcent = $msql->f( "downcent" );
												$downcentid = $msql->f( "downcentid" );
												if ( 0 < $downcent )
												{
																if ( !islogin( ) )
																{
																				echo "1000";
																				exit( );
																}
																if ( 1 <= $downcentid && $downcentid <= 5 )
																{
																				$centnum = "cent".$downcentid;
																				$centname = "centname".$downcentid;
																				$mymemberid = $_COOKIE['MEMBERID'];
																				$fsql->query( "select ".$centnum." from {P}_member where memberid='{$mymemberid}'" );
																				if ( $fsql->next_record( ) )
																				{
																								$$centnum = $fsql->f( $centnum );
																				}
																				$fsql->query( "select id from {P}_news_downlog where newsid='{$newsid}' and memberid='{$mymemberid}'" );
																				if ( $fsql->next_record( ) )
																				{
																				}
																				else
																				{
																								if ( $$centnum < $downcent )
																								{
																												echo "1001";
																												exit( );
																								}
																								$now = time( );
																								$memo = $strDownKCent."(NEWSID:".$newsid.")";
																								$tsql->query( "update {P}_member set ".$centnum."=".$centnum."-".$downcent." where memberid='{$mymemberid}' " );
																								$tsql->query( "insert into {P}_news_downlog set newsid='{$newsid}',memberid='{$mymemberid}'" );
																								$tsql->query( "insert into {P}_member_centlog set `memberid`='{$mymemberid}',`dtime`='{$now}',`event`='0',`memo`='{$memo}',`".$centnum."`='-".$downcent."'" );
																				}
																}
												}
												$fsql->query( "update {P}_news_con set downcount=downcount+1 where id='{$newsid}'" );
												if ( !strstr( $fileurl, "http://" ) )
												{
																$fileurl = $RP.$fileurl;
												}
												echo $fileurl;
												exit( );
								}
								else
								{
												echo "#";
												exit( );
								}
								break;
}
?>

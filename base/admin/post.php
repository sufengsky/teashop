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
include( ROOTPATH."includes/data.inc.php" );
$act = $_POST['act'];
switch ( $act )
{
				case "getbordertemplist" :
								needauth( 5 );
								$pluslable = $_POST['pluslable'];
								if ( $pluslable == "modGroupLable" )
								{
												$sql = " where bordertype='lable' ";
								}
								else
								{
												$sql = " where bordertype='border' ";
								}
								$str = "";
								$msql->query( "select * from {P}_base_border ".$sql." order by tempid" );
								while ( $msql->next_record( ) )
								{
												$tempid = $msql->f( "tempid" );
												$btempname = $msql->f( "tempname" );
												$str .= "<div id='bt_".$tempid."' class='bordtemplist'>".$tempid." ".$btempname."</div>";
								}
								echo $str;
								exit( );
								break;
				case "previewborder" :
								needauth( 5 );
								$borderid = $_POST['borderid'];
								$coltitle = $_POST['coltitle'];
								$borderwidth = $_POST['borderwidth'];
								$bordercolor = $_POST['bordercolor'];
								$borderstyle = $_POST['borderstyle'];
								$backgroundcolor = $_POST['backgroundcolor'];
								$showbar = $_POST['showbar'];
								$barbg = $_POST['barbg'];
								$barcolor = $_POST['barcolor'];
								if ( $borderid == "1000" )
								{
												$path = ROOTPATH."base/border/".$borderid."/tpl.htm";
												$imgpath = ROOTPATH."base/border/".$borderid."/images/";
								}
								else if ( substr( $borderid, 1, 1 ) == "0" )
								{
												$path = ROOTPATH."base/border/".substr( $borderid, 1 )."/".substr( $borderid, 0, 1 ).".htm";
												$imgpath = ROOTPATH."base/border/".substr( $borderid, 1 )."/images/";
								}
								else
								{
												$path = ROOTPATH."base/border/".substr( $borderid, 1 )."/tpl.htm";
												$imgpath = ROOTPATH."base/border/".substr( $borderid, 1 )."/images/";
								}
								if ( file_exists( $path ) )
								{
												$fd = fopen( $path, r );
												$str = fread( $fd, 300000 );
												fclose( $fd );
												$str = str_replace( "{#RP#}", ROOTPATH, $str );
												$str = str_replace( "images/", $imgpath, $str );
												$str = str_replace( "{#coltitle#}", $coltitle, $str );
												$str = str_replace( "{#morelink#}", "#", $str );
												$str = str_replace( "{#showmore#}", "block", $str );
												$str = str_replace( "{#borderwidth#}", $borderwidth, $str );
												$str = str_replace( "{#bordercolor#}", $bordercolor, $str );
												$str = str_replace( "{#borderstyle#}", $borderstyle, $str );
												$str = str_replace( "{#backgroundcolor#}", $backgroundcolor, $str );
												$str = str_replace( "{#showbar#}", $showbar, $str );
												$str = str_replace( "{#barbg#}", $barbg, $str );
												$str = str_replace( "{#barcolor#}", $barcolor, $str );
												$arr = explode( "<!-start->", $str );
												$TempArr['start'] = $arr[1];
												$arr = explode( "<!-end->", $str );
												$TempArr['end'] = $arr[1];
												$str = $TempArr['start']."<img src='images/plusborder.gif' border='0' width='100%' />".$TempArr['end'];
								}
								else
								{
												$str = $strBorderNotExist;
								}
								echo $str;
								exit( );
								break;
				case "getplustemplist" :
								needauth( 5 );
								$pluslable = $_POST['pluslable'];
								$set_tempname = $_POST['set_tempname'];
								$tempname = $_POST['tempname'];
								$str = "";
								if ( $tempname == $set_tempname )
								{
												$str .= "<div id='pt_0' class='plustemplist' style='border-color:#d8f0fa;background:#f4fafd' title='".$set_tempname."'>".$strTempDef." (".$set_tempname.")</div>";
								}
								else
								{
												$str .= "<div id='pt_0' class='plustemplist' title='".$set_tempname."'>".$strTempDef." (".$set_tempname.")</div>";
								}
								$fsql->query( "select * from {P}_base_plustemp where pluslable='{$pluslable}'  order by id" );
								while ( $fsql->next_record( ) )
								{
												$tempid = $fsql->f( "id" );
												$cname = $fsql->f( "cname" );
												$ctempname = $fsql->f( "tempname" );
												if ( $tempname == $ctempname )
												{
																$str .= "<div id='pt_".$tempid."' class='plustemplist' style='border-color:#d8f0fa;background:#f4fafd' title='".$ctempname."'>".$cname." (".$ctempname.")</div>";
												}
												else
												{
																$str .= "<div id='pt_".$tempid."' class='plustemplist' title='".$ctempname."'>".$cname." (".$ctempname.")</div>";
												}
								}
								echo $str;
								exit( );
								break;
				case "getpicsource" :
								needauth( 5 );
								$sourcename = $_POST['sourcename'];
								$sourcefolder = $_POST['sourcefolder'];
								$sourcefold = ROOTPATH."effect/source/".$sourcefolder;
								$handle = opendir( $sourcefold );
								$i = 0;
								while ( $image_file = readdir( $handle ) )
								{
												$nowfile = $sourcefold."/".$image_file;
												if ( $image_file != "." && $image_file != ".." && $image_file != "_notes" && !strstr( $image_file, "/" ) )
												{
																$sourcesizearr = getimagesize( $nowfile );
																if ( $sourcesizearr[1] <= $sourcesizearr[0] )
																{
																				if ( 80 < $sourcesizearr[0] )
																				{
																								$sourcewidth = 80;
																				}
																				else
																				{
																								$sourcewidth = $sourcesizearr[0];
																				}
																				$str .= "<div class='sourcediv' title='".$image_file."'><div class='sourcepic'><img src='".$nowfile."' border='0' width='".$sourcewidth."'></div><div class='sourcememo'>".$sourcesizearr[0]."x".$sourcesizearr[1]."</div></div>";
																}
																else
																{
																				if ( 80 < $sourcesizearr[1] )
																				{
																								$sourceheight = 80;
																				}
																				else
																				{
																								$sourceheight = $sourcesizearr[0];
																				}
																				$str .= "<div class='sourcediv' title='".$image_file."'><div class='sourcepic'><img src='".$nowfile."' border='0' height='".$sourceheight."'></div><div class='sourcememo'>".$sourcesizearr[0]."x".$sourcesizearr[1]."</div></div>";
																}
												}
												$i++;
								}
								closedir( $handle );
								echo $str;
								exit( );
								break;
				case "tempdel" :
								needauth( 6 );
								$tempid = $_POST['tempid'];
								$msql->query( "delete from {P}_base_plustemp where id='{$tempid}'" );
								echo "OK";
								exit( );
								break;
				case "tempadd" :
								needauth( 6 );
								$pluslable = $_POST['pluslable'];
								$cname = $_POST['cname'];
								$tempname = $_POST['tempname'];
								$msql->query( "insert into {P}_base_plustemp set \r\n\t\t\tpluslable='{$pluslable}',\r\n\t\t\tcname='{$cname}',\r\n\t\t\ttempname='{$tempname}'\r\n\t\t" );
								$tempid = $msql->instid( );
								$str = "<tr id='tr_".$tempid."'> <td height='22'>".$pluslable."</td><td>".$cname."</td><td>".$tempname."</td><td width='60'><img id='del_".$tempid."' src='images/delete.png' width='24' height='24' class='tempdel' /></td></tr>";
								echo $str;
								exit( );
								break;
				case "plusinput" :
								tryfunc( );
								needauth( 6 );
								$file = $_FILES['datafile'];
								$arr = explode( ".", $file['name'] );
								if ( $arr[1] != "dat" )
								{
												echo "1001";
												exit( );
								}
								$f = $file['tmp_name'];
								$fd = fopen( $f, "r" );
								$str = fread( $fd, 1000000 );
								fclose( $fd );
								$str = str_replace( "\n", "", $str );
								$arr = explode( ",", $str );
								$i = 0;
								for ( ;	$i < sizeof( $arr );	$i++	)
								{
												if ( $arr[$i] != "" )
												{
																$arrs = explode( "=", trim( $arr[$i] ) );
																$data[$arrs[0]] = $arrs[1];
												}
								}
								$nums = sizeof( $data );
								if ( $nums < 68 || 100 < $nums )
								{
												echo "1002";
												exit( );
								}
								if ( $data['pluslable'] == "" || $data['coltype'] == "" || $data['plusname'] == "" )
								{
												echo "1002";
												exit( );
								}
								$msql->query( "select id from {P}_base_plusdefault where pluslable='".$data['pluslable']."'" );
								if ( $msql->next_record( ) )
								{
												echo "1003";
												exit( );
								}
								$scl = "";
								do
								{
												$val = each( &$data )[1];
												$key = each( &$data )[0];
												if ( each( &$data ) )
												{
																$scl .= "`".$key."`='".$val."',";
												}
								} while ( 1 );
								$scl = substr( $scl, 0, 0 - 1 );
								$msql->query( "insert into {P}_base_plusdefault set {$scl}" );
								echo "OK";
								exit( );
								break;
				case "borderadd" :
								tryfunc( );
								needauth( 6 );
								$tempid = $_POST['tempid'];
								$bordertype = $_POST['bordertype'];
								$tempname = $_POST['tempname'];
								$msql->query( "select id from {P}_base_border where tempid='{$tempid}'" );
								if ( $msql->next_record( ) )
								{
												echo "1001";
												exit( );
								}
								$msql->query( "insert into {P}_base_border set \r\n\t\t\ttempid='{$tempid}',\r\n\t\t\tbordertype='{$bordertype}',\r\n\t\t\ttempname='{$tempname}'\r\n\t\t" );
								echo "OK";
								exit( );
								break;
				case "borderdel" :
								needauth( 6 );
								$tempid = $_POST['tempid'];
								$msql->query( "delete from {P}_base_border where tempid='{$tempid}'" );
								echo "OK";
								exit( );
								break;
				case "chkPwCode" :
								include( ROOTPATH."base/nusoap/nusoap.php" );
								$server = "http://update.phpweb.net/remote/webservice/soapserver.php";
								$customer = new soapclientx( $server );
								$r_params = array( "siteurl" => $SiteUrl, "domain" => $_SERVER['HTTP_HOST'], "user" => $GLOBALS['CONF']['phpwebUser'], "version" => PHPWEB_VERSION );
								$lic = $customer->call( "chkPwCode", $r_params );
								if ( $err = $customer->geterror( ) )
								{
												exit( );
								}
								if ( $lic[0] == "1" )
								{
												$msql->query( "update {P}_base_config set value='{$lic['1']}' where variable='safecode'" );
								}
								break;
				case "uninstall" :
								needauth( 9 );
								$coltype = $_POST['coltype'];
								if ( strlen( $coltype ) < 1 )
								{
												echo "0000";
												exit( );
								}
								$msql->query( "select moveable from {P}_base_coltype where coltype='{$coltype}'" );
								if ( $msql->next_record( ) )
								{
												$moveable = $msql->f( "moveable" );
								}
								else
								{
												echo "1000";
												exit( );
								}
								if ( $moveable != "1" )
								{
												echo "1001";
												exit( );
								}
								$sql_file = ROOTPATH.$coltype."/install/uninstall.sql";
								if ( file_exists( $sql_file ) )
								{
												$fd = fopen( $sql_file, "r" );
												$sql = fread( $fd, filesize( $sql_file ) );
												fclose( $fd );
								}
								else
								{
												echo "1002";
												exit( );
								}
								if ( strstr( $sql, "dev_" ) || !strstr( $sql, "{P}_" ) || !strstr( $sql, ";" ) )
								{
												echo "1003";
												exit( );
								}
								$sql = remove_remarks( trim( $sql ) );
								$pieces = split_sql_file( $sql, ";" );
								$pieces_count = count( $pieces );
								$i = 0;
								for ( ;	$i < $pieces_count;	$i++	)
								{
												$a_sql_query = trim( $pieces[$i] );
												if ( 10 < strlen( $a_sql_query ) && substr( $a_sql_query, 0, 1 ) != "#" )
												{
																$msql->query( $a_sql_query );
												}
								}
								$bak = time( );
								if ( $coltype != "member" && $coltype != "comment" )
								{
												@rename( @ROOTPATH.@$coltype, @ROOTPATH.@$coltype."_backup_".@$bak );
								}
								echo "OK";
								exit( );
								break;
				case "getcollist" :
								needauth( 9 );
								include( ROOTPATH."base/nusoap/nusoap.php" );
								$server = "http://update.phpweb.net/remote/webservice/soapserver.php";
								$customer = new soapclientx( $server );
								$r_params = array( "siteurl" => $SiteUrl, "domain" => $_SERVER['HTTP_HOST'] );
								$lic = $customer->call( "getColList", $r_params );
								if ( $err = $customer->geterror( ) )
								{
												$errinfo = $customer->response;
												echo "ERROR:".$err."<br>".$errinfo."</div>";
												exit( );
								}
								if ( !$lic || $lic == "" )
								{
												echo "1000";
												exit( );
								}
								$fsql->query( "select coltype from {P}_base_coltype" );
								while ( $fsql->next_record( ) )
								{
												$colarr[] = $fsql->f( "coltype" );
								}
								$nums = sizeof( $lic );
								$str = "";
								$i = 0;
								for ( ;	$i < $nums;	$i++	)
								{
												$colname = $lic[$i]['colname'];
												$coltype = $lic[$i]['coltype'];
												if ( in_array( $coltype, $colarr ) == false )
												{
																$str .= "<option value='".$coltype."'>".$colname."</option>";
												}
								}
								if ( 0 < $nums && $str == "" )
								{
												echo "1002";
												exit( );
								}
								echo $str;
								exit( );
								break;
				case "colinstall" :
								needauth( 9 );
								$coltype = $_POST['coltype'];
								$user = $_POST['user'];
								$passwd = $_POST['passwd'];
								if ( strlen( $coltype ) < 1 )
								{
												echo "1000";
												exit( );
								}
								include( ROOTPATH."base/nusoap/nusoap.php" );
								$server = "http://update.phpweb.net/remote/webservice/soapserver.php";
								$customer = new soapclientx( $server );
								$r_params = array( "siteurl" => $SiteUrl, "domain" => $_SERVER['HTTP_HOST'], "coltype" => $coltype, "user" => $user, "passwd" => $passwd );
								$lic = $customer->call( "colInstCheck", $r_params );
								if ( $err = $customer->geterror( ) )
								{
												$errinfo = $customer->response;
												echo "ERROR:".$err."<br>".$errinfo."</div>";
												exit( );
								}
								if ( !$lic || $lic == "" )
								{
												echo "1005";
												exit( );
								}
								if ( $lic == "nouser" )
								{
												echo "1006";
												exit( );
								}
								if ( $lic == "norights" )
								{
												echo "1007";
												exit( );
								}
								$msql->query( "select id from {P}_base_coltype where coltype='{$coltype}'" );
								if ( $msql->next_record( ) )
								{
												echo "1001";
												exit( );
								}
								$modversionfile = ROOTPATH.$coltype."/version.txt";
								if ( file_exists( $modversionfile ) )
								{
												$fn = fopen( $modversionfile, "r" );
												$modversion = fread( $fn, filesize( $modversionfile ) );
												fclose( $fn );
												if ( PHPWEB_RELEASE < $modversion )
												{
																echo "1009";
																exit( );
												}
								}
								$sql_file = ROOTPATH.$coltype."/install/install.sql";
								if ( file_exists( $sql_file ) )
								{
												$fd = fopen( $sql_file, "r" );
												$sql = fread( $fd, filesize( $sql_file ) );
												fclose( $fd );
								}
								else
								{
												echo "1002";
												exit( );
								}
								if ( strstr( $sql, "dev_" ) || !strstr( $sql, "{P}_" ) || !strstr( $sql, ";" ) )
								{
												echo "1003";
												exit( );
								}
								$sql = remove_remarks( trim( $sql ) );
								$pieces = split_sql_file( $sql, ";" );
								$pieces_count = count( $pieces );
								$i = 0;
								for ( ;	$i < $pieces_count;	$i++	)
								{
												$a_sql_query = trim( $pieces[$i] );
												if ( 10 < strlen( $a_sql_query ) && substr( $a_sql_query, 0, 1 ) != "#" )
												{
																$msql->query( $a_sql_query );
												}
								}
								echo "OK";
								exit( );
								break;
				case "coluninstallcheck" :
								$user = $_POST['user'];
								$passwd = $_POST['passwd'];
								include( ROOTPATH."base/nusoap/nusoap.php" );
								$server = "http://update.phpweb.net/remote/webservice/soapserver.php";
								$customer = new soapclientx( $server );
								$r_params = array( "siteurl" => $SiteUrl, "domain" => $_SERVER['HTTP_HOST'], "user" => $user, "passwd" => $passwd );
								$lic = $customer->call( "colUnInstCheck", $r_params );
								if ( $err = $customer->geterror( ) )
								{
												$errinfo = $customer->response;
												echo "ERROR:".$err."<br>".$errinfo."</div>";
												exit( );
								}
								if ( !$lic || $lic == "" )
								{
												echo "1005";
												exit( );
								}
								if ( $lic == "nouser" )
								{
												echo "1006";
												exit( );
								}
								if ( $lic == "canuninstall" )
								{
												echo "OK";
												exit( );
								}
								else
								{
												echo "ERROR";
												exit( );
								}
								break;
				case "pchkModule" :
								include( ROOTPATH."base/nusoap/nusoap.php" );
								$server = "http://update.phpweb.net/remote/webservice/soapserver.php";
								$customer = new soapclientx( $server );
								$r_params = array( "siteurl" => $SiteUrl, "domain" => $_SERVER['HTTP_HOST'] );
								$lic = $customer->call( "pchkModule", $r_params );
								if ( $err = $customer->geterror( ) )
								{
												exit( );
								}
								if ( $lic == "1" )
								{
												@unlink( "../catch/temp" );
								}
								else
								{
												$fp = @fopen( "../catch/temp", "r" );
												$xnums = @fread( @$fp, 10 );
												@fclose( @$fp );
												$str = $xnums + 1;
												@mkdir( "../catch", 511 );
												$fd = @fopen( "../catch/temp", "w" );
												@fwrite( @$fd, @$str );
												@fclose( @$fd );
												@chmod( "../catch/temp", 438 );
								}
								break;
}
?>

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
needauth( 301 );
$act = $_POST['act'];
switch ( $act )
{
				case "addgroup" :
								$groupname = htmlspecialchars( $_POST['groupname'] );
								$folder = htmlspecialchars( $_POST['folder'] );
								if ( $groupname == "" )
								{
												echo $strGroupAddNTC1;
												exit( );
								}
								if ( strlen( $folder ) < 2 || 16 < strlen( $folder ) )
								{
												echo $strGroupAddNTC2;
												exit( );
								}
								if ( !eregi( "^[0-9a-z]{1,16}\$", $folder ) )
								{
												echo $strGroupAddNTC3;
												exit( );
								}
								if ( strstr( $folder, "/" ) || strstr( $folder, "." ) )
								{
												echo $strGroupAddNTC3;
												exit( );
								}
								trylimit( "_page_group", 5, "id" );
								$arr = array( "main", "html", "htm", "detail", "index", "admin", "images", "includes", "language", "module", "pics", "templates", "js", "css" );
								if ( in_array( $folder, $arr ) == true )
								{
												echo $strGroupAddNTC4;
												exit( );
								}
								if ( file_exists( "../".$folder ) )
								{
												echo $strGroupAddNTC4;
												exit( );
								}
								$msql->query( "select id from {P}_page_group where folder='{$folder}'" );
								if ( $msql->next_record( ) )
								{
												echo $strGroupAddNTC4;
												exit( );
								}
								@mkdir( @"../".@$folder, 511 );
								$fd = fopen( "../temp.php", "r" );
								$str = fread( $fd, "2000" );
								$str_html = str_replace( "TEMP", $folder, $str );
								$str_main = str_replace( "TEMP", $folder."_main", $str );
								fclose( $fd );
								$filename = "../".$folder."/index.php";
								$fp = fopen( $filename, "w" );
								fwrite( $fp, $str_html );
								fclose( $fp );
								@chmod( @$filename, 493 );
								$filename_main = "../".$folder."/main.php";
								$fp = fopen( $filename_main, "w" );
								fwrite( $fp, $str_main );
								fclose( $fp );
								@chmod( @$filename_main, 493 );
								$msql->query( "insert into {P}_page_group set \r\n\t\t\t`groupname`='{$groupname}',\r\n\t\t\t`xuhao`='1',\r\n\t\t\t`moveable`='1',\r\n\t\t\t`folder`='{$folder}'\r\n\t\t" );
								$msql->query( "insert into {P}_base_pageset set \r\n\t\t\t`name`='{$groupname}',\r\n\t\t\t`coltype`='page',\r\n\t\t\t`pagename`='{$folder}',\r\n\t\t\t`buildhtml`='id'\r\n\t\t" );
								$mainpagename = $folder."_main";
								$msql->query( "insert into {P}_base_pageset set \r\n\t\t\t`name`='{$groupname}',\r\n\t\t\t`coltype`='page',\r\n\t\t\t`pagename`='{$mainpagename}',\r\n\t\t\t`buildhtml`='0'\r\n\t\t" );
								echo "OK";
								exit( );
								break;
}
?>

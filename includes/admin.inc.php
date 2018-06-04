<?php

function needauth( $au )
{
	global $msql;
	global $strAdminNoright;
	if ( !isset( $_COOKIE['SYSUSER'] ) || $_COOKIE['SYSUSER'] == "" )
	{
		echo "<script>top.location='".ROOTPATH."admin.php'</script>";
		exit( );
	}
	$msql->query( "select * from {P}_base_admin where user='".$_COOKIE['SYSUSER']."'" );
	if ( $msql->next_record( ) )
	{
		$psd = $msql->f( "password" );
		$needmd5 = md5( $_COOKIE['SYSUSER']."l0aZXUYJ876Mn5rQoL55B".$psd.$_COOKIE['SYSTM'] );
		if ( $needmd5 != $_COOKIE['SYSZC'] )
		{
			echo $strAdminNoright;
			exit( );
		}
		if ( $au != "0" )
		{
			$msql->query( "select * from {P}_base_adminrights where user='".$_COOKIE['SYSUSER']."' and auth='{$au}'" );
			if ( $msql->next_record( ) )
			{
			}
			else
			{
				echo $strAdminNoright;
				exit( );
			}
		}
	}
	else
	{
		echo $strAdminNoright;
		exit( );
	}
}

function readconfig( )
{
	global $msql;
	$msql->query( "select * from {P}_base_config" );
	while ( $msql->next_record( ) )
	{
		$variable = $msql->f( "variable" );
		$value = $msql->f( "value" );
		$GLOBALS['CONF'][$variable] = $value;
	}
}

function tblcount( $tbl, $id, $scl )
{
	global $msql;
	$msql->query( "select count(".$id.") from {P}".$tbl." where {$scl}" );
	if ( $msql->next_record( ) )
	{
		$totalnums = $msql->f( "count(".$id.")" );
	}
	return $totalnums;
}

function fmpath( $catid )
{
	if ( strlen( $catid ) == 1 )
	{
		$pathid = "000".$catid;
	}
	else if ( strlen( $catid ) == 2 )
	{
		$pathid = "00".$catid;
	}
	else if ( strlen( $catid ) == 3 )
	{
		$pathid = "0".$catid;
	}
	else if ( 4 <= strlen( $catid ) )
	{
		$pathid = $catid;
	}
	return $pathid;
}

function popback( $reson, $self )
{
	echo "<script>alert(\"{$reson}\");\r\n\tself.location='".$self."';\r\n\t</script>";
	exit( );
}

function coltype2sname( $coltype )
{
	global $tsql;
	$tsql->query( "select sname from {P}_base_coltype where coltype='{$coltype}'" );
	if ( $tsql->next_record( ) )
	{
		$sname = $tsql->f( "sname" );
	}
	return $sname;
}

function coltype2colname( $coltype )
{
	global $fsql;
	$fsql->query( "select colname from {P}_base_coltype where coltype='{$coltype}'" );
	if ( $fsql->next_record( ) )
	{
		$colname = $fsql->f( "colname" );
	}
	return $colname;
}

function cat2catpath( $tbl, $catid )
{
	global $msql;
	$msql->query( "select catpath from {$tbl} where catid='{$catid}'" );
	if ( $msql->next_record( ) )
	{
		$catpath = $msql->f( "catpath" );
	}
	return $catpath;
}

function trylimit( $tbl, $n, $i )
{
	global $msql;
	$tbl = "{P}".$tbl;
	if ( $msql->dbrecord( ) )
	{
		$msql->query( "select count(".$i.") from {$tbl}" );
		if ( $msql->next_record( ) )
		{
			$nums = $msql->f( "count(".$i.")" );
			if ( $n <= $nums )
			{
				echo "";
				exit( );
			}
		}
	}
}

function tryfunc( )
{
	global $msql;
	if ( $msql->dbrecord( ) )
	{
		echo "";
		exit( );
	}
}

function showauthtype( )
{
	global $msql;
	if ( $msql->dbrecord( ) )
	{
		return "";
	}
	else
	{
		return "";
	}
}

function csubstr( $str, $start, $len )
{
	preg_match_all( "/[\x01-]|[?ß][€-¿]|à[?¿][€-¿]|[?ï][€-¿][€-¿]|ð[?¿][€-¿][€-¿]|[?÷][€-¿][€-¿][€-¿]/", $str, $ar );
	$x = 1;
	$i = 0;
	for ( ;	$i < sizeof( $ar[0] );	$i++	)
	{
		if ( $len < $i )
		{
			break;
		}
		if ( ord( $ar[0][$i] ) < 128 )
		{
			if ( $x == 2 )
			{
				$len = $len + 1;
				$x = 0;
			}
			$x++;
		}
	}
	return join( "", array_slice( $ar[0], $start, $len ) );
}

function seld( $t, $z )
{
	if ( $t == $z )
	{
		$ret = " selected";
	}
	else
	{
		$ret = " ";
	}
	return $ret;
}

function err( $say, $url, $link )
{
	global $strBack;
	if ( $url == "" )
	{
		$url = "Javascript:history.back();";
	}
	if ( $link == "" )
	{
		$link = $strBack;
	}
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><br><br><table width=366 border=0 cellspacing=2 cellpadding=6 align=center bgcolor=#FFFFFF background=images/err.gif height=199>\r\n  <tr align=center> \r\n    <td height=80 valign=bottom><img src=images/alert.gif></td>\r\n  </tr>\r\n  <tr> \r\n    <td > \r\n      <div align=center> \r\n        <p style='font-size:12px;color:#333333'>".$say." </p>\r\n      </div>\r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=50 align=center><a href=".$url." style='font-size:12px;color:#ff6600'>[".$link."]</a></td>\r\n  </tr>\r\n</table>";
	exit( );
}

function sayok( $say, $url, $link )
{
	global $strBack;
	if ( $url == "" )
	{
		$url = "Javascript:history.back();";
	}
	if ( $link == "" )
	{
		$link = $strBack;
	}
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><br><br><table width=366 border=0 cellspacing=2 cellpadding=6 align=center bgcolor=#FFFFFF background=images/err.gif height=199>\r\n  <tr align=center> \r\n    <td height=80 valign=bottom><img src=images/ok.gif></td>\r\n  </tr>\r\n  <tr> \r\n    <td > \r\n      <div align=center> \r\n        <p>".$say." </p>\r\n      </div>\r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=50 align=center><a href=".$url.">[".$link."]</a></td>\r\n  </tr>\r\n</table>";
	exit( );
}

function checked( $t, $z )
{
	if ( $t == $z )
	{
		$ret = " checked";
	}
	else
	{
		$ret = " ";
	}
	return $ret;
}

function switchdis( $n )
{
	if ( file_exists( ROOTPATH."base/catch/temp" ) )
	{
		$fp = fopen( ROOTPATH."base/catch/temp", "r" );
		$xnums = fread( $fp, 10 );
		fclose( $fp );
		if ( $n < $xnums )
		{
			return " disabled='true' ";
		}
		else
		{
			return "";
		}
	}
	else
	{
		return "";
	}
}

function showtypeimage( $src, $type, $width, $height, $border )
{
	if ( $width != "" && $width != "0" )
	{
		$wstr = " width=".$width." ";
	}
	if ( $height != "" && $height != "0" )
	{
		$hstr = " height=".$height." ";
	}
	if ( substr( $src, 0 - 4 ) == ".swf" )
	{
		$ImageStr = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\"  ".$wstr." ".$hstr."  border=".$border."><param name=movie value=\"".$src."\"><param name=quality value=high><embed src=\"".$src."\"  pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\"  ".$wstr." ".$hstr."  border=".$border."></embed></object>";
	}
	else
	{
		$ImageStr = "<img src=".$src." ".$wstr." ".$hstr."  border=".$border.">";
	}
	return $ImageStr;
}

function url2path( $string )
{
	global $SiteUrl;
	$string = str_replace( $SiteUrl, "[ROOTPATH]", $string );
	return $string;
}

function path2url( $string )
{
	global $SiteUrl;
	$string = str_replace( "[ROOTPATH]", $SiteUrl, $string );
	return $string;
}

function tblinsert( $tbl, $vars )
{
	global $msql;
	$scl = "";
	do
	{
		/*$val = each( &$vars)[1];
		$key = each( &$vars)[0];
		if ( each( &$vars ) )
		{
						$scl .= "`".$key."`='".$val."',";
		}*/
	} while ( 1 );
	$scl = substr( $scl, 0, 0 - 1 );
	$msql->query( "insert into {P}".$tbl." set {$scl}" );
}

function showyn( $str )
{
	if ( $str == "1" || $str == "yes" )
	{
		echo "<img src='images/toolbar_ok.gif'>";
	}
	else
	{
		echo "<img src='images/toolbar_no.gif'>";
	}
}

function showny( $str )
{
	if ( $str == "1" || $str == "yes" )
	{
		echo "<img src='images/toolbar_no.gif'>";
	}
	else
	{
		echo "<img src='images/toolbar_ok.gif'>";
	}
}

function cpfolder( $FromPath, $ToPath )
{
	if ( !is_writable( $ToPath ) )
	{
		echo "Error: Fold (".$ToPath.") is not writable";
		exit( );
	}
	if ( file_exists( $FromPath ) )
	{
		$handle = opendir( $FromPath );
		while ( $ifile = readdir( $handle ) )
		{
			$nowfile = $FromPath."/".$ifile;
			$tofile = $ToPath."/".$ifile;
			if ( $ifile != "." && $ifile != ".." )
			{
				if ( !is_dir( $nowfile ) )
				{
					copy( $nowfile, $tofile );
					chmod( $tofile, 493 );
				}
				else
				{
					if ( !file_exists( $tofile ) )
					{
						mkdir( $tofile, 511 );
					}
					cpfolder( $nowfile, $tofile );
				}
			}
		}
		closedir( $handle );
	}
}

function delfold( $imagefold )
{
	if ( file_exists( $imagefold ) )
	{
		$handle = opendir( $imagefold );
		while ( $image_file = readdir( $handle ) )
		{
			$nowfile = $imagefold."/".$image_file;
			if ( $image_file != "." && $image_file != ".." )
			{
				if ( !is_dir( $nowfile ) )
				{
					unlink( $nowfile );
				}
				else
				{
					delfold( $nowfile );
				}
			}
		}
		closedir( $handle );
		rmdir( $imagefold );
	}
}

function ordsc( $ord, $need, $sc )
{
	if ( $ord == $need )
	{
		if ( $sc == "desc" || $sc == "" )
		{
			echo "<img src='images/arrowdown.gif'>";
		}
		else
		{
			echo "<img src='images/arrowup.gif'>";
		}
	}
}

error_reporting( E_ERROR | E_WARNING | E_PARSE );
set_magic_quotes_runtime( 0 );
include_once( ROOTPATH."config.inc.php" );
include_once( ROOTPATH."version.php" );
include_once( ROOTPATH."includes/db.inc.php" );
include( ROOTPATH."includes/nocatch.php" );
readconfig( );
?>

<?php

//读取整个网站的配置信息
function readconfig( )
{
	$msql = $GLOBALS['msql'];
	$msql->query( "select * from {P}_base_config" );
	while ( $msql->next_record( ) )
	{
		$variable = $msql->f( "variable" );
		$value = $msql->f( "value" );
		$GLOBALS['GLOBALS']['CONF'][$variable] = $value;
	}
	if ( admincheckmodle( ) )
	{
		$GLOBALS['GLOBALS']['CONF']['CatchOpen'] = "0";
	}
}

function mcctrl( )
{
	if ( file_exists( ROOTPATH."lic.php" ) )
	{
		include( ROOTPATH."lic.php" );
		$md5 = md5( $lic_exp.$lic_stat.$lic_dsk.$lic_sd."p1(0)xC^1XcoI91!_DcvP65FcX0o!L(0)" );
		if ( $md5 != $lic_sev )
		{
			header( "location:http://".$lic_sd."/901.htm" );
			exit( );
		}
		$now = time( );
		if ( $lic_exp < $now )
		{
			header( "location:http://".$lic_sd."/902.htm" );
			exit( );
		}
		if ( $lic_stat != "1" )
		{
			header( "location:http://".$lic_sd."/903.htm" );
			exit( );
		}
	}
}
//从数据库中读取某一栏目的某一页面的设置信息
function pageset( $coltype, $pagename )
{
	$msql = $GLOBALS['msql'];
	$msql->query( "select * from {P}_base_pageset where  coltype='{$coltype}' and pagename='{$pagename}'" );
	while ( $msql->next_record( ) )
	{
		$GLOBALS['GLOBALS']['PSET'] = array(
			"id" => $msql->f( "id" ),
			"name" => $msql->f( "name" ),
			"coltype" => $msql->f( "coltype" ),
			"pagename" => $msql->f( "pagename" ),
			"pagetitle" => $msql->f( "pagetitle" ),
			"metakey" => $msql->f( "metakey" ),
			"metacon" => $msql->f( "metacon" ),
			"bgcolor" => $msql->f( "bgcolor" ),
			"bgimage" => $msql->f( "bgimage" ),
			"bgposition" => $msql->f( "bgposition" ),
			"bgrepeat" => $msql->f( "bgrepeat" ),
			"bgatt" => $msql->f( "bgatt" ),
			"containwidth" => $msql->f( "containwidth" ),
			"containbg" => $msql->f( "containbg" ),
			"containmargin" => $msql->f( "containmargin" ),
			"containpadding" => $msql->f( "containpadding" ),
			"containcenter" => $msql->f( "containcenter" ),
			"topbg" => $msql->f( "topbg" ),
			"topwidth" => $msql->f( "top2015-10-09width" ),
			"contentbg" => $msql->f( "contentbg" ),
			"contentwidth" => $msql->f( "contentwidth" ),
			"contentmargin" => $msql->f( "contentmargin" ),
			"bottombg" => $msql->f( "bottombg" ),
			"bottomwidth" => $msql->f( "bottomwidth" ),
			"th" => $msql->f( "th" ),
			"ch" => $msql->f( "ch" ),
			"bh" => $msql->f( "bh" ),
			"buildhtml" => $msql->f( "buildhtml" )
			);
	}
}

function pagedef( $diy, $set )
{
	if ( $set != "" && $set != "0" )
	{
		return $set;
	}
	else
	{
		return $diy;
	}
}

//加载模板
function loadtemp( $tpl )
{
	$strTempNotexists = $GLOBALS['strTempNotexists'];
	$CP = $GLOBALS['PLUSVARS']['pluscoltype'];
	if ( $CP != "" )
	{
		$CP = ROOTPATH.$CP."/";
	}
	else
	{
		$CP = ROOTPATH;
	}
	if ( file_exists( $CP."templates/".$tpl ) )
	{
		$fd = fopen( $CP."templates/".$tpl, r );
		$p = fread( $fd, 300000 );
		fclose( $fd );
		$p = str_replace( "images/", $CP."templates/images/", $p );
		$p = str_replace( "css/", $CP."templates/css/", $p );
		$p = str_replace( "{#RP#}", ROOTPATH, $p );
		$p = str_replace( "{#CP#}", $CP, $p );
		return $p;
	}
	else
	{
		$str = $strTempNotexists."(".$CP."templates/".$tpl.")";
		return $str;
	}
}
//加载基本模板
function loadbasetemp( $tpl )
{
	$strTempNotexists = $GLOBALS['strTempNotexists'];
	if ( file_exists( ROOTPATH."base/templates/".$tpl ) )
	{
		$fd = fopen( ROOTPATH."base/templates/".$tpl, r );
		$p = fread( $fd, 300000 );
		fclose( $fd );
		if ( $GLOBALS['PSET']['bgimage'] != "" && $GLOBALS['PSET']['bgimage'] != "none" )
		{
			$bgimage = str_replace( "url(effect/", "url(".ROOTPATH."effect/", $GLOBALS['PSET']['bgimage'] );
			$p = str_replace( "{#background#}", "style='background:".$GLOBALS['PSET']['bgcolor']." ".$bgimage." ".$GLOBALS['PSET']['bgrepeat']." ".$GLOBALS['PSET']['bgatt']." ".$GLOBALS['PSET']['bgposition']."'", $p );
		}
		else
		{
			$p = str_replace( "{#background#}", "style='background:".$GLOBALS['PSET']['bgcolor']."'", $p );
		}
		$p = str_replace( "{#RP#}", ROOTPATH, $p );
		$p = str_replace( "{#CP#}", $CP, $p );
		return $p;
	}
	else
	{
		$str = $strTempNotexists."(".ROOTPATH."base/templates/".$tpl.")";
		return $str;
	}
}
//加载边框模板
function loadbordertemp( $fold )
{
	$strTempNotexists = $GLOBALS['strTempNotexists'];
	if ( $fold == "1000" )
	{
		$path = ROOTPATH."base/border/".$fold."/tpl.htm";
		$imgpath = ROOTPATH."base/border/".$fold."/images/";
	}
	else if ( substr( $fold, 1, 1 ) == "0" )
	{
		$path = ROOTPATH."base/border/".substr( $fold, 1 )."/".substr( $fold, 0, 1 ).".htm";
		$imgpath = ROOTPATH."base/border/".substr( $fold, 1 )."/images/";
	}
	else
	{
		$path = ROOTPATH."base/border/".substr( $fold, 1 )."/tpl.htm";
		$imgpath = ROOTPATH."base/border/".substr( $fold, 1 )."/images/";
	}
	if ( file_exists( $path ) )
	{
		$fd = fopen( $path, r );
		$p = fread( $fd, 300000 );
		fclose( $fd );
		$p = str_replace( "{#RP#}", ROOTPATH, $p );
		$p = str_replace( "images/", $imgpath, $p );
		return $p;
	}
	else
	{
		$str = "<!-start-><div class='pdv_border' style='border:0'><!-start-><!-end-></div><!-end->";
		return $str;
	}
}
//加载公共模板
function loadcommontemp( $tpl )
{
	$strTempNotexists = $GLOBALS['strTempNotexists'];
	if ( file_exists( "templates/".$tpl ) )
	{
		$fd = fopen( "templates/".$tpl, r );
		$p = fread( $fd, 300000 );
		fclose( $fd );
		return $p;
	}
	else
	{
		$str = $strTempNotexists."(templates/".$tpl.")";
		return $str;
	}
}
//加载用户权限管理模板
function loadmembertemp( $RP, $tpl )
{
	$strTempNotexists = $GLOBALS['strTempNotexists'];
	if ( file_exists( ROOTPATH."member/templates/".$tpl ) )
	{
		$fd = fopen( ROOTPATH."member/templates/".$tpl, r );
		$p = fread( $fd, 300000 );
		fclose( $fd );
		$p = str_replace( "images/", $RP."member/templates/images/", $p );
		$p = str_replace( "css/", $RP."member/templates/css/", $p );
		$p = str_replace( "{#RP#}", $RP, $p );
		return $p;
	}
	else
	{
		$str = $strTempNotexists."(templates/".$tpl.")";
		return $str;
	}
}

//判断是否需要进行管理员权限的验证
function admincheckauth( )
{
	$msql = $GLOBALS['msql'];
	$fsql = $GLOBALS['fsql'];
	if ( !isset( $_COOKIE['SYSUSER'] ) || $_COOKIE['SYSUSER'] == "" )
	{
		return false;
	}
	$msql->query( "select * from {P}_base_admin where user='".$_COOKIE['SYSUSER']."'" );
	if ( $msql->next_record( ) )
	{
		$psd = $msql->f( "password" );
		$needmd5 = md5( $_COOKIE['SYSUSER']."l0aZXUYJ876Mn5rQoL55B".$psd.$_COOKIE['SYSTM'] );
		if ( $needmd5 == $_COOKIE['SYSZC'] )
		{
			$fsql->query( "select id from {P}_base_adminrights where user='".$_COOKIE['SYSUSER']."' and auth='5'" );
			if ( $fsql->next_record( ) )
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

function admincheckmodle( )
{
	if ( isset( $_COOKIE['SYSUSER'] ) && $_COOKIE['SYSUSER'] != "" )
	{
		return true;
	}
	else
	{
		return false;
	}
}

//获取管理员的菜单
function adminmenu( )
{
	$strAdminModle = $GLOBALS['strAdminModle'];
	
	if ( admincheckauth( ) )
	{		
		if ( $_COOKIE['PLUSADMIN'] == "SET" )
		{
			$adminMenu = "\n\n<!-- ".$strAdminModle." -->\n\n";
			$adminMenu .= "<link href='".ROOTPATH."base/templates/css/pe.css' rel='stylesheet' type='text/css' />\n";
			$adminMenu .= "<script type='text/javascript' src='".ROOTPATH."base/js/plusadmin.js'></script>\n";
		}
		else if ( $_COOKIE['PLUSADMIN'] == "READY" )
		{
			$adminMenu = "\n\n<!-- ".$strAdminModle." -->\n\n";
			$adminMenu .= "<link href='".ROOTPATH."base/templates/css/pe.css' rel='stylesheet' type='text/css' />\n";
			$adminMenu .= "<script type='text/javascript' src='".ROOTPATH."base/js/plusenter.js'></script>\n";
		}
	}
	else
	{
		$adminMenu = "";
	}
	return $adminMenu;
}

function printpage( )
{
	$msql = $GLOBALS['msql'];
	$fsql = $GLOBALS['fsql'];
	$tsql = $GLOBALS['tsql'];
	$reload = $GLOBALS['reload'];
	$adminMenu = $GLOBALS['adminMenu'];
	$strMore = $GLOBALS['strMore'];
	if ( $_POST['act'] == "plusset" )
	{
		return printplus( );
		exit( );
	}
	$coltype = $GLOBALS['PSET']['coltype'];
	$pagename = $GLOBALS['PSET']['pagename'];
	$adminMenu = adminmenu( );
	$str = loadbasetemp( "header.htm" );
	$str .= "\n<script>\n";
	$str .= "var PDV_PAGEID='".$GLOBALS['PSET']['id']."'; \nvar PDV_RP='".ROOTPATH."'; \nvar PDV_COLTYPE='".$GLOBALS['PSET']['coltype']."'; \nvar PDV_PAGENAME='".$GLOBALS['PSET']['pagename']."'; \n";
	$str .= "</script>\n";
	$i = 1;
	$msql->query( "select * from {P}_base_plus where plustype='".$coltype."' and pluslocat='".$pagename."' and display!='none' order by zindex" );
	while ( $msql->next_record( ) )
	{
		$pdv[$i] = $msql->f( "id" );
		$ModArr[$i] = $msql->f( "modno" );
		$display[$i] = $msql->f( "display" );
		$w[$i] = $msql->f( "width" );
		$h[$i] = $msql->f( "height" );
		$t[$i] = $msql->f( "top" );
		$l[$i] = $msql->f( "left" );
		$z[$i] = $msql->f( "zindex" );
		$pluslable[$i] = $msql->f( "pluslable" );
		$plusname[$i] = $msql->f( "plusname" );
		$showborder[$i] = $msql->f( "showborder" );
		$coltitle[$i] = $msql->f( "title" );
		$padding[$i] = $msql->f( "padding" );
		$catid[$i] = $msql->f( "catid" );
		$tempname[$i] = $msql->f( "tempname" );
		$tempcolor[$i] = $msql->f( "tempcolor" );
		$shownums[$i] = $msql->f( "shownums" );
		$ord[$i] = $msql->f( "ord" );
		$sc[$i] = $msql->f( "sc" );
		$showtj[$i] = $msql->f( "showtj" );
		$cutword[$i] = $msql->f( "cutword" );
		$cutbody[$i] = $msql->f( "cutbody" );
		$picw[$i] = $msql->f( "picw" );
		$pich[$i] = $msql->f( "pich" );
		$fittype[$i] = $msql->f( "fittype" );
		$target[$i] = $msql->f( "target" );
		$body[$i] = $msql->f( "body" );
		$pic[$i] = $msql->f( "pic" );
		$attach[$i] = $msql->f( "attach" );
		$text[$i] = $msql->f( "text" );
		$link[$i] = $msql->f( "link" );
		$piclink[$i] = $msql->f( "piclink" );
		$word[$i] = $msql->f( "word" );
		$word1[$i] = $msql->f( "word1" );
		$word2[$i] = $msql->f( "word2" );
		$word3[$i] = $msql->f( "word3" );
		$word4[$i] = $msql->f( "word4" );
		$text1[$i] = $msql->f( "text1" );
		$code[$i] = $msql->f( "code" );
		$link1[$i] = $msql->f( "link1" );
		$link2[$i] = $msql->f( "link2" );
		$link3[$i] = $msql->f( "link3" );
		$link4[$i] = $msql->f( "link4" );
		$tags[$i] = $msql->f( "tags" );
		$movi[$i] = $msql->f( "movi" );
		$sourceurl[$i] = $msql->f( "sourceurl" );
		$overflow[$i] = $msql->f( "overflow" );
		$bodyzone[$i] = $msql->f( "bodyzone" );
		$groupid[$i] = $msql->f( "groupid" );
		$projid[$i] = $msql->f( "projid" );
		$bordercolor[$i] = $msql->f( "bordercolor" );
		$backgroundcolor[$i] = $msql->f( "backgroundcolor" );
		$borderwidth[$i] = $msql->f( "borderwidth" );
		$borderstyle[$i] = $msql->f( "borderstyle" );
		$borderlable[$i] = $msql->f( "borderlable" );
		$borderroll[$i] = $msql->f( "borderroll" );
		$showbar[$i] = $msql->f( "showbar" );
		$barbg[$i] = $msql->f( "barbg" );
		$barcolor[$i] = $msql->f( "barcolor" );
		$morelink[$i] = $msql->f( "morelink" );
		$pluscoltype[$i] = $msql->f( "coltype" );
		$i++;
	}
	
	for ( $p = 1;	$p < $i;	$p++	)
	{
		if ( $overflow[$p] != "visible" )
		{
			$FlowHeight = "height:100%";
		}
		else
		{
			$FlowHeight = "";
		}
		if ( $pluscoltype[$p] != "menu" && $pluscoltype[$p] != "effect" )
		{
			$divTitle = "title='".$coltitle[$p]."'";
		}
		else
		{
			$divTitle = "";
		}
		$bodyArr[$bodyzone[$p]] .= "\n\n<!-- ".$plusname[$p]." -->\n";
		$bodyArr[$bodyzone[$p]] .= "\n<div id='pdv_".$pdv[$p]."' class='pdv_class'  ".$divTitle." style='width:".$w[$p]."px;height:".$h[$p]."px;top:".$t[$p]."px;left:".$l[$p]."px; z-index:".$p."'>";
		$bodyArr[$bodyzone[$p]] .= "\n<div id='spdv_".$pdv[$p]."' class='pdv_".$bodyzone[$p]."' style='overflow:".$overflow[$p].";width:100%;".$FlowHeight."'>";
		$BorederArr = splittbltemp( loadbordertemp( $showborder[$p] ) );
		if ( $morelink[$p] == "" || $morelink[$p] == "http://" || $morelink[$p] == "-1" )
		{
			$showmore = "none";
		}
		else
		{
			$showmore = "inline";
		}
		$var = array(
			"pdvid" => $pdv[$p],
			"coltitle" => $coltitle[$p],
			"padding" => $padding[$p],
			"morelink" => $morelink[$p],
			"showmore" => $showmore,
			"borderwidth" => $borderwidth[$p],
			"bordercolor" => $bordercolor[$p],
			"borderstyle" => $borderstyle[$p],
			"borderlable" => $borderlable[$p],
			"borderroll" => $borderroll[$p],
			"backgroundcolor" => $backgroundcolor[$p],
			"showbar" => $showbar[$p],
			"barbg" => $barbg[$p],
			"barcolor" => $barcolor[$p]
			);
		$bodyArr[$bodyzone[$p]] .= showtpltemp( $BorederArr['start'], $var );
		if ( substr( $pluslable[$p], 0, 3 ) == "mod" )
		{
			$ModName = substr( $pluslable[$p], 3 );
			$ModFile = $ModName.".php";
			$ModNo = $ModArr[$p];
			$ModPath = ROOTPATH.$pluscoltype[$p]."/module/".$ModFile;
			if ( file_exists( $ModPath ) && !strstr( $ModFile, "/" ) )
			{
				include_once( $ModPath );
				$func = $ModName;
				if ( function_exists( $func ) )
				{
					$GLOBALS['GLOBALS']['PLUSVARS'] = array(
						"pagename" => $GLOBALS['PSET']['pagename'],
						"pdv" => $pdv[$p],
						"tempname" => $tempname[$p],
						"tempcolor" => $tempcolor[$p],
						"pluscoltype" => $pluscoltype[$p],
						"coltitle" => $coltitle[$p],
						"cutbody" => $cutbody[$p],
						"picw" => $picw[$p],
						"pich" => $pich[$p],
						"fittype" => $fittype[$p],
						"shownums" => $shownums[$p],
						"ord" => $ord[$p],
						"sc" => $sc[$p],
						"showtj" => $showtj[$p],
						"cutword" => $cutword[$p],
						"target" => $target[$p],
						"pic" => $pic[$p],
						"attach" => $attach[$p],
						"text" => $text[$p],
						"link" => $link[$p],
						"piclink" => $piclink[$p],
						"word" => $word[$p],
						"word1" => $word1[$p],
						"word2" => $word2[$p],
						"word3" => $word3[$p],
						"word4" => $word4[$p],
						"text1" => $text1[$p],
						"code" => $code[$p],
						"link1" => $link1[$p],
						"link2" => $link2[$p],
						"link3" => $link3[$p],
						"link4" => $link4[$p],
						"tags" => $tags[$p],
						"movi" => $movi[$p],
						"sourceurl" => $sourceurl[$p],
						"w" => $w[$p],
						"h" => $h[$p],
						"l" => $l[$p],
						"t" => $t[$p],
						"z" => $z[$p],
						"showborder" => $showborder[$p],
						"padding" => $padding[$p],
						"groupid" => $groupid[$p],
						"projid" => $projid[$p],
						"body" => $body[$p],
						"catid" => $catid[$p]
						);
					$bodyArr[$bodyzone[$p]] .= $func( );
				}
				else
				{
					$bodyArr[$bodyzone[$p]] .= "module function not exist";
				}
			}
			else
			{
				$bodyArr[$bodyzone[$p]] .= "module file (".$ModPath.") not exist ";
			}
		}
		else
		{
			$bodyArr[$bodyzone[$p]] .= "plus not a module";
		}
		$bodyArr[$bodyzone[$p]] .= $BorederArr['end'];
		$bodyArr[$bodyzone[$p]] .= "\n</div>";
		$bodyArr[$bodyzone[$p]] .= "\n</div>";
	}
	$str .= "\n<div id='contain' style='width:".$GLOBALS['PSET']['containwidth']."px;";
	$str .= "background:".str_replace( "url(effect/", "url(".ROOTPATH."effect/", $GLOBALS['PSET']['containbg'] ).";margin:".$GLOBALS['PSET']['containmargin']."px ".$GLOBALS['PSET']['containcenter'].";padding:".$GLOBALS['PSET']['containpadding']."px'>\n\n";
	$str .= "<div id='top' style='width:".$GLOBALS['PSET']['containwidth']."px;height:".$GLOBALS['PSET']['th']."px;background:".str_replace( "url(effect/", "url(".ROOTPATH."effect/", $GLOBALS['PSET']['topbg'] )."'>\n";
	$str .= $bodyArr['top'];
	$str .= "\n</div>\n";
	$str .= "<div id='content' style='width:".$GLOBALS['PSET']['containwidth']."px;height:".$GLOBALS['PSET']['ch']."px;background:".str_replace( "url(effect/", "url(".ROOTPATH."effect/", $GLOBALS['PSET']['contentbg'] ).";margin:".$GLOBALS['PSET']['contentmargin']."px auto'>\n";
	$str .= $bodyArr['content'];
	$str .= "\n</div>\n";
	$str .= "<div id='bottom' style='width:".$GLOBALS['PSET']['containwidth']."px;height:".$GLOBALS['PSET']['bh']."px;background:".str_replace( "url(effect/", "url(".ROOTPATH."effect/", $GLOBALS['PSET']['bottombg'] )."'>\n";
	$str .= $bodyArr['bottom'];
	$str .= "\n</div>\n";
	$str .= "</div>";
	$str .= "<div id='bodyex'>\n";
	$str .= $bodyArr['bodyex'].$adminMenu;
	$str .= "\n</div>\n";
	$GLOBALS['GLOBALS']['PLUSVARS'] = "";
	$str .= loadbasetemp( "foot.htm" );
	if ( $GLOBALS['PSET']['pagetitle'] != "" )
	{
		$GLOBALS['GLOBALS']['pagetitle'] = $GLOBALS['PSET']['pagetitle'];
	}
	if ( $GLOBALS['PSET']['metakey'] != "" )
	{
		$GLOBALS['GLOBALS']['metakey'] = $GLOBALS['PSET']['metakey'];
	}
	if ( $GLOBALS['PSET']['metacon'] != "" )
	{
		$GLOBALS['GLOBALS']['metacon'] = $GLOBALS['PSET']['metacon'];
	}
	$GLOBALS['GLOBALS']['winpop'] = winpop( );
	$str = showactive( $str );
	echo $str;
	if ( $GLOBALS['PSET']['buildhtml'] != "" && $GLOBALS['PSET']['buildhtml'] != "0" )
	{
		switch ( $GLOBALS['PSET']['buildhtml'] )
		{
			case "index" :
				buildhtml( "index", $str );
				break;
			default :
				buildhtml( "id", $str );
				break;
		}
	}
	
}

function printplus( )
{
	$msql = $GLOBALS['msql'];
	$fsql = $GLOBALS['fsql'];
	$strMore = $GLOBALS['strMore'];
	$pdvid = $_POST['pdvid'];
	$plusid = substr( $pdvid, 4 );
	$i = 1;
	$msql->query( "select * from {P}_base_plus where id='{$plusid}'" );
	if ( $msql->next_record( ) )
	{
		$pdv[$i] = $msql->f( "id" );
		$ModArr[$i] = $msql->f( "modno" );
		$display[$i] = $msql->f( "display" );
		$w[$i] = $msql->f( "width" );
		$h[$i] = $msql->f( "height" );
		$t[$i] = $msql->f( "top" );
		$l[$i] = $msql->f( "left" );
		$z[$i] = $msql->f( "zindex" );
		$pluslable[$i] = $msql->f( "pluslable" );
		$plusname[$i] = $msql->f( "plusname" );
		$showborder[$i] = $msql->f( "showborder" );
		$coltitle[$i] = $msql->f( "title" );
		$padding[$i] = $msql->f( "padding" );
		$catid[$i] = $msql->f( "catid" );
		$tempname[$i] = $msql->f( "tempname" );
		$tempcolor[$i] = $msql->f( "tempcolor" );
		$shownums[$i] = $msql->f( "shownums" );
		$ord[$i] = $msql->f( "ord" );
		$sc[$i] = $msql->f( "sc" );
		$showtj[$i] = $msql->f( "showtj" );
		$cutword[$i] = $msql->f( "cutword" );
		$cutbody[$i] = $msql->f( "cutbody" );
		$picw[$i] = $msql->f( "picw" );
		$pich[$i] = $msql->f( "pich" );
		$fittype[$i] = $msql->f( "fittype" );
		$target[$i] = $msql->f( "target" );
		$body[$i] = $msql->f( "body" );
		$pic[$i] = $msql->f( "pic" );
		$attach[$i] = $msql->f( "attach" );
		$text[$i] = $msql->f( "text" );
		$link[$i] = $msql->f( "link" );
		$piclink[$i] = $msql->f( "piclink" );
		$word[$i] = $msql->f( "word" );
		$word1[$i] = $msql->f( "word1" );
		$word2[$i] = $msql->f( "word2" );
		$word3[$i] = $msql->f( "word3" );
		$word4[$i] = $msql->f( "word4" );
		$text1[$i] = $msql->f( "text1" );
		$code[$i] = $msql->f( "code" );
		$link1[$i] = $msql->f( "link1" );
		$link2[$i] = $msql->f( "link2" );
		$link3[$i] = $msql->f( "link3" );
		$link4[$i] = $msql->f( "link4" );
		$tags[$i] = $msql->f( "tags" );
		$movi[$i] = $msql->f( "movi" );
		$sourceurl[$i] = $msql->f( "sourceurl" );
		$overflow[$i] = $msql->f( "overflow" );
		$bodyzone[$i] = $msql->f( "bodyzone" );
		$groupid[$i] = $msql->f( "groupid" );
		$projid[$i] = $msql->f( "projid" );
		$bordercolor[$i] = $msql->f( "bordercolor" );
		$backgroundcolor[$i] = $msql->f( "backgroundcolor" );
		$borderwidth[$i] = $msql->f( "borderwidth" );
		$borderstyle[$i] = $msql->f( "borderstyle" );
		$borderlable[$i] = $msql->f( "borderlable" );
		$borderroll[$i] = $msql->f( "borderroll" );
		$showbar[$i] = $msql->f( "showbar" );
		$barbg[$i] = $msql->f( "barbg" );
		$barcolor[$i] = $msql->f( "barcolor" );
		$morelink[$i] = $msql->f( "morelink" );
		$pluscoltype[$i] = $msql->f( "coltype" );
		$i++;
	}
	
	for ( $p = 1;	$p < $i;	$p++	)
	{
		if ( $overflow[$p] != "visible" )
		{
			$FlowHeight = "height:100%;";
		}
		else
		{
			$FlowHeight = "";
		}
		if ( $pluscoltype[$p] != "menu" && $pluscoltype[$p] != "effect" )
		{
			$divTitle = "title='".$coltitle[$p]."'";
		}
		else
		{
			$divTitle = "";
		}
		$str .= "\n<div id='pdv_".$pdv[$p]."' class='pdv_class'  ".$divTitle." style='width:".$w[$p]."px;height:".$h[$p]."px;top:".$t[$p]."px;left:".$l[$p]."px; z-index:90'>";
		$str .= "<div id='spdv_".$pdv[$p]."' class='pdv_".$bodyzone[$p]."' style='overflow:".$overflow[$p].";width:100%;".$FlowHeight."'>";
		$BorederArr = splittbltemp( loadbordertemp( $showborder[$p] ) );
		if ( $morelink[$p] == "" || $morelink[$p] == "http://" || $morelink[$p] == "-1" )
		{
			$showmore = "none";
		}
		else
		{
			$showmore = "inline";
		}
		$var = array(
			"pdvid" => $pdv[$p],
			"coltitle" => $coltitle[$p],
			"padding" => $padding[$p],
			"morelink" => $morelink[$p],
			"showmore" => $showmore,
			"borderwidth" => $borderwidth[$p],
			"bordercolor" => $bordercolor[$p],
			"borderstyle" => $borderstyle[$p],
			"borderlable" => $borderlable[$p],
			"borderroll" => $borderroll[$p],
			"backgroundcolor" => $backgroundcolor[$p],
			"showbar" => $showbar[$p],
			"barbg" => $barbg[$p],
			"barcolor" => $barcolor[$p]
			);
		$str .= showtpltemp( $BorederArr['start'], $var );
		if ( substr( $pluslable[$p], 0, 3 ) == "mod" )
		{
			$ModName = substr( $pluslable[$p], 3 );
			$ModFile = $ModName.".php";
			$ModNo = $ModArr[$p];
			if ( $pluscoltype[$p] != "" )
			{
				$ModPath = ROOTPATH.$pluscoltype[$p]."/module/".$ModFile;
			}
			else
			{
				$ModPath = ROOTPATH."module/".$ModFile;
			}
			if ( file_exists( $ModPath ) && !strstr( $ModFile, "/" ) )
			{
				include_once( $ModPath );
				$func = $ModName;
				if ( function_exists( $func ) )
				{
					$GLOBALS['GLOBALS']['PLUSVARS'] = array(
						"pagename" => $GLOBALS['PSET']['pagename'],
						"pdv" => $pdv[$p],
						"tempname" => $tempname[$p],
						"tempcolor" => $tempcolor[$p],
						"pluscoltype" => $pluscoltype[$p],
						"coltitle" => $coltitle[$p],
						"cutbody" => $cutbody[$p],
						"picw" => $picw[$p],
						"pich" => $pich[$p],
						"fittype" => $fittype[$p],
						"shownums" => $shownums[$p],
						"ord" => $ord[$p],
						"sc" => $sc[$p],
						"showtj" => $showtj[$p],
						"cutword" => $cutword[$p],
						"target" => $target[$p],
						"pic" => $pic[$p],
						"attach" => $attach[$p],
						"text" => $text[$p],
						"link" => $link[$p],
						"piclink" => $piclink[$p],
						"word" => $word[$p],
						"word1" => $word1[$p],
						"word2" => $word2[$p],
						"word3" => $word3[$p],
						"word4" => $word4[$p],
						"text1" => $text1[$p],
						"code" => $code[$p],
						"link1" => $link1[$p],
						"link2" => $link2[$p],
						"link3" => $link3[$p],
						"link4" => $link4[$p],
						"tags" => $tags[$p],
						"movi" => $movi[$p],
						"sourceurl" => $sourceurl[$p],
						"w" => $w[$p],
						"h" => $h[$p],
						"l" => $l[$p],
						"t" => $t[$p],
						"z" => $z[$p],
						"showborder" => $showborder[$p],
						"padding" => $padding[$p],
						"groupid" => $groupid[$p],
						"projid" => $projid[$p],
						"body" => $body[$p],
						"catid" => $catid[$p]
						);
					$str .= $func( );
				}
				else
				{
					$str .= "module function not exist";
				}
			}
			else
			{
				$str .= "module file (".$ModPath.") not exist ";
			}
		}
		else
		{
			$str .= "plus not a module";
		}
		$str .= $BorederArr['end'];
		$str .= "</div>";
		$str .= "</div>";
	}
	$str = str_replace( "\r", "", $str );
	$str = str_replace( "\n", "", $str );
	$str = showactive( $str );
	echo $str;
	exit( );
}

function showactive( $EditCon )
{
	$EditCon = str_replace( "{#sitename#}", $GLOBALS['CONF']['SiteName'], $EditCon );
	$EditCon = str_replace( "[ROOTPATH]", ROOTPATH, $EditCon );
	$EditCon = str_replace( "{#RP#}", ROOTPATH, $EditCon );
	$array = explode( "{#", $EditCon );
	$EditCon = $array[0];
	
	for ( $t = 1;	$t < sizeof( $array );	$t++	)
	{
		$arrayx = explode( "#}", $array[$t] );
		if ( isset( $GLOBALS[$arrayx[0]] ) )
		{
			$CodeString = $GLOBALS[$arrayx[0]];
		}
		else
		{
			$CodeString = "";
		}
		$EditCon .= $CodeString;
		$EditCon .= $arrayx[1];
	}
	return $EditCon;
}

function showtpltemp( $EditCon, $var )
{
	$array = explode( "{#", $EditCon );
	$EditCon = $array[0];
	
	for ( $t = 1;	$t < sizeof( $array );	$t++	)
	{
		$arrayx = explode( "#}", $array[$t] );
		if ( isset( $var[$arrayx[0]] ) )
		{
			$CodeString = $var[$arrayx[0]];
		}
		else
		{
			$CodeString = "{#".$arrayx[0]."#}";
		}
		$EditCon .= $CodeString;
		$EditCon .= $arrayx[1];
	}
	return $EditCon;
}

function splittbltemp( $Temp )
{
	$arr = explode( "<!-start->", $Temp );
	$TempArr['start'] = $arr[1];
	$arr = explode( "<!-rowstart->", $Temp );
	$TempArr['rowstart'] = $arr[1];
	$arr = explode( "<!-menu->", $Temp );
	$TempArr['menu'] = $arr[1];
	$arr = explode( "<!-menunow->", $Temp );
	$TempArr['menunow'] = $arr[1];
	$arr = explode( "<!-secondmenu->", $Temp );
	$TempArr['secondmenu'] = $arr[1];
	$arr = explode( "<!-input->", $Temp );
	$TempArr['input'] = $arr[1];
	$arr = explode( "<!-textarea->", $Temp );
	$TempArr['textarea'] = $arr[1];
	$arr = explode( "<!-rowend->", $Temp );
	$TempArr['rowend'] = $arr[1];
	$arr = explode( "<!-end->", $Temp );
	$TempArr['end'] = $arr[1];
	$arr = explode( "<!-list->", $Temp );
	$TempArr['list'] = $arr[1];
	$arr = explode( "<!-con->", $Temp );
	$TempArr['con'] = $arr[1];
	$arr = explode( "<!-col->", $Temp );
	$TempArr['col'] = $arr[1];
	$arr = explode( "<!-text->", $Temp );
	$TempArr['text'] = $arr[1];
	$arr = explode( "<!-link->", $Temp );
	$TempArr['link'] = $arr[1];
	$arr = explode( "<!-form->", $Temp );
	$TempArr['form'] = $arr[1];
	$arr = explode( "<!-notice->", $Temp );
	$TempArr['notice'] = $arr[1];
	$arr = explode( "<!-more->", $Temp );
	$TempArr['more'] = $arr[1];
	$arr = explode( "<!-m0->", $Temp );
	$TempArr['m0'] = $arr[1];
	$arr = explode( "<!-m1->", $Temp );
	$TempArr['m1'] = $arr[1];
	$arr = explode( "<!-m2->", $Temp );
	$TempArr['m2'] = $arr[1];
	$arr = explode( "<!-m3->", $Temp );
	$TempArr['m3'] = $arr[1];
	$arr = explode( "<!-ok1->", $Temp );
	$TempArr['ok1'] = $arr[1];
	$arr = explode( "<!-ok2->", $Temp );
	$TempArr['ok2'] = $arr[1];
	$arr = explode( "<!-err1->", $Temp );
	$TempArr['err1'] = $arr[1];
	$arr = explode( "<!-err2->", $Temp );
	$TempArr['err2'] = $arr[1];
	$arr = explode( "<!-err3->", $Temp );
	$TempArr['err3'] = $arr[1];
	$arr = explode( "<!-err4->", $Temp );
	$TempArr['err4'] = $arr[1];
	$arr = explode( "<!-err5->", $Temp );
	$TempArr['err5'] = $arr[1];
	return $TempArr;
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

function buildhtml( $htmltype, $PageAll )
{
	if ( admincheckmodle( ) )
	{
		return "";
	}
	if ( strstr( $_SERVER['QUERY_STRING'], ".html" ) )
	{
		$arr = explode( ".html", $_SERVER['QUERY_STRING'] );
		$htmlid = $arr[0];
		if ( $htmlid != "" && ( $_SERVER['QUERY_STRING'] == $htmlid.".html" || $_GET['htmlversion'] != "" ) )
		{
			$ifbuild = "yes";
		}
		else
		{
			return "";
		}
	}
	else if ( $htmltype == "index" )
	{
		$htmlid = "index";
		$ifbuild = "yes";
	}
	else
	{
		return "";
	}
	if ( $GLOBALS['CONF']['CatchOpen'] != "1" || 0 < $GLOBALS['consecure'] )
	{
		if ( file_exists( "./".$htmlid.".html" ) )
		{
			@unlink( "./".$htmlid.".html" );
		}
		return "";
	}
	if ( $ifbuild == "yes" )
	{
		$vertime = time( );
		$CatchTime = $GLOBALS['CONF']['CatchTime'];
		$reload = "<script>BuildHtml('".ROOTPATH."','".$vertime."','".$CatchTime."','".$htmlid."');</script>";
		$PageAll = str_replace( "<!-reload-!>", $reload, $PageAll );
		if ( !is_writable( "./" ) )
		{
			echo "Error: Fold (./) is not writable";
			exit( );
		}
		$fd = fopen( "./".$htmlid.".html", w );
		fwrite( $fd, $PageAll, 300000 );
		fclose( $fd );
	}
}

function delfold( $imagefold )
{
	if ( file_exists( $imagefold ) )
	{
		$handle = opendir( $imagefold );
		while ( $image_file = readdir( $handle ) )
		{
			$nowfile = "{$imagefold}/{$image_file}";
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

function tblcount( $tbl, $id, $scl )
{
	$fsql = $GLOBALS['fsql'];
	$fsql->query( "select count(".$id.") from {P}".$tbl." where {$scl}" );
	if ( $fsql->next_record( ) )
	{
		$totalnums = $fsql->f( "count(".$id.")" );
	}
	return $totalnums;
}

function csubstr( $str, $start, $len )
{
	preg_match_all( "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $str, $ar );

	$x = 1;
	
	for ( $i = 0;	$i < sizeof( $ar[0] );	$i++	)
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

function saytemp( $say, $link, $url, $Temp )
{
	$Temp = str_replace( "{#url#}", $url, $Temp );
	$Temp = str_replace( "{#link#}", $link, $Temp );
	$Temp = str_replace( "{#say#}", $say, $Temp );
	return $Temp;
}

function err( $say, $url, $link )
{
	$strBack = $GLOBALS['strBack'];
	if ( $url == "" )
	{
		$url = "Javascript:history.back();";
	}
	if ( $link == "" )
	{
		$link = $strBack;
	}
	$string = loadtemp( "tpl_err.htm" );
	$string = saytemp( $say, $link, $url, $string );
	return $string;
}

function sayok( $say, $url, $link )
{
	$strBack = $GLOBALS['strBack'];
	if ( $url == "" )
	{
		$url = "Javascript:history.back();";
	}
	if ( $link == "" )
	{
		$link = $strBack;
	}
	$string = loadtemp( "tpl_ok.htm" );
	$string = saytemp( $say, $link, $url, $string );
	return $string;
}

function islogin( )
{
	if ( isset( $_COOKIE['MUSER'], $_COOKIE['MEMBERID'] ) && isset( $_COOKIE['ZC'] ) && $_COOKIE['MEMBERID'] != "" && $_COOKIE['MUSER'] != "" && $_COOKIE['ZC'] != "" )
	{
		$md5 = md5( $_COOKIE['MUSER']."76|01|14".$_COOKIE['MEMBERID'].$_COOKIE['MEMBERTYPE'].$_COOKIE['SE'] );
		if ( $_COOKIE['ZC'] == $md5 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

function securemember( )
{
	if ( !isset( $_COOKIE['MUSER'] ) || !isset( $_COOKIE['ZC'] ) || $_COOKIE['MUSER'] == "" || $_COOKIE['ZC'] == "" || $_COOKIE['MEMBERTYPEID'] == "" )
	{
		echo "<script>top.location='".ROOTPATH."member/login.php'</script>";
		exit( );
	}
	else
	{
		$md5 = md5( $_COOKIE['MUSER']."76|01|14".$_COOKIE['MEMBERID'].$_COOKIE['MEMBERTYPE'].$_COOKIE['SE'] );
		if ( $_COOKIE['ZC'] != $md5 )
		{
			echo "<script>top.location='".ROOTPATH."member/login.php'</script>";
			exit( );
		}
	}
}

function securefunc( $secureid )
{
	$fsql = $GLOBALS['fsql'];
	$memberid = $_COOKIE['MEMBERID'];
	$fsql->query( "select id from {P}_member_rights where memberid='{$memberid}' and secureid='{$secureid}'" );
	if ( $fsql->next_record( ) )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function secureclass( $secureid )
{
	$fsql = $GLOBALS['fsql'];
	$memberid = $_COOKIE['MEMBERID'];
	$fsql->query( "select secureset from {P}_member_rights where memberid='{$memberid}' and secureid='{$secureid}'" );
	if ( $fsql->next_record( ) )
	{
		$secureset = $fsql->f( "secureset" );
		return $secureset;
	}
	else
	{
		return "0";
	}
}

function securebanzhu( $secureid )
{
	$fsql = $GLOBALS['fsql'];
	$memberid = $_COOKIE['MEMBERID'];
	$fsql->query( "select secureset from {P}_member_rights where memberid='{$memberid}' and secureid='{$secureid}'" );
	if ( $fsql->next_record( ) )
	{
		$secureset = $fsql->f( "secureset" );
		return $secureset;
	}
	else
	{
		return "0";
	}
}

function membercentupdate( $memberid, $event )
{
	$tsql = $GLOBALS['tsql'];
	if ( $memberid == "" || $memberid == "0" || $memberid == "-1" )
	{
		return false;
	}
	$tsql->query( "select * from {P}_member_centrule where event='{$event}'" );
	if ( $tsql->next_record( ) )
	{
		$cent1 = $tsql->f( "cent1" );
		$cent2 = $tsql->f( "cent2" );
		$cent3 = $tsql->f( "cent3" );
		$cent4 = $tsql->f( "cent4" );
		$cent5 = $tsql->f( "cent5" );
	}
	$tsql->query( "update {P}_member set\r\n\t`cent1`=cent1+{$cent1},\r\n\t`cent2`=cent2+{$cent2},\r\n\t`cent3`=cent3+{$cent3},\r\n\t`cent4`=cent4+{$cent4},\r\n\t`cent5`=cent5+{$cent5}\r\n\twhere memberid='{$memberid}'" );
	$now = time( );
	$tsql->query( "insert into {P}_member_centlog set\r\n\t`memberid`='{$memberid}',\r\n\t`dtime`='{$now}',\r\n\t`event`='{$event}',\r\n\t`cent1`='{$cent1}',\r\n\t`cent2`='{$cent2}',\r\n\t`cent3`='{$cent3}',\r\n\t`cent4`='{$cent4}',\r\n\t`cent5`='{$cent5}'\r\n\t " );
}

function url2path( $string )
{
	$SiteUrl = $GLOBALS['SiteUrl'];
	$string = str_replace( $SiteUrl, "[ROOTPATH]", $string );
	return $string;
}

function path2url( $string )
{
	$SiteUrl = $GLOBALS['SiteUrl'];
	$string = str_replace( "[ROOTPATH]", $SiteUrl, $string );
	return $string;
}

function winpop( )
{
	$msql = $GLOBALS['msql'];
	$msql->query( "select * from {P}_advs_pop where ifpop='1'" );
	if ( $msql->next_record( ) )
	{
		$popid = $msql->f( "id" );
		$popwidth = $msql->f( "popwidth" );
		$popheight = $msql->f( "popheight" );
		$popleft = $msql->f( "popleft" );
		$poptop = $msql->f( "poptop" );
		$poptoolbar = $msql->f( "poptoolbar" );
		$popmenubar = $msql->f( "popmenubar" );
		$popstatus = $msql->f( "popstatus" );
		$poplocation = $msql->f( "poplocation" );
		$popscrollbars = $msql->f( "popscrollbars" );
		$popresizable = $msql->f( "popresizable" );
		$str = "<script>window.open('".ROOTPATH."advs/pop.php','pop','width=".$popwidth.",height=".$popheight.",left=".$popleft.",top=".$poptop.",toolbar=".$poptoolbar.",menubar=".$popmenubar.",status=".$popstatus.",location=".$poplocation.",scrollbars=".$popscrollbars.",resizable=".$popresizable."')</script>";
	}
	return $str;
}

//报告运行时错误
error_reporting( E_ERROR | E_WARNING | E_PARSE );
//用来设置PHP 环境配置的变量 magic_quotes_runtime 值。0-关闭 1-打开
set_magic_quotes_runtime( 0 );
if ( $_GET['htmlversion'] != "" && $_GET['htmlcatchtime'] != "" )
{
	$exp = $_GET['htmlversion'] + $_GET['htmlcatchtime'];
	$now = time( );
	if ( $now <= $exp )
	{
		echo "0";
		exit( );
	}
	if ( admincheckmodle( ) )
	{
		echo "NOCATCH";
		exit( );
	}
}
include_once( ROOTPATH."config.inc.php" );//数据库及网站所有语言相关配置所在文件
include_once( ROOTPATH."version.php" );//版本定义所在的文件
include_once( ROOTPATH."base/language/".$sLan.".php" );//网站语言常量所定义的文件
include_once( ROOTPATH."includes/db.inc.php" );
readconfig( );
?>

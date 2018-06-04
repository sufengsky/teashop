<?php

/*
	[插件名称] 轮播广告xml
	[适用范围] 全站
*/

function AdvsLbXml () { 

	global $msql;

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$w=$GLOBALS["PLUSVARS"]["w"];
	$h=$GLOBALS["PLUSVARS"]["h"];
	
	//模版解释
	$Temp=LoadTemp($tempname);

	$var=array (
	'groupid' => $groupid, 
	'w' => $w, 
	'h' => $h
	);
	
	$str=ShowTplTemp($Temp,$var);

	return $str;

	
}



?>
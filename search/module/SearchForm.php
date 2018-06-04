<?php

/*
	[插件名称] 全站搜索表单
	[适用范围] 全站
*/


function SearchForm(){

	global $msql,$fsql;
	
	
	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$key=htmlspecialchars($_GET["key"]);
	$myord=htmlspecialchars($_GET["myord"]);
	$myshownums=htmlspecialchars($_GET["myshownums"]);


	//模版解释
	$Temp=LoadTemp($tempname);

	$var=array (
	'coltitle' => $coltitle,
	'myshownums' => $myshownums, 
	'myord' => $myord, 
	'key' => $key
	);

	$str=ShowTplTemp($Temp,$var);

	return $str;


}
?>
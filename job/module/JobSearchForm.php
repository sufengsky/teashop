<?php

/*
	[插件名称] 搜索表单
	[适用范围] 招聘
*/


function JobSearchForm(){

	
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	

	$key=$_GET["key"];
	

	//模版解释
	$Temp=LoadTemp($tempname);

	$var=array (
	'key' => $key
	);

	$str=ShowTplTemp($Temp,$var);

	return $str;


}
?>
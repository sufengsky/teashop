<?php

/*
	[插件名称] 脚注信息
	[适用范围] 全站统一
*/

function ButtomInfo(){

	global $fsql;


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$body=$GLOBALS["PLUSVARS"]["body"];

	$Temp=LoadTemp($tempname);


	$var=array (
		'coltitle' => $coltitle,
		'body' => $body
	);


	
	$str=ShowTplTemp($Temp,$var);
	return $str;

}

?>
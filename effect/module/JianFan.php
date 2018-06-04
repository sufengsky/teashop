<?php

/*
	[插件名称] 简繁转换插件
	[适用范围] 全站
*/

function JianFan() { 
	


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	$Temp=LoadTemp($tempname);

	$var=array (
		'coltitle' => $coltitle
	);

	$str=ShowTplTemp($Temp,$var);
	return $str;


		
}



?>
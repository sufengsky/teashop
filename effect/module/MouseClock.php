<?php

/*
	[插件名称] 跟鼠标跑的时钟
	[适用范围] 全站
*/

function MouseClock() { 
	


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
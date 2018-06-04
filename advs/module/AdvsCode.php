<?php

/*
	[插件名称] 广告代码
	[适用范围] 全站
*/

function AdvsCode() { 
	
	global $msql;


	$code=$GLOBALS["PLUSVARS"]["code"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	$Temp=LoadTemp($tempname);


	$var=array (
		'code' => $code
	);
	
	$str=ShowTplTemp($Temp,$var);

	return $str;


		
}



?>
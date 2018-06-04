<?php

/*
	[插件名称] 背景素材
	[适用范围] 全站
*/

function BgSource() { 

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$sourceurl=$GLOBALS["PLUSVARS"]["sourceurl"];

	$Temp=LoadTemp($tempname);

	$var=array (
		'sourceurl' => $sourceurl
	);

	$str=ShowTplTemp($Temp,$var);


	return $str;


		
}



?>
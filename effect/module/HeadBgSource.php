<?php

/*
	[插件名称] 头部图片素材
	[适用范围] 全站
*/

function HeadBgSource() { 

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
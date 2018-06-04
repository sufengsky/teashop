<?php

/*
	[插件名称] 卡通图片素材
	[适用范围] 全站
*/

function CartonSource() { 

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$sourceurl=$GLOBALS["PLUSVARS"]["sourceurl"];
	$link=$GLOBALS["PLUSVARS"]["link"];

	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$var=array (
		'sourceurl' => $sourceurl,
		'link' => $link
	);

	if($link!=""){
		$str.=ShowTplTemp($TempArr["link"],$var);
	}else{
		$str.=ShowTplTemp($TempArr["text"],$var);
	}

	return $str;


		
}



?>
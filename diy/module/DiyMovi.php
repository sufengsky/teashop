<?php

/*
	[插件名称] 自定义FLASH视频
	[适用范围] 全站
*/

function DiyMovi(){


		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$movi=$GLOBALS["PLUSVARS"]["movi"];
		
		$Temp=LoadTemp($tempname);


		$var=array(
			'movi' => $movi
			);
		
		$str=ShowTplTemp($Temp,$var);
		
		return $str;


}

?>
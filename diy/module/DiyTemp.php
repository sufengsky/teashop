<?php

/*
	[插件名称] 自定义模版
	[适用范围] 全站
*/

function DiyTemp(){

		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		$Temp=LoadTemp($tempname);
		return $Temp;

}

?>
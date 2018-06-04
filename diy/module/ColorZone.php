<?php

/*
	[插件名称] 颜色区域
	[适用范围] 全站
*/

function ColorZone(){


		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		$Temp=LoadTemp($tempname);

		return $Temp;

}

?>
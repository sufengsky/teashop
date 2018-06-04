<?php

/*
	[插件名称] 分组标签切换外框
	[适用范围] 全站
*/

function GroupLable(){


		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		$Temp=LoadTemp($tempname);

		return $Temp;

}

?>
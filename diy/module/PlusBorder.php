<?php

/*
	[插件名称] 外框
	[适用范围] 全站
*/

function PlusBorder(){


		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		$Temp=LoadTemp($tempname);

		return $Temp;

}

?>
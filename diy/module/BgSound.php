<?php

/*
	[插件名称] 背景音乐
	[适用范围] 全站
*/

function BgSound(){


		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$attach=$GLOBALS["PLUSVARS"]["attach"];
		
		$Temp=LoadTemp($tempname);

		$attach=ROOTPATH.$attach;

		$var=array(
			'attach' => $attach
			);
		
		$str=ShowTplTemp($Temp,$var);
		

		return $str;


}

?>
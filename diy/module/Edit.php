<?php

/*
	[插件名称] 自由编辑区域
	[适用范围] 全站
*/

function Edit(){




		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$body=$GLOBALS["PLUSVARS"]["body"];
		
		$Temp=LoadTemp($tempname);

		$var=array(
			'coltitle' => $coltitle,
			'body' => $body
			);
		
		$str=ShowTplTemp($Temp,$var);

		return $str;


}

?>
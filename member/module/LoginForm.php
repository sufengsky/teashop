<?php

/*
	[插件名称] 会员登录表单
	[适用范围] 全站

*/

function LoginForm(){


global $fsql;



	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	$Temp=LoadTemp($tempname);


	$var=array (
		'coltitle' => $coltitle
	);

	$str=ShowTplTemp($Temp,$var);
	

	return $str;

}

?>
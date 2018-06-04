<?php

/*
	[插件名称] 会员在线支付充值
*/

function MemberWelcome(){

	global $fsql;

	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	$Temp=LoadTemp($tempname);


	$var=array (
		'sitename' => $sitename
	);

	$str=ShowTplTemp($Temp,$var);

	return $str;
}
?>
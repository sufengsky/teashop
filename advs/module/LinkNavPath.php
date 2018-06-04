<?php

/*
	[插件名称] 模块导航条
	[适用范围] 模块
*/


function LinkNavPath(){

	global $msql;


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$pagename=$GLOBALS["PLUSVARS"]["pagename"];

	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);


	$var=array (
		'coltitle' => $coltitle,
		'sitename' => $GLOBALS["CONF"]["SiteName"],
	);

	$str=ShowTplTemp($TempArr["start"],$var);


	//页头标题
	$GLOBALS["pagetitle"]=$GLOBALS["PSET"]["name"];


	$str.=$TempArr["end"];
	return $str;
}

?>
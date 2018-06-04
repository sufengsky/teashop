<?php

/*
	[插件名称] 访问统计
	[适用范围] 全站
*/

function ShowCount() { 
	


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	$Temp=LoadTemp($tempname);

	$count="<script>document.write(\"<script src=".ROOTPATH."tools/stat.php?nowpage=\"+window.location.href+\"&reffer=\"+escape(document.referrer)+\"><\/script>\")</script>";

	$var=array (
		'coltitle' => $coltitle,
		'count' => $count
	);

	$str=ShowTplTemp($Temp,$var);
	return $str;


		
}



?>
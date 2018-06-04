<?php

/*
	[插件名称] FLASH视频插件
	[适用范围] 全站
*/

function AdvsMovi() { 

	global $msql;

	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$w=$GLOBALS["PLUSVARS"]["w"];
	$h=$GLOBALS["PLUSVARS"]["h"];
	$showborder=$GLOBALS["PLUSVARS"]["showborder"];
	$padding=$GLOBALS["PLUSVARS"]["padding"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	
	$msql->query("select * from {P}_advs_movi where id='$groupid'");
	if($msql->next_record()){
		$src=$msql->f('src');
	}



	$Temp=LoadTemp($tempname);

	$w=$w-$padding;
	$h=$h-$padding;

	if($showborder!="none"){
		$w=$w-1;
		$h=$h-1;
	}

	$var=array (
		'src' => $src,
		'w' => $w,
		'h' => $h,
		'coltitle' => $coltitle
	);
	

	$str=ShowTplTemp($Temp,$var);


	return $str;


		
}



?>
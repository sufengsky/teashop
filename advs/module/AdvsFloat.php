<?php

/*
	[插件名称] 图片广告位（浮动）
	[适用范围] 全站
*/

function AdvsFloat() { 
	
	global $msql;



	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$w=$GLOBALS["PLUSVARS"]["w"];
	$h=$GLOBALS["PLUSVARS"]["h"];
	$showborder=$GLOBALS["PLUSVARS"]["showborder"];
	$padding=$GLOBALS["PLUSVARS"]["padding"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$msql->query("select * from {P}_advs_pic where id='$groupid'");
	if($msql->next_record()){
		$src=$msql->f('src');
		$link=$msql->f('url');
	}

	$src=ROOTPATH.$src;


	$w=$w-$padding;
	$h=$h-$padding;

	if($showborder!="none"){
		$w=$w-1;
		$h=$h-1;
	}

	
	$Temp=LoadTemp($tempname);

	$TempArr=SplitTblTemp($Temp);


	$var=array (
		'coltitle' => $coltitle,
		'src' => $src,
		'w' => $w,
		'h' => $h,
		'link' => $link
	);


	//不在设置状态时浮动
	if($_COOKIE["PLUSADMIN"]!="SET"){
		$str=ShowTplTemp($TempArr["start"],$var);
	}
	
	if(substr($src,-4)==".swf"){
		$str.=ShowTplTemp($TempArr["menu"],$var);
	}else{
		$str.=ShowTplTemp($TempArr["list"],$var);
	}

	
	if($_COOKIE["PLUSADMIN"]!="SET"){
		$str.=ShowTplTemp($TempArr["end"],$var);
	}
	
	return $str;
		
}

?>
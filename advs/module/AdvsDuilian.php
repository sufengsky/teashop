<?php

/*
	[插件名称] 图片广告位（对联）
	[适用范围] 全站
*/

function Advsduilian() { 
	
	global $msql;



	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$w=$GLOBALS["PLUSVARS"]["w"];
	$h=$GLOBALS["PLUSVARS"]["h"];
	$l=$GLOBALS["PLUSVARS"]["l"];
	$showborder=$GLOBALS["PLUSVARS"]["showborder"];
	$padding=$GLOBALS["PLUSVARS"]["padding"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$msql->query("select * from {P}_advs_duilian where id='$groupid'");
	if($msql->next_record()){
		$src=$msql->f('src');
		$src2=$msql->f('src2');
		$link=$msql->f('url');
		$link2=$msql->f('url2');
	}

	$src=ROOTPATH.$src;
	$src2=ROOTPATH.$src2;

	

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
		'src2' => $src2,
		'w' => $w,
		'h' => $h,
		'l' => $l,
		'link' => $link,
		'link2' => $link2
	);


	$str=ShowTplTemp($TempArr["start"],$var);

	
	if(substr($src,-4)==".swf"){
		$str.=ShowTplTemp($TempArr["menu"],$var);
	}else{
		$str.=ShowTplTemp($TempArr["list"],$var);
	}

	
	$str.=ShowTplTemp($TempArr["end"],$var);
	
	return $str;
		
}

?>
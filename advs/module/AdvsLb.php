<?php

/*
	[插件名称] 轮播广告
	[适用范围] 全站
*/

function AdvsLb () { 

	global $msql;

	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	
	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$var=array(
		'coltitle' => $coltitle
	);

	$str=ShowTplTemp($TempArr["start"],$var);

	$msql->query("select * from {P}_advs_lb  where groupid='$groupid' order by xuhao limit 0,$shownums");
	while($msql->next_record()){
		$id=$msql->f('id');
		$src=$msql->f('src');
		$url=$msql->f('url');
		$title=$msql->f('title');
		$text=$msql->f('text');

		$src=ROOTPATH.$src;
		$var=array (
		'src' => $src, 
		'url' => $url
		);
		$str.=ShowTplTemp($TempArr["list"],$var);

	}

	$str.=$TempArr["end"];

	return $str;

	
}



?>
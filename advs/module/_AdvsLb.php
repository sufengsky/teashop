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
	$w=$GLOBALS["PLUSVARS"]["w"];
	$h=$GLOBALS["PLUSVARS"]["h"];
	
	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$var=array(
		'coltitle' => $coltitle
	);

	$str=ShowTplTemp($TempArr["start"],$var);


	$h1=$h-22;

	$p=1;
	$msql->query("select * from {P}_advs_lb  where groupid='$groupid' order by xuhao limit 0,$shownums");
	while($msql->next_record()){
		$id=$msql->f('id');
		$src=$msql->f('src');
		$url=$msql->f('url');
		$title=$msql->f('title');
		$text=$msql->f('text');

		$src=ROOTPATH.$src;

		if($p==1){
			$pic=$src;
			$purl=$url;
			$ptitle=$title;
		}else{
			$pic.="|".$src;
			$purl.="|".$url;
			$ptitle.="|".$title;
		}
		$p++;
	}




	$var=array (
	'ptitle' => $ptitle, 
	'pic' => $pic, 
	'purl' => $purl, 
	'w' => $w, 
	'h' => $h,
	'h1' => $h1
	);
	
	$str.=ShowTplTemp($TempArr["end"],$var);

	return $str;

	
}



?>
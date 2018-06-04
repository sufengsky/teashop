<?php

/*
	[插件名称] 轮播广告(可共享设置) 
	[适用范围] 全站
*/

function AdvsFlashLb () { 

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
	
	$xmlData=htmlspecialchars("<list>");
	$msql->query("select * from {P}_advs_lb  where groupid='$groupid' order by xuhao limit 0,$shownums");
	while($msql->next_record()){
		$id=$msql->f('id');
		$src=$msql->f('src');
		$url=$msql->f('url');
		if($url=="http://" || $url==""){
		}
		else{
			if(!strchr($url,htmlspecialchars("http://")))
			$url=htmlspecialchars("http://").$url;
		}
		$src=ROOTPATH.$src;
		$xmlData.=htmlspecialchars("<item><img>".$src."</img><url>".$url."</url></item>");
	}
	$xmlData.=htmlspecialchars("</list>");
	
	$var=array(
		'xmlData' => $xmlData,
		'w' => $w,
		'h' => $h
	);

	$str=ShowTplTemp($TempArr["start"],$var);
	return $str;

	
}



?>
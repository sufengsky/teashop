<?php

/*
	[插件名称] 图片广告位（fixed）
	[适用范围] 全站
*/

function AdvsFixed() { 
	
	global $msql;



	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$pdv=$GLOBALS["PLUSVARS"]["pdv"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$msql->query("select * from {P}_advs_pic where id='$groupid'");
	if($msql->next_record()){
		$src=$msql->f('src');
		$link=$msql->f('url');
	}

	$src=ROOTPATH.$src;


	
	$Temp=LoadTemp($tempname);

	$TempArr=SplitTblTemp($Temp);


	$var=array (
		'coltitle' => $coltitle,
		'src' => $src,
		'pdv' => $pdv,
		'link' => $link
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
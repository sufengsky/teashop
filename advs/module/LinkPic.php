<?php

/*
	[插件名称] 图片友情链接
	[适用范围] 全站
*/


function LinkPic(){

	global $fsql;


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	$scl=" groupid='$groupid' and src!='' ";


	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);
	
	$var=array(
		'coltitle' => $coltitle,
		'morelink' => $morelink
	);

	$str=ShowTplTemp($TempArr["start"],$var);


	$fsql->query("select * from {P}_advs_link where $scl order by xuhao limit 0,$shownums");
	
	while($fsql->next_record()){
		
		$id=$fsql->f('id');
		$name=$fsql->f('name');
		$link=$fsql->f('url');
		$pic=$fsql->f('src');

		$src=ROOTPATH.$pic;
		

		$var=array (
		'name' => $name,
		'link' => $link,
		'src' => $src,
		'target' => $target,
		);

		if(substr($pic,-4)==".swf"){
			$str.=ShowTplTemp($TempArr["menu"],$var);
		}else{
			$str.=ShowTplTemp($TempArr["list"],$var);
		}

	}
	
	
	$str.=$TempArr["end"];



	return $str;


}

?>
<?php

/*
	[插件名称] 搜索表单
	[适用范围] 检索页
*/


function HzSearchForm(){

	global $msql,$fsql,$strCentSearchInfo1;
	
	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	

	//地址栏参数
	if(strstr($_SERVER["QUERY_STRING"],".html")){
		$Arr=explode(".html",$_SERVER["QUERY_STRING"]);
		$nowcatid=$Arr[0];
	}elseif($_GET["catid"]>0){
		$nowcatid=$_GET["catid"];
	}else{
		$nowcatid=0;
	}

	$key=$_GET["key"];
	$myord=$_GET["myord"];
	$myshownums=$_GET["myshownums"];
	$cent_min=$_GET["cent_min"];
	$cent_max=$_GET["cent_max"];
		
	if($cent_min==""){
		$cent_min=$strCentSearchInfo1;
	}
	if($cent_max==""){
		$cent_max=$strCentSearchInfo1;
	}
	
	$fsql->query("select * from {P}_hz_cat where pid='0'");
	while($fsql->next_record()){
		$cat=$fsql->f('cat');
		$catid=$fsql->f('catid');
		if($nowcatid==$catid){
			$catlist.="<option value='".$catid."' selected>".$cat."</option>";
		}else{
			$catlist.="<option value='".$catid."'>".$cat."</option>";
		}
	}

	

	//模版解释
	$Temp=LoadTemp($tempname);

	$var=array (
		'coltitle' => $coltitle,
		'myshownums' => $myshownums, 
		'myord' => $myord, 
		'key' => $key,
		'cent_min' => $cent_min,
		'cent_max' => $cent_max,
		'catlist' => $catlist
	);

	$str=ShowTplTemp($Temp,$var);

	return $str;


}
?>
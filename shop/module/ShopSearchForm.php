<?php

/*
	[插件名称] 商品搜索表单
	[适用范围] 本频道
*/


function ShopSearchForm(){

	global $msql,$fsql;
	
	
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
	$pricefrom=$_GET["pricefrom"];
	$priceto=$_GET["priceto"];
	$showbrandid=$_GET["showbrandid"];

	if($pricefrom==""){
		$pricefrom=0;
	}

	if($priceto==""){
		$priceto=9999;
	}

		
	$fsql->query("select * from {P}_shop_cat where pid='0' order by xuhao");
	while($fsql->next_record()){
		$cat=$fsql->f('cat');
		$catid=$fsql->f('catid');
		if($nowcatid==$catid){
			$catlist.="<option value='".$catid."' selected>".$cat."</option>";
		}else{
			$catlist.="<option value='".$catid."'>".$cat."</option>";
		}
	}


	$fsql->query("select * from {P}_shop_brand order by xuhao");
	while($fsql->next_record()){
		$brandid=$fsql->f('id');
		$brand=$fsql->f('brand');
		if($showbrandid==$brandid){
			$brandlist.="<option value='".$brandid."' selected>".$brand."</option>";
		}else{
			$brandlist.="<option value='".$brandid."'>".$brand."</option>";
		}
	}



	//模版解释
	$Temp=LoadTemp($tempname);

	$var=array (
	'coltitle' => $coltitle,
	'myshownums' => $myshownums, 
	'pricefrom' => $pricefrom, 
	'priceto' => $priceto, 
	'myord' => $myord, 
	'key' => $key, 
	'brandlist' => $brandlist, 
	'catlist' => $catlist
	);

	$str=ShowTplTemp($Temp,$var);

	return $str;


}
?>
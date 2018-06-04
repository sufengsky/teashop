<?php

/*
	[插件名称] 品牌介绍
	[适用范围] 品牌详情页
*/


function ShopBrandDetail(){

	global $fsql,$msql;

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);
	
	
	if(isset($_GET["brandid"]) && $_GET["brandid"]!=""){
		$brandid=$_GET["brandid"];
	}else{
		$str.=$TempArr["err1"];
		return $str;
	}


	$fsql->query("select * from {P}_shop_brand where id='$brandid'");
	if($fsql->next_record()){
		$brand=$fsql->f('brand');
		$src=$fsql->f('logo');
		$url=$fsql->f('url');
		$intro=$fsql->f('intro');
		$xuhao=$fsql->f('xuhao');
		$tj =$fsql->f('tj');
		
	}else{
		$str.=$TempArr["err1"];
		return $str;
	}


	//页头标题定义
	$GLOBALS["pagetitle"]=$brand;
	

	if($src==""){$src="shop/pics/nopic.gif";}
	$src=ROOTPATH.$src;


	$var=array (
		'brand' => $brand, 
		'intro' => $intro, 
		'src' => $src, 
		'url' => $url, 
		'xuhao' => $xuhao, 
		'tj' => $tj
	);

    $str=ShowTplTemp($TempArr["start"],$var);

	$str.=$TempArr["end"];

	return $str;

}

?>
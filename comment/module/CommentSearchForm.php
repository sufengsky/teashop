<?php

/*
	[插件名称] 点评搜索表单
	[适用范围] 检索页
*/


function CommentSearchForm(){

	global $msql,$fsql;
	


	
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
	$mid=$_GET["mid"];

		
		$fsql->query("select * from {P}_comment_cat where ifshow='1' order by xuhao");
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
	'myshownums' => $myshownums, 
	'myord' => $myord, 
	'key' => $key, 
	'mid' => $mid, 
	'catlist' => $catlist
	);

	$str=ShowTplTemp($Temp,$var);

	return $str;


}
?>
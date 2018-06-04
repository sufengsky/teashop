<?php

/*
	[插件名称] 当前位置
	[适用范围] 招聘
*/


function JobNavPath(){

	global $msql;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$pagename=$GLOBALS["PLUSVARS"]["pagename"];

	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	

	$var=array (
		'sitename' => $GLOBALS["CONF"]["SiteName"]
	);

	$str=ShowTplTemp($TempArr["start"],$var);

	if($pagename=="detail"){

			$str.=ShowTplTemp($TempArr["col"],$var);
			
			//获取地址栏参数
			if(strstr($_SERVER["QUERY_STRING"],".html")){
				$idArr=explode(".html",$_SERVER["QUERY_STRING"]);
				$id=$idArr[0];
			}elseif(isset($_GET["id"]) && $_GET["id"]!=""){
				$id=$_GET["id"];
			}
			$msql->query("select jobname from {P}_job where id='$id'");
			if($msql->next_record()){
				$jobname=$msql->f('jobname');
			}
			
			$var=array (
			'nav' => $jobname
			);
			$str.=ShowTplTemp($TempArr["con"],$var);
			$GLOBALS["pagetitle"]=$jobname;
	}else{
		$str.=ShowTplTemp($TempArr["col"],$var);
	}





	$str.=$TempArr["end"];
	return $str;
}

?>
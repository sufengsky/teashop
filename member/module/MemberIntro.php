<?php

/*
	[插件名称] 会员主页-会员简介
	[适用范围] 会员中心
*/

function MemberIntro(){

	global $msql;
		
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		
		//地址栏参数
		if(isset($_GET["mid"]) && $_GET["mid"]!="" && $_GET["mid"]!="0"){
			$mid=$_GET["mid"];
		}else{
			return "";
		}
		$mid=htmlspecialchars($mid);


		$msql->query("select bz from {P}_member where memberid='$mid'");
		if($msql->next_record()){
			$bz=$msql->f('bz');
		}

		$intro=nl2br($bz);

		$Temp=LoadTemp($tempname);

		$var=array(
			'intro' => $intro
		);
		
		$str=ShowTplTemp($Temp,$var);

		return $str;


}

?>
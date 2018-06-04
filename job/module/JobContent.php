<?php

/*
	[插件名称] 职位详情插件
	[适用范围] 详情页
*/


function JobContent(){

	global $fsql,$msql;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	//获取地址栏参数
	if(strstr($_SERVER["QUERY_STRING"],".html")){
		$idArr=explode(".html",$_SERVER["QUERY_STRING"]);
		$id=$idArr[0];
	}elseif(isset($_GET["id"]) && $_GET["id"]!=""){
		$id=$_GET["id"];
	}	



	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);


	$fsql->query("select * from {P}_job where id='$id'");
	if($fsql->next_record()){
		$jobname = $fsql -> f ('jobname');
		$jobtype = $fsql -> f ('jobtype');
		$experience = $fsql -> f ('experience');
		$education = $fsql -> f ('education');
		$langneed = $fsql -> f ('langneed');
		$langlevel = $fsql -> f ('langlevel');
		$pnums = $fsql -> f ('pnums');
		$jobaddr = $fsql -> f ('jobaddr');
		$jobintro = $fsql -> f ('jobintro');
		$jobrequest = $fsql -> f ('jobrequest');
		$jobstat = $fsql -> f ('jobstat');
		$contact = $fsql -> f ('contact');
		$tel = $fsql -> f ('tel');
		$email = $fsql -> f ('email');
		$dtime = $fsql -> f ('dtime');
		$uptime = $fsql -> f ('uptime');
	}else{
		$str.=$TempArr["err1"];
		return $str;
	}

	$fsql->query("update {P}_job set cl=cl+1 where id='$id'");
	

	//页头标题定义
	$GLOBALS["pagetitle"]=$jobname;
	

	$dtime=date("Y-m-d",$dtime);
	$uptime=date("Y-m-d",$uptime);

	$jobintro=nl2br($jobintro);


	$var=array (
		'jobid' => $id, 
		'jobname' => $jobname, 
		'dtime' => $dtime, 
		'uptime' => $uptime, 
		'jobtype' => $jobtype, 
		'experience' => $experience, 
		'education' => $education,
		'langneed' => $langneed, 
		'langlevel' => $langlevel, 
		'pnums' => $pnums, 
		'jobaddr' => $jobaddr, 
		'jobintro' => $jobintro, 
		'jobrequest' => $jobrequest, 
		'link' => $link,
		'target' => $target,
		'contact' => $contact,
		'tel' => $tel,
		'email' => $email
	);

    $str=ShowTplTemp($TempArr["start"],$var);

	return $str;


}

?>
<?php

/*
	[插件名称] 职位检索
	[适用范围] 全站
*/ 


function JobQuery(){

	global $fsql,$msql;
	
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$cutbody=$GLOBALS["PLUSVARS"]["cutbody"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	$key=$_GET["key"];
	$page=$_GET["page"];


	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];

	//默认条件
	$scl=" iffb='1' and jobstat='1' ";


	if($key!=""){
		$scl.=" and (jobname regexp '$key' or jobintro regexp '$key') ";
	}

	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_job","id",$scl);
	
	$pages->setvar(array("key" => $key));

	$pages->set($shownums,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  
	

	$fsql->query("select * from {P}_job where $scl order by uptime desc limit $pagelimit");

	while($fsql->next_record()){
		
		$id = $fsql -> f ('id');
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

		$dtime=date("Y-m-d",$dtime);
		$uptime=date("Y-m-d",$uptime);
		
		if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."job/html/".$id.".html")){
			$link=ROOTPATH."job/html/".$id.".html";
		}else{
			$link=ROOTPATH."job/html/?".$id.".html";
		}

		if($cutword!="0"){$jobname=csubstr($jobname,0,$cutword);}
		if($cutbody!="0"){$jobintro=csubstr($jobintro,0,$cutbody);}

		$jobintro=nl2br($jobintro);
		$jobrequest=nl2br($jobrequest);

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

		$str.=ShowTplTemp($TempArr["list"],$var);
		

	}

	$str.=$TempArr["end"];

	$pagesinfo=$pages->ShowNow();

	$var=array (
	'showpages' => $pages->output(1),
	'pagestotal' => $pagesinfo["total"],
	'pagesnow' => $pagesinfo["now"],
	'pagesshownum' => $pagesinfo["shownum"],
	'pagesfrom' => $pagesinfo["from"],
	'pagesto' => $pagesinfo["to"],
	'totalnums' => $totalnums
	);

	$str=ShowTplTemp($str,$var);

	return $str;


}
?>
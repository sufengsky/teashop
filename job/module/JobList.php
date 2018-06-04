<?php

/*
	[插件名称] 最新职位列表
	[适用范围] 全站
*/

function JobList(){

	global $fsql,$msql;

		
		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];

		$fsql->query("select * from {P}_job where iffb='1' and jobstat='1' order by uptime desc limit 0,$shownums");

		while($fsql->next_record()){
			
			$id=$fsql->f('id');
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


			//模版标签解释

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
		return $str;

}

?>
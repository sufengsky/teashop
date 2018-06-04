<?php

/*
	[插件名称] 会员主页最新点评
	[适用范围] 全站

*/

function MemberCommentList(){

	global $fsql,$tsql,$strGuest;


		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];


		//地址栏参数

		if(isset($_GET["mid"]) && $_GET["mid"]!="" && $_GET["mid"]!="0"){
			$mid=$_GET["mid"];
		}else{
			return "";
		}


		
		$scl=" iffb='1' and pid='0' and memberid='$mid' ";


		if($showtj!="" && $showtj!="0"){
			$scl.=" and tuijian='1' ";
		}


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$var=array(
			'coltitle' => $coltitle
		);

		$str=ShowTplTemp($TempArr["start"],$var);

		$fsql->query("select * from {P}_comment where $scl order by dtime desc limit 0,$shownums");

		while($fsql->next_record()){
			
			$id=$fsql->f('id');
			$rid=$fsql->f('rid');
			$title=$fsql->f('title');
			$memberid=$fsql->f('memberid');
			$dtime=$fsql->f('dtime');
			$uptime=$fsql->f('uptime');
			$cl=$fsql->f('cl');
			$lastname=$fsql->f('lastname');

			$dtime=date("m/d",$dtime);

			if($cutword!="0"){$title=csubstr($title,0,$cutword);}

			$link=ROOTPATH."comment/html/?".$id.".html";
			

			$var=array (
			'title' => $title, 
			'dtime' => $dtime, 
			'cl' => $cl, 
			'link' => $link,
			'lastname' => $lastname,
			'target' => $target
			);
			$str.=ShowTplTemp($TempArr["list"],$var);



		}

		$str.=$TempArr["end"];


		return $str;

}

?>
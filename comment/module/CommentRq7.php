<?php

/*
	[插件名称] 本周点评人气排行榜
	[适用范围] 全站

*/

function CommentRq7(){

	global $fsql,$tsql,$strGuest;


		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$catid=$GLOBALS["PLUSVARS"]["catid"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		$endtime=time()-604800;
		$scl=" iffb='1' and pid='0' and dtime>$endtime ";


		if($showtj!="" && $showtj!="0"){
			$scl.=" and tuijian='1' ";
		}


		if($catid!="" && $catid!="0"){
			$scl.=" and catid='$catid' ";
		}


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$var=array(
			'coltitle' => $coltitle
		);

		$str=ShowTplTemp($TempArr["start"],$var);

		$picnum=1;
		$fsql->query("select * from {P}_comment where $scl order by backcount desc limit 0,$shownums");
		while($fsql->next_record()){
			
			$id=$fsql->f('id');
			$rid=$fsql->f('rid');
			$title=$fsql->f('title');
			$memberid=$fsql->f('memberid');
			$body=$fsql->f('body');
			$dtime=$fsql->f('dtime');
			$uptime=$fsql->f('uptime');
			$cl=$fsql->f('cl');
			$lastname=$fsql->f('lastname');


			//是否匿名

			if($memberid=="-1"){
				$pname=$strGuest;
				$nowface="1";
				$memberurl="#";
			}else{
				$tsql->query("select * from {P}_member where memberid='$memberid'");
				if($tsql->next_record()){
					$pname=$tsql->f("pname");
					$nowface=$tsql->f("nowface");
				}
				$face=ROOTPATH."member/face/".$nowface.".gif";
				$memberurl=ROOTPATH."member/home.php?mid=".$memberid;
			}



			$dtime=date("Y-m-d",$dtime);
			$uptime=date("Y-m-d",$uptime);

			if($cutword!="0"){$title=csubstr($title,0,$cutword);}


			$link=ROOTPATH."comment/html/?".$id.".html";
			

			$var=array (
			'title' => $title, 
			'dtime' => $dtime, 
			'pname' => $pname, 
			'picnum' => $picnum, 
			'memberurl' => $memberurl, 
			'body' => $body, 
			'count' => $count, 
			'cl' => $cl, 
			'link' => $link,
			'relatelink' => $relatelink,
			'lastname' => $lastname,
			'face' => $face, 
			'target' => $target
			);
			$str.=ShowTplTemp($TempArr["list"],$var);


		$picnum++;
		}

		$str.=$TempArr["end"];


		return $str;

}

?>
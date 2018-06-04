<?php

/*
	[插件名称] 最新会员公告
	[适用范围] 会员中心
*/

function MemberNotice(){

	global $fsql;

	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$target=$GLOBALS["PLUSVARS"]["target"];

		$membertypeid=$_COOKIE["MEMBERTYPEID"];
		$membertypeid=htmlspecialchars($membertypeid);


		if($membertypeid==""){
			return "";
		}

		$scl=" membertypeid='$membertypeid' or membertypeid='0' ";


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);


		$str=$TempArr["start"];

		$fsql->query("select * from {P}_member_notice where $scl order by dtime desc limit 0,$shownums");

		while($fsql->next_record()){
			
			$id=$fsql->f('id');
			$title=$fsql->f('title');
			$dtime=$fsql->f('dtime');
			$ifnew=$fsql->f('ifnew');
			$ifred=$fsql->f('ifred');
			$cl=$fsql->f('cl');

			$link=ROOTPATH."member/member_notice.php?id=".$id;
			
			$dtime=date("Y-m-d",$dtime);
			
			if($ifnew=="1"){$bold=" style='font-weight:bold' ";}else{$bold="";}
			if($ifred=="1"){$red=" style='color:#ff0000' ";}else{$red=""; }
			if($cutword!="0"){$title=csubstr($title,0,$cutword);}


			$var=array (
			'title' => $title, 
			'dtime' => $dtime, 
			'red' => $red, 
			'cl' => $cl, 
			'link' => $link,
			'target' => $target,
			'bold' => $bold
			);
			$str.=ShowTplTemp($TempArr["list"],$var);


		}



		$str.=$TempArr["end"];


		return $str;

}

?>
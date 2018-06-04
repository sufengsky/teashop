<?php

/*
	[插件名称] 会员积分信息
	[适用范围] 会员中心
*/

function MemberCentInfo(){

	global $msql;
		
	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		$msql->query("select * from {P}_member where memberid='".$_COOKIE["MEMBERID"]."'");
		if($msql->next_record()){
			$cent1=$msql->f('cent1');
			$cent2=$msql->f('cent2');
			$cent3=$msql->f('cent3');
			$cent4=$msql->f('cent4');
			$cent5=$msql->f('cent5');
		}

		$cw1=MemberCentWidth($cent1);
		$cw2=MemberCentWidth($cent2);
		$cw3=MemberCentWidth($cent3);
		$cw4=MemberCentWidth($cent4);
		$cw5=MemberCentWidth($cent5);


		$Temp=LoadTemp($tempname);

		$var=array(
			'centname1' => $GLOBALS["MEMBERCONF"]["centname1"],
			'centname2' => $GLOBALS["MEMBERCONF"]["centname2"],
			'centname3' => $GLOBALS["MEMBERCONF"]["centname3"],
			'centname4' => $GLOBALS["MEMBERCONF"]["centname4"],
			'centname5' => $GLOBALS["MEMBERCONF"]["centname5"],
			'cw1' => $cw1,
			'cw2' => $cw2,
			'cw3' => $cw3,
			'cw4' => $cw4,
			'cw5' => $cw5,
			'cent1' => $cent1,
			'cent2' => $cent2,
			'cent3' => $cent3,
			'cent4' => $cent4,
			'cent5' => $cent5
		);
		
		$str=ShowTplTemp($Temp,$var);

		return $str;


}

?>
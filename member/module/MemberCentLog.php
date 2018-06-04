<?php


function MemberCentLog(){

	global $msql,$fsql,$strCentFormAdmin;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$memberid=$_COOKIE["MEMBERID"];


	//模板解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);


	//取出当前积分
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
		
	$str=ShowTplTemp($TempArr["start"],$var);

	$scl=" memberid='$memberid' ";
	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;
	$totalnums=TblCount("_member_centlog","id",$scl);
	$pages->setvar(array("key" => $key));
	$pages->set(20,$totalnums);		                          
	$pagelimit=$pages->limit();	  
	$msql->query("select * from {P}_member_centlog where $scl order by dtime desc limit $pagelimit");
	while($msql->next_record()){
		$id=$msql->f('id');
		$event=$msql->f('event');
		$dtime=$msql->f('dtime');
		$cent1=$msql->f('cent1');
		$cent2=$msql->f('cent2');
		$cent3=$msql->f('cent3');
		$cent4=$msql->f('cent4');
		$cent5=$msql->f('cent5');
		$memo=$msql->f('memo');
		if($event=="0"){
			$eventname=$memo;
		}else{
			$fsql->query("select name from {P}_member_centrule where event='$event' ");
			if($fsql->next_record()){
				$eventname=$fsql->f('name');
			}
		}
		

		$dtime=date("Y/m/d H:i:s",$dtime);

		$var=array (
		'id' => $id,
		'eventname' => $eventname, 
		'dtime' => $dtime,
		'cent1' => $cent1,
		'cent2' => $cent2,
		'cent3' => $cent3,
		'cent4' => $cent4,
		'cent5' => $cent5
		);

		$str.=ShowTplTemp($TempArr["list"],$var);
	}

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

	$str.=ShowTplTemp($TempArr["end"],$var);
	return $str;

}

?>
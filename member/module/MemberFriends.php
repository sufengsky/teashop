<?php


function MemberFriends(){

	global $fsql,$tsql;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$memberid=$_COOKIE["MEMBERID"];


	$scl=" memberid='$memberid' ";

	//ฤฃฐๅฝโสอ
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];
	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_member_friends","id",$scl);
	
	$pages->setvar(array("key" => $key));

	$pages->set(20,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

	$fsql->query("select * from {P}_member_friends where $scl order by id desc limit $pagelimit");

	while($fsql->next_record()){
		$id=$fsql->f('id');
		$fid=$fsql->f('fid');

		$tsql->query("select * from {P}_member where memberid='$fid'");
		if($tsql->next_record()){
			$pname=$tsql->f("pname");
			$nowface=$tsql->f("nowface");
		}

		$face=ROOTPATH."member/face/".$nowface.".gif";
		$memberurl=ROOTPATH."member/home.php?mid=".$fid;

		$var=array (
		'id' => $id,
		'fid' => $fid,
		'pname' => $pname, 
		'memberurl' => $memberurl, 
		'face' => $face
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
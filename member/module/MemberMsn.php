<?php


function MemberMsn(){

	global $fsql,$tsql,$strMemberMsnNtc2;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$memberid=$_COOKIE["MEMBERID"];
	$memberid=htmlspecialchars($memberid);


	$scl=" tomemberid='$memberid' ";


	//模板解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];
	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_member_msn","id",$scl);
	
	$pages->setvar(array("key" => $key));

	$pages->set(10,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

	$fsql->query("select * from {P}_member_msn where $scl order by dtime desc limit $pagelimit");

	while($fsql->next_record()){
		$id=$fsql->f('id');
		$body=$fsql->f('body');
		$dtime=$fsql->f('dtime');
		$frommemberid=$fsql->f('frommemberid');

		$dtime=date("Y-m-d h:i:s",$dtime);
		
		$body=nl2br($body);


		if($frommemberid!="0"){
			$tsql->query("select * from {P}_member where memberid='$frommemberid'");
			if($tsql->next_record()){
				$pname=$tsql->f("pname");
				$nowface=$tsql->f("nowface");
			}
			$face=ROOTPATH."member/face/".$nowface.".gif";
			$memberurl=ROOTPATH."member/home.php?mid=".$frommemberid;
			$showback="block";
		}else{
			$pname=$strMemberMsnNtc2;
			$face=ROOTPATH."member/face/1.gif";
			$memberurl="#";
			$showback="none";
		}
		



		$var=array (
		'id' => $id,
		'body' => $body, 
		'dtime' => $dtime, 
		'mid' => $frommemberid, 
		'face' => $face, 
		'memberurl' => $memberurl, 
		'showback' => $showback, 
		'pname' => $pname
		);

		$str.=ShowTplTemp($TempArr["list"],$var);
		
		

	}

	//标注为已读
	$tsql->query("update {P}_member_msn set iflook='1' where tomemberid='$memberid'");

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
<?php


function MemberComment(){

	global $fsql,$tsql;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$memberid=$_COOKIE["MEMBERID"];
	$memberid=htmlspecialchars($memberid);


	$scl=" pid='0' and memberid='$memberid' ";

	//模板解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];
	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_comment","id",$scl);
	
	$pages->setvar(array("key" => $key));

	$pages->set(20,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

	$fsql->query("select * from {P}_comment where $scl order by uptime desc limit $pagelimit");

	while($fsql->next_record()){
		$id=$fsql->f('id');
		$title=$fsql->f('title');
		$iffb=$fsql->f('iffb');
		$rid=$fsql->f('rid');
		$catid=$fsql->f('catid');
		$dtime=$fsql->f('dtime');
		$uptime=$fsql->f('uptime');
		$cl=$fsql->f('cl');
		$lastname=$fsql->f('lastname');
		$lastmemberid=$fsql->f('lastmemberid');
		$backcount=$fsql->f('backcount');


		$title=csubstr($title,0,23);
		//是否今日新贴
		
		if($uptime>time()-86400){
			$querycss="binew";
		}else{
			$querycss="bi";
		}

		$dtime=date("Y-m-d",$dtime);
		$uptime=date("Y-m-d",$uptime);

		if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."comment/html/".$id.".html")){
			$link=ROOTPATH."comment/html/".$id.".html";
		}else{
			$link=ROOTPATH."comment/html/?".$id.".html";
		}

		//回复者网址
		if($lastmemberid=="-1"){
			$lastmemberurl="#";
		}else{
			$lastmemberurl=ROOTPATH."member/home.php?mid=".$lastmemberid;
		}


		$var=array (
		'id' => $id,
		'title' => $title, 
		'dtime' => $dtime, 
		'uptime' => $uptime, 
		'backcount' => $backcount, 
		'querycss' => $querycss, 
		'cl' => $cl, 
		'link' => $link,
		'lastname' => $lastname,
		'lastmemberurl' => $lastmemberurl, 
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
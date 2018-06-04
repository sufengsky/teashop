<?php


function MemberFav(){

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

	$totalnums=TblCount("_member_fav","id",$scl);
	
	$pages->setvar(array("key" => $key));

	$pages->set(20,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

	$fsql->query("select * from {P}_member_fav where $scl order by id desc limit $pagelimit");

	while($fsql->next_record()){
		$id=$fsql->f('id');
		$title=$fsql->f('title');
		$url=$fsql->f('url');

		$var=array (
		'id' => $id,
		'title' => $title, 
		'url' => $url
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
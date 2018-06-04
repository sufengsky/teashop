<?php


function MemberPayList(){

	global $msql,$fsql;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$memberid=$_COOKIE["MEMBERID"];
	$memberid=htmlspecialchars($memberid);


	//模板解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);


	//取出当前帐户信息
	$msql->query("select * from {P}_member where memberid='".$_COOKIE["MEMBERID"]."'");
	if($msql->next_record()){
		$account=$msql->f('account');
		$paytotal=$msql->f('paytotal');
		$buytotal=$msql->f('buytotal');
	}


	$var=array(
		'account' => $account,
		'paytotal' => $paytotal,
		'buytotal' => $buytotal
	);
		
	$str=ShowTplTemp($TempArr["start"],$var);

	$scl=" memberid='$memberid' ";
	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;
	$totalnums=TblCount("_member_pay","id",$scl);
	$pages->setvar(array("key" => $key));
	$pages->set(20,$totalnums);		                          
	$pagelimit=$pages->limit();	  
	$msql->query("select * from {P}_member_pay where $scl order by id desc limit $pagelimit");
	while($msql->next_record()){
		$id=$msql->f('id');
		$oof=$msql->f('oof');
		$method=$msql->f('method');
		$type=$msql->f('type');
		$payhb=$msql->f('payhb');
		$addtime=$msql->f('addtime');
		$fpnum=$msql->f('fpnum');
		$memo=$msql->f('memo');
		$logname=$msql->f('logname');
		$addtime=date("Y-n-j",$addtime);
		

		$var=array (
		'id' => $id,
		'oof' => $oof, 
		'addtime' => $addtime,
		'method' => $method,
		'type' => $type,
		'fpnum' => $fpnum,
		'memo' => $memo,
		'logname' => $logname
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
<?php


function MemberBuyList(){

	global $msql,$fsql;


	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$memberid=$_COOKIE["MEMBERID"];


	//模板解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$memberid=htmlspecialchars($memberid);


	//取出当前帐户信息
	$msql->query("select * from {P}_member where memberid='".$memberid."'");
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
	$totalnums=TblCount("_member_buylist","id",$scl);
	$pages->setvar(array("key" => $key));
	$pages->set(20,$totalnums);		                          
	$pagelimit=$pages->limit();	  
	$msql->query("select * from {P}_member_buylist where $scl order by id desc limit $pagelimit");
	while($msql->next_record()){
		$id=$msql->f('id');
		$payid=$msql->f('payid');
		$paytype=$msql->f('paytype');
		$buyfrom=$msql->f('buyfrom');
		$paytotal=$msql->f('paytotal');
		$daytime=$msql->f('daytime');
		$ip=$msql->f('ip');
		$orderid=$msql->f('orderid');
		$OrderNo=$msql->f('OrderNo');
		$logname=$msql->f('logname');

		$daytime=date("Y-n-j H:i:s",$daytime);
		

		$var=array (
		'id' => $id,
		'payid' => $payid, 
		'paytype' => $paytype,
		'buyfrom' => $buyfrom,
		'paytotal' => $paytotal,
		'daytime' => $daytime,
		'ip' => $ip,
		'OrderNo' => $OrderNo,
		'logname' => $logname,
		'orderid' => $orderid
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
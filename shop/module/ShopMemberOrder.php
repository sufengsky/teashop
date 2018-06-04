<?php


function ShopMemberOrder(){

	global $fsql,$msql;

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$memberid=$_COOKIE["MEMBERID"];

	//地址栏参数
	$key=$_GET["key"];
	$showpay=$_GET["showpay"];
	$showyun=$_GET["showyun"];
	$showok=$_GET["showok"];
	$startday=$_GET["startday"];
	$endday=$_GET["endday"];

	if($startday=="" || $endday==""){
		$endday=date("Y-m-d");
		$enddayArr=explode("-",$endday);
		$endtime=mktime(23,59,59,$enddayArr[1],$enddayArr[2],$enddayArr[0]);
		$starttime=$endtime-691199;
		$startday=date("Y-m-d",$starttime);
	}else{
		$enddayArr=explode("-",$endday);
		$endtime=mktime(23,59,59,$enddayArr[1],$enddayArr[2],$enddayArr[0]);
		$startdayArr=explode("-",$startday);
		$starttime=mktime(0,0,0,$startdayArr[1],$startdayArr[2],$startdayArr[0]);
	}

	if($showpay==""){$showpay="all";}
	if($showyun==""){$showyun="all";}
	if($showok==""){$showok="0";}


	//模板解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$var=array (
	'key' => $key,
	'showpay' => $showpay,
	'showyun' => $showyun, 
	'showok' => $showok, 
	'startday' => $startday, 
	'endday' => $endday, 
	);

	$str=ShowTplTemp($TempArr["start"],$var);

	$scl=" memberid='$memberid' and iftui!='1' and dtime>$starttime and dtime<$endtime ";

	if($showpay=="1" || $showpay=="0"){
		$scl.=" and ifpay='$showpay' ";
	}

	if($showyun=="1" || $showyun=="0"){
		$scl.=" and ifyun='$showyun' ";
	}

	if($showok=="1" || $showok=="0"){
		$scl.=" and ifok='$showok' ";
	}

	if($key!=""){
		$scl.=" and (OrderNo='$key' or items regexp '$key' or name regexp '$key' or s_name regexp '$key') ";
	}
	

	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_shop_order","orderid",$scl);
	
	$pages->setvar(array(
		"key" => $key,
		"startday" => $startday,
		"endday" => $endday,
		"showpay" => $showpay,
		"showyun" => $showyun,
		"showok" => $showok
		));

	$pages->set(10,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

	$msql->query("select * from {P}_shop_order where $scl order by dtime desc limit $pagelimit");

	while($msql->next_record()){
		
		$orderid=$msql->f('orderid');
		$OrderNo=$msql->f('OrderNo');
		$memberid=$msql->f('memberid');
		$goodstotal=$msql->f('goodstotal');
		$yunzoneid=$msql->f('yunzoneid');
		$yunid=$msql->f('yunid');
		$yuntype=$msql->f('yuntype');
		$yunfei=$msql->f('yunfei');
		$paytotal=$msql->f('paytotal');
		$iflook=$msql->f('iflook');
		$ifpay=$msql->f('ifpay');
		$ifyun=$msql->f('ifyun');
		$ifok=$msql->f('ifok');
		$iftui=$msql->f('iftui');
		$dtime=$msql->f('dtime');
		$paytime=$msql->f('paytime');
		$yuntime=$msql->f('yuntime');
		$items=$msql->f('items');

	
		$dtime=date("y-n-j",$dtime);

		switch($ifok){
			case "0":
				$okimg="no.png";
			break;
			case "1":
				$okimg="ok.png";
			break;
		}
		
		switch($ifpay){
			case "0":
				$payimg="no.png";
			break;
			case "1":
				$payimg="ok.png";
			break;
		}

		switch($ifyun){
			case "0":
				$yunimg="no.png";
			break;
			case "1":
				$yunimg="ok.png";
			break;
		}

		$var=array (
		'orderid' => $orderid,
		'OrderNo' => $OrderNo,
		'items' => $items, 
		'paytotal' => $paytotal, 
		'yuntype' => $yuntype, 
		'yunfei' => $yunfei, 
		'okimg' => $okimg, 
		'payimg' => $payimg, 
		'yunimg' => $yunimg, 
		'dtime' => $dtime
		);

		$str.=ShowTplTemp($TempArr["list"],$var);

	}

		$str.=$TempArr["end"];

		$pagesinfo=$pages->ShowNow();

		$var=array (
		'key' => $key,
		'showpages' => $pages->output(1),
		'pagestotal' => $pagesinfo["total"],
		'pagesnow' => $pagesinfo["now"],
		'pagesshownum' => $pagesinfo["shownum"],
		'pagesfrom' => $pagesinfo["from"],
		'pagesto' => $pagesinfo["to"],
		'totalnums' => $totalnums
		);

		$str=ShowTplTemp($str,$var);


		return $str;


}

?>
<?php

/*
	[插件名称] 订单详情
*/

function HzOrderDetail(){

	global $msql,$fsql;

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	$orderid=$_GET["orderid"];
	$orderno=$_GET["orderno"];

	if($orderid=="" && $orderno==""){
		return "NO ORDERID";
	}

	//读入模板
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$msql->query("select * from {P}_hz_order where `orderid`='$orderid' or `OrderNo`='$orderno' limit 0,1");
	if($msql->next_record()){
		$orderid=$msql->f('orderid');
		$OrderNo=$msql->f('OrderNo');
		$memberid=$msql->f('memberid');
		$user=$msql->f('user');
		$name=$msql->f('name');
		$tel=$msql->f('tel');
		$address=$msql->f('address');
		$postcode=$msql->f('postcode');
		$totalcent=$msql->f('totalcent');
		$iflook=$msql->f('iflook');
		$ifpay=$msql->f('ifpay');
		$ifyun=$msql->f('ifyun');
		$ifok=$msql->f('ifok');
		$iftui=$msql->f('iftui');
		$ip=$msql->f('ip');
		$dtime=$msql->f('dtime');
		$yuntime=$msql->f('yuntime');
		$paytime=$msql->f('paytime');
		$bz=$msql->f('bz');
		$items=$msql->f('items');

	}else{
		$var=array('ntc'=>"订单不存在");
		$str=ShowTplTemp($TempArr["err1"],$var);
		return $str;
	}

	
	if($memberid!="0"){
		if(isLogin()){
			$mymemberid=$_COOKIE["MEMBERID"];
			$membertypeid=$_COOKIE["MEMBERTYPEID"];
			if($mymemberid!=$memberid){
				$var=array('ntc'=>"订单身份校验未通过，您无权查看此订单");
				$str=ShowTplTemp($TempArr["err1"],$var);
				return $str;
			}
		}else{
			header("location:".ROOTPATH."member/login.php");
		}
	}

	$dtime=date("Y-m-d",$dtime);
	$yuntime=date("Y-m-d",$yuntime);
	
	$bz=nl2br($bz);


	if($ifpay=="1"){
		$paystat="已付款";
		$paytime=date("Y-m-d",$paytime);
	}else{
		$paystat="未付款";
		$paytime="未付款";
	}

	if($ifyun=="1"){
		$yunstat="已发货";
	}else{
		$yunstat="未发货";
	}

	if($ifok=="1"){
		$okstat="已完成";
	}else{
		$okstat="处理中";
	}	

	$var=array (
		'sitename' => $GLOBALS["CONF"]["SiteName"],
		'orderid' => $orderid,
		'OrderNo' => $OrderNo,
		'user' => $user,
		'name' => $name,
		'address' => $address,
		'tel' => $tel,
		'postcode' => $postcode,
		'totalcent' => $totalcent,
		'paystat' => $paystat,
		'yunstat' => $yunstat,
		'okstat' => $okstat,
		'ip' => $ip,
		'dtime' => $dtime,
		'yuntime' => $yuntime,
		'paytime' => $paytime,
		'bz' => $bz,
		'items' => $items
	);

	$str=ShowTplTemp($TempArr["start"],$var);

	//订单项目列表
	$msql->query("select * from {P}_hz_orderitems where orderid='$orderid'");
	while($msql->next_record()){
		$itemid=$msql->f('id');
		$memberid=$msql->f('memberid');
		$orderid=$msql->f('orderid');
		$gid=$msql->f('gid');
		$bn=$msql->f('bn');
		$goods=$msql->f('goods');
		$nums=$msql->f('nums');
		$jcent=$msql->f('cent');
		$iftui=$msql->f('iftui');
		$ifyun=$msql->f('ifyun');
		$yuntime=$msql->f('yuntime');
		$msg=$msql->f('msg');

		$yuntime=date("y-n-j",$yuntime);
		
		$fsql->query("select * from {P}_hz_con where id='$gid'");
		if($fsql->next_record()){
			$cent=$fsql->f('cent');
		}
		
		if($ifyun=="1"){
			$itemyun="已发货";
		}else{
			$itemyun="未发货";
		}
		
		$var=array (
			'itemid' => $itemid,
			'bn' => $bn,
			'goods' => $goods,
			'gid' => $gid,
			'nums' => $nums,
			'jcent' => $jcent,
			'yuntime' => $yuntime,
			'cent' => $cent,
			'msg' => $msg,
			'itemyun' => $itemyun
		);

		$str.=ShowTplTemp($TempArr["list"],$var);

	}

	$var=array (
		'orderid' => $orderid,
		'OrderNo' => $OrderNo,
		'totalcent' => $totalcent,
		'paystat' => $paystat,
		'yunstat' => $yunstat,
		'okstat' => $okstat,
		'ip' => $ip,
		'dtime' => $dtime,
		'paytime' => $paytime,
		'bz' => $bz
	);
	$str.=ShowTplTemp($TempArr["end"],$var);
	return $str;
	
}

?>
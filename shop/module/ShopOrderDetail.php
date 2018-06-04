<?php

/*
	[插件名称] 订单详情
*/

function ShopOrderDetail(){

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


	$msql->query("select * from {P}_shop_order where `orderid`='$orderid' or `OrderNo`='$orderno' limit 0,1");
	if($msql->next_record()){
		$orderid=$msql->f('orderid');
		$OrderNo=$msql->f('OrderNo');
		$memberid=$msql->f('memberid');
		$user=$msql->f('user');
		$name=$msql->f('name');
		$tel=$msql->f('tel');
		$mobi=$msql->f('mobi');
		$qq=$msql->f('qq');
		$email=$msql->f('email');
		$s_name=$msql->f('s_name');
		$s_tel=$msql->f('s_tel');
		$s_addr=$msql->f('s_addr');
		$s_postcode=$msql->f('s_postcode');
		$s_mobi=$msql->f('s_mobi');
		$s_qq=$msql->f('s_qq');
		$s_time=$msql->f('s_time');
		$goodstotal=$msql->f('goodstotal');
		$yunzoneid=$msql->f('yunzoneid');
		$yunid=$msql->f('yunid');
		$yuntype=$msql->f('yuntype');
		$yunifbao=$msql->f('yunifbao');
		$yunbaofei=$msql->f('yunbaofei');
		$yunfei=$msql->f('yunfei');
		$totaloof=$msql->f('totaloof');
		$totalcent=$msql->f('totalcent');
		$totalweight=$msql->f('totalweight');
		$payid=$msql->f('payid');
		$paytype=$msql->f('paytype');
		$paytotal=$msql->f('paytotal');
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
	}else{
		//非会员订单查询校验码
		$chkmd=substr(md5($OrderNo.$s_name),0,5);
		$md=$_GET["md"];
		if($md!=$chkmd){
			$var=array('ntc'=>"订单查询码错误，您无权查看此订单");
			$str=ShowTplTemp($TempArr["err1"],$var);
			return $str;
		}

		$user="非会员";
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

	//获取配送地区信息
	$msql->query("select * from {P}_shop_yunzone where id='$yunzoneid'");
	if($msql->next_record()){
		$zonepid=$msql->f('pid');
		$zonestr=$msql->f('zone');
		if($zonepid!="0"){
			$fsql->query("select * from {P}_shop_yunzone where id='$zonepid'");
			if($fsql->next_record()){
				$pzone=$fsql->f('zone');
				$zonestr=$pzone." ".$zonestr;
			}
			
		}
	}


	

	$var=array (
	'sitename' => $GLOBALS["CONF"]["SiteName"],
	'orderid' => $orderid,
	'OrderNo' => $OrderNo,
	'user' => $user,
	'name' => $name,
	'qq' => $qq,
	'addr' => $addr,
	'tel' => $tel,
	'mobi' => $mobi,
	'email' => $email,
	's_name' => $s_name,
	's_tel' => $s_tel,
	's_addr' => $s_addr,
	's_postcode' => $s_postcode,
	's_mobi' => $s_mobi,
	's_qq' => $s_qq,
	's_time' => $s_time,
	'goodstotal' => $goodstotal,
	'yunzoneid' => $yunzoneid,
	'yunid' => $yunid,
	'yuntype' => $yuntype,
	'yunifbao' => $yunifbao,
	'yunbaofei' => $yunbaofei,
	'yunfei' => $yunfei,
	'zonestr' => $zonestr,
	'totaloof' => $totaloof,
	'totalcent' => $totalcent,
	'totalweight' => $totalweight,
	'payid' => $payid,
	'paytype' => $paytype,
	'paytotal' => $paytotal,
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

	$msql->query("select * from {P}_shop_orderitems where orderid='$orderid'");
	while($msql->next_record()){

		$itemid=$msql->f('id');
		$memberid=$msql->f('memberid');
		$orderid=$msql->f('orderid');
		$gid=$msql->f('gid');
		$bn=$msql->f('bn');
		$goods=$msql->f('goods');
		$price=$msql->f('price');
		$weight=$msql->f('weight');
		$nums=$msql->f('nums');
		$danwei=$msql->f('danwei');
		$jine=$msql->f('jine');
		$cent=$msql->f('cent');
		$iftui=$msql->f('iftui');
		$ifyun=$msql->f('ifyun');
		$yuntime=$msql->f('yuntime');
		$msg=$msql->f('msg');

		$yuntime=date("y-n-j",$yuntime);
		
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
		'price' => $price,
		'nums' => $nums,
		'weight' => $weight,
		'danwei' => $danwei,
		'jine' => $jine,
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
	'goodstotal' => $goodstotal,
	'yunbaofei' => $yunbaofei,
	'yunfei' => $yunfei,
	'totaloof' => $totaloof,
	'totalcent' => $totalcent,
	'totalweight' => $totalweight,
	'payid' => $payid,
	'paytype' => $paytype,
	'paytotal' => $paytotal,
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
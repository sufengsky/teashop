<?php

/*
	[插件名称] 会员在线支付充值
*/

function MemberOnlinePay(){

	global $fsql,$msql;

		
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		$memberid=$_COOKIE["MEMBERID"];
		$now=time();
		$ip=$_SERVER["REMOTE_ADDR"];

		$memberid=htmlspecialchars($memberid);
		
		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];

		$act=$_GET["act"];
		$payid=$_GET["payid"];
		$payorderid=$_GET["payorderid"];
		$paytotal=$_GET["paytotal"];

		//在线支付成功返回提示
		if($act=="ok"){

			$msql->query("select * from {P}_member_onlinepay where id='$payorderid' and memberid='$memberid'");
			if($msql->next_record()){
				$paytype=$msql->f('paytype');
				$paytotal=$msql->f('paytotal');
			}

			$var=array(
			'payorderid'=>$payorderid,
			'paytype'=>$paytype,
			'paytotal'=>$paytotal
			);
			$str.=ShowTplTemp($TempArr["ok1"],$var);
			$str.=$TempArr["end"];
			return $str;

		}else if($payid!=""){

			if($paytotal=="" || $paytotal<0.01){
				$var=array('ntc'=>"充值金额错误");
				$str.=ShowTplTemp($TempArr["err1"],$var);
				$str.=$TempArr["end"];
				return $str;
			}

			$msql->query("select * from {P}_member_paycenter where id='$payid'");
			if($msql->next_record()){
				$pcenter=$msql->f('pcenter');
				$pcentertype=$msql->f('pcentertype');
				$pcenteruser=$msql->f('pcenteruser');
				$pcenterkey=$msql->f('pcenterkey');
				$hbtype=$msql->f('hbtype');
				$postfile=$msql->f('postfile');
				$recfile=$msql->f('recfile');
				$key1=$msql->f('key1');
				$key2=$msql->f('key2');
				$intro=$msql->f('intro');
				$intro=nl2br($intro);
			}

			if($pcentertype=="1"){

				$msql->query("insert into {P}_member_onlinepay set

					 `memberid`='$memberid',
					 `payid`='$payid',
					 `paytype`='$pcenter',
					 `paytotal`='$paytotal',
					 `ifpay`='0',
					 `addtime`='$now',
					 `backtime`='0',
					 `ip`='$ip'
				");

				$orderid=$msql->instid();

						
				//定义一些常用参数供接口使用
				global $SiteUrl;

				$myurl=$GLOBALS["CONF"][$SiteHttp];  //本网站地址
				$return_url=$SiteUrl."member/paycenter/".$recfile; //同步返回地址  
				$notify_url=""; //异步返回地址
				$v_orderid="MEMBER-".$orderid; //带模块名的传递订单号，返回时可识别
											   //在会员帐户充值时，模块名是MEMBER
				$items="会员帐户在线充值";

				//包含支付接口
				$post_api=ROOTPATH."member/paycenter/".$postfile;
				if(file_exists($post_api)){
					include($post_api);
					$var=array(
					'orderid'=>$orderid,
					'paytotal'=>$paytotal,
					'intro'=>$intro,
					'pcenter'=>$pcenter,
					'hiddenString'=>$hiddenString
					);
					$str.=ShowTplTemp($TempArr["m2"],$var);
					$str.=$TempArr["end"];
					return $str;
				}else{
					$var=array('ntc'=>"接口错误：支付接口文件(".$postfile.")不存在");
					$str.=ShowTplTemp($TempArr["err1"],$var);
					$str.=$TempArr["end"];
					return $str;
				}
			}


			
		

		}else{
			$paylist="";
			$msql->query("select * from {P}_member_paycenter where pcentertype='1'");
			while($msql->next_record()){
				$pcenter=$msql->f('pcenter');
				$payid=$msql->f('id');
				$paylist.="<option value='".$payid."'>".$pcenter."</option>";
			}
		
			$var=array(
			'paylist'=>$paylist
			);
			$str.=ShowTplTemp($TempArr["m1"],$var);
			$str.=$TempArr["end"];
			return $str;
		
		}


}

?>
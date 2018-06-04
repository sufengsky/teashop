<?php

/*
	[插件名称] 订单付款
*/

function ShopOrderPay(){

	global $fsql,$msql;

		
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];

		$ifshowpay=0;

		$orderid=$_GET["orderid"];
		$act=$_GET["act"];
		


		$msql->query("select * from {P}_shop_order where orderid='$orderid'");
		if($msql->next_record()){
			$OrderNo=$msql->f('OrderNo');
			$memberid=$msql->f('memberid');
			$paytotal=$msql->f('paytotal');
			$payid=$msql->f('payid');
			$paytype=$msql->f('paytype');
			$ifpay=$msql->f('ifpay');
			$iftui=$msql->f('iftui');
			$items=$msql->f('items');
			$s_name=$msql->f('s_name');

			//非会员订单查询码生成(防止直接地址栏输入订单号)
			$md=substr(md5($OrderNo.$s_name),0,5);

			//在线支付成功返回提示
			if($act=="ok" && $ifpay=="1" && ($memberid=="0" || ($memberid!="0" && isLogin() && $memberid==$_COOKIE["MEMBERID"]))){
				$var=array(
				'orderid'=>$orderid,
				'OrderNo'=>$OrderNo,
				'md'=>$md,
				'paytotal'=>$paytotal,
				'paytype'=>$paytype,
				);
				$str.=ShowTplTemp($TempArr["ok1"],$var);
				$str.=$TempArr["end"];
				return $str;
			}
			
			//判断会员本人订单或非会员订单
			if($memberid!="0"){
				if(islogin()){
					if($memberid==$_COOKIE["MEMBERID"]){
						$ifshowpay=1;
					}else{
						//订单的会员和当前会员不符
						$ifshowpay=0;
						$var=array('ntc'=>"订单不存在");
						$str.=ShowTplTemp($TempArr["err1"],$var);
						$str.=$TempArr["end"];
						return $str;
					}

				}else{
					//会员订单在没有登录时不能付款并跳转到登录
					$ifshowpay=0;
					header("location:".ROOTPATH."member/login.php");
				}
			}else{
				if($payid=="0"){
					//非会员订购禁止会员帐户扣款
					$ifshowpay=0;
					$var=array('ntc'=>"当前订单不可使用会员帐户扣款");
					$str.=ShowTplTemp($TempArr["err1"],$var);
					$str.=$TempArr["end"];
					return $str;
				}else{
					$ifshowpay=1;
				}
			}

			
			//已经付款
			if($ifpay=="1"){
				$ifshowpay=0;
				$var=array('ntc'=>"当前订单是已付款状态，不能重复付款");
				$str.=ShowTplTemp($TempArr["err1"],$var);
				$str.=$TempArr["end"];
				return $str;
			}

			//已经退订
			if($iftui=="1"){
				$ifshowpay=0;
				$var=array('ntc'=>"当前订单已经退订，不能付款");
				$str.=ShowTplTemp($TempArr["err1"],$var);
				$str.=$TempArr["end"];
				return $str;
			}

			

		}else{
			$var=array('ntc'=>"订单不存在");
			$str.=ShowTplTemp($TempArr["err1"],$var);
			$str.=$TempArr["end"];
			return $str;
		}
		

		if($ifshowpay=="1"){

			//付款方式为会员帐户扣款，已经登录且登录身份相符
			if($payid=="0" && islogin() && $memberid!="0" && $memberid==$_COOKIE["MEMBERID"]){

				$fsql->query("select account from {P}_member where memberid='$memberid'");
				if($fsql->next_record()){
					$account=$fsql->f('account');
				}
				if($account>=$paytotal){
					$payntc="<input type='button' id='memberpay' value='从会员帐户扣款支付订单' class='bigbutton' />";
				}else{
					$payntc="您的会员帐户余额不足，请充值后再为订单付款<br /></br /><a href='orderdetail.php?orderid=".$orderid."'>点这里查看订单</a>";
				}
				$var=array(
				'orderid'=>$orderid,
				'OrderNo'=>$OrderNo,
				'md'=>$md,
				'account'=>$account,
				'payntc'=>$payntc,
				'paytotal'=>$paytotal
				);
				$str.=ShowTplTemp($TempArr["m0"],$var);
			}

			//付款方式不是会员帐户扣款
			if($payid!="0"){
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

					//线下支付
					if($pcentertype=="0"){
						$var=array(
						'orderid'=>$orderid,
						'OrderNo'=>$OrderNo,
						'md'=>$md,
						'paytotal'=>$paytotal,
						'intro'=>$intro,
						'pcenter'=>$pcenter
						);
						$str.=ShowTplTemp($TempArr["m1"],$var);
					}



					//在线支付
					if($pcentertype=="1"){
						
						//定义一些常用参数供接口使用
						global $SiteUrl;

						$myurl=$GLOBALS["CONF"][$SiteHttp];  //本网站地址
						$return_url=$SiteUrl."member/paycenter/".$recfile; //同步返回地址  
						$notify_url=""; //异步返回地址
						$v_orderid="SHOP-".$orderid; //带模块名的传递订单号，返回时可识别
													 //在会员帐户充值时，模块名是MEMBER

						//包含支付接口
						$post_api=ROOTPATH."member/paycenter/".$postfile;
						if(file_exists($post_api)){
							include($post_api);
							$var=array(
							'orderid'=>$orderid,
							'OrderNo'=>$OrderNo,
							'paytotal'=>$paytotal,
							'intro'=>$intro,
							'pcenter'=>$pcenter,
							'hiddenString'=>$hiddenString
							);
							$str.=ShowTplTemp($TempArr["m2"],$var);
						}else{
							$var=array('ntc'=>"接口错误：支付接口文件(".$postfile.")不存在");
							$str.=ShowTplTemp($TempArr["err1"],$var);
						}


					}

				}else{
					$var=array('ntc'=>"支付方式不存在，您所选择的支付方式可能已被管理员删除");
					$str.=ShowTplTemp($TempArr["err1"],$var);
				}
				
			}



		}


		$str.=$TempArr["end"];
		return $str;

}

?>
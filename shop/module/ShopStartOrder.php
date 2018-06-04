<?php

/*
	[插件名称] 商品订购
*/

function ShopStartOrder(){

	global $fsql,$msql;

		
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];

		
		//判断积分规则
		$centopen=$GLOBALS["SHOPCONF"]["CentOpen"];

		if($centopen=="1" && isLogin()){
			$showcent="";
		}else{
			$showcent=" style='display:none' ";
		}
		
		//判断是否允许非会员订购
		$nomemberorder=$GLOBALS["SHOPCONF"]["NoMemberOrder"];
		

		//读取购物车信息
		$var=array('showcent'=>$showcent);
		$str.=ShowTplTemp($TempArr["m0"],$var);

		$CARTSTR=$_COOKIE["SHOPCART"];

		$array=explode('#',$CARTSTR);
		$tnums=sizeof($array)-1;
		$tjine=0;
		$tweight=0;
		$kk=0;
		
		for($t=0;$t<$tnums;$t++){
				$fff=explode('|',$array[$t]);
				$gid=$fff[0];
				$acc=$fff[1];

				$fsql->query("select * from {P}_shop_con where id='$gid'");
				if($fsql->next_record()){
					$bn=$fsql->f('bn');
					$title=$fsql->f('title');
					$danwei=$fsql->f('danwei');
					$price=$fsql->f('price');
					$cent=$fsql->f('cent');
					$weight=$fsql->f('weight');
					
					$price=getMemberPrice($gid,$price);
					$showprice=number_format($price,2,'.','');
					$jine=$price*$acc;
					$jine=number_format($jine,2,'.','');
					$weight=$weight*$acc;
					

					//计算积分
					$cent=accountCent($cent,$price)*$acc;
					
					$goodsurl=ROOTPATH."shop/html/?".$gid.".html";
				
					$var=array (
					'gid' => $gid,
					'goodsurl' => $goodsurl,
					'jine' => $jine, 
					'weight' => $weight, 
					'price' => $showprice,
					'acc' => $acc,
					'fz' => '',
					'goodsname' => $title,
					'danwei' => $danwei,
					'bn' => $bn,
					'showcent'=>$showcent,
					'cent'=>$cent
					);
						
					$str.=ShowTplTemp($TempArr["list"],$var);
					
					
				}
			$tjine=$tjine+$jine;
			$tcent=$tcent+$cent;
			$tweight=$tweight+$weight;
			$kk++;
		}
		$tjine=number_format($tjine,2,'.','');
		
		$var=array('tjine' => $tjine,'tweight' => $tweight,'showcent'=>$showcent,'tcent'=>$tcent);
		$str.=ShowTplTemp($TempArr["m1"],$var);
		

		if($kk>0){
			$var=array('tjine' => $tjine,'nomemberorder'=>$nomemberorder);
			$str.=ShowTplTemp($TempArr["m2"],$var);
		}else{
			header("location:cart.php");
		}
		
		$str.=$TempArr["end"];


		return $str;

}

?>
<?php

/*
	[插件名称] 购物车提示信息
*/

function ShopSmallCart(){

	global $fsql,$msql;

		
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		
		//计算价格包含
		include_once(ROOTPATH."shop/includes/shop.inc.php");
		
		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);


		$CARTSTR=$_COOKIE["SHOPCART"];

		$array=explode('#',$CARTSTR);
		$tnums=sizeof($array)-1;
		$tjine=0;
		$tacc=0;
		$kk=0;
		
		for($t=0;$t<$tnums;$t++){
				$fff=explode('|',$array[$t]);
				$gid=$fff[0];
				$acc=$fff[1];

				$fsql->query("select * from {P}_shop_con where id='$gid'");
				if($fsql->next_record()){
					$price=$fsql->f('price');
					$price=getMemberPrice($gid,$price);
					$jine=$price*$acc;
				}
			$tjine=$tjine+$jine;
			$tacc=$tacc+$acc;
			$kk++;
		}
		$tjine=number_format($tjine,2,'.','');
		
		$var=array('tjine' => $tjine,'tnums'=>$tnums,'tacc'=>$tacc);

		$str=ShowTplTemp($TempArr["start"],$var);
		
		$str.=$TempArr["end"];

		return $str;

}

?>
<?php

/*
	[插件名称] 购物车
*/

function HzCart(){

	global $fsql,$msql;

		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		//读取会员当前剩余积分
		$memberid=$_COOKIE["MEMBERID"];
		$centid=$GLOBALS["HZCONF"]["CentType"];
		$centcol="cent".$centid;
		$fsql->query("select * from {P}_member where memberid='$memberid'");
		if($fsql->next_record()){
			$symcent=$fsql->f($centcol);
		}

		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];


		//购物车开始
		$var=array('showcent'=>$showcent);
		$str.=ShowTplTemp($TempArr["m0"],$var);

		$CARTSTR=$_COOKIE["HZCART"];

		$array=explode('#',$CARTSTR);
		$tnums=sizeof($array)-1;
		$tjine=0;
		$kk=0;
		
		for($t=0;$t<$tnums;$t++){
				$fff=explode('|',$array[$t]);
				$gid=$fff[0];
				$acc=$fff[1];

				$fsql->query("select * from {P}_hz_con where id='$gid'");
				if($fsql->next_record()){
					$title=$fsql->f('title');
					$cent=$fsql->f('cent');
					
					$jcent=$cent*$acc;
					$goodsurl=ROOTPATH."dingcan/html/?".$gid.".html";
				
					$var=array (
						'gid' => $gid,
						'goodsurl' => $goodsurl,
						'acc' => $acc,
						'fz' => '',
						'goodsname' => $title,
						'jcent'=>$jcent,
						'cent'=>$cent
					);
						
					$str.=ShowTplTemp($TempArr["list"],$var);
					
					
				}
			$tcent=$tcent+$jcent;
			$kk++;
		}
		
		$var=array(
			'tcent'=>$tcent,
			'symcent'=>$symcent
		);
		$str.=ShowTplTemp($TempArr["m1"],$var);
		

		if($kk>0){
			$str.=$TempArr["m2"];
		}else{
			$str.=$TempArr["m3"];
		}
		
		$str.=$TempArr["end"];


		return $str;

}

?>
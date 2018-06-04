<?php

/*
	[插件名称] 会员登录信息
	[适用范围] 会员中心
*/

function MemberInfo(){

	global $msql;
		
	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	$memberid=$_COOKIE["MEMBERID"];
	$memberid=htmlspecialchars($memberid);

		

		$msql->query("select * from {P}_member where memberid='".$memberid."'");
		if($msql->next_record()){
			$user=$msql->f('user');
			$memberid=$msql->f('memberid');
			$membertypeid=$msql->f('membertypeid');
			$membergroupid=$msql->f('membergroupid');
			$name=$msql->f('name');
			$pname=$msql->f('pname');
			$sex=$msql->f('sex');
			$birthday=$msql->f('birthday');
			$zoneid=$msql->f('zoneid');
			$addr=$msql->f('addr');
			$tel=$msql->f('tel');
			$mov=$msql->f('mov');
			$postcode=$msql->f('postcode');
			$email=$msql->f('email');
			$url=$msql->f('url');
			$passtype=$msql->f('passtype');
			$passcode=$msql->f('passcode');
			$qq=$msql->f('qq');
			$msn=$msql->f('msn');
			$maillist=$msql->f('maillist');
			$bz=$msql->f('bz');
			$regtime=date("Y-m-d H:i:s",$msql->f('regtime'));
			$account=$msql->f('account');
			$paytotal=$msql->f('paytotal');
			$buytotal=$msql->f('buytotal');
			$cent1=$msql->f('cent1');
			$cent2=$msql->f('cent2');
			$cent3=$msql->f('cent3');
			$cent4=$msql->f('cent4');
			$cent5=$msql->f('cent5');
			$memberface=$msql->f('memberface');
			$nowface=$msql->f('nowface');
			$ip=$msql->f('ip');
			$logincount=$msql->f('logincount');
			$logintime=date("Y-m-d H:i:s",$msql->f('logintime'));
			$loginip=$msql->f('loginip');

			$exptime=$msql->f('exptime');
		
			if($exptime=="0"){
				$exptime="---";
			}else{
				$exptime=date("Y-m-d H:i:s",$msql->f('exptime'));
			}
		

		}

		$memberurl=ROOTPATH."member/home.php?mid=".$memberid;



		$Temp=LoadTemp($tempname);

		$var=array(
			'user' => $user,
			'name' => $name,
			'pname' => $pname,
			'account' => $account,
			'logincount' => $logincount,
			'memberurl' => $memberurl,
			'ip' => $ip,
			'logintime' => $logintime,
			'loginip' => $loginip,
			'regtime' => $regtime,
			'exptime' => $exptime
		);
		
		$str=ShowTplTemp($Temp,$var);

		return $str;


}

?>
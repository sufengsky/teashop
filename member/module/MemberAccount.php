<?php


function MemberAccount(){

	global $msql,$fsql;

	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$memberid=$_COOKIE["MEMBERID"];
	$memberid=htmlspecialchars($memberid);

	
	//获取会员资料
	$msql->query("select * from {P}_member where memberid='$memberid'");
	if($msql->next_record()){
		$user=$msql->f('user');
		$email=$msql->f('email');
	}


	$var=array (
		'user' => $user, 
		'email' => $email, 
		'password' => $password
	);


	//模版解释
	$Temp=LoadTemp($tempname);
	$str=ShowTplTemp($Temp,$var);

	return $str;

}



?>
<?php


function RegDetail(){

	global $msql,$fsql;

	
	$memberid=$_COOKIE["MEMBERID"];

	
	//获取会员资料
	$msql->query("select * from {P}_member where memberid='$memberid'");
	if($msql->next_record()){
		$name=$msql->f('name');
		$company=$msql->f('company');
		$sex=$msql->f('sex');
		$birthday=$msql->f('birthday');
		$zoneid=$msql->f('zoneid');
		$url=$msql->f('url');
		$passtype=$msql->f('passtype');
		$passcode=$msql->f('passcode');
		$bz=$msql->f('bz');
		$membertypeid=$msql->f('membertypeid');
		$membergroupid=$msql->f('membergroupid');
	}

	//不同会员类型不同模板
	switch($membergroupid){
		case"1":
			$tempname="tpl_reg_detail.htm";
		break;
		case"2":
			$tempname="tpl_reg_detail_company.htm";
		break;
		default:
			$tempname="tpl_reg_detail.htm";
		break;
	}
	

	
	
	//表单数据处理		
	$yy=substr($birthday,0,4);
	$mm=substr($birthday,4,2);
	$dd=substr($birthday,6,2);
	
	$BirthYear=BirthYear($yy);
	$BirthMonth=BirthMonth($mm);
	$BirthDay=BirthDay($dd);
	$PassList=PassList($passtype);
	$ZONE=ZoneList($zoneid);
	$ZoneList=$ZONE["str"];
	$Province=$ZONE["pr"];

	if($url==""){$url="http://";}
	if($sex=="1"){$CHKman=" checked";}
	if($sex=="2"){$CHKwoman=" checked";}

	$var=array (
		'membertypeid' => $membertypeid, 
		'BirthYear' => $BirthYear, 
		'CHKman' => $CHKman, 
		'CHKwoman' => $CHKwoman, 
		'BirthMonth' => $BirthMonth,
		'BirthDay' => $BirthDay,
		'ZoneList' => $ZoneList, 
		'Province' => $Province, 
		'PassList' => $PassList, 
		'name' => $name, 
		'company' => $company, 
		'zoneid' => $zoneid, 
		'url' => $url, 
		'passcode' => $passcode, 
		'bz' => $bz
	);


	//模版解释
	$Temp=LoadTemp($tempname);
	$str=ShowTplTemp($Temp,$var);

	return $str;

}



?>
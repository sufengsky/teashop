<?php

/*
	[插件名称] 会员模块导航条
	[适用范围] 会员模块
*/


function MemberNavPath(){

	global $msql,$strHomePage;


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$pagename=$GLOBALS["PLUSVARS"]["pagename"];

	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);


	$var=array (
		'coltitle' => $coltitle,
		'sitename' => $GLOBALS["CONF"]["SiteName"]
	);

	$str=ShowTplTemp($TempArr["start"],$var);

	
	//模块频道名称
	if($GLOBALS["MEMBERCONF"]["ChannelNameInNav"]=="1"){
		$var=array ('channel' => $GLOBALS["MEMBERCONF"]["ChannelName"]);
	}

	switch($pagename){
		case "homepage":
			if($_GET["mid"]!=""){
				$msql->query("select pname from {P}_member where memberid='".$_GET["mid"]."'");
				if($msql->next_record()){
					$pname=$msql->f('pname');
				}
			}
			$var=array ('nav' => $pname.$strHomePage);
			$GLOBALS["pagetitle"]=$pname.$strHomePage;
			$str.=ShowTplTemp($TempArr["con"],$var);
		break;

		default:
			$str.=ShowTplTemp($TempArr["col"],$var);
			$var=array('nav' => $GLOBALS["PSET"]["name"]);
			$GLOBALS["pagetitle"].=$GLOBALS["PSET"]["name"];
			$str.=ShowTplTemp($TempArr["con"],$var);
		break;
	}
	
	
	
	
		
	


	$str.=$TempArr["end"];
	return $str;
}

?>
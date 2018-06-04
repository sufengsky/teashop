<?php


function MemberReg(){

	global $msql,$fsql;

	
	$step=$_REQUEST["step"];

	switch($step){

		case "person":
			include("module/RegPerson.php");
			return ShowActive(RegPerson());
		break;

		case "detail":
			include("module/RegDetail.php");
			return ShowActive(RegDetail());
		break;

		case "contact":
			include("module/RegContact.php");
			return ShowActive(RegContact());
		break;

		default:
				$tempname=$GLOBALS["PLUSVARS"]["tempname"];
				$Temp=LoadTemp($tempname);

				$var=array (
					'typelist' => MemberTypeList(),
				);
				$str=ShowTplTemp($Temp,$var);
				return $str;
		break;

	}
		

}


?>
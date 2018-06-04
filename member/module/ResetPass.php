<?php


function ResetPass(){

	global $msql,$SiteUrl;
	global $strLostpassNtc1,$strLostpassNtc2,$strLostpassNtc3,$strLostpassNtc4,$strLostpassNtc5;
	global $strLostpassNtc6,$strLostpassNtc7,$strLostpassNtc8,$strLostpassNtc9;


	
	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$Temp=LoadTemp($tempname);
	

	$step=$_REQUEST["step"];
	

	if($step=="checkmail"){

			$codestr=$_GET["codestr"];
			$username=$_GET["username"];
			$tm=$_GET["tm"];

			if(!isset($_COOKIE["NEWPASSWD"]) || $_COOKIE["NEWPASSWD"]==""){
				$PageMain=err($strLostpassNtc7,"lostpass.php","");
				return $PageMain;
			}

			$md5=md5($username."Z(o)C~LoSbZ8Tj7MvBAs(8)!nn^Lp^12345^Pm".$_COOKIE["NEWPASSWD"].$tm);
			if($md5==$codestr){

				$mdpass=md5($_COOKIE["NEWPASSWD"]);
				
				$msql->query("update {P}_member set password='$mdpass' where user='$username'");
				
				$PageMain=SayOk($strLostpassNtc8,"login.php","");
				return $PageMain;
				

			}else{

				$PageMain=err($strLostpassNtc9,"lostpass.php","");
				return $PageMain;

			}


	}elseif($step=="2"){

		$username=$_POST["username"];
		$newpass=$_POST["newpass"];

		if(!isset($username) || $username=="" || $newpass==""){
			$str=err($strLostpassNtc1,"","");
			return $str;
			
		}else{

			$msql->query("select email from {P}_member where user='$username'");
			if($msql->next_record()){
				
				$email=$msql->f('email');

				$tm=time();

				setCookie("NEWPASSWD",$newpass,time()+7200);

				$md5=md5($username."Z(o)C~LoSbZ8Tj7MvBAs(8)!nn^Lp^12345^Pm".$newpass.$tm);

				$link=$SiteUrl."lostpass.php?step=checkmail&username=".$username."&codestr=".$md5."&tm=".$tm;

				$message=$username.$strLostpassNtc2."\r\n \r\n".$strLostpassNtc3."\r\n \r\n".$link."\r\n \r\n".$GLOBALS["CONF"]["SiteName"]."\r\n".$GLOBALS["CONF"]["SiteHttp"];

				include(ROOTPATH."includes/ebmail.inc.php");
				ebmail($email,$GLOBALS["CONF"]["SiteEmail"],$strLostpassNtc4,$message);

				$str=SayOk($strLostpassNtc5."<br><br>".$email,"","");
				return $str;

			}else{
				$str=err($strLostpassNtc6,"","");
				return $str;

			}
		}
		
	}else{
		
		$var=array(
			'coltitle' => $coltitle
		);
		
		$str=ShowTplTemp($Temp,$var);
		return $str;
	}

}

?>
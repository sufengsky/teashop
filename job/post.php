<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");

$act = $_POST['act'];

switch($act){


	//反馈表单提交
	case "formsend":
		
		$REMOTE_ADDR=$_SERVER["REMOTE_ADDR"];
		$jobid=htmlspecialchars($_POST["jobid"]);
		$email=htmlspecialchars($_POST["email"]);
		$title=htmlspecialchars($_POST["title"]);
		$name=htmlspecialchars($_POST["name"]);
		$sex=htmlspecialchars($_POST["sex"]);
		$tel=htmlspecialchars($_POST["tel"]);
		$address=htmlspecialchars($_POST["address"]);
		$email=htmlspecialchars($_POST["email"]);
		$url=htmlspecialchars($_POST["url"]);
		$qq=htmlspecialchars($_POST["qq"]);
		$company=htmlspecialchars($_POST["company"]);
		$company_address=htmlspecialchars($_POST["company_address"]);
		$zip=htmlspecialchars($_POST["zip"]);
		$fax=htmlspecialchars($_POST["fax"]);
		$products_id=htmlspecialchars($_POST["products_id"]);
		$products_name=htmlspecialchars($_POST["products_name"]);
		$products_num=htmlspecialchars($_POST["products_num"]);
		$content=htmlspecialchars($_POST["content"]);
		$custom1=htmlspecialchars($_POST["custom1"]);
		$custom2=htmlspecialchars($_POST["custom2"]);
		$custom3=htmlspecialchars($_POST["custom3"]);
		$custom4=htmlspecialchars($_POST["custom4"]);
		$custom5=htmlspecialchars($_POST["custom5"]);
		$custom6=htmlspecialchars($_POST["custom6"]);
		$custom7=htmlspecialchars($_POST["custom7"]);
		$checkimgcode=htmlspecialchars($_POST["checkimgcode"]);
		$ip=$_SERVER["REMOTE_ADDR"];



		$fsql -> query ("select field_caption,field_name,field_null,value_repeat from {P}_job_form where use_field = '1' order by xuhao");
		while ($fsql -> next_record ()) {
			$field_caption = $fsql -> f ('field_caption');
			$field_name = $fsql -> f ('field_name');
			$field_null = $fsql -> f ('field_null');
			$value_repeat = $fsql -> f ('value_repeat');
			$nowvalue=$_POST[$field_name];
			
			if ($field_null == "1" && (!isset ($nowvalue) || $nowvalue == "")) {
				echo $FormSendNTC1.$field_caption;
				exit;
			}


			if ($value_repeat == "0" && $nowvalue != "") {
				$tsql -> query ("select id from {P}_job_telent where " . $field_name . "='" . $nowvalue . "'");
				if ($tsql -> next_record ()) {
					echo $field_caption.$FormSendNTC2;
					exit;
				}
			}
		}

		//图形验证码
		if($checkimgcode!="no"){
			$ImgCode=$_POST["ImgCode"];
			
			$Ic=$_COOKIE["CODEIMG"];
			$Ic=strrev($Ic)+5*2-9;
			$Ic=substr ($Ic,0,4);

			if($ImgCode=="" || $Ic!=$ImgCode){
				echo $strIcErr;
				exit;
			}
		}

		$nowtime = time ();

		$tsql -> query ("select jobname from {P}_job where id='$jobid'");
		if ($tsql -> next_record ()) {
			$jobname=$tsql->f('jobname');
		}
		
		
		$tsql -> query ("insert into {P}_job_telent set
		`jobid`='$jobid',
		`jobname`='$jobname',
		`title`='$title',
		`content`='$content',
		`name`='$name',
		`sex`='$sex',
		`tel`='$tel',
		`address`='$address',
		`email`='$email',
		`url`='$url',
		`qq`='$qq',
		`company`='$company',
		`company_address`='$company_address',
		`zip`='$zip',
		`fax`='$fax',
		`products_id`='$products_id',
		`products_name`='$products_name',
		`products_num`='$products_num',
		`custom1`='$custom1',
		`custom2`='$custom2',
		`custom3`='$custom3',
		`custom4`='$custom4',
		`custom5`='$custom5',
		`custom6`='$custom6',
		`custom7`='$custom7',
		`ip`='$ip',
		`time`='$nowtime',
		`uptime`='$nowtime',
		`stat`='0',
		`fav`='0'
		 ");
		echo "OK";
		exit;

	break;

}
?>
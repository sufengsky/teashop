<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
include("func/upload.inc.php");


$act=$_POST["act"];

switch($act){
	
	//图片投票系统－－修改图片
	case "photopollmodify" :
		
		NeedAuth(83);
		
		$id=$_POST["id"];
		$gid=$_POST["gid"];
		$title=htmlspecialchars($_POST["title"]);
		$author=htmlspecialchars($_POST["author"]);
		$body=htmlspecialchars($_POST["body"]);
		$page=$_POST["page"];
		
		$pic=$_FILES["jpg"];

		
		//jform????iframe??????????????????????????
		if($pic["size"]>0){
			$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
		}
		
		
		//对获取数据进行处理
		if($title==""){
			echo $Meta.$strPhotoNotice6;
			exit;
		}

		if(strlen($title)>200){
			echo $Meta.$strPhotoNotice7;
			exit;
		}

		if(strlen($body)>65000){
			echo $Meta.$strPhotoNotice5;
			exit;
		}

		$uptime=time();


		//上传图片修改
		if($pic["size"]>0){
			$nowdate=date("Ymd",time());
			$picpath="../pics/".$nowdate;
			@mkdir($picpath,0777);
			$uppath="tools/pics/".$nowdate;
			
			$arr=NewUploadImage($pic["tmp_name"],$pic["type"],$pic["size"],$uppath);
			if($arr[0]!="err"){
				$src=$arr[3];
			}else{
				echo $Meta.$arr[1];
				exit;
			}

			$msql->query("select src from {P}_tools_photopolldata where id='$id'");
			if($msql->next_record()){
				$oldsrc=$msql->f('src');
			}
			if(file_exists(ROOTPATH.$oldsrc) && $oldsrc!="" && !strstr($oldsrc,"../")){
				unlink(ROOTPATH.$oldsrc);
			}

			$msql->query("update {P}_tools_photopolldata set src='$src' where id='$id'");

		}
		
		//入库
		$msql->query("update {P}_tools_photopolldata set 
			poll_id='$gid',
			title='$title',
			body='$body',
			uptime='$uptime',
			author='$author'
			
		where id='$id' ");
	
		echo "OK.".$gid;
		exit;
	
	break;


	//图片投票系统－－添加图片
	case "photopollconadd" :
		
		NeedAuth(83);
		
		$gid=$_POST["gid"];
		$title=htmlspecialchars($_POST["title"]);
		$author=htmlspecialchars($_POST["author"]);
		$body=htmlspecialchars($_POST["body"]);
		
		$pic=$_FILES["jpg"];

		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
		
		
		
		//对获取数据进行处理
		if($pic["size"]<=0){
			echo $Meta.$strPhotoNotice3;
			exit;
		}

		if($title==""){
			echo $Meta.$strPhotoNotice6;
			exit;
		}

		if(strlen($title)>200){
			echo $Meta.$strPhotoNotice7;
			exit;
		}

		if(strlen($body)>65000){
			echo $Meta.$strPhotoNotice5;
			exit;
		}


		$uptime=time();
		$dtime=time();
		
		//上传图片
		if($pic["size"]>0){
			$nowdate=date("Ymd",time());
			$picpath="../pics/".$nowdate;
			@mkdir($picpath,0777);
			$uppath="tools/pics/".$nowdate;
			$arr=NewUploadImage($pic["tmp_name"],$pic["type"],$pic["size"],$uppath);
			if($arr[0]!="err"){
				$src=$arr[3];
			}else{
				echo $Meta.$arr[1];
				exit;
			}
			
		}
		

		//入库
		
		$msql->query("insert into {P}_tools_photopolldata set
			poll_id='$gid',
			title='$title',
			body='$body',
			dtime='$dtime',
			tj='0',
			iffb='1',
			type='gif',
			src='$src',
			uptime='$uptime',
			author='$author',
			secure='0'
		");
		
		echo "OK.".$gid;
		exit;

	break;
	
	
	//QQ客服系统－－添加QQ客服
	case "qqadd" :
		
		NeedAuth(84);
		
		$nowxuhao=0;
		$id=$_POST["id"];
		$qq=htmlspecialchars($_POST["qq"]);
		$name=htmlspecialchars($_POST["name"]);
		$position=htmlspecialchars($_POST["position"]);
		$tel=htmlspecialchars($_POST["tel"]);
		$phone=htmlspecialchars($_POST["phone"]);
		$xuhao=htmlspecialchars($_POST["xuhao"]);
		$memo=$_POST["memo"];
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
				
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($qq==""){
			echo $Meta."请填写联系人信息";
			exit;
		}

		if(!intval($qq) || strlen($qq)>15){
			echo $Meta."QQ号码必须是15位以内的整数";
			exit;
		}

		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		//处理序号
		if($xuhao!='' && $xuhao!=0){
			$nowxuhao=$xuhao;
		}else{
			$msql->query("select max(xuhao) from {P}_tools_code where cat='qq' ");
			if($msql->next_record()){
				$maxxuhao=$msql->f('max(xuhao)');
				
				$nowxuhao=$maxxuhao+1;
			}
		}

		$dtime=time();
		$uptime=time();		


		//入库
		$msql->query("insert into {P}_tools_code set
			cat='qq',
			qq='$qq',
			name='$name',
			position='$position',
			tel='$tel',
			phone='$phone',
			memo='$memo',
			code='$code',
			xuhao='$nowxuhao',
			iffb='1',
			tj='0',
			dtime='$dtime',
			uptime='$uptime',
			author='$author'
		");
		
		echo "OK";
		exit;

	break;
	
	
	//QQ客服系统－－修改QQ客服
	case "qqmodify" :
	
		NeedAuth(84);
		
		$nowxuhao=0;
		$id=$_POST["id"];
		$qq=htmlspecialchars($_POST["qq"]);
		$name=htmlspecialchars($_POST["name"]);
		$position=htmlspecialchars($_POST["position"]);
		$tel=htmlspecialchars($_POST["tel"]);
		$phone=htmlspecialchars($_POST["phone"]);
		$xuhao=htmlspecialchars($_POST["xuhao"]);
		$memo=$_POST["memo"];
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
		
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($qq==""){
			echo $Meta."请填写联系人信息";
			exit;
		}
		
		if(!intval($qq) || strlen($qq)>15){
			echo $Meta."QQ号码必须是15位以内的整数";
			exit;
		}

		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		//处理序号
		if($xuhao!='' && $xuhao!=0){
			$nowxuhao=$xuhao;
		}else{
			$msql->query("select max(xuhao) from {P}_tools_code where cat='qq' ");
			if($msql->next_record()){
				$maxxuhao=$msql->f('max(xuhao)');
				
				$nowxuhao=$maxxuhao+1;
			}
		}

		$uptime=time();		


		//入库
		$msql->query("update {P}_tools_code set
			qq='$qq',
			name='$name',
			position='$position',
			tel='$tel',
			phone='$phone',
			memo='$memo',
			code='$code',
			xuhao='$nowxuhao',
			uptime='$uptime',
			author='$author'
		where cat='qq' and id='$id' ");
		
		echo "OK";
		exit;

	break;
	
		
	
	//51客服系统－－添加51客服
	case "wyadd" :
		
		NeedAuth(85);
		
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
				
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		$dtime=time();
		$uptime=time();		


		//入库
		$msql->query("insert into {P}_tools_code set
			cat='wy',
			code='$code',
			iffb='1',
			tj='0',
			dtime='$dtime',
			uptime='$uptime',
			author='$author'
		");
		
		echo "OK";
		exit;

	break;
	
	
	
	//51客服系统－－修改51客服
	case "wymodify" :
	
		NeedAuth(85);
		
		$id=$_POST["id"];
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
		
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		$uptime=time();		


		//入库
		$msql->query("update {P}_tools_code set
			code='$code',
			uptime='$uptime',
			author='$author'
		where cat='wy' and id='$id' ");
		
		echo "OK";
		exit;

	break;
	
	
	//51la统计系统－－添加51la统计代码
	case "wylaadd" :
		
		NeedAuth(86);
		
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
				
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		$dtime=time();
		$uptime=time();		


		//入库
		$msql->query("insert into {P}_tools_code set
			cat='wyla',
			code='$code',
			iffb='1',
			tj='0',
			dtime='$dtime',
			uptime='$uptime',
			author='$author'
		");
		
		echo "OK";
		exit;

	break;
	
	
	
	//51la统计系统－－修改51la统计代码
	case "wylamodify" :
	
		NeedAuth(86);
		
		$id=$_POST["id"];
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
		
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		$uptime=time();		


		//入库
		$msql->query("update {P}_tools_code set
			code='$code',
			uptime='$uptime',
			author='$author'
		where cat='wyla' and id='$id' ");
		
		echo "OK";
		exit;

	break;
	
	
	
	//移动短信留言系统－－添加移动短信留言板代码
	case "ydadd" :
		
		NeedAuth(87);
		
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
				
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		$dtime=time();
		$uptime=time();		


		//入库
		$msql->query("insert into {P}_tools_code set
			cat='yd',
			code='$code',
			iffb='1',
			tj='0',
			dtime='$dtime',
			uptime='$uptime',
			author='$author'
		");
		
		echo "OK";
		exit;

	break;
	
	
	
	//移动短信留言系统－－修改移动短信留言板代码
	case "ydmodify" :
	
		NeedAuth(87);
		
		$id=$_POST["id"];
		$code=$_POST["code"];
		$author=htmlspecialchars($_POST["author"]);
		
		//jform????iframe??????????????????????????
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		
		//对获取数据进行处理
		if($code=='' || strlen($code)>65000){
			echo $Meta."代码不能为空且其长度不得大于65K";
			exit;
		}
		
		$uptime=time();		


		//入库
		$msql->query("update {P}_tools_code set
			code='$code',
			uptime='$uptime',
			author='$author'
		where cat='yd' and id='$id' ");
		
		echo "OK";
		exit;

	break;


}
?>
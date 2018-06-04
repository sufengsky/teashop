<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");
include("includes/comment.inc.php");

$act = $_POST['act'];

switch($act){


	//表单提交
	case "commentsend":
		
		$REMOTE_ADDR=$_SERVER["REMOTE_ADDR"];
	
		$title=htmlspecialchars($_POST["title"]);
		$useedit=htmlspecialchars($_POST["useedit"]);
		$star=htmlspecialchars($_POST["star"]);
		$catid=htmlspecialchars($_POST["catid"]);
		$rid=htmlspecialchars($_POST["rid"]);
		$pid=htmlspecialchars($_POST["pid"]);
		$pj1=htmlspecialchars($_POST["pj1"]);
		$pj2=htmlspecialchars($_POST["pj2"]);
		$pj3=htmlspecialchars($_POST["pj3"]);
		$nomember=htmlspecialchars($_POST["nomember"]);


		//兼容编辑器和非编辑器并存
		if($useedit=="1"){
			$body=Url2Path($_POST["body"]);
		}else{
			$body=htmlspecialchars($_POST["body"]);
			$body=nl2br($body);
		}
				
		$uptime=time();
		$dtime=time();
		
		//jform是在iframe中实现的，需要给中文提示加上编码
		$Meta="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

		if(!isLogin() && $nomember!="1"){
			echo "NOTLOGIN";
			exit;
		}

		//校验
		if($title==""){
			echo $Meta.$strCommentNTC1;
			exit;
		}

		if($body==""){
			echo $Meta.$strCommentNTC8;
			exit;
		}


		//关键词过滤
		$DenyArr=explode(",",$GLOBALS["COMMENTCONF"]["KeywordDeny"]);
		for($i=0;$i<sizeof($DenyArr);$i++){
			if(strlen($DenyArr[$i])>2){
				if(strstr($body,$DenyArr[$i]) || strstr($title,$DenyArr[$i])){
					echo $strCommentNTC13;
					exit;
				}
			}
		}

		//标签过滤
		$title=str_replace("{#","",$title);
		$title=str_replace("#}","",$title);
		$body=str_replace("{#","{ #",$body);
		$body=str_replace("#}","# }",$body);


		//图形验证
		$ImgCode=$_POST["ImgCode"];
		$Ic=$_COOKIE["CODEIMG"];
		$Ic=strrev($Ic)+5*2-9;
		$Ic=substr ($Ic,0,4);

		if($ImgCode=="" || $Ic!=$ImgCode){
			echo $Meta.$strIcErr;
			exit;
		}


		//是否匿名
		if($nomember=="1"){

			$memberid="-1";
			$pname=$strGuest;

			//匿名发表是否审核
			if($GLOBALS["COMMENTCONF"]["noMembercheck"]=="1"){
				$iffb=0;
			}else{
				$iffb=1;
			}


		}else{

			//获取会员信息
			$memberid=$_COOKIE["MEMBERID"];
			$pname=$_COOKIE["MEMBERPNAME"];

			//会员权限
			if($pid!="0" && $pid!="" ){
				if(SecureFunc("132")==false){
					echo $Meta.$strCommentNTC6;
					exit;
				}
			}else{
				if(SecureFunc("131")==false){
					echo $Meta.$strCommentNTC5;
					exit;
				}
			}


			//会员发布是否审核
			if(SecureFunc("133")==true){
				$iffb=1;
			}else{
				$iffb=0;
			}
		}


		if($pid==""){
			$pid=0;
		}

		if($rid==""){
			$rid=0;
		}



		//评分-预留三档评分，pj1-3兼容性处理，如果表单中没有的评价，则以3分入库
		if($pj1==""){$pj1=3;}
		if($pj2==""){$pj2=3;}
		if($pj3==""){$pj3=3;}
			
		
		//入库

		$msql->query("insert into {P}_comment set
		   pid='$pid',
		   catid='$catid',
		   rid='$rid',
		   pname='$pname',
		   title='$title',
		   body='$body',
		   pj1='$pj1',
		   pj2='$pj2',
		   pj3='$pj3',
		   dtime='$dtime',
		   uptime='$uptime',
		   ip='$REMOTE_ADDR',
		   iffb='$iffb',
		   tuijian='0',
		   cl='0',
		   lastname='$pname',
		   lastmemberid='$memberid',
		   backcount='0',
		   xuhao='1',
		   memberid='$memberid'
		
		");

		$nowbbsid=$msql->instid();


		

		if($pid!="0" && $pid!="" ){

			//重新计算上级贴的回复数
			$msql->query("select count(id) from {P}_comment where pid='$pid' and iffb='1'");
			if($msql->next_record()){
				$backcount=$msql->f('count(id)');
			}
			
			//更新主记录
			$msql->query("update {P}_comment set 
			uptime='$uptime',
			lastname='$pname',
			lastmemberid='$memberid',
			backcount='$backcount' 
			where id='$pid'");


			//回复点评积分计算
			MemberCentUpdate($memberid,"132");

			
			//短信通知主贴发帖人
			$msql->query("select memberid from {P}_comment where id='$pid'");
			if($msql->next_record()){
				$tomemberid=$msql->f('memberid');
			}

			if($tomemberid!="0" && $tomemberid!="-1"){
				$msg=$pname.$strCommentNTC11."\n<a href=\"../comment/html/?".$pid.".html\">comment/html/?".$pid.".html</a>";
				$msql->query("insert into {P}_member_msn set
				`body`='$msg',
				`tomemberid`='$tomemberid',
				`frommemberid`='0',
				`dtime`='$dtime',
				`iflook`='0'
				");
			}


			//返回
			if($iffb=="1"){
				echo "OK_".$pid;
				exit;
			}else{
				echo "CHK";
				exit;
			}
			
		}else{
			
			//新点评积分计算
			MemberCentUpdate($memberid,"131");

			if($iffb=="1"){
				echo "OK_".$nowbbsid;
				exit;
			}else{
				echo "CHK";
				exit;
			}
		}
		
	break;



	//判断是否版主，决定是否显示版主功能链接
	case "ifbanzhu" :
		
		$commentid=$_POST["commentid"];

		if(!isLogin()){
			echo "NO";
			exit;
		}


		$msql->query("select catid from {P}_comment where id='$commentid'");
		if($msql->next_record()){
			$catid=$msql->f('catid');
		}
		
		$secureset=SecureBanzhu("139");

		if(strstr($secureset,":".$catid.":")){
			echo "YES";
			exit;
		}else{
			echo "NO";
			exit;
		}

	break;


	//版主推荐
	case "banzhutj" :

		$commentid=$_POST["commentid"];

		if(!isLogin()){
			echo $strNoRights;
			exit;
		}

		//权限校验
		$msql->query("select catid,tuijian,memberid from {P}_comment where id='$commentid'");
		if($msql->next_record()){
			$catid=$msql->f('catid');
			$tuijian=$msql->f('tuijian');
			$mid=$msql->f('memberid');
		}

		
		$secureset=SecureBanzhu("139");

		if(!strstr($secureset,":".$catid.":")){
			echo $strNoRights;
			exit;
		}

		//校验是否已经推荐(防止重复加分)
		if($tuijian!="0"){
			echo $strCommentNTC7;
			exit;
		}

		
		$msql->query("update {P}_comment set tuijian='1' where id='$commentid'");


		//积分计算
		MemberCentUpdate($mid,"134");

		echo "OK";
		exit;

	break;


	//版主删除
	case "banzhudel" :

		$commentid=$_POST["commentid"];
		$koufen=$_POST["koufen"];

		if(!isLogin()){
			echo $strNoRights;
			exit;
		}

		//权限校验
		$msql->query("select catid,memberid,pid from {P}_comment where id='$commentid'");
		if($msql->next_record()){
			$pid=$msql->f('pid');
			$catid=$msql->f('catid');
			$mid=$msql->f('memberid');
		}else{
			echo $strCommentNTC10;
			exit;
		}

		
		$secureset=SecureBanzhu("139");

		if(!strstr($secureset,":".$catid.":")){
			echo $strNoRights;
			exit;
		}

		//游客不可扣分
		if($koufen=="yes" && $mid=="-1"){
			echo $strCommentNTC9;
			exit;
		}


		//对于主记录,删除回复记录
		if($pid=="0" && $commentid!="0"){
			$fsql->query("delete from {P}_comment where pid='$commentid'");
		}

		//对于子记录,减少主记录回复计数
		if($pid!="0"){
			$fsql->query("update {P}_comment set backcount=backcount-1 where id='$pid'");
		}

		//删除记录
		$fsql->query("delete from {P}_comment where id='$commentid'");

		
		//积分计算
		if($koufen=="yes"){
			MemberCentUpdate($mid,"135");
		}


		echo "OK";
		exit;

	break;


}
?>
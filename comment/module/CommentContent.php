<?php

/*
	[插件名称] 评论详情
	[适用范围] 评论详情页
*/


function CommentContent(){
		

	global $msql,$fsql,$tsql,$strGuest;

	
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];



	//获取地址栏参数
	if(strstr($_SERVER["QUERY_STRING"],".html")){
		$idArr=explode(".html",$_SERVER["QUERY_STRING"]);
		$id=$idArr[0];
	}elseif(isset($_GET["id"]) && $_GET["id"]!=""){
		$id=$_GET["id"];
	}	


	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];


	$page=$_GET["page"];


	$fsql->query("select * from {P}_comment where id='$id'");
	if($fsql->next_record()){
		$memberid=$fsql->f("memberid");
		$catid=$fsql->f('catid');
		$title=$fsql->f('title');
		$lastname=$fsql->f("lastname");
		$rid=$fsql->f("rid");
		$ip=$fsql->f("ip");
		$dtime=$fsql->f("dtime");
		$cl=$fsql->f("cl");
		$iffb=$fsql->f("iffb");
		$body=$fsql->f('body');
	}else{
		$str.=$TempArr["err1"];
		return $str;
	}

	$fsql->query("update {P}_comment set cl=cl+1 where id='$id' and iffb='1'");


	//管理员可以查看未审核的点评
	if(AdminCheckModle()==false && $iffb!="1"){
			$str.=$TempArr["err1"];
			return $str;
	}
	

	
	$fsql->query("select count(id) from {P}_comment where pid='$id' and iffb='1'");
	if($fsql->next_record()){
		$count=$fsql->f('count(id)');
	}

	//是否匿名

	if($memberid=="-1"){
		$pname=$strGuest;
		$nowface="1";
		$signature="";
		$showmemberlink="none";
		$memberurl="#";
	}else{
		$fsql->query("select * from {P}_member where memberid='$memberid'");
		if($fsql->next_record()){
			$pname=$fsql->f("pname");
			$signature=$fsql->f("signature");
			$nowface=$fsql->f("nowface");
			$cent1=$fsql->f("cent1");
			$cent2=$fsql->f("cent2");
			$cent3=$fsql->f("cent3");
		}
		$showmemberlink="block";
		$memberurl=ROOTPATH."member/home.php?mid=".$memberid;
	}



	$arr=explode(".",$ip);
	$ip=$arr[0].".".$arr[1].".".$arr[2]."."."*";
	$dtime=date("Y-n-j H:i:s",$dtime);
	$face=ROOTPATH."member/face/".$nowface.".gif";

	
	//获取积分名称
	$msql->query("select * from {P}_member_centset");
	if($msql->next_record()){
		$centname1=$msql->f('centname1');
		$centname2=$msql->f('centname2');
		$centname3=$msql->f('centname3');
	}


	//翻页和显示回复

	if(AdminCheckModle()==false){
		$scl="pid='$id' and iffb='1'";
	}else{
		$scl="pid='$id' ";
	}

	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=$count;

	
	$pages->setvar(array("id" => $id));

	$pages->set(10,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

	$pagesinfo=$pages->ShowNow();

	$var=array (
		'commentid' => $id, 
		'body' => $body, 
		'memberid' => $memberid, 
		'dtime' => $dtime, 
		'title' => $title, 
		'ip' => $ip, 
		'face' => $face, 
		'showmemberlink' => $showmemberlink, 
		'memberurl' => $memberurl, 
		'signature' => $signature, 
		'count' => $count, 
		'pname' => $pname, 
		'rid' => $rid, 
		'cl' => $cl,
		'centname1' => $centname1,
		'centname2' => $centname2,
		'centname3' => $centname3,
		'cent1' => $cent1,
		'cent2' => $cent2,
		'cent3' => $cent3,
		'showpages' => $pages->output(1),
		'pagestotal' => $pagesinfo["total"],
		'pagesnow' => $pagesinfo["now"],
		'pagesshownum' => $pagesinfo["shownum"],
		'pagesfrom' => $pagesinfo["from"],
		'pagesto' => $pagesinfo["to"],
		'totalnums' => $totalnums
	);

	if($page=="" || $page<=1){
		$str.=ShowTplTemp($TempArr["con"],$var);
	}


	$fsql->query("select * from {P}_comment where $scl order by id limit $pagelimit");
	while($fsql->next_record()){
		$backid=$fsql->f('id');
		$stitle=$fsql->f('title');
		$smemberid=$fsql->f("memberid");
		$sip=$fsql->f("ip");
		$sdtime=$fsql->f("uptime");
		$scl=$fsql->f("cl");
		$sbody=$fsql->f('body');
		$arr=explode(".",$sip);
		$sip=$arr[0].".".$arr[1].".".$arr[2]."."."*";
		$sdtime=date("Y-n-j H:i:s",$sdtime);


		//是否匿名

		if($smemberid=="-1"){
			$spname=$strGuest;
			$snowface="1";
			$ssignature="";
			$showmemberlink="none";
			$memberurl="#";
		}else{
			$msql->query("select * from {P}_member where memberid='$smemberid'");
			if($msql->next_record()){
				$spname=$msql->f("pname");
				$ssignature=$msql->f("signature");
				$snowface=$msql->f("nowface");
				$scent1=$msql->f("cent1");
				$scent2=$msql->f("cent2");
				$scent3=$msql->f("cent3");
			}
			$showmemberlink="block";
			$memberurl=ROOTPATH."member/home.php?mid=".$smemberid;
		}

		$sface=ROOTPATH."member/face/".$snowface.".gif";


		$var=array (
		'backid' => $backid, 
		'body' => $sbody, 
		'memberid' => $smemberid, 
		'dtime' => $sdtime, 
		'ip' => $sip, 
		'face' => $sface, 
		'showmemberlink' => $showmemberlink, 
		'memberurl' => $memberurl, 
		'signature' => $ssignature, 
		'centname1' => $centname1,
		'centname2' => $centname2,
		'centname3' => $centname3,
		'cent1' => $scent1,
		'cent2' => $scent2,
		'cent3' => $scent3,
		'pname' => $spname
		);
		$str.=ShowTplTemp($TempArr["list"],$var);


	}



	$var=array (
	'showpages' => $pages->output(1),
	'pagestotal' => $pagesinfo["total"],
	'pagesnow' => $pagesinfo["now"],
	'pagesshownum' => $pagesinfo["shownum"],
	'pagesfrom' => $pagesinfo["from"],
	'pagesto' => $pagesinfo["to"],
	'totalnums' => $totalnums,
	'title' => $title,
	'catid' => $catid,
	'nowpage' => $page,
	'rid' => $rid,
	'pid' => $id

	);

	$str.=ShowTplTemp($TempArr["end"],$var);


	//网页标题和当前内容ID
	$GLOBALS["commenttitle"]=$title;
	
	return $str;

}



?>
<?php

/*
	[插件名称] 评论检索搜索和发布
	[适用范围] 评论检索页
*/


function CommentQuery(){

	global $fsql,$tsql,$strGuest;

	
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	//地址栏参数

	if(strstr($_SERVER["QUERY_STRING"],".html")){
		$Arr=explode(".html",$_SERVER["QUERY_STRING"]);
		$commentcatid=$catid=$Arr[0];
	}elseif($_GET["catid"]>0){
		$commentcatid=$catid=$_GET["catid"];
	}else{
		$commentcatid=$catid=0;
	}



	$rid=$_GET["rid"];
	$page=$_GET["page"];
	$key=$_GET["key"];
	$myord=$_GET["myord"];
	$myshownums=$_GET["myshownums"];
	$mid=$_GET["mid"];


	if($myshownums!="" && $myshownums!="0"){
		$shownums=$myshownums;
	}
	
	if($myord==""){
		$myord="uptime";
	}


	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];


	$scl=" iffb='1' and pid='0' ";

	if($catid!="0" && $catid!=""){
		$scl.=" and catid='$catid' ";
	}

	if($mid!="0" && $mid!=""){
		$scl.=" and memberid='$mid' ";
	}

	if($rid!="" && $rid!="0"){
		$scl.=" and rid='$rid' ";
	}

	if($key!=""){
		
		$scl.=" and (title regexp '$key' or body regexp '$key') ";
	}	
	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_comment","id",$scl);
	
	$pages->setvar(array("catid" => $catid,"myord" => $myord,"myshownums" => $myshownums,"mid" => $mid,"rid" => $rid,"key" => $key));

	$pages->set($shownums,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

	$fsql->query("select * from {P}_comment where $scl order by $myord desc limit $pagelimit");

	while($fsql->next_record()){
		
			$id=$fsql->f('id');
			$rid=$fsql->f('rid');
			$title=$fsql->f('title');
			$catid=$fsql->f('catid');
			$body=$fsql->f('body');
			$dtime=$fsql->f('dtime');
			$uptime=$fsql->f('uptime');
			$cl=$fsql->f('cl');
			$lastname=$fsql->f('lastname');
			$lastmemberid=$fsql->f('lastmemberid');
			$memberid=$fsql->f('memberid');
			$backcount=$fsql->f('backcount');
			$tuijian=$fsql->f('tuijian');

			//2.16 by quyuxiang start
			$body=str_replace("<br>","...",$body);
			$body=str_replace("\n","...",$body);

			$body=strip_tags($body);
			$body=csubstr($body,0,80);
			//2.16 by quyuxiang end




			//是否匿名

			if($memberid=="-1"){
				$pname=$strGuest;
				$nowface="1";
				$memberurl="#";
			}else{
				$tsql->query("select * from {P}_member where memberid='$memberid'");
				if($tsql->next_record()){
					$pname=$tsql->f("pname");
					$nowface=$tsql->f("nowface");
				}
				$memberurl=ROOTPATH."member/home.php?mid=".$memberid;
			}

			//回复者网址
			if($lastmemberid=="-1"){
				$lastmemberurl="#";
			}else{
				$lastmemberurl=ROOTPATH."member/home.php?mid=".$lastmemberid;
			}


			//是否今日新贴
			
			if($uptime>time()-86400){
				$querycss="binew";
			}else{
				$querycss="bi";
			}

			//推荐标记
			if($tuijian=="1"){
				$tjstr="<img src='".ROOTPATH."comment/templates/images/best.gif'>";
			}else{
				$tjstr="";
			}

			
			$face=ROOTPATH."member/face/".$nowface.".gif";

			$dtime=date("Y-m-d",$dtime);
			$uptime=date("Y-m-d",$uptime);
			
			if($cutword!="0"){$title=csubstr($title,0,$cutword);}

			if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."comment/html/".$id.".html")){
				$link=ROOTPATH."comment/html/".$id.".html";
			}else{
				$link=ROOTPATH."comment/html/?".$id.".html";
			}



			$var=array (
			'title' => $title, 
			'tjstr' => $tjstr, 
			'dtime' => $dtime, 
			'uptime' => $uptime, 
			'pname' => $pname, 
			'memberurl' => $memberurl, 
			'lastmemberurl' => $lastmemberurl, 
			'body' => $body, 
			'backcount' => $backcount, 
			'querycss' => $querycss, 
			'cl' => $cl, 
			'link' => $link,
			'lastname' => $lastname,
			'face' => $face, 
			'target' => $target
			);


			$str.=ShowTplTemp($TempArr["list"],$var);
		

	}



	//显示发布表单

	$tsql->query("select * from {P}_comment_cat where ifbbs='1'");
	while($tsql->next_record()){
		if($tsql->f('catid')==$commentcatid){
			$catlist.="<option value='".$tsql->f('catid')."' selected>".$tsql->f('cat')."</option>";
		}else{
			$catlist.="<option value='".$tsql->f('catid')."'>".$tsql->f('cat')."</option>";
		}
	}




	$pagesinfo=$pages->ShowNow();

	$var=array (
	'rid' => $rid,
	'catlist' => $catlist,
	'showform' => $showform,
	'showpages' => $pages->output(1),
	'pagestotal' => $pagesinfo["total"],
	'pagesnow' => $pagesinfo["now"],
	'pagesshownum' => $pagesinfo["shownum"],
	'pagesfrom' => $pagesinfo["from"],
	'pagesto' => $pagesinfo["to"],
	'totalnums' => $totalnums
	);

	$str.=ShowTplTemp($TempArr["end"],$var);


	return $str;


}
?>
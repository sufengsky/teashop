<?php

/*
	[插件名称] 会员文章检索
	[适用范围] 会员文章分类检索页
*/ 


function MemberNewsQuery(){

	global $fsql,$msql;
	
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	

	//地址栏参数
	if(isset($_GET["mid"]) && $_GET["mid"]!="" && $_GET["mid"]!="0"){
		$mid=$_GET["mid"];
	}else{
		return "";
	}

	$mid=htmlspecialchars($mid);


	$key=htmlspecialchars($_GET["key"]);
	$page=htmlspecialchars($_GET["page"]);
	$myord=htmlspecialchars($_GET["myord"]);
	$myshownums=htmlspecialchars($_GET["myshownums"]);
	$showtag=htmlspecialchars($_GET["showtag"]);
	$pcatid=htmlspecialchars($_GET["pcatid"]);

	if($myord==""){
		$myord="uptime";
	}

	if($myshownums!="" && $myshownums!="0"){
		$shownums=$myshownums;
	}



	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];

	//默认条件
	$scl=" iffb='1' and memberid='$mid' ";

	if($pcatid!="0" && $pcatid!=""){
		$scl.=" and pcatid='$pcatid' ";
	}

	if($key!=""){
		$scl.=" and (title regexp '$key' or body regexp '$key') ";
	}

	if($showtag!=""){
		$scl.=" and tags regexp '$showtag' ";
	}

	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_news_con","id",$scl);
	
	$pages->setvar(array("mid" => $mid,"pcatid" => $pcatid,"myord" => $myord,"myshownums" => $myshownums,"key" => $key));

	$pages->set($shownums,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  
	

	$fsql->query("select * from {P}_news_con where $scl order by $myord desc limit $pagelimit");

	while($fsql->next_record()){
		
		$id=$fsql->f('id');
		$title=$fsql->f('title');
		$catid=$fsql->f('catid');
		$catpath=$fsql->f('catpath');
		$dtime=$fsql->f('dtime');
		$nowcatid=$fsql->f('catid');
		$ifbold=$fsql->f('ifbold');
		$ifred=$fsql->f('ifred');
		$author=$fsql->f('author');
		$source=$fsql->f('source');
		$cl=$fsql->f('cl');
		$memo=$fsql->f('memo');

		$dtime=date("Y-m-d",$dtime);
		$memo=nl2br($memo);
		
		if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."news/html/".$id.".html")){
			$link=ROOTPATH."news/html/".$id.".html";
		}else{
			$link=ROOTPATH."news/html/?".$id.".html";
		}

		if($ifbold=="1"){$bold=" style='font-weight:bold' ";}else{$bold="";}
		if($ifred!="0"){$red=" style='color:".$ifred."' ";}else{$red="";}

		if($cutword!="0"){$title=csubstr($title,0,$cutword);}

		$var=array (
		'title' => $title, 
		'dtime' => $dtime, 
		'red' => $red, 
		'author' => $author, 
		'source' => $source,
		'src' => $src, 
		'cl' => $cl, 
		'link' => $link,
		'target' => $target,
		'memo' => $memo,
		'bold' => $bold,
		);

		$str.=ShowTplTemp($TempArr["list"],$var);
		

	}

	$str.=$TempArr["end"];

	$pagesinfo=$pages->ShowNow();

	$var=array (
	'showpages' => $pages->output(1),
	'pagestotal' => $pagesinfo["total"],
	'pagesnow' => $pagesinfo["now"],
	'pagesshownum' => $pagesinfo["shownum"],
	'pagesfrom' => $pagesinfo["from"],
	'pagesto' => $pagesinfo["to"],
	'totalnums' => $totalnums
	);

	$str=ShowTplTemp($str,$var);

	return $str;


}
?>
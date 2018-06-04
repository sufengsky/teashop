<?php

/*
	[插件名称] 图片投票检索
	[适用范围] 分类检索页
*/ 


function ToolsPhotoPollQuery(){

	global $fsql,$msql;

	
	
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$picw=$GLOBALS["PLUSVARS"]["picw"];
	$pich=$GLOBALS["PLUSVARS"]["pich"];
	$fittype=$GLOBALS["PLUSVARS"]["fittype"];
	$poll_id=$GLOBALS["PLUSVARS"]["catid"];
	$ord=$GLOBALS["PLUSVARS"]["ord"];
	

	$key=$_GET["key"];
	$showtj=$_GET["showtj"];
	$page=$_GET["page"];


	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];


	$scl=" iffb='1' and poll_id!='0' ";

	if($poll_id!="0" && $poll_id!=""){
		$scl.=" and poll_id='$poll_id' ";
	}

	if($showtj!="" && $showtj!="all"){
	$scl.=" and tj='$showtj' ";

	}


	if($key!=""){
		$scl.=" and (title regexp '$key' or body regexp '$key') ";
	}
	

	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_tools_photopolldata","id",$scl);
	
	$pages->setvar(array("catid" => $catid,"ord" => $ord,"shownums" => $shownums,"showtj" => $showtj,"author" => $author,"key" => $key));

	$pages->set($shownums,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  
	

	$fsql->query("select * from {P}_tools_photopolldata where $scl order by $ord desc limit $pagelimit");

	while($fsql->next_record()){
		
		$id=$fsql->f('id');
		$catid=$fsql->f('poll_id');
		$title=$fsql->f('title');
		$dtime=$fsql->f('dtime');
		$author=$fsql->f('author');
		$type=$fsql->f('type');
		$src=$fsql->f('src');
		$body=$fsql->f('body');
		$votesinfo=$fsql->f('votesinfo');
		$votes=$fsql->f('votes');

		$dtime=date("Y-m-d",$dtime);
		
		if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists("../html/".$id.".html")){
			$link="../html/".$id.".html";
		}else{
			$link="../html/?".$id.".html";
		}

		if($cutword!="0"){$title=csubstr($title,0,$cutword);}

		if($src==""){
			$src="photo/pics/nopic.gif";
		}
		$src=ROOTPATH.$src;


		$var=array (
			'id' => $id, 
			'title' => $title, 
			'dtime' => $dtime, 
			'red' => $red, 
			'author' => $author, 
			'src' => $src, 
			'link' => $link,
			'target' => $target,
			'body' => $body,
			'picw' => $picw,
			'pich' => $pich,
			'votes' => $votes,
			'catid' => $catid
		);

		$str.=ShowTplTemp($TempArr["list"],$var);
		

	}

	$str.=$TempArr["end"];

	$pagesinfo=$pages->ShowNow();

	$var=array (
		'fittype' => $fittype,
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
<?php

/*
	[插件名称] 文章图片轮播
	[适用范围] 全站
*/

function NewsPicLb () { 

	global $msql;


		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$ord=$GLOBALS["PLUSVARS"]["ord"];
		$sc=$GLOBALS["PLUSVARS"]["sc"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$catid=$GLOBALS["PLUSVARS"]["catid"];
		$projid=$GLOBALS["PLUSVARS"]["projid"];
		$tags=$GLOBALS["PLUSVARS"]["tags"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$w=$GLOBALS["PLUSVARS"]["w"];
		$h=$GLOBALS["PLUSVARS"]["h"];

		
		//默认条件		
		$scl=" iffb='1' and catid!='0' and src!='' ";

		if($showtj!="" && $showtj!="0"){
			$scl.=" and tj='1' ";
		}


		//显示分类规则:如果后台不指定分类,则显示当前所在分类,否则不限分类

		if($catid!=0 && $catid!=""){
			$catid=fmpath($catid);
			$scl.=" and catpath regexp '$catid' ";
		}

		//匹配专题
		if($projid!=0 && $projid!=""){
			$projid=fmpath($projid);
			$scl.=" and proj regexp '$projid' ";
		}


		//判断匹配标签
		if($tags!=""){
			$tags=$tags.",";
			$scl.=" and tags regexp '$tags' ";
		}

	
	
	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);


	$str=$TempArr["start"];


	$h1=$h-22;

	$p=1;
	$msql->query("select * from {P}_news_con where $scl order by $ord $sc limit 0,$shownums");
	while($msql->next_record()){
		$id=$msql->f('id');
		$src=$msql->f('src');
		$title=$msql->f('title');

		if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."news/html/".$id.".html")){
			$url=ROOTPATH."news/html/".$id.".html";
		}else{
			$url=ROOTPATH."news/html/?".$id.".html";
		}

		if($cutword!="0"){$title=csubstr($title,0,$cutword);}

		$src=ROOTPATH.$src;

		if($p==1){
			$pic=$src;
			$purl=$url;
			$ptitle=$title;
		}else{
			$pic.="|".$src;
			$purl.="|".$url;
			$ptitle.="|".$title;
		}
		$p++;
	}




	$var=array (
	'ptitle' => $ptitle, 
	'pic' => $pic, 
	'purl' => $purl, 
	'w' => $w, 
	'h' => $h,
	'h1' => $h1
	);
	
	$str.=ShowTplTemp($TempArr["end"],$var);

	return $str;

	
}



?>
<?php

/*
	[插件名称] 赠品检索
	[适用范围] 分类检索页
*/ 


function HzQuery(){

	global $fsql,$msql,$strCentSearchInfo1;

	
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$picw=$GLOBALS["PLUSVARS"]["picw"];
	$pich=$GLOBALS["PLUSVARS"]["pich"];
	$fittype=$GLOBALS["PLUSVARS"]["fittype"];
	$cutbody=$GLOBALS["PLUSVARS"]["cutbody"];
	
	
	$cent_min=$_GET["cent_min"];
	$cent_max=$_GET["cent_max"];
	$catid=$_GET["catid"];
	$page=$_GET["page"];
	$myord=$_GET["myord"];
	$myshownums=$_GET["myshownums"];

	if($myord==""){
		$myord="dtime";
	}

	if($myshownums!="" && $myshownums!="0"){
		$shownums=$myshownums;
	}


	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];


	$scl=" iffb='1' and catid!='0' ";

	if($catid!="0" && $catid!=""){
		$fmdpath=fmpath($catid);
		$scl.=" and catpath regexp '$fmdpath' ";
	}

	//处理积分范围
	if($cent_max>$cent_min){
		$low_cent=$cent_min;
		$high_cent=$cent_max;
	}else{
		$low_cent=$cent_max;
		$high_cent=$cent_min;
	}
	
	if($low_cent!="" && $low_cent!=$strCentSearchInfo1){
		$scl.=" and cent >= '$low_cent' ";
	}
	if($high_cent!="" && $high_cent!=$strCentSearchInfo1){
		$scl.=" and cent <= '$high_cent' ";
	}
	//处理积分范围结束

	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_hz_con","id",$scl);
	
	$pages->setvar(array("catid" => $catid,"myord" => $myord,"myshownums" => $myshownums,"key" => $key,"cent_min" => $cent_min,"cent_max" => $cent_max));

	$pages->set($shownums,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  
	

	$fsql->query("select * from {P}_hz_con where $scl order by $myord desc limit $pagelimit");
	while($fsql->next_record()){
		
		$id=$fsql->f('id');
		$title=$fsql->f('title');
		$catid=$fsql->f('catid');
		$catpath=$fsql->f('catpath');
		$cent=$fsql->f('cent');
		$kucun=$fsql->f('kucun');
		$dtime=$fsql->f('dtime');
		$nowcatid=$fsql->f('catid');
		$ifbold=$fsql->f('ifbold');
		$ifred=$fsql->f('ifred');
		$author=$fsql->f('author');
		$source=$fsql->f('source');
		$type=$fsql->f('type');
		$src=$fsql->f('src');
		$cl=$fsql->f('cl');
		$prop1=$fsql->f('prop1');
		$prop2=$fsql->f('prop2');
		$prop3=$fsql->f('prop3');
		$prop4=$fsql->f('prop4');
		$prop5=$fsql->f('prop5');
		$prop6=$fsql->f('prop6');
		$prop7=$fsql->f('prop7');
		$prop8=$fsql->f('prop8');
		$prop9=$fsql->f('prop9');
		$prop10=$fsql->f('prop10');
		$prop11=$fsql->f('prop11');
		$prop12=$fsql->f('prop12');
		$prop13=$fsql->f('prop13');
		$prop14=$fsql->f('prop14');
		$prop15=$fsql->f('prop15');
		$prop16=$fsql->f('prop16');
		$prop17=$fsql->f('prop17');
		$prop18=$fsql->f('prop18');
		$prop19=$fsql->f('prop19');
		$prop20=$fsql->f('prop20');
		$memo=$fsql->f('memo');

		$dtime=date("Y-m-d",$dtime);
		
		if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."huanzeng/html/".$id.".html")){
			$link=ROOTPATH."huanzeng/html/".$id.".html";
		}else{
			$link=ROOTPATH."huanzeng/html/?".$id.".html";
		}

		if($ifbold=="1"){$bold=" style='font-weight:bold' ";}else{$bold="";}
		if($ifred!="0"){$red=" style='color:".$ifred."' ";}else{$red="";}

		if($cutword!="0"){$title=csubstr($title,0,$cutword);}
		if($cutbody!="0"){$memo=csubstr($memo,0,$cutbody);}

		if($src==""){
			$src="huanzeng/pics/nopic.gif";
		}
		$src=ROOTPATH.$src;


		$var=array (
			'id' => $id, 
			'title' => $title,
			'cent' => $cent,
			'kucun' => $kucun,
			'propstr' => $propstr, 
			'dtime' => $dtime, 
			'red' => $red, 
			'author' => $author, 
			'source' => $source,
			'src' => $src, 
			'cl' => $cl, 
			'link' => $link,
			'target' => $target,
			'memo' => $memo,
			'picw' => $picw,
			'pich' => $pich,
			'bold' => $bold
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
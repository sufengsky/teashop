<?php

/*
	[插件名称] 全站搜索
	[适用范围] 搜索页
*/


function Search(){

	global $fsql,$strSearchNtc1;
	
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	$key=htmlspecialchars($_GET["key"]);
	$page=htmlspecialchars($_GET["page"]);
	$myord=htmlspecialchars($_GET["myord"]);
	$myshownums=htmlspecialchars($_GET["myshownums"]);

	if($myord==""){
		$myord="uptime";
	}

	if($myshownums!="" && $myshownums!="0"){
		$shownums=$myshownums;
	}else{
		$shownums=20;
	}

	
	//判断模块是否安装
	$fsql->query("select coltype from {P}_base_coltype");
	while($fsql->next_record()){
		$colarr[]=$fsql->f('coltype');
	}

	



	if($key!=""){
		
		if(in_array("news",$colarr)==true){
			$fsql->query("select count(id) from {P}_news_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key')");
			if($fsql->next_record()){
				$totalnums=$fsql->f('count(id)');
			}
		}else{
			echo "文章模块未安装,全站搜索不可用";
			exit;
		}
		
		if(in_array("comment",$colarr)==true){
			$fsql->query("select count(id) from {P}_comment where iffb='1' and pid='0' and (title regexp '$key' or body regexp '$key') ");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}
		
		if(in_array("photo",$colarr)==true){
			$fsql->query("select count(id) from {P}_photo_con where iffb='1' and catid!='0' and (title regexp '$key' or memo regexp '$key') ");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}

		if(in_array("down",$colarr)==true){
			$fsql->query("select count(id) from {P}_down_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key')");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}

		if(in_array("product",$colarr)==true){
			$fsql->query("select count(id) from {P}_product_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key')");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}

		if(in_array("shop",$colarr)==true){
			$fsql->query("select count(id) from {P}_shop_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key')");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}

		if(in_array("job",$colarr)==true){
			$fsql->query("select count(id) from {P}_job where iffb='1' and jobstat='1' and (jobname regexp '$key' or jobintro regexp '$key') ");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}

		if(in_array("bizinfo",$colarr)==true){
			$fsql->query("select count(id) from {P}_bizinfo_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}

		if(in_array("zlinfo",$colarr)==true){
			$fsql->query("select count(id) from {P}_zlinfo_con where iffb='1' and catid!='0' and (fairname regexp '$key' or zldescrib regexp '$key') ");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}

		
		if(in_array("tech",$colarr)==true){
			$fsql->query("select count(id) from {P}_tech_offer where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}

			$fsql->query("select count(id) from {P}_tech_demand where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ");
			if($fsql->next_record()){
				$totalnums+=$fsql->f('count(id)');
			}
		}


		

		if(in_array("news",$colarr)==true){
			$scl=" (select id,title,body,dtime,uptime,author,cl,contype  from {P}_news_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ) ";
		}else{
			echo "文章模块未安装,全站搜索不可用";
			exit;
		}
		
		if(in_array("comment",$colarr)==true){
			$scl.=" union (select id,title,body,dtime,uptime,pname as author,cl,contype  from {P}_comment where iffb='1' and pid='0' and (title regexp '$key' or body regexp '$key') ) ";
		}


		if(in_array("photo",$colarr)==true){
			$scl.=" union (select id,title,memo,dtime,uptime,author,cl,contype from {P}_photo_con where iffb='1' and catid!='0' and (title regexp '$key' or memo regexp '$key') ) ";
		}

		if(in_array("down",$colarr)==true){
			$scl.=" union (select id,title,body,dtime,uptime,author,cl,contype from {P}_down_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ) ";
		}

		if(in_array("product",$colarr)==true){
			$scl.=" union (select id,title,body,dtime,uptime,author,cl,contype from {P}_product_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ) ";
		}

		if(in_array("shop",$colarr)==true){
			$scl.=" union (select id,title,body,dtime,uptime,author,cl,contype from {P}_shop_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ) ";
		}

		if(in_array("job",$colarr)==true){
			$scl.=" union (select id,jobname as title,jobintro as body,dtime,uptime,contact as author,cl,contype from {P}_job where iffb='1' and jobstat='1' and (jobname regexp '$key' or jobintro regexp '$key') ) ";
		}

		if(in_array("bizinfo",$colarr)==true){
			$scl.=" union (select id,title,body,dtime,uptime,company as author,cl,contype from {P}_bizinfo_con where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ) ";
		}

		if(in_array("zlinfo",$colarr)==true){
			$scl.=" union (select id,fairname as title,zldescrib as body,dtime,uptime,fabucompany as author,cl,contype from {P}_zlinfo_con where iffb='1' and catid!='0' and (fairname regexp '$key' or zldescrib regexp '$key') ) ";
		}

		if(in_array("tech",$colarr)==true){
			$scl.=" union (select id,title,body,dtime,uptime,company as author,cl,contype from {P}_tech_offer where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ) ";
			$scl.=" union (select id,title,body,dtime,uptime,company as author,cl,contype from {P}_tech_demand where iffb='1' and catid!='0' and (title regexp '$key' or body regexp '$key') ) ";
		}


	}else{
		return err($strSearchNtc1,"","");
	}



	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];
	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;
	

	$pages->setvar(array("catid" => $mycatid,"myord" => $myord,"myshownums" => $myshownums,"key" => $key));
	
	$pages->set($shownums,$totalnums);		                          
	
	$pagelimit=$pages->limit();	  


	$fsql->query($scl . " order by $myord desc limit $pagelimit ");

	while($fsql->next_record()){
		
		$id=$fsql->f('id');
		$title=$fsql->f('title');
		$body=$fsql->f('body');
		$memo=$fsql->f('memo');
		$dtime=$fsql->f('dtime');
		$uptime=$fsql->f('uptime');
		$author=$fsql->f('author');
		$cl=$fsql->f('cl');
		$contype=$fsql->f('contype');
		
		$dtime=date("Y-m-d",$dtime);
		$uptime=date("Y-m-d",$uptime);
		

		//不同contype的兼容处理
		switch($contype){
			case "techoffer":
				$link=ROOTPATH."tech/html/?".$id.".html";
			break;

			case "techdemand":
				$link=ROOTPATH."tech/demandhtml/?".$id.".html";
			break;

			default :
				$link=ROOTPATH.$contype."/html/?".$id.".html";
			break;
		}

		


		$body=csubstr(ltrim(strip_tags($memo.$body)),0,100);
		$title=csubstr($title,0,$cutword);

		$title=str_replace($key,"<span class='keyword'>".$key."</span>",$title);
		$body=str_replace($key,"<span  class='bodykeyword'>".$key."</span>",$body);

		$var=array (
		'title' => $title, 
		'link' => $link, 
		'target' => $target, 
		'cl' => $cl, 
		'author' => $author, 
		'dtime' => $dtime, 
		'uptime' => $uptime, 
		'body' => $body 
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
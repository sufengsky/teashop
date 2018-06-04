<?php

/*
	[插件名称] 商品检索
	[适用范围] 分类检索页
*/ 


function ShopQuery(){

	global $fsql,$msql;

	
	
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$cutword=$GLOBALS["PLUSVARS"]["cutword"];
	$target=$GLOBALS["PLUSVARS"]["target"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$picw=$GLOBALS["PLUSVARS"]["picw"];
	$pich=$GLOBALS["PLUSVARS"]["pich"];
	$fittype=$GLOBALS["PLUSVARS"]["fittype"];
	$cutbody=$GLOBALS["PLUSVARS"]["cutbody"];
	

	//地址栏参数
	if(strstr($_SERVER["QUERY_STRING"],".html")){
		$Arr=explode(".html",$_SERVER["QUERY_STRING"]);
		$catid=$Arr[0];
	}elseif($_GET["catid"]>0){
		$catid=$_GET["catid"];
	}else{
		$catid=0;
	}

	$key=$_GET["key"];
	$showtj=$_GET["showtj"];
	$page=$_GET["page"];
	$myord=$_GET["myord"];
	$myshownums=$_GET["myshownums"];
	$memberid=$_GET["memberid"];
	$showtag=$_GET["showtag"];
	$showbrandid=$_GET["showbrandid"];
	$pricefrom=$_GET["pricefrom"];
	$priceto=$_GET["priceto"];
	$showmethod=$_GET["showmethod"];

	switch($myord){
		case "priceasc":
			$showord=" price asc ";
		break;
		case "pricedesc":
			$showord=" price desc ";
		break;
		case "uptime":
			$showord=" uptime desc ";
		break;
		case "dtime":
			$showord=" dtime desc ";
		break;
		case "cl":
			$showord=" cl desc ";
		break;
		case "salenums":
			$showord=" salenums desc ";
		break;
		default:
			$myord="uptime";
			$showord=" uptime desc ";
		break;
	}


	switch($showmethod){
		case "lb":
			$querylist="menu";
		break;
		case "tu":
			$querylist="con";
		break;
		default:
			$querylist="list";
			$showmethod="cc";
		break;
	}

	

	if($myshownums!="" && $myshownums!="0"){
		$shownums=$myshownums;
	}else{
		$myshownums="9";
	}



	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$var=array (
	'showmethod' => $showmethod,
	'myshownums' => $myshownums,
	'catid' => $catid,
	'showbrandid' => $showbrandid,
	'pricefrom' => $pricefrom,
	'priceto' => $priceto,
	'key' => $key,
	'myord' => $myord
	);

	$str=ShowTplTemp($TempArr["start"],$var);


	$scl=" iffb='1' and catid!='0' ";

	if($catid!="0" && $catid!=""){
		$fmdpath=fmpath($catid);
		$scl.=" and catpath regexp '$fmdpath' ";
	}

	if($showtj!="" && $showtj!="all"){
	$scl.=" and tj='$showtj' ";

	}
	if($memberid!="" && $memberid!="all"){
	$scl.=" and memberid='$memberid' ";
	}

	if($showbrandid!="" && $showbrandid!="0"){
	$scl.=" and brandid='$showbrandid' ";
	}

	if($pricefrom!="" && $priceto!=""){
	$scl.=" and price>='$pricefrom' and price<='$priceto' ";
	}


	if($key!=""){
		
		$scl.=" and (title regexp '$key' or memo regexp '$key') ";
	}
	
	if($showtag!=""){
		$scl.=" and tags regexp '$showtag' ";
	}

	
	include(ROOTPATH."includes/pages.inc.php");
	$pages=new pages;

	$totalnums=TblCount("_shop_con","id",$scl);
	
	$pages->setvar(array("catid" => $catid,"myord" => $myord,"myshownums" => $myshownums,"showmethod" => $showmethod,"pricefrom" => $pricefrom,"priceto" => $priceto,"showtj" => $showtj,"showbrandid" => $showbrandid,"key" => $key));

	$pages->set($shownums,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  
	

	$fsql->query("select * from {P}_shop_con where $scl order by $showord limit $pagelimit");

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
		$bn=$fsql->f('bn');
		$weight=$fsql->f('weight');
		$kucun=$fsql->f('kucun');
		$cent=$fsql->f('cent');
		$price=$fsql->f('price');
		$price0=$fsql->f('price0');
		$brandid=$fsql->f('brandid');
		$danwei=$fsql->f('danwei');
		$salenums=$fsql->f('salenums');

		

		$msql->query("select brand from {P}_shop_brand where id='$brandid' limit 0,1");
		if($msql->next_record()){
			$brand=$msql->f('brand');
		}
		
		if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."shop/html/".$id.".html")){
			$link=ROOTPATH."shop/html/".$id.".html";
		}else{
			$link=ROOTPATH."shop/html/?".$id.".html";
		}


		$dtime=date("Y-m-d",$dtime);

		if($ifbold=="1"){$bold=" style='font-weight:bold' ";}else{$bold="";}
		if($ifred!="0"){$red=" style='color:".$ifred."' ";}else{$red="";}

		if($cutword!="0"){$title=csubstr($title,0,$cutword);}
		if($cutbody!="0"){$memo=csubstr($memo,0,$cutbody);}

		if($src==""){$src="shop/pics/nopic.gif";}
		$src=ROOTPATH.$src;



		//参数列
		$propstr="";

		$i=1;
		$msql->query("select * from {P}_shop_prop where catid='$catid' order by xuhao");
		while($msql->next_record()){
			$propname=$msql->f('propname');
			$pn="prop".$i;
			$pa="propname".$i;
			$$pa=$propname;
			$pstr=str_replace("{#propname#}",$propname,$TempArr["m1"]);
			$pstr=str_replace("{#prop#}",$$pn,$pstr);
			$propstr.=$pstr;

		$i++;
		}


		//计算价格
		include_once(ROOTPATH."shop/includes/shop.inc.php");
		$price=getMemberPrice($id,$price);

		
		$pricex=number_format($price0-$price,2);
		$price=number_format($price,2);
		$price0=number_format($price0,2);

		//评论数
		$msql->query("select count(id) from {P}_comment where catid='11' and rid='$id'");
		if($msql->next_record()){
			$commentcount=$msql->f('count(id)');
		}

		//评分总和
		$msql->query("select sum(pj1) from {P}_comment where catid='11' and rid='$id'");
		if($msql->next_record()){
			$totalpj=$msql->f('sum(pj1)');
		}

		//计算平均分
		if($commentcount>0){
			$centavg=ceil($totalpj/$commentcount);
		}else{
			$centavg=0;
		}

		$stars=shopstarnums($centavg,ROOTPATH);


		$var=array (
			'gid' => $id, 
			'title' => $title, 
			'memo' => $memo,
			'dtime' => $dtime, 
			'stars' => $stars, 
			'centavg' => $centavg, 
			'commentcount' => $commentcount, 
			'red' => $red, 
			'bold' => $bold,
			'link' => $link,
			'target' => $target,
			'author' => $author, 
			'source' => $source,
			'cat' => $cat, 
			'src' => $src, 
			'picw' => $picw,
			'pich' => $pich,
			'cl' => $cl, 
			'bn' => $bn, 
			'weight' => $weight, 
			'kucun' => $kucun, 
			'cent' => $cent, 
			'price' => $price, 
			'pricex' => $pricex, 
			'price0' => $price0, 
			'brand' => $brand, 
			'danwei' => $danwei, 
			'salenums' => $salenums, 
			'buyurl' => $buyurl, 
			'propstr' => $propstr, 
			'prop1' => $prop1,
			'prop2' => $prop2,
			'prop3' => $prop3,
			'prop4' => $prop4,
			'prop5' => $prop5,
			'prop6' => $prop6,
			'prop7' => $prop7,
			'prop8' => $prop8,
			'prop9' => $prop9,
			'prop10' => $prop10,
			'prop11' => $prop11,
			'prop12' => $prop12,
			'prop13' => $prop13,
			'prop14' => $prop14,
			'prop15' => $prop15,
			'prop16' => $prop16,
			'prop17' => $prop17,
			'prop18' => $prop18,
			'prop19' => $prop19,
			'prop20' => $prop20,
			'propname1' => $propname1,
			'propname2' => $propname2,
			'propname3' => $propname3,
			'propname4' => $propname4,
			'propname5' => $propname5,
			'propname6' => $propname6,
			'propname7' => $propname7,
			'propname8' => $propname8,
			'propname9' => $propname9,
			'propname10' => $propname10,
			'propname11' => $propname11,
			'propname12' => $propname12,
			'propname13' => $propname13,
			'propname14' => $propname14,
			'propname15' => $propname15,
			'propname16' => $propname16,
			'propname17' => $propname17,
			'propname18' => $propname18,
			'propname19' => $propname19,
			'propname20' => $propname20
		);

		$str.=ShowTplTemp($TempArr[$querylist],$var);
		

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
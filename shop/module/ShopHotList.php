<?php

/*
	[插件名称] 热门商品排行榜
	[适用范围] 全站
*/

function ShopHotList(){

	global $fsql,$msql;

		
		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$catid=$GLOBALS["PLUSVARS"]["catid"];
		$tags=$GLOBALS["PLUSVARS"]["tags"];
		$pagename=$GLOBALS["PLUSVARS"]["pagename"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];


		//默认条件		
		$scl=" iffb='1' and catid!='0' ";

		if($showtj!="" && $showtj!="0"){
			$scl.=" and tj='1' ";
		}

		if($catid!=0 && $catid!=""){
			$catid=fmpath($catid);
			$scl.=" and catpath regexp '$catid' ";
		}



		//判断匹配标签
		if($tags!=""){
			$tags=$tags.",";
			$scl.=" and tags regexp '$tags' ";
		}


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$var=array(
			'coltitle' => $coltitle,
			'morelink' => $morelink
		);
		$str=ShowTplTemp($TempArr["start"],$var);
		

		$picnum=1;
		$fsql->query("select * from {P}_shop_con where $scl order by cl desc limit 0,$shownums");

		while($fsql->next_record()){
			
			$id=$fsql->f('id');
			$title=$fsql->f('title');
			$catpath=$fsql->f('catpath');
			$dtime=$fsql->f('dtime');
			$nowcatid=$fsql->f('catid');
			$ifnew=$fsql->f('ifnew');
			$ifred=$fsql->f('ifred');
			$ifbold=$fsql->f('ifbold');
			$author=$fsql->f('author');
			$source=$fsql->f('source');
			$cl=$fsql->f('cl');
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
			

			
			//计算价格
			include_once(ROOTPATH."shop/includes/shop.inc.php");
			$price=getMemberPrice($id,$price);
			
			$pricex=number_format($price0-$price,2);
			$price=number_format($price,2);
			$price0=number_format($price0,2);



			//模版标签解释
			$var=array (
			'gid' => $id, 
			'title' => $title, 
			'memo' => $memo,
			'picnum' => $picnum, 
			'dtime' => $dtime, 
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
			'buyurl' => $buyurl
				
			);
			$str.=ShowTplTemp($TempArr["list"],$var);

		$picnum++;

		}

		
		$str.=$TempArr["end"];


		return $str;

}

?>
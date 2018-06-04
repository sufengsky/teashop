<?php

/*
	[插件名称] 同标签相关商品插件
	[适用范围] 详情页
*/

function ShopSameTagList(){

	global $fsql,$msql;
	


		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$picw=$GLOBALS["PLUSVARS"]["picw"];
		$pich=$GLOBALS["PLUSVARS"]["pich"];
		$fittype=$GLOBALS["PLUSVARS"]["fittype"];



		//获取地址栏参数
		if(strstr($_SERVER["QUERY_STRING"],".html")){
			$idArr=explode(".html",$_SERVER["QUERY_STRING"]);
			$id=$idArr[0];
		}elseif(isset($_GET["id"]) && $_GET["id"]!=""){
			$id=$_GET["id"];
		}	


		//查找条件

		$scl=" id!='$id' and iffb='1' and catid!='0' ";
		
		$fsql->query("select tags from {P}_shop_con where id='$id'");
		if($fsql->next_record()){
			$tags=$fsql->f('tags');
		}
		$arr=explode(",",$tags);
		
		if(sizeof($arr)>1){
			$scl.=" and ( id=0 ";
			for($i=0;$i<sizeof($arr)-1;$i++){
				$scl.=" or tags regexp '$arr[$i]' ";
			}
			$scl.=" ) ";
		}

		
		if($showtj!="" && $showtj!="0"){
			$scl.=" and tj='1' ";
		}



		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];

		$picnum=1;
		$fsql->query("select * from {P}_shop_con where $scl order by uptime desc limit 0,$shownums");

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


			if($src==""){$src="shop/pics/nopic.gif";}
			
			$src=ROOTPATH.$src;


			//参数列
			$propstr="";

			$i=1;
			$msql->query("select * from {P}_shop_prop where catid='$nowcatid' order by xuhao");
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


			//模版标签解释

			$var=array (
			'gid' => $id, 
			'title' => $title, 
			'memo' => $memo,
			'dtime' => $dtime, 
			'red' => $red, 
			'bold' => $bold,
			'link' => $link,
			'target' => $target,
			'author' => $author, 
			'source' => $source,
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
			$str.=ShowTplTemp($TempArr["list"],$var);


		$picnum++;

		}

		$var=array(
			'fittype' => $fittype
		);
		$str.=ShowTplTemp($TempArr["end"],$var);

		return $str;

}

?>
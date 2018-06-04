<?php

/*
	[插件名称] 分类品牌查询
*/

function ShopBrandAll(){

	global $msql,$fsql,$tsql;
		
		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$pagename=$GLOBALS["PLUSVARS"]["pagename"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$picw=$GLOBALS["PLUSVARS"]["picw"];
		$pich=$GLOBALS["PLUSVARS"]["pich"];
		$fittype=$GLOBALS["PLUSVARS"]["fittype"];


		//只显示推荐品牌
		if($showtj=="1"){
			$addscl.=" and tj='1' ";
		}


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$var=array('coltitle' => $coltitle);
		$str=ShowTplTemp($TempArr["start"],$var);

		$msql->query("select * from {P}_shop_cat where pid='0' order by xuhao");
		while($msql->next_record()){
			$catid=$msql->f('catid');
			$cat=$msql->f('cat');
			
			//显示大分类名称
			$var=array(
			'catid' => $catid,
			'cat' => $cat
			);
			$str.=ShowTplTemp($TempArr["m1"],$var);
			
			$fsql->query("select brandid from {P}_shop_brandcat where catid='$catid'");
			while($fsql->next_record()){
				$brandid=$fsql->f('brandid');
				$tsql->query("select * from {P}_shop_brand where id='$brandid' $addscl ");
				if($tsql->next_record()){
					$brand=$tsql->f('brand');
					$src=$tsql->f('logo');
					$url=$tsql->f('url');
					$intro=$tsql->f('intro');
					$xuhao=$tsql->f('xuhao');
					$tj =$tsql->f('tj');
					
					$link=ROOTPATH."shop/class/?showbrandid=".$brandid;

					if($src==""){$src="shop/pics/nologo.gif";}
			
					$src=ROOTPATH.$src;

					//模版标签解释
					$var=array (
					'link' => $link,
					'target' => $target,
					'src' => $src, 
					'picw' => $picw,
					'pich' => $pich,
					'brand' => $brand 
					);
					$str.=ShowTplTemp($TempArr["list"],$var);

				}
			}

			$str.=$TempArr["m2"];

		}
		
		$var=array(
			'fittype' => $fittype
		);
		$str.=ShowTplTemp($TempArr["end"],$var);


		return $str;

}

?>
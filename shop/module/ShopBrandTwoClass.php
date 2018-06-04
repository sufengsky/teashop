<?php

/*
	[插件名称] 品牌商品二级分类
	[适用范围] 所有页面
*/



function ShopBrandTwoClass(){

		global $msql,$fsql,$tsql;

		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		
		//地址栏品牌id
		if(isset($_GET["brandid"]) && $_GET["brandid"]!=""){
			$brandid=$_GET["brandid"];
		}else{
			return "ERROR: NO BRANDID";
		}

		//获取品牌关联catid
		$msql->query("select * from {P}_shop_brandcat where brandid='$brandid'");
		while($msql->next_record()){
			$catArr[]=$msql->f('catid');
		}

		$scl=" pid='0' ";

		
		if($showtj!="" && $showtj!="0"){
			$scl.=" and tj='1' ";
			$subscl=" and tj='1' ";
		}



		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);


		$str=$TempArr["start"];

			
		$msql->query("select * from {P}_shop_cat where $scl order by xuhao");
		while($msql->next_record()){
				$catid=$msql->f("catid");
				$cat=$msql->f("cat");
				$catpath=$msql->f("catpath");

				//只显示和品牌关联的分类
				if(is_array($catArr) && in_array($catid,$catArr)){
				
						$toplink=ROOTPATH."shop/class/?showbrandid=".$brandid."&catid=".$catid;

						$tsql->query("select count(id) from {P}_shop_con where iffb='1' and brandid='$brandid' and  catpath regexp '".fmpath($catpath)."'");
						if($tsql->next_record()){
							$topcount=$tsql->f('count(id)');
						}

						$sublinkstr="";
						$fsql->query("select * from {P}_shop_cat where pid='$catid' $subscl order by xuhao");
						while($fsql->next_record()){
							$scatid=$fsql->f("catid");
							$scat=$fsql->f("cat");
							$scatpath=$fsql->f("catpath");

							//只显示和品牌关联的分类
							if(is_array($catArr) && in_array($scatid,$catArr)){
								$slink=ROOTPATH."shop/class/?showbrandid=".$brandid."&catid=".$scatid;
								$tsql->query("select count(id) from {P}_shop_con where iffb='1' and brandid='$brandid' and  catpath regexp '".fmpath($scatpath)."'");
								if($tsql->next_record()){
									$subcount=$tsql->f('count(id)');
								}
								$substr=str_replace("{#slink#}",$slink,$TempArr["list"]);
								$substr=str_replace("{#target#}",$target,$substr);
								$substr=str_replace("{#scat#}",$scat,$substr);
								$substr=str_replace("{#subcount#}",$subcount,$substr);
								$sublinkstr.=$substr;
							}
						}



						$var=array (
						'toplink' => $toplink, 
						'cat' => $cat, 
						'topcount' => $topcount, 
						'sublinkstr' => $sublinkstr, 
						'target' => $target
						);
						$str.=ShowTplTemp($TempArr["menu"],$var);
	
				}
		}
		
		
        $str.=$TempArr["end"];
       
		return $str;

		
}


?>
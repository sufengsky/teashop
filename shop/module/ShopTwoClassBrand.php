<?php

/*
	[插件名称] 分类品牌组合切换
	[适用范围] 所有页面
*/



function ShopTwoClassBrand(){

		global $msql,$fsql,$tsql;

		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$picw=$GLOBALS["PLUSVARS"]["picw"];
		$pich=$GLOBALS["PLUSVARS"]["pich"];


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);
		$str=$TempArr["start"];


		//获取分类
		$scl=" pid='0' ";
		
		if($showtj!="" && $showtj!="0"){
			$scl.=" and tj='1' ";
			$subscl=" and tj='1' ";
		}


			
		$msql->query("select * from {P}_shop_cat where $scl order by xuhao");
		while($msql->next_record()){
				$catid=$msql->f("catid");
				$cat=$msql->f("cat");
				$catpath=$msql->f("catpath");
				$ifchannel=$msql->f('ifchannel');
				if($ifchannel=="1"){
					$toplink=ROOTPATH."shop/class/".$catid."/";
				}else{
					if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."shop/class/".$catid.".html")){
						$toplink=ROOTPATH."shop/class/".$catid.".html";
					}else{
						$toplink=ROOTPATH."shop/class/?".$catid.".html";
					}
				}

				$tsql->query("select count(id) from {P}_shop_con where iffb='1' and catid!='0' and  catpath regexp '".fmpath($catpath)."'");
				if($tsql->next_record()){
					$topcount=$tsql->f('count(id)');
				}

				$sublinkstr="";
				$fsql->query("select * from {P}_shop_cat where pid='$catid' $subscl order by xuhao");
				while($fsql->next_record()){
					$scatid=$fsql->f("catid");
					$scat=$fsql->f("cat");
					$scatpath=$fsql->f("catpath");
					$sifchannel=$fsql->f('ifchannel');
					if($sifchannel=="1"){
						$slink=ROOTPATH."shop/class/".$scatid."/";
					}else{
						if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."shop/class/".$scatid.".html")){
							$slink=ROOTPATH."shop/class/".$scatid.".html";
						}else{
							$slink=ROOTPATH."shop/class/?".$scatid.".html";
						}
					}
					
					$tsql->query("select count(id) from {P}_shop_con where iffb='1' and catid!='0' and  catpath regexp '".fmpath($scatpath)."'");
					if($tsql->next_record()){
						$subcount=$tsql->f('count(id)');
					}

					$substr=str_replace("{#slink#}",$slink,$TempArr["list"]);
					$substr=str_replace("{#target#}",$target,$substr);
					$substr=str_replace("{#scat#}",$scat,$substr);
					$substr=str_replace("{#subcount#}",$subcount,$substr);
					$sublinkstr.=$substr;
				}



				$var=array (
				'toplink' => $toplink, 
				'catid' => $catid,
				'cat' => $cat, 
				'topcount' => $topcount, 
				'sublinkstr' => $sublinkstr, 
				'target' => $target
				);
				$str.=ShowTplTemp($TempArr["menu"],$var);
	
		
		}
		
		
        $str.=$TempArr["end"];



		//品牌列表
		$str.=$TempArr["m0"];
		
		if($showtj!="" && $showtj!="0"){
			$addscl=" where tj='1' ";
		}else{
			$addscl="";
		}

		$tsql->query("select * from {P}_shop_brand $addscl order by xuhao ");
		while($tsql->next_record()){
			$brandid=$tsql->f('id');
			$brand=$tsql->f('brand');
			$src=$tsql->f('logo');
			$url=$tsql->f('url');
			$xuhao=$tsql->f('xuhao');
			$tj =$tsql->f('tj');
			$intro=strip_tags($intro);
			
			$brandlink=ROOTPATH."shop/class/?showbrandid=".$brandid;

			if($src==""){$src="shop/pics/nologo.gif";}
	
			$src=ROOTPATH.$src;

			//模版标签解释
			$var=array (
			'brandlink' => $brandlink,
			'target' => $target,
			'url' => $url, 
			'src' => $src, 
			'picw' => $picw,
			'pich' => $pich,
			'brand' => $brand 
			);
			$str.=ShowTplTemp($TempArr["m1"],$var);

		}
			
		$str.=$TempArr["m2"];
       
		return $str;

		
}


?>
<?php

/*
	[插件名称] 文章一级分类
	[适用范围] 所有页面
*/



function NewsClass(){

		global $msql,$fsql;



		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$catid=$GLOBALS["PLUSVARS"]["catid"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		
		if($catid!=0 && $catid!=""){
			$scl=" pid='$catid' ";
		}else{
			$scl=" pid='0' ";
		}

		
		if($showtj!="" && $showtj!="0"){
			$scl.=" and tj='1' ";
		}

	




		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		
		//循环开始
		$var=array(
			'coltitle' => $coltitle
		);

		$str=ShowTplTemp($TempArr["start"],$var);

			
		$msql->query("select * from {P}_news_cat where $scl order by xuhao");
		
		while($msql->next_record()){
				$pid=$msql->f("pid");
				$catid=$msql->f("catid");
				$cat=$msql->f("cat");
				$catpath=$msql->f("catpath");
				$ifchannel=$msql->f('ifchannel');
				if($ifchannel=="1"){
					$link=ROOTPATH."news/class/".$catid."/";
				}else{
					if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."news/class/".$catid.".html")){
						$link=ROOTPATH."news/class/".$catid.".html";
					}else{
						$link=ROOTPATH."news/class/?".$catid.".html";
					}
				}

				$var=array (
				'link' => $link, 
				'cat' => $cat, 
				'target' => $target
				);
				$str.=ShowTplTemp($TempArr["list"],$var);
	
		
		}
		
		
        $str.=$TempArr["end"];
       
		return $str;

		
}


?>
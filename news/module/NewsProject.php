<?php

/*
	[插件名称] 文章专题名称列表
	[适用范围] 所有页面
*/



function NewsProject(){

		global $msql,$fsql;



		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];



		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		
		//循环开始
		$var=array(
			'coltitle' => $coltitle
		);

		$str=ShowTplTemp($TempArr["start"],$var);

			
		$msql->query("select * from {P}_news_proj order by id desc");
		
		while($msql->next_record()){
				$id=$msql->f("id");
				$project=$msql->f("project");
				$folder=$msql->f("folder");
			
				if($cutword!="0"){$project=csubstr($project,0,$cutword);}

				$link=ROOTPATH."news/project/".$folder."/";

				$var=array (
				'link' => $link, 
				'project' => $project, 
				'target' => $target
				);
				$str.=ShowTplTemp($TempArr["list"],$var);
		
		}
		
		
        $str.=$TempArr["end"];
       
		return $str;

		
}


?>
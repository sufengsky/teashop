<?php

/*
	[插件名称] 树型导航菜单
	[适用范围] 所有页面
*/


function TreeMenu(){

		global $msql;


		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$groupid=$GLOBALS["PLUSVARS"]["groupid"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		
		//循环开始
		$var=array(
			'coltitle' => $coltitle
		);

		$str=ShowTplTemp($TempArr["start"],$var);


		$msql->query("select * from {P}_menu where ifshow='1' and groupid='$groupid' order by xuhao ");
		while($msql->next_record()){
			$pid=$msql->f("pid");
			$id=$msql->f("id");
			$menu=$msql->f("menu");
			$linktype=$msql->f('linktype');
			$coltype=$msql->f('coltype');
			$folder=$msql->f('folder');
			$url=$msql->f('url');
			$target=$msql->f('target');


			switch($linktype){

				case "1" :
					$menuurl=ROOTPATH.$folder;
				break;
				case "2" :
					$menuurl=$url;
				break;
				default:
					if($coltype=="index"){
						//首页特殊处理
						if($GLOBALS["CONF"]["CatchOpen"]=="1"){
							$menuurl=ROOTPATH;
						}else{
							$menuurl=ROOTPATH."index.php";
						}

					}else{
						//正常模块链接
						if($GLOBALS["CONF"]["CatchOpen"]=="1"){
							$menuurl=ROOTPATH.$coltype."/";
						}else{
							$menuurl=ROOTPATH.$coltype."/index.php";
						}
					}
				break;

			}

			$var=array (
			'menuurl' => $menuurl, 
			'id' => $id, 
			'pid' => $pid, 
			'menu' => $menu, 
			'target' => $target
			);
			
			$str.=ShowTplTemp($TempArr["list"],$var);

		}
		
        $str.=$TempArr["end"];
		return $str;
				
}



?>
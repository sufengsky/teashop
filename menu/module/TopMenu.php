<?php

/*
	[插件名称] 顶部导航菜单
	[适用范围] 全站

*/


function TopMenu(){
	
	global $msql,$SiteUrl;


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	$Temp=LoadTemp($tempname);

	$TempArr=SplitTblTemp($Temp);

	
	$var=array (
		'coltitle' => $coltitle
	);

	$str=ShowTplTemp($TempArr["start"],$var);
	
	$msql->query("select * from {P}_menu where ifshow='1' and groupid='$groupid' order by xuhao limit 0,$shownums");
	while($msql->next_record()){
			$id=$msql->f('id');
			$menu=$msql->f('menu');
			$linktype=$msql->f('linktype');
			$coltype=$msql->f('coltype');
			$folder=$msql->f('folder');
			$url=$msql->f('url');
			$target=$msql->f('target');
			
			
			switch($linktype){
			

			//1=内部链接
			case "1" :
				$menuurl=ROOTPATH.$folder;
			break;

			
			//2=外部链接
			case "2" :
				$menuurl=$url;
			break;


			
			//链接到模块
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
		'menu' => $menu, 
		'menuurl' => $menuurl,
		'target' => $target
		);

		$str.=ShowTplTemp($TempArr["menu"],$var);

	}

	
	$str.=$TempArr["end"];

	return $str;
		
	

}

?>
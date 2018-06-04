<?php

/*
	[插件名称] 竖式二级手风琴式菜单
	[适用范围] 所有页面
*/


function MVMenu(){

		global $msql,$fsql;


		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$tempcolor=$GLOBALS["PLUSVARS"]["tempcolor"];
		$groupid=$GLOBALS["PLUSVARS"]["groupid"];
		


		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);
		
		$var=array (
		'tempcolor' => $tempcolor, 
		);
		
		$str.=ShowTplTemp($TempArr["start"],$var);


		$msql->query("select * from {P}_menu where ifshow='1' and groupid='$groupid' and pid='0' order by xuhao ");
		while($msql->next_record()){
			$topid=$msql->f("id");
			$topmenu=$msql->f("menu");

			$menustr="";
			$fsql->query("select * from {P}_menu where ifshow='1' and  pid='$topid' order by xuhao ");
			while($fsql->next_record()){
				$id=$fsql->f("id");
				$menu=$fsql->f("menu");
				$linktype=$fsql->f('linktype');
				$coltype=$fsql->f('coltype');
				$folder=$fsql->f('folder');
				$url=$fsql->f('url');
				$target=$fsql->f('target');

				switch($linktype){
					case "1" :
						$menuurl=ROOTPATH.$folder;
					break;
					case "2" :
						$menuurl=$url;
					break;
					default:
						if($coltype=="index"){
							if($GLOBALS["CONF"]["CatchOpen"]=="1"){
								$menuurl=ROOTPATH;
							}else{
								$menuurl=ROOTPATH."index.php";
							}
						}else{
							if($GLOBALS["CONF"]["CatchOpen"]=="1"){
								$menuurl=ROOTPATH.$coltype."/";
							}else{
								$menuurl=ROOTPATH.$coltype."/index.php";
							}
						}
					break;
				}

				$menustr.="<li><a href='".$menuurl."' target='".$target."'>".$menu."</a></li>";

			}

			$var=array (
			'menustr' => $menustr, 
			'topmenu' => $topmenu
			);
			
			$str.=ShowTplTemp($TempArr["list"],$var);

		}
		
        $str.=$TempArr["end"];
		return $str;
				
}



?>
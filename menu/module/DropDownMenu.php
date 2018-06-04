<?php

/*
	[插件名称] 下拉式导航菜单
	[适用范围] 全部

*/

function DropDownMenu(){
	
	global $msql,$fsql;


	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$tempcolor=$GLOBALS["PLUSVARS"]["tempcolor"];

	

	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$var=array (
		'tempcolor' => $tempcolor
	);

	$str=ShowTplTemp($TempArr["start"],$var);


	$n=-1;
	$msql->query("select * from {P}_menu where ifshow='1' and groupid='$groupid' and pid='0' order by xuhao ");
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

					//二级菜单
					$sMenuStr=Menu001_s($id,$TempArr["list"]);
					$n++;

				break;

				
				
				//2=外部链接
				case "2" :

					$menuurl=$url;

					//二级菜单
					$sMenuStr=Menu001_s($id,$TempArr["list"]);
					$n++;

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
					
					

					//二级菜单
					$sMenuStr=Menu001_s($id,$TempArr["list"]);
					$n++;

				break;

			
			}


			$var=array (
			'menu' => $menu, 
			'n' => $n, 
			'menuurl' => $menuurl, 
			'target' => $target,
			'smenustr' => $sMenuStr
			);

			$str.=ShowTplTemp($TempArr["menu"],$var);

	
	}


		
	
	$str.=$TempArr["end"];
	return $str;


}


//二级菜单
function Menu001_s($pid,$sTemp){
	
	global $fsql;
	

	$str="<ul>\n";
	
	$s=0;
	$fsql->query("select * from {P}_menu where ifshow='1' and pid='$pid' order by xuhao ");
	while($fsql->next_record()){
			$id=$fsql->f('id');
			$menu=$fsql->f('menu');
			$linktype=$fsql->f('linktype');
			$coltype=$fsql->f('coltype');
			$folder=$fsql->f('folder');
			$url=$fsql->f('url');
			$target=$fsql->f('target');


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
			'id' => $id, 
			'menu' => $menu, 
			'menuurl' => $menuurl, 
			'target' => $target
			);

			
			$str.=ShowTplTemp($sTemp,$var);

			$s++;

	}

	$str.="</ul>\n";
	if($s>0){
		return $str;
	}

}


?>
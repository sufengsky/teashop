<?php

/*
	[插件名称] 自定义内容模块-标题列表插件
	[适用范围] 全站
*/

function PageTitleList(){

	global $fsql,$msql;

		//插件设置
		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$groupid=$GLOBALS["PLUSVARS"]["groupid"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];


		if($groupid!=0 && $groupid!=""){
			$fsql->query("select folder from {P}_page_group where id='$groupid'");
			if($fsql->next_record()){
				$folder=$fsql->f('folder');
			}
		}else{
			$str="NO GROUPID";
			return $str;
		}
		



		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$var=array(
			'coltitle' => $coltitle,
		);
		$str=ShowTplTemp($TempArr["start"],$var);
		

		$fsql->query("select * from {P}_page where groupid='$groupid' order by xuhao limit 0,$shownums");

		while($fsql->next_record()){
			
			$id=$fsql->f('id');
			$title=$fsql->f('title');
			$url=$fsql->f('url');
			$pagefolder=$fsql->f('pagefolder');

			//链接，如果有跳转网址则优先跳转 20090503
			if(strlen($url)>1){
				if(substr($url,0,7)=="http://"){
					$link=$url;
				}else{
					$link=ROOTPATH.$url;
				}
			}else{
				
				
				//如果有独立页，优先独立页
				if($pagefolder!="" && file_exists(ROOTPATH."page/".$folder."/".$pagefolder.".php")){
					$link=ROOTPATH."page/".$folder."/".$pagefolder.".php";
				}else{
					if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."page/".$folder."/".$id.".html")){
						$link=ROOTPATH."page/".$folder."/".$id.".html";
					}else{
						$link=ROOTPATH."page/".$folder."/?".$id.".html";
					}
				}

			}


			if($cutword!="0"){$title=csubstr($title,0,$cutword);}



			//模版标签解释

			$var=array (
			'title' => $title, 
			'link' => $link,
			'target' => $target
			);
			$str.=ShowTplTemp($TempArr["list"],$var);

		}

		$str.=$TempArr["end"];


		return $str;

}

?>
<?php

/*
	[插件名称] 网页主题图片+标题+摘要
	[适用范围] 全站
*/

function PagePicList(){

	global $fsql,$msql;

		//插件设置
		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$cutbody=$GLOBALS["PLUSVARS"]["cutbody"];
		$picw=$GLOBALS["PLUSVARS"]["picw"];
		$pich=$GLOBALS["PLUSVARS"]["pich"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$groupid=$GLOBALS["PLUSVARS"]["groupid"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$fittype=$GLOBALS["PLUSVARS"]["fittype"];

		if($groupid!=0 && $groupid!=""){
			$fsql->query("select folder,groupname from {P}_page_group where id='$groupid' limit 0,1");
			if($fsql->next_record()){
				$folder=$fsql->f('folder');
				$groupname=$fsql->f('groupname');
			}
		}else{
			$str="NO GROUPID";
			return $str;
		}

		//页头标题定义
		$GLOBALS["pagetitle"]=$groupname;
		$GLOBALS["channel"]=$groupname;
		



		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];
		

		$fsql->query("select * from {P}_page where groupid='$groupid' order by xuhao limit 0,$shownums");

		while($fsql->next_record()){
			
			$id=$fsql->f('id');
			$title=$fsql->f('title');
			$src=$fsql->f('src');
			$memo=$fsql->f('memo');
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
			if($cutbody!="0"){$memo=csubstr($memo,0,$cutbody);}

			$memo=nl2br($memo);

			if($src==""){$src="page/pics/nopic.gif";}
			
			$src=ROOTPATH.$src;



			//模版标签解释

			$var=array (
			'title' => $title, 
			'memo' => $memo,
			'link' => $link,
			'src' => $src,
			'picw' => $picw,
			'pich' => $pich,
			'target' => $target
			);
			$str.=ShowTplTemp($TempArr["list"],$var);

		}

		$var=array(
			'fittype' => $fittype
		);
		$str.=ShowTplTemp($TempArr["end"],$var);


		return $str;

}

?>
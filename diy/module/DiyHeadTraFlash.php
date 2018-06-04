<?php

/*
	[插件名称] 头部自定义透明flash效果
	[适用范围] 全站
*/

function DiyHeadTraFlash(){


		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$pic=$GLOBALS["PLUSVARS"]["pic"];
		
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$src=ROOTPATH.$pic;

		$var=array(
			'src' => $src
			);
		
		$str=ShowTplTemp($TempArr["start"],$var);
		
		if(substr($pic,-4)==".swf"){
			$str.=ShowTplTemp($TempArr["menu"],$var);
		}else{
			$str.=ShowTplTemp($TempArr["list"],$var);
		}


		return $str;


}

?>
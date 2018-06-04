<?php

/*
	[插件名称] 自定义图片
	[适用范围] 全站
*/

function Pic(){


		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$pic=$GLOBALS["PLUSVARS"]["pic"];
		$piclink=$GLOBALS["PLUSVARS"]["piclink"];
		
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$src=ROOTPATH.$pic;

		$var=array(
			'coltitle' => $coltitle,
			'src' => $src,
			'piclink' => $piclink
			);
		
		$str=ShowTplTemp($TempArr["start"],$var);
		
		if(substr($pic,-4)==".swf"){
			$str.=ShowTplTemp($TempArr["menu"],$var);
		}else{
			if($piclink!="" && $piclink!="http://"){
				$str.=ShowTplTemp($TempArr["link"],$var);
			}else{
				$str.=ShowTplTemp($TempArr["list"],$var);
			}
		}


		return $str;


}

?>
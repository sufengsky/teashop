<?php

/*
	[插件名称] 自定义标题+链接组
	[适用范围] 全站
*/

function WordTT(){


		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$word=$GLOBALS["PLUSVARS"]["word"];
		$word1=$GLOBALS["PLUSVARS"]["word1"];
		$word2=$GLOBALS["PLUSVARS"]["word2"];
		$word3=$GLOBALS["PLUSVARS"]["word3"];
		$word4=$GLOBALS["PLUSVARS"]["word4"];
		$link=$GLOBALS["PLUSVARS"]["link"];
		$link1=$GLOBALS["PLUSVARS"]["link1"];
		$link2=$GLOBALS["PLUSVARS"]["link2"];
		$link3=$GLOBALS["PLUSVARS"]["link3"];
		$link4=$GLOBALS["PLUSVARS"]["link4"];
		
		$Temp=LoadTemp($tempname);

		$var=array(
			'coltitle' => $coltitle,
			'word' => $word,
			'word1' => $word1,
			'word2' => $word2,
			'word3' => $word3,
			'word4' => $word4,
			'link' => $link,
			'link1' => $link1,
			'link2' => $link2,
			'link3' => $link3,
			'link4' => $link4,
			);
		
		
		$str=ShowTplTemp($Temp,$var);

		return $str;


}

?>
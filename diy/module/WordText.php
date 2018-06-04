<?php

/*
	[插件名称] 自定义标题+多行文字
	[适用范围] 全站
*/

function WordText(){


		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$word=$GLOBALS["PLUSVARS"]["word"];
		$link=$GLOBALS["PLUSVARS"]["link"];
		$text=$GLOBALS["PLUSVARS"]["text"];
		
		$text=nl2br($text);

		$Temp=LoadTemp($tempname);

		$var=array(
			'coltitle' => $coltitle,
			'text' => $text,
			'word' => $word,
			'link' => $link,
			);
		
		
		$str=ShowTplTemp($Temp,$var);

		return $str;


}

?>
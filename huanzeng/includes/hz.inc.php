<?php

HzConfig();

//模块参数设置
function HzConfig(){

	global $msql;

	$msql->query("select * from {P}_hz_config");
	while($msql->next_record()){
		$variable=$msql->f('variable');
		$value=$msql->f('value');
		
		$GLOBALS["HZCONF"][$variable]=$value;
	}

}

//调用模板
function LoadEsetTemp($RP,$tpl){

	global $strTempNotexists;
	
	if(file_exists(ROOTPATH."huanzeng/templates/".$tpl)){
		$fd=fopen(ROOTPATH."huanzeng/templates/".$tpl,r);
		$p=fread($fd,300000);
		fclose($fd);

		$p=str_replace("images/",$RP."huanzeng/templates/images/",$p);
		$p=str_replace("css/",$RP."huanzeng/templates/css/",$p);
		$p=str_replace("{#RP#}",$RP,$p);

		return $p;
	}else{
		$str=$strTempNotexists."(huanzeng/templates/".$tpl.")";
		return $str;
	}
	
}


?>
<?php

/*
	[插件名称] QQ客服插件
	[适用范围] 全站
*/

function ToolsQqCs() { 
	
	global $msql;
	
	$showtj=$GLOBALS["PLUSVARS"]["showtj"];
	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	$scl=" cat='qq' and iffb='1' ";
	
	if($showtj!="" && $showtj!="0"){
		$scl.=" and tj='1' ";
	}

	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);
	
	$str=$TempArr["start"];
	
	$msql->query("select * from {P}_tools_code where $scl order by xuhao");
	while($msql->next_record()){
		$id=$msql->f("id");
		$qq=$msql->f("qq");
		$name=$msql->f('name');
		$position=$msql->f('position');
		$tel=$msql->f('tel');
		$phone=$msql->f('phone');
		$memo=$msql->f('memo');
		$code=$msql->f("code");
		$xuhao=$msql->f("xuhao");
				
		$var=array (
			'id' => $id,
			'qq' => $qq,
			'name' => $name,
			'position' => $position,
			'tel' => $tel,
			'phone' => $phone,
			'memo' => $memo,
			'code' => $code,
			'xuhao' => $xuhao
		);
				
		$str.=ShowTplTemp($TempArr["list"],$var);
	}
	

	$str.=$TempArr["end"];
	
	return $str;

}


?>
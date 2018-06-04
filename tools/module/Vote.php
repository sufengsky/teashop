<?php

/*
	[插件名称] 投票调查
	[适用范围] 全站
*/

function Vote(){

		global $fsql;

		$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		$groupid=$GLOBALS["PLUSVARS"]["groupid"];


		
		if($groupid=="" || $groupid=="0"){
			return "";
		}


		$fsql->query(" SELECT * FROM {P}_tools_pollindex WHERE id = '$groupid' and status = '1' ");
		if($fsql->next_record()){
			$groupname = $fsql -> f('groupname');
		}


		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$var=array(
			'coltitle' => $coltitle,
			'groupname' => $groupname,
			'id' => $groupid
			);
		
		$str=ShowTplTemp($TempArr["start"],$var);

		$p=0;
		$fsql -> query(" SELECT * FROM {P}_tools_polldata WHERE poll_id = '$groupid'  order by option_id");
		while($fsql->next_record()){
			$option_id = $fsql -> f('option_id');
			$option_text = $fsql -> f('option_text');
			$votes = $fsql -> f('votes');
			
			if($p==0){
				$checked="checked";
			}else{
				$checked="";
			}

			$var=array(
			'option_id' => $option_id,
			'option_text' => $option_text,
			'checked' => $checked,
			'votes' => $votes
			);
		
			$str.=ShowTplTemp($TempArr["list"],$var);


		$p++;
		}

		$var=array(
			'groupname' => $groupname,
			'id' => $groupid
			);
		
		$str.=ShowTplTemp($TempArr["end"],$var);

		return $str;


}

?>
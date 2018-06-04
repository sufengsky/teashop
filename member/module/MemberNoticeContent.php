<?php



function MemberNoticeContent(){

	global $fsql;


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	
	$Temp=LoadTemp($tempname);

	$id=$_GET["id"];
	
	$fsql->query("select * from {P}_member_notice where id='$id'");
	if($fsql->next_record()){
			$id=$fsql->f('id');
			$title=$fsql->f('title');
			$dtime=$fsql->f('dtime');
			$body=$fsql->f('body');
			$cl=$fsql->f('cl');
	}
	
	
	$dtime=date("Y-m-d H:i:s",$dtime);

	
	$var=array (
	    'body' => $body, 
		'dtime' => $dtime, 
		'title' => $title, 
		'cl' => $cl, 
	);


    $str=ShowTplTemp($Temp,$var);


	return $str;


}

?>
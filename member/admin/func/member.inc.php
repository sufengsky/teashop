<?php



function Membertypeid2Membertype($membertypeid){

global $fsql,$strMemberTypeAll;

$fsql->query("select membertype from {P}_member_type where membertypeid='$membertypeid'");


	if($fsql->next_record()){
		$membertype=$fsql->f('membertype');

	}else{
		$membertype=$strMemberTypeAll;
	
	}
	return $membertype;
}


function Membergroupid2Membergroup($membergroupid){

global $fsql;

$fsql->query("select membergroup from {P}_member_group where id='$membergroupid'");


	if($fsql->next_record()){
		$membergroup=$fsql->f('membergroup');

	}
	return $membergroup;
}



//会员ID转换成登录账号
function Memberid2User($memberid){
	global $fsql;
	$fsql->query("select user from {P}_member where memberid='$memberid'");
	if($fsql->next_record()){
	$user=$fsql->f('user');
	}
	return $user;
}




//转换会员默认权限到会员权限
function Default2Member($memberid,$changetypeid){

global $msql,$fsql,$strMemberNotice3;

	if($memberid=="" || $changetypeid==""){
		err($strMemberNotice3,"","");
	}else{
	
		$msql->query("delete from {P}_member_rights where memberid='$memberid'");
		$msql->query("select * from {P}_member_defaultrights where membertypeid='$changetypeid'");
	
		while($msql->next_record()){
		$secureid=$msql->f('secureid');
		$securetype=$msql->f('securetype');
		$secureset=$msql->f('secureset');
		$fsql->query("insert into {P}_member_rights values(
		0,
	   '$memberid',
	   '$secureid',
	   '$securetype',
	   '$secureset'
		)");
		
		}
	

	}

}


function ShowExptime($exptime){

	global $strNolimit;
	if($exptime==0){
		$sayexptime=$strNolimit;
	}else{

		if($exptime<=time()-1){
			$sayexptime="<font color=red>".date("y/n/j",$exptime)."</font>";
		}else{
			$sayexptime=date("y/n/j",$exptime);
		}
	}
	echo $sayexptime;
}


////////////有效期表单

function ExpList($ho,$mi,$se,$mm,$dd,$yy){

	global $strYear,$strMonth,$strDay;

	$String="<select name=yy>";
            
	for($i=2008;$i<=2030;$i++){
		if($i==$yy){
			$String.="<option value=".$i."  selected>".$i."</option>";
		}else{
			$String.="<option value=".$i.">".$i."</option>";
		}
		
	}
		
     $String.="</select> ".$strYear; 

	 $String.="<select name=mm>";
            
	for($i=1;$i<=12;$i++){
		if(strlen($i)<2){
			$ii="0".$i;
		}else{
			$ii=$i;
		}

		if($ii==$mm){
			$String.="<option value=".$ii."  selected>".$i."</option>";
		}else{
			$String.="<option value=".$ii.">".$i."</option>";
		}
		
	}
		
     $String.="</select> ".$strMonth; 

	$String.="<select name=dd>";
            
	for($i=1;$i<=31;$i++){
		if(strlen($i)<2){
			$ii="0".$i;
		}else{
			$ii=$i;
		}

		if($ii==$dd){
			$String.="<option value=".$ii."  selected>".$i."</option>";
		}else{
			$String.="<option value=".$ii.">".$i."</option>";
		}
		
	}
		
     $String.="</select> ".$strDay; 

          
   $String.="<input type=hidden name=ho value=".$ho.">";
   $String.="<input type=hidden name=mi value=".$mi.">";
   $String.="<input type=hidden name=se value=".$se.">";
	
	return $String;

}

//完整日期表单

function DayList($nameY,$nameM,$nameD,$nowY,$nowM,$nowD){

	global $strYear,$strMonth,$strDay;

	if(!isset($nowY) || $nowY==""){
		$nowY=date("Y",time());
	}
	if(!isset($nowM) || $nowM==""){
		$nowM=date("n",time());
	}
	if(!isset($nowD) || $nowD==""){
		$nowD=date("j",time());
	}
	

	$AllfromY=date("Y",time())-5;
	$AlltoY=date("Y",time());
	
	$String="<select name=$nameY>";
            
	for($i=$AllfromY;$i<=$AlltoY;$i++){
		if($i==$nowY){
			$String.="<option value=".$i."  selected>".$i."</option>";
		}else{
			$String.="<option value=".$i.">".$i."</option>";
		}
		
	}
		
     $String.="</select>"; 

	 $String.="<select name=$nameM>";
            
	for($i=1;$i<=12;$i++){
		if(strlen($i)<2){
			$ii="0".$i;
		}else{
			$ii=$i;
		}

		if($ii==$nowM){
			$String.="<option value=".$ii."  selected>".$i."</option>";
		}else{
			$String.="<option value=".$ii.">".$i."</option>";
		}
		
	}
		
     $String.="</select>"; 

	$String.="<select name=$nameD>";
            
	for($i=1;$i<=31;$i++){
		if(strlen($i)<2){
			$ii="0".$i;
		}else{
			$ii=$i;
		}

		if($ii==$nowD){
			$String.="<option value=".$ii."  selected>".$i."</option>";
		}else{
			$String.="<option value=".$ii.">".$i."</option>";
		}
		
	}
		
     $String.="</select>"; 

	return $String;

}



?>
<?php 
class Vote{
 	var $cookie_expire = 96; // hours
  
    function create_poll() {
		global $msql;

		$logging=$_POST["logging"];
		$expire=$_POST["expire"];
		$day=$_POST["day"];
		$status=$_POST["status"];
		$comments=$_POST["comments"];

		$option_id=$_POST["option_id"];
		$groupname=$_POST["groupname"];
		$color=$_POST["color"];



		$timestamp = time();
		if (!isset($expire)) {
			$expire=0;
		}
		if (!isset($day)) {
			$day=$timestamp;
		} else {
			$exp_time=$timestamp+$day*86400;
		}
		if (!get_magic_quotes_gpc()) {
			$groupname = addslashes($groupname);
		}
	$msql -> query(" INSERT INTO {P}_tools_pollindex values(
	  0,
	  '$groupname',
	  '$timestamp',
	  '$status',
	  '$exp_time',
	  '$expire'
	)");
	$msql -> query(" SELECT id FROM {P}_tools_pollindex WHERE timestamp=$timestamp ");
	if($msql->next_record()){
		$poll_id = $msql -> f('id');
	}
	for($i=1; $i<=sizeof($option_id); $i++){
		$option_id[$i] = trim($option_id[$i]);
		if(!empty($option_id[$i])){
			if(!get_magic_quotes_gpc()){
				$option_id[$i] = addslashes($option_id[$i]);
			}	
			$msql->query("INSERT INTO {P}_tools_polldata values (
				0,
				'$poll_id',
				'$i',
				'$option_id[$i]',
				'$color[$i]',
				'0'
			)");
		}
	}
 }
 function delete_poll($poll_id) {
	global $msql,$strVoteDelOK;
	$msql -> query(" DELETE FROM {P}_tools_polldata WHERE poll_id = '$poll_id' ");
	$msql -> query(" DELETE FROM {P}_tools_pollindex WHERE id = '$poll_id' ");
	$del_message = SayOk($strVoteDelOK,"poll_set.php?action=show","");
	return $del_message;
 }
  
  

}
?>
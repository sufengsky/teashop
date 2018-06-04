<?php 
class Vote{
 	var $cookie_expire = 96; // hours
  
    function create_poll() {
		global $msql;

		$logging=$_POST["logging"];
		$expire=$_POST["expire"];
		$day=$_POST["day"];
		$status=$_POST["status"];
		$groupname=$_POST["groupname"];


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
		
		$msql -> query(" INSERT INTO {P}_tools_photopollindex set
			catpath='$catpath',
			cat='$groupname',
		    groupname='$groupname',
		    timestamp='$timestamp',
		    status='$status',
		    exp_time='$exp_time',
		    expire='$expire'
		");
		
		$nowcatid=$msql->instid();
		$nowpath=fmpath($nowcatid);
		$catpath=$nowpath.":";
	
		$msql->query("update {P}_tools_photopollindex set catpath='$catpath' where id='$nowcatid'");
	
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
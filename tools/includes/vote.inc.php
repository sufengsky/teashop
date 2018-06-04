<?php 

class Vote{
 	
  var $cookie_expire = 24; // hours
  
  function result_poll(){
	global $msql,$strVoteTotal;

	$poll_id=$_GET["pollid"];
	$action=$_GET["action"];
	$option_id=$_POST["option_id"];


	$REMOTE_ADDR=$_SERVER["REMOTE_ADDR"];


	
	$msql -> query(" SELECT * FROM {P}_tools_pollconfig ");
	if($msql -> next_record()){
		$img_height = $msql ->f('img_height');
		$img_length = $msql ->f('img_length');
		$vodinfo = $msql ->f('vodinfo');
	}


	if($action=="add"){
			
			if($this -> Cookie_Check($REMOTE_ADDR,$poll_id) == "1"){
				return $vodinfo;
			}
			
			$msql -> query(" UPDATE {P}_tools_polldata SET votes = votes+1 where option_id = '$option_id' and poll_id = '$poll_id' ");
		
	}

	if($action=="add" || $action=="show"){

		$msql -> query(" SELECT * FROM {P}_tools_pollindex WHERE id='$poll_id' and status = '1' ");
		if($msql->next_record()){
			$groupname = $msql -> f('groupname');
		}

		$GLOBALS["title"]=$groupname;
	
		$msql -> query(" SELECT sum(votes) FROM {P}_tools_polldata WHERE poll_id='$poll_id' ");
		if($msql->next_record()){
			$svotes = $msql->f('sum(votes)');
		}

		

		$result_poll = "<table width=\"100%\" height=100% border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\"><tr><td colspan=\"2\" class=\"title\" height=28><div align=\"center\">".$groupname."</div></td></tr>";
		
		$msql -> query(" SELECT * FROM {P}_tools_polldata WHERE poll_id = '$poll_id' ");
		while($msql->next_record()){
			$option_id = $msql -> f('option_id');
			$option_text = $msql -> f('option_text');
			$color = $msql -> f('color');
			$votes = $msql -> f('votes');
			$percent = @round(($votes/$svotes)*100);
			$table_width = $percent + $img_length;
			$result_poll.="<tr><td nowrap class=\"title\"><div align=\"right\">$option_text:</div></td>
			<td  class=\"con\"><img src=\"images/$color.gif\" width=$table_width height=$img_height align=\"absmiddle\"> $percent%($votes)</td></tr>";	
		}
		$result_poll.="<tr><td colspan=\"2\" class=\"title\" height=28><div align=\"center\">".$strVoteTotal." : ".$svotes."</div></td></tr></table>";
		
		return $result_poll;
	}
}
	
	function Cookie_Check($ip,$poll_id){ 
		
		$IP=$_COOKIE["IP"];
		$POID=$_COOKIE["POID"];
		$action=$_GET["action"];
		$REMOTE_ADDR=$_SERVER["REMOTE_ADDR"];
		
		if($REMOTE_ADDR == $IP && $poll_id == $POID){ 
			 $result=1; 
		}else{
			$result=0;
			$endtime = time()+3600*$this->cookie_expire; 
			setcookie("IP",$ip,$endtime);
			setcookie("POID",$poll_id);

			
		}
		return $result;
	}
	
	
}
?>
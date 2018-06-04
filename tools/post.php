<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");

$nowtime=time();

$act=$_POST["act"];

switch($act){
	
	//图片投票系统－－点击投票
	case "setvote" :
		
		$id=intval($_GET['id']);
		$catid=intval($_GET['catid']);
		
		//判断当前点击所在投票组状态
		$msql->query("select * from {P}_tools_photopollindex where id='$catid'");
		if($msql->next_record()){
			$groupname = $msql->f('groupname');
			$timestamp = $msql->f('timestamp');
			$status = $msql->f('status');
			$exp_time = $msql->f('exp_time');
			$expire = $msql->f('expire');
			
			$etime = $exp_time-$timestamp;
			$etime = date("d",$etime)-1;
			$timestamp = date("Y-n-j",$timestamp);
			$exp_time = date("Y-n-j",$exp_time);
			
			if($status==1){  //投票状态是否打开
				if($expire==1){  //投票是否设置了“不过期”
					$sys="yes";
				}else{
					if($nowtime>$exp_time){  //投票未过期
						$sys="yes";
					}else{
						$sys="no";
					}
				}
			}else{
				$sys="no";
			}
		}
		
		
		if($sys=='yes'){
		
			$nowtime_y=date("Y", $nowtime);  //获取当前时间的年份
			$nowtime_z=date("z", $nowtime);  //判断当前时间是一年中的第几天
			
			//获取投票人的IP信息
			$ip=$_SERVER["REMOTE_ADDR"].'.';
	
			$msql->query("select * from {P}_tools_photopolldata where id='$id'");
			if($msql->next_record()){
				$votes=$msql->f('votes');
				$votesinfo1=$msql->f('votesinfo1');
				$votesinfo2=$msql->f('votesinfo2');
				$votesinfo3=$msql->f('votesinfo3');
			}
			
			if($votes<2000){
				$votesinfo=$votesinfo1;
				$vi_num=1;
			}elseif($votes>2000){
				$votesinfo=$votesinfo2;
				$vi_num=2;
			}elseif($votes>4000){
				$votesinfo=$votesinfo3;
				$vi_num=3;
			}
			
			if(ereg($ip, $votesinfo)){
				$arr=explode($ip, $votesinfo);
				$arrnum=count($arr);
				$lastvotetime=substr($arr[$arrnum-1], 0, 10);  //如果此IP已经投过票，则取出其最后一次投票时间
				$lastvotetime_y=date("Y", $lastvotetime);  //获取最后一次投票时间的年份
				$lastvotetime_z=date("z", $lastvotetime);  //判断最后一次投票时间是一年中的第几天
					
				if($nowtime_y>lastvotetime_y){
					$votesinfo.=$ip.$nowtime."|";
					$voterights="yes";
					$votes+=1;
				}else{
					if($nowtime_z>$lastvotetime_z){
						$votesinfo.=$ip.$nowtime."|";
						$voterights="yes";
						$votes+=1;
					}else{
						$voterights="no";
					}
				}
			}else{
				$votesinfo.=$ip.$nowtime."|";
				$voterights="yes";
				$votes+=1;
			}
	
			if($voterights=="yes"){
				if($vi_num==1){
					$msql->query("update {P}_tools_photopolldata set
						votes='$votes',
						votesinfo1='$votesinfo'
					where id='$id' ");
					
					echo "OK";
					exit;
				}elseif($vi_num==2){
					$msql->query("update {P}_tools_photopolldata set
						votes='$votes',
						votesinfo2='$votesinfo'
					where id='$id' ");
					
					echo "OK";
					exit;
				}elseif($vi_num==3){
					$msql->query("update {P}_tools_photopolldata set
						votes='$votes',
						votesinfo3='$votesinfo'
					where id='$id' ");
					
					echo "OK";
					exit;
				}else{
					echo "No1";  //投票失败
					exit;
				}
			}else{
				echo "No2";  //已投过票
				exit;
			}
		
		}else{
			echo "No3";  //当前投票已关闭或已过期
			exit;
		}
	
	break;
	
	
}
?>
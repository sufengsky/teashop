<?php

function StatBase(){
	global $msql,$ShowCount,$ShowCountType,$ShowCountSize,$ShowCountStat,$CountIpExp;
	$msql->query("select * from {P}_tools_statbase");
	if($msql->next_record()){
		$ShowCount=$msql->f('ShowCount');
		$ShowCountType=$msql->f('ShowCountType');
		$ShowCountSize=$msql->f('ShowCountSize');
		$ShowCountStat=$msql->f('ShowCountStat');
		$CountIpExp=$msql->f('CountIpExp');
	}

}
function ShowCount() {

	global $msql;
	global $ShowCount,$ShowCountType,$ShowCountSize;
	global $strStatTotle,$strStatInput,$SiteUrl;
	

	if($ShowCount!="0"){

		$sum_year = "1th_day + 2th_day + 3th_day + 4th_day + 5th_day + 6th_day + 7th_day + 8th_day + 9th_day + 10th_day + 11th_day + 12th_day + 13th_day + 14th_day + 15th_day + 16th_day + 17th_day + 18th_day + 19th_day + 20th_day + 21th_day + 22th_day + 23th_day + 24th_day + 25th_day + 26th_day + 27th_day + 28th_day + 29th_day + 30th_day + 31th_day";
		for ($m = 1; $m <= 12; $m ++) {
		$msql -> query ("select $sum_year as sum from {P}_tools_statdate where id = '$m'");
			if ($msql -> next_record ()) {
				$countid_month = $msql -> f ('sum');
			}
			$data += $countid_month;
		}

		
		
		if ($ShowCount == "1") {
			$str= "<img src=".$SiteUrl."tools/images/stat.gif border=0 alt='".$strStatTotle.$data."'>";
		}
		if ($ShowCount == "2") {
			if (strlen($data)>$ShowCountSize) {
				$data=substr($data,strlen($data)-$ShowCountSize,$ShowCountSize);
			}

			while (strlen($data)<$ShowCountSize ){
				$data="0".$data;
			}

			$digi[0]=$SiteUrl."tools/count/".$ShowCountType."/0.gif";
			$digi[1]=$SiteUrl."tools/count/".$ShowCountType."/1.gif";
			$digi[2]=$SiteUrl."tools/count/".$ShowCountType."/2.gif";
			$digi[3]=$SiteUrl."tools/count/".$ShowCountType."/3.gif";
			$digi[4]=$SiteUrl."tools/count/".$ShowCountType."/4.gif";
			$digi[5]=$SiteUrl."tools/count/".$ShowCountType."/5.gif";
			$digi[6]=$SiteUrl."tools/count/".$ShowCountType."/6.gif";
			$digi[7]=$SiteUrl."tools/count/".$ShowCountType."/7.gif";
			$digi[8]=$SiteUrl."tools/count/".$ShowCountType."/8.gif";
			$digi[9]=$SiteUrl."tools/count/".$ShowCountType."/9.gif";

			$str="";
			for($i=0;$i<$ShowCountSize;$i++){
				$str .= "<img src=".$digi[substr($data,$i,1)] . ">";
			}
			
		}
		
		return $str;

	}
}


function StatisticPage () {

	global $msql,$fsql,$ShowCountStat,$code,$CountIpExp;


	$Reffer=$_GET["reffer"];
	$NowPage=$_GET["nowpage"];

	
	if($ShowCountStat=="1"){
	
	

		$browse = $code -> getBrowse();//浏览器
		$ip = $_SERVER["REMOTE_ADDR"];//访问IP
		$os = $code -> getOS();//操作系统
		$now = time ();//现在时间
		$exptime=$now-$CountIpExp; //过期时间
		$month = date ("n", $now);
		$date = date ("j", $now) . "th_day";

		//记录来源
		if ($Reffer != "") {
			$domain = explode ("/", $Reffer);
			$FromDomain = $domain[2];
		} else {
			$Reffer = "";
			$FromDomain ="";
		}

		$member=$now;


		//判断当前的IP是否在该表中存在 
		$msql -> query("SELECT * FROM {P}_tools_statcount WHERE ip = '$ip' and time>$exptime"); 
		if ($msql -> next_record()) { 
			$ifexist="yes";
		} else { 
			$fsql -> query ("update {P}_tools_statdate set $date = ($date + '1') where id = '$month'");
			$ifexist="no";
		}
		if($ifexist!="yes"){
				$mmtime=30*24*60*60;
				$deltime=time()-$mmtime;

				$msql -> query("delete FROM {P}_tools_statcount where time<$deltime"); 
				$msql -> query("INSERT INTO {P}_tools_statcount VALUES (0, '$ip', '$os', '$browse', '$Reffer', '$now','$NowPage','$member')"); 

				//记录面页来源次数
				$msql -> query ("select * from {P}_tools_statcome where url = '$FromDomain'");
				if ($msql -> next_record ()) {
					$id = $msql -> f ('id');
					$fsql -> query ("update {P}_tools_statcome set count = (count + 1 ),lasttime = '$now' where id = '$id'");
				} else {
					$fsql -> query("INSERT INTO {P}_tools_statcome VALUES (0, '$FromDomain', '1', '$now', '$now')"); 
				}
		}


	}
}

function getyear ($year, $month) {
	if ((($year % 4 == 0) || ($year % 400 == 0)) && ($year % 100 != 0)) {
		$leap_year = "yes";
	} else {
		$leap_year = "no";
	}
	if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
		$dates = 31;
	} else if ($month == 2) {
		($leap_year = "yes") ? $dates = 29 : $dates = 28;
	} else {
		$dates = 30;
	}
	return $dates ;
}
class clientGetObj
{
    function getBrowse()
    {
        global $_SERVER;
        $Agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = '';
        $browserver = '';
        $Browser = array('Lynx', 'MOSAIC', 'AOL', 'Opera', 'JAVA', 'MacWeb', 'WebExplorer', 'OmniWeb');
        for($i = 0; $i <= 7; $i ++){
            if(strpos($Agent, $Browsers[$i])){
                $browser = $Browsers[$i];
                $browserver = '';
            }
        }
        if(ereg('Mozilla', $Agent) && !ereg('MSIE', $Agent)){
            $temp = explode('(', $Agent);
            $Part = $temp[0];
            $temp = explode('/', $Part);
            $browserver = $temp[1];
            $temp = explode(' ', $browserver);
            $browserver = $temp[0];
            $browserver = preg_replace('/([d.]+)/', '\1', $browserver);
            $browserver = $browserver;
            $browser = 'Netscape Navigator';
        }
        if(ereg('Mozilla', $Agent) && ereg('Opera', $Agent)) {
            $temp = explode('(', $Agent);
            $Part = $temp[1];
            $temp = explode(')', $Part);
            $browserver = $temp[1];
            $temp = explode(' ', $browserver);
            $browserver = $temp[2];
            $browserver = preg_replace('/([d.]+)/', '\1', $browserver);
            $browserver = $browserver;
            $browser = 'Opera';
        }
        if(ereg('Mozilla', $Agent) && ereg('MSIE', $Agent)){
            $temp = explode('(', $Agent);
            $Part = $temp[1];
            $temp = explode(';', $Part);
            $Part = $temp[1];
            $temp = explode(' ', $Part);
            $browserver = $temp[2];
            $browserver = preg_replace('/([d.]+)/','\1',$browserver);
            $browserver = $browserver;
            $browser = 'Internet Explorer';
        }
        if($browser != ''){
            $browseinfo = $browser.' '.$browserver;
        } else {
            $browseinfo = false;
        }
        return $browseinfo;
    }

    

    function getOS ()
    {
        global $_SERVER;
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $os = false;
        if (eregi('win', $agent) && strpos($agent, '95')){
            $os = 'Windows 95';
        }
        else if (eregi('win 9x', $agent) && strpos($agent, '4.90')){
            $os = 'Windows ME';
        }
        else if (eregi('win', $agent) && ereg('98', $agent)){
            $os = 'Windows 98';
        }
        else if (eregi('win', $agent) && eregi('nt 5.1', $agent)){
            $os = 'Windows XP';
        }
        else if (eregi('win', $agent) && eregi('nt 5.2', $agent)){
            $os = 'Windows 2003';
        }
        else if (eregi('win', $agent) && eregi('nt 5', $agent)){
            $os = 'Windows 2000';
        }
        else if (eregi('win', $agent) && eregi('nt', $agent)){
            $os = 'Windows NT';
        }
        else if (eregi('win', $agent) && ereg('32', $agent)){
            $os = 'Windows 32';
        }
        else if (eregi('linux', $agent)){
            $os = 'Linux';
        }
        else if (eregi('unix', $agent)){
            $os = 'Unix';
        }
        else if (eregi('sun', $agent) && eregi('os', $agent)){
            $os = 'SunOS';
        }
        else if (eregi('ibm', $agent) && eregi('os', $agent)){
            $os = 'IBM OS/2';
        }
        else if (eregi('Mac', $agent) && eregi('PC', $agent)){
            $os = 'Macintosh';
        }
        else if (eregi('PowerPC', $agent)){
            $os = 'PowerPC';
        }
        else if (eregi('AIX', $agent)){
            $os = 'AIX';
        }
        else if (eregi('HPUX', $agent)){
            $os = 'HPUX';
        } 
		else if (eregi('NetBSD', $agent)){
            $os = 'NetBSD';
        }
        else if (eregi('BSD', $agent)){
            $os = 'BSD';
        }
        else if (ereg('OSF1', $agent)){
            $os = 'OSF1';
        }
        else if (ereg('IRIX', $agent)){
            $os = 'IRIX';
        }
        else if (eregi('FreeBSD', $agent)){
            $os = 'FreeBSD';
        }
        else if (eregi('teleport', $agent)){
            $os = 'teleport';
        }
        else if (eregi('flashget', $agent)){
            $os = 'flashget';
        }
        else if (eregi('webzip', $agent)){
            $os = 'webzip';
        }
        else if (eregi('offline', $agent)){
            $os = 'offline';
        }
        else {
             $os = 'Unknown';
        }
        return $os;
    }

}
?>
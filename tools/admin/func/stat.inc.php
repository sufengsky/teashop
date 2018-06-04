<?php

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
			$String.="<option value=".$i."  selected>".$i.$strYear."</option>";
		}else{
			$String.="<option value=".$i.">".$i.$strYear."</option>";
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
			$String.="<option value=".$ii."  selected>".$i.$strMonth."</option>";
		}else{
			$String.="<option value=".$ii.">".$i.$strMonth."</option>";
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
			$String.="<option value=".$ii."  selected>".$i.$strDay."</option>";
		}else{
			$String.="<option value=".$ii.">".$i.$strDay."</option>";
		}
		
	}
		
     $String.="</select>"; 

	return $String;

}



function StatBase(){
	global $msql,$ShowCount,$ShowCountType,$ShowCountSize,$ShowCountStat,$CountIpExp,$StartTime;
	$msql->query("select * from {P}_tools_statbase");
	if($msql->next_record()){
		$ShowCount=$msql->f('ShowCount');
		$ShowCountType=$msql->f('ShowCountType');
		$ShowCountSize=$msql->f('ShowCountSize');
		$ShowCountStat=$msql->f('ShowCountStat');
		$CountIpExp=$msql->f('CountIpExp');
		$StartTime=$msql->f('starttime');
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
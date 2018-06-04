<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
include("func/stat.inc.php");
NeedAuth(81);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
</head>

<body>
<?php

StatBase();
$nowtime = time ();
$year = date ("Y", $nowtime);
$month = date ("n", $nowtime);
$day = date ("j", $nowtime);
$date = $day . "th_day";
$datas = getyear ($year, $month);




$now = date ("Y-n-j H:i:s", $nowtime);

$agv_day = ($nowtime - $StartTime) / (3600 * 24);
($agv_day < 1) ? $agv_day = 1 : $agv_day = round ($agv_day);
$agv_month = ($nowtime - $StartTime) / (3600 * 24 * $datas);
($agv_month < 1) ? $agv_m = 1 : $agv_m = round ($agv_month);


$sum_year = "1th_day + 2th_day + 3th_day + 4th_day + 5th_day + 6th_day + 7th_day + 8th_day + 9th_day + 10th_day + 11th_day + 12th_day + 13th_day + 14th_day + 15th_day + 16th_day + 17th_day + 18th_day + 19th_day + 20th_day + 21th_day + 22th_day + 23th_day + 24th_day + 25th_day + 26th_day + 27th_day + 28th_day + 29th_day + 30th_day + 31th_day";
for ($m = 1; $m <= 12; $m ++) {
$msql -> query ("select $sum_year as sum from {P}_tools_statdate where id = '$m'");
	if ($msql -> next_record ()) {
		$countid_month = $msql -> f ('sum');
	}
	$countid_year += $countid_month;
}

$sum = "1th_day + 2th_day + 3th_day + 4th_day + 5th_day + 6th_day + 7th_day + 8th_day + 9th_day + 10th_day + 11th_day + 12th_day + 13th_day + 14th_day + 15th_day + 16th_day + 17th_day + 18th_day + 19th_day + 20th_day + 21th_day + 22th_day + 23th_day + 24th_day + 25th_day + 26th_day + 27th_day + 28th_day + 29th_day + 30th_day + 31th_day";
$msql -> query ("select $sum as sum from {P}_tools_statdate where id = '$month'");
if ($msql -> next_record ()) {
	$countid_month = $msql -> f ('sum');
}

$msql -> query("SELECT $date FROM {P}_tools_statdate WHERE id = '$month'"); 
if ($msql -> next_record()) {
	$countid_day = $msql -> f ($date); 
}

?>
<div class="lablenow" onClick="self.location='stat_main.php'"><?php echo $strStatCommon; ?></div>
<div class="lable" onClick="self.location='stat_reffer.php'"><?php echo $strStatFrom; ?></div>
<div class="lable" onClick="self.location='stat_more.php'"><?php echo $strStatFromPM; ?></div>
<div class="lable" onClick="self.location='stat_date.php'"><?php echo $strStatDay; ?></div>
<div class="lable" onClick="self.location='stat_month.php'"><?php echo $strStatMon; ?></div>
<div class="lable" onClick="self.location='stat_set.php'"><?php echo $strStatSet; ?></div>

<div class="formzone">
<div class="tablezone">
  <table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr> 
      <td  width="120"><?php echo $strStatStart; ?></td>
      <td width="200"   ><?php echo date ("Y-n-j H:i:s", $StartTime);?></td>
      <td width="120"   ><?php echo $strStatTotal; ?></td>
      <td   ><?php echo $count_base + $countid_year;?></td>
    </tr>
    <tr> 
      <td  width="120"><?php echo $strStatTotalYear; ?></td>
      <td width="200"   ><?php echo $count_base + $countid_year;?></td>
      <td width="120"   ><?php echo $strStatTotalMon; ?></td>
      <td   ><?php echo $count_base + $countid_month;?></td>
    </tr>
    <tr> 
      <td  width="120"><?php echo $strStatTotalMonP; ?></td>
      <td width="200"   ><?php echo number_format (($count_base + $countid_year) / $agv_m, 2);?></td>
      <td width="120"   ><?php echo $strStatTotalDayP; ?></td>
      <td   ><?php echo number_format (($count_base + $countid_year) / $agv_day, 2);?></td>
    </tr>
    <tr> 
      <td  width="120"><?php echo $strStatTotalDay; ?></td>
      <td colspan="3"   ><?php echo $count_base + $countid_day;?></td>
    </tr>
  </table>
</div>
<div class="namezone">
<?php echo $strStatFrom10; ?>
</div>

<div class="tablezone">
  <table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr> 
    
  <td class="innerbiaoti"  width="160" height="25"><?php echo $strStatFtime; ?></td>
      <td class="innerbiaoti"   width="100" height="25"><?php echo $strStatFIP; ?></td>
      <td class="innerbiaoti"   height="25"><?php echo $strStatFUrl; ?></td>
      <td class="innerbiaoti"   height="25"><?php echo $strStatFPage; ?></td>
      </tr>
    <?php
	
	$msql -> query ("select * from {P}_tools_statcount $sql order by id desc limit 0,10");
	while ($msql -> next_record ()) {
		$time = $msql -> f ('time');
		$ip = $msql -> f ('ip');
		$os = $msql -> f ('os');
		$ie = $msql -> f ('browse');
		$from = $msql -> f ('urlform');
		$nowpage = $msql -> f ('nowpage');
		$member = $msql -> f ('member');
		$time=date("Y-n-j H:i:s",$time);
		$from1=csubstr($from,0,35);
		$nowpage1=str_replace($SiteUrl,"",$nowpage);
		$nowpage1=csubstr($nowpage1,0,25);

		if(substr($member,0,2)=="10" || substr($member,0,2)=="11"){
			$member1=$strGuest;
		}else{
			$member1=$member;
		}

		if($from1==""){
			$from1=$strStatInput;
		}
	

	?> 
    <tr class="list"> 
      <td width="160"><?php echo $time;?></td>
      <td width="100" ><?php echo $ip;?></td>
      <td><?php echo "<a href=$from target=_blank title='$from'><font color=#000000>$from1</font></a>"; ?></td>
      <td ><?php echo "<a href=$nowpage target=_blank title='$nowpage'><font color=#000000>$nowpage1</font></a>"; ?></td>
      </tr>
    <?php
	}
	?> 
  </table>
    

</div>
</div>
</body>
</html>

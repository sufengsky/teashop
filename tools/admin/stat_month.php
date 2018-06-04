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
$nowtime = time ();
$year = date ("Y", $nowtime);
$month = date ("n", $nowtime);
($thismonth == "" || !isset ($thismonth)) ? $getmonth = $month : $getmonth = $thismonth;
$datas = getyear ($year, $getmonth);

$sum_month = "1th_day + 2th_day + 3th_day + 4th_day + 5th_day + 6th_day + 7th_day + 8th_day + 9th_day + 10th_day + 11th_day + 12th_day + 13th_day + 14th_day + 15th_day + 16th_day + 17th_day + 18th_day + 19th_day + 20th_day + 21th_day + 22th_day + 23th_day + 24th_day + 25th_day + 26th_day + 27th_day + 28th_day + 29th_day + 30th_day + 31th_day";
$msql -> query ("select * from {P}_tools_statdate where id = '$month'");
	if ($msql -> next_record ()) {
	for ($d = 1; $d < 31; $d ++) {
		$countid_month = $msql -> f ($d . 'th_day');
		$month_sum += $countid_month;
	}
	}

for ($m = 1; $m <= 12; $m ++) {
$msql -> query ("select $sum_month as sum from {P}_tools_statdate where id = '$m'");
	if ($msql -> next_record ()) {
		$countid_month = $msql -> f ('sum');
	}
	$sum += $countid_month;
}
?>
<div class="lable" onClick="self.location='stat_main.php'"><?php echo $strStatCommon; ?></div>
<div class="lable" onClick="self.location='stat_reffer.php'"><?php echo $strStatFrom; ?></div>
<div class="lable" onClick="self.location='stat_more.php'"><?php echo $strStatFromPM; ?></div>
<div class="lable" onClick="self.location='stat_date.php'"><?php echo $strStatDay; ?></div>
<div class="lablenow" onClick="self.location='stat_month.php'"><?php echo $strStatMon; ?></div>
<div class="lable" onClick="self.location='stat_set.php'"><?php echo $strStatSet; ?></div>  

<div class="formzone">
<div class="tablezone">


  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td bgcolor="#FFFFFF">
        <div align="center"><font style="font-size:14px"><?php echo $year;?><?php echo $strStatMonPic;?>(<?php echo $strStatTotalYear; ?>:<?php echo $month_sum;?>)</font><br>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="35" height="150" align="right"><img src="images/count_left.gif"></td>
            <td valign="bottom">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr> <?php
		  for ($m = 1; $m <= 12; $m ++) {
			$msql -> query ("select * from {P}_tools_statdate where id = '$m'");
			if ($msql -> next_record ()) {
				//$countid_month[$m] = $msql -> f ('sum');
				$monthsum = 0;
				for ($dd = 1; $dd < 31; $dd ++) {
					$countmonth = $msql -> f ($dd . 'th_day');
					$monthsum += $countmonth;
				}
				
			}
			($sum != 0) ? $persent = $monthsum / $sum : $persent = 1;
			$height = $persent * 100; 
		  ?> 
                  <td valign="bottom">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td align="center" width="15"><?php echo $monthsum;?></td>
                      </tr>
                      <tr> 
                        <td align="center" width="15"><img src="images/count_top.gif" width="8" height="3"></td>
                      </tr>
                      <tr> 
                        <td align="center" width="15" valign="bottom"><img src="images/count_main.gif" width="8" height="<?php echo $height;?>"></td>
                      </tr>
                    </table>
                  </td>
                  <?php
		  }
		  ?> </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#000066" height="1"></td>
    </tr>
  </table>
  
        <table border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="35" align="center">0</td>
            <td> 
              <table border="0" cellspacing="0" cellpadding="0">
                <tr> <?php
		  for ($m = 1; $m <= 12; $m ++) {
		  ?> 
                  <td>
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td align="center" width="15"><?php echo $m;?></td>
                      </tr>
                    </table>
                  </td>
                  <?php
		  }
		  ?> </tr>
              </table>
            </td>
          </tr>
        </table>
     
</div>
</div>
</body>
</html>

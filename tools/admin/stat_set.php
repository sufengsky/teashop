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
<script>
function clearall () {
	if (confirm ("<?php echo $strStatNotice1; ?>")) {
		window.location = "stat_set.php?clearall=yes";
	}
}
function clearcount () {
	if (confirm ("<?php echo $strStatNotice2; ?>")) {
		window.location = "stat_set.php?clearcount=yes";
	}
}
</script></head>

<body>
<?php

$clearall=$_REQUEST["clearall"];
$clearcount=$_REQUEST["clearcount"];
$step=$_REQUEST["step"];

if ($clearall == "yes") {
	$msql -> query ("delete from {P}_tools_statcount");
	$msql -> query ("delete from {P}_tools_statcome");
}

if ($clearcount == "yes") {
$msql->query("delete from {P}_tools_statdate");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
$msql->query("INSERT INTO {P}_tools_statdate VALUES (12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");

SayOk($strStatNotice3,"","");
exit;
}


$hour=$_REQUEST["hour"];
$minute=$_REQUEST["minute"];
$second=$_REQUEST["second"];
$month=$_REQUEST["month"];
$day=$_REQUEST["day"];
$year=$_REQUEST["year"];
$ShowCount=$_REQUEST["ShowCount"];
$ShowCountType=$_REQUEST["ShowCountType"];
$ShowCountSize=$_REQUEST["ShowCountSize"];
$ShowCountStat=$_REQUEST["ShowCountStat"];
$CountIpExp=$_REQUEST["CountIpExp"];

if($step=="mod"){
	$starttime = @mktime ($hour, $minute, $second, $month, $day, $year);

	$msql -> query ("update {P}_tools_statbase set 
	ShowCount = '$ShowCount',
	ShowCountType = '$ShowCountType',
	ShowCountSize = '$ShowCountSize',
	ShowCountStat = '$ShowCountStat',
	CountIpExp = '$CountIpExp',
	starttime = '$starttime'
	");


}

?>

<?php


$msql->query("select * from {P}_tools_statbase");
if($msql->next_record()){
		$ShowCount=$msql->f('ShowCount');
		$ShowCountType=$msql->f('ShowCountType');
		$ShowCountSize=$msql->f('ShowCountSize');
		$ShowCountStat=$msql->f('ShowCountStat');
		$CountIpExp=$msql->f('CountIpExp');
		$start_time=$msql->f('starttime');
	   
}
?> 

  
  

<div class="lable" onClick="self.location='stat_main.php'"><?php echo $strStatCommon; ?></div>
<div class="lable" onClick="self.location='stat_reffer.php'"><?php echo $strStatFrom; ?></div>
<div class="lable" onClick="self.location='stat_more.php'"><?php echo $strStatFromPM; ?></div>
<div class="lable" onClick="self.location='stat_date.php'"><?php echo $strStatDay; ?></div>
<div class="lable" onClick="self.location='stat_month.php'"><?php echo $strStatMon; ?></div>
<div class="lablenow" onClick="self.location='stat_set.php'"><?php echo $strStatSet; ?></div>    

<div class="formzone">
<form action="stat_set.php" method="post">

<div class="tablezone">


<table width="100%" border="0" cellpadding="6" cellspacing="0">
        <tr> 
          <td  width="120" align="right"><?php echo $strStatIfuse; ?> : </td>
          <td colspan="3" > 
            <select name="ShowCountStat">
              <option value="1" <?php echo seld ($ShowCountStat, 1);?>><?php echo $strYes; ?></option>
              <option value="0" <?php echo seld ($ShowCountStat, 0);?>><?php echo $strNo; ?></option>
            </select>
          </td>
        </tr>
        <tr> 
          <td  width="120" align="right"><?php echo $strStatStart; ?> : </td>
          <td colspan="3" > 
            <select name="year">
              <?php
			$thisyear = date("Y", $start_time);
			for ($y = 2008; $y <= 2012; $y ++ ) {
			?> 
              <option value="<?php echo $y;?>" <?php echo seld ($thisyear, $y);?>><?php echo $y;?></option>
              <?php
			}
			?> 
            </select>
            <?php echo $strYear; ?> 
            <select name="month">
              <?php
			$mon = date("n", $start_time);
			for ($m = 1; $m <= 12; $m ++ ) {
			?> 
              <option value="<?php echo $m;?>" <?php echo seld ($mon, $m);?>><?php echo $m;?></option>
              <?php
			}
			?> 
            </select>
            <?php echo $strMonth; ?> 
            <select name="day">
              <?php
			$date = date("j", $start_time);
			for ($d = 1; $d <= 31; $d ++ ) {
			?> 
              <option value="<?php echo $d;?>" <?php echo seld ($date, $d);?>><?php echo $d;?></option>
              <?php
			}
			?> 
            </select>
            <?php echo $strDay; ?> 
            <select name="hour">
              <?php
			$hours = date ("H", $start_time);
			for ($h = 0; $h <= 23; $h ++ ) {
			?> 
              <option value="<?php echo $h;?>" <?php echo seld ($hours, $h);?>><?php echo $h;?></option>
              <?php
			}
			?> 
            </select>
            <?php echo $strHour; ?> 
            <select name="minute">
              <?php
			$minutes = date ("i", $start_time);
			for ($mi = 0; $mi <= 59; $mi ++ ) {
			?> 
              <option value="<?php echo $mi;?>" <?php echo seld ($minutes, $mi);?>><?php echo $mi;?></option>
              <?php
			}
			?> 
            </select>
            <?php echo $strMin; ?> 
            <select name="second">
              <?php
			$seconds = date ("s", $start_time);
			for ($s = 0; $s <= 59; $s ++ ) {
			?> 
              <option value="<?php echo $s;?>" <?php echo seld ($seconds, $s);?>><?php echo $s;?></option>
              <?php
			}
			?> 
            </select><?php echo $strSec; ?> 
          </td>
        </tr>
        <tr> 
          <td  width="120" align="right"><?php echo $strStatMethod; ?> : </td>
          <td  colspan="3"> 
            <select name="ShowCount">
              <option value="0" <?php echo seld ($ShowCount, 0);?>><?php echo $strHidden; ?></option>
              <option value="1" <?php echo seld ($ShowCount, 1);?>><?php echo $strStatIcon; ?></option>
              <option value="2" <?php echo seld ($ShowCount, 2);?>><?php echo $strStatCounts; ?></option>
            </select>
          </td>
        </tr>
        <tr>
          <td  width="120" align="right"><?php echo $strStatIpexp; ?> : </td>
          <td  colspan="3">
            <input name="CountIpExp" type="text" id="countsize" size="6" value="<?php echo $CountIpExp;?>" maxlength="10">
            <?php echo $strSec; ?> </td>
        </tr>
      </table>
</div>
<div class="namezone">
<?php echo $strStatCountset; ?>
</div>
<div class="tablezone">

		<table width="100%" border="0" cellpadding="6" cellspacing="0">
        <tr> 
          <td  width="120" align="right"><?php echo $strStatCountW; ?> : </td>
          <td  > 
            <input name="ShowCountSize" type="text" id="countsize" size="2" value="<?php echo $ShowCountSize;?>" maxlength="1">
            <?php echo $strWei; ?></td>
        </tr>
        <tr> 
          <td  width="120" align="right"><?php echo $strStatCountY; ?> : </td>
          <td > 
            <table border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
              <tr> 
                <td> 
                  <input name="ShowCountType" type="radio"  value="1" <?php echo checked($ShowCountType, 1);?>>
                  <img src="images/c1.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 2);?>  value="2">
                  <img src="images/c2.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 3);?>  value="3">
                  <img src="images/c3.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 4);?>  value="4">
                  <img src="images/c4.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 5);?>  value="5">
                  <img src="images/c5.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 6);?>  value="6">
                  <img src="images/c6.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 7);?>  value="7">
                  <img src="images/c7.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 8);?>  value="8">
                  <img src="images/c8.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 9);?>  value="9">
                  <img src="images/c9.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 10);?>  value="10">
                  <img src="images/c10.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 11);?>  value="11">
                  <img src="images/c11.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 12);?>  value="12">
                  <img src="images/c12.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 13);?>  value="13">
                  <img src="images/c13.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 14);?>  value="14">
                  <img src="images/c14.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 15);?>  value="15">
                  <img src="images/c15.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 16);?>  value="16">
                  <img src="images/c16.gif"> </td>
              </tr>
              <tr> 
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 17);?>  value="17">
                  <img src="images/c17.gif"> </td>
                <td> 
                  <input type="radio" name="ShowCountType" <?php echo checked($ShowCountType, 18);?>  value="18">
                  <img src="images/c18.gif"> </td>
              </tr>
            </table>
          </td>
        </tr>
        
    </table>


</div>
<div class="adminsubmit">
<input type="submit" name="cc" value="<?php echo $strModifySet; ?>">
<input type="button" name="Submit2" value="<?php echo $strStatClear; ?>" onClick="clearall()" />
<input type="button" name="Submit22" value="<?php echo $strStatReset; ?>" onClick="clearcount()" />
<input type="hidden" name="step" value="mod" />
</div>
</form>
</div>
</body>
</html>

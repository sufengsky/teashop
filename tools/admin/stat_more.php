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

<div class="lable" onClick="self.location='stat_main.php'"><?php echo $strStatCommon; ?></div>
<div class="lable" onClick="self.location='stat_reffer.php'"><?php echo $strStatFrom; ?></div>
<div class="lablenow" onClick="self.location='stat_more.php'"><?php echo $strStatFromPM; ?></div>
<div class="lable" onClick="self.location='stat_date.php'"><?php echo $strStatDay; ?></div>
<div class="lable" onClick="self.location='stat_month.php'"><?php echo $strStatMon; ?></div>
<div class="lable" onClick="self.location='stat_set.php'"><?php echo $strStatSet; ?></div> 
 
<div class="formzone">
<div class="tablezone">
 
  <table width="100%" border="0" cellpadding="6" cellspacing="0" >
    <tr > 
     <td class="innerbiaoti"><?php echo $strStatFromSite; ?></td>
		<td class="innerbiaoti" width="80"><?php echo $strStatFromCount; ?></td>
      <td class="innerbiaoti" width="160"><?php echo $strStatFromStart; ?></td>
      <td class="innerbiaoti" width="160"><?php echo $strStatFromEnd; ?></td>
    </tr>
    <?php


	$msql -> query ("select * from {P}_tools_statcome order by count desc limit 0,30");
	while ($msql -> next_record ()) {
		$count = $msql -> f ('count');
		$url = $msql -> f ('url');
		$begingtime = $msql -> f ('begingtime');
		$lasttime = $msql -> f ('lasttime');
		$begingtime=date("Y-n-j H:i:s",$begingtime);
		$lasttime=date("Y-n-j H:i:s",$lasttime);

		if($url==""){
			$url=$strStatInput;
		}
	
	?> 
    <tr class="list"> 
      <td  ><?php echo "<a href=http://$url target=_blank>".$url."</a>";?></td>
      <td width="80"><?php echo $count;?></td>
      <td width="160"><?php echo $begingtime;?></td>
      <td width="160"><?php echo $lasttime;?></td>
    </tr>
    <?php
	}
	?> 
  </table>
  
</div>
</div>
</body>
</html>

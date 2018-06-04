<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(212);

$id=$_REQUEST["id"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
</head>

<body>
<div class="formzone">
<div class="tablezone">

<?php
		trylimit("_feedback_info",30,"id");

		$fsql->query ("select * from {P}_feedback_info where id='$id'");
		if ($fsql -> next_record ()) {
		   $groupid=$fsql->f('groupid');
		   $title=$fsql->f('title');
		   $content=$fsql->f('content');
		   $name=$fsql->f('name');
		   $sex=$fsql->f('sex');
		   $tel=$fsql->f('tel');
		   $address=$fsql->f('address');
		   $email=$fsql->f('email');
		   $url=$fsql->f('url');
		   $qq=$fsql->f('qq');
		   $company=$fsql->f('company');
		   $company_address=$fsql->f('company_address');
		   $zip=$fsql->f('zip');
		   $fax=$fsql->f('fax');
		   $products_id=$fsql->f('products_id');
		   $products_name=$fsql->f('products_name');
		   $products_num=$fsql->f('products_num');
		   $custom1=$fsql->f('custom1');
		   $custom2=$fsql->f('custom2');
		   $custom3=$fsql->f('custom3');
		   $custom4=$fsql->f('custom4');
		   $custom5=$fsql->f('custom5');
		   $custom6=$fsql->f('custom6');
		   $custom7=$fsql->f('custom7');
		   $memberid=$fsql->f('memberid');
		   $ip=$fsql->f('ip');
		   $time=$fsql->f('time');
		   $uptime=$fsql->f('uptime');
		    $nowstat=$fsql->f('stat');
		   $time=date("Y-n-j H:i:s",$time);
		   $uptime=date("Y-n-j H:i:s",$uptime);
			
		   $content=nl2br($content);

		}
		
		

?>


<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#DEEFFA">
<tr> 
<td  width="90" align="right" bgcolor="#F2F9FD"><?php echo $strFeedBackNo; ?>：</td>
<td bgcolor="#FFFFFF"><?php echo $id; ?></td>
</tr>


<tr> 
<td  width="90" align="right" bgcolor="#F2F9FD"><?php echo $strFormTime; ?>：</td>
<td bgcolor="#FFFFFF"  ><?php echo $time; ?> &nbsp; [IP: <?php echo $ip; ?>] </td>
</tr>
<?php
$msql -> query ("select field_caption,field_name from {P}_feedback where groupid='$groupid' and use_field = '1' order by xuhao");
while ($msql -> next_record ()) {
$field_caption = $msql -> f ('field_caption');
$field_name = $msql -> f ('field_name');
?>
<tr> 
<td  width="90" align="right" bgcolor="#F2F9FD"><?php echo $field_caption; ?>：</td>
<td bgcolor="#FFFFFF"><?php echo ${$field_name}; ?></td>
</tr>
<?php
}
?>
</table>

</div>
</div>

</body>
</html>

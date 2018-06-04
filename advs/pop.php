<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");



$msql->query("select * from {P}_advs_pop");
if($msql->next_record()){
	$title=$msql->f('title');
	$body=$msql->f('body');
}

$body=str_replace("[ROOTPATH]",ROOTPATH,$body);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
body{
margin: 0;
padding: 0;
border: 0;
height: 100%;
text-align: left;
color: #333333;
background:#ffffff;
font: 12px Verdana, Arial, Helvetica, sans-serif;
} 
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?></title>
</head>
<body>
<?php echo $body; ?>
</body></html>
<?php

define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");
include("includes/vote.inc.php");

$vote = new Vote;

$body=$vote -> result_poll();

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
<title><?php echo $GLOBALS["title"]; ?></title>
</head>
<body>
<?php echo $body; ?>
</body></html>
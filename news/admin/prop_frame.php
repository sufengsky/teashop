<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");

$catid=$_GET["catid"];
$pid=$_GET["pid"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link   href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strColPropTitle; ?></title>

<SCRIPT>

 function sok(k){
  returnValue = k;
  self.close();
 }



</SCRIPT>
</HEAD>
<BODY><IFRAME width=100% height=100%
src="prop.php?catid=<?php echo $catid; ?>&pid=<?php echo $pid; ?>" frameBorder=0></IFRAME>
</BODY></HTML>
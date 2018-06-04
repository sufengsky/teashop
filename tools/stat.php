<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");
include("includes/stat.inc.php");



StatBase();
$code = new clientGetObj;
StatisticPage();

echo "document.write(\"".ShowCount()."\")";

?>
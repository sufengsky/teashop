<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");
include("includes/shop.inc.php");


//定义模块名和页面名
PageSet("shop","brandquery");


//输出
PrintPage();


?>
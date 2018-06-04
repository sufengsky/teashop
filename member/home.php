<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");
include("includes/member.inc.php");

$mid=$_GET["mid"];

//定义模块名和页面名
PageSet("member","homepage");

//输出
PrintPage();

?>

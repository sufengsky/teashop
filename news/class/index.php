<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/common.inc.php");
include("../language/".$sLan.".php");
include("../includes/news.inc.php");

//定义模块名和页面名
PageSet("news","query");

//输出
PrintPage();

?>
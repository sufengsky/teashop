<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/common.inc.php");
include("../language/".$sLan.".php");
include("../includes/news.inc.php");

//网址转发(1.4.3/20100922)
NewsToUrl();

//定义模块名和页面名
PageSet("news","detail");


//输出
PrintPage();

?>
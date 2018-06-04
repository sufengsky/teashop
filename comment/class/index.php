<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/common.inc.php");
include("../language/".$sLan.".php");
include("../includes/comment.inc.php");


//定义模块名和页面名
PageSet("comment","query");


//输出
PrintPage();




?>
<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(0);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">

<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css"  type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
<script  language="javascript" src="<?php echo ROOTPATH; ?>base/js/base.js"></script>   
<script  language="javascript" src="js/frame.js"></script>   

</head>

<body class="framebody">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="150" valign="top">

<div class="frameleft">
<ul class="menulist">
<li id="m1" class="menulist"><?php echo $strSetMenu1; ?></li>
<li id="m2" class="menulist"><?php echo $strSetMenu2; ?></li>
<li id="m3" class="menulist"><?php echo $strSetMenu3; ?></li>
<li id="m4" class="menulist"><?php echo $strSetMenu4; ?></li>
<li id="m5" class="menulist"><?php echo $strSetMenu5; ?></li>
<li id="m6" class="menulist"><?php echo $strSetMenu6; ?></li>
<li id="m7" class="menulist"><?php echo $strSetMenu7; ?></li>
</ul>
</div>

</td>
<td valign="top">


<div class="framemain">
<iframe id="framecon" src='stat_main.php'  name='con' width='100%' height='100%' scrolling='yes' marginheight='0'  frameborder='0'>IE</iframe> 
</div>
</td>
</tr>
</table>
</body>
</html>

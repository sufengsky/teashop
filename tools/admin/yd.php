<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(87);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
<script type="text/javascript" src="../../base/js/base.js"></script>
<script type="text/javascript" src="../../base/js/form.js"></script>
<script type="text/javascript" src="../../base/js/blockui.js"></script>
<script type="text/javascript" src="js/yd.js"></script>

</head>
<body >

<?php

$msql->query("select * from {P}_tools_code where cat='yd' ");
if($msql->next_record()){
	$id=$msql->f('id');
	$code=$msql->f('code');
	
	$ydsub="ydmodify";
}else{
	$ydsub="ydadd";
}

?> 


<form id="ydForm" name="form" action="" method="post" enctype="multipart/form-data">

<div class="formzone">

<div class="namezone">
移动短信留言系统</div>
<div class="tablezone">
<div  id="notice" class="noticediv"></div>

<table width="100%"   border="0" align="center"  cellpadding="2" cellspacing="0" >
    <tr>
      <td width="79" height="30" align="center" >代码</td>
      <td width="521" height="30" ><textarea name="code" style="WIDTH: 499px;font-size:12px;" class="textarea" rows="8"><?php echo $code; ?></textarea> 
        <span style="color:#ff0000;">* </span></td>
      <td valign="bottom" >首先，请确保您已申请了移动的免费139邮箱，然后请到<a href="http://www.aksir.cn/" target="_blank">http://www.aksir.cn/</a>申请移动短信留言板代码</td>
    </tr>
</table>
</div>
<div class="adminsubmit">
<input type="submit" name="modi"  value="<?php echo $strSubmit; ?>" class="button" />
<input type="hidden" name="act" value="<?php echo $ydsub; ?>">
<input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
<input type="hidden" name="author"  value="<?php echo $_COOKIE['SYSNAME']; ?>" />
</div>

</div>
</form>
</body>
</html>

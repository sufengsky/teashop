<?php
define( "ROOTPATH", "" );
include( ROOTPATH."includes/admin.inc.php" );
include( "base/language/".$sLan.".php" );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<title><?php echo $strAdminTitle;?></title>
<link href="base/templates/css/login.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="base/js/base.js"></script>
<script type="text/javascript" src="base/js/form.js"></script>
<script type="text/javascript" src="base/js/admin.js"></script>
</head>
<body>
<div class="top"></div>
<div class="main">
	<div class="box">
		<form method="post" action="" id="adminLoginForm">
		<table width="260" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="30"><?php echo $strAdminUser;?>：</td>
		</tr>
		<tr>
			<td height="40"><input name="user" type="text" class="user user_bg1" id="user" tabindex="1" /></td>
		</tr>
  <tr>
    <td width="209" height="30" colspan="3"><?php echo $strAdminPass;?>：</td>
    </tr>
  <tr>
    <td height="40"><input name="password" id="password" type="password" class="user user_bg2" /></td>
    </tr>
  <tr>
    <td><div id="notice" class="noticediv"></div></td>
    </tr>
  <tr>
    <td height="60" colspan="3" valign="bottom">
    <input name="act" type="hidden" id="act" value="adminlogin" />
    <input type="submit" name="submit" class="but" value=" " /></td>
    </tr>
  </table>
</div>
</form>
<div class="bottom"></div>
</div>
</body>
</html>

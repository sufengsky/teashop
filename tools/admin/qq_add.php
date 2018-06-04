<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(84);

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
<script type="text/javascript" src="js/qq.js"></script>

</head>
<body >

<form id="qqAddForm" name="form" action="" method="post" enctype="multipart/form-data">

<div class="formzone">

<div class="namezone">
QQ客服系统－－添加QQ客服
</div>
<div class="tablezone">
<div  id="notice" class="noticediv"></div>

<table width="100%"   border="0" align="center"  cellpadding="2" cellspacing="0" >
    <tr>
      <td width="100" height="30" align="center" >QQ号码</td>
      <td height="30" ><input type="text" name="qq" style='WIDTH: 499px;font-size:12px;' maxlength="15" value="" class="input" />
          <span style="color:#ff0000;">* </span></td>
    </tr>
    <tr>
      <td height="30" align="center" >姓名</td>
      <td height="30" ><input type="text" name="name" style='WIDTH: 499px;font-size:12px;' value="" class="input" /></td>
    </tr>
    <tr>
      <td height="30" align="center" >职务</td>
      <td height="30" ><input type="text" name="position" style='WIDTH: 499px;font-size:12px;' value="" class="input" /></td>
    </tr>
    <tr>
      <td height="30" align="center" >电话号码</td>
      <td height="30" ><input type="text" name="tel" style='WIDTH: 499px;font-size:12px;' value="" class="input" /></td>
    </tr>
    <tr>
      <td height="30" align="center" >手机号码</td>
      <td height="30" ><input type="text" name="phone" style='WIDTH: 499px;font-size:12px;' value="" class="input" /></td>
    </tr>
	 <tr>
       <td height="30" align="center" >序号</td>
	   <td height="30" ><input type="text" name="xuhao" style='WIDTH: 50px;font-size:12px;' maxlength="11" value='0' class="input" /></td>
	   </tr>
	</table>
	
	<table width="100%"   border="0" align="center"  cellpadding="2" cellspacing="0" >
	  <tr>
        <td height="30" align="center" >备注</td>
	    <td height="30" ><textarea name="memo" style="WIDTH: 499px;font-size:12px;" class="textarea" rows="8"></textarea></td>
	    </tr>
    <tr>
      <td width="100" height="30" align="center" >QQ代码</td>
      <td height="30" ><textarea name="code" style="WIDTH: 499px;font-size:12px;" class="textarea" rows="8"></textarea> <span style="color:#ff0000;">* </span> 请使用QQ官方提供代码，代码中的QQ号码请填写准确      </td>
    </tr>
</table>
</div>
<div class="adminsubmit">
<input type="submit" name="cc"  value="<?php echo $strSubmit; ?>" class="button" />
<input type="hidden" name="act" value="qqadd">
<input type="hidden" name="author"  value="<?php echo $_COOKIE['SYSNAME']; ?>" />
</div>

</div>
</form>
</body>
</html>

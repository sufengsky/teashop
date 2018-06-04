<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(95);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>

</head>

<body>
<?php
$step=$_REQUEST["step"];
$id=$_REQUEST["id"];

if($step=="del"){
	$msql->query("delete from {P}_advs_movi where id='$id'");
}
?>
<div class="formzone">
<div class="namezone" style="float:left;margin:10px 10px 0px 10px"><?php echo $strSetMenu2; ?></div>
<div style="float:right;margin-right:3px;margin-top:5px">
<input type="button" name="Button" value="<?php echo $strAdvsAdd; ?>" class="button" onClick="self.location='advs_movi_modi.php?id=0'" /> 
</div>
<div class="tablezone" style="clear:both;">
<table width="100%" border="0" cellspacing="0" cellpadding="5" >
  <tr> 
    <td class="innerbiaoti" align="center" height="28" width="50" ><?php echo $strNumber; ?></td>
    <td width="130" height="28" class="innerbiaoti" ><?php echo $strAdvsName; ?></td>
    <td height="28" class="innerbiaoti" ><?php echo $strAdvsMoviSrc; ?></td>
    <td class="innerbiaoti" height="28" width="55" ><?php echo $strModify; ?></td>
    <td class="innerbiaoti" height="28" width="55" ><?php echo $strDelete; ?></td>
  </tr>
  <?php 
	$msql -> query ("select * from {P}_advs_movi order by id desc");
	while ($msql -> next_record ()) {
		$id = $msql -> f ('id');
		$groupname = $msql -> f ('groupname');
		$src = $msql -> f ('src');

?> 
  <tr class="list"> 
    <td  align="center" height="28" width="50" > <?php echo $id; ?> </td>
    <td  width="130" ><?php echo $groupname; ?></td>
    <td  ><?php echo $src; ?></td>
    <td height="28" width="55" > <img src="images/edit.png"  style="cursor:pointer" onClick="window.location='advs_movi_modi.php?id=<?php echo $id; ?>'"> 
    </td>
    <td height="28" width="55" > <img src="images/delete.png"  style="cursor:pointer" onClick="window.location='advs_movi.php?step=del&id=<?php echo $id; ?>'"> 
    </td>
  </tr>
  <?php
}
?> 
</table>
</div>
</div>
</body>
</html>

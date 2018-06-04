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

	$msql->query("select src from {P}_advs_pic where id='$id'");
	if($msql->next_record()){
		$src=$msql->f('src');
	}

   	if(file_exists(ROOTPATH.$src) && $src!=""){
		unlink(ROOTPATH.$src);
	}

	$msql->query("delete from {P}_advs_pic where id='$id'");


}
?>
<div class="formzone">
<div class="namezone" style="float:left;margin:10px 10px 0px 10px"><?php echo $strSetMenu1; ?></div>
<div style="float:right;margin-right:3px;margin-top:5px">
<input type="button" name="Button" value="<?php echo $strAdvsAdd; ?>" class="button" onClick="self.location='advs_pic_modi.php?id=0'" /> 
</div>
<div class="tablezone" style="clear:both;">
<table width="100%" border="0" cellspacing="0" cellpadding="5" >
  <tr> 
    <td class="innerbiaoti" align="center" height="28" width="50" ><?php echo $strNumber; ?></td>
    <td width="180" height="28" class="innerbiaoti" ><?php echo $strAdvsName; ?></td>
    <td width="80" height="28" class="innerbiaoti" ><?php echo $strAdvsPic; ?></td>
    <td height="28" class="innerbiaoti" ><?php echo $strUrl; ?></td>
    <td class="innerbiaoti" height="28" width="55" ><?php echo $strModify; ?></td>
    <td class="innerbiaoti" height="28" width="55" ><?php echo $strDelete; ?></td>
  </tr>
  <?php 
	$msql -> query ("select * from {P}_advs_pic order by id desc");
	while ($msql -> next_record ()) {
		$id = $msql -> f ('id');
		$groupname = $msql -> f ('groupname');
		$url = $msql -> f ('url');
		$src = $msql -> f ('src');
	

?> 
  <tr class="list"> 
    <td  align="center" height="28" width="50" > <?php echo $id; ?> </td>
    <td  width="180" ><?php echo $groupname; ?></td>
    <td width="80" ><?php
if($src==""){
echo "<img src=images/noimage.gif >";
}else{
echo "<img src=images/image.gif onClick=\"StDv".$id.".style.display='block'\">";
}
?>
        <div id="StDv<?php echo $id; ?>" style="position:absolute; width:100px; height:100px; z-index:1; display: none">
          <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#666666" style='border:5px #ffffff solid;'>
            <tr align="right" bgcolor="#CCCCCC">
              <td  height="10" valign="top"><img src="images/closewindow.gif" width="12" height="12"  onclick="StDv<?php echo $id; ?>.style.display='none'" /></td>
            </tr>
            <tr bgcolor="#FFFFFF" align="center">
              <td  onclick="StDv<?php echo $id; ?>.style.display='none'"><?php
if($src==""){
echo "";
}else{
$showsrc=ROOTPATH.$src;
echo ShowTypeImage($showsrc,$type,"","",0);
}
?>
              </td>
            </tr>
          </table>
      </div>
	  </td>
    <td  ><?php echo $url; ?></td>
    <td height="28" width="55" > <img src="images/edit.png"  style="cursor:pointer" onClick="window.location='advs_pic_modi.php?id=<?php echo $id; ?>'"> 
    </td>
    <td height="28" width="55" > <img src="images/delete.png"  style="cursor:pointer" onClick="window.location='advs_pic.php?step=del&id=<?php echo $id; ?>'"> 
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

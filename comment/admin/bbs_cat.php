<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include(ROOTPATH."includes/pages.inc.php");
include("language/".$sLan.".php");
NeedAuth(131);

$step=$_REQUEST["step"];
$id=$_REQUEST["id"];
$cat=$_REQUEST["cat"];
$catid=$_REQUEST["catid"];
$coltype=$_REQUEST["coltype"];
$xuhao=$_REQUEST["xuhao"];
$bcat=$_REQUEST["bcat"];
$bxuhao=$_REQUEST["bxuhao"];
$ifbbs=$_REQUEST["ifbbs"];
$ifshow=$_REQUEST["ifshow"];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>

<SCRIPT>
function cm(nn){
	qus=confirm("<?php echo $strDeleteConfirm; ?>")
	if(qus!=0){
	window.location='bbs_cat.php?step=del&catid='+nn;
	}
}

</SCRIPT>
</head>

<body>
<?php

if($step=="mod"){
	$fsql->query("update {P}_comment_cat set cat='$cat',xuhao='$xuhao',ifbbs='$ifbbs',ifshow='$ifshow' where  catid='$catid'");
	echo "<script>window.location='bbs_cat.php'</script>";
}


if($step=="del"){

	
	$fsql->query("select * from {P}_comment where catid='$catid'");
	if($fsql->next_record()){
		err($strCommentNTC1,"bbs_cat.php","");
	}

	$fsql->query("delete from {P}_comment_cat where catid='$catid'");
	echo "<script>self.location='bbs_cat.php'</script>";
}

if($step=="add"){
	if($bcat==""){
		err($strCommentNTC2,"bbs_cat.php","");
	}
	
	$msql->query("insert into {P}_comment_cat set
	pid='0',
	cat='$bcat',
	coltype='comment',
	xuhao='$bxuhao',
	moveable='1',
	ifshow='1',
	ifbbs='1'
	");
	$instcatid=$msql->instid();
	
	//生成catpath
	$catpath=fmpath($instcatid).":";
	$msql->query("update {P}_comment_cat set catpath='$catpath' where catid='$instcatid'");

	//预留100之前分类号作各种点评专用
	if($instcatid<101){
		$msql->query("update {P}_comment_cat set catid='101',catpath='0101:' where catid='$instcatid'");
	}

	echo "<script>self.location='bbs_cat.php'</script>";
}

?>
<div class="formzone">
<div class="namezone">
<?php echo $strSetMenu2; ?>
</div>
<div class="tablezone">

<table width="100%" border="0" cellspacing="0" cellpadding="6" align="center">
  <tr>
    <td  class="innerbiaoti" align="center" width="50"><?php echo $strNumber; ?></td> 
    <td  class="innerbiaoti" height="28" align="center" width="50"><?php echo $strCommentCatXuhao; ?></td>
    <td  class="innerbiaoti" height="28"><?php echo $strCommentCatName; ?> </td>
    <td  class="innerbiaoti" width="50" align="center"><?php echo $strModify; ?></td>
    <td  class="innerbiaoti" height="28" width="50" align="center"><?php echo $strDelete; ?></td>
  </tr>
  <?php
$msql->query("select * from {P}_comment_cat order by xuhao ");

while($msql->next_record()){
$catid=$msql->f('catid');
$cat=$msql->f('cat');
$xuhao=$msql->f('xuhao');
$moveable=$msql->f('moveable');
$coltype=$msql->f('coltype');
$ifbbs=$msql->f('ifbbs');
$ifshow=$msql->f('ifshow');
?> 
  <tr class="list">
    <td  align="center"><?php echo $catid; ?></td> 
    <form method="post" action="bbs_cat.php">
      <td  height="26"  align="center"> 
        <input type="text" name="xuhao" size="3"  class="input" value="<?php echo $xuhao; ?>">
      </td>
      <td   height="26" > 
        <input type="text" name="cat" size="35"  class="input" value="<?php echo $cat; ?>" maxlength="16">
        <select name="ifbbs" id="ifbbs">
          <option value="1" <?php echo seld($ifbbs,"1"); ?>><?php echo $strCommentCatB1; ?></option>
          <option value="0" <?php echo seld($ifbbs,"0"); ?>><?php echo $strCommentCatB0; ?></option>
        </select>
		<select name="ifshow" id="ifshow">
          <option value="1" <?php echo seld($ifshow,"1"); ?>><?php echo $strShow; ?></option>
          <option value="0" <?php echo seld($ifshow,"0"); ?>><?php echo $strHidden; ?></option>
        </select>
      </td>
      <td  width="50" align="center"><input type="image"  name="imageField" src="images/modi.png" /></td>
      <td   height="26"  width="50" align="center"> <?php 
if($moveable=="1"){
?> <img src="images/delete.png"  style="cursor:pointer"  onClick="cm('<?php echo "$catid"; ?>')"> 
        <?php
}else{
echo "-";
}
?> 
        <input type="hidden" name="step" value="mod">
        <input type="hidden" name="catid" value="<?php echo $catid; ?>">
      </td>
    </form>
  </tr>
  <?php
}
$bxuhao=$xuhao+1;
?> 
  <tr>
    <td valign="top" align="center">&nbsp;</td> 
    <form name="form1" action=bbs_cat.php>
      <td    height="26" valign="top" align="center"> 
        <input type="text" name="bxuhao" size="3"  class="input" value="<?php echo $bxuhao; ?>">
      </td>
      <td   height="26" valign="top" colspan="3" > 
        <input type="text" name="bcat" size="35"  class="input" maxlength="16">
        <input type="submit" name="Submit22" class=button value="<?php echo $strCommentCatAdd; ?>">
        <input type="hidden" name="step" value="add">
      </td>
    </form>
  </tr>
</table>
</div>
</div>
</body>
</html>

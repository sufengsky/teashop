<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(225);

$step=$_REQUEST["step"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
</head>

<body >

<?php


if ($step=="modify") {

$field_id=$_POST["field_id"];
$moveable=$_POST["moveable"];
$textfield=$_POST["textfield"];
$fieldsize=$_POST["fieldsize"];
$fieldvalue=$_POST["fieldvalue"];
$mustfill=$_POST["mustfill"];
$canrepeat=$_POST["canrepeat"];
$memo=$_POST["memo"];
$used=$_POST["used"];
$xuhao=$_POST["xuhao"];


	$nums = sizeof ($field_id);
	for ($j = 1; $j <= $nums; $j ++) {
		$fieldtype = "fieldtype_".$j;
		$field_type=$_POST[$fieldtype];
		
		


		$msql -> query("update {P}_job_form set 
		field_caption = '$textfield[$j]',
		field_type = '$field_type',
		field_size = '$fieldsize[$j]',
		field_value = '$fieldvalue[$j]',
		field_null = '$mustfill[$j]',
		value_repeat = '$canrepeat[$j]',
		field_intro = '$memo[$j]',
		use_field = '$used[$j]',
		xuhao = '$xuhao[$j]'
   		where id = '$field_id[$j]'");

	}
	SayOk($strFormNotice2,"form_set.php","");
} else {
?>
<div class="listzone">  
<form name="dform" action="form_set.php" method="post">

<table width="100%" border="0" cellspacing="0" align="center" cellpadding="3">
    <tr bgcolor="#f0f0f0"> 
      <td width="35" height="28" class="biaoti"><?php echo $strFormL1; ?></td>
      <td width="35" class="biaoti"><?php echo $strFormL9; ?></td>
      <td width="90" height="28" class="biaoti"><?php echo $strFormL2; ?> </td>
      <td width="70" height="28" class="biaoti"><?php echo $strFormL3; ?> (PX)</td>
      <td width="90" height="28" class="biaoti"><?php echo $strFormL4; ?></td>
      <td width="130" height="28" class="biaoti"><?php echo $strFormL5; ?></td>
      <td width="35" height="28" class="biaoti"><?php echo $strFormL6; ?></td>
      <td width="35" height="28" class="biaoti"><?php echo $strFormL7; ?></td>
      <td height="28" class="biaoti"><?php echo $strFormL8; ?></td>
      
    </tr>
    <?php

$i = 1;

$msql -> query ("select * from {P}_job_form order by xuhao");
while ($msql -> next_record()) {
	$id[$i] = $msql -> f ('id');
	$field_caption[$i] = $msql -> f ('field_caption');
	$field_type[$i] = $msql -> f ('field_type');
	$field_size[$i] = $msql -> f ('field_size');
	$field_name[$i] = $msql -> f ('field_name');
	$field_value[$i] = $msql -> f ('field_value');
	$field_null[$i] = $msql -> f ('field_null');
	$field_value_repeat[$i] = $msql -> f ('value_repeat');
	$field_intro[$i] = $msql -> f ('field_intro');
	$field_used[$i] = $msql -> f ('use_field');
	$field_xuhao[$i] = $msql -> f ('xuhao');
	$field_moveable[$i] = $msql -> f ('moveable');
	if ($id[$i] <= "16") {
		$select_disabled = "disabled";
		$hidden = "<input type=hidden name=fieldtype_$i value=$field_type[$i]>";
	} else {
		$select_disabled = "";
	}
?> 
    <tr class="list"> 
      <td width="35" > <?php

if($field_moveable[$i] == "0"){
echo "<input type='checkbox' name=used[$i] value=1 ".checked($field_used[$i],1).">";
}else{
echo "<input type='checkbox' name=d value=1 ".checked($field_used[$i],1)." disabled>";
echo "<input type='hidden' name=used[$i] value=$field_used[$i]>";
}
?> 
        <input type="hidden" name="field_id[<? echo $i; ?>]" value="<?php echo "$id[$i]"; ?>">
        <input type="hidden" name="moveable[<? echo $i; ?>]" value="<?php echo "$field_moveable[$i]"; ?>">
      </td>
      <td width="35" ><input name="xuhao[<?php echo $i;?>]" type="text"  class="input" value="<?php echo $field_xuhao[$i];?>" size="2" maxlength="3" />
      </td>
      <td width="90" > 
        <input name="textfield[<?php echo $i;?>]" type="text" class=input value="<?php echo $field_caption[$i];?>" size="16" maxlength="60">
      </td>
      <td width="70" > 
        <input name="fieldsize[<?php echo $i;?>]" type="text"  class=input value=<?php echo $field_size[$i];?> size="3" maxlength="4">
      </td>
      <td width="90" > 
        <select  style="width=92" name="fieldtype_<?php echo $i;?>"  <?php echo $select_disabled;?> >
          <option>-<?php echo $strFormColType; ?>-</option>
          <option value="1" <?php echo seld ($field_type[$i],1);?>><?php echo $strFormColType1; ?></option>
          <option value="2" <?php echo seld ($field_type[$i],2);?>><?php echo $strFormColType2; ?></option>
          <option value="5" <?php echo seld ($field_type[$i],5);?>><?php echo $strFormColType3; ?></option>
        </select>
        <?php echo $hidden;?></td>
      <td width="130" > 
        <input name="fieldvalue[<?php echo $i;?>]" type="text" value="<?php echo $field_value[$i];?>" size="26"  class=input>
      </td>
      <td width="35" > <?php
if ($field_moveable[$i] == "0"){
	echo "<input type='checkbox' name=mustfill[$i] value=1 ".checked($field_null[$i],1).">";
} else {
	echo "<input type='checkbox' name=d value=1 ".checked($field_null[$i],1)." disabled>";
	echo "<input type='hidden' name=mustfill[$i] value=$field_null[$i]>";
}
?> </td>
      <td width="35" ><?php echo "<input type='checkbox' name=canrepeat[$i] value=1 ".checked($field_value_repeat[$i],1).">";?> 
      </td>
      <td > 
        <input type="text" name="memo[<?php echo $i;?>]" value="<?php echo $field_intro[$i];?>" size="32"  class=input>
      </td>
      
    </tr>
    <?php
$i ++;
}
?> 
    <tr  align="center"> 
      <td height="28" colspan="10" class="end"> 
        <input type="submit" name="Submit" value="<?php echo $strConfirm; ?>"  class=button>
        <input type="hidden" name="step" value="modify">
      </td>
    </tr>

</table>
</form>
</div>

<?php
}
?> 
</body>
</html>

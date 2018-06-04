<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(130);

$step=$_REQUEST["step"];

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

if($step=="modify"){
$var=$_POST["var"];

while (list($key,$val)=each($var)){

	$msql->query("update {P}_comment_config set value='$val' where variable='$key'");

}

	SayOk($strConfigOk,"config.php","");
}




?>
<div class="formzone">
<form name="form1" method="post" action="config.php">

<div class="tablezone">
          <table width="100%" border="0" align="center" cellpadding="8" cellspacing="0">
            <tr> 
              <td class="innerbiaoti"><strong><?php echo $strConfigName; ?></strong></td>
              <td class="innerbiaoti"  width="300" height="28"><strong><?php echo $strConfigSet; ?></strong></td>
            </tr>
           
            <?php

	$msql->query("select * from {P}_comment_config  order by xuhao");
	while($msql->next_record()){
	
	$variable=$msql->f('variable');
	$value=$msql->f('value');
	$vname=$msql->f('vname');
	$settype=$msql->f('settype');
	$colwidth=$msql->f('colwidth');
	$intro=$msql->f('intro');
	$intro=str_replace("\n","<br>",$intro);

	


?> 
            <tr class="list"> 
              <td   style="line-height:20px;padding-right:30px"> 
                
               <strong><?php echo $vname; ?> : </strong><br>
              <?php echo $intro; ?></td>
              <td   width="300" height="20"> <?php
if($settype=="YN"){
?> 
                <input type="radio" name="var[<?php echo $variable; ?>]" value="1" <?php echo checked($value,"1"); ?>><?php echo $strYes; ?>
                <input type="radio" name="var[<?php echo $variable; ?>]" value="0" <?php echo checked($value,"0"); ?>>
                <?php echo $strNo; ?> <?php
}elseif($settype=="textarea"){
?> 
<textarea name="var[<?php echo $variable; ?>]" cols="<?php echo $colwidth; ?>" rows="5" class="textarea" ><?php echo $value; ?></textarea>
<?php
}else{
?> 
<input  type="text" name="var[<?php echo $variable; ?>]"   value="<?php echo $value; ?>" size="<?php echo $colwidth; ?>" class="input" />
<?php
}
?>


              </td>
            </tr>
            <?php
}
?> 
           
    </table>
</div>
<div class="adminsubmit">
  <input name="cc2" type="submit" id="cc" value="<?php echo $strSubmit; ?>" class="button" />
  <input type="hidden" name="step" value="modify" />
</div>

</form>
</div>
</body>
</html>

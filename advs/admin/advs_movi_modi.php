<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
include("func/upload.inc.php");
NeedAuth(95);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>

</head>

<body>
<?php
$step=$_REQUEST["step"];
$id=$_REQUEST["id"];

if ($step == "add") { 

	$groupname=$_POST["groupname"];
	$src=$_POST["src"];

if($groupname==""){
	err($strAdvsNotice1,"","");
}

if($src=="" || $src=="http://"){
	err($strAdvsNotice3,"","");
}



		$msql -> query ("insert into {P}_advs_movi set
		groupname = '$groupname',
		src = '$src'
		");

		Sayok($strAddOk,"advs_movi.php","");
	
}


if ($step == "modify") { 

	$groupname=$_POST["groupname"];
	$src=$_POST["src"];

	if($groupname==""){
		err($strAdvsNotice1,"","");
	}
	if($src=="" || $src=="http://"){
		err($strAdvsNotice3,"","");
	}

		$msql -> query ("update {P}_advs_movi set
		groupname = '$groupname',
		src = '$src'
		where id = '$id' 
		");

		Sayok($strModifyOk,"advs_movi.php","");


	
}

//NEW ADVS
if($id=="0" || $id==""){
		
		$groupname="";
		$src="http://";
		$nowstep="add";

	}else{

		$nowstep="modify";

		$msql -> query ("select * from {P}_advs_movi where id='$id'");
		if ($msql -> next_record ()) {
			$id = $msql -> f ('id');
			$groupname = $msql -> f ('groupname');
			$src = $msql -> f ('src');
		}	
	}


?> 
<form name="advs_movi_modi.php" action="" method="post" enctype="multipart/form-data">
<div class="formzone">
<div class="namezone"><?php echo $strSetMenu2; ?></div>
<div class="tablezone">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td align="right"  width="90" height="26"><?php echo $strAdvsName; ?></td>
    <td > 
      <input type="text" name="groupname" size="50" value="<?php echo $groupname; ?>" class="input" />
        <font color="#FF3300">* </font> </td>
    </tr>
 
    <tr> 
      <td align="right"  width="90" height="26"><?php echo $strAdvsMoviSrc; ?></td>
      <td > 
        <textarea name="src" cols="50" rows="6" class="textarea"><?php echo $src; ?></textarea>
      </td>
      </tr>
    <tr>
      <td align="right" height="26">&nbsp;</td>
      <td >
	  <?php
	  if($src!="" && $src!="http://"){
	  ?>
	  <object id="ssss" width="300" height="300" >

<param name="allowScriptAccess" value="always" />
<embed  pluginspage="http://www.macromedia.com/go/getflashplayer" src="<?php echo $src; ?>" type="application/x-shockwave-flash" name="ssss" allowFullScreen="true"  width="300" height="300" wmode="transparent" >
</embed>
</object>
  <?php
	}	  
	?>
</td>
    </tr>
   
</table>
</div>
<div class="adminsubmit">
        <input type="submit" name="Submit" value="<?php echo $strSubmit; ?>" class="button" />
        <input type="button" name="Submit2" value="<?php echo $strBack; ?>" class="button" onClick="self.location='advs_movi.php'" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input name="step" type="hidden" id="submit" value="<?php echo $nowstep; ?>" />

</div>

</div>
</form>
</body>
</html>

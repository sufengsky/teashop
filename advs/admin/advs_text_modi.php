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
	$url=$_POST["url"];
	$text=$_POST["text"];

if($groupname==""){
	err($strAdvsNotice1,"","");
}

	$msql -> query ("insert into {P}_advs_text set
	`groupname` = '$groupname',
	`text` = '$text',
	`url` = '$url'
	");

	Sayok($strAddOk,"advs_text.php","");


	
}


if ($step == "modify") { 

	$groupname=$_POST["groupname"];
	$url=$_POST["url"];
	$text=$_POST["text"];

	$msql -> query ("update {P}_advs_text set
		`groupname` = '$groupname',
		`text` = '$text',
		`url` = '$url'
		where id = '$id'
	");

	Sayok($strModifyOk,"advs_text.php","");
	
}

//NEW ADVS
if($id=="0" || $id==""){
		
		$groupname="";
		$url="http://";
		$text="";
		$nowstep="add";

	}else{

		$nowstep="modify";

		$msql -> query ("select * from {P}_advs_text where id='$id'");
		if ($msql -> next_record ()) {
			$id = $msql -> f ('id');
			$groupname = $msql -> f ('groupname');
			$url = $msql -> f ('url');
			$text = $msql -> f ('text');
		}	


	}


?> 
<form name="advs_text_modi.php" action="" method="post" enctype="multipart/form-data">
<div class="formzone">
<div class="namezone"><?php echo $strSetMenu3; ?></div>
<div class="tablezone">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td align="right"  width="90" height="26"><?php echo $strAdvsName; ?></td>
    <td > 
      <input type="text" name="groupname" size="50" value="<?php echo $groupname; ?>" class="input" />
        <font color="#FF3300">* </font> </td>
    </tr>
  <tr>
    <td width="90" height="26" align="right"><?php echo $strAdvsText; ?></td>
    <td ><font color="#FF3300">
      <input name="text" type="text"  value="<?php echo $text; ?>" size="50" class="input" />
    * </font> </td>
  </tr>
 
    <tr> 
      <td align="right"  width="90" height="26"><?php echo $strUrl; ?></td>
      <td > 
        <input name="url" type="text"  value="<?php echo $url; ?>" size="50" class="input" />
      </td>
      </tr>
   

</table>
</div>
<div class="adminsubmit">
        <input type="submit" name="Submit" value="<?php echo $strSubmit; ?>" class="button" />
        <input type="button" name="Submit2" value="<?php echo $strBack; ?>" class="button" onClick="self.location='advs_text.php'" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input name="step" type="hidden" id="submit" value="<?php echo $nowstep; ?>" />

</div>

</div>
</form>
</body>
</html>

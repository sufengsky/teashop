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
	$url2=$_POST["url2"];
	$pic=$_FILES["pic"];
	$pic2=$_FILES["pic2"];

if($groupname==""){
	err($strAdvsNotice1,"","");
}



if($pic["size"]<=0 || $pic2["size"]<=0){
err($strAdvsNotice2,"","");
}
			
		$nowdate=date("Ymd",time());
		$picpath="../pics/".$nowdate;
		@mkdir($picpath,0777);
		$uppath="advs/pics/".$nowdate;

		$arr=NewUploadImage($pic["tmp_name"],$pic["type"],$pic["size"],$uppath);
		$src=$arr[3];

		$nowdate2=$nowdate."x";
		$pic2path="../pics/".$nowdate2;
		@mkdir($pic2path,0777);
		$uppath2="advs/pics/".$nowdate2;
		
		$arr2=NewUploadImage($pic2["tmp_name"],$pic2["type"],$pic2["size"],$uppath2);
		$src2=$arr2[3];


		$msql -> query ("insert into {P}_advs_duilian set
		groupname = '$groupname',
		src = '$src',
		src2 = '$src2',
		url = '$url',
		url2 = '$url2'
		");

		Sayok($strAddOk,"advs_duilian.php","");

	
}


if ($step == "modify") { 

	$groupname=$_POST["groupname"];
	$url=$_POST["url"];
	$url2=$_POST["url2"];
	$pic=$_FILES["pic"];
	$pic2=$_FILES["pic2"];


	if($pic["size"]>0){
			
		$msql->query("select src from {P}_advs_duilian where id='$id'");
		if($msql->next_record()){
			$src=$msql->f('src');
		}
		$fname=ROOTPATH.$src;
		if($src!="" && strlen($src)>9 && file_exists($fname)){
			@unlink($fname);
		}

		$nowdate=date("Ymd",time());
		$picpath="../pics/".$nowdate;
		@mkdir($picpath,0777);
		$uppath="advs/pics/".$nowdate;

		$arr=NewUploadImage($pic["tmp_name"],$pic["type"],$pic["size"],$uppath);
		$src=$arr[3];


		$msql -> query ("update {P}_advs_duilian set src = '$src' where id = '$id'");

	}
	
	if($pic2["size"]>0){
			
		$msql->query("select src2 from {P}_advs_duilian where id='$id'");
		if($msql->next_record()){
			$src2=$msql->f('src2');
		}
		$fname2=ROOTPATH.$src2;
		if($src2!="" && strlen($src2)>9 && file_exists($fname2)){
			@unlink($fname2);
		}
		
		$nowdate=date("Ymd",time());
		$nowdate2=$nowdate."x";
		$pic2path="../pics/".$nowdate2;
		@mkdir($pic2path,0777);
		$uppath2="advs/pics/".$nowdate2;

		$arr2=NewUploadImage($pic2["tmp_name"],$pic2["type"],$pic2["size"],$uppath2);
		$src2=$arr2[3];
		$msql -> query ("update {P}_advs_duilian set src2 = '$src2' where id = '$id'");

	}

	

		$msql -> query ("update {P}_advs_duilian set
		groupname = '$groupname',
		url2 = '$url2',
		url = '$url'
		where id = '$id' 
		");

		Sayok($strModifyOk,"advs_duilian.php","");

	

	
}

//NEW ADVS
if($id=="0" || $id==""){
		
		$groupname="";
		$url="http://";
		$url2="http://";
		$src="";
		$src2="";
		$nowstep="add";

	}else{

		$nowstep="modify";

		$msql -> query ("select * from {P}_advs_duilian where id='$id'");
		if ($msql -> next_record ()) {
			$id = $msql -> f ('id');
			$groupname = $msql -> f ('groupname');
			$url = $msql -> f ('url');
			$url2 = $msql -> f ('url2');
			$src = $msql -> f ('src');
			$src2 = $msql -> f ('src2');
		}	


	}


?> 
<form name="advs_duilian_modi.php" action="" method="post" enctype="multipart/form-data">
<div class="formzone">
<div class="namezone"><?php echo $strSetMenu5; ?></div>
<div class="tablezone">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td align="right"  width="90" height="26"><?php echo $strAdvsName; ?></td>
    <td > 
      <input type="text" name="groupname" size="50" value="<?php echo $groupname; ?>" class="input" />
        <font color="#FF3300">* </font> </td>
    </tr>
  <tr>
    <td width="90" height="26" align="right"><?php echo $strUrl; ?>1</td>
    <td ><input name="url" type="text"  value="<?php echo $url; ?>" size="50" class="input" />
    </td>
  </tr>
 
    <tr> 
      <td align="right"  width="90" height="26"><?php echo $strUrl; ?>2</td>
      <td > 
        <input name="url2" type="text"  value="<?php echo $url2; ?>" size="50" class="input" />
      </td>
      </tr>
    <tr> 
      <td align="right"  width="90" height="26"><?php echo $strAdvsUpload; ?>1</td>
      <td > 
        <input type="file" name="pic" size="50" class="input" />
        <font color="#FF3300">* </font>         </td>
      </tr>
	  
	  <tr> 
      <td align="right"  width="90" height="26"><?php echo $strAdvsUpload; ?>2</td>
      <td > 
        <input type="file" name="pic2" size="50" class="input" />
        <font color="#FF3300">* </font>         </td>
      </tr>
	  <tr >
        <td  height="26" align="right">&nbsp;</td>
        <td  height="26"><?php
if($src!=""){
	$src=ROOTPATH.$src;
	echo ShowTypeImage($src,$type,$width,$height,$border);
}
?></td>
	    </tr>
   
    <tr > 
      <td width="90"  height="26" align="right">&nbsp;</td>
      <td  height="26"><?php
if($src2!=""){
	$src2=ROOTPATH.$src2;
	echo ShowTypeImage($src2,$type,$width,$height,$border);
}
?></td>
    </tr>
   

</table>
</div>
<div class="adminsubmit">
        <input type="submit" name="Submit" value="<?php echo $strSubmit; ?>" class="button" />
        <input type="button" name="Submit2" value="<?php echo $strBack; ?>" class="button" onClick="self.location='advs_duilian.php'" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input name="step" type="hidden" id="submit" value="<?php echo $nowstep; ?>" />

</div>

</div>
</form>
</body>
</html>

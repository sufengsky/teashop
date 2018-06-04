<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
include("func/upload.inc.php");
NeedAuth(96);

$step=$_REQUEST["step"];
$id=$_REQUEST["id"];
$groupid=$_REQUEST["groupid"];

if($step=="addgroup" && $_REQUEST["groupname"]!=""){
	$groupname=$_REQUEST["groupname"];
	$msql->query("insert into {P}_advs_linkgroup set
		`groupname`='$groupname',
		`xuhao`='1',
		`moveable`='1'
	");
	$groupid=$msql->instid();
	
	echo "<script>self.location='link.php?groupid=".$groupid."'</script>";

}

if($step=="delgroup" && $_REQUEST["groupid"]!="" && $_REQUEST["groupid"]!="0"){

	$msql->query("select * from {P}_advs_link where  groupid='".$_REQUEST["groupid"]."' ");
	while($msql->next_record()){
		$lbid=$msql->f('id');
		$oldsrc=$msql->f('src');
		if(file_exists(ROOTPATH.$oldsrc) && $oldsrc!=""){
			unlink(ROOTPATH.$oldsrc);
		}
		
	}
	$fsql->query("delete from {P}_advs_link where groupid='".$_REQUEST["groupid"]."' ");
	$msql->query ("delete from {P}_advs_linkgroup where id='".$_REQUEST["groupid"]."'");

	echo "<script>self.location='link.php'</script>";

}


if($groupid==""){
	$msql->query("select * from {P}_advs_linkgroup limit 0,1");
}else{
	$msql->query("select * from {P}_advs_linkgroup where id='$groupid'");
}
	if($msql->next_record()){
		$groupid=$msql->f('id');
		$moveable=$msql->f('moveable');
		if($moveable=="0"){
			$buttondis=" style='display:none' ";
		}
	}
	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>

 <SCRIPT>
function cm(nn){
qus=confirm("<?php echo $strGroupNTC2; ?>")
	if(qus!=0){
		window.location='link.php?step=delgroup&groupid='+nn;
	}
}

function checkform(theform){

  	if(theform.groupname.value.length < 1 || theform.groupname.value=='<?php echo $strGroupAddName; ?>'){
    	alert("<?php echo $strGroupAddName; ?>");
    	theform.groupname.focus();
    	return false;
	}  
	return true;

}  

function checkMainform(theform){

  	if(theform.name.value.length < 1){
    	alert("<?php echo $strLinkNTC2; ?>");
    	theform.name.focus();
    	return false;
	}  
	if(theform.url.value.length < 1 || theform.url.value=='http://'){
    	alert("<?php echo $strLinkNTC1; ?>");
    	theform.url.focus();
    	return false;
	}  
	return true;

}  


</SCRIPT>
</head>

<body>
<?php

$url=$_POST["url"];
$name=$_POST["name"];
$pic=$_FILES["suo"];
$xuhao=$_POST["xuhao"];

if($step=="add"){
	if($url=="" || $url=="http://"){
		err($strLinkNTC1,"","");

	}
	if($name==""){
		err($strLinkNTC2,"","");

	}


	$url=htmlspecialchars($url);
	$name=htmlspecialchars($name);

	if ($pic["size"] > 0)  {


		$nowdate=date("Ymd",time());
		$picpath=ROOTPATH."advs/pics/".$nowdate;
		@mkdir($picpath,0777);
		$uppath="advs/pics/".$nowdate;

		$arr=NewUploadImage($pic["tmp_name"],$pic["type"],$pic["size"],$uppath);
		$src=$arr[3];
		
	}


	$msql->query("insert into {P}_advs_link set
	groupid='$groupid',
	name='$name',
	url='$url',
	xuhao='0',
	src='$src',
	cl='0'
	");

	echo "<script>self.location='link.php?groupid=".$groupid."'</script>";


}




if($step=="modify"){
	if($url=="" || $url=="http://"){
		err($strLinkNTC1,"","");

	}

	if($name==""){
		err($strLinkNTC2,"","");

	}

	$url=htmlspecialchars($url);
	$name=htmlspecialchars($name);
	$msql->query("update {P}_advs_link set url='$url',name='$name',xuhao='$xuhao' where id='$id' ");
}


if($step=="del"){
	$msql->query("select src from {P}_advs_link where id='$id'");
	if($msql->next_record()){
		$oldsrc=$msql->f('src');
	}
	$fname=ROOTPATH.$oldsrc;
	if(file_exists($fname) && $oldsrc!=""){
		unlink($fname);
	}

	$msql->query("delete from {P}_advs_link where id='$id'");
}
?>
<div class="searchzone">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="30">
  <tr> 
   
                  
      <td  height="30">  <form method="get" action="link.php" >
	
        <select name="pp" onchange="self.location=this.options[this.selectedIndex].value" >
         
          <?php
				
			$msql->query("select * from {P}_advs_linkgroup");
			while($msql->next_record()){
				$lgroupid=$msql->f('id');
				$groupname=$msql->f('groupname');
					
				if($groupid==$lgroupid){
					echo "<option value='link.php?groupid=".$lgroupid."' selected>".$strGroupSel.$groupname."</option>";
				}else{
					echo "<option value='link.php?groupid=".$lgroupid."'>".$strGroupSel.$groupname."</option>";
				}
						
			}
					
				
		 ?>
        </select>
		 <input type="button" name="Submit" value="<?php echo $strGroupDel; ?>" class="button" <?php echo $buttondis; ?> onClick="cm('<?php echo $groupid; ?>')" /> 
       
      </form>           
      </td>

             
     <td align="right" > 
	 <form name="addform" method="get" action="link.php" onSubmit="return checkform(this)" >
        <input type="hidden" name="step" value="addgroup" />
        <input name="groupname" type="text" class="input" value="<?php echo $strGroupAddName; ?>" size="26" onFocus="this.value=''" />
        <input type="Submit" name="Submit" value="<?php echo $strGroupAdd; ?>" class="button" />
      </form>
	</td> 
  </tr>
</table>
</div>
<div class="formzone">
<div class="namezone"><?php echo $strLinkAdd; ?></div>
<form method="post" action="link.php" enctype="multipart/form-data" onSubmit="return checkMainform(this)" >
<div class="tablezone">
<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" height="22">
   
      <tr> 

        <td  height="26" width="80"><?php echo $strLinkName; ?> 
        </td>
        <td  height="24" width="230"><input type="text" name="name" size="26" class="input" />
          <span style="color:#ff0000">*</span> </td>
        <td  height="24" width="80"><?php echo $strLinkUrl; ?></td>
        <td  height="24"><input type="text" name="url" value="http://" size="25" class="input" />
          <span style="color:#ff0000">*</span> </td>
      </tr>
      <tr> 
        <td  height="26" width="80"><?php echo $strLinkPicUp; ?></td>
        <td  height="24" valign="top"><input type="file" name="suo" size="20" class="input" />        </td>
        <td  height="24" colspan="2" valign="top"><input type="submit" name="Submit" value="<?php echo $strAdd; ?>"  class="button" />
          <input type="hidden" name="step" value="add" />
          <input type="hidden" name="groupid" value="<?php echo $groupid; ?>" /></td>
        </tr>
    
  </table>

</div>
</form>

<div class="namezone"><?php echo $strLinkSys; ?></div>
<div class="tablezone">
<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
    <tr > 
      <td width="54" height="24"   class="innerbiaoti"> <?php echo $strXuhao; ?></td>
      <td width="150" class="innerbiaoti"><?php echo $strLinkName; ?></td>
      <td height="24" class="innerbiaoti"> <?php echo $strLinkUrl; ?></td>
      <td height="24"  class="innerbiaoti"> <?php echo $strLinkPic; ?></td>
      <td height="24"  class="innerbiaoti" width="60"> <?php echo $strModify; ?></td>
      <td  class="innerbiaoti" height="24" width="60"> <?php echo $strDelete; ?></td>
    </tr>
    <?php 


$msql->query("select * from {P}_advs_link where groupid='$groupid' order by xuhao asc,id desc");


while($msql->next_record()){
$id=$msql->f('id');
$name=$msql->f('name');
$url=$msql->f('url');
$xuhao=$msql->f('xuhao');
$src=$msql->f('src');
$type=$msql->f('type');

?> 
    <form action="link.php" method="post">
      <tr class="list"> 
        <td height="45"   width="54"> 
          
            <input type="text" name="xuhao" size="2" value="<?php echo $xuhao; ?>" class="input">
         
        </td>
        <td width="150"><input type="text" name="name" size="16" value="<?php echo $name; ?>" maxlength="200" class="input" />
        </td>
        <td  height="45"> 
          
            <input type="text" name="url" size="30" value="<?php echo $url; ?>" maxlength="200" class="input">
          
        </td>
        <td height="45"> <?php 
if($src!=""){
$src=ROOTPATH.$src;
echo ShowTypeImage($src,$type,"88","31",0);

}else{
echo " ";
}
?></td>
        <td height="45"  width="60"> 
          <div align="center"> 
            <input type="hidden" name="step" value="modify">
            <input type="hidden" name="groupid" value="<?php echo $groupid; ?>" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="submit" name="cc" value="<?php echo $strModify; ?>" class="button" />
          </div>
        </td>
        <td width="60" height="45"> 
          <div align="center"> 
            <input type="button" name="cc" value="<?php echo $strDelete; ?>" onClick="self.location='link.php?step=del&groupid=<?php echo $groupid; ?>&id=<?php echo $id; ?>'"  class="button">
          </div>
        </td>
      </tr>
    </form>
    <?php
}
?> 
</table>
</div>
</div>
</body>
</html>

<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
include("func/upload.inc.php");

NeedAuth(95);

$groupid=$_REQUEST["groupid"];
$step=$_REQUEST["step"];
if($step=="addgroup" && $_REQUEST["groupname"]!=""){
	$groupname=$_REQUEST["groupname"];
	$msql->query("insert into {P}_advs_lbgroup set
		`groupname`='$groupname',
		`xuhao`='1',
		`moveable`='1'
	");
	$groupid=$msql->instid();
	
	echo "<script>self.location='advs_lb.php?groupid=".$groupid."'</script>";

}

if($step=="delgroup" && $_REQUEST["groupid"]!="" && $_REQUEST["groupid"]!="0"){

	$msql->query("select * from {P}_advs_lb where  groupid='".$_REQUEST["groupid"]."' ");
	while($msql->next_record()){
		$lbid=$msql->f('id');
		$oldsrc=$msql->f('src');
		$oldsrc1=$msql->f('src1');
		if(file_exists(ROOTPATH.$oldsrc) && $oldsrc!=""){
			unlink(ROOTPATH.$oldsrc);
		}
		if(file_exists(ROOTPATH.$oldsrc1) && $oldsrc1!=""){
			unlink(ROOTPATH.$oldsrc1);
		}
		
	}
	$fsql->query("delete from {P}_advs_lb where groupid='".$_REQUEST["groupid"]."' ");
	$msql->query ("delete from {P}_advs_lbgroup where id='".$_REQUEST["groupid"]."'");

	echo "<script>self.location='advs_lb.php'</script>";

}


if($groupid==""){
	$msql->query("select * from {P}_advs_lbgroup limit 0,1");
}else{
	$msql->query("select * from {P}_advs_lbgroup where id='$groupid'");
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
<script>

function cm(nn){
qus=confirm("<?php echo $strAdvsLbNTC2; ?>")
	if(qus!=0){
		window.location='advs_lb.php?step=delgroup&groupid='+nn;
	}
}

function checkform(theform){

  if(theform.groupname.value.length < 1 || theform.groupname.value=='<?php echo $strAdvsGroupAddName; ?>'){
    alert("<?php echo $strAdvsGroupAddName; ?>");
    theform.groupname.focus();
    return false;
}  
	return true;

}  

</script>
</head>

<body>

<?php
$id=$_REQUEST["id"];


if($step=="del"){
	$msql->query("select * from {P}_advs_lb where  id='$id'");
	if($msql->next_record()){
		$oldsrc=$msql->f('src');
		$oldsrc1=$msql->f('src1');
	}
	if(file_exists(ROOTPATH.$oldsrc) && $oldsrc!=""){
		unlink(ROOTPATH.$oldsrc);
	}
	if(file_exists(ROOTPATH.$oldsrc1) && $oldsrc1!=""){
		unlink(ROOTPATH.$oldsrc1);
	}
	$msql->query("delete from {P}_advs_lb where id='$id'");
}

if($step=="modify"){

	$title=$_POST["title"];
	$pic=$_FILES["jpg"];
	$spic=$_FILES["suo"];
	$url=$_POST["url"];
	$xuhao=$_POST["xuhao"];

	$msql->query("update {P}_advs_lb set title='$title',url='$url',xuhao='$xuhao' where id='$id'");

	if($pic["size"]>0){
		
		$nowdate=date("Ymd",time());
		$picpath="../pics/".$nowdate;
		@mkdir($picpath,0777);
		$uppath="advs/pics/".$nowdate;

		$arr=NewUploadImage($pic["tmp_name"],$pic["type"],$pic["size"],$uppath);
		$src=$arr[3];

		$msql->query("select * from {P}_advs_lb where  id='$id'");
		if($msql->next_record()){
			$oldsrc=$msql->f('src');
		}
		if(file_exists(ROOTPATH.$oldsrc) && $oldsrc!=""){
			unlink(ROOTPATH.$oldsrc);
		}
		$msql->query("update {P}_advs_lb set src='$src' where id='$id'");

	}
	
	if($spic["size"]>0){
		
		$nowdate=date("Ymd",time());
		$picpath="../pics/".$nowdate;
		@mkdir($picpath,0777);
		$uppath="advs/pics/".$nowdate;

		$arr=NewUploadImage1($spic["tmp_name"],$spic["type"],$spic["size"],$uppath);
		$src1=$arr[3];

		$msql->query("select * from {P}_advs_lb where  id='$id'");
		if($msql->next_record()){
			$oldsrc1=$msql->f('src1');
		}
		if(file_exists(ROOTPATH.$oldsrc1) && $oldsrc1!=""){
			unlink(ROOTPATH.$oldsrc1);
		}
		$msql->query("update {P}_advs_lb set src1='$src1' where id='$id'");

	}
	
}

if($step=="new"){
	
	$msql->query("insert into {P}_advs_lb set 
	groupid='$groupid',
	title='$strAdvsLbTitle',
	src='',
	url='http://',
	xuhao='1'
	");

}

?>
<div class="searchzone">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="30">
  <tr> 
   
                  
      <td  height="30">  <form method="get" action="advs_lb.php" >
	
        <select name="pp" onchange="self.location=this.options[this.selectedIndex].value" >
         
          <?php
				
			$msql->query("select * from {P}_advs_lbgroup");
			while($msql->next_record()){
				$lgroupid=$msql->f('id');
				$groupname=$msql->f('groupname');
					
				if($groupid==$lgroupid){
					echo "<option value='advs_lb.php?groupid=".$lgroupid."' selected>".$strAdvsGroupSel.$groupname."</option>";
				}else{
					echo "<option value='advs_lb.php?groupid=".$lgroupid."'>".$strAdvsGroupSel.$groupname."</option>";
				}
						
			}
					
				
		 ?>
        </select>
         
		 <input type="button" name="Submit" value="<?php echo $strAdvsGroupDel; ?>" class="button" <?php echo $buttondis; ?> onClick="cm('<?php echo $groupid; ?>')" /> 
       
      </form>           
      </td>

             
     <td align="right" > <form name="addform" method="get" action="advs_lb.php" onSubmit="return checkform(this)">
        <input type="hidden" name="step" value="addgroup" />
        <input name="groupname" type="text" class="input" value="<?php echo $strAdvsGroupAddName; ?>" size="26" onFocus="this.value=''" />
        <input type="Submit" name="Submit" value="<?php echo $strAdvsGroupAdd; ?>" class="button" />
      </form>
	</td> 
  </tr>
</table>
</div>
<div class="formzone"> 
<div class="addsub"> 
<a  onClick="self.location='advs_lb.php?step=new&groupid=<?php echo $groupid; ?>'" ><?php echo $strAdvsLbNew; ?></a>
</div>
<?php
$msql->query("select * from {P}_advs_lb where groupid='$groupid' order by xuhao");
while($msql->next_record()){
$id=$msql->f('id');
$title=$msql->f('title');
$src=$msql->f('src');
$src1=$msql->f('src1');
$url=$msql->f('url');
$xuhao=$msql->f('xuhao');

?>
<div class="tablezone">
<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" >
   <form action="advs_lb.php" method="post" enctype="multipart/form-data"> <tr> 
      <td width="100" align="right"><?php echo $strAdvsLbTitle; ?></td>
      <td> 
        <input type="text" name="title" size="60"  class=input value="<?php echo $title; ?>">
      </td>
    </tr>
     <tr>
       <td align="right"><?php echo $strAdvsLbPic; ?></td>
       <td><input name="jpg" type="file" id="jpg">
       <?php
if($src==""){
echo "<img src=images/noimage.gif >";
}else{
echo "<img src=images/image.gif onClick=\"StDv".$id.".style.display='block'\">";
}
?> <div id="StDv<?php echo $id; ?>" style="position:absolute; width:100px; height:100px; z-index:1; display: none"> 
          <table width="100%" border="0" cellspacing="1" cellpadding="1" height="100%" bgcolor="#666666" >
            <tr align="right" bgcolor="#CCCCCC"> 
              <td  height="10" valign="top"><img src="images/closewindow.gif" width="12" height="12"  onClick="StDv<?php echo $id; ?>.style.display='none'"></td>
            </tr>
            <tr bgcolor="#FFFFFF" align="center"> 
              <td  onClick="StDv<?php echo $id; ?>.style.display='none'"><?php
if($src==""){
echo "";
}else{
$showsrc=ROOTPATH.$src;
echo ShowTypeImage($showsrc,$type,"","",0);
}
?> </td>
            </tr>
          </table>
</div>
       <br>
       <span class="style1"><?php echo $strAdvsLbNTC; ?> </span></td>
     </tr>
     <tr>
       <td align="right"><?php echo $strAdvsLbPic1; ?></td>
       <td><input name="suo" type="file" id="suo" />
           <?php
if($src1==""){
echo "<img src=images/noimage.gif >";
}else{
echo "<img src=images/image.gif onClick=\"SsDv".$id.".style.display='block'\">";
}
?>
           <div id="SsDv<?php echo $id; ?>" style="position:absolute; width:100px; height:100px; z-index:1; display: none">
             <table width="100%" border="0" cellspacing="1" cellpadding="1" height="100%" bgcolor="#666666" >
               <tr align="right" bgcolor="#CCCCCC">
                 <td  height="10" valign="top"><img src="images/closewindow.gif" width="12" height="12"  onclick="SsDv<?php echo $id; ?>.style.display='none'" /></td>
               </tr>
               <tr bgcolor="#FFFFFF" align="center">
                 <td  onclick="SsDv<?php echo $id; ?>.style.display='none'"><?php
if($src1==""){
echo "";
}else{
$showsrc1=ROOTPATH.$src1;
echo ShowTypeImage($showsrc1,$type,"","",0);
}
?>
                 </td>
               </tr>
             </table>
           </div>
           <br />
           <span class="style1"><?php echo $strAdvsLbNTC3; ?> </span></td>
     </tr>
     <tr>
       <td align="right"><?php echo $strAdvsLbUrl; ?></td>
       <td><input name="url" type="text"  class="input" id="url" value="<?php echo $url; ?>" size="60">
       </td>
     </tr>
     <tr>
       <td align="right"><?php echo $strAdvsLbXuhao; ?></td>
       <td><input name="xuhao" type="text"  class="input" id="xuhao" value="<?php echo $xuhao; ?>" size="5"></td>
     </tr>
    <tr> 
      <td width="100" align="right">&nbsp;</td>
      <td> 
        <input type="submit" name="Submit" value="<?php echo $strModify; ?>" class="button">
        <input type="button" name="Submit2" value="<?php echo $strDelete; ?>" class="button" onClick="window.location='advs_lb.php?step=del&groupid=<?php echo $groupid; ?>&id=<?php echo $id; ?>'">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="groupid" value="<?php echo $groupid; ?>" />
        <input type="hidden" name="step" value="modify">
      </td>
    </tr></form>
  </table>
</div>
<?php
}
?> 

</div>
</body>
</html>

<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
include("func/upload.inc.php");
NeedAuth(83);

$gid=$_REQUEST["photogroup"];
$pid=$_REQUEST["pid"];
if(!isset($pid) || $pid==""){
	$pid=0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
<script type="text/javascript" src="../../base/js/base.js"></script>
<script type="text/javascript" src="../../base/js/form.js"></script>
<script type="text/javascript" src="../../base/js/blockui.js"></script>
<script type="text/javascript" src="js/photo.js"></script>

<style type="text/css">
<!--
.style1 {color: #FF0033}
-->
</style>
</head>
<body >

<form id="photopollAddForm" name="form" action="" method="post" enctype="multipart/form-data">

<div class="formzone">

<div class="namezone">
<?php echo $strVoteInfo29; ?>
</div>
<div class="tablezone">
<div  id="notice" class="noticediv"></div>

<table width="100%"   border="0" align="center"  cellpadding="2" cellspacing="0" >
    <tr> 
      <td height="30" width="100" align="center" ><?php echo $strVoteInfo19; ?></td>
      <td height="30" > 
        <select id="selcatid" name="gid" >
          <?php		

				$fsql -> query ("select * from {P}_tools_photopollindex order by id");
				while ($fsql -> next_record ()) {
					$lgid = $fsql -> f ("id");
					$lcat = $fsql -> f ("groupname");
					$lgroupname = $fsql -> f ("groupname");
						
					if($lgid==$gid){
						echo "<option value='".$lgid."' selected>".$lcat."</option>";
					}else{
						echo "<option value='".$lgid."'>".$lcat."</option>";
					}
				}

		  ?> 
        </select>        </td>
    </tr>
	 <tr> 
      <td height="30" width="100" align="center" ><?php echo $strVoteInfo18; ?></td>
      <td height="30" > 
        <input type="text" name="title" style='WIDTH: 499px;font-size:12px;' maxlength="200" class="input" />
        <span class="style1">* </span> </td>
    </tr>
	
	 <tr> 
      <td height="30" width="100" align="center" ><?php echo $strVoteInfo30; ?></td>
      <td height="30" > 
        <input type="file" name="jpg" class="input" style="WIDTH: 499px;" />
        <span class="style1">        *
        </span> </td>
    </tr>
   
	</table>
	
	<table width="100%"   border="0" align="center"  cellpadding="2" cellspacing="0" >
    <tr>
      <td width="100" height="30" align="center" ><?php echo $strVoteInfo31; ?></td>
      <td height="30" ><textarea name="body" style="WIDTH: 499px;font-size:12px;" class="textarea" rows="8"></textarea>
      </td>
    </tr>
    
</table>
</div>
<div class="adminsubmit">
<input type="submit" name="cc"  value="<?php echo $strSubmit; ?>" class="button" />
<input type="hidden" name="act" value="photopollconadd">
<input type="hidden" name="author"  value="<?php echo $_COOKIE['SYSNAME']; ?>" />
</div>

</div>
</form>
</body>
</html>

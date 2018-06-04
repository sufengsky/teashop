<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(83);
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

</head>

<body >
    
<?php

$id=$_REQUEST["id"];
$gid=$_REQUEST["gid"];

$msql->query("select * from {P}_tools_photopolldata where  id='$id'");
if($msql->next_record()){
	$id=$msql->f('id');
	$poll_id=$msql->f('poll_id');
	$title=$msql->f('title');
	$body=$msql->f('body');
	$tj=$msql->f('tj');
	$iffb=$msql->f('iffb');
	$src=$msql->f('src');
	$type=$msql->f('type');
	$author=$msql->f('author');
	$secure=$msql->f('secure');

	$dtime=date("Y-m-d H:i:s",$msql->f('dtime'));
	$uptime=date("Y-m-d H:i:s",$msql->f('uptime'));

}

?> 

<form id="PhotoPollForm" name="form" action="" method="post" enctype="multipart/form-data">
<div class="formzone">
<div class="namezone">
<?php echo $strVoteInfo32; ?>
</div>
<div class="tablezone">
<div  id="notice" class="noticediv"></div>
      <table class="photomodizone" width="100%" cellpadding="2" align="center"  border="0" cellspacing="0">
         
		  <tr> 
            <td height="30" width="100" align="center" ><?php echo $strVoteInfo19; ?></td>
            <td height="30" > 
              <select id="selcatid" name="gid" >
                <?php		

				//非公共区域
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
              </select>
            </td>
          </tr>
		   <tr> 
            <td height="30" width="100" align="center" ><?php echo $strVoteInfo18; ?></td>
            <td height="30" > 
              <input type="text" id="title" name="title" style='WIDTH: 499px;' maxlength="200" class="input" value="<?php echo $title; ?>" />
              <font color="#FF0000">*</font> </td>
          </tr>
      </table>
	  
	  
		   <table width="100%"   border="0" align="center"  cellpadding="2" cellspacing="0" >

  			
		  <tr> 
            <td height="30" width="100" align="center" ><?php echo $strVoteInfo30; ?></td>
            <td height="30" > 
              <input id="uppic" type="file" name="jpg" class="input" style='WIDTH: 499px;' />
			  <font color="#FF0000">*</font> 
			  <!--<input  type='submit' name='modi'  value='<?php //echo $strPhotoUpload; ?>' class='savebutton' />-->
		    </td>
          </tr>
		  <!----------------------------添加多张图片------------------------------------->
		   <!--
		   <tr>
		     <td height="30" align="center" >&nbsp;</td>
		     <td height="30" ><div id="photopages"></div></td>
           </tr>
		   <tr>
		     <td align="center" ></td>
		     <td ><img id="picpriview" src="images/loading.gif" /></td>
		   </tr>
		   -->
		  <!----------------------------添加多张图片结束------------------------------------->
      </table>
	  
		 
         <table class="photomodizone" width="100%"   border="0" align="center"  cellpadding="2" cellspacing="0" >
		 <tr>
            <td width="100" height="30" align="center" ><?php echo $strVoteInfo31; ?></td>
            <td height="30" ><textarea name="body" style="WIDTH: 499px;" class="textarea" rows="8"><?php echo $body; ?></textarea>            </td>
          </tr>
          <tr> 
            <td height="30" width="100" align="center" ><?php echo $strFbtime; ?></td>
            <td height="30" ><?php echo $dtime; ?></td>
          </tr>
          <tr> 
            <td height="30" width="100" align="center" ><?php echo $strUptime; ?></td>
            <td height="30" ><?php echo $uptime; ?> </td>
          </tr>
      </table>
	 
</div>  
<div class="adminsubmit">
<input id="adminsubmit" type="submit" name="modi" value="<?php echo $strVoteSave; ?>" class="button" />
<input type="hidden" id="act" name="act" value="photopollmodify" />
<input type="hidden" id="nowid" name="id" value="<?php echo $id; ?>" />
<input type="hidden" name="page" value="<?php echo $page; ?>" />
<input type="hidden" name="author"  value="<?php echo $author; ?>" />
</div> 
</div>
</form>
</body>
</html>

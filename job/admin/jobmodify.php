<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(222);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
</head>
<script type="text/javascript" src="../../base/js/base.js"></script>
<script type="text/javascript" src="js/job.js"></script>
<body >
<?php 

$step=$_REQUEST["step"];
$id=$_REQUEST["id"];


if($step=="modify"){
	$jobname=htmlspecialchars($_POST["jobname"]);
	$jobtype=htmlspecialchars($_POST["jobtype"]);
	$experience=htmlspecialchars($_POST["experience"]);
	$education=htmlspecialchars($_POST["education"]);
	$langneed=htmlspecialchars($_POST["langneed"]);
	$langlevel=htmlspecialchars($_POST["langlevel"]);
	$pnums=htmlspecialchars($_POST["pnums"]);
	$jobaddr=htmlspecialchars($_POST["jobaddr"]);
	$jobintro=htmlspecialchars($_POST["jobintro"]);
	$jobrequest=htmlspecialchars($_POST["jobrequest"]);
	$jobstat=htmlspecialchars($_POST["jobstat"]);
	$contact=htmlspecialchars($_POST["contact"]);
	$tel=htmlspecialchars($_POST["tel"]);
	$email=htmlspecialchars($_POST["email"]);
	$uptime=time();
	
		
	//校验处理

	if($jobname==""){
		err($strJobNotice2,"","");
	}
	if(strlen($jobname)>200){
		err($strJobNotice3,"","");
	}

	if(strlen($jobintro)>65000){
		err($strJobNotice5,"","");
	}
	if(strlen($jobrequest)>65000){
		err($strJobNotice6,"","");
	}
	
	//插入数据
	$msql->query("update {P}_job set 
	jobname='$jobname',
	jobtype='$jobtype',
	experience='$experience',
	education='$education',
	langneed='$langneed',
	langlevel='$langlevel',
	pnums='$pnums',
	jobaddr='$jobaddr',
	jobintro='$jobintro',
	jobrequest='$jobrequest',
	jobstat='$jobstat',
	contact='$contact',
	tel='$tel',
	email='$email',
	uptime='$uptime' where id='$id'");


	SayOk($strJobNotice8,"job.php","");
}


?> 
<?php
	$msql -> query ("select * from {P}_job where id='$id' limit 0,1");
	if ($msql -> next_record ()) {
		$jobname = $msql -> f ('jobname');
		$jobtype = $msql -> f ('jobtype');
		$experience = $msql -> f ('experience');
		$education = $msql -> f ('education');
		$langneed = $msql -> f ('langneed');
		$langlevel = $msql -> f ('langlevel');
		$pnums = $msql -> f ('pnums');
		$jobaddr = $msql -> f ('jobaddr');
		$jobintro = $msql -> f ('jobintro');
		$jobrequest = $msql -> f ('jobrequest');
		$jobstat = $msql -> f ('jobstat');
		$contact = $msql -> f ('contact');
		$tel = $msql -> f ('tel');
		$email = $msql -> f ('email');
		$dtime = $msql -> f ('dtime');
		$iffb = $msql -> f ('iffb');
	}	
?>

<form action="jobmodify.php" method="post" enctype="multipart/form-data" name="form" id="addJobForm">
<div class="formzone">
<div class="namezone">
<?php echo $strSetMenu2; ?>
</div>
<div class="tablezone">
  

      <table width="100%" cellpadding="2" align="center"  border="0" cellspacing="0">
        <tr>
          <td width="100" height="30" align="center" ><?php echo $strJobF1; ?></td>
          <td height="30" ><input name="jobname" type="text" class="input" id="jobname" value="<?php echo $jobname; ?>" size="30"   maxlength="200" />
          <font color="#FF0000">*</font> </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF2; ?></td>
          <td height="30" ><input name="jobtype" type="radio" value="<?php echo $strJobF2_1; ?>" <?php echo checked($jobtype,$strJobF2_1); ?> />
            <?php echo $strJobF2_1; ?>          <input type="radio" name="jobtype" value="<?php echo $strJobF2_2; ?>" <?php echo checked($jobtype,$strJobF2_2); ?> />
          <?php echo $strJobF2_2; ?>          <input type="radio" name="jobtype" value="<?php echo $strJobF2_3; ?>" <?php echo checked($jobtype,$strJobF2_3); ?> />
          <?php echo $strJobF2_3; ?></td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF3; ?></td>
          <td height="30" >
		  <select name="experience" id="experience">
            <option value="<?php echo $strJobF3_1; ?>" <?php echo seld($experience,$strJobF3_1); ?>><?php echo $strJobF3_1; ?></option>
			<option value="<?php echo $strJobF3_2; ?>"  <?php echo seld($experience,$strJobF3_2); ?>><?php echo $strJobF3_2; ?></option>
			<option value="<?php echo $strJobF3_3; ?>"  <?php echo seld($experience,$strJobF3_3); ?>><?php echo $strJobF3_3; ?></option>
			<option value="<?php echo $strJobF3_4; ?>"  <?php echo seld($experience,$strJobF3_4); ?>><?php echo $strJobF3_4; ?></option>
			<option value="<?php echo $strJobF3_5; ?>"  <?php echo seld($experience,$strJobF3_5); ?>><?php echo $strJobF3_5; ?></option>
			<option value="<?php echo $strJobF3_6; ?>"  <?php echo seld($experience,$strJobF3_6); ?>><?php echo $strJobF3_6; ?></option>
			<option value="<?php echo $strJobF3_7; ?>"  <?php echo seld($experience,$strJobF3_7); ?>><?php echo $strJobF3_7; ?></option>
			<option value="<?php echo $strJobF3_8; ?>"  <?php echo seld($experience,$strJobF3_8); ?>><?php echo $strJobF3_8; ?></option>
			<option value="<?php echo $strJobF3_9; ?>"  <?php echo seld($experience,$strJobF3_9); ?>><?php echo $strJobF3_9; ?></option>
			<option value="<?php echo $strJobF3_10; ?>"  <?php echo seld($experience,$strJobF3_10); ?>><?php echo $strJobF3_10; ?></option>
			<option value="<?php echo $strJobF3_11; ?>"  <?php echo seld($experience,$strJobF3_11); ?>><?php echo $strJobF3_11; ?></option>
			<option value="<?php echo $strJobF3_12; ?>"  <?php echo seld($experience,$strJobF3_12); ?>><?php echo $strJobF3_12; ?></option>
          </select></td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF4; ?></td>
          <td height="30" ><select name="education" id="education">
            <option value="<?php echo $strJobF4_1; ?>" <?php echo seld($education,$strJobF4_1); ?>><?php echo $strJobF4_1; ?></option>
            <option value="<?php echo $strJobF4_2; ?>" <?php echo seld($education,$strJobF4_2); ?>><?php echo $strJobF4_2; ?></option>
            <option value="<?php echo $strJobF4_3; ?>" <?php echo seld($education,$strJobF4_3); ?>><?php echo $strJobF4_3; ?></option>
            <option value="<?php echo $strJobF4_4; ?>" <?php echo seld($education,$strJobF4_4); ?>><?php echo $strJobF4_4; ?></option>
            <option value="<?php echo $strJobF4_5; ?>" <?php echo seld($education,$strJobF4_5); ?>><?php echo $strJobF4_5; ?></option>
            <option value="<?php echo $strJobF4_6; ?>" <?php echo seld($education,$strJobF4_6); ?>><?php echo $strJobF4_6; ?></option>
            <option value="<?php echo $strJobF4_7; ?>" <?php echo seld($education,$strJobF4_7); ?>><?php echo $strJobF4_7; ?></option>
            <option value="<?php echo $strJobF4_8; ?>" <?php echo seld($education,$strJobF4_8); ?>><?php echo $strJobF4_8; ?></option>
            <option value="<?php echo $strJobF4_9; ?>" <?php echo seld($education,$strJobF4_9); ?>><?php echo $strJobF4_9; ?></option>
          </select></td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF7; ?></td>
          <td height="30" ><input name="pnums" type="text" class="input" id="pnums" value="<?php echo $pnums; ?>" size="3"   maxlength="200" />
          <font color="#FF0000">*</font>  </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF8; ?></td>
          <td height="30" ><input name="jobaddr" type="text" class="input" id="jobaddr" value="<?php echo $jobaddr; ?>" size="30"   maxlength="200" />
          <font color="#FF0000">*</font> </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF9; ?></td>
          <td height="30" ><textarea name="jobintro" rows="8" class="textarea" id="jobintro" style="width:500px"><?php echo $jobintro; ?></textarea>
            <font color="#FF0000">*</font> </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF14; ?></td>
          <td height="30" ><textarea name="jobrequest" rows="8" class="textarea" id="jobrequest" style="width:500px"><?php echo $jobrequest; ?></textarea>
              <font color="#FF0000">*</font> </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF10; ?></td>
          <td height="30" ><input name="contact" type="text" class="input" id="contact" value="<?php echo $contact; ?>" size="30"   maxlength="200" />              </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF11; ?></td>
          <td height="30" ><input name="tel" type="text" class="input" id="tel" value="<?php echo $tel; ?>" size="50"   maxlength="200" />              </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF12; ?></td>
          <td height="30" ><input name="email" type="text" class="input" id="email" value="<?php echo $email; ?>" size="50"   maxlength="200" />              </td>
        </tr>
        <tr>
          <td height="30" align="center" ><?php echo $strJobF13; ?></td>
          <td height="30" ><select name="jobstat" id="jobstat">
              <option value="1"  <?php echo seld($jobstat,'1'); ?>><?php echo $strJobF13_1; ?></option>
			    <option value="0" <?php echo seld($jobstat,'0'); ?>><?php echo $strJobF13_2; ?></option>
             
          </select></td>
        </tr>
          
          
        
      </table>
	 
</div>  
<div class="adminsubmit">
<input type="submit" name="submit"  value="<?php echo $strSubmit; ?>" class="button" />
<input type="hidden" name="step" value="modify" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />
</div> 
</div>
</form>
</body>
</html>

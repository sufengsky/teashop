<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(95);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
 
<script>
function checkform(theform){
  if(theform.title.value.length < 1)
  {
    alert("<?php echo $strAdvsPopNotice1; ?>")
    theform.title.focus()
    return false
  }  

  return true
}  
</script>
</head>

<body>
<?php

$step=$_REQUEST["step"];

if($step=="mod"){

	$id=$_POST["id"];
	$title=$_POST["title"];
	$body=$_POST["body"];
	$ifpop=$_POST["ifpop"];
	$popwidth=$_POST["popwidth"];
	$popheight=$_POST["popheight"];
	$popleft=$_POST["popleft"];
	$poptop=$_POST["poptop"];
	$poptoolbar=$_POST["poptoolbar"];
	$popmenubar=$_POST["popmenubar"];
	$popstatus=$_POST["popstatus"];
	$poplocation=$_POST["poplocation"];
	$popscrollbars=$_POST["popscrollbars"];
	$popresizable=$_POST["popresizable"];


	if($title==""){
	err($strAdvsPopNotice1,"","");
	}
	if(strlen($body)>65000){
	err($strAdvsPopNotice2,"","");
	}

	$title=htmlspecialchars($title);
	$body=Url2Path($body);

	$fsql->query("update {P}_advs_pop set 
	title='$title',
	body='$body',
	ifpop='$ifpop',
	popwidth='$popwidth',
	popheight='$popheight',
	popleft='$popleft',
	poptop='$poptop',
	poptoolbar='$poptoolbar',
	popmenubar='$popmenubar',
	popstatus='$popstatus',
	poplocation='$poplocation',
	popscrollbars='$popscrollbars',
	popresizable='$popresizable'
	where id='$id'

	");

	
	Sayok($strAdvsPopNotice3,"advs_pop.php","");
}

?> <?php 
$msql->query("select * from {P}_advs_pop limit 0,1");
if($msql->next_record()){
		$id=$msql->f('id');
		$ifpop=$msql->f('ifpop');
		$title=$msql->f('title');
		$body=$msql->f('body');
		$popwidth=$msql->f('popwidth');
		$popheight=$msql->f('popheight');
		$popleft=$msql->f('popleft');
		$poptop=$msql->f('poptop');
		$poptoolbar=$msql->f('poptoolbar');
		$popmenubar=$msql->f('popmenubar');
		$popstatus=$msql->f('popstatus');
		$poplocation=$msql->f('poplocation');
		$popscrollbars=$msql->f('popscrollbars');
		$popresizable=$msql->f('popresizable');

		$body=htmlspecialchars($body);
		$body=Path2Url($body);

}
?>
<form name="form" action="advs_pop.php" method="post" enctype="multipart/form-data" onSubmit="return checkform(this)">
<div class="formzone">
<div class="namezone"><?php echo $strAdvsPop; ?></div>
<div class="tablezone">

      
     
                    <table width="100%" cellpadding="5" align="center"  style="border-collapse: collapse" border="0" cellspacing="0">
                     
                     
                      <tr> 
                        <td height="30" width="120" align="center" ><span class="title"><?php echo $strAdvsPopIfpop; ?></span></td>
                        <td height="30"  width="180"><select name="ifpop">
                          <option value="0" <?php echo seld($ifpop,'0'); ?>><?php echo $strHidden; ?></option>
                          <option value="1" <?php echo seld($ifpop,'1'); ?>><?php echo $strShow; ?></option>
                        </select></td>
                        <td height="30" width="120" class=title align="center"><?php echo $strAdvsPopName; ?></td>
                        <td height="30" ><input type="text" class="input" name="title" size="30" value="<?php echo $title; ?>" /> 
                        </td>
                      </tr>
                      <tr> 
                        <td height="30" width="120" align="center" ><?php echo $strAdvsPopWidth; ?></td>
                        <td height="30"  width="180"> 
                          <input type="text" class="input" name="popwidth" size="5" value="<?php echo "$popwidth"; ?>">
                          PX </td>
                        <td height="30" width="120" class=title align="center"><?php echo $strAdvsPopHeight; ?></td>
                        <td height="30" > 
                          <input type="text" class="input" name="popheight" size="5" value="<?php echo "$popheight"; ?>">
                        PX </td>
                      </tr>
                      <tr> 
                        <td height="30" width="120" align="center" ><?php echo $strAdvsPopLeft; ?></td>
                        <td height="30"  width="180"> 
                          <input type="text" class="input" name="popleft" size="5" value="<?php echo "$popleft"; ?>">
                          PX </td>
                        <td height="30" width="120" class=title align="center"><?php echo $strAdvsPopTop; ?></td>
                        <td height="30" > 
                          <input type="text" name="poptop" class="input" size="5" value="<?php echo "$poptop"; ?>">
                        PX </td>
                      </tr>
                      <tr> 
                        <td height="30" width="120" align="center" ><?php echo $strAdvsPopToolBar; ?></td>
                        <td height="30"  width="180"> 
                          <select name="poptoolbar">
                            <option value="1" <?php echo seld($poptoolbar,'1'); ?>><?php echo $strShow; ?></option>
                            <option value="0" <?php echo seld($poptoolbar,'0'); ?>><?php echo $strHidden; ?></option>
                          </select>
                        </td>
                        <td height="30" width="120" class=title align="center"><?php echo $strAdvsPopMenuBar; ?></td>
                        <td height="30" > 
                          <select name="popmenubar">
                            <option value="1" <?php echo seld($popmenubar,'1'); ?>><?php echo $strShow; ?></option>
                            <option value="0" <?php echo seld($popmenubar,'0'); ?>><?php echo $strHidden; ?></option>
                          </select>
                        </td>
                      </tr>
                      <tr> 
                        <td height="30" width="120" align="center" ><?php echo $strAdvsPopLocatBar; ?></td>
                        <td height="30"  width="180"> 
                          <select name="poplocation">
                            <option value="1" <?php echo seld($poplocation,'1'); ?>><?php echo $strShow; ?></option>
                            <option value="0" <?php echo seld($poplocation,'0'); ?>><?php echo $strHidden; ?></option>
                          </select>
                        </td>
                        <td height="30" width="120" class=title align="center"><?php echo $strAdvsPopStautsBar; ?></td>
                        <td height="30" > 
                          <select name="popstatus">
                            <option value="1" <?php echo seld($popstatus,'1'); ?>><?php echo $strShow; ?></option>
                            <option value="0" <?php echo seld($popstatus,'0'); ?>><?php echo $strHidden; ?></option>
                          </select>
                        </td>
                      </tr>
                      <tr> 
                        <td height="30" width="120" align="center" ><?php echo $strAdvsPopReSize; ?></td>
                        <td height="30"  width="180"> 
                          <select name="popresizable">
                            <option value="1" <?php echo seld($popresizable,'1'); ?>><?php echo $strAllow; ?></option>
                            <option value="0" <?php echo seld($popresizable,'0'); ?>><?php echo $strDenny; ?></option>
                          </select>
                        </td>
                        <td height="30" width="120" class=title align="center"><?php echo $strAdvsPopScroll; ?></td>
                        <td height="30" > 
                          <select name="popscrollbars">
                            <option value="auto" <?php echo seld($popscrollbars,'auto'); ?>><?php echo $strAuto; ?></option>
                            <option value="1" <?php echo seld($popscrollbars,'1'); ?>><?php echo $strShow; ?></option>
                            <option value="0" <?php echo seld($popscrollbars,'0'); ?>><?php echo $strHidden; ?></option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td width="120" height="30" align="center" ><?php echo $strAdvsPopContent; ?></td>
                        <td height="30"  colspan="3">
			<input type="hidden" name="body" value="<?php echo $body; ?>" />
			 <script type="text/javascript" src="../../kedit/KindEditor.js"></script>
            <script type="text/javascript">
            var editor = new KindEditor("editor");
            editor.hiddenName = "body";
            editor.editorWidth = "700px";
            editor.editorHeight = "300px";
            editor.skinPath = "../../kedit/skins/default/";
			editor.uploadPath = "../../kedit/upload_cgi/upload.php";
			editor.imageAttachPath="advs/pics/";
            editor.iconPath = "../../kedit/icons/";
            editor.show();
            function KindSubmit() {
	          editor.data();
            }
             </script>
						</td>
                      </tr>
      </table>
                  
</div>
<div class="adminsubmit">
<input type="submit" name="submit"  onClick="KindSubmit();"  value="<?php echo $strModify; ?>" class="button" />
<input type="hidden" name="step" value="mod" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />
</div>
</div>
</form>

</body>
</html>

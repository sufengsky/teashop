<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include(ROOTPATH."includes/pages.inc.php");
include("language/".$sLan.".php");
NeedAuth(211);
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

$step=$_REQUEST["step"];

if($step=="add"){

		$groupname=htmlspecialchars($_GET["groupname"]);
		
		//校验
		if($groupname==""){
			err($strGroupAddNTC1,"","");
			exit;
		}

		$msql->query("select max(xuhao) from {P}_feedback_group");
		if($msql->next_record()){
			$newxuhao=$msql->f('max(xuhao)')+1;
		}

		//入库
		$msql->query("insert into {P}_feedback_group set 
			`groupname`='$groupname',
			`xuhao`='$newxuhao',
			`moveable`='1'
		");
		
		$groupid=$msql->instid();

		//创建表单设置记录
		$msql->query ("SELECT * FROM {P}_feedback where groupid='0'");
		while($msql->next_record()){
			$field_caption=$msql->f('field_caption');
			$field_type=$msql->f('field_type');
			$field_size=$msql->f('field_size');
			$field_name=$msql->f('field_name');
			$field_value=$msql->f('field_value');
			$field_null=$msql->f('field_null');
			$value_repeat=$msql->f('value_repeat');
			$field_intro=$msql->f('field_intro');
			$use_field=$msql->f('use_field');
			$moveable=$msql->f('moveable');
			$xuhao=$msql->f('xuhao');
			
			$fsql->query("insert into {P}_feedback set 
				groupid='$groupid',
				field_caption='$field_caption',
				field_type='$field_type',
				field_size='$field_size',
				field_name='$field_name',
				field_value='$field_value',
				field_null='$field_null',
				value_repeat='$value_repeat',
				field_intro='$field_intro',
				use_field='$use_field',
				moveable='$moveable',
				xuhao='$xuhao'

			");
		}


}

if($step=="del"){
	$id=$_GET["id"];
	
	$msql->query("select id from {P}_feedback_info where groupid='$id'");
	if($msql->next_record()){
		err($strGroupNTC4,"","");
		exit;
	}


	$msql->query("select * from {P}_feedback_group where id='$id'");
	if($msql->next_record()){
		$moveable=$msql->f('moveable');
	}else{
		err($strGroupNTC3,"","");
		exit;
	}

	if($moveable!='1'){
		err($strGroupNTC1,"","");
		exit;
	}
	
	//删除分组
	$msql->query("delete from {P}_feedback where groupid='$id'");
	$msql->query("delete from {P}_feedback_group where id='$id'");

	
}


?> 
<div class="searchzone">
<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
   <td >
      <form method="get" action="group.php">
        <input type="text" name="key" size="30" class="input" />
        <input type="submit" name="Submit2" value="<?php echo $strSearchTitle; ?>" class="button">
     </form>
    </td> 
	
      <td align="right" > 
	  
	  <form id="addGroupForm" method="get" action="group.php">
       <?php echo $strGroupName; ?>  
       <input type="hidden" name="step" value="add" />
        <input type="text" name="groupname" class="input" size="25" />
        &nbsp;
        <input type="submit" name="cd" value="<?php echo $strGroupAdd; ?>" class="button" />
      </form>
	  <div  id="notice" class="noticediv"></div>
	  </td>
      
    
  </tr>
</table>
</div>


<?php
$scl="  id!='0' ";

if($key!=""){
$scl.=" and groupname regexp '$key'  ";
}

$totalnums=TblCount("_feedback_group","id",$scl);

$pages = new pages;		
$pages->setvar(array("key" => $key));

$pages->set(10,$totalnums);		                          
	
$pagelimit=$pages->limit();	  

?>
<div class="listzone">
<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td  class="biaoti" width="50" align="center"><?php echo $strNumber; ?></td>
    <td  class="biaoti" width="50"><?php echo $strXuhao; ?></td>
    <td  class="biaoti" height="26"><?php echo $strGroupName; ?> 
      </td>
    <td width="39" class="biaoti"><?php echo $strLook; ?></td>
    <td width="50" align="center"  class="biaoti"><?php echo $strSet; ?></td>
    <td width="50" align="center"  class="biaoti"><?php echo $strDelete; ?></td>
    </tr>
<?php

//得到表单组列表
$msql->query("select * from {P}_feedback_group where $scl order by xuhao limit $pagelimit");
while($msql->next_record()){
$id=$msql->f("id");
$groupname=$msql->f("groupname");
$moveable=$msql->f("moveable");
$xuhao=$msql->f("xuhao");
$intro=$msql->f("intro");


?> 
  <tr class=list>
    <td  width="50" align="center"><?php echo $id; ?></td>
      <td  width="50"><?php echo $xuhao; ?></td>
      <td height="30"> 
       
      <?php echo $groupname; ?>    
      </td>
      <td  width="39"><a href="../index.php?groupid=<?php echo $id;?>" target="_blank"><img src="images/look.png"  border="0" /></a></td>
      <td width="50" align="center"  ><a href="form_set.php?groupid=<?php echo $id; ?>"><img src="images/edit.png"  border="0" /></a></td>
      <td width="50" align="center"  >
	  <?php
	  if($moveable=="1"){
	  ?>
	  	  <img src="images/delete.png"  style="cursor:pointer"   onclick="self.location='group.php?step=del&id=<?php echo $id; ?>'" /> 
	<?php
	  }else{
	  	echo "---";
	  }
	  ?>
	  </td>
    </tr>
  <?php
}
?> 
</table>
</div>
<?php
$pagesinfo=$pages->ShowNow();
?>
<div id="showpages">
	  <div id="pagesinfo"><?php echo $strPagesTotalStart.$totalnums.$strPagesTotalEnd; ?> <?php echo $strPagesMeiye.$pagesinfo["shownum"].$strPagesTotalEnd; ?> <?php echo $strPagesYeci; ?> <?php echo $pagesinfo["now"]."/".$pagesinfo["total"]; ?></div>
	  <div id="pages"><?php echo $pages->output(1); ?></div>
</div>
</body>
</html>

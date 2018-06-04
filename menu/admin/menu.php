<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(11);
$step=$_REQUEST["step"];
$groupid=$_REQUEST["groupid"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
<script type="text/javascript" src="../../base/js/base.js"></script>
<script type="text/javascript" src="../../base/js/form.js"></script>
<script type="text/javascript" src="js/menu.js"></script>

</head>

<body>
<?php
if($groupid==""){
	$msql->query("select * from {P}_menu_group limit 0,1");
}else{
	$msql->query("select * from {P}_menu_group where id='$groupid'");
}
	if($msql->next_record()){
		$groupid=$msql->f('id');
		$moveable=$msql->f('moveable');
		if($moveable=="0"){
			$buttondis=" style='display:none' ";
		}
	}

?>
<div class="searchzone">
<div id="notice" class="noticediv"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="30">
  <tr> 
     <td > 
	 <form id="addgroup" name="addgroup" method="post" action="" >
         
		 <input type="hidden" name="act" value="addgroup" />
        <input id="groupname" name="groupname" type="text" class="input" value="<?php echo $strGroupAddName; ?>" size="22" onFocus="this.value=''"  <?php echo switchDis(120); ?> />
        <input type="Submit" name="Submit" value="<?php echo $strGroupAdd; ?>" class="button"  <?php echo switchDis(120); ?> />
      </form>
	</td> 
	
	  <td  height="30" align="right" >  
	  <form id="delgroup" method="post" action="" >
	  	<input type="hidden" name="groupid" value="<?php echo $groupid; ?>" />
		 <input type="hidden" name="act" value="delgroup" />
		 <input type="submit" name="Submit" value="<?php echo $strGroupDel; ?>" class="button" <?php echo $buttondis; ?>  /> 
	    </form>           
      </td>
  </tr>
</table>
</div>
<div class="formzone">
<div class="addnew" onClick="window.location='menu.php?step=add&groupid=<?php echo $groupid; ?>&pid=0'" ><?php echo $strColAdd; ?></div>

<?php

if($step=="del"){
	$id=$_REQUEST["id"];
	$msql->query("select id from {P}_menu where  pid='$id'");
	if($msql->next_record()){
		err($strColNotice25,"","");
		exit;
	}
	

	$msql->query("delete from {P}_menu where  id='$id'");
}


if($step=="modi"){
	$id=$_REQUEST["id"];
	$menu=htmlspecialchars($_REQUEST["menu"]);
	$xuhao=htmlspecialchars($_REQUEST["xuhao"]);
	$target=$_REQUEST["target"];
	$ifshow=$_REQUEST["ifshow"];
	$folder=htmlspecialchars($_REQUEST["folder"]);
	$url=htmlspecialchars($_REQUEST["url"]);
	$selcoltype=$_REQUEST["selcoltype"];
	
	switch($selcoltype){
		case "1" :
			$linktype="1";
		break;
		case "2" :
			$linktype="2";
		break;
		default :
			$linktype="0";
			$coltype=$selcoltype;
		break;
	
	}
	
	$msql->query("update {P}_menu set 
	menu='$menu',
	target='$target',
	xuhao='$xuhao',
	folder='$folder',
	url='$url',
	coltype='$coltype',
	linktype='$linktype',
	ifshow='$ifshow'
	where  id='$id'");
}



//新增
if($step=="add"){
	$pid=htmlspecialchars($_REQUEST["pid"]);
	
	$msql->query("select max(xuhao) from {P}_menu where  pid='$pid'");
	if($msql->next_record()){
		$newxuhao=$msql->f('max(xuhao)')+1;
	}


	$msql->query("insert into {P}_menu set 
	groupid='$groupid',
	pid='$pid',
	menu='$strColMenuName',
	target='_self',
	xuhao='$newxuhao',
	coltype='index',
	linktype='0',
	url='http://',
	ifshow='1'
	");
}


?>



<div class="tablezone">
  <div class="cap">
    <div class="td" style="width:33px"><?php echo $strXuhao; ?></div> 
     <div class="td" style="width:162px"><?php echo $strColMenuName; ?></div>
      <div class="td" style="width:60px"><?php echo $strColOpen; ?></div>
      <div class="td" style="width:55px"><?php echo $strColShow; ?></div>
	  <div class="td" style="width:115px"><?php echo $strColTo; ?></div>
	
    
 </div>
  <?php 
$msql->query("select * from {P}_menu where groupid='$groupid' and pid='0' order by xuhao");
while($msql->next_record()){
$id=$msql->f('id');
$pid=$msql->f('pid');
$menu=$msql->f('menu');
$linktype=$msql->f('linktype');
$coltype=$msql->f('coltype');
$folder=$msql->f('folder');
$url=$msql->f('url');
$xuhao=$msql->f('xuhao');
$target=$msql->f('target');
$ifshow=$msql->f('ifshow');

?> 
<div class="tr" id="tr_<?php echo $id; ?>" style="background-color:#f6fafd;margin:6px 0px;padding:1px">
<form id="form_<?php echo $id; ?>" method="get" action="menu.php" name="colset" >
<input type="text" name="xuhao" style="width:32px" value="<?php echo $xuhao; ?>"  class="menuinput"  <?php echo switchDis(120); ?> />
<input type="text" name="menu"  value="<?php echo $menu; ?>" class="menuinput" style="width:110px"  <?php echo switchDis(120); ?> />
      <select name="target"  <?php echo switchDis(120); ?> >
          <option value="_self" <?php echo seld($target,'_self'); ?>><?php echo $strSelf; ?></option>
          <option value="_blank" <?php echo seld($target,'_blank'); ?>><?php echo $strBlank; ?></option>
        </select>
     
     
        <select name="ifshow"  <?php echo switchDis(120); ?>>
          <option value="1" <?php echo seld($ifshow,'1'); ?>><?php echo $strShow; ?></option>
          <option value="0" <?php echo seld($ifshow,'0'); ?>><?php echo $strHidden; ?></option>
        </select>
      
	  <select id="selcoltype_<?php echo $id; ?>" name="selcoltype" class="selcoltype"  <?php echo switchDis(120); ?>>
	  <?php
	  $fsql->query("select * from {P}_base_coltype where ifchannel='1'");
	  while($fsql->next_record()){
	  	$scoltype=$fsql->f('coltype');
		$colname=$fsql->f('colname');
		if($linktype=="0" && $coltype==$scoltype){
			echo "<option value='".$scoltype."' selected>".$colname."</option>";
		}else{
			echo "<option value='".$scoltype."'>".$colname."</option>";
		}
		
	  }
	 if($linktype=="1"){
	 	 echo "<option value='1' selected>".$strColInner."</option>";
		 echo "<option value='2'>".$strColDiy."</option>";
	 }elseif($linktype=="2"){
		 echo "<option value='1'>".$strColInner."</option>";
		 echo "<option value='2' selected>".$strColDiy."</option>";
	 }else{
	  	echo "<option value='1'>".$strColInner."</option>";
		echo "<option value='2'>".$strColDiy."</option>";
	 }
	 
	  
	  
	  ?>
        
        
      </select>
	  <div class="caozuo">
	  <input name="url" type="text" class="menuinput" id="url_selcoltype_<?php echo $id; ?>" value="<?php echo $url; ?>" size="22" style="display:none;margin-right:10px"  <?php echo switchDis(120); ?> />
	  <input name="folder" type="text" class="menuinput" id="folder_selcoltype_<?php echo $id; ?>" value="<?php echo $folder; ?>" size="22" style="display:none;margin-right:10px"  <?php echo switchDis(120); ?> />
  		<a style="cursor:pointer;" onClick="submitMenu('form_<?php echo $id; ?>')"><?php echo $strModify; ?></a>
        <a  style="cursor:pointer" onClick="window.location='menu.php?step=del&groupid=<?php echo $groupid; ?>&id=<?php echo $id; ?>'"><?php echo $strDelete; ?></a>
 	   <div class="addsub" onClick="window.location='menu.php?step=add&groupid=<?php echo $groupid; ?>&pid=<?php echo $id; ?>'" ><?php echo $strSubAdd; ?></div>  &nbsp;
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="groupid" value="<?php echo $groupid; ?>" />
        <input type="hidden" name="step" value="modi" />
		&nbsp; <img src="images/arrowup.gif" border="0" class="arrimg" style="cursor:pointer;" id="arr_<?php echo $id; ?>" />
		</div>
	  </form>
    </div>
   
  
 <div id="s_<?php echo $id; ?>" >

<?php
$fsql->query("select * from {P}_menu where groupid='$groupid' and pid='$id' order by xuhao");
while($fsql->next_record()){
$subid=$fsql->f('id');
$subpid=$fsql->f('pid');
$submenu=$fsql->f('menu');
$sublinktype=$fsql->f('linktype');
$subcoltype=$fsql->f('coltype');
$subfolder=$fsql->f('folder');
$suburl=$fsql->f('url');
$subxuhao=$fsql->f('xuhao');
$subtarget=$fsql->f('target');
$subifshow=$fsql->f('ifshow');

$newsubxuhao=0;



?>
<div class="subtr">
<form id="form_<?php echo $subid; ?>" method="get" action="menu.php" name="colset" >
<input type="text" name="xuhao" style="width:32px" value="<?php echo $subxuhao; ?>"  class="menuinput"  <?php echo switchDis(120); ?> />
<input type="text" name="menu"  value="<?php echo $submenu; ?>" class="menuinput" style="width:68px"  <?php echo switchDis(120); ?> />
      <select name="target"  <?php echo switchDis(120); ?>>
          <option value="_self" <?php echo seld($subtarget,'_self'); ?>><?php echo $strSelf; ?></option>
          <option value="_blank" <?php echo seld($subtarget,'_blank'); ?>><?php echo $strBlank; ?></option>
        </select>
        <select name="ifshow"  <?php echo switchDis(120); ?>>
          <option value="1" <?php echo seld($subifshow,'1'); ?>><?php echo $strShow; ?></option>
          <option value="0" <?php echo seld($subifshow,'0'); ?>><?php echo $strHidden; ?></option>
        </select>
      
	  <select id="selcoltype_<?php echo $subid; ?>" name="selcoltype" class="selcoltype"  <?php echo switchDis(120); ?>>
	  <?php
	  $tsql->query("select * from {P}_base_coltype where ifchannel='1'");
	  while($tsql->next_record()){
	  	$scoltype=$tsql->f('coltype');
		$colname=$tsql->f('colname');
		if($sublinktype=="0" && $subcoltype==$scoltype){
			echo "<option value='".$scoltype."' selected>".$colname."</option>";
		}else{
			echo "<option value='".$scoltype."'>".$colname."</option>";
		}
		
	  }
	 if($sublinktype=="1"){
	 	 echo "<option value='1' selected>".$strColInner."</option>";
		 echo "<option value='2'>".$strColDiy."</option>";
	 }elseif($sublinktype=="2"){
		 echo "<option value='1'>".$strColInner."</option>";
		 echo "<option value='2' selected>".$strColDiy."</option>";
	 }else{
	  	echo "<option value='1'>".$strColInner."</option>";
		echo "<option value='2'>".$strColDiy."</option>";
	 }
	 
	  
	  
	  ?>
        
        
      </select>
	  <div class="caozuo">
	  <input name="url" type="text" class="menuinput" id="url_selcoltype_<?php echo $subid; ?>" value="<?php echo $suburl; ?>" size="22" style="display:none;margin-right:10px"  <?php echo switchDis(120); ?> />
	  <input name="folder" type="text" class="menuinput" id="folder_selcoltype_<?php echo $subid; ?>" value="<?php echo $subfolder; ?>" size="22" style="display:none;margin-right:10px"  <?php echo switchDis(120); ?> />
 		
		<a style="cursor:pointer;" onClick="submitMenu('form_<?php echo $subid; ?>')"><?php echo $strModify; ?></a>
         <a  style="cursor:pointer" onClick="window.location='menu.php?step=del&groupid=<?php echo $groupid; ?>&id=<?php echo $subid; ?>'"><?php echo $strDelete; ?></a>

       <input type="hidden" name="id" value="<?php echo $subid; ?>" />
	   <input type="hidden" name="groupid" value="<?php echo $groupid; ?>" />
        <input type="hidden" name="step" value="modi" />
		</div>
      </form>


</div>
<?php
}
//二级菜单结束

?>
</div>

<?php
}
 //一级菜单结束
?> 

</div>
</div>
</body>
</html>

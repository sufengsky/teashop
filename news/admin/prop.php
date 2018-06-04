<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(123);

$step=$_REQUEST["step"];
$id=$_REQUEST["id"];
$propname=$_REQUEST["propname"];
$xuhao=$_REQUEST["xuhao"];
$catid=$_REQUEST["catid"];
$pid=$_REQUEST["pid"];



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>

</head>

<body class="popbody">
<?php
if($step=="copy"){
	
		$msql->query("delete from {P}_news_prop where catid='$catid'");
		$p=1;
		$msql->query("select * from {P}_news_prop where catid='$pid'");
		while($msql->next_record()){
			$propname=$msql->f("propname");
			$xuhao=$msql->f("xuhao");
			

			$fsql->query("insert into {P}_news_prop values(
			0,
			'$catid',
			'$propname',
			'$xuhao'
			)");
		$p++;
		}
	
}


if($step=="add"){
	$msql->query("select count(id) from {P}_news_prop where catid='$catid'");
	if($msql->next_record()){
	$count=$msql->f('count(id)');
	}
	if($propname==""){
	PopBack($strColPropNotice1,"prop.php?catid=$catid&pid=$pid");
	}
	if($count>=20){
	PopBack($strColPropNotice2,"prop.php?catid=$catid&pid=$pid");
}


$msql->query("select max(xuhao) from {P}_news_prop where catid='$catid' ");
if($msql->next_record()){
$max=$msql->f('max(xuhao)');
}

$max=$max+1;
$msql->query("insert into {P}_news_prop values(
0,
'$catid',
'$propname',
'$max'
)");
}

if($step=="modify"){
$msql->query("update {P}_news_prop set propname='$propname',xuhao='$xuhao' where id='$id'");
}
if($step=="del"){
$msql->query("delete from {P}_news_prop where id='$id'");
}


?>
<div id="popzone" class="popzone">
<fieldset>
<legend><?php echo $strColPropTitle; ?></legend> 

<div style="padding:10px 20px;">
<form method="get" action="prop.php">
               <input type="hidden" name="catid" value="<?php echo "$catid"; ?>" />
			   <input type="hidden" name="pid" value="<?php echo "$pid"; ?>" />
              <input type="hidden" name="step" value="add">
              <?php echo $strColPropAdd; ?> 
              <input type="text" name="propname" size="20" class="input">
              <input type="submit" name="Submit" value="<?php echo $strAdd; ?>" class="button">
			  <?php
if($pid!=0){
?>
<input type="button" name="cc2" value="<?php echo $strColPropCopy; ?>" onClick="self.location='prop.php?step=copy&pid=<?php echo $pid; ?>&catid=<?php echo $catid; ?>'" class="button">
<?php
}
?>  
 <input type="button" name="Button2" value="<?php echo $strWindowClose; ?>" class=button onClick="window.close();">
 </form>
  </div>
	   
  </fieldset>
            <div style=" position:absolute;margin-top:10px;width:95%; height:390px; overflow:auto;border:0px;"> 
              <table width="98%" border="0" cellspacing="1" cellpadding="2" align="center">
                <tr> 
                  <td   width="30" align="center" height="25"><?php echo $strNumber; ?></td>
                  <td   width="80" align="center" height="25"><?php echo $strXuhao; ?></td>
                  <td height="25"  ><?php echo $strColPropName; ?></td>
                  <td width="50"   align="center" height="25"><?php echo $strModify; ?></td>
                  <td width="50" align="center" height="25"  ><?php echo $strDelete; ?></td>
                </tr>
                <?php
$msql->query("select * from {P}_news_prop where catid='$catid' order by xuhao");
$i=1;
while($msql->next_record()){
$id=$msql->f("id");
$propname=$msql->f("propname");
$xuhao=$msql->f("xuhao");
?> 
                <tr> 
                  <td   width="30" align="center"><?php echo "$i"; ?></td>
                  <form method="get" action="prop.php">
                    <td   width="80" align="center"> 
                      <input type="text" name="xuhao" size="5" value="<?php echo "$xuhao"; ?>"  class="input">
                    </td>
                    <td  > 
                      <input type="text" name="propname" size="30" value="<?php echo "$propname"; ?>"  class="input">
                      <input type="hidden" name="id" value="<?php echo "$id"; ?>">
                   
					   <input type="hidden" name="catid" value="<?php echo "$catid"; ?>">
					    <input type="hidden" name="pid" value="<?php echo "$pid"; ?>">
                      <input type="hidden" name="step" value="modify">
                    </td>
                    <td width="50"  > 
                      <div align="CENTER"> 
                        <input type="submit" name="cc" value="<?php echo $strModify; ?>" class=button>
                      </div>
                    </td>
                    <td width="50" align="center"  > 
                      <input type="button" name="cc" value="<?php echo $strDelete; ?>" onClick="self.location='prop.php?step=del&pid=<?php echo $pid; ?>&catid=<?php echo $catid; ?>&id=<?php echo $id; ?>'" class=button>
                    </td>
                  </form>
                </tr>
                <?php
$i++;
}
?> 
              </table>
            </div>
          
      <table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">
        <tr align="center"> 
          <td height="36">
         
            
</td>
        </tr>
  </table>

</div>
</body>
</html>

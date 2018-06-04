<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include(ROOTPATH."includes/pages.inc.php");
include("language/".$sLan.".php");
NeedAuth(84);


$page=$_REQUEST["page"];
$step=$_REQUEST["step"];
$id=$_REQUEST["id"];
$xuhao=$_REQUEST["xuhao"];
$tj=$_REQUEST["tj"];
$iffb=$_REQUEST["iffb"];
$key=$_REQUEST["key"];
$showtj=$_REQUEST["showtj"];
$showfb=$_REQUEST["showfb"];
$shownum=$_REQUEST["shownum"];
$sc=$_REQUEST["sc"];
$ord=$_REQUEST["ord"];


if(!isset($shownum) || $shownum<10){
	$shownum=10;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
<script type="text/javascript" src="../../base/js/base.js"></script>
<script type="text/javascript" src="../../base/js/form.js"></script>
<script type="text/javascript" src="../../base/js/blockui.js"></script>
<script type="text/javascript" src="js/qq.js"></script>
<script type="text/javascript" src="js/comm.js"></script>

 <SCRIPT>

function Dpop(url,w,h){
	res = showModalDialog(url, null, 'dialogWidth: '+w+'px; dialogHeight: '+h+'px; center: yes; resizable: no; scroll: no; status: no;');
 	if(res=="ok"){window.location.reload();}
 
}
function ordsc(nn,sc){
	if(nn!='<?php echo $ord; ?>'){
		window.location='qq.php?page=<? echo $page; ?>&sc=<? echo $sc; ?>&pid=<? echo $pid; ?>&showtj=<? echo $showtj; ?>&showfb=<? echo $showfb; ?>&shownum=<? echo $shownum; ?>&ord='+nn;
	}else{
		if(sc=='asc' || sc==''){
		window.location='qq.php?page=<? echo $page; ?>&sc=desc&pid=<? echo $pid; ?>&showtj=<? echo $showtj; ?>&showfb=<? echo $showfb; ?>&shownum=<? echo $shownum; ?>&ord='+nn;
		}else{
		window.location='qq.php?page=<? echo $page; ?>&sc=asc&pid=<? echo $pid; ?>&showtj=<? echo $showtj; ?>&showfb=<? echo $showfb; ?>&shownum=<? echo $shownum; ?>&ord='+nn;
		}
	
	}
}



</SCRIPT>
</head>

<body >
<?php

if($step=="setfb"){
	$dall=$_POST["dall"];
	$nums=sizeof($dall);
	$iffb=$_POST["iffb"];
	for($i=0;$i<$nums;$i++){
		$ids=$dall[$i];
		$msql->query("update {P}_tools_code set iffb='$iffb' where id='$ids'");
	}

}

if($step=="settj"){
	$dall=$_POST["dall"];
	$tj=$_POST["tj"];
	$nums=sizeof($dall);
	for($i=0;$i<$nums;$i++){
		$ids=$dall[$i];
		$msql->query("update {P}_tools_code set tj='$tj' where id='$ids'");
	}

}

if($step=="delall"){
	$dall=$_POST["dall"];
	$nums=sizeof($dall);
	for($i=0;$i<$nums;$i++){
		$ids=$dall[$i];		
		$msql->query("delete from {P}_tools_code where id='$ids'");

	}
}


?>

<?php

if(!isset($ord) || $ord==""){
	$ord="uptime";
}
if(!isset($sc) || $sc==""){
	$sc="desc";
}

$scl=" id!='0' and cat='qq' ";

if($showtj!="" && $showtj!="all"){
	$scl.=" and tj='$showtj' ";

}

if($showfb!="" && $showfb!="all"){
	$scl.=" and iffb='$showfb' ";
}

if($key!=""){
	$scl.=" and (qq regexp '$key' or name regexp '$key' or position regexp '$key' or memo regexp '$key') ";
}


$totalnums=TblCount("_tools_code","id",$scl);

$pages = new pages;		
$pages->setvar(array("shownum" => $shownum,"sc" => $sc,"ord" => $ord,"showtj" => $showtj,"showfb" => $showfb,"key" => $key));

$pages->set($shownum,$totalnums);		                          
	
$pagelimit=$pages->limit();	  




?>

<!----------------------------QQ搜索部分----------------------------------> 
<div class="searchzone">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="30">
  <tr> 
    <form method="get" action="qq.php" >
                  
      <td width="84%"  height="30"><select name="showtj">
          <option value="all" ><?php echo $strVoteInfo4; ?></option>
          <option value="1"  <?php echo seld($showtj,"1"); ?>><?php echo $strVoteInfo5; ?></option>
          <option value="0" <?php echo seld($showtj,"0"); ?>><?php echo $strVoteInfo6; ?></option>
        </select>
		<select name="showfb">
          <option value="all" ><?php echo $strVoteInfo7; ?></option>
          <option value="1"  <?php echo seld($showfb,"1"); ?>><?php echo $strVoteInfo8; ?></option>
          <option value="0" <?php echo seld($showfb,"0"); ?>><?php echo $strVoteInfo9; ?></option>
        </select>
		
		<select name="shownum">

          <option value="10"  <?php echo seld($shownum,"10"); ?>><?php echo $strVoteInfo10; ?></option>
          <option value="20" <?php echo seld($shownum,"20"); ?>><?php echo $strVoteInfo11; ?></option>
          <option value="30" <?php echo seld($shownum,"30"); ?>><?php echo $strVoteInfo12; ?></option>
          <option value="50" <?php echo seld($shownum,"50"); ?>><?php echo $strVoteInfo13; ?></option>
        </select>
<input type="text" name="key" size="23" class="input" value="<?php echo $key; ?>" />       
        <input type="submit" name="Submit" value="<?php echo $strSearchTitle; ?>" class=button>      </td>
    </form>
             
    <td width="16%" align="right"> 
	  <form  method="get" action="qq_add.php">
	    <input type="Submit" name="Button" value="添加QQ客服" class="button" >
        </form></td>
    </tr>
</table>
</div>
<!----------------------------QQ搜索部分结束----------------------------------> 


<!----------------------------QQ管理部分----------------------------------> 
<form name="delfm" method="post" action="qq.php">
<div class="listzone">

<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center" >
  <tr class="list"> 
    <td width="29" align="center"  class="biaoti"  style="cursor:pointer" onClick="ord('id','<?php echo $sc; ?>')"><?php echo $strSel; ?></td>
    <td width="39"  class="biaoti"  style="cursor:pointer" onClick="ordsc('id','<?php echo $sc; ?>')"><?php echo $strVoteInfo16; ?><?php OrdSc($ord,"id",$sc); ?></td>
    <td width="43"  class="biaoti"  style="cursor:pointer" onClick="ordsc('xuhao','<?php echo $sc; ?>')">序号<?php OrdSc($ord,"xuhao",$sc); ?></td>
    <td width="150" height="28"  class="biaoti">QQ号码<?php OrdSc($ord,"qq",$sc); ?></td>
    <td width="100"  class="biaoti">姓名</td>
    <td width="100"  class="biaoti">职务</td>
    <td width="100"  class="biaoti">电话</td>
    <td  class="biaoti">手机号码</td>
    <td height="28" width="103"  class="biaoti"  ><?php echo $strVoteInfo20; ?></td>
    <td height="28" width="99"  class="biaoti"  style="cursor:pointer" onClick="ordsc('uptime','<?php echo $sc; ?>')"><?php echo $strUptime; ?><?php OrdSc($ord,"uptime",$sc); ?></td>
    <td width="32" height="28"  class="biaoti"><?php echo $strVoteInfo21; ?></td>
    <td width="28" height="28"  class="biaoti"><?php echo $strVoteInfo22; ?>    </td>
    <td width="57" height="28"  class="biaoti"  > 
      <div align="center"><?php echo $strVoteInfo24; ?></div></td>
    </tr>

    <?php 


$msql->query("select * from {P}_tools_code where $scl  order by $ord $sc  limit $pagelimit");
while($msql->next_record()){
	$id=$msql->f('id');
	$qq=$msql->f('qq');
	$name=$msql->f('name');
	$position=$msql->f('position');
	$tel=$msql->f('tel');
	$phone=$msql->f('phone');
	$memo=$msql->f('memo');
	$code=$msql->f('code');
	$xuhao=$msql->f('xuhao');
	$iffb=$msql->f('iffb');
	$tj=$msql->f('tj');
	$dtime=$msql->f('dtime');
	$uptime=$msql->f('uptime');
	$author=$msql->f('author');

	$uptime=date("y/m/d",$uptime);

?> 
    <tr class="list"> 
      <td width="29" align="center" height="26"> 
        <input type="checkbox" name="dall[]" value="<?php echo $id; ?>" class="qqcheckbox" />      </td>
      <td height="26"> <?php echo $id; ?> </td>
      <td height="26"><?php echo $xuhao; ?></td>
      <td><?php echo $qq; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $position; ?></td>
      <td><?php echo $tel; ?></td>
      <td><?php echo $phone; ?></td>
      <td width="103" ><?php echo $author; ?></td>
      <td width="99"><?php echo $uptime; ?></td>
      <td width="32"> <?php
ShowYN($iffb);
?></td>
      <td width="28"> <?php
ShowYN($tj);
?> </td>
      <td> 
        <div align="center"> <img src="images/edit.png" style="cursor:pointer" onClick="window.location='qq_mod.php?id=<?php echo $id; ?>&page=<?php echo $page; ?>'">        </div></td>
      </tr>
    <?php
}
?> 
   </table>
  </div>
      <div class="piliang"> 
        <input type="checkbox" name="" value="1" id="qqSelAll">
        <?php echo $strSelAll; ?>&nbsp; 
        <input type="radio" name="step" value="delall">
        <?php echo $strDelete ?> 
      <input type="radio" name="step" value="setfb" checked>
		<select name="iffb" id="iffb">
          <option value="1">审核</option>
           <option value="0">取消审核</option>
        </select>
		
        <input type="radio" name="step" value="settj">
        <select name="tj" id="tj">
          <option value="1"><?php echo $strVoteInfo27; ?></option>
           <option value="0"><?php echo $strVoteInfo28; ?></option>
        </select>
        <input class="button" type="button" value="<?php echo $strSubmit; ?>" onClick="delfm.submit()">
        <input type="hidden" name="page" size="3" value="<?php echo $page; ?>" />
        <input type="hidden" name="ord" size="3" value="<?php echo $ord; ?>" />
        <input type="hidden" name="sc" size="3" value="<?php echo $sc; ?>" />
        <input type="hidden" name="key" size="3" value="<?php echo $key; ?>" />
       
        <input type="hidden" name="showtj" value="<?php echo $showtj; ?>" />
        <input type="hidden" name="showfb" value="<?php echo $showfb; ?>" />
        <input type="hidden" name="shownum" value="<?php echo $shownum; ?>" />
       
      </div>
  


  </form>
<!----------------------------QQ管理部分结束---------------------------------->  
  
<?php
$pagesinfo=$pages->ShowNow();
?>
<div id="showpages">
	  <div id="pagesinfo"><?php echo $strPagesTotalStart.$totalnums.$strPagesTotalEnd; ?> <?php echo $strPagesMeiye.$pagesinfo["shownum"].$strPagesTotalEnd; ?> <?php echo $strPagesYeci; ?> <?php echo $pagesinfo["now"]."/".$pagesinfo["total"]; ?></div>
	  <div id="pages"><?php echo $pages->output(1); ?></div>
</div>
</body>
</html>

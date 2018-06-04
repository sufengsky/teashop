<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include(ROOTPATH."includes/pages.inc.php");
include("language/".$sLan.".php");
NeedAuth(83);


$gid=$_REQUEST["gid"];
$page=$_REQUEST["page"];
$step=$_REQUEST["step"];
$id=$_REQUEST["id"];
$title=$_REQUEST["title"];
$xuhao=$_REQUEST["xuhao"];
$tj=$_REQUEST["tj"];
$iffb=$_REQUEST["iffb"];
$key=$_REQUEST["key"];
$secure=$_REQUEST["secure"];
$showtj=$_REQUEST["showtj"];
$showfb=$_REQUEST["showfb"];
$shownum=$_REQUEST["shownum"];
$sc=$_REQUEST["sc"];
$ord=$_REQUEST["ord"];
$bg=$_REQUEST["bg"];


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
<script type="text/javascript" src="js/photo.js"></script>
<script type="text/javascript" src="js/comm.js"></script>

 <SCRIPT>

function Dpop(url,w,h){
	res = showModalDialog(url, null, 'dialogWidth: '+w+'px; dialogHeight: '+h+'px; center: yes; resizable: no; scroll: no; status: no;');
 	if(res=="ok"){window.location.reload();}
 
}
function ordsc(nn,sc){
	if(nn!='<?php echo $ord; ?>'){
		window.location='photopoll_con.php?page=<? echo $page; ?>&sc=<? echo $sc; ?>&pid=<? echo $pid; ?>&showtj=<? echo $showtj; ?>&showfb=<? echo $showfb; ?>&shownum=<? echo $shownum; ?>&ord='+nn;
	}else{
		if(sc=='asc' || sc==''){
		window.location='photopoll_con.php?page=<? echo $page; ?>&sc=desc&pid=<? echo $pid; ?>&showtj=<? echo $showtj; ?>&showfb=<? echo $showfb; ?>&shownum=<? echo $shownum; ?>&ord='+nn;
		}else{
		window.location='photopoll_con.php?page=<? echo $page; ?>&sc=asc&pid=<? echo $pid; ?>&showtj=<? echo $showtj; ?>&showfb=<? echo $showfb; ?>&shownum=<? echo $shownum; ?>&ord='+nn;
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
		$msql->query("update {P}_tools_photopolldata set iffb='$iffb' where id='$ids'");
	}

}


if($step=="settj"){
	$dall=$_POST["dall"];
	$tj=$_POST["tj"];
	$nums=sizeof($dall);
	for($i=0;$i<$nums;$i++){
		$ids=$dall[$i];
		$msql->query("update {P}_tools_photopolldata set tj='$tj' where id='$ids'");
	}

}


if($step=="setsecure"){
	$dall=$_POST["dall"];
	$secure=$_POST["secure"];
	$nums=sizeof($dall);
	for($i=0;$i<$nums;$i++){
		$ids=$dall[$i];
		$msql->query("update {P}_tools_photopolldata set secure='$secure' where id='$ids'");
	}
}


if($step=="delall"){
	$dall=$_POST["dall"];
	$nums=sizeof($dall);
	for($i=0;$i<$nums;$i++){
		$ids=$dall[$i];
		
		$msql->query("select src from {P}_tools_photopolldata where id='$ids'");
		if($msql->next_record()){
			$src=$msql->f('src');
			if(file_exists(ROOTPATH.$src) && $src!=""){
				unlink(ROOTPATH.$src);
			}
		}		
		
		$msql->query("delete from {P}_tools_photopolldata where id='$ids'");

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

$scl=" id!='0' ";

if($key!=""){
$scl.=" and (title regexp '$key' or body regexp '$key') ";
}

if($showtj!="" && $showtj!="all"){
$scl.=" and tj='$showtj' ";

}

if($showfb!="" && $showfb!="all"){
$scl.=" and iffb='$showfb' ";

}



if($gid!="" && $pid!="0"){
	$scl.=" and poll_id='$gid' ";
}


$totalnums=TblCount("_tools_photopolldata","id",$scl);

$pages = new pages;		
$pages->setvar(array("shownum" => $shownum,"gid" => $gid,"sc" => $sc,"ord" => $ord,"showtj" => $showtj,"showfb" => $showfb,"key" => $key));

$pages->set($shownum,$totalnums);		                          
	
$pagelimit=$pages->limit();	  




?>

<!----------------------------图片搜索部分----------------------------------> 
<div class="searchzone">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="30">
  <tr> 
    <form method="get" action="photopoll_con.php" >
                  
      <td  height="30"> 
        <select name="gid">
          <option value='all'><?php echo $strVoteInfo3; ?></option>
          <?php
				$fsql -> query ("select * from {P}_tools_photopollindex order by id");
				while ($fsql -> next_record ()) {
					$lgid = $fsql -> f ("id");
					$cat = $fsql -> f ("groupname");
					$groupname = $fsql -> f ("groupname");
						
					if($lgid==$gid){
						echo "<option value='".$lgid."' selected>".$cat."</option>";
					}else{
						echo "<option value='".$lgid."'>".$cat."</option>";
					}
					
				}
		 ?>
        </select>
        <select name="showtj">
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
        <input type="submit" name="Submit" value="<?php echo $strSearchTitle; ?>" class=button>
                    
      </td>
    </form>
             
    <td  colspan="2" align="right"> 
	<form  method="get" action="photopoll_conadd.php">
      <input type="Submit" name="Button" value="<?php echo $strVoteInfo15; ?>" class="button" >
	  <input type="hidden" name="photogroup" value="<?php echo $gid; ?>" />
	</form>
    </td>
  </tr>
</table>
</div>
<!----------------------------图片搜索部分结束----------------------------------> 


<!----------------------------图片管理部分----------------------------------> 
<form name="delfm" method="post" action="photopoll_con.php">
<div class="listzone">

<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center" >
  <tr class="list"> 
    <td width="30" align="center"  class="biaoti"  style="cursor:pointer" onClick="ord('id','<?php echo $sc; ?>')"><?php echo $strSel; ?></td>
    <td width="39"  class="biaoti"  style="cursor:pointer" onClick="ordsc('id','<?php echo $sc; ?>')"><?php echo $strVoteInfo16; ?><?php OrdSc($ord,"id",$sc); ?></td>
    <td  class="biaoti" width="30"><?php echo $strVoteInfo17; ?> 
    </td>
    <td width="441" height="28" class="biaoti" style="cursor:pointer" onClick="ordsc('title','<?php echo $sc; ?>')"><?php echo $strVoteInfo18; ?><?php OrdSc($ord,"title",$sc); ?></td>
    <td width="338"  class="biaoti"  ><?php echo $strVoteInfo19; ?></td>
    <td height="28" width="80"  class="biaoti"  ><?php echo $strVoteInfo20; ?></td>
    <td height="28" width="75"  class="biaoti"  style="cursor:pointer" onClick="ordsc('uptime','<?php echo $sc; ?>')"><?php echo $strUptime; ?><?php OrdSc($ord,"uptime",$sc); ?></td>
    <td width="35" height="28"  class="biaoti"><?php echo $strVoteInfo21; ?></td>
    <td width="35" height="28"  class="biaoti"><?php echo $strVoteInfo22; ?> 
    </td>
    <td width="35"  class="biaoti"  ><?php echo $strVoteInfo23; ?></td>
    <td width="35" height="28"  class="biaoti"> 
      <div align="center"><?php echo $strVoteInfo24; ?></div>
    </td>
    </tr>

    <?php 


$msql->query("select * from {P}_tools_photopolldata where $scl  order by $ord $sc  limit $pagelimit");


while($msql->next_record()){
	$id=$msql->f('id');
	$poll_id=$msql->f('poll_id');
	$title=$msql->f('title');
	$tj=$msql->f('tj');
	$iffb=$msql->f('iffb');
	$author=$msql->f('author');
	$src=$msql->f('src');
	$type=$msql->f('type');
	$secure=$msql->f('secure');
	$uptime=$msql->f('uptime');

	$uptime=date("y/m/d",$uptime);

	$fsql->query("select cat from {P}_tools_photopollindex where id='$poll_id'");
	if($fsql->next_record()){
		$cat=$fsql->f('cat');
	}

	$browseurl=ROOTPATH."tools/pphtml/?".$id.".html";

?> 
    <tr class="list"> 
      <td width="30" align="center" height="26"> 
        <input type="checkbox" name="dall[]" value="<?php echo $id; ?>" class="photopollcheckbox" />
      </td>
      <td width="39" height="26"> <?php echo $id; ?> </td>
      <td width="30"><?php
if($src==""){
echo "<img id='preview_".$id."' class='preview' src='images/noimage.gif' >";
}else{
echo "<img id='preview_".$id."' class='preview' src='images/image.gif' >";
}
?> <input type="hidden" id="previewsrc_<?php echo $id; ?>"  value="<?php echo $src; ?>">
      </td>
      <td><a href="<?php echo $browseurl; ?>" target="_blank" style="color:<?php echo $tcolor; ?>;font-weight:<?php echo $tbold; ?>"><?php echo $title; ?></a></td>
      <td width="338" ><?php echo $cat; ?></td>
      <td width="80" ><?php echo $author; ?></td>
      <td width="75"><?php echo $uptime; ?></td>
      <td width="35"> <?php
ShowYN($iffb);
?></td>
      <td width="35"> <?php
ShowYN($tj);
?> </td>
      <td width="35"> <?php echo $secure; ?></td>
      <td width="35"> 
        <div align="center"> <img src="images/edit.png" style="cursor:pointer" onClick="window.location='photopoll_conmod.php?id=<?php echo $id; ?>&gid=<?php echo $poll_id; ?>&page=<?php echo $page; ?>'"> 
        </div>
      </td>
      </tr>
    <?php
}
?> 
   </table>
  </div>
      <div class="piliang"> 
        <input type="checkbox" name="" value="1" id="photoPollSelAll">
        <?php echo $strSelAll; ?>&nbsp; 
        <input type="radio" name="step" value="delall">
        <?php echo $strDelete ?> 
      <input type="radio" name="step" value="setfb" checked>
		<select name="iffb" id="iffb">
          <option value="1"><?php echo $strVoteInfo25; ?></option>
           <option value="0"><?php echo $strVoteInfo25; ?></option>
        </select>
		
        <input type="radio" name="step" value="settj">
        <select name="tj" id="tj">
          <option value="1"><?php echo $strVoteInfo27; ?></option>
           <option value="0"><?php echo $strVoteInfo28; ?></option>
        </select>
        <input type="radio" name="step" value="setsecure">
        <select name="secure" id="secure">
          <option value="0"><?php echo $strSecure1; ?></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
        </select>
       
		<input class="button" type="button" value="<?php echo $strSubmit; ?>" onClick="delfm.submit()">
        <input type="hidden" name="page" size="3" value="<?php echo $page; ?>" />
        <input type="hidden" name="ord" size="3" value="<?php echo $ord; ?>" />
        <input type="hidden" name="sc" size="3" value="<?php echo $sc; ?>" />
        <input type="hidden" name="key" size="3" value="<?php echo $key; ?>" />
       
        <input type="hidden" name="showtj" value="<?php echo $showtj; ?>" />
        <input type="hidden" name="showfb" value="<?php echo $showfb; ?>" />
        <input type="hidden" name="pid" value="<?php echo "$pid"; ?>" />
        <input type="hidden" name="shownum" value="<?php echo $shownum; ?>" />
       
      </div>
  


  </form>
<!----------------------------图片管理部分结束---------------------------------->  
  
<?php
$pagesinfo=$pages->ShowNow();
?>
<div id="showpages">
	  <div id="pagesinfo"><?php echo $strPagesTotalStart.$totalnums.$strPagesTotalEnd; ?> <?php echo $strPagesMeiye.$pagesinfo["shownum"].$strPagesTotalEnd; ?> <?php echo $strPagesYeci; ?> <?php echo $pagesinfo["now"]."/".$pagesinfo["total"]; ?></div>
	  <div id="pages"><?php echo $pages->output(1); ?></div>
</div>
</body>
</html>

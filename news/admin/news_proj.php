<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include(ROOTPATH."includes/pages.inc.php");
include("language/".$sLan.".php");
NeedAuth(123);

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
<script type="text/javascript" src="js/news.js"></script>
</head>

<body>

<?php


$step=$_REQUEST["step"];

if($step=="del"){
	$id=$_GET["id"];
	$fmpath=fmpath($id).":";
	$msql->query("select id from {P}_news_con where proj regexp '$fmpath' ");
	if($msql->next_record()){
		err($strProjNTC5,"","");
		exit;
	}
	
	$msql->query("select folder from {P}_news_proj where id='$id'");
	if($msql->next_record()){
		$delfolder=$msql->f('folder');
	}else{
		err($strProjNTC6,"","");
		exit;
	}
	
	$pagename="proj_".$delfolder;
	
	//删除页面记录
	$msql->query("delete from {P}_base_pageset where coltype='news' and pagename='$pagename'");
	
	//删除插件记录
	$msql->query("delete from {P}_base_plus where plustype='news' and pluslocat='$pagename'");
	
	//删除专题
	$msql->query("delete from {P}_news_proj where id='$id'");
	
	
	//删除文件和目录
	if($delfolder!="" && strlen($delfolder)>1 && !strstr($delfolder,".") && !strstr($delfolder,"/")){
		DelFold("../project/".$delfolder);
	}	
	
}


?> 
<div class="searchzone">
<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
   <td >
      <form method="get" action="news_proj.php">
        <input type="text" name="key" size="30" class="input" />
        <input type="submit" name="Submit2" value="<?php echo $strSearchTitle; ?>" class=button>
     </form>
    </td> 
	
      <td align="right" > 
	  
	  <form id="addProjForm" method="post" action="">
       <?php echo $strProjName; ?>  <input name="act" type="hidden" id="act" value="addproj" />
        <input type="text" name="project" class="input" size="18" />&nbsp;
        <?php echo $strProjFolder; ?> 
        &nbsp;<input name="folder" type="text" class="input" id="newfolder" size="12" maxlength="16" />
        &nbsp;<input type="submit" name="cd" value="<?php echo $strProjNew; ?>" class="button" />
      </form>
	  <div  id="notice" class="noticediv"></div>
	  </td>
      
    
  </tr>
</table>
</div>


<?php
$scl="  id!='0' ";

if($key!=""){
$scl.=" and project regexp '$key'  ";
}

$totalnums=TblCount("_news_proj","id",$scl);

$pages = new pages;		
$pages->setvar(array("key" => $key));

$pages->set(10,$totalnums);		                          
	
$pagelimit=$pages->limit();	  

?>
<div class="listzone">
<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td  class="biaoti" width="50" align="center"><?php echo $strNumber; ?></td>
    <td  class="biaoti" width="130" height="26"><?php echo $strProjName; ?> 
      </td>
    <td width="100"  class="biaoti"><?php echo $strProjFolder; ?></td>
    <td  class="biaoti"><?php echo $strProjUrl; ?></td>
    <td width="50"  class="biaoti"><?php echo $strProjEdit; ?></td>
    <td width="50"  class="biaoti"><?php echo $strDelete; ?></td>
    </tr>
  <?php
$msql->query("select * from {P}_news_proj where $scl order by id desc limit $pagelimit");

while($msql->next_record()){
$id=$msql->f("id");
$project=$msql->f("project");
$folder=$msql->f("folder");

$url="http://.../news/project/".$folder."/";
$href="../project/".$folder."/";

?> 
  <tr class=list>
    <td  width="50" align="center"><?php echo $id; ?></td>
   
      <td  width="130" height="30"> 
       <?php echo $project; ?>
      
 
      </td>
      <td width="100"  ><?php echo $folder; ?> </td>
      <td  ><a href='<?php echo $href; ?>' target='_blank'><?php echo $url; ?></a> </td>
      <td width="50"  ><img id='pr_<?php echo $folder; ?>' class='pdv_enter' src="images/edit.png"  style="cursor:pointer"  border="0" /> </td>
      <td width="50"  ><img src="images/delete.png"  style="cursor:pointer"   onclick="self.location='news_proj.php?step=del&id=<?php echo $id; ?>'" /> </td>
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

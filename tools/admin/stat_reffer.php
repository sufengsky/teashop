<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include(ROOTPATH."includes/pages.inc.php");
include("language/".$sLan.".php");
include("func/stat.inc.php");

NeedAuth(81);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>
</head>

<body>
<div class="lable" onClick="self.location='stat_main.php'"><?php echo $strStatCommon; ?></div>
<div class="lablenow" onClick="self.location='stat_reffer.php'"><?php echo $strStatFrom; ?></div>
<div class="lable" onClick="self.location='stat_more.php'"><?php echo $strStatFromPM; ?></div>
<div class="lable" onClick="self.location='stat_date.php'"><?php echo $strStatDay; ?></div>
<div class="lable" onClick="self.location='stat_month.php'"><?php echo $strStatMon; ?></div>
<div class="lable" onClick="self.location='stat_set.php'"><?php echo $strStatSet; ?></div>

<div class="formzone">
<div class="tablezone">
<form method="get" action="stat_reffer.php">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  height="29">
    <tr> 
      
        <td class=pages colspan="2"> <?php echo DayList("fromY","fromM","fromD",$fromY,$fromM,$fromD); ?> 
          - <?php echo DayList("toY","toM","toD",$toY,$toM,$toD); ?> 
          <input type="hidden" name="tp" value="search">
          <input type="text" name="key" size="18" value="<?php echo $key; ?>" class="input" />
          <input type="submit" name="Submit" value="<?php echo $strQuery; ?>" class="button" />
        </td>
      

    </tr>
  </table>
 </form>
</div>

<?php

	if(!isset($fromM) || !isset($toM)){
		$fromY=date("Y",time());
		$fromM=date("n",time());
		$fromD=date("j",time());
		$toY=date("Y",time());
		$toM=date("n",time());
		$toD=date("j",time());		
	
	}
	$fromtime=mktime(0,0,0,$fromM,$fromD,$fromY);
	$totime=mktime(23,59,59,$toM,$toD,$toY);




		
	$scl=" time>=$fromtime and time<=$totime ";
	
	if($key!=""){
		$scl.=" and urlform  regexp '$key' ";
	}

	$totalnums=TblCount("_tools_statcount","id",$scl);

	$pages = new pages;		
	$pages->setvar(array("key" => $key,"tp" => $tp,"fromY" => $fromY,"fromM" => $fromM,"fromD" => $fromD,"toY" => $toY,"toM" => $toM,"toD" => $toD));

	$pages->set(10,$totalnums);		                          
		
	$pagelimit=$pages->limit();	  

?>
<div class="tablezone">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr> 
      <td  class="innerbiaoti" width="160" height="25"><?php echo $strStatFtime; ?></td>
      <td  class="innerbiaoti" width="100" height="25"><?php echo $strStatFIP; ?></td>
      <td  class="innerbiaoti" height="25"><?php echo $strStatFUrl; ?></td>
      <td  class="innerbiaoti" height="25"><?php echo $strStatFPage; ?></td>
      </tr>
    <?php
	
	$msql -> query ("select * from {P}_tools_statcount where $scl order by id desc limit $pagelimit");
	while ($msql -> next_record ()) {
		$time = $msql -> f ('time');
		$ip = $msql -> f ('ip');
		$os = $msql -> f ('os');
		$ie = $msql -> f ('browse');
		$from = $msql -> f ('urlform');
		$nowpage = $msql -> f ('nowpage');
		$member = $msql -> f ('member');
		$time=date("Y-n-j H:i:s",$time);
		$from1=csubstr($from,0,35);
		$nowpage1=str_replace($SiteUrl,"",$nowpage);
		$nowpage1=csubstr($nowpage1,0,25);

		if(substr($member,0,2)=="10" || substr($member,0,2)=="11"){
			$member1=$strGuest;
		}else{
			$member1=$member;
		}

		if($from1==""){
			$from1=$strStatInput;
		}
	

	?> 
    <tr class="list"> 
      <td width="160"><?php echo $time;?></td>
      <td width="100" ><?php echo $ip;?></td>
      <td   ><?php echo "<a href=$from target=_blank title='".$from."'>".$from1."</a>"; ?></td>
      <td   ><?php echo "<a href=$nowpage target=_blank title='".$nowpage."'>".$nowpage1."</a>"; ?></td>
      </tr>
    <?php
	}
	?> 
  </table>
  
 </div>
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

<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(121);
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

<body >
<?php
$pid=$_REQUEST["pid"];
$step=$_REQUEST["step"];
$cc=$_REQUEST["cc"];

if(!isset($pid) || $pid==""){
$pid=0;
}


if($step=="add" && $_REQUEST["cat"]!="" && $_REQUEST["cat"]!=" "){
	$cat= $_REQUEST["cat"];
	$cat=htmlspecialchars($cat);
	

	if($pid!="0"){
		$msql->query("select catpath from {P}_news_cat where catid='$pid'");
		if($msql->next_record()){
			$pcatpath=$msql->f('catpath');
		}
	}

	$msql->query("select max(xuhao) from {P}_news_cat where pid='$pid'");
		if($msql->next_record()){
			$maxxuhao=$msql->f('max(xuhao)');
			$nowxuhao=$maxxuhao+1;
		}

	$msql->query("insert into {P}_news_cat set
	`pid`='$pid',
	`cat`='$cat',
	`xuhao`='$nowxuhao',
	`catpath`='$catpath',
	`nums`='0',
	`tj`='0',
	`ifchannel`='0'
	");

    $nowcatid=$msql->instid();
	$nowpath=fmpath($nowcatid);
	$catpath=$pcatpath.$nowpath.":";

	$msql->query("update {P}_news_cat set catpath='$catpath' where catid='$nowcatid'");

}
if($step=="del"){

	$catid=$_GET["catid"];
	$pid=$_GET["pid"];
	

	$msql->query("select id from {P}_news_con where catid='$catid' ");
	if($msql->next_record()){
		err($strNewsNotice1,"","");
		exit;
	}
	$msql->query("select catid from {P}_news_cat where pid='$catid'");
	if($msql->next_record()){
		err($strNewsNotice2,"","");
		exit;
	}

	$msql->query("select ifchannel from {P}_news_cat where catid='$catid'");
	if($msql->next_record()){
		$ifchannel=$msql->f('ifchannel');
	}
	if($ifchannel!=0){
		err($strNewsNotice9,"","");
		exit;
	}
	
	$msql->query("delete from {P}_news_cat where catid='$catid'");


}


if($step=="modi"){
	
	$cat=$_GET["cat"];
	$catid=$_GET["catid"];
	$pid=$_GET["pid"];
	$xuhao=$_GET["xuhao"];
	
	$tj=$_GET["tj"];
	$cat=htmlspecialchars($cat);

	$msql->query("update {P}_news_cat set cat='$cat',xuhao='$xuhao' where catid='$catid' ");

	$msql->query("update {P}_news_cat set tj='$tj' where catpath regexp '".fmpath($catid)."' ");


}

?> 
<div class="searchzone">
<table width="100%" border="0" cellspacing="0" cellpadding="2" height="30">
  <tr> 
   
                  
      <td width="80"  height="30"> 
	  <select name="pid" onChange="self.location=this.options[this.selectedIndex].value">
	  <option value='news_cat.php'><?php echo $strNewsSelCat; ?></option>
         <?php
				$fsql -> query ("select * from {P}_news_cat order by catpath");
				while ($fsql -> next_record ()) {
					$lpid = $fsql -> f ("pid");
					$lcatid = $fsql -> f ("catid");
					$cat = $fsql -> f ("cat");
					$catpath = $fsql -> f ("catpath");
					$lcatpath = explode (":", $catpath);

					
					
						for ($i = 0; $i < sizeof ($lcatpath)-2; $i ++) {
							$tsql->query("select catid,cat from {P}_news_cat where catid='$lcatpath[$i]'");
							if($tsql->next_record()){
								$ncatid=$tsql->f('cat');
								$ncat=$tsql->f('cat');
								$ppcat.=$ncat."/";
							}
						}
						
						if($pid==$lcatid){
							echo "<option value='news_cat.php?pid=".$lcatid."' selected>".$ppcat.$cat."</option>";
						}else{
							echo "<option value='news_cat.php?pid=".$lcatid."'>".$ppcat.$cat."</option>";
						}
						$ppcat="";
					
					
				}
		 ?>
        </select>
        
                    
      </td>
    
             
  
      <td align="right" > <form name="addcat" method="get" action="news_cat.php"  onSubmit="return catCheckform(this)">
        <input type="hidden" name="step" value="add" />
        <select name="pid" id="pid" >
          <option value='0'><?php echo $strCatTopAdd; ?></option>
          <?php
				$fsql -> query ("select * from {P}_news_cat order by catpath");
				while ($fsql -> next_record ()) {
					$lpid = $fsql -> f ("pid");
					$lcatid = $fsql -> f ("catid");
					$cat = $fsql -> f ("cat");
					$catpath = $fsql -> f ("catpath");
					$lcatpath = explode (":", $catpath);

					
					
						for ($i = 0; $i < sizeof ($lcatpath)-2; $i ++) {
							$tsql->query("select catid,cat from {P}_news_cat where catid='$lcatpath[$i]'");
							if($tsql->next_record()){
								$ncatid=$tsql->f('cat');
								$ncat=$tsql->f('cat');
								$ppcat.=$ncat."&gt;";
							}
						}
						
						if($pid==$lcatid){
							echo "<option value='".$lcatid."' selected>".$strCatLocat1.$ppcat.$cat."</option>";
						}else{
							echo "<option value='".$lcatid."'>".$strCatLocat1.$ppcat.$cat."</option>";
						}
						$ppcat="";
					
					
				}
		 ?>
        </select>
        <input name="cat" type="text" class="input" value="<?php echo $strNewsCatName; ?>" size="15" onFocus="this.value=''" />
        <input type="Submit" name="Submit" value="<?php echo $strCatAdd;?>" class="button" />
      </form>
	</td> 
  </tr>
</table>

</div>

<div class="listzone">

<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td width="38"  class="biaoti"><?php echo $strNumber; ?></td> 
    <td width="38"  class="biaoti"><?php echo $strXuhao; ?></td>
    <td width="135"  class="biaoti"><?php echo $strCat; ?> </td>
    <td width="38"  class="biaoti"><?php echo $strNewsList6; ?></td>
    <td width="100"  class="biaoti"><?php echo $strModify; ?></td>
    <td width="36"  class="biaoti"><?php echo $strZl; ?></td>
    <td  class="biaoti"><?php echo $strZlUrl; ?></td>
    <td width="38"  class="biaoti"><?php echo $strZlEdit; ?></td>
    <td width="38"  class="biaoti"><?php echo $strColProp; ?></td>
    <td width="38"  class="biaoti"><?php echo $strDelete; ?></td>
  </tr>
  <?php
$msql->query("select * from {P}_news_cat where  pid='$pid' order by xuhao");

while($msql->next_record()){
$catid=$msql->f("catid");
$cat=$msql->f("cat");
$xuhao=$msql->f("xuhao");
$pid=$msql->f("pid");
$tj=$msql->f("tj");
$catpath=$msql->f("catpath");
$ifchannel=$msql->f("ifchannel");

if($ifchannel=="1"){
	$href="../class/".$catid."/";
	$url="http://.../news/class/".$catid."/";
}else{
	$href="../class/?".$catid.".html";;
	$url="http://.../news/class/?".$catid.".html";
}

?> 
  <tr class="list">
    <td width="38"  ><?php echo $catid; ?>
    </td> 
    <form method="get" action="news_cat.php">
      <td width="38"  > 
        <input type="text" name="xuhao" size="3" value="<?php echo $xuhao; ?>" class="input" />
      </td>
      <td width="135"  > 
        <input type="text" name="cat" size="16" value="<?php echo $cat; ?>" class="input" />
          <input type="hidden" name="catid" value="<?php echo $catid; ?>" />
        <input type="hidden" name="step" value="modi" />
        <input type="hidden" name="pid" value="<?php echo $pid; ?>" />
        
      </td>
      <td width="38"  ><input type="checkbox" name="tj" value="1" <?php echo checked($tj,"1"); ?> /></td>
      <td width="100"><input type="image"  name="imageField" src="images/modi.png" width="24" height="24" />
      </td>
      <td width="36"  ><input type="checkbox" id="setchannel_<?php echo $catid; ?>" name="setchannel" value="<?php echo $cat; ?>" <?php echo checked($ifchannel,"1"); ?> class="setchannel" />
        <input id="href_<?php echo $catid; ?>" type="hidden" name="href" value="<?php echo $href; ?>"  /></td>
      <td  id="url_<?php echo $catid; ?>"><a href='<?php echo $href; ?>' target='_blank'><?php echo $url; ?></a> </td>
      <td width="38"  ><img id='pr_<?php echo $catid; ?>' class='pr_enter' src="images/edit.png"  style="cursor:pointer"  border="0" /> </td>
      <td width="38"  ><img src="images/prop.png" border=0 style="cursor:pointer;display:<?php echo $listdis; ?>" onClick="Dpop('prop_frame.php?catid=<?php echo $catid; ?>&pid=<?php echo $pid; ?>','600','520')"></td>
      <td width="38"  > <img src="images/delete.png"  style="cursor:pointer"  border=0 onClick="self.location='news_cat.php?step=del&catid=<?php echo $catid; ?>&pid=<?php echo $pid; ?>'"></td>
    </form>
  </tr>
  <?php
}
?> 
</table>
</div>

</body>
</html>

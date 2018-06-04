<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
include("func/photovote.inc.php");
NeedAuth(83);

$action=$_REQUEST["action"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link  href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $strAdminTitle; ?></title>

<script>  
blank = new Image(); blank.src = "images/blank.gif";
aqua = new Image(); aqua.src = "images/aqua.gif";
blue = new Image(); blue.src = "images/blue.gif";
brown = new Image(); brown.src = "images/brown.gif";
darkgreen = new Image(); darkgreen.src = "images/darkgreen.gif";
gold = new Image(); gold.src = "images/gold.gif";
green = new Image(); green.src = "images/green.gif";
grey = new Image(); grey.src = "images/grey.gif";
orange = new Image(); orange.src = "images/orange.gif";
pink = new Image(); pink.src = "images/pink.gif";
purple = new Image(); purple.src = "images/purple.gif";
red = new Image(); red.src = "images/red.gif";
yellow = new Image(); yellow.src = "images/yellow.gif";

function ChangeBar(sel,img) {
  eval("document.bar"+img+".src="+sel+".src");
}


function del_entry(entry) {
 if (window.confirm("<?php echo $strDeleteConfirm; ?>")) {
    window.location.href = "http://"+window.location.host+window.location.pathname+"?action=delete&id="+entry
 }


function ResetPoll() {
  for (i=4; i<document.forms[0].elements.length-6; i+=3) {
   document.forms[0].elements[i].value = '0';
  }
}

function CheckDays() {
  if(!(document.poll.exp_time.value >= 0)) {
    alert("Invalid value");
    document.poll.exp_time.focus();
    return false;
  }
}
 
}
</script>
</head>
<body>
<div class="<?php if($action=="show" || $action=="modify"){echo "lablenow";}else{echo "lable";}?>" onClick="self.location='photopoll_set.php?action=show'"><?php echo $strVoteList; ?></div>
<div class="<?php if($action=="new"){echo "lablenow";}else{echo "lable";}?>" onClick="self.location='photopoll_set.php?action=new'"><?php echo $strVoteCreate; ?></div>
<div style="display:none;" class="<?php if($action=="option"){echo "lablenow";}else{echo "lable";}?>" onClick="self.location='photopoll_set.php?action=option'"><?php echo $strVoteSet; ?></div>

<div class="formzone">

<?php

$cc=$_REQUEST["cc"];
$id=$_REQUEST["id"];


$vote = new Vote;

if($cc==$strVoteNewGroup){
 $vote -> create_poll();
 SayOk($strVoteCreatOk,$PHP_SELF . "?$action=new","");
}


if (!isset($action)) {
    $action='';
}


if ($action=="delete") {
 echo $vote -> delete_poll($id);
}
?>



<?php if($action=="new" || $action==""){?> 

<!----------------------------创建投票组部分---------------------------------->
<div class="tablezone">

<form action="" method="post" name="poll">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
  
          <tr> 
            <td width="90" >
            <?php echo $strVoteTitle; ?>
            </td>
			<td>
            <input name="groupname" type="text" id="groupname" size="50" class="input" />
            </td>
          </tr>
</table>
		  <table width="100%" border="0" cellpadding="5" cellspacing="0">

          <tr> 
		  
            <td >
              <?php echo $strVoteStat; ?>
                <select name="status" id="status">
            <option value="0"><?php echo $strClose; ?></option>
            <option value="1" selected ><?php echo $strOpen; ?></option>
            <option value="2"><?php echo $strHidden; ?></option>
          </select>
          <?php echo $strVoteExpday; ?> 
                
          <input name="day" type="text" id="day" size="3" value="30">
                
                <input name="expire" type="checkbox" id="expire" value="1" /><?php echo $strVoteNotExp; ?> 
                <input name="Resert" type="reset" id="Resert" value="<?php echo $strVoteReset; ?>" class="input" />
				<input name="cc" type="submit" id="cc" value="<?php echo $strVoteNewGroup; ?>" class="button" />
             
            </td>
          </tr>
  
</table>
</form>
</div>
<!----------------------------创建投票组部分结束---------------------------------->

<?php }elseif($action=="show"){?> 

<!----------------------------投票组清单部分---------------------------------->
<div class="tablezone">

<table width="100%" height="73" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td height="23" class="innerbiaoti" width="30"> 
      <?php echo $strNumber; ?>    </td>
    <td class="innerbiaoti"> 
    <?php echo $strVoteTitle; ?>    </td>
    <td width="120" class="innerbiaoti">状态</td>
    <td width="120" class="innerbiaoti"> 
      <?php echo $strVotedate; ?>    </td>
    <td width="100" class="innerbiaoti"> 
     <?php echo $strVoteExpday; ?>    </td>
    <td width="120" class="innerbiaoti"> 
      <?php echo $strVoteExpday1; ?>    </td>

	 
    <td width="50" class="innerbiaoti"><?php echo $strModify; ?></td>
    <td width="50" class="innerbiaoti"> 
     <?php echo $strDelete; ?>    </td>
  </tr>
  <?php 
		  function listpoll(){
		  	global $msql, $auth, $pollvars, $entry, $lang, $weekday,$months;
			if(!isset($entry)) {
            	$entry = 0;
            }
			$msql->query(" SELECT * FROM {P}_tools_photopollindex order by id desc ");
			while($msql->next_record()){
			   $poll_id = $msql->f('id');
			   $groupname = $msql->f('groupname');
			   $timestamp = $msql->f('timestamp');
			   $status = $msql->f('status');
			   $exp_time = $msql->f('exp_time');
			   $expire = $msql->f('expire');
			   
			   $etime = $exp_time-$timestamp;
			   $etime = date("d",$etime)-1;
			   $timestamp = date("Y-n-j",$timestamp);
			   $exp_time = date("Y-n-j",$exp_time);
				
				if($status==0){
					$str_status="关闭";
				}elseif($status==1){
					$str_status="打开";
				}elseif($status==2){
					$str_status="隐藏";
				}else{
					$str_status="未知";
				}
				
				if($expire==1){
					$str_etime="--";
					$str_exp_time="不过期";
				}else{
					$str_etime=$etime;
					$str_exp_time=$exp_time;
				}
			  
			   
			   $lis_string.= "<tr class=\"list\">
			   
			   <td >$poll_id</td><td height=\"23\" class=\"ppg\"><a href=\"photopoll_con.php?gid=$poll_id\">$groupname</a></td>
			   <td >$str_status</td>
			   <td >$timestamp</td>
			   <td >$str_etime</td>
			   <td >$str_exp_time</td>
			   <td ><a href=photopoll_set.php?action=modify&pollid=$poll_id><img src=images/edit.png border=0></a></td>
			   <td ><a href=\"javascript:del_entry($poll_id)\"><img src=images/delete.png border=0></a></td>
			   </tr>";
			}
			return $lis_string;
		  }
		  echo listpoll();
		?> 
</table>
</div>
<!----------------------------投票组清单部分结束---------------------------------->

<?php }elseif($action=="option"){?> 

<!----------------------------参数设置部分---------------------------------->
<div class="tablezone">

<?php
if($cc==$strVoteModiSet){

$img_height=$_POST["img_height"];
$img_length=$_POST["img_length"];
$vodinfo=$_POST["vodinfo"];

					$msql->query(" UPDATE {P}_tools_photopollconfig SET 
						img_height = '$img_height',
						img_length = '$img_length',
						vodinfo = '$vodinfo'
					");
				SayOk($strVoteModiSetOk,"","");
}
?>
<form action="" method="post" name="poll">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
  
       
          <?php 
				
				$msql->query(" SELECT * from {P}_tools_photopollconfig ");
				if($msql->next_record()){
					$img_height = $msql -> f('img_height');
					$img_length = $msql -> f('img_length');
					$vodinfo = $msql -> f('vodinfo');
				}
		  ?>
          <tr> 
            <td width="120" >
        <?php echo $strVoteHeight; ?>
      </td>
            <td ><input name="img_height" type="text" id="img_height" value="<?php echo $img_height;?>" size="30" class="input" /></td>
          </tr>
          <tr> 
            <td width="120" >
       <?php echo $strVoteLen; ?>
      </td>
            <td ><input name="img_length" type="text" id="img_length" value="<?php echo $img_length;?>" size="30" class="input" /></td>
          </tr>
          <tr> 
            <td width="120" ><?php echo $strVoteAl; ?></td>
            <td ><input name="vodinfo" type="text" id="vodinfo" value="<?php echo $vodinfo;?>" size="30" class="input" /></td>
          </tr>
          <tr>
            <td width="120" >&nbsp;</td>
            <td ><input name="cc" type="submit" id="cc" value="<?php echo $strVoteModiSet; ?>" class="button" /></td>
          </tr>
       
  </table>
  </form>
</div>
<!----------------------------参数设置部分结束---------------------------------->

<?php 
}elseif($action=="modify"){

	$pollid=$_REQUEST["pollid"];
?> 

<!----------------------------投票组修改部分---------------------------------->
<div class="tablezone">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
        
        <form action="" method="post" name="poll">
          <?php 
			function modify_poll($poll_id){

				$groupname=$_POST["groupname"];
				$cc=$_POST["cc"];
				$votes=$_POST["votes"];
				$status=$_POST["status"];
				

				global $msql;
				global $strVoteSel,$strModifyOk,$strVoteSave,$strClose,$strOpen,$strHidden,$strVoteTitle;
			    global $strVoteColor1,$strVoteColor2,$strVoteColor3,$strVoteColor4,$strVoteColor5,$strVoteColor6;
			    global $strVoteColor7,$strVoteColor8,$strVoteColor9,$strVoteColor10,$strVoteColor11,$strVoteColor12;


				if($cc == $strVoteSave){ 

					$uptime=time();

					$msql -> query(" UPDATE {P}_tools_photopollindex SET
						cat = '$groupname',
						groupname = '$groupname',
						status = '$status'
					 where id = '$poll_id' ");
					 					
					SayOk($strModifyOk,"","");
				}


				$msql->query(" SELECT * FROM {P}_tools_photopollindex WHERE id = '$poll_id' ");
				if($msql->next_record()){
				  $groupname = $msql -> f('groupname');
					$status = $msql -> f('status');
				  $modify_string = "<tr><td width=\"90\" >".$strVoteTitle."</td><td  >
				  <input type=\"text\" name=\"groupname\" value=\"$groupname\" size=\"29\" class=\"input\" />
				  <select name=\"status\" id=\"status\">
                  <option value=\"0\" ".seld($status,0).">".$strClose."</option><option value=\"1\"  ".seld($status,1).">".$strOpen."</option><option value=\"2\"  ".seld($status,2).">".$strHidden."</option></select></td></tr>";
				}

				$modify_string .= "<tr><td ></td><td ><input type=\"submit\" name=\"cc\" value=\"".$strVoteSave."\"></td></tr>";
				return $modify_string;
			}
		    echo modify_poll($pollid);
		?>
        </form>
  </table>
</div>
<!----------------------------投票组修改部分结束---------------------------------->
	  
<?php }?> 

</div>	
</body>
</html>
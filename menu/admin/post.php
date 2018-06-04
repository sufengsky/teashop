<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/admin.inc.php");
include("language/".$sLan.".php");
NeedAuth(11);

$act=$_POST["act"];

switch($act){
	
	
	//读取左侧菜单组
	case "menugrouplist" :
		
		$str="";
		$i=1;
		$msql->query("select * from {P}_menu_group order by id");
		while($msql->next_record()){
			$groupid=$msql->f('id');
			$groupname=$msql->f('groupname');
			$str.="<li id='m".$i."' class='menulist'><a href='menu.php?groupid=".$groupid."' target='con' class='menulist'>".$groupname."</a></li>";
			$i++;
		}
		echo $str;
		exit;

	break;



	//添加菜单组
	case "addgroup" :
		
		
		$groupname=$_REQUEST["groupname"];

		if($groupname=="" || $groupname==$strGroupAddName){
			echo $strGroupAddName;
			exit;
		}

		$msql->query("insert into {P}_menu_group set
			`groupname`='$groupname',
			`xuhao`='1',
			`moveable`='1'
		");
		echo "OK";
		exit;

	break;


	//删除菜单组
	case "delgroup" :
		
		
		$groupid=$_POST["groupid"];

		$msql->query("select moveable from {P}_menu_group where id='$groupid' ");
		if($msql->next_record()){
			$moveable=$msql->f('moveable');
			if($moveable!='1'){
				echo $strGroupNTC1;
				exit;
			}
		}
		
		$fsql->query("delete from {P}_menu where groupid='$groupid' ");
		$msql->query ("delete from {P}_menu_group where id='$groupid' ");
	
		echo "OK";
		exit;

	break;


}
?>
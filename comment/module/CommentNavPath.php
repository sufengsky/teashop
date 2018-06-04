<?php

/*
	[插件名称] 点评模块导航条
	[适用范围] 点评模块
*/


function CommentNavPath(){

	global $msql,$strMemberComment;


	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$pagename=$GLOBALS["PLUSVARS"]["pagename"];

	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);


	$var=array (
		'coltitle' => $coltitle,
		'sitename' => $GLOBALS["CONF"]["SiteName"],
	);

	$str=ShowTplTemp($TempArr["start"],$var);


	//显示模块频道名称
	if($GLOBALS["COMMENTCONF"]["ChannelNameInNav"]=="1"){
		$var=array (
			'channel' => $GLOBALS["COMMENTCONF"]["ChannelName"]
		);

		$str.=ShowTplTemp($TempArr["col"],$var);

		//页头标题
		$GLOBALS["pagetitle"]=$GLOBALS["COMMENTCONF"]["ChannelName"];
	}


	switch($pagename){

		case "query":
			
			if(strstr($_SERVER["QUERY_STRING"],".html")){
				$Arr=explode(".html",$_SERVER["QUERY_STRING"]);
				$nowcatid=$Arr[0];
			}elseif($_GET["catid"]>0){
				$nowcatid=$_GET["catid"];
			}else{
				$nowcatid=0;
			}
			if($nowcatid!="0"){
				$msql->query("select * from {P}_comment_cat where catid='$nowcatid'");
				if($msql->next_record()){
					$cat=$msql->f('cat');
					$catid=$msql->f('catid');
				}

				if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."comment/class/".$catid.".html")){
					$url=ROOTPATH."comment/class/".$catid.".html";
				}else{
					$url=ROOTPATH."comment/class/?".$catid.".html";
				}

				$var=array (
				'nav' => $cat,
				'url' => $url
				);
				$str.=ShowTplTemp($TempArr["list"],$var);
				$GLOBALS["pagetitle"].="-".$cat;
			}


			if($_GET["mid"]!=""){
				$msql->query("select pname from {P}_member where memberid='".$_GET["mid"]."'");
				if($msql->next_record()){
					$pname=$msql->f('pname');
				}
				$var=array ('nav' => $pname.$strMemberComment);
				$str.=ShowTplTemp($TempArr["con"],$var);
				$GLOBALS["pagetitle"]=$pname.$strMemberComment;
			}
			
			


		break;

		case "detail":

		$var=array (
		'nav' => $GLOBALS["commenttitle"],
		);
		$str.=ShowTplTemp($TempArr["con"],$var);

		$GLOBALS["pagetitle"].="-".$GLOBALS["commenttitle"];


		break;	

		case "main":


		break;	

		
	}




	$str.=$TempArr["end"];
	return $str;
}

?>
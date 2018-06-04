<?php

/*
	[插件名称] 赠品详情插件
	[适用范围] 详情页
*/


function HzDetail(){

	global $fsql,$msql;

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];

	//获取地址栏参数
	if(strstr($_SERVER["QUERY_STRING"],".html")){
		$idArr=explode(".html",$_SERVER["QUERY_STRING"]);
		$id=$idArr[0];
	}elseif(isset($_GET["id"]) && $_GET["id"]!=""){
		$id=$_GET["id"];
	}	


	//模版解释
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$fsql->query("select * from {P}_hz_con where id='$id'");
	if($fsql->next_record()){
		$title=$fsql->f('title');
		$body=$fsql->f('body');
		$catid=$fsql->f('catid');
		$catpath=$fsql->f('catpath');
		$cent=$fsql->f('cent');
		$kucun=$fsql->f('kucun');
		$dtime=$fsql->f('dtime');
		$nowcatid=$fsql->f('catid');
		$ifbold=$fsql->f('ifbold');
		$ifred=$fsql->f('ifred');
		$author=$fsql->f('author');
		$source=$fsql->f('source');
		$type=$fsql->f('type');
		$src=$fsql->f('src');
		$cl=$fsql->f('cl');
		$prop1=$fsql->f('prop1');
		$prop2=$fsql->f('prop2');
		$prop3=$fsql->f('prop3');
		$prop4=$fsql->f('prop4');
		$prop5=$fsql->f('prop5');
		$prop6=$fsql->f('prop6');
		$prop7=$fsql->f('prop7');
		$prop8=$fsql->f('prop8');
		$prop9=$fsql->f('prop9');
		$prop10=$fsql->f('prop10');
		$prop11=$fsql->f('prop11');
		$prop12=$fsql->f('prop12');
		$prop13=$fsql->f('prop13');
		$prop14=$fsql->f('prop14');
		$prop15=$fsql->f('prop15');
		$prop16=$fsql->f('prop16');
		$prop17=$fsql->f('prop17');
		$prop18=$fsql->f('prop18');
		$prop19=$fsql->f('prop19');
		$prop20=$fsql->f('prop20');
		$memo=$fsql->f('memo');
		$iffb=$fsql->f('iffb');
		
	}else{
		$str.=$TempArr["err1"];
		return $str;
	}

	$fsql->query("update {P}_hz_con set cl=cl+1 where id='$id'");
	
	//发布校验-管理员可看
	if(AdminCheckModle()==false && $iffb!="1"){
		$str.=$TempArr["err1"];
		return $str;
	}

	//定义全局变量，使内容阅读权限限制时不生成静态页
	$GLOBALS["consecure"]=$secure;


	//页头标题定义
	$GLOBALS["pagetitle"]=$title;
	

	//判断阅读权限
	if($secure>0){
		if(AdminCheckModle()==false && (!isLogin() || $_COOKIE["SE"]<$secure)){
			$str.=$TempArr["err2"];
			return $str;
		}
	}

	$dtime=date("Y-m-d H:i:s",$dtime);

	if($src==""){$src="huanzeng/pics/nopic.gif";}
	$src=ROOTPATH.$src;

	if($memo!=""){
		$memo=nl2br($memo);
		$showmemo="block";
	}else{
		$showmemo="none";
	}

	//属性列
	$propstr="";

	$i=1;
	$msql->query("select * from {P}_hz_prop where catid='$catid' order by xuhao");
	while($msql->next_record()){
		$propname=$msql->f('propname');
		$pn="prop".$i;

		$pstr=str_replace("{#propname#}",$propname,$TempArr["list"]);
		$pstr=str_replace("{#prop#}",$$pn,$pstr);

		$propstr.=$pstr;

	$i++;
	}


	$var=array (
		'sitename' => $GLOBALS["CONF"]["SiteName"],
		'gid' => $id, 
		'id' => $id,
		'title' => $title,
		'cent' => $cent,
		'kucun' => $kucun,
		'salenums' => $salenums, 
		'body' => $body,
		'dtime' => $dtime,
		'cl' => $cl,
		'iffb' => $iffb,
		'src' => $src,
		'author' => $author,
		'source' => $source,
		'memo' => $memo, 
		'propstr' => $propstr, 
		'showmemo' => $showmemo 
	);

    $str=ShowTplTemp($TempArr["start"],$var);

	

	$str.=$TempArr["end"];

	return $str;


}

?>
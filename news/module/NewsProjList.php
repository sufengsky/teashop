<?php

/*
	[插件名称] 同主题内容列表插件
	[适用范围] 详情页
*/

function NewsProjList(){

	global $fsql,$msql;
	


		$shownums=$GLOBALS["PLUSVARS"]["shownums"];
		$showtj=$GLOBALS["PLUSVARS"]["showtj"];
		$cutword=$GLOBALS["PLUSVARS"]["cutword"];
		$catid=$GLOBALS["PLUSVARS"]["catid"];
		$target=$GLOBALS["PLUSVARS"]["target"];
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];



		//获取地址栏参数
		if(strstr($_SERVER["QUERY_STRING"],".html")){
			$idArr=explode(".html",$_SERVER["QUERY_STRING"]);
			$id=$idArr[0];
		}elseif(isset($_GET["id"]) && $_GET["id"]!=""){
			$id=$_GET["id"];
		}

		$id=htmlspecialchars($id);


		//查找条件		

		$fsql->query("select proj from {P}_news_con where id='$id'");
		if($fsql->next_record()){
			$proj=$fsql->f('proj');
		}

		$scl=" id!='$id' and iffb='1' and catid!='0' and ( id=0 ";

		$arr=explode(":",$proj);
		for($i=0;$i<sizeof($arr)-1;$i++){
			$scl.=" or proj regexp '$arr[$i]' ";
		}
		$scl.=" ) ";

		
		if($showtj!="" && $showtj!="0"){
			$scl.=" and tj='1' ";
		}

		
		//显示分类规则:如果后台不指定分类,则不限分类

		if($catid!=0 && $catid!=""){
			$catid=fmpath($catid);
			$scl.=" and catpath regexp '$catid' ";
		}




		//模版解释
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];

		$picnum=1;
		$fsql->query("select * from {P}_news_con where $scl order by uptime desc limit 0,$shownums");

		while($fsql->next_record()){
			
			$id=$fsql->f('id');
			$title=$fsql->f('title');
			$catpath=$fsql->f('catpath');
			$dtime=$fsql->f('dtime');
			$nowcatid=$fsql->f('catid');
			$ifnew=$fsql->f('ifnew');
			$ifred=$fsql->f('ifred');
			$ifbold=$fsql->f('ifbold');
			$author=$fsql->f('author');
			$source=$fsql->f('source');
			$cl=$fsql->f('cl');
			$src=$fsql->f('src');
			$cl=$fsql->f('cl');
			$fileurl=$fsql->f('fileurl');
			$downcount=$fsql->f('downcount');
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
			$mid=$fsql->f('memberid');

			if($mid>0){
				$memberurl=ROOTPATH."member/home.php?mid=".$mid;
			}else{
				$memberurl="#";
			}

			

			if($GLOBALS["CONF"]["CatchOpen"]=="1" && file_exists(ROOTPATH."news/html/".$id.".html")){
				$link=ROOTPATH."news/html/".$id.".html";
			}else{
				$link=ROOTPATH."news/html/?".$id.".html";
			}

	
			
			$dtime=date("m/d",$dtime);

			if($ifbold=="1"){$bold=" style='font-weight:bold' ";}else{$bold="";}

			if($ifred!="0"){$red=" style='color:".$ifred."' ";}else{$red="";}

			if($cutword!="0"){$title=csubstr($title,0,$cutword);}


			if($src==""){$src="news/pics/nopic.gif";}
			
			$src=ROOTPATH.$src;

			$downurl=ROOTPATH."news/download.php?id=".$id;


			//显示所属分类
			$msql->query("select cat from {P}_news_cat where catid='$nowcatid'");
			if($msql->next_record()){
				$cat=$msql->f('cat');
			}



			//模版标签解释

			$var=array (
			'title' => $title, 
			'memo' => $memo,
			'dtime' => $dtime, 
			'red' => $red, 
			'bold' => $bold,
			'link' => $link,
			'target' => $target,
			'author' => $author, 
			'memberurl' => $memberurl, 
			'source' => $source,
			'cat' => $cat, 
			'catstr' => $catstr, 
			'src' => $src, 
			'cl' => $cl, 
			'picnum' => $picnum, 
			'downurl' => $downurl, 
			'fileurl' => $fileurl, 
			'downcount' => $downcount, 
			'prop1' => $prop1,
			'prop2' => $prop2,
			'prop3' => $prop3,
			'prop4' => $prop4,
			'prop5' => $prop5,
			'prop6' => $prop6,
			'prop7' => $prop7,
			'prop8' => $prop8,
			'prop9' => $prop9,
			'prop10' => $prop10,
			'prop11' => $prop11,
			'prop12' => $prop12,
			'prop13' => $prop13,
			'prop14' => $prop14,
			'prop15' => $prop15,
			'prop16' => $prop16,
			'prop17' => $prop17,
			'prop18' => $prop18,
			'prop19' => $prop19,
			'prop20' => $prop20,
			'propname1' => $propname1,
			'propname2' => $propname2,
			'propname3' => $propname3,
			'propname4' => $propname4,
			'propname5' => $propname5,
			'propname6' => $propname6,
			'propname7' => $propname7,
			'propname8' => $propname8,
			'propname9' => $propname9,
			'propname10' => $propname10,
			'propname11' => $propname11,
			'propname12' => $propname12,
			'propname13' => $propname13,
			'propname14' => $propname14,
			'propname15' => $propname15,
			'propname16' => $propname16,
			'propname17' => $propname17,
			'propname18' => $propname18,
			'propname19' => $propname19,
			'propname20' => $propname20
			);
			$str.=ShowTplTemp($TempArr["list"],$var);


		$picnum++;

		}

		$str.=$TempArr["end"];

		return $str;

}

?>
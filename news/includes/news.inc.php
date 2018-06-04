<?php


NewsConfig();


//模块参数设置
function NewsConfig(){

	global $msql;

	$msql->query("select * from {P}_news_config");
	while($msql->next_record()){
	
	$variable=$msql->f('variable');
	$value=$msql->f('value');
	$GLOBALS["NEWSCONF"][$variable]=$value;
	}

}


//网址转发(1.4.3/20100922)

function NewsToUrl(){

	global $fsql,$SiteUrl;
	
	if(strstr($_SERVER["QUERY_STRING"],".html")){
		$idArr=explode(".html",$_SERVER["QUERY_STRING"]);
		$id=$idArr[0];
	}elseif(isset($_GET["id"]) && $_GET["id"]!=""){
		$id=$_GET["id"];
	}
	$tourl="";
	$fsql->query("select * from {P}_news_con where id='$id' limit 0,1");
	if($fsql->next_record()){
		$tourl=$fsql->f('tourl');
	}
	
	if($tourl!="http://"  &&  $tourl!="" &&  strlen($tourl)>1){
		if(substr($tourl,0,7)=="http://"){
			header("location:".$tourl);
		}elseif(substr($tourl,0,1)=="/"){
			$tourl=substr($tourl,1);
			header("location:".$SiteUrl.$tourl);
		}else{
			header("location:".$SiteUrl.$tourl);
		}
	}else{
		return false;
	}
	return false;
}


//上传图片

function NewsUploadImage($jpg,$jpg_type,$jpg_size,$path){

	
	global $strUploadNotice1,$strUploadNotice2,$strUploadNotice3;

	
	if ($jpg_size == 0) {

			$arr[0]="err";
			$arr[1]=$strUploadNotice1;
			return $arr;

	}

	
	if ($jpg_size > $GLOBALS["NEWSCONF"]["PicSizeLimit"]) {
			$arr[0]="err";
			$arr[1]=$strUploadNotice2;
			return $arr;
	}

	if ($jpg_type != "image/pjpeg" && $jpg_type != "image/jpeg" && $jpg_type!= "image/gif" && $jpg_type != "image/x-png" && $jpg_type != "application/x-shockwave-flash") {
			$arr[0]="err";
			$arr[1]=$strUploadNotice3;
			return $arr;
	}
		
	switch ($jpg_type) {

			case "image/pjpeg" : 
			$extention = ".jpg";
			$UploadImage[2]="gif";
			break;

			case "image/gif" : 
			$extention = ".gif";
			$UploadImage[2]="gif";
			break;

			case "image/x-png" : 
			$extention = ".png";
			$UploadImage[2]="gif";
			break;

			case "application/x-shockwave-flash" : 
			$extention = ".swf";
			$UploadImage[2]="swf";
			break;
	}
			 
		$fname=time();
		$fname=$fname.$extention;
		$file_path = ROOTPATH.$path."/".$fname;
		$UploadImage[3] = $path."/".$fname;
		
		copy ($jpg,$file_path);
		chmod ($file_path,0666);
		
		$size = GetImageSize($file_path);
		if($size[0]>0 && $size[1]>0){
			
			$UploadImage[0]=$size[0];
			$UploadImage[1]=$size[1];
	
		}else{

			$UploadImage[0]=50;
			$UploadImage[1]=50;

		}
		return $UploadImage;

}


///////////上传文件函数

function NewUploadFile($jpg,$jpg_type,$fname,$jpg_size,$path){

	global $strDownNotice9,$strDownNotice11,$strDownNotice10; 

	if ($jpg_size == 0) {

		$arr[0]="err";
		$arr[1]=$strDownNotice9;
		return $arr;

	}

	if ($jpg_size > $GLOBALS["NEWSCONF"]["FileSizeLimit"]) {
			$arr[0]="err";
			$arr[1]=$strDownNotice10;
			return $arr;
	}

	if (substr($fname,-4)!=".rar" && substr($fname,-4)!=".zip" && substr($fname,-4)!=".doc" && substr($fname,-4)!=".xls" && substr($fname,-4)!=".htm" && substr($fname,-5)!=".html" && substr($fname,-4)!=".gif" && substr($fname,-4)!=".jpg" && substr($fname,-4)!=".png" && substr($fname,-4)!=".chm" && substr($fname,-4)!=".txt") {
			$arr[0]="err";
			$arr[1]=$strDownNotice11;
			return $arr;
			
	}
	
	
	$hzarr=explode(".",$fname);
	$num=sizeof($hzarr)-1;
	$UploadImage[2]=$hzarr[$num];
		
 
		$timestr=time();
		$hz=substr($fname,-4);

		$file_path = ROOTPATH.$path."/".$timestr.$hz;
		$UploadImage[3] = $path."/".$timestr.$hz;
		
		copy ($jpg,$file_path);
		chmod ($file_path,0666);
		
		$UploadImage[0]="OK";
		$UploadImage[1]="OK";

		return $UploadImage;

}



function pstarnums($n,$RP){


	$str="";

	if($n<0.5){
		$str='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=0.5 && $n<1.0){
		$str='<img src='.$RP.'news/templates/images/icon_star_3.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=1.0 && $n<1.5){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=1.5 && $n<2.0){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_3.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=2.0 && $n<2.5){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=2.5 && $n<3.0){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_3.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=3.0 && $n<3.5){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=3.5 && $n<4.0){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_3.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}

	if($n>=4.0 && $n<4.5){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_1.gif>';
	}
	
	if($n>=4.5 && $n<5.0){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_3.gif>';
	}

	if($n>=5.0){
		$str='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
		$str.='<img src='.$RP.'news/templates/images/icon_star_2.gif>';
	}
		
	return $str;

}


?>
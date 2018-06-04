<?php


CommentConfig();


//模块参数设置
function CommentConfig(){

	global $msql;

	$msql->query("select * from {P}_comment_config");
	while($msql->next_record()){
	
	$variable=$msql->f('variable');
	$value=$msql->f('value');
	$GLOBALS["COMMENTCONF"][$variable]=$value;
	}

}


/*
//上传附件

function UploadFile($jpg,$jpg_type,$fname,$jpg_size,$path){

	global $strDownNotice9,$strDownNotice11,$strDownNotice12; 

	if ($jpg_size == 0) {

			$arr[0]="err";
			$arr[1]=$strDownNotice9;
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
		
 
		
		$file_path = ROOTPATH.$path."/".$fname;
		$UploadImage[3] = $path."/".$fname;
		
		copy ($jpg,$file_path);
		chmod ($file_path,0666);
		

		$UploadImage[0]=0;
		$UploadImage[1]=0;

		return $UploadImage;

}
*/

//上传图片

function UploadImage($jpg,$jpg_type,$jpg_size,$path){

	
	global $strUploadNotice1,$strUploadNotice2,$strUploadNotice3;

	
	if ($jpg_size == 0) {

			$arr[0]="err";
			$arr[1]=$strUploadNotice1;
			return $arr;

	}

	
	if ($jpg_size > $GLOBALS["COMMENTCONF"]["PicSizeLimit"]) {
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


?>
<?php

///////////上传图片或FLASH函数

function NewUploadImage($jpg,$jpg_type,$jpg_size,$path){

	
	global $strUploadNotice1,$strUploadNotice2,$strUploadNotice3;

	if ($jpg_size == 0) {

			$arr[0]="err";
			$arr[1]=$strUploadNotice1;
			return $arr;
	}
	
	if ($jpg_size > 1024000) {

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

			case "image/jpeg" : 
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
		

		$UploadImage[0]="OK";
		$UploadImage[1]="OK";

		return $UploadImage;

}

?>
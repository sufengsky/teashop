<?php



///////////上传图片或FLASH函数

function NewUploadImage($jpg,$jpg_type,$jpg_size,$path){

	
	global $strUploadNotice1,$strUploadNotice2,$strUploadNotice3;

	if ($jpg_size == 0) {

		err($strUploadNotice1,"","");

	}
	
	if ($jpg_size > 1024000) {

		err($strUploadNotice2,"","");

	}

	if ($jpg_type != "image/pjpeg" && $jpg_type != "image/jpeg" && $jpg_type!= "image/gif" && $jpg_type != "image/x-png" && $jpg_type != "application/x-shockwave-flash") {
				err($strUploadNotice3,"","");
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


function NewUploadImage1($jpg,$jpg_type,$jpg_size,$path){

	global $strUploadNotice1,$strUploadNotice2,$strUploadNotice3;

	if ($jpg_size == 0) {
		return false;
	}
	
	if ($jpg_size > 1024000) {

		err($strUploadNotice2,"","");

	}

	if ($jpg_type != "image/pjpeg" && $jpg_type != "image/jpeg" && $jpg_type!= "image/gif" && $jpg_type != "image/x-png" && $jpg_type != "application/x-shockwave-flash") {
				err($strUploadNotice3,"","");
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
		$fname=$fname."_s".$extention;
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
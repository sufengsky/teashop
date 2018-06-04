<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

function NewUploadFile( $jpg, $jpg_type, $fname, $jpg_size, $path )
{
				global $strDownNotice9;
				global $strDownNotice11;
				if ( $jpg_size == 0 )
				{
								err( $strDownNotice9, "", "" );
				}
				if ( substr( $fname, -4 ) != ".rar" && substr( $fname, -4 ) != ".zip" && substr( $fname, -4 ) != ".doc" && substr( $fname, -4 ) != ".xls" && substr( $fname, -4 ) != ".htm" && substr( $fname, -5 ) != ".html" && substr( $fname, -4 ) != ".gif" && substr( $fname, -4 ) != ".jpg" && substr( $fname, -4 ) != ".png" && substr( $fname, -4 ) != ".chm" && substr( $fname, -4 ) != ".txt" && substr( $fname, -4 ) != ".mid" )
				{
								err( $strDownNotice11, "", "" );
				}
				$hzarr = explode( ".", $fname );
				$num = sizeof( $hzarr ) - 1;
				$UploadImage[2] = $hzarr[$num];
				$timestr = time( );
				$hz = substr( $fname, -4 );
				$file_path = ROOTPATH.$path."/".$timestr.$hz;
				$UploadImage[3] = $path."/".$timestr.$hz;
				copy( $jpg, $file_path );
				chmod( $file_path, 438 );
				$UploadImage[0] = "";
				$UploadImage[1] = "";
				return $UploadImage;
}

function NewUploadImage( $jpg, $jpg_type, $jpg_size, $path )
{
				global $strUploadNotice1;
				global $strUploadNotice2;
				global $strUploadNotice3;
				if ( $jpg_size == 0 )
				{
								err( $strUploadNotice1, "", "" );
				}
				if ( 2040000 < $jpg_size )
				{
								err( $strUploadNotice2, "", "" );
				}
				if ( $jpg_type != "image/pjpeg" && $jpg_type != "image/jpeg" && $jpg_type != "image/gif" && $jpg_type != "image/x-png" && $jpg_type != "application/x-shockwave-flash" )
				{
								err( $strUploadNotice3, "", "" );
				}
				switch ( $jpg_type )
				{
								case "image/pjpeg" :
												$extention = ".jpg";
												$UploadImage[2] = "gif";
												break;
								case "image/gif" :
												$extention = ".gif";
												$UploadImage[2] = "gif";
												break;
								case "image/x-png" :
												$extention = ".png";
												$UploadImage[2] = "gif";
												break;
								case "application/x-shockwave-flash" :
				}
				$extention = ".swf";
				$UploadImage[2] = "swf";
				break;
				$fname = time( );
				$fname .= $extention;
				$file_path = ROOTPATH.$path."/".$fname;
				$UploadImage[3] = $path."/".$fname;
				copy( $jpg, $file_path );
				chmod( $file_path, 438 );
				$size = getimagesize( $file_path );
				if ( 0 < $size[0] && 0 < $size[1] )
				{
								$UploadImage[0] = $size[0];
								$UploadImage[1] = $size[1];
				}
				else
				{
								$UploadImage[0] = 50;
								$UploadImage[1] = 50;
				}
				return $UploadImage;
}

?>

<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define( "ROOTPATH", "../../" );
include( ROOTPATH."includes/admin.inc.php" );
include( "language/".$sLan.".php" );
needauth( 58 );
$memberid = $_GET['memberid'];
$id = $_GET['id'];
$tourl = $_GET['tourl'];
if ( $id != "" )
{
				$tourl = $tourl."?id=".$id;
}
$msql->query( "select * from {P}_member where memberid='{$memberid}'" );
if ( $msql->next_record( ) )
{
				$user = $msql->f( "user" );
				$checked = $msql->f( "checked" );
				$exptime = $msql->f( "exptime" );
				$memberid = $msql->f( "memberid" );
				$membertypeid = $msql->f( "membertypeid" );
				$pname = $msql->f( "pname" );
				$email = $msql->f( "email" );
				$nowtime = time( );
				$fsql->query( "select membertype from {P}_member_type where membertypeid='{$membertypeid}'" );
				if ( $fsql->next_record( ) )
				{
								$membertype = $fsql->f( "membertype" );
				}
				$fsql->query( "select * from {P}_member_rights where memberid='{$memberid}' and securetype='con'" );
				if ( $fsql->next_record( ) )
				{
								$consecure = $fsql->f( "secureset" );
				}
				$md5 = md5( $user."76|01|14".$memberid.$membertype.$consecure );
				setcookie( "MUSER", $user, time( ) + 3600, "/" );
				setcookie( "MEMBERPNAME", $pname, time( ) + 3600, "/" );
				setcookie( "MEMBERID", $memberid, time( ) + 3600, "/" );
				setcookie( "MEMBERTYPE", $membertype, time( ) + 3600, "/" );
				setcookie( "MEMBERTYPEID", $membertypeid, time( ) + 3600, "/" );
				setcookie( "ZC", $md5, time( ) + 3600, "/" );
				setcookie( "SE", $consecure, time( ) + 3600, "/" );
				echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<title>";
				echo $strVmember;
				echo "</title>\r\n</head>\r\n<body>\r\n\t\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p align=\"center\" style=\"color:#555555;font-size:12px\"><br>\r\n  <br>\r\n  ";
				echo $strVmember;
				echo " ...</p>\r\n<table width=\"252\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\" bgcolor=\"#999999\" height=\"8\">\r\n  <tr bgcolor=\"#FFFFFF\"> \r\n    <td>\r\n      <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#999999\" width=\"1\" height=\"6\" id=\"tbl\">\r\n        <tr>\r\n          <td></td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n<p align=\"center\" style=\"color:#555555;font-size:12px\"><br";
				echo ">\r\n</p>\r\n\r\n";
				echo "<s";
				echo "cript>\r\nwindow.focus();\r\n\r\nsetTimeout(\"tbl.style.width=30\",200);\r\nsetTimeout(\"tbl.style.width=60\",400);\r\nsetTimeout(\"tbl.style.width=90\",600);\r\nsetTimeout(\"tbl.style.width=120\",800);\r\nsetTimeout(\"tbl.style.width=150\",1000);\r\nsetTimeout(\"tbl.style.width=180\",1200);\r\nsetTimeout(\"tbl.style.width=210\",1400);\r\nsetTimeout(\"tbl.style.width=250\",1600);\r\n\r\n\r\nsetTimeout(\"window.location='../../";
				echo $tourl;
				echo "'\",1700)</script>\r\n\r\n";
}
echo "</body></html>";
?>

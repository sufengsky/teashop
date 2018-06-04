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
needauth( 223 );
$id = $_REQUEST['id'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body>\r\n<div class=\"formzone\">\r\n<div class=\"tablezone\">\r\n\r\n";
trylimit( "_job_telent", 20, "id" );
if ( $_REQUEST['step'] == "addku" )
{
				$msql->query( "update {P}_job_telent set fav='1' where id='{$id}'" );
				sayok( $strJobNotice9, "telent_ku.php", "" );
}
if ( $_REQUEST['step'] == "delku" )
{
				$msql->query( "update {P}_job_telent set fav='0' where id='{$id}'" );
				sayok( $strJobNotice10, "telent_ku.php", "" );
}
$fsql->query( "select * from {P}_job_telent where id='{$id}'" );
if ( $fsql->next_record( ) )
{
				$jobid = $fsql->f( "jobid" );
				$jobname = $fsql->f( "jobname" );
				$title = $fsql->f( "title" );
				$content = $fsql->f( "content" );
				$name = $fsql->f( "name" );
				$sex = $fsql->f( "sex" );
				$tel = $fsql->f( "tel" );
				$address = $fsql->f( "address" );
				$email = $fsql->f( "email" );
				$url = $fsql->f( "url" );
				$qq = $fsql->f( "qq" );
				$company = $fsql->f( "company" );
				$company_address = $fsql->f( "company_address" );
				$zip = $fsql->f( "zip" );
				$fax = $fsql->f( "fax" );
				$products_id = $fsql->f( "products_id" );
				$products_name = $fsql->f( "products_name" );
				$products_num = $fsql->f( "products_num" );
				$custom1 = $fsql->f( "custom1" );
				$custom2 = $fsql->f( "custom2" );
				$custom3 = $fsql->f( "custom3" );
				$custom4 = $fsql->f( "custom4" );
				$custom5 = $fsql->f( "custom5" );
				$custom6 = $fsql->f( "custom6" );
				$custom7 = $fsql->f( "custom7" );
				$memberid = $fsql->f( "memberid" );
				$ip = $fsql->f( "ip" );
				$time = $fsql->f( "time" );
				$uptime = $fsql->f( "uptime" );
				$nowstat = $fsql->f( "stat" );
				$fav = $fsql->f( "fav" );
				$time = date( "Y-n-j H:i:s", $time );
				$uptime = date( "Y-n-j H:i:s", $uptime );
				$content = nl2br( $content );
}
echo "\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#DEEFFA\">\r\n<tr> \r\n<td  width=\"90\" align=\"right\" bgcolor=\"#F2F9FD\">";
echo $strNumber;
echo "：</td>\r\n<td bgcolor=\"#FFFFFF\">";
echo $id;
echo "</td>\r\n</tr>\r\n\r\n<tr> \r\n<td  width=\"90\" align=\"right\" bgcolor=\"#F2F9FD\">";
echo $strJobF1;
echo "：</td>\r\n<td bgcolor=\"#FFFFFF\">";
echo $jobname;
echo "</td>\r\n</tr>\r\n<tr> \r\n<td  width=\"90\" align=\"right\" bgcolor=\"#F2F9FD\">";
echo $strFormTime;
echo "：</td>\r\n<td bgcolor=\"#FFFFFF\"  >";
echo $time;
echo " &nbsp; [IP: ";
echo $ip;
echo "] </td>\r\n</tr>\r\n";
$msql->query( "select field_caption,field_name from {P}_job_form where use_field = '1' order by xuhao" );
while ( $msql->next_record( ) )
{
				$field_caption = $msql->f( "field_caption" );
				$field_name = $msql->f( "field_name" );
				echo "<tr> \r\n<td  width=\"90\" align=\"right\" bgcolor=\"#F2F9FD\">";
				echo $field_caption;
				echo "：</td>\r\n<td bgcolor=\"#FFFFFF\">";
				echo $$field_name;
				echo "</td>\r\n</tr>\r\n";
}
echo "</table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n";
if ( $fav == "1" )
{
				echo "<input name=\"addku\" type=\"button\" class=\"button\" onClick=\"window.location='look.php?step=delku&id=";
				echo $id;
				echo "'\" value=\"";
				echo $strJobDelKu;
				echo "\" />\r\n";
}
else
{
				echo "<input name=\"addku\" type=\"button\" class=\"button\" onClick=\"window.location='look.php?step=addku&id=";
				echo $id;
				echo "'\" value=\"";
				echo $strJobAddKu;
				echo "\" />\r\n";
}
echo "</div>\r\n\r\n</div>\r\n\r\n</body>\r\n</html>\r\n";
?>

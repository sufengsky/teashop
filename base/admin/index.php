<?php
define( "ROOTPATH", "../../" );
include( ROOTPATH."includes/admin.inc.php" );
include( "language/".$sLan.".php" );

needauth( 0 );

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<script  language=\"javascript\">\r\nvar PDV_RP=\"";
echo ROOTPATH;
echo "\";\r\n</script>   \r\n";
echo "<script  language=\"javascript\" src=\"../js/base.js\"></script>   \r\n";
echo "<script  language=\"javascript\" src=\"js/main.js\"></script>   \r\n\r\n</head>\r\n \r\n\r\n<body class=\"NavigatorBar\">\r\n\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">\r\n  <tr valign=\"top\"> \r\n    <td height=\"60\">\r\n<div class=\"topbox\">\r\n<div class=\"logobox\"><a href=\"http://www.mb5.com.cn\" target=\"_blank\"><img src=\"images/logo.gif\" alt=\"模板之家\" border=\"0\"  width=\"150\" height=\"90\"></a></div>\r\n\r\n<div class=\"menubox\">\r\n<div id=\"menu1\" class=\"menu\" onClick=\"document.getElementById('mainframe').src='frame.php'\">";
echo $strAdminMenu1; //首页
echo "</div>\r\n<div id=\"menu2\" class=\"menu\" onClick=\"document.getElementById('mainframe').src='set_frame.php'\">";
echo $strAdminSet; //设置
echo "</div>\r\n";
$i = 3;
$msql->query( "select * from {P}_base_coltype where ifadmin='1' order by id" );
while ( $msql->next_record() )
{
		$coltype = $msql->f( "coltype" );
		$sname = $msql->f( "sname" );
		echo "<div id='menu".$i."' class='menu' onClick=\"document.getElementById('mainframe').src='".ROOTPATH.$coltype."/admin/index.php'\">".$sname."</div>";
		++$i;
}
echo "<div id=\"pdv_logout\" class=\"menu\" style=\"float:right\">";
echo $strAdminExit; //排版
echo "</div>\r\n<div id=\"preview\" class=\"menu\" style=\"float:right\">";
echo $strPlusExit; //访问
echo "</div>\r\n<div id=\"pedit\" class=\"menu\" style=\"float:right\">";
echo $strPlusEnter; //退出
echo "</div>\r\n\r\n</div>\r\n</div>\r\n\r\n\t</td>\r\n</tr>\r\n<tr valign=\"top\">\r\n<td>\r\n\r\n\t<iframe src='frame.php'  id='mainframe' name='mainframe' height='100%' width='100%' scrolling='none' marginheight='0'  frameborder='0'>IE</iframe></td>\r\n\r\n\r\n</tr>\r\n</table>\r\n</body>\r\n</html>\r\n";
?>

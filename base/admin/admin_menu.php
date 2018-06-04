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
needauth( 8 );
$step = $_REQUEST['step'];
$menu = $_REQUEST['menu'];
$url = $_REQUEST['url'];
$id = $_REQUEST['id'];
$xuhao = $_REQUEST['xuhao'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n";
echo "<S";
echo "CRIPT>\r\nfunction cm(nn){\r\n\tqus=confirm(\"";
echo $strDeleteConfirm;
echo "\")\r\n\tif(qus!=0){\r\n\twindow.location='admin_menu.php?step=del&id='+nn;\r\n\t}\r\n}\r\n\r\n</SCRIPT>\r\n</head>\r\n\r\n<body>\r\n";
if ( $step == "mod" )
{
				$fsql->query( "update {P}_base_adminmenu set menu='{$menu}',url='{$url}',xuhao='{$xuhao}' where  id='{$id}'" );
				echo "<script>self.location='admin_menu.php'</script>";
}
if ( $step == "submodi" )
{
				$submenu = $_REQUEST['submenu'];
				$subid = $_REQUEST['subid'];
				$subxuhao = $_REQUEST['subxuhao'];
				$suburl = $_REQUEST['suburl'];
				$fsql->query( "update {P}_base_adminmenu set menu='{$submenu}',url='{$suburl}',xuhao='{$subxuhao}' where  id='{$subid}'" );
				echo "<script>self.location='admin_menu.php'</script>";
}
if ( $step == "del" )
{
				$fsql->query( "select * from {P}_base_adminmenu where pid='{$id}'" );
				if ( $fsql->next_record( ) )
				{
								err( $strAdminMenuNtc1, "admin_menu.php", "" );
				}
				$fsql->query( "delete from {P}_base_adminmenu where id='{$id}'" );
				echo "<script>self.location='admin_menu.php'</script>";
}
if ( $step == "add" )
{
				$bmenu = $_REQUEST['bmenu'];
				$burl = $_REQUEST['burl'];
				if ( $bmenu == "" )
				{
								err( $strAdminMenuNtc2, "admin_menu.php", "" );
				}
				$msql->query( "select max(xuhao) from {P}_base_adminmenu where pid='0'" );
				if ( $msql->next_record( ) )
				{
								$xuhao = $msql->f( "max(xuhao)" ) + 1;
				}
				$msql->query( "insert into {P}_base_adminmenu set\r\n\tpid='0',\r\n\tmenu='{$bmenu}',\r\n\turl='{$burl}',\r\n\txuhao='{$xuhao}'\r\n\t" );
				echo "<script>self.location='admin_menu.php'</script>";
}
if ( $step == "addsub" )
{
				$pid = $_REQUEST['pid'];
				$msql->query( "select max(xuhao) from {P}_base_adminmenu where pid='{$pid}'" );
				if ( $msql->next_record( ) )
				{
								$subxuhao = $msql->f( "max(xuhao)" ) + 1;
				}
				$msql->query( "insert into {P}_base_adminmenu set\r\n\tpid='{$pid}',\r\n\tmenu='{$strAdminMenuName}',\r\n\txuhao='{$subxuhao}'\r\n\t" );
				echo "<script>self.location='admin_menu.php'</script>";
}
echo "<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n\r\n\r\n\r\n";
echo $strSetMenu2;
echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\">\r\n  <tr>\r\n    <td  class=\"innerbiaoti\" height=\"28\" align=\"center\" width=\"50\">";
echo $strAdminMenuXuhao;
echo "</td>\r\n    <td height=\"28\"  class=\"innerbiaoti\">";
echo $strAdminMenu;
echo " / ";
echo $strAdminMenuUrl;
echo " \r\n\t\r\n\t</td>\r\n    </tr>\r\n";
$msql->query( "select * from {P}_base_adminmenu where pid='0' order by xuhao " );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$menu = $msql->f( "menu" );
				$xuhao = $msql->f( "xuhao" );
				$url = $msql->f( "url" );
				echo "  \r\n<form method=\"post\" action=\"admin_menu.php\" id=\"bform_";
				echo $id;
				echo "\">\r\n  <tr class=\"list\">\r\n    <td  height=\"26\"  align=\"center\"> \r\n        <input type=\"text\" name=\"xuhao\" size=\"3\"  class=\"input\" value=\"";
				echo $xuhao;
				echo "\">\r\n      </td>\r\n      <td   height=\"26\" > \r\n        <input type=\"text\" name=\"menu\" size=\"25\"  class=\"input\" value=\"";
				echo $menu;
				echo "\" maxlength=\"16\">\r\n        <input name=\"url\" type=\"text\"  class=\"input\" id=\"url\" value=\"";
				echo $url;
				echo "\" size=\"50\" />\r\n        <input type=\"hidden\" name=\"step\" value=\"mod\" />\r\n        <input type=\"hidden\" name=\"id\" value=\"";
				echo $id;
				echo "\" /> \r\n\t\t <a href=\"#\" class=\"catmodi\"  onClick=\"document.getElementById('bform_";
				echo $id;
				echo "').submit();\">";
				echo $strModify;
				echo "</a> &nbsp;\r\n        <a href=\"#\" class=\"catmodi\"  onClick=\"cm('";
				echo $id;
				echo "')\">";
				echo $strDelete;
				echo "</a> &nbsp;\r\n\t\t\r\n\t\t</td>\r\n     \r\n  </tr> \r\n  </form>\r\n  \r\n  ";
				$fsql->query( "select * from {P}_base_adminmenu where pid='{$id}' order by xuhao " );
				while ( $fsql->next_record( ) )
				{
								$subid = $fsql->f( "id" );
								$submenu = $fsql->f( "menu" );
								$subxuhao = $fsql->f( "xuhao" );
								$suburl = $fsql->f( "url" );
								echo "\r\n<form method=\"post\" action=\"admin_menu.php\" id=\"sform_";
								echo $subid;
								echo "\">\r\n  <tr class=\"list\">\r\n    <td  height=\"26\"  align=\"center\">&nbsp; \r\n      </td>\r\n      <td   height=\"26\" > \r\n        <input type=\"text\" name=\"subxuhao\" size=\"3\"  class=\"input\" value=\"";
								echo $subxuhao;
								echo "\" />\r\n        <input type=\"text\" name=\"submenu\" size=\"15\"  class=\"input\" value=\"";
								echo $submenu;
								echo "\" maxlength=\"16\" />\r\n        <input name=\"suburl\" type=\"text\"  class=\"input\" id=\"suburl\" value=\"";
								echo $suburl;
								echo "\" size=\"50\" />\r\n        <input type=\"hidden\" name=\"step\" value=\"submodi\" />\r\n        <input type=\"hidden\" name=\"subid\" value=\"";
								echo $subid;
								echo "\" /> \r\n\t\t <a href=\"#\" class=\"catmodi\"  onClick=\"document.getElementById('sform_";
								echo $subid;
								echo "').submit();\">";
								echo $strModify;
								echo "</a> &nbsp;\r\n        <a href=\"#\" class=\"catmodi\"  onClick=\"cm('";
								echo $subid;
								echo "')\">";
								echo $strDelete;
								echo "</a>\r\n\t\t\r\n\t\t</td>\r\n     \r\n  </tr>\r\n \r\n  </form>\r\n\r\n\r\n";
				}
				echo "  \r\n\r\n  ";
}
echo "<form name=\"form1\" action=\"admin_menu.php\">\r\n <tr class=\"list\">\r\n \r\n    <td  height=\"26\"  align=\"center\">\r\n        \t</td>\r\n    <td   height=\"26\" >\r\n\t<input name=\"bmenu\" type=\"text\"  class=\"input\" value=\"";
echo $strAdminMenuName;
echo "\" size=\"25\" maxlength=\"16\">\r\n\t<input name=\"burl\" type=\"text\"  class=\"input\" id=\"burl\" size=\"50\" />\r\n        <input type=\"submit\" name=\"Submit22\" class=button value=\"";
echo $strAdminMenuAdd;
echo "\">\r\n        <input type=\"hidden\" name=\"step\" value=\"add\">\r\n\r\n\t</td>\r\n  </tr> \r\n  </form>\r\n</table>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

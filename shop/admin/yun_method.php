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
needauth( 311 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/yun.js\"></script>\r\n</head>\r\n\r\n<body >\r\n";
$id = $_REQUEST['id'];
if ( $step == "del" )
{
				$msql->query( "delete from {P}_shop_yun where id='{$id}'" );
}
echo " \r\n\r\n<div class=\"formzone\">\r\n<div class=\"tabtopzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr> \r\n      <td> \r\n<div class=\"namezone\">\r\n";
echo $strYunMethodSet;
echo "</div>\r\n\r\n      </td>\r\n    <td width=\"100\" align=\"right\"><input type=\"button\" name=\"Submit\" value=\"";
echo $strYunMethodAdd;
echo "\" class=\"button\" onClick=\"self.location='yun_add.php'\"></td>\r\n  </tr>\r\n</table>\r\n </div> \r\n\r\n\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n  <tr>\r\n    <td width=\"39\" height=\"26\" class=\"innerbiaoti\">";
echo $strNumber;
echo "</td>\r\n    <td width=\"50\" height=\"26\" class=\"innerbiaoti\">";
echo $strIdx1;
echo "</td>\r\n    <td width=\"135\" height=\"26\"  class=\"innerbiaoti\">";
echo $strYunMethod;
echo "</td>\r\n    <td  class=\"innerbiaoti\">";
echo $strYunSpec;
echo "</td>\r\n    <td width=\"115\" height=\"26\"  class=\"innerbiaoti\">";
echo $strYunGs;
echo "</td>\r\n    <td width=\"39\" height=\"26\"  class=\"innerbiaoti\">";
echo $strYunBaojiax;
echo "</td>\r\n    <td width=\"65\"  class=\"innerbiaoti\">";
echo $strYunBaofei;
echo " </td>\r\n    <td width=\"39\" height=\"26\" align=\"center\"  class=\"innerbiaoti\">";
echo $strModify;
echo "</td>\r\n    <td width=\"39\" height=\"26\" align=\"center\"  class=\"innerbiaoti\">";
echo $strDelete;
echo "</td>\r\n\r\n    </tr>\r\n  ";
$msql->query( "select * from {P}_shop_yun order by xuhao" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$xuhao = $msql->f( "xuhao" );
				$yunname = $msql->f( "yunname" );
				$dinge = $msql->f( "dinge" );
				$yunfei = $msql->f( "yunfei" );
				$hbcode = $msql->f( "hbcode" );
				$gs = $msql->f( "gs" );
				$baojia = $msql->f( "baojia" );
				$baofei = $msql->f( "baofei" );
				$memo = $msql->f( "memo" );
				$spec = $msql->f( "spec" );
				if ( $dinge == "0" )
				{
								$saygs = $strYunGs2;
				}
				else if ( $dinge == "1" )
				{
								$saygs = $strYunGs1;
				}
				else if ( $dinge == "3" )
				{
								$saygs = $strYunGs4;
				}
				else
				{
								$saygs = $strYunGs3;
				}
				if ( $baojia == "1" )
				{
								$showbaofei = $baofei."%";
				}
				else
				{
								$showbaofei = "-----";
				}
				echo " \r\n  <tr class=\"list\">\r\n    <td width=\"39\" >";
				echo $id;
				echo "</td>\r\n      <td width=\"50\" >";
				echo $xuhao;
				echo " </td>\r\n      <td width=\"135\" > ";
				echo $yunname;
				echo "</td>\r\n      <td >";
				echo $spec;
				echo "</td>\r\n      <td width=\"115\"  >";
				echo $saygs;
				echo "</td>\r\n      <td width=\"39\"  >";
				showyn( $baojia );
				echo "</td>\r\n      <td width=\"65\"  >";
				echo $showbaofei;
				echo "</td>\r\n      <td width=\"39\" align=\"center\"  > \r\n          <img src=\"images/edit.png\"  style=\"cursor:hand\" width=\"24\" height=\"24\"  border=0 onClick=\"self.location='yun_modify.php?id=";
				echo $id;
				echo "'\"> \r\n      </td>\r\n      <td width=\"39\" align=\"center\"  ><img src=\"images/delete.png\"  style=\"cursor:hand\" width=\"24\" height=\"24\"  border=0 onClick=\"self.location='yun_method.php?step=del&id=";
				echo $id;
				echo "'\"> \r\n      </td>\r\n  </tr>\r\n  ";
}
echo " \r\n</table>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

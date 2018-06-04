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
needauth( 63 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n</head>\r\n\r\n<body>\r\n";
$step = $_REQUEST['step'];
if ( $step == "modi" )
{
				$cent1 = $_REQUEST['cent1'];
				$cent2 = $_REQUEST['cent2'];
				$cent3 = $_REQUEST['cent3'];
				$cent4 = $_REQUEST['cent4'];
				$cent5 = $_REQUEST['cent5'];
				$id = $_REQUEST['id'];
				$msql->query( "update {P}_member_centrule set \r\n\t`cent1`='{$cent1}',\r\n\t`cent2`='{$cent2}',\r\n\t`cent3`='{$cent3}',\r\n\t`cent4`='{$cent4}',\r\n\t`cent5`='{$cent5}'\r\n\t where id='{$id}'" );
}
if ( $step == "centset" )
{
				$centname1 = $_REQUEST['centname1'];
				$centname2 = $_REQUEST['centname2'];
				$centname3 = $_REQUEST['centname3'];
				$centname4 = $_REQUEST['centname4'];
				$centname5 = $_REQUEST['centname5'];
				$msql->query( "update {P}_member_centset set \r\n\t`centname1`='{$centname1}',\r\n\t`centname2`='{$centname2}',\r\n\t`centname3`='{$centname3}',\r\n\t`centname4`='{$centname4}',\r\n\t`centname5`='{$centname5}' \r\n\t" );
}
$msql->query( "select * from {P}_member_centset" );
if ( $msql->next_record( ) )
{
				$centname1 = $msql->f( "centname1" );
				$centname2 = $msql->f( "centname2" );
				$centname3 = $msql->f( "centname3" );
				$centname4 = $msql->f( "centname4" );
				$centname5 = $msql->f( "centname5" );
}
echo " \r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strCentAutoSet;
echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n <form action=\"member_cent.php\" method=\"get\" >\r\n  <tr>\r\n    <td  class=\"innerbiaoti\" width=\"50\">";
echo $strColType;
echo "</td>\r\n    <td  class=\"innerbiaoti\" width=\"50\">";
echo $strCentList0;
echo "</td>\r\n    <td width=\"150\"  class=\"innerbiaoti\">";
echo $strCentEvent;
echo "</td>\r\n    <td  class=\"innerbiaoti\" width=\"50\"><input name=\"centname1\" type=\"text\"  value=\"";
echo $centname1;
echo "\" size=\"3\" class=\"input\" />      </td>\r\n    <td  class=\"innerbiaoti\" width=\"50\"><input name=\"centname2\" type=\"text\"  value=\"";
echo $centname2;
echo "\" size=\"3\" class=\"input\" /></td>\r\n    <td  class=\"innerbiaoti\" width=\"50\"><input name=\"centname3\" type=\"text\"  value=\"";
echo $centname3;
echo "\" size=\"3\" class=\"input\" /></td>\r\n    <td  class=\"innerbiaoti\" width=\"50\"><input name=\"centname4\" type=\"text\"  value=\"";
echo $centname4;
echo "\" size=\"3\" class=\"input\" /></td>\r\n    <td  class=\"innerbiaoti\" height=\"28\"><input name=\"centname5\" type=\"text\"  value=\"";
echo $centname5;
echo "\" size=\"3\" class=\"input\" />\r\n      <input type=\"hidden\" name=\"step\" value=\"centset\" /></td>\r\n    <td  class=\"innerbiaoti\" height=\"28\" width=\"80\"><input name=\"cc1\" type=\"submit\" id=\"cc\" value=\"";
echo $strModify;
echo "\" class=\"button\" /></td>\r\n  </tr>\r\n\t</form>\r\n  ";
$msql->query( "select * from {P}_member_centrule order by event" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$coltype = $msql->f( "coltype" );
				$name = $msql->f( "name" );
				$event = $msql->f( "event" );
				$cent1 = $msql->f( "cent1" );
				$cent2 = $msql->f( "cent2" );
				$cent3 = $msql->f( "cent3" );
				$cent4 = $msql->f( "cent4" );
				$cent5 = $msql->f( "cent5" );
				echo "  <form action=\"member_cent.php\" method=\"get\" >\r\n    <tr>\r\n      <td   width=\"50\" class=\"list\">";
				echo coltype2sname( $coltype );
				echo "</td>\r\n      <td   width=\"50\" class=\"list\">";
				echo $event;
				echo "</td>\r\n      <td   width=\"150\">";
				echo $name;
				echo "          <input type=\"hidden\" name=\"step\" value=\"modi\" />\r\n          <input type=\"hidden\" name=\"id\" value=\"";
				echo $id;
				echo "\" />\r\n      </td>\r\n      <td   width=\"50\"><input name=\"cent1\" type=\"text\" id=\"cent1\" value=\"";
				echo $cent1;
				echo "\" size=\"3\" class=\"input\" />\r\n      </td>\r\n      <td   width=\"50\"><input name=\"cent2\" type=\"text\" id=\"cent2\" value=\"";
				echo $cent2;
				echo "\" size=\"3\" class=\"input\" />\r\n      </td>\r\n      <td   width=\"50\"><input name=\"cent3\" type=\"text\" id=\"cent3\" value=\"";
				echo $cent3;
				echo "\" size=\"3\" class=\"input\" />\r\n      </td>\r\n      <td   width=\"50\"><input name=\"cent4\" type=\"text\" id=\"cent4\" value=\"";
				echo $cent4;
				echo "\" size=\"3\" class=\"input\" /></td>\r\n      <td   height=\"26\"><input name=\"cent5\" type=\"text\" id=\"cent5\" value=\"";
				echo $cent5;
				echo "\" size=\"3\" class=\"input\" />\r\n      </td>\r\n      <td   height=\"26\" width=\"80\"><input name=\"cc2\" type=\"submit\" id=\"cc\" value=\"";
				echo $strModify;
				echo "\" class=\"button\" /></td>\r\n    </tr>\r\n  </form>\r\n  ";
}
echo "</table>\r\n</div>\r\n\r\n\r\n</div>\r\n\r\n</body>\r\n</html>";
?>

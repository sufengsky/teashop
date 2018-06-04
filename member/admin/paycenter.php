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
include( "func/member.inc.php" );
needauth( 69 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n ";
echo "<S";
echo "CRIPT>\r\nfunction cm(nn){\r\nqus=confirm(\"";
echo $strPayTypeNTC5;
echo "\")\r\nif(qus!=0){\r\nwindow.location='paycenter.php?step=del&id='+nn;\r\n}\r\n}\r\n</SCRIPT>\r\n</head>\r\n\r\n<body >\r\n\r\n\r\n";
$step = $_REQUEST['step'];
$id = $_REQUEST['id'];
if ( $step == "del" )
{
				$msql->query( "delete from {P}_member_paycenter where id='{$id}'" );
}
echo "<div class=\"formzone\">\r\n<div class=\"namezone\" style=\"float:left;margin:10px 10px 0px 10px\">";
echo $strPayTypeSet;
echo "</div>\r\n<div style=\"float:right;margin-right:3px;margin-top:5px\">\r\n<input type=\"button\" name=\"Submit\" value=\"";
echo $strPayTypeAdd;
echo "\"  class=\"button\" onclick=\"window.location='paycenter_add.php'\" />\r\n </div>\r\n\r\n\r\n<div class=\"tablezone\" style=\"clear:both;\">\r\n\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n    <tr> \r\n      <td width=\"50\" height=\"28\"  class=\"innerbiaoti\">";
echo $strXuhao;
echo "</td>\r\n      <td width=\"130\"  class=\"innerbiaoti\">";
echo $strPaycenterType;
echo "</td>\r\n      <td  class=\"innerbiaoti\" width=\"100\">";
echo $strPaycenterName;
echo "</td>\r\n      <td  class=\"innerbiaoti\" height=\"28\">";
echo $strPaycenterIntro;
echo "</td>\r\n      <td  class=\"innerbiaoti\" height=\"28\" width=\"70\">";
echo $strPaycenterIfSel;
echo "</td>\r\n      <td  class=\"innerbiaoti\" width=\"70\">";
echo $strModify;
echo "</td>\r\n      <td  class=\"innerbiaoti\" height=\"28\" width=\"70\">";
echo $strDelete;
echo "</td>\r\n    </tr>\r\n";
$msql->query( "select * from {P}_member_paycenter order by xuhao" );
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$pcenter = $msql->f( "pcenter" );
				$pcentertype = $msql->f( "pcentertype" );
				$pcenteruser = $msql->f( "pcenteruser" );
				$pcenterkey = $msql->f( "pcenterkey" );
				$hbtype = $msql->f( "hbtype" );
				$ifuse = $msql->f( "ifuse" );
				$ifback = $msql->f( "ifback" );
				$intro = $msql->f( "intro" );
				$xuhao = $msql->f( "xuhao" );
				$intro = str_replace( "\n", "<br>", $intro );
				switch ( $pcentertype )
				{
								case "0" :
												$saytype = $strPayType0;
												break;
								case "1" :
												$saytype = $strPayType1;
												break;
								case "2" :
												$saytype = $strPayType2;
												break;
				}
				echo "<tr class=\"list\"> \r\n        <td width=\"50\"  > ";
				echo $xuhao;
				echo " </td>\r\n        <td width=\"130\">";
				echo $saytype;
				echo "</td>\r\n        <td width=\"100\">";
				echo $pcenter;
				echo "</td>\r\n        <td   height=\"26\">";
				echo $intro;
				echo "</td>\r\n        <td   height=\"26\" width=\"70\">";
				showyn( $ifuse );
				echo "</td>\r\n        <td width=\"70\"><img src=\"images/edit.png\" width=\"24\" height=\"24\"  style=\"cursor:pointer\"  onClick=\"window.location='paycenter_modify.php?id=";
				echo $id;
				echo "'\" /></td>\r\n        <td   height=\"26\" width=\"70\"><img src=\"images/delete.png\"  style=\"cursor:pointer\"  onClick=\"cm('";
				echo $id;
				echo "')\"></td>\r\n      </tr>\r\n    ";
}
echo " \r\n  </table>\r\n  </div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

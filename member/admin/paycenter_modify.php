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
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/paycenter.js\"></script>\r\n</head>\r\n\r\n<body >\r\n\r\n\r\n";
$id = $_REQUEST['id'];
$step = $_REQUEST['step'];
$pcenter = $_REQUEST['pcenter'];
$pcentertype = $_REQUEST['pcentertype'];
$pcenteruser = $_REQUEST['pcenteruser'];
$pcenterkey = $_REQUEST['pcenterkey'];
$key1 = $_REQUEST['key1'];
$key2 = $_REQUEST['key2'];
$postfile = $_REQUEST['postfile'];
$recfile = $_REQUEST['recfile'];
$ifuse = $_REQUEST['ifuse'];
$intro = $_POST['intro'];
$xuhao = $_POST['xuhao'];
$hbtype = $_POST['hbtype'];
if ( $step == "modify" )
{
				if ( $pcenter == "" )
				{
								err( $strPayTypeNTC4, "", "" );
								exit( );
				}
				if ( $pcentertype == "0" )
				{
								$hbtype = "";
				}
				$msql->query( "update {P}_member_paycenter set\r\n\t`pcenter`='{$pcenter}',\r\n \t`pcentertype`='{$pcentertype}',\r\n  \t`pcenteruser`='{$pcenteruser}',\r\n  \t`pcenterkey`='{$pcenterkey}',\r\n  \t`key1`='{$key1}',\r\n  \t`key2`='{$key2}',\r\n   \t`postfile`='{$postfile}',\r\n  \t`recfile`='{$recfile}',\r\n    `hbtype`='{$hbtype}',\r\n \t`ifuse`='{$ifuse}',\r\n  \t`ifback`='1',\r\n   \t`xuhao`='{$xuhao}',\r\n\t`intro`='{$intro}' where id='{$id}'\t" );
				echo "<script>window.location='paycenter.php'</script>";
				exit( );
}
echo "<div class=\"formzone\">\r\n<div class=\"namezone\">";
echo $strPayTypeSet;
echo "</div>\r\n<div class=\"tablezone\">\r\n";
$msql->query( "select * from {P}_member_paycenter where id='{$id}'" );
if ( $msql->next_record( ) )
{
				$pcenter = $msql->f( "pcenter" );
				$pcentertype = $msql->f( "pcentertype" );
				$pcenteruser = $msql->f( "pcenteruser" );
				$pcenterkey = $msql->f( "pcenterkey" );
				$postfile = $msql->f( "postfile" );
				$recfile = $msql->f( "recfile" );
				$key1 = $msql->f( "key1" );
				$key2 = $msql->f( "key2" );
				$ifuse = $msql->f( "ifuse" );
				$ifback = $msql->f( "ifback" );
				$hbtype = $msql->f( "hbtype" );
				$intro = $msql->f( "intro" );
				$xuhao = $msql->f( "xuhao" );
}
echo " <form action=\"paycenter_modify.php\" method=\"post\" enctype=\"multipart/form-data\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\"  id=\"tablePayCenter\">\r\n   \r\n      <tr>\r\n        <td height=\"8\" colspan=\"3\" ></td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"100\" height=\"38\" align=\"right\">";
echo "<s";
echo "pan class=\"title\">";
echo $strPaycenterType;
echo "</span></td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td height=\"38\"><input name=\"pcentertype\" class=\"pcentertype\" type=\"radio\" value=\"0\" ";
echo checked( $pcentertype, "0" );
echo "  />\r\n            ";
echo $strPayType0;
echo "\t\t\t<input type=\"radio\" name=\"pcentertype\"  class=\"pcentertype\"  value=\"1\" ";
echo checked( $pcentertype, "1" );
echo "  />\r\n            ";
echo $strPayType1;
echo "</td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"100\" align=\"right\">";
echo "<s";
echo "pan class=\"title\">";
echo $strPaycenterName;
echo "</span></td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td><input name=\"pcenter\" type=\"text\"  class=\"input\" id=\"pcenter\" value=\"";
echo $pcenter;
echo "\" size=\"51\" />\r\n            <font color=\"#FF3300\">* </font></td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"100\" align=\"right\">";
echo "<s";
echo "pan class=\"title\">";
echo $strPaycenterIntro;
echo "</span></td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td><textarea name=\"intro\" cols=\"50\" rows=\"5\" class=\"textarea\" id=\"intro\">";
echo $intro;
echo "</textarea>\r\n        </td>\r\n      </tr>\r\n      <tr class=\"tronline\" style=\"display:none\">\r\n        <td width=\"100\" align=\"right\">";
echo "<s";
echo "pan class=\"title\">";
echo $strPayOnlinePort;
echo "</span></td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td>";
echo "<s";
echo "elect name=\"hbtype\" id=\"hbtype\">\r\n          <option value=\"alipay_db\" ";
echo seld( "alipay_db", $hbtype );
echo ">支付宝担保交易接口</option>\r\n          \r\n        </select></td>\r\n      </tr>\r\n\t  </table>\r\n\t  <table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\" >\r\n      <tr>\r\n        <td width=\"100\" align=\"right\">";
echo "<s";
echo "pan class=\"title\">";
echo $strIdx;
echo "</span></td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td><input name=\"xuhao\" type=\"text\"  class=\"input\" id=\"xuhao\" value=\"";
echo $xuhao;
echo "\" size=\"6\" /></td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"100\" align=\"right\">";
echo $strPaycenterIfUse;
echo "</td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td><input name=\"ifuse\" type=\"checkbox\" id=\"ifuse\" value=\"1\" ";
echo checked( $ifuse, "1" );
echo " />\r\n            ";
echo $strPaycenterUse;
echo "</td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"100\" align=\"right\">&nbsp;</td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td height=\"36\"><input type=\"submit\" name=\"Submit\" value=\"";
echo $strConfirm;
echo "\" class=\"button\" />\r\n            <input type=\"hidden\" name=\"step\" id=\"step\" value=\"modify\" />\r\n            <input name=\"id\" type=\"hidden\" id=\"id\" value=\"";
echo $id;
echo "\" />\r\n        </td>\r\n      </tr>\r\n    \r\n  </table>\r\n</form>\r\n  \r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

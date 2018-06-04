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
$act = $_POST['act'];
$payid = $_POST['payid'];
if ( $act == "modify" )
{
				$msql->query( "select * from {P}_member_paycenter where id='{$payid}'" );
				if ( $msql->next_record( ) )
				{
								$pcenteruser = $msql->f( "pcenteruser" );
								$pcenterkey = $msql->f( "pcenterkey" );
								$key1 = $msql->f( "key1" );
								$key2 = $msql->f( "key2" );
				}
}
echo "\r\n<table cellpadding=\"3\" cellspacing=\"1\" id=\"onlineTemp\">\r\n<tr >\r\n        <td width=\"100\" align=\"right\" class=\"title\">客户号</td>\r\n        <td width=\"5\" align=\"right\" class=\"title\">&nbsp;</td>\r\n        <td><input name=\"pcenteruser\" type=\"text\"  class=\"input\" id=\"pcenteruser\" value=\"";
echo $pcenteruser;
echo "\" size=\"35\" /></td>\r\n      </tr>\r\n      <tr >\r\n        <td width=\"100\" align=\"right\">";
echo "<s";
echo "pan class=\"title\">私钥</span></td>\r\n        <td width=\"5\" align=\"right\">&nbsp;</td>\r\n        <td><input name=\"pcenterkey\" type=\"text\"  class=\"input\" id=\"pcenterkey\" value=\"";
echo $pcenterkey;
echo "\" size=\"35\" /> \r\n          <input name=\"postfile\" type=\"hidden\" id=\"postfile\" value=\"chinaebank_post.php\" />\r\n            <input name=\"recfile\" type=\"hidden\" id=\"recfile\" value=\"chinaebank_rec.php\" /></td>\r\n      </tr>\r\n</table>\r\n";
?>

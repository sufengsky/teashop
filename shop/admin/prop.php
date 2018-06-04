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
needauth( 313 );
$step = $_REQUEST['step'];
$id = $_REQUEST['id'];
$propname = $_REQUEST['propname'];
$xuhao = $_REQUEST['xuhao'];
$catid = $_REQUEST['catid'];
$pid = $_REQUEST['pid'];
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n</head>\r\n\r\n<body class=\"popbody\">\r\n";
if ( $step == "copy" )
{
				$msql->query( "delete from {P}_shop_prop where catid='{$catid}'" );
				$p = 1;
				$msql->query( "select * from {P}_shop_prop where catid='{$pid}'" );
				while ( $msql->next_record( ) )
				{
								$propname = $msql->f( "propname" );
								$xuhao = $msql->f( "xuhao" );
								$fsql->query( "insert into {P}_shop_prop values(\r\n\t\t\t0,\r\n\t\t\t'{$catid}',\r\n\t\t\t'{$propname}',\r\n\t\t\t'{$xuhao}'\r\n\t\t\t)" );
								$p++;
				}
}
if ( $step == "copytosub" )
{
				$msql->query( "select * from {P}_shop_prop where catid='{$catid}' order by xuhao" );
				while ( $msql->next_record( ) )
				{
								$arr['propname'][] = $msql->f( "propname" );
								$arr['xuhao'][] = $msql->f( "xuhao" );
				}
				$nums = sizeof( $arr['propname'] );
				$msql->query( "select * from {P}_shop_cat where pid='{$catid}'" );
				while ( $msql->next_record( ) )
				{
								$subcatid = $msql->f( "catid" );
								$fsql->query( "delete from {P}_shop_prop where catid='{$subcatid}'" );
								$i = 0;
								for ( ;	$i < $nums;	$i++	)
								{
												$p = $arr['propname'][$i];
												$x = $arr['xuhao'][$i];
												$tsql->query( "insert into {P}_shop_prop set\r\n\t\t\t`catid`='{$subcatid}',\r\n\t\t\t`propname`='{$p}',\r\n\t\t\t`xuhao`='{$x}'\r\n\t\t\t" );
								}
				}
}
if ( $step == "add" )
{
				$msql->query( "select count(id) from {P}_shop_prop where catid='{$catid}'" );
				if ( $msql->next_record( ) )
				{
								$count = $msql->f( "count(id)" );
				}
				if ( $propname == "" )
				{
								popback( $strColPropNotice1, "prop.php?catid={$catid}&pid={$pid}" );
				}
				if ( 20 <= $count )
				{
								popback( $strColPropNotice2, "prop.php?catid={$catid}&pid={$pid}" );
				}
				$msql->query( "select max(xuhao) from {P}_shop_prop where catid='{$catid}' " );
				if ( $msql->next_record( ) )
				{
								$max = $msql->f( "max(xuhao)" );
				}
				$max = $max + 1;
				$msql->query( "insert into {P}_shop_prop values(\r\n0,\r\n'{$catid}',\r\n'{$propname}',\r\n'{$max}'\r\n)" );
}
if ( $step == "modify" )
{
				$msql->query( "update {P}_shop_prop set propname='{$propname}',xuhao='{$xuhao}' where id='{$id}'" );
}
if ( $step == "del" )
{
				$msql->query( "delete from {P}_shop_prop where id='{$id}'" );
}
echo "<div id=\"popzone\" class=\"popzone\">\r\n<fieldset>\r\n<legend>";
echo $strColPropTitle;
echo "</legend> \r\n\r\n<div style=\"padding:10px 20px;\">\r\n<form method=\"get\" action=\"prop.php\">\r\n               <input type=\"hidden\" name=\"catid\" value=\"";
echo "{$catid}";
echo "\" />\r\n\t\t\t   <input type=\"hidden\" name=\"pid\" value=\"";
echo "{$pid}";
echo "\" />\r\n              <input type=\"hidden\" name=\"step\" value=\"add\">\r\n              ";
echo $strColPropAdd;
echo " \r\n              <input type=\"text\" name=\"propname\" size=\"20\" class=\"input\">\r\n              <input type=\"submit\" name=\"Submit\" value=\"";
echo $strAdd;
echo "\" class=\"button\">\r\n\t\t\t  ";
if ( $pid != 0 )
{
				echo "<input type=\"button\" name=\"cc2\" value=\"";
				echo $strColPropCopy;
				echo "\" onClick=\"self.location='prop.php?step=copy&pid=";
				echo $pid;
				echo "&catid=";
				echo $catid;
				echo "'\" class=\"button\">\r\n";
}
else
{
				echo "<input type=\"button\" name=\"cc3\" value=\"复制到下一级分类\" onClick=\"self.location='prop.php?step=copytosub&pid=";
				echo $pid;
				echo "&catid=";
				echo $catid;
				echo "'\" class=\"button\">\r\n\r\n";
}
echo "  \r\n <input type=\"button\" name=\"Button2\" value=\"";
echo $strWindowClose;
echo "\" class=button onClick=\"window.close();\">\r\n </form>\r\n  </div>\r\n\t   \r\n  </fieldset>\r\n            <div style=\" position:absolute;margin-top:10px;width:95%; height:390px; overflow:auto;border:0px;\"> \r\n              <table width=\"98%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\" align=\"center\">\r\n                <tr> \r\n                  <td   width=\"30\" align=\"center\" height=\"25\">";
echo $strNumber;
echo "</td>\r\n                  <td   width=\"80\" align=\"center\" height=\"25\">";
echo $strXuhao;
echo "</td>\r\n                  <td height=\"25\"  >";
echo $strColPropName;
echo "</td>\r\n                  <td width=\"50\"   align=\"center\" height=\"25\">";
echo $strModify;
echo "</td>\r\n                  <td width=\"50\" align=\"center\" height=\"25\"  >";
echo $strDelete;
echo "</td>\r\n                </tr>\r\n                ";
$msql->query( "select * from {P}_shop_prop where catid='{$catid}' order by xuhao" );
$i = 1;
while ( $msql->next_record( ) )
{
				$id = $msql->f( "id" );
				$propname = $msql->f( "propname" );
				$xuhao = $msql->f( "xuhao" );
				echo " \r\n                <tr> \r\n                  <td   width=\"30\" align=\"center\">";
				echo "{$i}";
				echo "</td>\r\n                  <form method=\"get\" action=\"prop.php\">\r\n                    <td   width=\"80\" align=\"center\"> \r\n                      <input type=\"text\" name=\"xuhao\" size=\"5\" value=\"";
				echo "{$xuhao}";
				echo "\"  class=\"input\">\r\n                    </td>\r\n                    <td  > \r\n                      <input type=\"text\" name=\"propname\" size=\"30\" value=\"";
				echo "{$propname}";
				echo "\"  class=\"input\">\r\n                      <input type=\"hidden\" name=\"id\" value=\"";
				echo "{$id}";
				echo "\">\r\n                   \r\n\t\t\t\t\t   <input type=\"hidden\" name=\"catid\" value=\"";
				echo "{$catid}";
				echo "\">\r\n\t\t\t\t\t    <input type=\"hidden\" name=\"pid\" value=\"";
				echo "{$pid}";
				echo "\">\r\n                      <input type=\"hidden\" name=\"step\" value=\"modify\">\r\n                    </td>\r\n                    <td width=\"50\"  > \r\n                      <div align=\"CENTER\"> \r\n                        <input type=\"submit\" name=\"cc\" value=\"";
				echo $strModify;
				echo "\" class=button>\r\n                      </div>\r\n                    </td>\r\n                    <td width=\"50\" align=\"center\"  > \r\n                      <input type=\"button\" name=\"cc\" value=\"";
				echo $strDelete;
				echo "\" onClick=\"self.location='prop.php?step=del&pid=";
				echo $pid;
				echo "&catid=";
				echo $catid;
				echo "&id=";
				echo $id;
				echo "'\" class=button>\r\n                    </td>\r\n                  </form>\r\n                </tr>\r\n                ";
				$i++;
}
echo " \r\n              </table>\r\n            </div>\r\n          \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"0\" align=\"center\">\r\n        <tr align=\"center\"> \r\n          <td height=\"36\">\r\n         \r\n            \r\n</td>\r\n        </tr>\r\n  </table>\r\n\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

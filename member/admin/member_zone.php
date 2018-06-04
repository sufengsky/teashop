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
needauth( 61 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript>\r\nfunction checkform(theform){\r\n\r\n  if(theform.cat.value.length < 1 || theform.cat.value=='";
echo $strSetZonentc;
echo "'){\r\n    alert(\"";
echo $strSetZonentc;
echo "\");\r\n    theform.cat.focus();\r\n    return false;\r\n}  \r\n\treturn true;\r\n\r\n}  \r\n\r\n</script>\r\n\r\n</head>\r\n\r\n<body>\r\n";
$step = $_REQUEST['step'];
$pid = $_REQUEST['pid'];
$cat = $_REQUEST['cat'];
$catid = $_REQUEST['catid'];
$xuhao = $_REQUEST['xuhao'];
if ( !isset( $pid ) || $pid == "" )
{
				$pid = 0;
}
if ( $step == "add" && $cat != "" && $cat != " " )
{
				$cat = htmlspecialchars( $cat );
				if ( $pid != "0" )
				{
								$msql->query( "select catpath from {P}_member_zone where catid='{$pid}' " );
								if ( $msql->next_record( ) )
								{
												$pcatpath = $msql->f( "catpath" );
								}
				}
				if ( 5 < strlen( $pcatpath ) )
				{
								err( $strSetZoneNotice1, "", "" );
				}
				$msql->query( "select max(xuhao) from {P}_member_zone where pid='{$pid}' " );
				if ( $msql->next_record( ) )
				{
								$maxxuhao = $msql->f( "max(xuhao)" );
								$nowxuhao = $maxxuhao + 1;
				}
				$msql->query( "insert into {P}_member_zone values (0,'{$pid}','{$cat}','{$nowxuhao}','{$catpath}')" );
				$nowcatid = $msql->instid( );
				$nowpath = fmpath( $nowcatid );
				$catpath = $pcatpath.$nowpath.":";
				$msql->query( "update {P}_member_zone set catpath='{$catpath}' where catid='{$nowcatid}' " );
				echo "<script>self.location='member_zone.php?pid={$pid}'</script>";
}
if ( $step == "del" )
{
				$msql->query( "select memberid from {P}_member where zoneid='{$catid}'  " );
				if ( $msql->next_record( ) )
				{
								err( $strSetZoneNotice2, "", "" );
				}
				$msql->query( "select catid from {P}_member_zone where pid='{$catid}' " );
				if ( $msql->next_record( ) )
				{
								err( $strSetZoneNotice3, "", "" );
				}
				$msql->query( "delete from {P}_member_zone where catid='{$catid}'" );
				echo "<script>self.location='member_zone.php?pid={$pid}'</script>";
}
if ( $step == "modify" && $cat != "" && $cat != " " )
{
				$cat = htmlspecialchars( $cat );
				$msql->query( "update {P}_member_zone set cat='{$cat}',xuhao='{$xuhao}' where catid='{$catid}'  " );
				echo "<script>self.location='member_zone.php?pid={$pid}'</script>";
}
echo "\r\n<div class=\"searchzone\">\r\n \r\n <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" height=\"30\">\r\n  <tr > \r\n   <td >\r\n   ";
echo "<s";
echo "elect name=\"pid\" onChange=\"self.location=this.options[this.selectedIndex].value\">\r\n\t  <option value='member_zone.php'>";
echo $strSetZoneSel;
echo "</option>\r\n         ";
$fsql->query( "select * from {P}_member_zone order by catpath" );
while ( $fsql->next_record( ) )
{
				$lpid = $fsql->f( "pid" );
				$lcatid = $fsql->f( "catid" );
				$cat = $fsql->f( "cat" );
				$catpath = $fsql->f( "catpath" );
				$lcatpath = explode( ":", $catpath );
				$i = 0;
				for ( ;	$i < sizeof( $lcatpath ) - 2;	$i++	)
				{
								$tsql->query( "select catid,cat from {P}_member_zone where catid='{$lcatpath[$i]}'" );
								if ( $tsql->next_record( ) )
								{
												$ncatid = $tsql->f( "cat" );
												$ncat = $tsql->f( "cat" );
												$ppcat .= $ncat."/";
								}
				}
				if ( $pid == $lcatid )
				{
								echo "<option value='member_zone.php?pid=".$lcatid."' selected>".$ppcat.$cat."</option>";
				}
				else
				{
								echo "<option value='member_zone.php?pid=".$lcatid."'>".$ppcat.$cat."</option>";
				}
				$ppcat = "";
}
echo "        </select>    </td> \r\n      <td align=\"right\"> \r\n        <form method=\"get\" action=\"member_zone.php\" onSubmit=\"return checkform(this)\" />\r\n\t\t<input type=\"hidden\" name=\"step\" value=\"add\"  />\r\n        \r\n        ";
echo "<s";
echo "elect name=\"pid\" id=\"pid\" >\r\n          <option value='0'>";
echo $strSetZoneAdd1;
echo "</option>\r\n          ";
$fsql->query( "select * from {P}_member_zone order by catpath" );
while ( $fsql->next_record( ) )
{
				$lpid = $fsql->f( "pid" );
				$lcatid = $fsql->f( "catid" );
				$cat = $fsql->f( "cat" );
				$catpath = $fsql->f( "catpath" );
				$lcatpath = explode( ":", $catpath );
				$i = 0;
				for ( ;	$i < sizeof( $lcatpath ) - 2;	$i++	)
				{
								$tsql->query( "select catid,cat from {P}_member_zone where catid='{$lcatpath[$i]}'" );
								if ( $tsql->next_record( ) )
								{
												$ncatid = $tsql->f( "cat" );
												$ncat = $tsql->f( "cat" );
												$ppcat .= $ncat."&gt;";
								}
				}
				if ( $pid == $lcatid )
				{
								echo "<option value='".$lcatid."' selected>".$strZoneLocat1.$ppcat.$cat."</option>";
				}
				else
				{
								echo "<option value='".$lcatid."'>".$strZoneLocat1.$ppcat.$cat."</option>";
				}
				$ppcat = "";
}
echo "        </select>\r\n        <input name=\"cat\" type=\"text\" class=\"input\" value=\"";
echo $strSetZonentc;
echo "\" onFocus=\"this.value=''\" size=\"18\" />\r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSetZoneAdd;
echo "\" class=\"button\" />\r\n\t\t</form>\r\n    </td> \r\n  </tr>\r\n</table>\r\n\r\n</div>\r\n<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n  <tr> \r\n    <td width=\"60\" align=\"center\" class=\"biaoti\">";
echo $strSetZoneId;
echo "</td>\r\n    <td width=\"120\" class=\"biaoti\">";
echo $strSetZoneXuhao;
echo "</td>\r\n    <td  class=\"biaoti\">";
echo $strSetZoneName;
echo "</td>\r\n    <td width=\"38\"  class=\"biaoti\" align=\"center\">";
echo $strModify;
echo "</td>\r\n    <td width=\"38\" align=\"center\"  class=\"biaoti\">";
echo $strDelete;
echo "</td>\r\n  </tr>\r\n  ";
$msql->query( "select * from {P}_member_zone where   pid='{$pid}' order by xuhao" );
while ( $msql->next_record( ) )
{
				$catid = $msql->f( "catid" );
				$cat = $msql->f( "cat" );
				$xuhao = $msql->f( "xuhao" );
				$pid = $msql->f( "pid" );
				$catpath = $msql->f( "catpath" );
				echo " \r\n  <tr class=\"list\"> \r\n    <td width=\"60\" align=\"center\" >";
				echo "{$catid}";
				echo "</td>\r\n    <form method=\"get\" action=\"member_zone.php\">\r\n      <td width=\"120\" > \r\n        <input type=\"text\" name=\"xuhao\" size=\"4\" value=\"";
				echo "{$xuhao}";
				echo "\" class=input>\r\n      </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"cat\" size=\"30\" value=\"";
				echo "{$cat}";
				echo "\" class=input>\r\n        <input type=\"hidden\" name=\"catid\" value=\"";
				echo "{$catid}";
				echo "\">\r\n        <input type=\"hidden\" name=\"pid\" value=\"";
				echo "{$pid}";
				echo "\">\r\n        <input type=\"hidden\" name=\"step\" value=\"modify\">\r\n      </td>\r\n      <td width=\"38\"  > \r\n       \r\n          <input type=\"image\" border=\"0\" name=\"imageField\" src=\"images/modi.png\" >\r\n        \r\n      </td>\r\n      <td width=\"38\" align=\"center\"  ><img src=\"images/delete.png\"  style=\"cursor:pointer\"  border=0 onClick=\"self.location='member_zone.php?step=del&catid=";
				echo $catid;
				echo "&pid=";
				echo $pid;
				echo "'\"> \r\n      </td>\r\n    </form>\r\n  </tr>\r\n  ";
}
echo " \r\n</table>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

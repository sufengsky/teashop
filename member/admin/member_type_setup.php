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
needauth( 50 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body>\r\n";
$step = $_REQUEST['step'];
$membertypeid = $_REQUEST['membertypeid'];
$membertype = $_REQUEST['membertype'];
$membergroupid = $_REQUEST['membergroupid'];
$ifcanreg = $_REQUEST['ifcanreg'];
$ifchecked = $_REQUEST['ifchecked'];
$regxy = $_REQUEST['regxy'];
$regmail = $_REQUEST['regmail'];
$expday = $_REQUEST['expday'];
$startcent = $_REQUEST['startcent'];
$endcent = $_REQUEST['endcent'];
$menugroupid = $_REQUEST['menugroupid'];
if ( $step == "mod" )
{
				$membertype = htmlspecialchars( $membertype );
				$regxy = htmlspecialchars( $regxy );
				$regmail = htmlspecialchars( $regmail );
				if ( $membertype == "" )
				{
								err( $strMemberTypeNotice10, "", "" );
				}
				$msql->query( "update {P}_member_type set\r\n\tmembertype='{$membertype}',\r\n\tregxy='{$regxy}',\r\n\tregmail='{$regmail}',\r\n\tmembergroupid='{$membergroupid}',\r\n\tifcanreg='{$ifcanreg}',\r\n\texpday='{$expday}',\r\n\tstartcent='{$startcent}',\r\n\tendcent='{$endcent}',\r\n\tmenugroupid='{$menugroupid}',\r\n\tifchecked='{$ifchecked}'\r\n\r\n \twhere membertypeid='{$membertypeid}'" );
				$regstep = $_POST['regstep'];
				$msql->query( "delete from {P}_member_regstep where membertypeid='{$membertypeid}'" );
				$i = 0;
				for ( ;	$i < sizeof( $regstep );	$i++	)
				{
								$xuhao = $i + 1;
								$msql->query( "select stepname from {P}_member_regstep where regstep='".$regstep[$i]."' and membertypeid='0'" );
								if ( $msql->next_record( ) )
								{
												$stepname = $msql->f( "stepname" );
								}
								$msql->query( "insert into {P}_member_regstep set \r\n\t\tmembertypeid='{$membertypeid}',\r\n\t\tregstep='".$regstep[$i]."',\r\n\t\tstepname='{$stepname}',\r\n\t\txuhao='{$xuhao}'\r\n\t\t" );
				}
				sayok( $strMemberTypeNotice11, "member_type.php", "" );
}
$msql->query( "select * from {P}_member_type where membertypeid='{$membertypeid}'" );
if ( $msql->next_record( ) )
{
				$membertypeid = $msql->f( "membertypeid" );
				$membertype = $msql->f( "membertype" );
				$membergroupid = $msql->f( "membergroupid" );
				$ifcanreg = $msql->f( "ifcanreg" );
				$ifchecked = $msql->f( "ifchecked" );
				$regxy = $msql->f( "regxy" );
				$regmail = $msql->f( "regmail" );
				$expday = $msql->f( "expday" );
				$startcent = $msql->f( "startcent" );
				$endcent = $msql->f( "endcent" );
				$menugroupid = $msql->f( "menugroupid" );
}
echo "<div class=\"formzone\">\r\n<form method=\"post\" action=\"\">\r\n<div class=\"namezone\" >";
echo $strMemberTypeCsSet;
echo " - ";
echo $membertype;
echo "</div>\r\n\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\">\r\n  <tr> \r\n    <td width=\"127\" > \r\n      <div align=\"right\">";
echo $strMemberTypeId;
echo " :</div>\r\n    </td>\r\n    <td  > ";
echo "{$membertypeid}";
echo " </td>\r\n  </tr>\r\n \r\n    <tr> \r\n      <td width=\"127\" > \r\n        <div align=\"right\">";
echo $strMemberType;
echo " :</div>\r\n      </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"membertype\" size=\"22\" value=\"";
echo "{$membertype}";
echo "\"  class=input>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"127\" align=\"right\" >";
echo $strMemberGroup;
echo " :</td>\r\n      <td >";
echo "<s";
echo "elect name=\"membergroupid\">\r\n          ";
$fsql->query( "select * from {P}_member_group order by id" );
while ( $fsql->next_record( ) )
{
				$lmembergroupid = $fsql->f( "id" );
				$membergroup = $fsql->f( "membergroup" );
				if ( $lmembergroupid == $membergroupid )
				{
								echo "<option value='".$lmembergroupid."'  selected>".$membergroup."</option>";
				}
				else
				{
								echo "<option value='".$lmembergroupid."'  >".$membergroup."</option>";
				}
}
echo "          \r\n      </select></td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" > \r\n        <div align=\"right\">";
echo $strMemberTypeRegAllow;
echo " :</div>\r\n      </td>\r\n      <td  > \r\n        ";
echo "<s";
echo "elect name=\"ifcanreg\">\r\n          <option value=\"1\" ";
echo seld( $ifcanreg, "1" );
echo ">";
echo $strMemberTypeNotice5;
echo "</option>\r\n          <option value=\"0\"  ";
echo seld( $ifcanreg, "0" );
echo ">";
echo $strMemberTypeNotice6;
echo "</option>\r\n        </select>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"right\" >";
echo $strMemberRegStep;
echo " : </td>\r\n      <td >";
$exist = array( "" );
$msql->query( "select * from {P}_member_regstep where membertypeid='{$membertypeid}' order by xuhao" );
while ( $msql->next_record( ) )
{
				$regstep = $msql->f( "regstep" );
				$stepname = $msql->f( "stepname" );
				$exist[] = $regstep;
				echo "          <input name=\"regstep[]\" type=\"checkbox\" id=\"regstep\" value=\"";
				echo $regstep;
				echo "\" checked=\"checked\" /> ";
				echo $stepname;
				echo "          ";
}
$fsql->query( "select * from {P}_member_regstep where membertypeid='0' order by xuhao" );
while ( $fsql->next_record( ) )
{
				$regstep = $fsql->f( "regstep" );
				$stepname = $fsql->f( "stepname" );
				if ( in_array( $regstep, $exist ) == false )
				{
								echo "\t\t <input name=\"regstep[]\" type=\"checkbox\" id=\"regstep\" value=\"";
								echo $regstep;
								echo "\"  /> ";
								echo $stepname;
								echo "\t\t ";
				}
}
echo "      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" > \r\n        <div align=\"right\">";
echo $strMemberTypeRegDays;
echo " :</div>\r\n      </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"expday\" size=\"3\" value=\"";
echo "{$expday}";
echo "\"  class=input>";
echo $strMemberTypeRegDay;
echo "        [";
echo $strMemberTypeNotice9;
echo "] </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" > \r\n        <div align=\"right\">";
echo $strMemberTypeRegxy;
echo " :</div>\r\n      </td>\r\n      <td  > \r\n        <textarea name=\"regxy\" cols=\"60\" rows=\"8\"  class=\"textarea\">";
echo $regxy;
echo "</textarea>\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" > \r\n        <div align=\"right\">";
echo $strMemberTypeRegMail;
echo " :</div>\r\n      </td>\r\n      <td  > \r\n        <textarea name=\"regmail\" cols=\"60\" rows=\"8\"  class=\"textarea\">";
echo $regmail;
echo "</textarea>\r\n      </td>\r\n    </tr>\r\n\t\r\n\t<tr>\r\n      <td align=\"right\" >";
echo $strMenuGroupSel;
echo " : </td>\r\n      <td >";
echo "<s";
echo "elect name=\"menugroupid\">\r\n\t  \t";
$fsql->query( "select * from {P}_menu_group order by id" );
while ( $fsql->next_record( ) )
{
				$menugroup = $fsql->f( "id" );
				$menugroupname = $fsql->f( "groupname" );
				if ( $menugroup == $menugroupid )
				{
								echo "<option value='".$menugroup."'  selected>".$menugroupname."</option>";
				}
				else
				{
								echo "<option value='".$menugroup."'  >".$menugroupname."</option>";
				}
}
echo "        \r\n      </select></td>\r\n    </tr>\r\n   \r\n \r\n</table>\r\n</div> \r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"Submit\" value=\"";
echo $strModify;
echo "\"  class=\"button\" />\r\n<input type=\"hidden\" name=\"step\" value=\"mod\" />\r\n<input type=\"hidden\" name=\"membertypeid\" value=\"";
echo $membertypeid;
echo "\" />\r\n<input name=\"ifchecked\" type=\"hidden\" id=\"ifchecked\" value=\"1\" />\r\n</div>\r\n</form>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

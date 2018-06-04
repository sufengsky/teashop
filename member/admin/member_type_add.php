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
if ( $step == "add" )
{
				trylimit( "_member_type", 3, "membertypeid" );
				$msql->query( "insert into {P}_member_type values(\r\n\t0,\r\n\t'{$membertype}',\r\n\t'{$membergroupid}',\r\n\t'{$ifcanreg}',\r\n\t'{$ifchecked}',\r\n\t'{$regxy}',\r\n\t'{$regmail}',\r\n\t'{$expday}',\r\n\t'{$startcent}',\r\n\t'{$endcent}',\r\n\t'{$menugroupid}'\r\n\t)" );
				$membertypeid = $msql->instid( );
				$regstep = $_POST['regstep'];
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
				sayok( $strMemberTypeNotice4, "member_type.php", "" );
}
echo "<div class=\"formzone\">\r\n<form method=\"post\" action=\"member_type_add.php\">\r\n\r\n<div class=\"namezone\" >";
echo $strMemberTypeAdd;
echo "</div>\r\n\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\">\r\n \r\n    <tr> \r\n      <td width=\"127\" align=\"right\" > \r\n       ";
echo $strMemberType;
echo " : </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"membertype\" size=\"22\"  class=input>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"127\" align=\"right\" >";
echo $strMemberGroup;
echo " : </td>\r\n      <td >";
echo "<s";
echo "elect name=\"membergroupid\">\r\n\t  \t";
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
echo "        \r\n      </select></td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" align=\"right\" >";
echo $strMemberTypeRegAllow;
echo " : </td>\r\n      <td  > \r\n        ";
echo "<s";
echo "elect name=\"ifcanreg\">\r\n          <option value=\"1\" selected >";
echo $strMemberTypeNotice5;
echo "</option>\r\n          <option value=\"0\"  >";
echo $strMemberTypeNotice6;
echo "</option>\r\n        </select>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"127\" align=\"right\" >";
echo $strMemberRegStep;
echo " : </td>\r\n      <td >\r\n\t  ";
$msql->query( "select * from {P}_member_regstep where membertypeid='0' order by xuhao" );
while ( $msql->next_record( ) )
{
				$regstep = $msql->f( "regstep" );
				$stepname = $msql->f( "stepname" );
				echo "\t\t<input name=\"regstep[]\" type=\"checkbox\" id=\"regstep\" value=\"";
				echo $regstep;
				echo "\" checked=\"checked\" /> \r\n\t\t";
				echo $stepname;
				echo "\t\t";
}
echo "\t  </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" align=\"right\" > \r\n        ";
echo $strMemberTypeRegDays;
echo " : </td>\r\n      <td  > \r\n        <input type=\"text\" name=\"expday\" size=\"3\" value=\"0\"  class=input>\r\n        ";
echo $strMemberTypeRegDay;
echo " [";
echo $strMemberTypeNotice9;
echo "] </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" align=\"right\" > \r\n        ";
echo $strMemberTypeRegxy;
echo " : </td>\r\n      <td > \r\n        <textarea name=\"regxy\" cols=\"60\" rows=\"8\"  class=\"textarea\"></textarea>\r\n      </td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\"127\" align=\"right\" > \r\n        ";
echo $strMemberTypeRegMail;
echo " : </td>\r\n      <td > \r\n        <textarea name=\"regmail\" cols=\"60\" rows=\"8\"  class=\"textarea\">";
echo $strMemberTypeRegTemp;
echo "</textarea>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"right\" >";
echo $strMenuGroupSel;
echo " : </td>\r\n      <td >";
echo "<s";
echo "elect name=\"menugroupid\">\r\n\t  \t";
$fsql->query( "select * from {P}_menu_group order by id" );
while ( $fsql->next_record( ) )
{
				$menugroup = $fsql->f( "id" );
				$menugroupname = $fsql->f( "groupname" );
				if ( $menugroup == "4" )
				{
								echo "<option value='".$menugroup."'  selected>".$menugroupname."</option>";
				}
				else
				{
								echo "<option value='".$menugroup."'  >".$menugroupname."</option>";
				}
}
echo "        \r\n      </select></td>\r\n    </tr>\r\n    <tr align=\"center\"> \r\n      <td colspan=\"2\"  height=\"28\"> \r\n       \r\n      </td>\r\n    </tr>\r\n \r\n</table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"Submit\" value=\"";
echo $strConfirm;
echo "\"  class=\"button\">\r\n<input type=\"hidden\" name=\"step\" value=\"add\">\r\n<input name=\"ifchecked\" type=\"hidden\" id=\"ifchecked\" value=\"1\" />\r\n</div> \r\n</form>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

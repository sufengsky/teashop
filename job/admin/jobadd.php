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
needauth( 221 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/job.js\"></script>\r\n<body >\r\n";
$step = $_REQUEST['step'];
if ( $step == "add" )
{
				$jobname = htmlspecialchars( $_POST['jobname'] );
				$jobtype = htmlspecialchars( $_POST['jobtype'] );
				$experience = htmlspecialchars( $_POST['experience'] );
				$education = htmlspecialchars( $_POST['education'] );
				$langneed = htmlspecialchars( $_POST['langneed'] );
				$langlevel = htmlspecialchars( $_POST['langlevel'] );
				$pnums = htmlspecialchars( $_POST['pnums'] );
				$jobaddr = htmlspecialchars( $_POST['jobaddr'] );
				$jobintro = htmlspecialchars( $_POST['jobintro'] );
				$jobrequest = htmlspecialchars( $_POST['jobrequest'] );
				$jobstat = htmlspecialchars( $_POST['jobstat'] );
				$contact = htmlspecialchars( $_POST['contact'] );
				$tel = htmlspecialchars( $_POST['tel'] );
				$email = htmlspecialchars( $_POST['email'] );
				$dtime = $uptime = time( );
				trylimit( "_job", 5, "id" );
				if ( $jobname == "" )
				{
								err( $strJobNotice2, "", "" );
				}
				if ( 200 < strlen( $jobname ) )
				{
								err( $strJobNotice3, "", "" );
				}
				if ( 65000 < strlen( $jobintro ) )
				{
								err( $strJobNotice5, "", "" );
				}
				if ( 65000 < strlen( $jobrequest ) )
				{
								err( $strJobNotice6, "", "" );
				}
				$msql->query( "insert into {P}_job set \r\n\tjobname='{$jobname}',\r\n\tjobtype='{$jobtype}',\r\n\texperience='{$experience}',\r\n\teducation='{$education}',\r\n\tlangneed='{$langneed}',\r\n\tlanglevel='{$langlevel}',\r\n\tpnums='{$pnums}',\r\n\tjobaddr='{$jobaddr}',\r\n\tjobintro='{$jobintro}',\r\n\tjobrequest='{$jobrequest}',\r\n\tjobstat='{$jobstat}',\r\n\tcontact='{$contact}',\r\n\ttel='{$tel}',\r\n\temail='{$email}',\r\n\tdtime='{$dtime}',\r\n\tuptime='{$uptime}',\r\n\tendtime='0',\r\n\ttj='0',\r\n\tiffb='1'\r\n\t" );
				sayok( $strJobNotice7, "job.php", "" );
}
echo " \r\n\r\n<form action=\"jobadd.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"form\" id=\"addJobForm\">\r\n<div class=\"formzone\">\r\n<div class=\"namezone\">\r\n";
echo $strSetMenu2;
echo "</div>\r\n<div class=\"tablezone\">\r\n  \r\n\r\n      <table width=\"100%\" cellpadding=\"2\" align=\"center\"  border=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td width=\"100\" height=\"30\" align=\"center\" >";
echo $strJobF1;
echo "</td>\r\n          <td height=\"30\" ><input name=\"jobname\" type=\"text\" class=\"input\" id=\"jobname\" value=\"\" size=\"30\"   maxlength=\"200\" />\r\n          <font color=\"#FF0000\">*</font> </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF2;
echo "</td>\r\n          <td height=\"30\" ><input name=\"jobtype\" type=\"radio\" value=\"";
echo $strJobF2_1;
echo "\" checked=\"checked\" />\r\n            ";
echo $strJobF2_1;
echo "          <input type=\"radio\" name=\"jobtype\" value=\"";
echo $strJobF2_2;
echo "\" />\r\n          ";
echo $strJobF2_2;
echo "          <input type=\"radio\" name=\"jobtype\" value=\"";
echo $strJobF2_3;
echo "\" />\r\n          ";
echo $strJobF2_3;
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF3;
echo "</td>\r\n          <td height=\"30\" >\r\n\t\t  ";
echo "<s";
echo "elect name=\"experience\" id=\"experience\">\r\n            <option value=\"";
echo $strJobF3_1;
echo "\" selected=\"selected\">";
echo $strJobF3_1;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_2;
echo "\" >";
echo $strJobF3_2;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_3;
echo "\">";
echo $strJobF3_3;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_4;
echo "\" >";
echo $strJobF3_4;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_5;
echo "\" >";
echo $strJobF3_5;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_6;
echo "\" >";
echo $strJobF3_6;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_7;
echo "\" >";
echo $strJobF3_7;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_8;
echo "\" >";
echo $strJobF3_8;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_9;
echo "\" >";
echo $strJobF3_9;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_10;
echo "\" >";
echo $strJobF3_10;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_11;
echo "\" >";
echo $strJobF3_11;
echo "</option>\r\n\t\t\t<option value=\"";
echo $strJobF3_12;
echo "\" >";
echo $strJobF3_12;
echo "</option>\r\n          </select></td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF4;
echo "</td>\r\n          <td height=\"30\" >";
echo "<s";
echo "elect name=\"education\" id=\"education\">\r\n            <option value=\"";
echo $strJobF4_1;
echo "\" selected=\"selected\">";
echo $strJobF4_1;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_2;
echo "\" >";
echo $strJobF4_2;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_3;
echo "\">";
echo $strJobF4_3;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_4;
echo "\" >";
echo $strJobF4_4;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_5;
echo "\" >";
echo $strJobF4_5;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_6;
echo "\" >";
echo $strJobF4_6;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_7;
echo "\" >";
echo $strJobF4_7;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_8;
echo "\" >";
echo $strJobF4_8;
echo "</option>\r\n            <option value=\"";
echo $strJobF4_9;
echo "\" >";
echo $strJobF4_9;
echo "</option>\r\n          </select></td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF7;
echo "</td>\r\n          <td height=\"30\" ><input name=\"pnums\" type=\"text\" class=\"input\" id=\"pnums\" value=\"\" size=\"3\"   maxlength=\"200\" />\r\n          <font color=\"#FF0000\">*</font>  </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF8;
echo "</td>\r\n          <td height=\"30\" ><input name=\"jobaddr\" type=\"text\" class=\"input\" id=\"jobaddr\" value=\"\" size=\"30\"   maxlength=\"200\" />\r\n          <font color=\"#FF0000\">*</font> </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF9;
echo "</td>\r\n          <td height=\"30\" ><textarea name=\"jobintro\" rows=\"8\" class=\"textarea\" id=\"jobintro\" style=\"width:500px\"></textarea>\r\n            <font color=\"#FF0000\">*</font> </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF14;
echo "</td>\r\n          <td height=\"30\" ><textarea name=\"jobrequest\" rows=\"8\" class=\"textarea\" id=\"jobrequest\" style=\"width:500px\"></textarea>\r\n              <font color=\"#FF0000\">*</font> </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF10;
echo "</td>\r\n          <td height=\"30\" ><input name=\"contact\" type=\"text\" class=\"input\" id=\"contact\" value=\"\" size=\"30\"   maxlength=\"200\" />              </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF11;
echo "</td>\r\n          <td height=\"30\" ><input name=\"tel\" type=\"text\" class=\"input\" id=\"tel\" value=\"\" size=\"50\"   maxlength=\"200\" />              </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF12;
echo "</td>\r\n          <td height=\"30\" ><input name=\"email\" type=\"text\" class=\"input\" id=\"email\" value=\"\" size=\"50\"   maxlength=\"200\" />              </td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" align=\"center\" >";
echo $strJobF13;
echo "</td>\r\n          <td height=\"30\" >";
echo "<s";
echo "elect name=\"jobstat\" id=\"jobstat\">\r\n              <option value=\"1\" selected=\"selected\">";
echo $strJobF13_1;
echo "</option>\r\n\t\t\t    <option value=\"0\" >";
echo $strJobF13_2;
echo "</option>\r\n             \r\n          </select></td>\r\n        </tr>\r\n          \r\n          \r\n        \r\n      </table>\r\n\t \r\n</div>  \r\n<div class=\"adminsubmit\">\r\n<input type=\"submit\" name=\"submit\"  value=\"";
echo $strSubmit;
echo "\" class=\"button\" />\r\n<input type=\"hidden\" name=\"step\" value=\"add\" />\r\n</div> \r\n</div>\r\n</form>\r\n</body>\r\n</html>\r\n";
?>

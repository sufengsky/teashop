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
needauth( 53 );
$step = $_REQUEST['step'];
$memberid = $_REQUEST['memberid'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript>\r\nfunction checkexp(exp){\r\n\tif(exp==0){\r\n\tttt.style.visibility=\"hidden\";\t\r\n\t}else{\r\n\tttt.style.visibility=\"visible\";\t\t\r\n\t}\r\n}\r\n\r\n</script>\r\n</head>\r\n\r\n<body>\r\n";
if ( $step == "modify" )
{
				trylimit( "_member", 300, "memberid" );
				needauth( 54 );
				$name = $_POST['name'];
				$company = $_POST['company'];
				$sex = $_POST['sex'];
				$birth0 = $_POST['birth0'];
				$birth1 = $_POST['birth1'];
				$birth2 = $_POST['birth2'];
				$addr = $_POST['addr'];
				$tel = $_POST['tel'];
				$mov = $_POST['mov'];
				$postcode = $_POST['postcode'];
				$email = $_POST['email'];
				$url = $_POST['url'];
				$zoneid = $_POST['zoneid'];
				$Province = $_POST['Province'];
				$passtype = $_POST['passtype'];
				$passcode = $_POST['passcode'];
				$qq = $_POST['qq'];
				$msn = $_POST['msn'];
				$bz = $_POST['bz'];
				$sayexp = $_POST['sayexp'];
				$tags = $_POST['tags'];
				$salesname = $_POST['salesname'];
				$memberid = $_POST['memberid'];
				$rz = $_POST['rz'];
				$oldrz = $_POST['oldrz'];
				$yy = $_POST['yy'];
				$dd = $_POST['dd'];
				$mm = $_POST['mm'];
				$se = $_POST['se'];
				$mi = $_POST['mi'];
				$ho = $_POST['ho'];
				$ResetPass = $_POST['ResetPass'];
				$password = $_POST['password'];
				$mdpass = md5( $password );
				if ( $oldrz != $rz )
				{
								needauth( 59 );
				}
				if ( $ResetPass == "yes" )
				{
								needauth( 65 );
				}
				$birthday = $birth0.$birth1.$birth2;
				if ( $sayexp == "0" )
				{
								$exptime = 0;
				}
				else
				{
								$exptime = mktime( $ho, $mi, $se, $mm, $dd, $yy );
				}
				$t = 0;
				for ( ;	$t < sizeof( $tags );	$t++	)
				{
								if ( $tags[$t] != "" )
								{
												$tagstr .= $tags[$t].",";
								}
				}
				$msql->query( "update {P}_member set\r\nname='{$name}',\r\ncompany='{$company}',\r\npname='{$pname}',\r\nsex='{$sex}',\r\nbirthday='{$birthday}',\r\nzoneid='{$zoneid}',\r\naddr='{$addr}',\r\ntel='{$tel}',\r\nmov='{$mov}',\r\npostcode='{$postcode}',\r\nemail='{$email}',\r\nurl='{$url}',\r\npasstype='{$passtype}',\r\npasscode='{$passcode}',\r\nqq='{$qq}',\r\nmsn='{$msn}',\r\nmaillist='{$maillist}',\r\nbz='{$bz}',\r\nrz='{$rz}',\r\ntags='{$tagstr}',\r\nsalesname='{$salesname}',\r\nexptime='{$exptime}' \r\n\r\nwhere memberid='{$memberid}'" );
				if ( $ResetPass == "yes" )
				{
								$msql->query( "update {P}_member set password='{$mdpass}' where memberid='{$memberid}'" );
				}
				echo "<script>parent.\$.unblockUI()</script>";
				exit( );
}
$msql->query( "select * from {P}_member where memberid='{$memberid}'" );
if ( $msql->next_record( ) )
{
				$user = $msql->f( "user" );
				$password = $msql->f( "password" );
				$name = $msql->f( "name" );
				$company = $msql->f( "company" );
				$sex = $msql->f( "sex" );
				$birthday = $msql->f( "birthday" );
				$zoneid = $msql->f( "zoneid" );
				$addr = $msql->f( "addr" );
				$tel = $msql->f( "tel" );
				$mov = $msql->f( "mov" );
				$postcode = $msql->f( "postcode" );
				$email = $msql->f( "email" );
				$url = $msql->f( "url" );
				$passtype = $msql->f( "passtype" );
				$passcode = $msql->f( "passcode" );
				$qq = $msql->f( "qq" );
				$msn = $msql->f( "msn" );
				$maillist = $msql->f( "maillist" );
				$bz = $msql->f( "bz" );
				$checked = $msql->f( "checked" );
				$regtime = $msql->f( "regtime" );
				$exptime = $msql->f( "exptime" );
				$account = $msql->f( "account" );
				$paytotal = $msql->f( "paytotal" );
				$buytotal = $msql->f( "buytotal" );
				$pname = $msql->f( "pname" );
				$ip = $msql->f( "ip" );
				$checked = $msql->f( "checked" );
				$salesname = $msql->f( "salesname" );
				$rz = $msql->f( "rz" );
				$logincount = $msql->f( "logincount" );
				$logintime = $msql->f( "logintime" );
				$loginip = $msql->f( "loginip" );
				$tags = $msql->f( "tags" );
				$tags = explode( ",", $tags );
				$regtime = date( "Y-n-j H:i:s", $regtime );
				$logintime = date( "Y-n-j H:i:s", $logintime );
				$birth0 = substr( $birthday, 0, 4 );
				$birth1 = substr( $birthday, 4, 2 );
				$birth2 = substr( $birthday, 6, 2 );
				$date = getdate( $exptime );
				$yy = $date['year'];
				$dd = $date['mday'];
				$mm = $date['mon'];
				$ho = $date['hours'];
				$mi = $date['minutes'];
				$se = $date['seconds'];
				if ( $exptime == "0" )
				{
								$sayexp = 0;
				}
				else
				{
								$sayexp = 1;
				}
}
echo "\r\n<div class=\"formzone\">\r\n<form method=\"post\" name='regform' action=\"member_modify.php\">\r\n\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" >\r\n \r\n   <tr>\r\n     <td height=\"12\" colspan=\"4\"  ></td>\r\n    </tr>\r\n   <tr>\r\n   <td width=\"85\"  align=center >";
echo $strMemberUser1;
echo "</td>\r\n   <td width=\"300\"  >\r\n   \r\n   <table border=\"0\" cellspacing=\"1\" cellpadding=\"1\" width=\"100%\">\r\n     <tr>\r\n       <td><input readonly class=\"input\" type=\"text\" size=13 name=\"u\" value='";
echo $user;
echo "' /></td>\r\n       <td>";
echo $strMemberFrom21;
echo "</td>\r\n       <td><input name='pname' type=\"text\" class=\"input\" id=\"pname\" value='";
echo $pname;
echo "' size=15 /></td>\r\n     </tr>\r\n   </table>\r\n   </td>\r\n   <td width=\"90\"  align=center >";
echo $strMemberFrom2;
echo "</td>\r\n   <td  ><input class=\"input\" type=\"password\" size=18 name='password' value='******' />\r\n     <input type=\"checkbox\" name=\"ResetPass\" value='yes' onClick=\"regform.password.value='';regform.password.focus();\" />\r\n     ";
echo $strMemberResetPass;
echo "</td>\r\n   </tr>    \r\n   \r\n   <tr>\r\n     <td width=\"85\"  align=center >";
echo $strMemberFrom22;
echo "</td>\r\n     <td  ><input name='company' type=\"text\" class=\"input\" id=\"company\" value='";
echo $company;
echo "' size=\"50\" /></td>\r\n     <td width=\"90\"  align=center >";
echo $strMemberFrom4;
echo "</td>\r\n     <td  ><input name='name' type=\"text\" class=\"input\" id=\"name\" value='";
echo $name;
echo "' size=12 />\r\n      &nbsp;\r\n\t   <input name=\"sex\" type=\"radio\" value=\"1\" ";
echo checked( $sex, "1" );
echo " />\r\n       ";
echo $strMan;
echo "       <input type=\"radio\" name=\"sex\" value=\"2\" ";
echo checked( $sex, "2" );
echo " />\r\n       ";
echo $strWoman;
echo "</td>\r\n   </tr>\r\n   <tr>\r\n     <td width=\"85\"  align=center >";
echo $strMemberFrom8;
echo "</td>\r\n     <td  ><input name='addr' type=\"text\" class=\"input\" id=\"addr\" value='";
echo $addr;
echo "' size=50 /></td>\r\n     <td width=\"90\"  align=center >";
echo $strMemberFrom6;
echo "</td>\r\n     <td  >\r\n\t ";
echo "<S";
echo "CRIPT language=javascript src='js/zone.js'></SCRIPT>\r\n\t";
echo "<s";
echo "cript language=javascript>\r\n\t";
$fsql->query( "select * from {P}_member_zone where pid = '0' order by xuhao" );
$i = 0;
while ( $fsql->next_record( ) )
{
				$zone_id = $fsql->f( "catid" );
				$zone = $fsql->f( "cat" );
				echo "pList.add(new province('".$zone."','".$zone_id."'));\n";
				$tsql->query( "select * from {P}_member_zone where pid = '{$zone_id}'  order by xuhao " );
				$e = 0;
				while ( $tsql->next_record( ) )
				{
								$szoneid = $tsql->f( "catid" );
								$szone = $tsql->f( "cat" );
								echo "pList.addAt('".$i."',new area('".$szone."','".$szoneid."'));\n";
								if ( $szoneid == $zoneid )
								{
												$Province = $i;
								}
								$e++;
				}
				if ( $e < 1 )
				{
								echo "pList.addAt('".$i."',new area('ALL','".$zone_id."'));\n";
								if ( $zone_id == $zoneid )
								{
												$Province = $i;
								}
				}
				$i++;
}
echo "\t\t\t</script>\r\n\t\t\t\t\r\n\t\t\t\t\r\n\t\t\t";
echo "<s";
echo "elect onKeyUp='if(window.event.keyCode==13) document.regform.zoneid.focus();'  onChange=provinceSelChange(regform.zoneid,regform.Province.value,'";
echo $zoneid;
echo "') name=Province>\r\n\t\t\t";
echo "<s";
echo "cript language=javascript>\r\n\t\t\t\r\n\t\t\tdocument.write(pList.getOptionString('";
echo $Province;
echo "'));\r\n\t\t\t</script>\r\n\t\t\t\r\n\t\t\t</select>\r\n\t\t\t\r\n\t\t\t<div id='zonediv' style='position:absolute; width:150px; height:26px; z-index:1'>\r\n\t\t\t\r\n\t\t\t";
echo "<s";
echo "elect onKeyUp='if(window.event.keyCode==13) document.regform.regCardNum.focus();'  name='zoneid'>\r\n\t\t\t\r\n\t\t\t";
echo "<s";
echo "cript language=javascript>\r\n\t\t\tdocument.write(pList.getOptionAreasString(regform.Province.value,regform.zoneid,'";
echo $zoneid;
echo "',1));\r\n\t\t\t</script>\r\n\t\t\t</select>\r\n\t\t\t\r\n\t\t\t</div>\r\n\t </td>\r\n   </tr> \r\n   \r\n   <tr>\r\n     <td width=\"85\" height=\"26\" align=\"center\" >";
echo $strMemberFrom9;
echo "</td>\r\n     <td ><input name='tel' type=\"text\" class=\"input\" id=\"tel\" value='";
echo $tel;
echo "' size=50 />\r\n\t \r\n\t\r\n\t  </td>\r\n     <td width=\"90\" align=\"center\" >";
echo $strMemberFrom12;
echo "</td>\r\n     <td ><input name='postcode' type=\"text\" class=\"input\" id=\"postcode\" value='";
echo $postcode;
echo "' size=12 /></td>\r\n   </tr>\r\n   <tr>\r\n     <td width=\"85\"  align=center >";
echo $strMemberFrom11;
echo "</td>\r\n     <td  ><input name='mov' type=\"text\" class=\"input\" id=\"mov\" value='";
echo $mov;
echo "' size=50 /></td>\r\n     <td width=\"90\"  align=center >";
echo $strMemberFrom14;
echo "</td>\r\n     <td  ><input name='url' type=\"text\" class=\"input\" id=\"url\" value='";
echo $url;
echo "' size=39 /></td>\r\n   </tr>\r\n   <tr>\r\n     <td width=\"85\"  align=center >";
echo $strMemberFrom13;
echo "</td>\r\n     <td  ><input name='email' type=\"text\" class=\"input\" id=\"email\" value='";
echo $email;
echo "' size=50></td>\r\n     <td width=\"90\"  align=center >";
echo $strMemberFrom19;
echo "</td>\r\n     <td  ><input class=\"input\" type=\"text\" size=4 name=birth0 value='";
echo $birth0;
echo "' />\r\n       ";
echo $strYear;
echo "       <input class=\"input\" type=\"text\" size=2 name=birth1 value='";
echo $birth1;
echo "' />\r\n       ";
echo $strMonth;
echo "       <input class=\"input\" type=\"text\" size=2 name=birth2 value='";
echo $birth2;
echo "' />\r\n       ";
echo $strDay;
echo "</td>\r\n   </tr>\r\n   <tr>\r\n     <td width=\"85\"  align=center >";
echo $strMemberFrom17;
echo "</td>\r\n     <td  >";
echo "<s";
echo "pan class=\"title\">\r\n       <input name='qq' type=\"text\" class=\"input\" id=\"qq\" value='";
echo $qq;
echo "' size=50 />\r\n      </span></td>\r\n     <td width=\"90\"  align=center >";
echo $strMemberFrom18;
echo "</td>\r\n     <td  ><input name='msn' type=\"text\" class=\"input\" id=\"msn\" value='";
echo $msn;
echo "' size=39 /></td>\r\n   </tr>\r\n   <tr>\r\n     <td width=\"85\"  align=center >";
echo $strMemberFrom15;
echo "</td>\r\n     <td  ><input name='passtype' type=\"text\" class=\"input\" id=\"passtype\" value='";
echo $passtype;
echo "' size=10 />\r\n       ";
echo "<s";
echo "pan class=\"title\">\r\n       <input name='passcode' type=\"text\" class=\"input\" id=\"passcode\" value='";
echo $passcode;
echo "' size=32 />\r\n       </span></td>\r\n     <td width=\"90\"  align=center >";
echo $strMemberTags;
echo "</td>\r\n     <td  ><input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[0];
echo "\" size=\"7\" />\r\n       <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[1];
echo "\" size=\"7\" />\r\n       <input name=\"tags[]\" type=\"text\" class=\"input\" id=\"tags\"  value=\"";
echo $tags[2];
echo "\" size=\"7\" /></td>\r\n   </tr>\r\n    <tr>\r\n      <td width=\"85\" align=\"center\">";
echo $strMemberFrom20;
echo "</td>\r\n      <td valign=\"top\" > \r\n      \r\n      <textarea class=\"textarea\" name=\"bz\" cols=37 rows=8>";
echo $bz;
echo "</textarea> \r\n      </td>\r\n      <td colspan=\"2\" valign=\"top\"><table width=\"100%\"  border=\"0\" cellspacing=\"1\" cellpadding=\"5\">\r\n        <tr>\r\n          <td width=\"78\" align=\"center\">";
echo $strMemberRzStat;
echo "</td>\r\n          <td>";
echo "<s";
echo "elect name=\"rz\">\r\n            <option value=\"0\" ";
echo seld( $rz, 0 );
echo ">";
echo $strMemberRz0;
echo "</option>\r\n            <option value=\"1\" ";
echo seld( $rz, 1 );
echo ">";
echo $strMemberRz1;
echo "</option>\r\n          </select>\r\n            ";
echo "<s";
echo "pan class=\"adminsubmit\">\r\n            <input name=\"oldrz\" type=\"hidden\" id=\"oldrz\" value=\"";
echo $rz;
echo "\" />\r\n            &nbsp; ";
echo $strSalesname;
echo " \r\n            ";
echo "<s";
echo "elect name=\"salesname\" id=\"salesname\" >\r\n              <option value=\"\" ";
echo seld( $salesname, "" );
echo ">";
echo $strSalesNo;
echo "</option>\r\n              ";
$msql->query( "select * from {P}_base_admin order by id" );
while ( $msql->next_record( ) )
{
				$ssname = $msql->f( "name" );
				if ( $salesname == $ssname )
				{
								echo "<option value='".$ssname."' selected>".$ssname."</option>";
				}
				else
				{
								echo "<option value='".$ssname."'>".$ssname."</option>";
				}
}
echo "            </select>\r\n            </span></td>\r\n        </tr>\r\n        <tr>\r\n          <td width=\"78\" align=\"center\">";
echo $strMemberExpTime;
echo "</td>\r\n          <td>";
echo "<s";
echo "elect name=\"sayexp\" onChange=\"checkexp(this.form.sayexp.options[this.form.sayexp.selectedIndex].value)\">\r\n        <option value=\"0\" ";
echo seld( $sayexp, 0 );
echo ">";
echo $strNolimit;
echo "</option>\r\n        <option value=\"1\" ";
echo seld( $sayexp, 1 );
echo ">";
echo $strlimit;
echo "</option>\r\n      </select>\r\n        <div id=\"ttt\" style=\"position:absolute; width:200px; height:26px; z-index:1; visibility: visible\">\r\n          ";
echo explist( $ho, $mi, $se, $mm, $dd, $yy );
echo "        </div>\r\n      ";
echo "<s";
echo "cript>checkexp('";
echo $sayexp;
echo "')</script></td>\r\n        </tr>\r\n        <tr>\r\n          <td width=\"78\" align=\"center\">";
echo $strMemberRegTime;
echo "</td>\r\n          <td>";
echo "<s";
echo "pan class=\"adminsubmit\">";
echo $regtime;
echo " [";
echo $ip;
echo "] </span></td>\r\n        </tr>\r\n        <tr>\r\n          <td width=\"78\" align=\"center\">";
echo $strMemberLastLogin;
echo "</td>\r\n          <td>";
echo "<s";
echo "pan class=\"adminsubmit\">";
echo $logintime;
echo " [";
echo $loginip;
echo "] </span></td>\r\n        </tr>\r\n      </table></td>\r\n      </tr>\r\n\r\n\t\r\n\t\r\n  \r\n</table>\r\n</div>\r\n<div class=\"adminsubmit\"> \r\n<input type=\"submit\" name=\"Submit\" value=\"";
echo $strModify;
echo "\" class=\"button\" />\r\n<input type=\"hidden\" name=\"memberid\" value=\"";
echo $memberid;
echo "\" />\r\n<input type=\"hidden\" name=\"step\" value=\"modify\" />\r\n</div>\r\n</form>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

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
include( ROOTPATH."includes/pages.inc.php" );
include( "language/".$sLan.".php" );
include( "func/member.inc.php" );
needauth( 52 );
$step = $_REQUEST['step'];
$page = $_REQUEST['page'];
$sc = $_REQUEST['sc'];
$ord = $_REQUEST['ord'];
$membertypeid = $_REQUEST['membertypeid'];
$memberid = $_REQUEST['memberid'];
$key = $_REQUEST['key'];
$user = $_REQUEST['user'];
$shownum = $_REQUEST['shownum'];
$showcheck = $_REQUEST['showcheck'];
$showrz = $_REQUEST['showrz'];
$newtypeid = $_REQUEST['newtypeid'];
$searchmodle = $_REQUEST['searchmodle'];
if ( !isset( $shownum ) || $shownum < 10 )
{
				$shownum = 10;
}
if ( !isset( $searchmodle ) || $searchmodle == "" )
{
				$searchmodle = "common";
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/member.js\"></script>\r\n\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<S";
echo "CRIPT>\r\nfunction ordsc(nn,sc){\r\nif(nn!='";
echo $ord;
echo "'){\r\n\twindow.location='member_common.php?page=";
echo $page;
echo "&sc=";
echo $sc;
echo "&shownum=";
echo $shownum;
echo "&showcheck=";
echo $showcheck;
echo "&showrz=";
echo $showrz;
echo "&membertypeid=";
echo $membertypeid;
echo "&searchmodle=";
echo $searchmodle;
echo "&ord='+nn;\r\n}else{\r\n\tif(sc=='asc' || sc==''){\r\n\twindow.location='member_common.php?page=";
echo $page;
echo "&shownum=";
echo $shownum;
echo "&showcheck=";
echo $showcheck;
echo "&showrz=";
echo $showrz;
echo "&sc=desc&membertypeid=";
echo $membertypeid;
echo "&searchmodle=";
echo $searchmodle;
echo "&ord='+nn;\r\n\t}else{\r\n\twindow.location='member_common.php?page=";
echo $page;
echo "&shownum=";
echo $shownum;
echo "&showcheck=";
echo $showcheck;
echo "&showrz=";
echo $showrz;
echo "&sc=asc&membertypeid=";
echo $membertypeid;
echo "&searchmodle=";
echo $searchmodle;
echo "&ord='+nn;\r\n\t}\r\n\r\n}\r\n\r\n\r\n}\r\n\r\nfunction SelAll(theForm){\r\n\t\tfor ( i = 0 ; i < theForm.elements.length ; i ++ )\r\n\t\t{\r\n\t\t\tif ( theForm.elements[i].type == \"checkbox\" && theForm.elements[i].name != \"SELALL\" )\r\n\t\t\t{\r\n\t\t\t\ttheForm.elements[i].checked = ! theForm.elements[i].checked ;\r\n\t\t\t}\r\n\t\t}\r\n}\r\n\r\nfunction checkform(theform){\r\n  if(theform.newuser.value=='";
echo $strAddMemberInput;
echo "' || theform.newuser.value=='')\r\n  {\r\n    alert(\"";
echo $strAddMemberInput;
echo "\");\r\n\ttheform.newuser.focus();\r\n    return false;\r\n  }  \r\n\r\n  return true;\r\n}  \r\n</script>\r\n</head>\r\n\r\n<body>\r\n";
if ( $step == "delall" )
{
				trylimit( "_member", 500, "memberid" );
				needauth( 60 );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$delmemberid = $dall[$i];
								$msql->query( "delete from {P}_member_rights where memberid='{$delmemberid}'" );
								$msql->query( "delete from {P}_member_nums where memberid='{$delmemberid}'" );
								$msql->query( "delete from {P}_member_fav where memberid='{$delmemberid}'" );
								$msql->query( "delete from {P}_member_pay where memberid='{$delmemberid}'" );
								$msql->query( "delete from {P}_member_buylist where memberid='{$delmemberid}'" );
								$msql->query( "delete from {P}_member where memberid='{$delmemberid}'" );
				}
}
if ( $step == "rzall" )
{
				trylimit( "_member", 500, "memberid" );
				needauth( 59 );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_member set rz='1' where memberid='{$ids}'" );
				}
}
if ( $step == "unrzall" )
{
				trylimit( "_member", 500, "memberid" );
				needauth( 59 );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "update {P}_member set rz='0' where memberid='{$ids}'" );
				}
}
if ( $step == "chtypeall" )
{
				trylimit( "_member", 500, "memberid" );
				needauth( 64 );
				$dall = $_POST['dall'];
				$nums = sizeof( $dall );
				$i = 0;
				for ( ;	$i < $nums;	$i++	)
				{
								$ids = $dall[$i];
								$msql->query( "select membergroupid from {P}_member_type where membertypeid='{$newtypeid}'" );
								if ( $msql->next_record( ) )
								{
												$newmembergroupid = $msql->f( "membergroupid" );
								}
								$msql->query( "update {P}_member set membertypeid='{$newtypeid}',membergroupid='{$newmembergroupid}' where memberid='{$ids}'" );
								default2member( $ids, $newtypeid );
				}
}
if ( $step == "addmember" )
{
				trylimit( "_member", 200, "memberid" );
				$newuser = $_REQUEST['newuser'];
				if ( strlen( $newuser ) < 5 || 20 < strlen( $newuser ) )
				{
								err( $strAddMemberNTC1, "member_common.php?membertypeid=".$membertypeid, "" );
								exit( );
				}
				if ( !eregi( "^[0-9a-z]{1,20}\$", $newuser ) )
				{
								err( $strAddMemberNTC2, "member_common.php?membertypeid=".$membertypeid, "" );
								exit( );
				}
				$msql->query( "select membergroupid from {P}_member_type where membertypeid='{$membertypeid}'" );
				if ( $msql->next_record( ) )
				{
								$nowmembergroupid = $msql->f( "membergroupid" );
				}
				$msql->query( "select * from {P}_member where user='{$newuser}'" );
				if ( $msql->next_record( ) )
				{
								err( $strAddMemberNTC3, "member_common.php?membertypeid=".$membertypeid, "" );
								exit( );
				}
				$newpass = "";
				$i = 1;
				for ( ;	$i <= 9;	$i++	)
				{
								$zz = rand( 0, 9 );
								$newpass .= $zz;
				}
				$newpass = md5( $newpass );
				$now = time( );
				$ip = $_SERVER['REMOTE_ADDR'];
				$msql->query( "insert into {P}_member set\r\n\r\n\t\t\t\t   membertypeid='{$membertypeid}',\r\n\t\t\t\t   membergroupid='{$nowmembergroupid}',\r\n\t\t\t\t   user='{$newuser}',\r\n\t\t\t\t   password='{$newpass}',\r\n\t\t\t\t   name='{$newuser}',\r\n\t\t\t\t   pname='{$newuser}',\r\n\t\t\t\t   sex='',\r\n\t\t\t\t   birthday='0',\r\n\t\t\t\t   zoneid='0',\r\n\t\t\t\t   addr='',\r\n\t\t\t\t   tel='',\r\n\t\t\t\t   mov='',\r\n\t\t\t\t   postcode='',\r\n\t\t\t\t   email='',\r\n\t\t\t\t   url='',\r\n\t\t\t\t   passtype='',\r\n\t\t\t\t   passcode='',\r\n\t\t\t\t   qq='',\r\n\t\t\t\t   msn='',\r\n\t\t\t\t   maillist='0',\r\n\t\t\t\t   bz='',\r\n\t\t\t\t   checked='1',\r\n\t\t\t\t   regtime='{$now}',\r\n\t\t\t\t   exptime='0',\r\n\t\t\t\t   account='0',\r\n\t\t\t\t   paytotal='0',\r\n\t\t\t\t   buytotal='0',\r\n\t\t\t\t   ip='{$ip}',\r\n\t\t\t\t   logincount='0',\r\n\t\t\t\t   logintime='{$now}',\r\n\t\t\t\t   loginip='{$ip}'\r\n\r\n\t\t\t\t\r\n\t\t\t\t" );
				$newmemberid = $msql->instid( );
				default2member( $newmemberid, $membertypeid );
}
echo "\r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\r\n \r\n  <tr> \r\n      <td height=\"28\"  > \r\n        <table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\">\r\n           <tr> \r\n            <td> <form name=\"search\" action=\"member_common.php\" method=\"get\" >\r\n\t\t\t\r\n\t\t\t ";
echo "<s";
echo "elect name=\"searchmodle\">\r\n                <option value=\"common\"  ";
echo seld( $searchmodle, "common" );
echo ">";
echo $strMemberSModle1;
echo "</option>\r\n                <option value=\"cent\" ";
echo seld( $searchmodle, "cent" );
echo ">";
echo $strMemberSModle2;
echo "</option>\r\n\t\t\t\t<option value=\"account\" ";
echo seld( $searchmodle, "account" );
echo ">";
echo $strMemberSModle3;
echo "</option>\r\n              </select>\r\n\t\t\t\r\n              ";
echo "<s";
echo "elect name=\"membertypeid\" >\r\n                <option value='0'>";
echo $strMemberTypeSel;
echo "</option>\r\n                ";
$fsql->query( "select * from {P}_member_type  order by membertypeid" );
while ( $fsql->next_record( ) )
{
				$lmembertypeid = $fsql->f( "membertypeid" );
				$lmembertype = $fsql->f( "membertype" );
				if ( $membertypeid == $lmembertypeid )
				{
								echo "<option value='".$lmembertypeid."' selected>".$lmembertype."</option>";
				}
				else
				{
								echo "<option value='".$lmembertypeid."'>".$lmembertype."</option>";
				}
}
echo "              </select>\r\n              ";
echo "<s";
echo "elect name=\"showrz\">\r\n                <option value=\"all\" >";
echo $strMemberRzStat;
echo "</option>\r\n                <option value=\"1\"  ";
echo seld( $showrz, "1" );
echo ">";
echo $strMemberRz1;
echo "</option>\r\n                <option value=\"0\" ";
echo seld( $showrz, "0" );
echo ">";
echo $strMemberRz0;
echo "</option>\r\n              </select>\r\n              ";
echo "<s";
echo "elect name=\"shownum\">\r\n                <option value=\"10\"  ";
echo seld( $shownum, "10" );
echo ">";
echo $strSelNum10;
echo "</option>\r\n                <option value=\"20\" ";
echo seld( $shownum, "20" );
echo ">";
echo $strSelNum20;
echo "</option>\r\n                <option value=\"30\" ";
echo seld( $shownum, "30" );
echo ">";
echo $strSelNum30;
echo "</option>\r\n                <option value=\"50\" ";
echo seld( $shownum, "50" );
echo ">";
echo $strSelNum50;
echo "</option>\r\n              </select>\r\n              <input type=\"text\" name=\"key\" size=\"12\"  class=\"input\"  value=\"";
echo $key;
echo "\" />\r\n              <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=\"button\" />\r\n            \r\n            </form></td>\r\n          </tr>\r\n        </table>\r\n    </td>\r\n   \r\n  \r\n      <td align=\"right\"  >\r\n \t\t<form name=\"adduser\" method=\"post\" action=\"member_common.php\" onSubmit=\"return checkform(this)\" />\r\n        <input name=\"step\" type=\"hidden\" id=\"step\" value=\"addmember\" />\r\n        <input name=\"newuser\" type=\"text\" class=input id=\"newuser\" value=\"";
echo $strAddMemberInput;
echo "\" size=\"12\" onFocus=\"if(this.value=='";
echo $strAddMemberInput;
echo "'){this.value=''}\" />\r\n\t\t";
echo "<s";
echo "elect name=\"membertypeid\" >\r\n                ";
$fsql->query( "select * from {P}_member_type  order by membertypeid" );
while ( $fsql->next_record( ) )
{
				$lmembertypeid = $fsql->f( "membertypeid" );
				$lmembertype = $fsql->f( "membertype" );
				if ( $membertypeid == $lmembertypeid )
				{
								echo "<option value='".$lmembertypeid."' selected>".$lmembertype."</option>";
				}
				else
				{
								echo "<option value='".$lmembertypeid."'>".$lmembertype."</option>";
				}
}
echo "              </select>\r\n\t\t<input type=\"submit\" name=\"Submit\" value=\"";
echo $strAddMember;
echo "\" class=\"button\" />\r\n     </form>\r\n      </td> \r\n   \r\n  </tr> \r\n</table>\r\n\r\n</div>\r\n";
if ( !isset( $ord ) || $ord == "" )
{
				$ord = "memberid";
}
if ( !isset( $sc ) || $sc == "" )
{
				$sc = "desc";
}
$scl = " memberid!='0' ";
if ( $membertypeid != "" && $membertypeid != "0" )
{
				$scl .= " and membertypeid='{$membertypeid}' ";
}
if ( $showcheck != "" && $showcheck != "all" )
{
				$scl .= " and checked='{$showcheck}' ";
}
if ( $showrz != "" && $showrz != "all" )
{
				$scl .= " and rz='{$showrz}' ";
}
if ( $key != "" )
{
				$scl .= " and (name regexp '{$key}' or pname regexp '{$key}' or company regexp '{$key}' or addr regexp '{$key}' or user regexp '{$key}' or tags regexp '{$key}'  or tel regexp '{$key}' )";
}
$totalnums = tblcount( "_member", "memberid", $scl );
$pages = new pages( );
$pages->setvar( array( "key" => $key, "shownum" => $shownum, "showcheck" => $showcheck, "showrz" => $showrz, "searchmodle" => $searchmodle, "ord" => $ord, "sc" => $sc, "membertypeid" => $membertypeid ) );
$pages->set( $shownum, $totalnums );
$pagelimit = $pages->limit( );
switch ( $searchmodle )
{
				case "common" :
								$colcommon = "";
								$colcent = "display:none";
								$colaccount = "display:none";
								break;
				case "cent" :
								$colcommon = "display:none";
								$colcent = "";
								$colaccount = "display:none";
								break;
				case "account" :
								needauth( 68 );
								$colcommon = "display:none";
								$colcent = "display:none";
								$colaccount = "";
								break;
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
echo "<form name=\"delfm\" method=\"post\" action=\"member_common.php\">\r\n<div class=\"listzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n          <tr> \r\n            \r\n    <td height=\"28\" width=\"30\"  class=\"biaoti\" align=\"center\">";
echo $strSel;
echo "</td>\r\n            <td height=\"28\" width=\"50\"  class=\"biaoti\" style=\"cursor:pointer\" onClick=\"ordsc('memberid','";
echo $sc;
echo "')\">";
echo $strMemberNo;
ordsc( $ord, "memberid", $sc );
echo "</td>\r\n            <td width=\"75\" height=\"28\"  class=\"biaoti\" style=\"cursor:pointer\" onClick=\"ordsc('membertypeid','";
echo $sc;
echo "')\">";
echo $strMemberType;
ordsc( $ord, "membertypeid", $sc );
echo "</td>\r\n            <td width=\"80\" height=\"28\"  class=\"biaoti\" style=\"cursor:pointer\" onClick=\"ordsc('user','";
echo $sc;
echo "')\">";
echo $strMemberUser;
ordsc( $ord, "user", $sc );
echo "</td>\r\n            <td class=\"biaoti\" >";
echo $strMemberFrom23;
echo "</td>\r\n            <td width=\"80\" class=\"biaoti\">";
echo $strMemberFrom4;
echo "</td>\r\n            <td width=\"50\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colcent;
echo "\" onclick=\"ordsc('cent1','";
echo $sc;
echo "')\">";
echo $centname1;
ordsc( $ord, "cent1", $sc );
echo "</td>\r\n            <td width=\"50\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colcent;
echo "\" onclick=\"ordsc('cent2','";
echo $sc;
echo "')\">";
echo $centname2;
ordsc( $ord, "cent2", $sc );
echo "</td>\r\n            <td width=\"50\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colcent;
echo "\" onclick=\"ordsc('cent3','";
echo $sc;
echo "')\">";
echo $centname3;
ordsc( $ord, "cent3", $sc );
echo "</td>\r\n            <td width=\"50\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colcent;
echo "\" onclick=\"ordsc('cent4','";
echo $sc;
echo "')\">";
echo $centname4;
ordsc( $ord, "cent4", $sc );
echo "</td>\r\n            <td width=\"50\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colcent;
echo "\" onclick=\"ordsc('cent5','";
echo $sc;
echo "')\">";
echo $centname5;
ordsc( $ord, "cent5", $sc );
echo "</td>\r\n            <td width=\"80\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colaccount;
echo "\" onclick=\"ordsc('account','";
echo $sc;
echo "')\">";
echo $strMemberAccounts;
ordsc( $ord, "account", $sc );
echo "</td>\r\n            <td width=\"80\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colaccount;
echo "\" onclick=\"ordsc('paytotal','";
echo $sc;
echo "')\">";
echo $strMemberPayTotal;
ordsc( $ord, "paytotal", $sc );
echo "</td>\r\n            <td width=\"80\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colaccount;
echo "\" onclick=\"ordsc('buytotal','";
echo $sc;
echo "')\">";
echo $strMemberBuyTotal;
ordsc( $ord, "buytotal", $sc );
echo "</td>\r\n            <td width=\"65\" height=\"28\"  class=\"biaoti\"  style=\"cursor:pointer;";
echo $colcommon;
echo "\" onClick=\"ordsc('regtime','";
echo $sc;
echo "')\">";
echo $strMemberRegTime;
ordsc( $ord, "regtime", $sc );
echo "</td>\r\n            <td  width=\"32\" align=\"center\"   class=\"biaoti\"  style=\"";
echo $colcommon;
echo "\">";
echo $strMemberRz;
echo "</td>\r\n            <td width=\"32\"  class=\"biaoti\" align=\"center\" style=\"";
echo $colaccount;
echo "\">";
echo $strMemberAddAcc;
echo "</td>\r\n            <td height=\"28\" width=\"32\"  class=\"biaoti\" align=\"center\" style=\"";
echo $colcommon;
echo "\">";
echo $strMemberMail;
echo "</td>\r\n            <td width=\"32\"  class=\"biaoti\" align=\"center\" style=\"";
echo $colcent;
echo "\">";
echo $strLook;
echo "</td>\r\n            <td height=\"28\" width=\"32\"  class=\"biaoti\" align=\"center\" style=\"";
echo $colcommon;
echo "\">";
echo $strMemberDetail;
echo "</td>\r\n\t\t\t <td height=\"28\" width=\"32\"  class=\"biaoti\" align=\"center\" style=\"";
echo $colaccount;
echo "\">";
echo $strMemberDetail;
echo "</td>\r\n            <td width=\"32\"  class=\"biaoti\" align=\"center\" style=\"";
echo $colcommon;
echo "\">";
echo $strMemberAuth;
echo " </td>\r\n            <td width=\"32\"  class=\"biaoti\" align=\"center\">";
echo $strMemberLogin;
echo "</td>\r\n          </tr>\r\n          ";
$msql->query( "select * from {P}_member where {$scl} order by {$ord} {$sc} limit {$pagelimit}" );
while ( $msql->next_record( ) )
{
				$memberid = $msql->f( "memberid" );
				$mymembertypeid = $msql->f( "membertypeid" );
				$mymembergroupid = $msql->f( "membergroupid" );
				$user = $msql->f( "user" );
				$name = $msql->f( "name" );
				$company = $msql->f( "company" );
				$pname = $msql->f( "pname" );
				$tel = $msql->f( "tel" );
				$email = $msql->f( "email" );
				$checked = $msql->f( "checked" );
				$rz = $msql->f( "rz" );
				$ip = $msql->f( "ip" );
				$logincount = $msql->f( "logincount" );
				$regtime = $msql->f( "regtime" );
				$exptime = $msql->f( "exptime" );
				$cent1 = $msql->f( "cent1" );
				$cent2 = $msql->f( "cent2" );
				$cent3 = $msql->f( "cent3" );
				$cent4 = $msql->f( "cent4" );
				$cent5 = $msql->f( "cent5" );
				$account = $msql->f( "account" );
				$paytotal = $msql->f( "paytotal" );
				$buytotal = $msql->f( "buytotal" );
				$regtime = date( "y/n/j", $regtime );
				echo " \r\n          <tr class=\"list\"> \r\n            <td width=\"30\" align=\"center\" > \r\n              <input type=\"checkbox\" name=\"dall[]\" value=\"";
				echo $memberid;
				echo "\">\r\n            </td>\r\n            <td   width=\"50\"> ";
				echo $memberid;
				echo " </td>\r\n            <td width=\"75\" >";
				echo membertypeid2membertype( $mymembertypeid );
				echo "</td>\r\n            <td width=\"80\"  > ";
				echo $user;
				echo " </td>\r\n            <td >";
				echo $company;
				echo "</td>\r\n            <td width=\"80\">";
				echo $name;
				echo "</td>\r\n            <td width=\"50\" style=\"";
				echo $colcent;
				echo "\">";
				echo $cent1;
				echo "</td>\r\n            <td width=\"50\" style=\"";
				echo $colcent;
				echo "\">";
				echo $cent2;
				echo "</td>\r\n            <td width=\"50\" style=\"";
				echo $colcent;
				echo "\">";
				echo $cent3;
				echo "</td>\r\n            <td width=\"50\" style=\"";
				echo $colcent;
				echo "\">";
				echo $cent4;
				echo "</td>\r\n            <td width=\"50\" style=\"";
				echo $colcent;
				echo "\">";
				echo $cent5;
				echo "</td>\r\n            <td width=\"80\" style=\"";
				echo $colaccount;
				echo "\">";
				echo $account;
				echo "</td>\r\n            <td width=\"80\" style=\"";
				echo $colaccount;
				echo "\">";
				echo $paytotal;
				echo " <a href=\"paylist.php?memberid=";
				echo $memberid;
				echo "\"><img src=\"images/arrowright.gif\" alt=\"";
				echo $strAccList;
				echo "\" width=\"16\" height=\"16\" border=\"0\" /></a></td>\r\n            <td width=\"80\" style=\"";
				echo $colaccount;
				echo "\">";
				echo $buytotal;
				echo " <a href=\"buylist.php?memberid=";
				echo $memberid;
				echo "\"><img src=\"images/arrowright.gif\" alt=\"";
				echo $strAccBuyList;
				echo "\" width=\"16\" height=\"16\" border=\"0\" /></a></td>\r\n            <td width=\"65\" style=\"";
				echo $colcommon;
				echo "\">";
				echo $regtime;
				echo "</td>\r\n            <td width=\"32\" align=\"center\"  style=\"";
				echo $colcommon;
				echo "\">";
				showyn( $rz );
				echo "</td>\r\n            <td  width=\"32\" align=\"center\" style=\"";
				echo $colcommon;
				echo "\"><img id=\"membermail_";
				echo $memberid;
				echo "\" class=\"membermail\" src=\"images/mail.png\"  border=\"0\" /></td>\r\n            <td align=\"center\"  width=\"32\" style=\"";
				echo $colaccount;
				echo "\"><a href=\"addacc.php?memberid=";
				echo $memberid;
				echo "\"><img src=\"images/mail.png\"  border=\"0\" /></a></td>\r\n            <td  width=\"32\" align=\"center\" style=\"";
				echo $colcent;
				echo "\"><img id=\"membercent_";
				echo $memberid;
				echo "\" class=\"membercent\" src=\"images/look.png\"  border=\"0\" /> </td>\r\n            <td align=\"center\"  width=\"32\" style=\"";
				echo $colcommon;
				echo "\"><img id=\"membermodify_";
				echo $memberid;
				echo "\" class=\"membermodify\" src=\"images/edit.png\"  border=\"0\" /></td>\r\n             <td align=\"center\"  width=\"32\" style=\"";
				echo $colaccount;
				echo "\"><img id=\"membermodify_";
				echo $memberid;
				echo "\" class=\"membermodify\" src=\"images/edit.png\"  border=\"0\" /></td>\r\n           <td  width=\"32\" align=\"center\" style=\"";
				echo $colcommon;
				echo "\"><a href=\"member_rights.php?memberid=";
				echo $memberid;
				echo "&amp;nowtype=";
				echo $membertypeid;
				echo "&amp;user=";
				echo $user;
				echo "&amp;page=";
				echo $page;
				echo "\"><img src=\"images/auth.png\"  border=\"0\" /></a></td>\r\n            <td  width=\"32\" align=\"center\"><img src=\"images/person.png\" border=\"0\" style=\"cursor:pointer\" onClick=\"window.open('vmember.php?memberid=";
				echo $memberid;
				echo "&tourl=member/index.php','vmember','width=1024,height=700,scrollbars=yes')\"></td>\r\n          </tr>\r\n          ";
}
echo " \r\n       \r\n \r\n</table>\r\n</div>\r\n<div class=\"piliang\"> \r\n<input type=\"checkbox\" name=\"SELALL\" value=\"1\" onClick=\"SelAll(this.form)\">\r\n        ";
echo $strSelAll;
echo "        <input type=\"radio\" name=\"step\" value=\"delall\">\r\n        ";
echo $strDelete;
echo "        <input type=\"radio\" name=\"step\" value=\"rzall\" />\r\n        ";
echo $strMemberRzStat;
echo "        <input type=\"radio\" name=\"step\" value=\"unrzall\" />\r\n        ";
echo $strMemberUnRz;
echo "        <input type=\"radio\" name=\"step\" value=\"chtypeall\">";
echo $strMemberChangeTo;
echo "\t\t\r\n\t\t";
echo "<s";
echo "elect name=\"newtypeid\" >\r\n                ";
$fsql->query( "select * from {P}_member_type  order by membertypeid" );
while ( $fsql->next_record( ) )
{
				$changetypeid = $fsql->f( "membertypeid" );
				$changetype = $fsql->f( "membertype" );
				if ( $changetypeid == $membertypeid )
				{
								echo "<option value='".$changetypeid."' selected>".$changetype."</option>";
				}
				else
				{
								echo "<option value='".$changetypeid."'>".$changetype."</option>";
				}
}
echo "    </select>\r\n       \r\n        <input type=\"submit\" name=\"Submit2\" class=\"button\" value=\"";
echo $strSubmit;
echo "\" />\r\n        &nbsp;&nbsp;<a style=\"cursor:pointer;color:#ffffff;font-weight:bold\" onClick=\"delfm.submit()\"> \r\n        </a> \r\n        <input type=\"hidden\" name=\"ord\" size=\"3\" value=\"";
echo $ord;
echo "\" />\r\n        <input type=\"hidden\" name=\"sc\" size=\"3\" value=\"";
echo $sc;
echo "\" />\r\n\t\t<input type=\"hidden\" name=\"membertypeid\" size=\"3\" value=\"";
echo $membertypeid;
echo "\" />\r\n\t\t<input type=\"hidden\" name=\"memberid\" size=\"3\" value=\"";
echo $memberid;
echo "\" />\r\n\t\t<input type=\"hidden\" name=\"key\" size=\"3\" value=\"";
echo $key;
echo "\" />\r\n        <input type=\"hidden\" name=\"shownum\" value=\"";
echo $shownum;
echo "\" />\r\n        <input type=\"hidden\" name=\"showcheck\" value=\"";
echo $showcheck;
echo "\" />\r\n\t\t<input type=\"hidden\" name=\"showrz\" value=\"";
echo $showrz;
echo "\" />\r\n        <input type=\"hidden\" name=\"searchmodle\" value=\"";
echo $searchmodle;
echo "\" />\r\n</div>\r\n\r\n</form>\r\n\r\n";
$pagesinfo = $pages->shownow( );
echo "<div id=\"showpages\">\r\n\t  <div id=\"pagesinfo\">";
echo $strPagesTotalStart.$totalnums.$strPagesTotalEnd;
echo " ";
echo $strPagesMeiye.$pagesinfo['shownum'].$strPagesTotalEnd;
echo " ";
echo $strPagesYeci;
echo " ";
echo $pagesinfo['now']."/".$pagesinfo['total'];
echo "</div>\r\n\t  <div id=\"pages\">";
echo $pages->output( 1 );
echo "</div>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>

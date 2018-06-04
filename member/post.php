<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define( "ROOTPATH", "../" );
include( ROOTPATH."includes/common.inc.php" );
include( "language/".$sLan.".php" );
include( ROOTPATH."member/includes/member.inc.php" );
$act = $_POST['act'];
switch ( $act )
{
				case "getpoploginform" :
								$RP = $_POST['RP'];
								$str = loadmembertemp( $RP, "tpl_poplogin.htm" );
								echo $str;
								exit( );
								break;
				case "checkuser" :
								$user = trim( $_POST['user'] );
								$tsql->query( "select memberid from {P}_member where user='{$user}' " );
								if ( $tsql->next_record( ) )
								{
												$allowreg = "0";
								}
								else
								{
												$allowreg = "1";
								}
								if ( $GLOBALS['MEMBERCONF']['UC_OPEN'] == "1" )
								{
												if ( file_exists( ROOTPATH."api/uc_api/uc_client/client.php" ) && file_exists( ROOTPATH."api/uc_api/api.inc.php" ) )
												{
																include( ROOTPATH."api/uc_api/api.inc.php" );
																include( ROOTPATH."api/uc_api/uc_client/client.php" );
																if ( uc_get_user( $user ) )
																{
																				$allowreg = "0";
																}
												}
								}
								echo $allowreg;
								exit( );
								break;
				case "memberaccount" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								if ( securefunc( "111" ) == false )
								{
												echo $strNorights;
												exit( );
								}
								$email = htmlspecialchars( $_POST['email'] );
								$resetpass = htmlspecialchars( $_POST['resetpass'] );
								$password = htmlspecialchars( $_POST['password'] );
								$mdpass = md5( $password );
								if ( !eregi( "^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}\$", $email ) )
								{
												echo $strRegNotice9;
												exit( );
								}
								$msql->query( "update {P}_member set email='{$email}' where memberid='{$memberid}'" );
								if ( $resetpass == "yes" )
								{
												$msql->query( "update {P}_member set password='{$mdpass}' where memberid='{$memberid}'" );
								}
								if ( $GLOBALS['MEMBERCONF']['UC_OPEN'] == "1" )
								{
												$msql->query( "select user from {P}_member where memberid='{$memberid}'" );
												if ( $msql->next_record( ) )
												{
																$user = $msql->f( "user" );
												}
												if ( file_exists( ROOTPATH."api/uc_api/uc_client/client.php" ) && file_exists( ROOTPATH."api/uc_api/api.inc.php" ) )
												{
																include( ROOTPATH."api/uc_api/api.inc.php" );
																include( ROOTPATH."api/uc_api/uc_client/client.php" );
																if ( $resetpass == "yes" )
																{
																				$ucresult = uc_user_edit( $user, "", $password, $email, "1" );
																}
																else
																{
																				$ucresult = uc_user_edit( $user, "", "", $email, "1" );
																}
												}
								}
								echo "OK";
								exit( );
								break;
				case "loadface" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$fsql->query( "select nowface from {P}_member where memberid='{$memberid}'" );
								if ( $fsql->next_record( ) )
								{
												$nowface = $fsql->f( "nowface" );
								}
								echo $nowface;
								exit( );
								break;
				case "memberperson" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$Meta = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
								if ( securefunc( "112" ) == false )
								{
												echo $Meta.$strNorights;
												exit( );
								}
								$pname = htmlspecialchars( $_POST['pname'] );
								$signature = htmlspecialchars( $_POST['signature'] );
								$nowface = htmlspecialchars( $_POST['nowface'] );
								$pic = $_FILES['jpg'];
								if ( $pname == "" )
								{
												echo $Meta.$strRegNotice13;
												exit( );
								}
								if ( $GLOBALS['MEMBERCONF']['DblPname'] != "1" )
								{
												$fsql->query( "select memberid from {P}_member where pname='{$pname}' and memberid!='{$memberid}'" );
												if ( $fsql->next_record( ) )
												{
																echo $Meta.$strRegNotice15;
																exit( );
												}
								}
								if ( 0 < $pic['size'] )
								{
												if ( 102400 < $pic['size'] )
												{
																echo $Meta.$strMemberFaceNtc1;
																exit( );
												}
												if ( $pic['type'] != "image/gif" )
												{
																echo $Meta.$strMemberFaceNtc2;
																exit( );
												}
												$nowface = $memberid + 100000;
												$filepath = ROOTPATH."member/face/".$nowface.".gif";
												copy( $pic['tmp_name'], $filepath );
												chmod( $filepath, 438 );
								}
								$msql->query( "update {P}_member set \r\n\t\tpname='{$pname}',\r\n\t\tsignature='{$signature}',\r\n\t\tnowface='{$nowface}'\r\n\t\twhere memberid='{$memberid}'" );
								echo "OK";
								exit( );
								break;
				case "memberdetail" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								if ( securefunc( "113" ) == false )
								{
												echo $strNorights;
												exit( );
								}
								$name = htmlspecialchars( $_POST['name'] );
								$company = htmlspecialchars( $_POST['company'] );
								$sex = htmlspecialchars( $_POST['sex'] );
								$yy = htmlspecialchars( $_POST['yy'] );
								$mm = htmlspecialchars( $_POST['mm'] );
								$dd = htmlspecialchars( $_POST['dd'] );
								$url = htmlspecialchars( $_POST['url'] );
								$zoneid = htmlspecialchars( $_POST['zoneid'] );
								$Province = htmlspecialchars( $_POST['Province'] );
								$passtype = htmlspecialchars( $_POST['passtype'] );
								$passcode = htmlspecialchars( $_POST['passcode'] );
								$bz = htmlspecialchars( $_POST['bz'] );
								if ( strlen( $mm ) < 2 )
								{
												$mmm = "0".$mm;
								}
								else
								{
												$mmm = $mm;
								}
								if ( strlen( $dd ) < 2 )
								{
												$ddd = "0".$dd;
								}
								else
								{
												$ddd = $dd;
								}
								$birthday = $yy.$mmm.$ddd;
								$msql->query( "update {P}_member set \r\n\t\t\r\n\t\tname='{$name}',\r\n\t\tcompany='{$company}',\r\n\t\tsex='{$sex}',\r\n\t\tbirthday='{$birthday}',\r\n\t\tzoneid='{$zoneid}',\r\n\t\turl='{$url}',\r\n\t\tpasstype='{$passtype}',\r\n\t\tpasscode='{$passcode}',\r\n\t\tbz='{$bz}'\r\n\t\twhere memberid='{$memberid}'" );
								echo "OK";
								exit( );
								break;
				case "membercontact" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								if ( securefunc( "114" ) == false )
								{
												echo $strNorights;
												exit( );
								}
								$addr = htmlspecialchars( $_POST['addr'] );
								$tel = htmlspecialchars( $_POST['tel'] );
								$mov = htmlspecialchars( $_POST['mov'] );
								$postcode = htmlspecialchars( $_POST['postcode'] );
								$email = htmlspecialchars( $_POST['email'] );
								$qq = htmlspecialchars( $_POST['qq'] );
								$msn = htmlspecialchars( $_POST['msn'] );
								$name = htmlspecialchars( $_POST['name'] );
								if ( !eregi( "^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}\$", $email ) )
								{
												echo $strRegNotice9;
												exit( );
								}
								$msql->query( "update {P}_member set \r\n\r\n\t\tname='{$name}',\r\n\t\taddr='{$addr}',\r\n\t\ttel='{$tel}',\r\n\t\tmov='{$mov}',\r\n\t\tpostcode='{$postcode}',\r\n\t\temail='{$email}',\r\n\t\tqq='{$qq}',\r\n\t\tmsn='{$msn}'\r\n\t\t\r\n\t\twhere memberid='{$memberid}'" );
								echo "OK";
								exit( );
								break;
				case "delfav" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$favid = htmlspecialchars( $_POST['favid'] );
								$msql->query( "delete from {P}_member_fav where memberid='{$memberid}' and id='{$favid}'" );
								echo "OK";
								exit( );
								break;
				case "delfri" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$nowid = htmlspecialchars( $_POST['nowid'] );
								$msql->query( "delete from {P}_member_friends where memberid='{$memberid}' and id='{$nowid}'" );
								echo "OK";
								exit( );
								break;
				case "addfriends" :
								$fid = $_POST['fid'];
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$memberid = $_COOKIE['MEMBERID'];
								if ( $fid == "" || $fid == "0" || $fid == "-1" )
								{
												echo $strMemberFriNtc1;
												exit( );
								}
								if ( $fid == $memberid )
								{
												echo $strMemberFriNtc2;
												exit( );
								}
								$msql->query( "select id from {P}_member_friends where fid='{$fid}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
												echo $strMemberFriNtc3;
												exit( );
								}
								$msql->query( "insert into {P}_member_friends set fid='{$fid}',memberid='{$memberid}'" );
								membercentupdate( $memberid, "112" );
								echo "OK";
								exit( );
								break;
				case "delcomm" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$nowid = htmlspecialchars( $_POST['nowid'] );
								$msql->query( "select id from {P}_comment where id='{$nowid}' and memberid='{$memberid}'" );
								if ( $msql->next_record( ) )
								{
												$fsql->query( "delete from {P}_comment where pid='{$nowid}'" );
												$fsql->query( "delete from {P}_comment where memberid='{$memberid}' and id='{$nowid}'" );
												echo "OK";
												exit( );
								}
								else
								{
												echo $strMemberCommentNtc;
												exit( );
								}
								break;
				case "loadmsg" :
								$RP = $_POST['RP'];
								$mid = $_POST['mid'];
								$mid = htmlspecialchars( $mid );
								if ( !islogin( ) )
								{
												echo "L0";
												exit( );
								}
								$msql->query( "select pname from {P}_member where memberid='{$mid}' " );
								if ( $msql->next_record( ) )
								{
												$pname = $msql->f( "pname" );
								}
								$str = loadmembertemp( $RP, "tpl_msnform.htm" );
								$str = str_replace( "{#pname#}", $pname, $str );
								$str = str_replace( "{#tomemberid#}", $mid, $str );
								echo $str;
								exit( );
								break;
				case "sendmsn" :
								$tomemberid = htmlspecialchars( $_POST['tomemberid'] );
								$body = htmlspecialchars( $_POST['body'] );
								if ( $body == "" )
								{
												echo $strMemberMsnNtc1;
												exit( );
								}
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$dtime = time( );
								$msql->query( "insert into {P}_member_msn set\r\n\t\t\t`body`='{$body}',\r\n\t\t\t`tomemberid`='{$tomemberid}',\r\n\t\t\t`frommemberid`='{$memberid}',\r\n\t\t\t`dtime`='{$dtime}',\r\n\t\t\t`iflook`='0'\r\n\t\t" );
								membercentupdate( $memberid, "113" );
								echo "OK";
								exit( );
								break;
				case "delmsn" :
								securemember( );
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$nowid = htmlspecialchars( $_POST['nowid'] );
								$fsql->query( "delete from {P}_member_msn where tomemberid='{$memberid}' and id='{$nowid}'" );
								echo "OK";
								exit( );
								break;
				case "countmsn" :
								$memberid = $_COOKIE['MEMBERID'];
								$memberid = htmlspecialchars( $memberid );
								$fsql->query( "select count(id) from {P}_member_msn where tomemberid='{$memberid}' and iflook='0'" );
								if ( $fsql->next_record( ) )
								{
												$nums = $fsql->f( "count(id)" );
								}
								echo $nums;
								exit( );
								break;
}
?>

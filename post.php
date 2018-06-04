<?php

define( "ROOTPATH", "" );
include( ROOTPATH."includes/common.inc.php" );
include( ROOTPATH."member/language/".$sLan.".php" );
include( ROOTPATH."member/includes/member.inc.php" );
$act = $_POST['act'];
switch ( $act )
{
case "adminlogin" :
		$user = $_POST['user'];
		$password = $_POST['password'];
		$ImgCode = $_POST['ImgCode'];
		if ( $user == "" || $password == "" )
		{
				echo $strAdminLoginErr1;
				exit( );
		}
		$md5pass = md5( $password );
		$msql->query( "select * from {P}_base_admin where user='{$user}' and password='{$md5pass}'" );
		if ( $msql->next_record( ) )
		{
				$sysuserid = $msql->f( "id" );
				$psd = $msql->f( "password" );
				$name = $msql->f( "name" );
				$tm = time( );
				$md5 = md5( $user."l0aZXUYJ876Mn5rQoL55B".$psd.$tm );
				setcookie( "SYSZC", $md5 );
				setcookie( "SYSUSER", $user );
				setcookie( "SYSNAME", $name );
				setcookie( "SYSUSERID", $sysuserid );
				setcookie( "SYSTM", $tm );
				echo "OK";
				exit( );
		}
		else
		{
				echo $strAdminLoginErr2;
				exit( );
		}
		break;
case "adminlogout" :
		setcookie( "SYSUSER" );
		setcookie( "SYSZC" );
		setcookie( "SYSTM" );
		setcookie( "SYSNAME" );
		setcookie( "PLUSADMIN", "" );
		echo "OK";
		exit( );
		break;
case "memberreg" :
		$membertypeid = $_REQUEST['membertypeid'];
		$user = htmlspecialchars( $_POST['user'] );
		$password = htmlspecialchars( $_POST['password'] );
		$repass = htmlspecialchars( $_POST['repass'] );
		$email = htmlspecialchars( $_POST['email'] );
		$ImgCode = $_POST['ImgCode'];
		$fsql->query( "select * from {P}_member_type where membertypeid='{$membertypeid}'" );
		if ( $fsql->next_record( ) )
		{
				$membergroupid = $fsql->f( "membergroupid" );
				$membertype = $fsql->f( "membertype" );
				$ifcanreg = $fsql->f( "ifcanreg" );
				$ifchecked = $fsql->f( "ifchecked" );
				$regmail = $fsql->f( "regmail" );
				$expday = $fsql->f( "expday" );
		}
		if ( $ifcanreg != "1" )
		{
				echo $strRegNotice10;
				exit( );
		}
		if ( strlen( $user ) < 5 || 20 < strlen( $user ) )
		{
				echo $strRegNotice4;
				exit( );
		}
		if ( !eregi( "^[0-9a-z]{1,20}\$", $user ) )
		{
				echo $strRegNotice5;
				exit( );
		}
		if ( !eregi( "^[0-9a-z]{1,20}\$", $password ) )
		{
				echo $strRegNotice6;
				exit( );
		}
		if ( strlen( $password ) < 5 || 20 < strlen( $password ) )
		{
				echo $strRegNotice7;
				exit( );
		}
		if ( $password != $repass )
		{
				echo $strRegNotice8;
				exit( );
		}
		if ( !eregi( "^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}\$", $email ) )
		{
				echo $strRegNotice9;
				exit( );
		}
		$fsql->query( "select memberid from {P}_member where user='{$user}'" );
		if ( $fsql->next_record( ) )
		{
				echo $strRegNotice2;
				exit( );
		}
		if ( $GLOBALS['MEMBERCONF']['UC_OPEN'] == "1" )
		{
				if ( file_exists( ROOTPATH."api/uc_api/uc_client/client.php" ) && file_exists( ROOTPATH."api/uc_api/api.inc.php" ) )
				{
						include( ROOTPATH."api/uc_api/api.inc.php" );
						include( ROOTPATH."api/uc_api/uc_client/client.php" );
						if ( uc_get_user( $user ) )
						{
								echo $strUCNTC2;
								exit( );
						}
				}
				else
				{
						echo $strUCNTC1;
						exit( );
				}
		}
		$Ic = $_COOKIE['CODEIMG'];
		$Ic = strrev( $Ic ) + 5 * 2 - 9;
		$Ic = substr( $Ic, 0, 4 );
		if ( $ImgCode == "" || $Ic != $ImgCode )
		{
				echo $strIcErr;
				exit( );
		}
		$regtime = time( );
		if ( $expday != 0 )
		{
				$tm = $expday * 24 * 60 * 60;
				$exptime = $regtime + $tm;
		}
		else
		{
				$exptime = 0;
		}
		$ip = $_SERVER['REMOTE_ADDR'];
		$passwd = md5( $password );
		$msql->query( "insert into {P}_member set\r\n\r\n\t\t   membertypeid='{$membertypeid}',\r\n\t\t   membergroupid='{$membergroupid}',\r\n\t\t   user='{$user}',\r\n\t\t   password='{$passwd}',\r\n\t\t   email='{$email}',\r\n\t\t   pname='{$user}',\r\n\t\t   signature='{$signature}',\r\n\t\t   nowface='1',\r\n\t\t   checked='{$ifchecked}',\r\n\t\t   regtime='{$regtime}',\r\n\t\t   exptime='{$exptime}',\r\n\t\t   ip='{$ip}',\r\n\t\t   logincount='1',\r\n\t\t   logintime='{$regtime}',\r\n\t\t   loginip='{$ip}'\r\n\t\t" );
		$memberid = $msql->instid( );
		$msql->query( "delete from {P}_member_rights where memberid='{$memberid}'" );
		$msql->query( "select * from {P}_member_defaultrights where membertypeid='{$membertypeid}'" );
		while ( $msql->next_record( ) )
		{
				$secureid = $msql->f( "secureid" );
				$securetype = $msql->f( "securetype" );
				$secureset = $msql->f( "secureset" );
				$fsql->query( "insert into {P}_member_rights values(\r\n\t\t\t0,\r\n\t\t   '{$memberid}',\r\n\t\t   '{$secureid}',\r\n\t\t   '{$securetype}',\r\n\t\t   '{$secureset}'\r\n\t\t\t)" );
		}
		membercentupdate( $memberid, "111" );
		$regmail = str_replace( "{#user#}", $user, $regmail );
		$regmail = str_replace( "{#password#}", $password, $regmail );
		$msql->query( "insert into {P}_member_msn set\r\n\t\t\t`body`='{$regmail}',\r\n\t\t\t`tomemberid`='{$memberid}',\r\n\t\t\t`frommemberid`='0',\r\n\t\t\t`dtime`='{$regtime}',\r\n\t\t\t`iflook`='0'\r\n\t\t" );
		include( ROOTPATH."includes/ebmail.inc.php" );
		ebmail( $email, $GLOBALS['CONF']['SiteEmail'], $membertype.$strRegNotice11, $regmail );
		$fsql->query( "select * from {P}_member_rights where memberid='{$memberid}' and securetype='con'" );
		if ( $fsql->next_record( ) )
		{
				$consecure = $fsql->f( "secureset" );
		}
		$md5 = md5( $user."76|01|14".$memberid.$membertype.$consecure );
		setcookie( "MUSER", $user );
		setcookie( "MEMBERPNAME", $user );
		setcookie( "MEMBERID", $memberid );
		setcookie( "MEMBERTYPE", $membertype );
		setcookie( "MEMBERTYPEID", $membertypeid );
		setcookie( "ZC", $md5 );
		setcookie( "SE", $consecure );
		if ( $GLOBALS['MEMBERCONF']['UC_OPEN'] == "1" )
		{
				$uid = uc_user_register( $user, $password, $email );
				if ( $uid <= 0 )
				{
						if ( $uid == 0 - 1 )
						{
								echo $strUCREGNTC1;
								exit( );
						}
						else if ( $uid == 0 - 2 )
						{
								echo $strUCREGNTC2;
								exit( );
						}
						else if ( $uid == 0 - 3 )
						{
								echo $strUCREGNTC3;
								exit( );
						}
						else if ( $uid == 0 - 4 )
						{
								echo $strUCREGNTC4;
								exit( );
						}
						else if ( $uid == 0 - 5 )
						{
								echo $strUCREGNTC5;
								exit( );
						}
						else if ( $uid == 0 - 6 )
						{
								echo $strUCREGNTC6;
								exit( );
						}
						else
						{
								echo $strUCREGNTC7;
								exit( );
						}
				}
				else
				{
						uc_user_login( $user, $password );
				}
		}
		echo "OK";
		exit( );
		break;
case "memberlogin" :
		$muser = $_POST['muser'];
		$mpass = $_POST['mpass'];
		$from = $_POST['from'];
		$ImgCode = $_POST['ImgCode'];
		if ( $muser == "" || $mpass == "" )
		{
				echo $strLoginNotice1;
				exit( );
		}
		else
		{
				$Ic = $_COOKIE['CODEIMG'];
				$Ic = strrev( $Ic ) + 5 * 2 - 9;
				$Ic = substr( $Ic, 0, 4 );
				if ( $ImgCode == "" || $Ic != $ImgCode )
				{
						echo $strIcErr;
						exit( );
				}
				if ( $GLOBALS['MEMBERCONF']['UC_OPEN'] == "1" )
				{
						if ( file_exists( ROOTPATH."api/uc_api/uc_client/client.php" ) && file_exists( ROOTPATH."api/uc_api/api.inc.php" ) )
						{
								include( ROOTPATH."api/uc_api/api.inc.php" );
								include( ROOTPATH."api/uc_api/uc_client/client.php" );
								list( $uid, $username, $password, $email ) = uid;								
								if ( $uid > 0 )
								{
										$msql->query( "select * from {P}_member where user='{$muser}'" );
										if ( $msql->next_record( ) )
										{
										}
										else
										{
												$membertypeid = $GLOBALS['MEMBERCONF']['UC_MEMBERTYPEID'];
												$fsql->query( "select * from {P}_member_type where membertypeid='{$membertypeid}'" );
												if ( $fsql->next_record( ) )
												{
														$membergroupid = $fsql->f( "membergroupid" );
														$membertype = $fsql->f( "membertype" );
														$ifchecked = $fsql->f( "ifchecked" );
														$expday = $fsql->f( "expday" );
														$regmail = $fsql->f( "regmail" );
												}
												$regtime = time( );
												if ( $expday != 0 )
												{
														$tm = $expday * 24 * 60 * 60;
														$exptime = $regtime + $tm;
												}
												else
												{
														$exptime = 0;
												}
												$ip = $_SERVER['REMOTE_ADDR'];
												$passwd = md5( $mpass );
												$fsql->query( "insert into {P}_member set\r\n\r\n\t\t\t\t\t\t\t\t\t   membertypeid='{$membertypeid}',\r\n\t\t\t\t\t\t\t\t\t   membergroupid='{$membergroupid}',\r\n\t\t\t\t\t\t\t\t\t   user='{$muser}',\r\n\t\t\t\t\t\t\t\t\t   password='{$passwd}',\r\n\t\t\t\t\t\t\t\t\t   email='{$email}',\r\n\t\t\t\t\t\t\t\t\t   pname='{$muser}',\r\n\t\t\t\t\t\t\t\t\t   signature='',\r\n\t\t\t\t\t\t\t\t\t   nowface='1',\r\n\t\t\t\t\t\t\t\t\t   checked='{$ifchecked}',\r\n\t\t\t\t\t\t\t\t\t   regtime='{$regtime}',\r\n\t\t\t\t\t\t\t\t\t   exptime='{$exptime}',\r\n\t\t\t\t\t\t\t\t\t   ip='{$ip}'\r\n\t\t\t\t\t\t\t\t\t" );
												$memberid = $fsql->instid( );
												$fsql->query( "delete from {P}_member_rights where memberid='{$memberid}'" );
												$fsql->query( "select * from {P}_member_defaultrights where membertypeid='{$membertypeid}'" );
												while ( $fsql->next_record( ) )
												{
														$secureid = $fsql->f( "secureid" );
														$securetype = $fsql->f( "securetype" );
														$secureset = $fsql->f( "secureset" );
														$tsql->query( "insert into {P}_member_rights values(\r\n\t\t\t\t\t\t\t\t\t\t0,\r\n\t\t\t\t\t\t\t\t\t   '{$memberid}',\r\n\t\t\t\t\t\t\t\t\t   '{$secureid}',\r\n\t\t\t\t\t\t\t\t\t   '{$securetype}',\r\n\t\t\t\t\t\t\t\t\t   '{$secureset}'\r\n\t\t\t\t\t\t\t\t\t\t)" );
												}
												$regmail = str_replace( "{#user#}", $muser, $regmail );
												$regmail = str_replace( "{#password#}", $mpass, $regmail );
												$fsql->query( "insert into {P}_member_msn set\r\n\t\t\t\t\t\t\t\t\t\t`body`='{$regmail}',\r\n\t\t\t\t\t\t\t\t\t\t`tomemberid`='{$memberid}',\r\n\t\t\t\t\t\t\t\t\t\t`frommemberid`='0',\r\n\t\t\t\t\t\t\t\t\t\t`dtime`='{$regtime}',\r\n\t\t\t\t\t\t\t\t\t\t`iflook`='0'\r\n\t\t\t\t\t\t\t\t\t" );
										}
								}
								else if ( $uid == 0 - 1 )
								{
										$uc_addmember = "YES";
								}
								else
								{
										$uc_addmember = "";
								}
						}
						else
						{
								echo $strUCNTC1;
								exit( );
						}
				}
				$mdpass = md5( $mpass );
				$msql->query( "select * from {P}_member where user='{$muser}' and password='{$mdpass}'" );
				if ( $msql->next_record( ) )
				{
						$checked = $msql->f( "checked" );
						$exptime = $msql->f( "exptime" );
						$memberid = $msql->f( "memberid" );
						$membertypeid = $msql->f( "membertypeid" );
						$pname = $msql->f( "pname" );
						$email = $msql->f( "email" );
						$nowtime = time( );
						if ( $exptime != 0 && $exptime < $nowtime )
						{
								echo $strLoginNotice3;
								exit( );
						}
						$ip = $_SERVER['REMOTE_ADDR'];
						$fsql->query( "update {P}_member set logincount=logincount+1,logintime='{$nowtime}',loginip='{$ip}' where memberid='{$memberid}'" );
						$fsql->query( "select membertype from {P}_member_type where membertypeid='{$membertypeid}'" );
						if ( $fsql->next_record( ) )
						{
								$membertype = $fsql->f( "membertype" );
						}
						$fsql->query( "select * from {P}_member_rights where memberid='{$memberid}' and securetype='con'" );
						if ( $fsql->next_record( ) )
						{
								$consecure = $fsql->f( "secureset" );
						}
						$md5 = md5( $muser."76|01|14".$memberid.$membertype.$consecure );
						setcookie( "MUSER", $muser );
						setcookie( "MEMBERPNAME", $pname );
						setcookie( "MEMBERID", $memberid );
						setcookie( "MEMBERTYPE", $membertype );
						setcookie( "MEMBERTYPEID", $membertypeid );
						setcookie( "ZC", $md5 );
						setcookie( "SE", $consecure );
						membercentupdate( $memberid, "114" );
						echo "OK";
						if ( $GLOBALS['MEMBERCONF']['UC_OPEN'] == "1" )
						{
								if ( $uc_addmember == "YES" )
								{
										uc_user_register( $muser, $mpass, $email );
								}
								if ( 0 < $uid )
								{
										echo uc_user_synlogin( $uid );
								}
						}
						exit( );
				}
				else
				{
						echo $strLoginNotice4;
						exit( );
				}
		}
		exit( );
		break;
case "memberlogout" :
		setcookie( "MUSER" );
		setcookie( "MEMBERID" );
		setcookie( "MEMBERPNAME" );
		setcookie( "MEMBERTYPE" );
		setcookie( "MEMBERTYPEID" );
		setcookie( "SE" );
		setcookie( "ZC" );
		echo "OK";
		exit( );
		break;
case "isLogin" :
		if ( isset( $_COOKIE['MUSER'], $_COOKIE['MEMBERID'] ) && isset( $_COOKIE['ZC'] ) && $_COOKIE['MEMBERID'] != "" && $_COOKIE['MUSER'] != "" && $_COOKIE['ZC'] != "" )
		{
				$md5 = md5( $_COOKIE['MUSER']."76|01|14".$_COOKIE['MEMBERID'].$_COOKIE['MEMBERTYPE'].$_COOKIE['SE'] );
				if ( $_COOKIE['ZC'] == $md5 )
				{
						echo "1";
						exit( );
				}
				else
				{
						echo "0";
						exit( );
				}
		}
		else
		{
				echo "0";
				exit( );
		}
		break;
case "xieyi" :
		$membertypeid = $_POST['membertypeid'];
		$msql->query( "select regxy from {P}_member_type where membertypeid='{$membertypeid}'" );
		if ( $msql->next_record( ) )
		{
				$regxy = nl2br( $msql->f( "regxy" ) );
		}
		echo $regxy;
		exit( );
		break;
case "getstep" :
		$membertypeid = $_POST['membertypeid'];
		$nowstep = $_POST['nowstep'];
		$str = "";
		$i = 0;
		$msql->query( "select * from {P}_member_regstep where membertypeid='{$membertypeid}' order by xuhao" );
		while ( $msql->next_record( ) )
		{
				$regstep = $msql->f( "regstep" );
				$stepname = $msql->f( "stepname" );
				if ( $nowstep == $regstep )
				{
						$str .= "<li class='stepnow'>".$stepname."</li>";
				}
				else
				{
						$str .= "<li class='step'>".$stepname."</li>";
				}
				$arr[$i] = $regstep;
				$i++;
		}
		if ( $nowstep == "account" )
		{
				$nextstep = $arr[0];
		}
		else
		{
				$p = 0;
				for ( ;	$p < sizeof( $arr );	$p++	)
				{
						if ( $arr[$p] == $nowstep )
						{
								$nextstep = $arr[$p + 1];
						}
				}
		}
		if ( $nextstep == "" || $nextstep == null )
		{
				$nextstep = "enter";
		}
		$str .= "<input type='hidden' id='nextst' value='".$nextstep."' />";
		echo $str;
		exit( );
		break;
case "imgcode" :
		$ImgCode = trim( $_POST['codenum'] );
		$Ic = $_COOKIE['CODEIMG'];
		$Ic = strrev( $Ic ) + 5 * 2 - 9;
		$Ic = substr( $Ic, 0, 4 );
		if ( $ImgCode == "" || $Ic != $ImgCode )
		{
				echo "0";
		}
		else
		{
				echo "1";
		}
		exit( );
		break;
case "plusexit" :
		setcookie( "PLUSADMIN", "READY" );
		echo "OK";
		exit( );
		break;
case "plusclose" :
		setcookie( "PLUSADMIN", "" );
		echo "OK";
		exit( );
		break;
case "plusenter" :
		if ( admincheckauth( ) )
		{
				setcookie( "PLUSADMIN", "SET" );
				echo "OK";
		}
		else
		{
				echo "NORIGHTS";
		}
		exit( );
		break;
case "plusready" :
		if ( admincheckauth( ) )
		{
				setcookie( "PLUSADMIN", "READY" );
				echo "OK";
		}
		else
		{
				echo "NORIGHTS";
		}
		exit( );
		break;
case "setcookie" :
		$cookietype = $_POST['cookietype'];
		$cookiename = $_POST['cookiename'];
		switch ( $cookietype )
		{
		case "new" :
				$gid = $_POST['gid'];
				$nums = $_POST['nums'];
				$fz = $_POST['fz'];
				if ( $nums == "" || intval( $nums ) < 1 || ceil( $nums ) != $nums )
				{
						echo "1000";
						exit( );
				}
				$CART = $gid."|".$nums."|".$fz."#";
				setcookie( $cookiename, $CART );
				break;
		case "add" :
				$gid = $_POST['gid'];
				$nums = $_POST['nums'];
				$fz = $_POST['fz'];
				if ( $nums == "" || intval( $nums ) < 1 || ceil( $nums ) != $nums )
				{
						echo "1000";
						exit( );
				}
				$NEWCART = $gid."|".$nums."|".$fz."#";
				$OLDCOOKIE = $_COOKIE[$cookiename];
				if ( $OLDCOOKIE == "" )
				{
						setcookie( $cookiename, $NEWCART );
				}
				else
				{
						$array = explode( "#", $OLDCOOKIE );
						$tnums = sizeof( $array ) - 1;
						$CART = "";
						$ifex = "0";
						$t = 0;
						for ( ;	$t < $tnums;	$t++	)
						{
								$fff = explode( "|", $array[$t] );
								$oldgid = $fff[0];
								$oldacc = $fff[1];
								$oldfz = $fff[2];
								if ( $gid == $oldgid && $fz == $oldfz )
								{
										$newacc = $oldacc + $nums;
										$CART .= $oldgid."|".$newacc."|".$oldfz."#";
										$ifex = "1";
								}
								else
								{
										$CART .= $oldgid."|".$oldacc."|".$oldfz."#";
								}
						}
						if ( $ifex != "1" )
						{
								$CART .= $NEWCART;
						}
						setcookie( $cookiename, $CART );
				}
				break;
		case "del" :
				$gid = $_POST['gid'];
				$fz = $_POST['fz'];
				$OLDCOOKIE = $_COOKIE[$cookiename];
				$array = explode( "#", $OLDCOOKIE );
				$tnums = sizeof( $array ) - 1;
				$CART = "";
				$t = 0;
				for ( ;	$t < $tnums;	$t++	)
				{
						$fff = explode( "|", $array[$t] );
						$oldgid = $fff[0];
						$oldacc = $fff[1];
						$oldfz = $fff[2];
						if ( $gid != $oldgid || $fz != $oldfz )
						{
								$CART .= $oldgid."|".$oldacc."|".$oldfz."#";
						}
				}
				setcookie( $cookiename, $CART );
				break;
		case "modi" :
				$gid = $_POST['gid'];
				$fz = $_POST['fz'];
				$nums = $_POST['nums'];
				if ( $nums == "" || intval( $nums ) < 1 || ceil( $nums ) != $nums )
				{
						echo "1000";
						exit( );
				}
				$OLDCOOKIE = $_COOKIE[$cookiename];
				$array = explode( "#", $OLDCOOKIE );
				$tnums = sizeof( $array ) - 1;
				$CART = "";
				$t = 0;
				for ( ;	$t < $tnums;	$t++	)
				{
						$fff = explode( "|", $array[$t] );
						$oldgid = $fff[0];
						$oldacc = $fff[1];
						$oldfz = $fff[2];
						if ( $gid == $oldgid && $fz == $oldfz )
						{
								$CART .= $oldgid."|".$nums."|".$oldfz."#";
						}
						else
						{
								$CART .= $oldgid."|".$oldacc."|".$oldfz."#";
						}
				}
				setcookie( $cookiename, $CART );
				break;
		case "empty" :
				setcookie( $cookiename );
				break;
		}
		echo "OK";
		exit( );
		break;
}
?>

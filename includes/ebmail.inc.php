<?php

function ebmail( $to, $from, $subject, $message )
{
	$owner_m_smtp = $GLOBALS['CONF']['owner_m_smtp'];
	$owner_m_user = $GLOBALS['CONF']['owner_m_user'];
	$owner_m_pass = $GLOBALS['CONF']['owner_m_pass'];
	$owner_m_check = $GLOBALS['CONF']['owner_m_check'];
	$owner_m_mail = $GLOBALS['CONF']['owner_m_mail'];
	$ownersys = $GLOBALS['CONF']['ownersys'];
	$subject = "=?UTF-8?B?".base64_encode( $subject )."?=";
	$message = str_replace( "\r\n", "<br>", $message );
	$message = "<html><body style='font-size:12px'>".$message."</body></html>";
	if ( $ownersys == "1" )
	{
		mail( $to, $subject, $message, "From: {$from}\nReply-To: {$from}\nContent-Type:text/html;charset=UTF-8 \nX-Mailer: PHP/".phpversion( ) );
	}
	else if ( $ownersys == "2" )
	{
		send22( $to, $from, $subject, $message );
	}
}

function send22( $to, $from, $subject, $message )
{
	$owner_m_smtp = $GLOBALS['CONF']['owner_m_smtp'];
	$owner_m_user = $GLOBALS['CONF']['owner_m_user'];
	$owner_m_pass = $GLOBALS['CONF']['owner_m_pass'];
	$owner_m_check = $GLOBALS['CONF']['owner_m_check'];
	$owner_m_mail = $GLOBALS['CONF']['owner_m_mail'];
	$ownersys = $GLOBALS['CONF']['ownersys'];
	$smtp = $owner_m_smtp;
	$check = $owner_m_check;
	if ( $check )
	{
		$username = $owner_m_user;
		$password = $owner_m_pass;
	}
	$s_from = $owner_m_mail;
	$fp = fsockopen( $smtp, 25, &$errno, &$errstr, 20 );
	if ( !$fp )
	{
		return "联接服务器失败".( 59 );
	}
	set_socket_blocking( $fp, true );
	$lastmessage = fgets( $fp, 512 );
	if ( substr( $lastmessage, 0, 3 ) != 220 )
	{
		return "错误信息:".$lastmessage.( 63 );
	}
	$yourname = "YOURNAME";
	if ( $check == "1" )
	{
		$lastact = "EHLO ".$yourname."\r\n";
	}
	else
	{
		$lastact = "HELO ".$yourname."\r\n";
	}
	fputs( $fp, $lastact );
	$lastmessage == fgets( $fp, 512 );
	if ( substr( $lastmessage, 0, 3 ) != 220 )
	{
		return "错误信息{$lastmessage}".( 72 );
	}
	while ( true )
	{
		$lastmessage = fgets( $fp, 512 );
		if ( substr( $lastmessage, 3, 1 ) != "-" || empty( $lastmessage ) )
		{
			break;
		}
	}
	if ( $check == "1" )
	{
		$lastact = "AUTH LOGIN"."\r\n";
		fputs( $fp, $lastact );
		$lastmessage = fgets( $fp, 512 );
		if ( substr( $lastmessage, 0, 3 ) != 334 )
		{
			return "错误信息{$lastmessage}".( 86 );
		}
		$lastact = base64_encode( $username )."\r\n";
		fputs( $fp, $lastact );
		$lastmessage = fgets( $fp, 512 );
		if ( substr( $lastmessage, 0, 3 ) != 334 )
		{
			return "错误信息{$lastmessage}".( 91 );
		}
		$lastact = base64_encode( $password )."\r\n";
		fputs( $fp, $lastact );
		$lastmessage = fgets( $fp, 512 );
		if ( substr( $lastmessage, 0, 3 ) != "235" )
		{
			return "错误信息{$lastmessage}".( 96 );
		}
	}
	$lastact = "MAIL FROM: <".$s_from.">\r\n";
	fputs( $fp, $lastact );
	$lastmessage = fgets( $fp, 512 );
	if ( substr( $lastmessage, 0, 3 ) != 250 )
	{
		return "错误信息{$lastmessage}".( 103 );
	}
	$lastact = "RCPT TO: <".$to.">\r\n";
	fputs( $fp, $lastact );
	$lastmessage = fgets( $fp, 512 );
	if ( substr( $lastmessage, 0, 3 ) != 250 )
	{
		return "错误信息{$lastmessage}".( 109 );
	}
	$lastact = "DATA\r\n";
	fputs( $fp, $lastact );
	$lastmessage = fgets( $fp, 512 );
	if ( substr( $lastmessage, 0, 3 ) != 354 )
	{
		return "错误信息{$lastmessage}".( 115 );
	}
	$head = "Subject: {$subject}\r\n";
	$message = $head."\r\n".$message;
	$head = "From: {$from}\r\n";
	$message = $head.$message;
	$head = "To: {$to}\r\n";
	$message = $head.$message;
	$head = "Content-Type: text/html; charset=UTF-8 \r\n";
	$message = $head.$message;
	$message .= "\r\n.\r\n";
	fputs( $fp, $message );
	$lastact = "QUIT\r\n";
	fputs( $fp, $lastace );
	fclose( $fp );
	return 0;
}

?>

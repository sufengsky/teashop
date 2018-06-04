<?php

define( "ROOTPATH", "../" );
include( ROOTPATH."includes/admin.inc.php" );
include( ROOTPATH."base/admin/language/".$sLan.".php" );
include( ROOTPATH."base/nusoap/nusoap.php" );
include( ROOTPATH."includes/data.inc.php" );
$server = "http://update.phpweb.net/remote/webservice/soapserver.php";
$customer = new soapclientx( $server );
needauth( 7 );
$act = $_POST['act'];
switch ( $act )
{
	case "getUpdateList" :
		$r_params = array( "siteurl" => $SiteUrl, "domain" => $_SERVER['HTTP_HOST'] );
		$lic = $customer->call( "getUpdateInfo", $r_params );
		if ( $err = $customer->geterror( ) )
		{
			$errinfo = $customer->response;
			echo "<div class='update_err'>升级服务器连接失败<br>".$err."<br>".$errinfo."</div>";
			exit( );
		}
		if ( !$lic )
		{
			echo "<div class='update_err'>升级服务器连接失败，请稍候再试</div>";
			exit( );
		}
		$nums = sizeof( $lic );
		$n = 0;
		$caninstall = "1";
		$i = 0;
		for ( ;	$i < $nums;	$i++	)
		{
			$coltype = $lic[$i]['coltype'];
			$title = $lic[$i]['title'];
			$release = $lic[$i]['release'];
			$version = $lic[$i]['version'];
			$msg = $lic[$i]['msg'];
			$ifdb = $lic[$i]['ifdb'];
			$msql->query( "select colname from {P}_base_coltype where coltype='{$coltype}'" );
			if ( $msql->next_record( ) )
			{
				$colname = "[".$msql->f( "colname" )."]";
				$ColCanUpdate = "1";
			}
			else
			{
				$colname = "";
				$ColCanUpdate = "0";
			}
			if ( $ifdb == 1 )
			{
				$ifdbstr = "[data]";
			}
			else
			{
				$ifdbstr = "";
			}
			if ( $ColCanUpdate == "1" || $coltype == "all" )
			{
				if ( intval( $release ) <= intval( PHPWEB_RELEASE ) )
				{
					$msql->query( "select `release` from {P}_base_version where `release`='{$release}'" );
					if ( $msql->next_record( ) )
					{
						$str .= "<div id='uo_".$i."' class='update_ok'><div class='u_open'></div>".$release."/".$version." &nbsp; ".$colname." &nbsp;".$title." &nbsp;".$ifdbstr."</div>";
						$str .= "<div id=suo_".$i." class='update_detail'>".nl2br( $msg )."</div>";
					}
					else
					{
						$str .= "<div id='uo_".$i."' class='update_ok' style='background:#f7f7f7 url(images/alert.png) 15px no-repeat'><div class='u_open'></div>".$release."/".$version." &nbsp; ".$colname." &nbsp;".$title." (数据库缺少更新记录)&nbsp;".$ifdbstr."</div>";
						if ( $ifdb == 1 )
						{
							$str .= "<div id=suo_".$i." class='update_detail'>".nl2br( $msg )."<br><br><span style='color:#ff0000'>提示：文件系统版本号已高于此升级，但数据库缺少本次升级的记录(_base_version)，可能因为<br>1)升级时该模块未安装<br>2)安装更新时数据库更新出错<br>3)升级包误上传到网站目录下<br>由于本次升级涉及数据库更新，需检查数据库和文件系统，在确保数据和文件均已更新后，添加数据库更新记录</span></div>";
						}
						else
						{
							$str .= "<div id=suo_".$i." class='update_detail'>".nl2br( $msg )."<br><br><span style='color:#9a3a00'>提示：文件系统版本号已高于此升级，但数据库缺少本次升级的记录(_base_version)，可能因为<br>1)升级时该模块未安装<br>2)安装更新时数据库更新出错<br>3)升级包误上传到网站目录下<br>本次升级不涉及数据库更新，在确保文件系统已更新后，可直接添加数据库更新记录</span></div>";
						}
						$caninstall = "1";
					}
				}
				else
				{
					if ( file_exists( "../update/".$release."/version.php" ) )
					{
						if ( $n == 0 )
						{
							$bstr = "<div class='u_right'><a href='#' id='inst_".$release."' class='u_inst'>安装升级</a></div>";
						}
						else
						{
							$bstr = "<div class='u_right'>升级已上传</div>";
						}
					}
					else
					{
						$bstr = "<div class='u_right'>升级未上传</div>";
					}
					$msql->query( "select `release` from {P}_base_version where `release`='{$release}'" );
					if ( $msql->next_record( ) )
					{
						if ( $ifdb == 1 )
						{
							$str .= "<div id='uo_".$i."' class='update_no' style='background:#f7f7f7 url(images/alert.png) 15px no-repeat'><div class='u_open'></div>".$release."/".$version." &nbsp; ".$colname." &nbsp;".$title." &nbsp; (有数据库更新记录，但文件系统版本号低于该记录)&nbsp;".$ifdbstr."</div>";
							$str .= "<div id=suo_".$i." class='update_detail'>".$bstr.nl2br( $msg )."<br><br><span style='color:#ff0000'>提示：文件系统版本号显示未升级，但数据库已经存在本次升级记录，可能因为<br>1)误将低版本升级包直接上传到网站目录下<br>2)安装更新时文件复制失败<br>3)误修改了版本文件<br>由于本次升级涉及数据库更新，重复安装升级将导致数据错误！<br>请检查数据是否确实已更新，如数据确实已更新可直接上传升级文件，如数据没有更新可删除数据更新记录，再安装升级</span></div>";
						}
						else
						{
							$str .= "<div id='uo_".$i."' class='update_no' style='background:#f7f7f7 url(images/alert.png) 15px no-repeat'><div class='u_open'></div>".$release."/".$version." &nbsp; ".$colname." &nbsp;".$title." &nbsp; (有数据库更新记录，但文件系统版本号低于该记录)&nbsp;".$ifdbstr."</div>";
							$str .= "<div id=suo_".$i." class='update_detail'>".$bstr.nl2br( $msg )."<br><br><span style='color:#9a3a00'>提示：文件系统版本号显示未升级，但数据库已经存在本次升级记录，可能因为<br>1)误将低版本升级包直接上传到网站目录下<br>2)安装更新时文件复制失败<br>3)误修改了版本文件<br>由于本次升级不涉及数据库更新，可直接上传升级文件并更新文件版本号进行修复</span></div>";
						}
						$caninstall = "0";
					}
					else
					{
						$str .= "<div id='uo_".$i."' class='update_no'><div class='u_open'></div>".$release."/".$version." &nbsp; ".$colname." &nbsp;".$title." &nbsp;".$ifdbstr."</div>";
						$str .= "<div id=suo_".$i." class='update_detail'>".$bstr.nl2br( $msg )."</div>";
					}
					$n++;
				}
			}
		}
		$str .= "<input id='caninstall' type='hidden' value='".$caninstall."'><input id='phpwebUser' type='hidden' value='".$GLOBALS['CONF']['phpwebUser']."'>";
		echo $str;
		exit( );
		break;
	case "installUpdate" :
		$release = $_POST['r'];
		$user = $_POST['user'];
		$passwd = $_POST['passwd'];
		$r_params = array( "siteurl" => $SiteUrl, "domain" => $_SERVER['HTTP_HOST'], "release" => $release, "user" => $user, "passwd" => $passwd );
		$lic = $customer->call( "installUpdate", $r_params );
		if ( $err = $customer->geterror( ) )
		{
			$errinfo = $customer->response;
			echo "<div class='update_err'>升级服务器连接失败<br>".$err."<br>".$errinfo."</div>";
			exit( );
		}
		if ( !$lic )
		{
			echo "<div class='update_err'>升级服务器连接失败，请稍候再试</div>";
			exit( );
		}
		else if ( $lic == "nouser" )
		{
			echo "<div class='update_err'>授权用户名或密码错误，软件升级服务验证未通过</div>";
			exit( );
		}
		else if ( $lic == "norights" )
		{
			echo "<div class='update_err'>软件升级服务验证未通过，可能是因为软件尚未购买商业授权</div>";
			exit( );
		}
		else if ( $lic == "exp" )
		{
			echo "<div class='update_err'>软件尚未购买商业授权或已过期，请续订商业授权</div>";
			exit( );
		}
		if ( strstr( $lic, ";" ) )
		{
			$lic = remove_remarks( trim( $lic ) );
			$pieces = split_sql_file( $lic, ";" );
			$pieces_count = count( $pieces );
			$i = 0;
			for ( ;	$i < $pieces_count;	$i++	)
			{
				$a_sql_query = trim( $pieces[$i] );
				if ( !empty( $a_sql_query ) && $a_sql_query[0] != "#" )
				{
					$msql->query( $a_sql_query );
				}
			}
		}
		$FromPath = "../update/".$release;
		$ToPath = "../";
		cpfolder( $FromPath, $ToPath );
		$msql->query( "update {P}_base_config set `value`='{$user}' where `variable`='phpwebUser'" );
		echo "OK";
		exit( );
		break;
}
?>

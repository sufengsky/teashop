<?php


function MemberLogin(){

	global $msql,$fsql,$SiteUrl;
	global $strLoginNotice1,$strLoginNotice2,$strLoginNotice3,$strLoginNotice4;

		
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];

		$Temp=LoadTemp($tempname);
		
		return $Temp;

}

?>
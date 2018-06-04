<?php

/*
	[插件名称] 非会员订单查询
*/


function ShopOrderSearch(){

	
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];


	$Temp=LoadTemp($tempname);

	return $Temp;


}
?>
<?php
define("ROOTPATH", "../../");
include(ROOTPATH."includes/common.inc.php");
include(ROOTPATH."member/includes/pay.inc.php");

//获取支付方式参数
$pv=getPayVal("alipay_db");

///////////////////////////////////////////////////////////////////
/*	
	*功能：付完款后跳转的页面
	*版本：2.0
	*日期：2008-08-01
	*作者：支付宝公司销售部技术支持团队
	*联系：0571-26888888
	*版权：支付宝公司
*/

$partner        = $pv["pcenteruser"];       //合作伙伴ID
$security_code  = $pv["pcenterkey"];       //安全检验码
$seller_email   = $pv["key1"];       //卖家支付宝帐户
$_input_charset = "utf-8";  //字符编码格式  目前支持 GBK 或 utf-8
$sign_type      = "MD5";    //加密方式  系统默认(不要修改)
$transport      = "http";  //访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式(系统默认,不要修改)

require_once("alipay_notify.php");

$alipay = new alipay_notify($partner,$security_code,$sign_type,$_input_charset,$transport);
$verify_result = $alipay->return_verify();

	//获取支付宝的反馈参数
    $dingdan    = $_GET['out_trade_no'];   //获取订单号
    $total_fee  = $_GET['total_fee'];      //获取总价格
    $receive_name    =$_GET['receive_name'];    //获取收货人姓名
	$receive_address =$_GET['receive_address']; //获取收货人地址
	$receive_zip     =$_GET['receive_zip'];     //获取收货人邮编
	$receive_phone   =$_GET['receive_phone'];   //获取收货人电话
	$receive_mobile  =$_GET['receive_mobile'];  //获取收货人手机
  

if($verify_result){

	//转成规定变量，交给面向模块的PayBack函数来处理
	$arr=explode("-",$dingdan);
	$back_coltype=$arr[1];
	$back_orderid=$arr[2];
	$back_fee=$total_fee;
	$back_payid=$pv["payid"];
	PayBack($back_payid,$back_coltype,$back_orderid,$back_fee);

}else {    
	echo "fail";
}

?>
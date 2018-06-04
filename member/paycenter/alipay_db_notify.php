<?php
/*
	*功能：付款过程中服务器通知页面
	*版本：2.0
	*日期：2008-08-01
	*作者：支付宝公司销售部技术支持团队
	*联系：0571-26888888
	*版权：支付宝公司
*/
exit;
//暂不使用
$partner        = "2088002053153634";       //合作伙伴ID
$security_code  = "9fkjby5pbzscg61vil4pf6xwlp8b9w6d";       //安全检验码
$seller_email   = "wangjinmin1982@126.com";       //卖家支付宝帐户
$_input_charset = "utf-8";  //字符编码格式  目前支持 GBK 或 utf-8
$sign_type      = "MD5";    //加密方式  系统默认(不要修改)
$transport      = "http";  //访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式(系统默认,不要修改)

require_once("alipay_notify.php");

$alipay = new alipay_notify($partner,$security_code,$sign_type,$_input_charset,$transport);
$verify_result = $alipay->notify_verify();

if($verify_result) {   //认证合格
 //获取支付宝的反馈参数
    $dingdan   = $_POST['out_trade_no'];   //获取支付宝传递过来的订单号
    $total     = $_POST['total_fee'];      //获取支付宝传递过来的总价格
    $receive_name    =$_POST['receive_name'];    //获取收货人姓名
	$receive_address =$_POST['receive_address']; //获取收货人地址
	$receive_zip     =$_POST['receive_zip'];     //获取收货人邮编
	$receive_phone   =$_POST['receive_phone'];   //获取收货人电话
	$receive_mobile  =$_POST['receive_mobile'];  //获取收货人手机

/*
	获取支付宝反馈过来的状态,根据不同的状态来更新数据库 
	WAIT_BUYER_PAY(表示等待买家付款);
	WAIT_SELLER_SEND_GOODS(表示买家付款成功,等待卖家发货);
	WAIT_BUYER_CONFIRM_GOODS(表示卖家已经发货等待买家确认);
	TRADE_FINISHED(表示交易已经成功结束);
*/
	if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {                   //等待买家付款
        //这里放入你自定义代码,比如根据不同的trade_status进行不同操作
		//echo "success";
		log_result("WAIT_BUYER_PAY");
	}
	else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {      //买家付款成功,等待卖家发货
        //这里放入你自定义代码,比如根据不同的trade_status进行不同操作
		//echo "success";
		log_result("WAIT_SELLER_SEND_GOODS");
	}
	else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {    //卖家已经发货等待买家确认
        //这里放入你自定义代码,比如根据不同的trade_status进行不同操作
		//echo "success";
		log_result("WAIT_BUYER_CONFIRM_GOODS");
	}
	else if($_POST['trade_status'] == 'TRADE_FINISHED') {              //交易成功结束
        //这里放入你自定义代码,比如根据不同的trade_status进行不同操作
		//echo "success";
		log_result("TRADE_FINISHED");
	}
	else {
		//echo "fail";
		log_result ("verify_failed");
	}


}else{    //认证不合格
	echo "fail";
	log_result ("verify_failed");
}

?>
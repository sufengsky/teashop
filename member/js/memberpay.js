

//充值
$(document).ready(function(){
	$("#memberpayform").submit(function(){
		if($("#payid")[0].value==""){
			alert("请选择在线支付接口");
			return false;
		}
		if($("#paytotal")[0].value=="" || Number($("#paytotal")[0].value)<0.01 || isNaN($("#paytotal")[0].value)){
			alert("请填写充值金额");
			return false;
		}
		return true;
	});
});


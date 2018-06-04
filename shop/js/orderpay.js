

//会员帐户扣款支付订单
$(document).ready(function(){
	
	$('#memberpay').click(function(){ 
		var orderid=$("#orderid")[0].value;
		$.ajax({
			type: "POST",
			url: "post.php",
			data: "act=payfrommemberaccount&orderid="+orderid,
			success: function(msg){
				if(msg=="OK"){
					$().alertwindow("订单付款成功","orderdetail.php?orderid="+orderid);
				}else if(msg=="1000"){
					alert("订单不存在");
				}else if(msg=="1001"){
					alert("该订单已经付过款了，不能重复付款");
				}else if(msg=="1002"){
					alert("该订单已退订，不能付款");
				}else if(msg=="1003"){
					alert("订单付款方式不符，不能从会员帐户扣款");
				}else if(msg=="1004"){
					alert("会员帐户余额不足");
				}else if(msg=="1005"){
					alert("会员帐号不存在");
				}else if(msg=="1006"){
					alert("您尚未登录");
				}else{
					alert(msg);
				}
			}
		});
	

   }); 
});



//付款确认
$(document).ready(function(){
	
	$("#orderpaychk").click(function(){
		var orderid=$("input#orderid")[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=orderpaychk&orderid="+orderid,
			success: function(msg){
				if(msg=="OK"){
					parent.location.reload();
				}else if(msg=="1000"){
					alert("订单不存在");
				}else if(msg=="1001"){
					alert("订单是已付款状态，不能重复付款确认");
				}else if(msg=="1002"){
					alert("订单已退订，不能进行付款确认");
				}else if(msg=="1003"){
					alert("订单已完成，不能进行付款确认");
				}else if(msg=="1004"){
					alert("会员不存在，可能已删除");
				}else if(msg=="1005"){
					alert("会员帐户余款不足，不能进行付款确认");
				}else{
					alert(msg);
				}
			}
		});
	});
});


//退款确认
$(document).ready(function(){
	
	$("#orderunpay").click(function(){
		var orderid=$("input#orderid")[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=orderunpay&orderid="+orderid,
			success: function(msg){
				if(msg=="OK"){
					parent.location.reload();
				}else if(msg=="1000"){
					alert("订单不存在");
				}else if(msg=="1001"){
					alert("订单是未付款状态，不能进行退款确认");
				}else if(msg=="1002"){
					alert("订单已退订，不能进行退款确认");
				}else if(msg=="1003"){
					alert("订单已完成，不能进行退款确认");
				}else if(msg=="1004"){
					alert("本订单是会员订单，但会员不存在，可能已删除");
				}else{
					alert(msg);
				}
			}
		});
	});
});



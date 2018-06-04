
//配送
$(document).ready(function(){
	
	$(".doyun").click(function(){
		var itemid=this.id.substr(6);
		var nowstat=$("#doyun_"+itemid)[0].value;
		if(nowstat=="发货"){
				$.ajax({
					type: "POST",
					url:"post.php",
					data: "act=orderitemyun&itemid="+itemid,
					success: function(msg){
						if(msg=="OK"){
							$("#yunstat_"+itemid)[0].src="images/toolbar_ok.gif";
							var yu=Number($("#kucun_"+itemid).html())-Number($("#nums_"+itemid).html());
							if(yu==""){yu="0"}
							$("#kucun_"+itemid).html(yu);
							$("#doyun_"+itemid)[0].value="退货";
						}else if(msg=="1000"){
							alert("订购记录不存在");
						}else if(msg=="1001"){
							alert("订单已退订，不能进行发货确认");
						}else if(msg=="1002"){
							alert("订单已完成，不能进行发货确认");
						}else if(msg=="1003"){
							alert("订单不存在");
						}else if(msg=="1004"){
							alert("商品库存不足");
						}else if(msg=="1005"){
							$("#yunstat_"+itemid)[0].src="images/toolbar_ok.gif";
							$("#doyun_"+itemid)[0].value="退货";
						}else{
							alert(msg);
						}
						return false;
					}
				});

		}else{
				$.ajax({
					type: "POST",
					url:"post.php",
					data: "act=orderitemtui&itemid="+itemid,
					success: function(msg){
						if(msg=="OK"){
							$("#yunstat_"+itemid)[0].src="images/toolbar_no.gif";
							var yu=Number($("#kucun_"+itemid).html())+Number($("#nums_"+itemid).html());
							if(yu==""){yu="0"}
							$("#kucun_"+itemid).html(yu);
							$("#doyun_"+itemid)[0].value="发货";
						}else if(msg=="1000"){
							alert("订购记录不存在");
						}else if(msg=="1001"){
							alert("订单已退订，不能进行退货确认");
						}else if(msg=="1002"){
							alert("订单已完成，不能进行退货确认");
						}else if(msg=="1003"){
							alert("订单不存在");
						}else if(msg=="1005"){
							$("#yunstat_"+itemid)[0].src="images/toolbar_no.gif";
							$("#doyun_"+itemid)[0].value="发货";
						}else{
							alert(msg);
						}
						return false;
					}
				});
		
		}
	});
});



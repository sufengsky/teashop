

//订单查询
$(document).ready(function(){


	$("img.paystat").each(function(){
		var oldsrc=$(this)[0].src;
		var imgname=oldsrc.substr((oldsrc.length-6),2);
		if(imgname=="ok"){
			$(this).css({cursor:"default"});
		}
	});

	$("img.paystat").mouseover(function(){
		var oldsrc=$(this)[0].src;
		var imgname=oldsrc.substr((oldsrc.length-6),2);
		if(imgname=="no"){
			$(this)[0].src=PDV_RP+"shop/templates/images/payit.gif";
			$(this).mouseout(function(){
				$(this)[0].src=oldsrc;
			});
			$(this).click(function(){
				var orderid=this.id.substr(8);
				window.location='orderpay.php?orderid='+orderid;
			});
		}
	});

	$("#showpay").attr("value",$("#nowshowpay")[0].value);
	$("#showyun").attr("value",$("#nowshowyun")[0].value);
	$("#showok").attr("value",$("#nowshowok")[0].value);

	if($("#key")[0].value==""){
		$("#key")[0].value="商品名称/订单号";
		$("#key").css({color:'#909090'});
		$("#key").click(function(){
			if($("#key")[0].value=="商品名称/订单号"){
				$("#key")[0].value="";
				$("#key").css({color:'#505050'});
			}
		});
	}

	$("#searchbutton").mouseover(function(){
		if($("#key")[0].value=="商品名称/订单号"){
			$("#key")[0].value="";
			$("#key").css({color:'#505050'});
		}
	});
	
});


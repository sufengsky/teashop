

$(document).ready(function(){
	$("input#os_orderno").focus(function(){
		if($(this)[0].value=="100000"){
			$(this)[0].value="";
		}
	});

	$("#os_orderlook").click(function(){ 
		var orderno=$("#os_orderno")[0].value;
		var sname=$("#os_sname")[0].value;

		if(orderno=="" || sname==""){
			alert("请输入订单号和收货人姓名");
		}else{
			$.ajax({
				type: "POST",
				url:PDV_RP+"shop/post.php",
				data: "act=orderlook&orderno="+orderno+"&sname="+sname,
				success: function(msg){
					if(msg.substr(0,2)=="OK"){
						var md=msg.substr(3);
						window.location=PDV_RP+'shop/orderdetail.php?orderno='+orderno+'&md='+md;
					}else if(msg=="1000"){
						alert("订单不存在");
					}else{
						alert(msg);
					}
				}
			});
		}
	}); 

});



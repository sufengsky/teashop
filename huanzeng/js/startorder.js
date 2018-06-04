
//判断是否登录分别处理
$(document).ready(function(){
	
	$.ajax({
		type: "POST",
		url:PDV_RP+"post.php",
		data: "act=isLogin",
		success: function(msg){
			if(msg=="1"){
				$("div#notLogin").hide();

				//获取历史资料
				$.ajax({
					type: "POST",
					url:PDV_RP+"huanzeng/post.php",
					data: "act=getmemberinfo",
					success: function(msg){
						eval(msg);
						$("#name")[0].value=M.N;
						$("#address")[0].value=M.Z;
						$("#postcode")[0].value=M.P;
						$("#tel")[0].value=M.T;
					}
				});
				$().setBg();
			}else{
				$("div#notLogin").show();
				$('.loginlink').click(function() { 
					$().orderMemberLogin(1);
				});
				$().setBg();
			}
		}
	});
});


//提交订单
$(document).ready(function(){
	$('#OrderForm').submit(function(){ 
		
		if($("#tcent")[0].value=="" || Number($("#tcent")[0].value)<0){
			alert("您的购物车中没有赠品或赠品积分错误，不能提交订单");
			return false;
		}
		
		if($("#name")[0].value==""){
			alert("请填写收货人姓名");
			return false;
		}
		
		if($("#address")[0].value==""){
			alert("请填写收货地址");
			return false;
		}
		
		if($("#postcode")[0].value==""){
			alert("请填写邮政编码");
			return false;
		}

		if($("#tel")[0].value==""){
			alert("请填写收货人联系电话");
			return false;
		}

		$('#OrderForm').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				var msg_arr=msg.split("_");
				if(msg_arr[0]=="OK"){
					
					//清除cookie
					$.ajax({
						type: "POST",
						url:PDV_RP+"post.php",
						data: "act=setcookie&cookietype=empty&cookiename=HZCART",
						success: function(msg){
						}
					});

					$('div#notice').hide();
					$().alertwindow("订单提交成功，已经从会员帐户扣除所需积分"+msg_arr[2]+"分","orderdetail.php?orderid="+msg_arr[1]);

				}else if(msg=="1000"){
					$('div#notice').hide();
					alert("您的购物车中没有赠品");
				}else if(msg=="1001"){
					$('div#notice').hide();
					alert("您尚未登录，不能提交订单");
				}else if(msg=="1002"){
					$('div#notice').hide();
					alert("订购数量错误");
				}else if(msg=="1003"){
					$('div#notice').hide();
					alert("对不起，库存不足");
				}else if(msg=="1004"){
					$('div#notice').hide();
					alert("对不起，您的积分不足，不能提交订单");
				}else{
					$('div#notice')[0].className='noticediv';
					$('div#notice').show();
					$().setBg();
				}
			}
		}); 
       return false; 

   }); 
});


//获取弹出式登录框
(function($){
	$.fn.orderMemberLogin = function(act){
		
		//获取登录表单
		$.ajax({
			type: "POST",
			url:PDV_RP+"member/post.php",
			data: "act=getpoploginform&RP="+PDV_RP,
			success: function(msg){
				
				$('html').append(msg);
				$.blockUI({message: $('div#loginDialog'),css:{width:'300px'}}); 
				$('.pwClose').click(function() { 
					if(act=="1"){
						$.unblockUI(); 
						$('div#loginDialog').remove();
					}else{
						window.location.reload();
					}
					
				}); 

				$('img#zhuce').click(function() { 
					$.unblockUI(); 
					window.location=PDV_RP+"member/reg.php";
				}); 

				$("img#fmCodeImg").click(function () { 
					$("img#fmCodeImg")[0].src=PDV_RP+"codeimg.php?"+Math.round(Math.random()*1000000);
				 });

				 $('#LoginForm').submit(function(){ 

					$('#LoginForm').ajaxSubmit({
						target: 'div#loginnotice',
						url: PDV_RP+'post.php',
						success: function(msg) {
							if(msg=="OK" || msg.substr(0,2)=="OK"){
								$('div#loginnotice').hide();
								$.unblockUI(); 
								$('div#loginDialog').remove();
								window.location.reload();
							}else{
								$('div#loginnotice').show();
							}
						}
					}); 
			   
				return false; 

			 }); 


			}
		});

		
	};
})(jQuery);
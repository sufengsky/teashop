
$(document).ready(function(){
	
	//获取一级配送区域
	$.ajax({
		type: "POST",
		url:PDV_RP+"shop/post.php",
		data: "act=getyunzone&pid=0",
		success: function(msg){

			$("#yunzone").append(msg);

			//一级选择时获取二级配送区域
			$("#yunzone").change(function(){
				var pid=$("#yunzone")[0].value;
				if(pid!=0){
					$.ajax({
						type: "POST",
						url:PDV_RP+"shop/post.php",
						data: "act=getyunzone&pid="+pid,
						success: function(msg){
							if(msg!=""){
								$("#subzone").html(msg).show();
								$("#zoneid")[0].value=$("#subzone")[0].value;
								$("#tr_yunmethod").show();
								
								$("#tr_yunfei").show();
								getYunMethod($("#subzone")[0].value,"");

								$("#subzone").change(function(){
									$("#zoneid")[0].value=$("#subzone")[0].value;
									getYunMethod($("#subzone")[0].value,"");
								});
								$().setBg();
								
							}else{
								$("#subzone").hide();
								$("#zoneid")[0].value=$("#yunzone")[0].value;
								$("#tr_yunmethod").show();
								$("#tr_yunfei").show();
								getYunMethod($("#yunzone")[0].value,"");
								$().setBg();
							}
						}
					});
					
				}else{
					$("#subzone").hide();
					$("#zoneid")[0].value="0";
					$("#tr_yunmethod").hide();
					$("#tr_yunintro").hide();
					$("#tr_yunfei").hide();
					$().setBg();
				}
			});

		}
	});


	//初始获取付款方法
	$.ajax({
		type: "POST",
		url:PDV_RP+"shop/post.php",
		data: "act=getpaymethod",
		success: function(msg){
			$("#payid").html(msg);
			
			//获取初始支付说明
			getPaymethodIntro();

			$("#payid").change(function(){
				getPaymethodIntro();
			});

		}
	});

});


function getYunMethod(zoneid,nowyunid){

	$.ajax({
		type: "POST",
		url:PDV_RP+"shop/post.php",
		data: "act=getyunmethod&zoneid="+zoneid,
		success: function(msg){
			if(msg!=""){
				$("#yunmethod").html(msg).show();

				//会员状态下取出历史yunid时的判断
				if(nowyunid!=""){
					$("#yunmethod").attr("value",nowyunid);
				}

				$("#tr_yunfei").show();
				$().setBg();

				//计算运费
				accountYunFei();
				getYunIntro();

				$("#yunmethod").change(function(){
					accountYunFei();
					getYunIntro();
				});
				
			}else{
				$("#yunmethod").html("<option value=''>该区域没有可选的配送方法</option>");
				$("#tr_yunfei").hide();
				$("#tr_yunintro").hide();
				$().setBg();
			}
		}
	});
}


function accountYunFei(){

	var yunid=$("#yunmethod")[0].value;
	var tweight=$("#tweight")[0].value;
	var tjine=$("#tjine")[0].value;

	$.ajax({
		type: "POST",
		url:PDV_RP+"shop/post.php",
		data: "act=accountyunfei&yunid="+yunid+"&tjine="+tjine+"&tweight="+tweight,
		success: function(msg){
			eval(msg);
			$("#span_yunfei").html(J.Y);
			$("#span_baofei").html(J.B);
			
			//计算订单总价
			var ordertotal=adv_format(Number($("input#tjine")[0].value)+Number(J.Y)+Number(J.B),2);
			$("#ordertotal").html(ordertotal);
		}
	});
}

function getYunIntro(){
	var yunid=$("#yunmethod")[0].value;
	
	$.ajax({
		type: "POST",
		url:PDV_RP+"shop/post.php",
		data: "act=getyunintro&yunid="+yunid,
		success: function(msg){
			if(msg!=""){
				$("div#yunintro_text").html(msg);
				$("#tr_yunintro").show();
				$().setBg();
				$("#yunintro_close").click(function(){
					$("#tr_yunintro").hide();
					$().setBg();
				});
			}else{
				$("div#yunintro_text").html('');
				$("#tr_yunintro").hide();
				$().setBg();
			}

		}
	});

}


//获取支付说明
function getPaymethodIntro(){
	var payid=$("#payid")[0].value;
	if(payid=="0"){
		$.ajax({
			type: "POST",
			url:PDV_RP+"shop/post.php",
			data: "act=getmemberaccount",
			success: function(msg){
				if(msg=="0"){
					$("#payintro_text").html("您尚未登录");
				}else{
					var ordertotal=$("span#ordertotal").html();
					if(Number(ordertotal)>Number(msg)){
						$("#payintro_text").html("您的会员帐户余额：<span id='memberaccount'>"+msg+"</span> 元，会员帐户余额不足<br />您可以先提交保存订单，充值后再为订单付款，或选用其他支付方式");
					}else{
						$("#payintro_text").html("您的会员帐户余额：<span id='memberaccount'>"+msg+"</span> 元，您可以提交订单并从会员帐户扣款支付订单");
					}
				}
				$().setBg();
			}
		});
	}else{
		$.ajax({
			type: "POST",
			url:PDV_RP+"shop/post.php",
			data: "act=getpaymethodintro&payid="+payid,
			success: function(msg){
				$("#payintro_text").html(msg);
				$().setBg();
			}

		});
	}
}

//判断是否登录分别处理
$(document).ready(function(){
	
	$.ajax({
		type: "POST",
		url:PDV_RP+"post.php",
		data: "act=isLogin",
		success: function(msg){
			if(msg=="1"){
				$("div#notLogin").hide();
				$("div#isLogin").show();
				$("span#username").html(getCookie("MUSER"));

				//获取历史资料
				$.ajax({
					type: "POST",
					url:PDV_RP+"shop/post.php",
					data: "act=getmemberinfo",
					success: function(msg){
						eval(msg);
						$("#name")[0].value=M.N;
						$("#tel")[0].value=M.T;
						$("#mobi")[0].value=M.M;
						$("#email")[0].value=M.E;
						$("#qq")[0].value=M.Q;

						$("#s_name")[0].value=M.SN;
						$("#s_tel")[0].value=M.ST;
						$("#s_mobi")[0].value=M.SM;
						$("#s_addr")[0].value=M.SA;
						$("#s_postcode")[0].value=M.SP;
						$("#s_qq")[0].value=M.SQ;
						$("#zoneid")[0].value=M.SZ;
						
						//有二级区域的情况
						if(M.SZP!="0" && M.SZP!=""){
							$("#yunzone").attr("value",M.SZP);
							$.ajax({
								type: "POST",
								url:PDV_RP+"shop/post.php",
								data: "act=getyunzone&pid="+M.SZP,
								success: function(msg){
									$("#subzone").html(msg).show();
									$("#subzone").attr("value",M.SZ);
									$("#tr_yunmethod").show();
									$("#tr_yunfei").show();
									getYunMethod(M.SZ,M.SYU);
									$("#subzone").change(function(){
										$("#zoneid")[0].value=$("#subzone")[0].value;
										getYunMethod($("#subzone")[0].value,"");
									});
									$().setBg();
								}
							});
						}

						//没有二级区域的情况
						if(M.SZP=="0"){
							$("#yunzone").attr("value",M.SZ);
							$("#subzone").hide();
							$("#tr_yunmethod").show();
							$("#tr_yunfei").show();
							getYunMethod(M.SZ,M.SYU);
							$().setBg();
						}

					}
				});
				$().setBg();
			}else{
				var nomemberorder=$("#noMemberOrder")[0].value;
				if(nomemberorder=="1"){
					$("div#isLogin").hide();
					$("div#notLogin").show();
					$('.loginlink').click(function() { 
						$().orderMemberLogin(1);
					});
					$().setBg();
				}else{
					$("div#isLogin").hide();
					$("div#notLogin").hide();
					$().orderMemberLogin(0);
				}
			}
		}
	});
});


//会员退出
$(document).ready(function(){
	
	$('.logoutlink').click(function(){ 
		
		$.ajax({
			type: "POST",
			url: PDV_RP+"post.php",
			data: "act=memberlogout",
			success: function(msg){
				if(msg=="OK"){
					window.location='startorder.php';
				}else{
					alert(msg);
				}
			}
		});
	

   }); 
});



//提交订单

$(document).ready(function(){
	$('#OrderForm').submit(function(){ 
		
		if($("#tjine")[0].value=="" || Number($("#tjine")[0].value)<0){
			alert("您的购物车中没有商品或商品金额错误，不能提交订单");
			return false;
		}
		

		if($("#name")[0].value==""){
			alert("请填写订购人姓名");
			return false;
		}

		if($("#tel")[0].value==""){
			alert("请填写订购人联系电话");
			return false;
		}

		if($("#email")[0].value==""){
			alert("请填写订购人电子邮箱");
			return false;
		}else{
			var patrn=/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/;
			if(!patrn.exec($("#email")[0].value)){
				alert("请填写正确的电子邮箱地址");
				return false;
			}
		}

		if($("#yunzone")[0].value=="0" || $("#yunzone")[0].value==""){
			alert("请选择配送区域");
			return false;
		}

		if($("#zoneid")[0].value=="0"){
			alert("请选择配送区域");
			return false;
		}

		if($("#yunmethod")[0].value=="0" || $("#yunmethod")[0].value==""){
			alert("您选择的配送区域没有可选的配送方法，请联系管理员");
			return false;
		}

		if($("#s_addr")[0].value==""){
			alert("请填写详细地址");
			return false;
		}

		if($("#s_postcode")[0].value==""){
			alert("请填写邮政编码");
			return false;
		}

		if($("#s_tel")[0].value==""){
			alert("请填写收货人联系电话");
			return false;
		}

		if($("#s_name")[0].value==""){
			alert("请填写收货人姓名");
			return false;
		}

		if($("#payid")[0].value==""){
			alert("请选择付款方式");
			return false;
		}



		$('#OrderForm').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg.substr(0,2)=="OK"){
					
					//清除cookie
					$.ajax({
						type: "POST",
						url:PDV_RP+"post.php",
						data: "act=setcookie&cookietype=empty&cookiename=SHOPCART",
						success: function(msg){
						}
					});

					$('div#notice').hide();
					
					//判断是否支付
					if(msg.substr(3,5)=="PAYED"){
						var orderid=msg.substr(9);
						$().alertwindow("订单提交并付款成功","orderdetail.php?orderid="+orderid);
					}else{
						var orderid=msg.substr(3);
						window.location="orderpay.php?orderid="+orderid;
					}

				}else if(msg=="1000"){
					$('div#notice').hide();
					alert("您的购物车中没有商品");
				}else if(msg=="1001"){
					$('div#notice').hide();
					alert("请选择配送区域");
				}else if(msg=="1002"){
					$('div#notice').hide();
					alert("请选择支付方法");
				}else if(msg=="1003"){
					$('div#notice').hide();
					alert("您尚未登录，不能从会员帐户扣款支付订单");
				}else if(msg=="1004"){
					$('div#notice').hide();
					alert("请选择配送方法");
				}else if(msg=="1005"){
					$('div#notice').hide();
					alert("您尚未登录，不能提交订单");
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




//浮点计算
function adv_format(value,num) {
	var a_str = formatnumber(value,num);
	var a_int = parseFloat(a_str);
	if (value.toString().length>a_str.length)
	{
	var b_str = value.toString().substring(a_str.length,a_str.length+1)
	var b_int = parseFloat(b_str);
	if (b_int<5)
	{
	return a_str
	}
	else
	{
	var bonus_str,bonus_int;
	if (num==0)
	{
	bonus_int = 1;
	}
	else
	{
	bonus_str = "0."
	for (var i=1; i<num; i++)
	bonus_str+="0";
	bonus_str+="1";
	bonus_int = parseFloat(bonus_str);
	}
	a_str = formatnumber(a_int + bonus_int, num)
	}
	}
	return a_str
	}

	function formatnumber(value,num) //直接去尾
	{
	var a,b,c,i
	a = value.toString();
	b = a.indexOf('.');
	c = a.length;
	if (num==0)
	{
	if (b!=-1)
	a = a.substring(0,b);
	}
	else
	{
	if (b==-1)
	{
	a = a + ".";
	for (i=1;i<=num;i++)
	a = a + "0";
	}
	else
	{
	a = a.substring(0,b+num+1);
	for (i=c;i<=b+num;i++)
	a = a + "0";
	}
	}
	return a
}



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
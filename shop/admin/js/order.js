
//订单管理
$(document).ready(function(){
	
	//完成确认
	$("img.orderok").each(function(){
		var oldsrc=$(this)[0].src;
		var imgname=oldsrc.substr((oldsrc.length-6),2);
		if(imgname=="ok"){
			$(this).css({cursor:"default"});
		}
	});

	$("img.orderok").mouseover(function(){
		var oldsrc=$(this)[0].src;
		var imgname=oldsrc.substr((oldsrc.length-6),2);
		if(imgname=="no"){
			$(this)[0].src="images/modi.png";
			$(this).mouseout(function(){
				$(this)[0].src=oldsrc;
				$(this).unbind('click');
			});
			$(this).bind('click',function(){
				var orderid=this.id.substr(8);

				$.ajax({
					type: "POST",
					url:"post.php",
					data: "act=orderok&orderid="+orderid,
					success: function(msg){
						if(msg=="OK"){
							$("#tr_"+orderid).remove();
						}else if(msg=="1000"){
							alert("订单不存在");
						}else if(msg=="1001"){
							alert("订单未付款，不能标注为完成状态");
						}else if(msg=="1002"){
							alert("订单未配送，不能标注为完成状态");
						}else if(msg=="1003"){
							alert("订单已退订，不能标注为完成状态");
						}else if(msg=="1004"){
							alert("订单中部分商品未配送，不能标注为完成状态");
						}else{
							alert(msg);
						}
						return false;
					}
				});
				
			});
		}
	});

	//配送管理

	$("img.orderyun").mouseover(function(){
		var oldsrc=$(this)[0].src;
		$(this)[0].src="images/modi.png";
		$(this).mouseout(function(){
			$(this)[0].src=oldsrc;
			$(this).unbind('click');
		});
		$(this).bind('click',function(){
			var orderid=this.id.substr(9);
			$('#frmWindow').remove();
			$("body").append("<div id='frmWindow'></div>");
			$('#frmWindow').append('<div class="topBar">订单配送管理<div class="pwClose"></div></div><div class="border"><iframe frameborder="0" scrolling="yes" src="order_yun.php?orderid='+orderid+'" class="Frm"></iframe></div>');
			$.blockUI({message:$('#frmWindow'),css:{width:'750px',top:'10px'}}); 
			$('.pwClose').click(function() { 
				$('#frmWindow').remove();
				window.location.reload();
			}); 
		});
	});


	//付款确认
	
	$("img.orderpay").mouseover(function(){
		var oldsrc=$(this)[0].src;
		var imgname=oldsrc.substr((oldsrc.length-6),2);
		if(imgname=="no"){
			$(this)[0].src="images/fukuan.png";
			var purl="order_pay.php";
			var poptext="订单付款";
		}else{
			$(this)[0].src="images/tuikuan.png";
			var purl="order_unpay.php";
			var poptext="订单退款";
		}
		$(this).mouseout(function(){
			$(this)[0].src=oldsrc;
			$(this).unbind('click');

		});

		$(this).bind('click',function(){
			var orderid=this.id.substr(9);
			
			$('#frmWindow').remove();
			$("body").append("<div id='frmWindow'></div>");
			$('#frmWindow').append('<div class="topBar">'+poptext+'<div class="pwClose"></div></div><div class="border"><iframe frameborder="0" scrolling="yes" src="'+purl+'?orderid='+orderid+'" class="Frm"></iframe></div>');
			$.blockUI({message:$('#frmWindow'),css:{width:'600px',top:'10px'}}); 
			$('.pwClose').click(function() { 
				$('#frmWindow').remove();
				window.location.reload();
			}); 
		});
	});


	//退订
	$(".ordertui").click(function(){
		var orderid=this.id.substr(9);
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=ordertui&orderid="+orderid,
			success: function(msg){
				if(msg=="OK"){
					$("#tr_"+orderid).remove();
				}else if(msg=="1000"){
					alert("订单不存在");
				}else if(msg=="1001"){
					alert("订单已付款，不能退订");
				}else if(msg=="1002"){
					alert("订单已配送，不能退订");
				}else if(msg=="1003"){
					alert("订单已完成，不能退订");
				}else if(msg=="1004"){
					alert("订单中部分商品已配送，不能退订");
				}else{
					alert(msg);
				}
			}
		});
	});
	

	//修改商品总价
	$("input.modiprice").mouseover(function(){
		var nowprice,oldprice,orderid;
		$(this)[0].className="modiprice_now";
		$(this).removeAttr("readonly");
		
		$(this).mouseout(function(){
			$(this)[0].className="modiprice";
			$(this).attr("readonly","readonly");
		});
		$(this).focus(function(){
			oldprice=$(this)[0].value;
		});
		$(this).blur(function(){
			nowprice=$(this)[0].value;
			$(this).unbind('blur');
			if(oldprice!=nowprice){
				orderid=this.id.substr(11);

				$.ajax({
					type: "POST",
					url:"post.php",
					data: "act=modigoodstotal&orderid="+orderid+"&nowprice="+nowprice,
					success: function(msg){
						if(msg.substr(0,2)=="OK"){
							var newtotal=msg.substr(3);
							$("td#paytotal_"+orderid).html(newtotal);

							$.blockUI({message: "商品总价和订单总金额已更新",css:{width: '200px',backgroundColor: '#fff',borderColor:'#999999'}}); 
							setTimeout('$.unblockUI();',500);
						
						}else if(msg=="1000"){
							alert("订单不存在");
						}else if(msg=="1001"){
							alert("订单已付款，不能修改订单中的商品价格");
						}else if(msg=="1002"){
							alert("订单已完成，不能修改订单中的商品价格");
						}else if(msg=="1003"){
							lert("订单已退订，不能修改订单中的商品价格");
						}else{
							alert(msg);
						}

						$("#goodstotal_"+orderid)[0].className="modiprice";
						$("#goodstotal_"+orderid).attr("readonly","readonly");
					}
				});
				
			}
		});


	});



	//修改运费
	$("input.modiyunfei").mouseover(function(){
		var nowprice,oldprice,orderid;
		$(this)[0].className="modiyunfei_now";
		$(this).removeAttr("readonly");
		
		$(this).mouseout(function(){
			$(this)[0].className="modiyunfei";
			$(this).attr("readonly","readonly");
		});
		$(this).focus(function(){
			oldprice=$(this)[0].value;
		});
		$(this).blur(function(){
			nowprice=$(this)[0].value;
			$(this).unbind('blur');
			if(oldprice!=nowprice){
				orderid=this.id.substr(7);

				$.ajax({
					type: "POST",
					url:"post.php",
					data: "act=modiyunfei&orderid="+orderid+"&nowprice="+nowprice,
					success: function(msg){
						if(msg.substr(0,2)=="OK"){
							var newtotal=msg.substr(3);
							$("td#paytotal_"+orderid).html(newtotal);

							$.blockUI({message: "运费和订单总金额已更新",css:{width: '200px',backgroundColor: '#fff',borderColor:'#999999'}}); 
							setTimeout('$.unblockUI();',500);
						
						}else if(msg=="1000"){
							alert("订单不存在");
						}else if(msg=="1001"){
							alert("订单已付款，不能修改运费");
						}else if(msg=="1002"){
							alert("订单已完成，不能修改运费");
						}else if(msg=="1003"){
							lert("订单已退订，不能修改运费");
						}else{
							alert(msg);
						}

						$("#yunfei_"+orderid)[0].className="modiyunfei";
						$("#yunfei_"+orderid).attr("readonly","readonly");
					}
				});
				
			}
		});


	});





});



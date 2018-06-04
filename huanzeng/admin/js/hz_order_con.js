
//订单管理
$(document).ready(function(){
	
	//送货管理
	$("img.orderyun").each(function(){
		var oldsrc=$(this)[0].src;
		var imgname=oldsrc.substr((oldsrc.length-6),2);
		if(imgname=="ok"){
			$(this).css({cursor:"default"});
		}
	});
	
	$("img.orderyun").mouseover(function(){
		var oldsrc=$(this)[0].src;
		var imgname=oldsrc.substr((oldsrc.length-6),2);
		if(imgname=="no"){
			$(this)[0].src="images/modi.png";
			
			$(this).bind('click',function(){
				var orderid=this.id.substr(9);
				var ifyun=confirm("确定标注为发货状态吗？");
				
				if(ifyun==true){
					$.ajax({
						type: "POST",
						url: "post.php",
						data: "act=orderyun&orderid="+orderid,
						success: function(msg){
							if(msg=="OK"){
								window.location="hz_order_con.php";
							}else{
								alert(msg);
							}
						}
					});
				}
			});
		}
			
		$(this).mouseout(function(){
			$(this)[0].src=oldsrc;
			$(this).unbind('click');
		});
		
	});


	//退订管理
	$("img.ordertui").each(function(){
		var yid=$(this)[0].id;
		var yid_arr=yid.split("_");
		if(yid_arr[2]=="1"){
			$(this).css({cursor:"default"});
		}
	});
	
	$("img.ordertui").mouseover(function(){
		var yid_arr=this.id.split("_");
		var orderid=yid_arr[1];
		var iftui=yid_arr[2];
	
		if(iftui==0){
			$(this).bind('click',function(){
				var iftui=confirm("确定要退订此订单吗？");
				if(iftui==true){
					$.ajax({
						type: "POST",
						url: "post.php",
						data: "act=ordertuiding&orderid="+orderid,
						success: function(msg){
							if(msg=="OK"){
								$("#tr_"+orderid).remove();
							}else if(msg=="1000"){
								alert("订单不存在");
							}else if(msg=="1001"){
								alert("订单已发货，不能退订");
							}else{
								alert(msg);
							}
						}
					});
				}
			});
		}
		$(this).mouseout(function(){
			$(this).unbind('click');
		});
	});
	

});



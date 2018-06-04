
//购物车和订购
$(document).ready(function(){
	
		$("#cartempty").click(function(){
			$.ajax({
				type: "POST",
				url:PDV_RP+"post.php",
				data: "act=setcookie&cookietype=empty&cookiename=HZCART",
				success: function(msg){
					if(msg=="OK"){
						window.location=PDV_RP+'huanzeng/cart.php';
					}
				}
			});
		});

		$(".cartdel").click(function(){
			
			var gid=this.id.substr(8);
			var fz=$("#fz_"+gid)[0].value;
			
			$.ajax({
				type: "POST",
				url:PDV_RP+"post.php",
				data: "act=setcookie&cookietype=del&cookiename=HZCART&gid="+gid+"&fz="+fz,
				success: function(msg){
					if(msg=="OK"){
						window.location=PDV_RP+'huanzeng/cart.php';
					}
				}
			});
		});
		
		
		$(".cartacc").change(function(){
			if($(this)[0].value=="" || parseInt($(this)[0].value)<1 || isNaN($(this)[0].value) || Math.ceil($(this)[0].value)!=parseInt($(this)[0].value)){
				$(this)[0].value="1";
			}
		});

		$(".cartmodi").click(function(){
			var gid=this.id.substr(9);
			var fz=$("#fz_"+gid)[0].value;
			var nums=$("#cartacc_"+gid)[0].value;

			//检查库存

			$.ajax({
				type: "POST",
				url:PDV_RP+"huanzeng/post.php",
				data: "act=chkkucun&gid="+gid+"&nums="+nums,
				success: function(msg){
					if(msg=="OK"){
						$.ajax({
							type: "POST",
							url:PDV_RP+"post.php",
							data: "act=setcookie&cookietype=modi&cookiename=HZCART&gid="+gid+"&nums="+nums+"&fz="+fz,
							success: function(msg){
								if(msg=="OK"){
									window.location=PDV_RP+'huanzeng/cart.php';
								}else if(msg=="1000"){
									alert("订购数量错误");
								}else{
									alert(msg);
									
								}
							}
						});

					}else if(msg=="1000"){
						alert("您还没有登录，不能兑换赠品");
					}else if(msg=="1001"){
						alert("对不起，您的积分不足以兑换此赠品");
					}else if(msg=="1002"){
						alert("该商品缺货");
					}else{
						alert(msg);
					}
				}
			});

		});



		$("#backtohz").click(function(){
			window.location=PDV_RP+'huanzeng/class/';
		});
});


//从订购按钮新增cookie
function addtocart(gid,nums,fz){
	
	//检查库存
	$.ajax({
		type: "POST",
		url:PDV_RP+"huanzeng/post.php",
		data: "act=chkkucun&gid="+gid+"&nums="+nums,
		success: function(msg){
			if(msg=="OK"){
				$.ajax({
					type: "POST",
					url:PDV_RP+"post.php",
					data: "act=setcookie&cookietype=add&cookiename=HZCART&gid="+gid+"&nums="+nums+"&fz=",
					success: function(msg){
						if(msg=="OK"){
							window.location=PDV_RP+'huanzeng/cart.php';
						}else if(msg=="1000"){
							alert("订购数量错误");
						}else{
							alert(msg);
						}
					}
				});
			}else if(msg=="1000"){
				alert("您还没有登录，不能兑换赠品");
			}else if(msg=="1001"){
				alert("对不起，您的积分不足以兑换此赠品");
			}else if(msg=="1002"){
				alert("该商品缺货");
			}else{
				alert(msg);
			}
		}
	});

}





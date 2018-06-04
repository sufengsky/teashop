
//版主管理
$(document).ready(function(){

		var commentid=$("input#commentid")[0].value;

		$.ajax({
			type: "POST",
			url:PDV_RP+"comment/post.php",
			data: "act=ifbanzhu&commentid="+commentid,
			success: function(msg){
				if(msg=="YES"){
					$(".banzhu").show();
					$().setBg();

					//推荐操作
					$("#banzhutj").click(function(){
						$.ajax({
							type: "POST",
							url:PDV_RP+"comment/post.php",
							data: "act=banzhutj&commentid="+commentid,
							success: function(msg){
								if(msg=="OK"){
									$().alertwindow("推荐成功","");
								}else{
									alert(msg);
								}
							}
						});
						
					});

					//删除操作
					$("#banzhudel").click(function(){
						$.ajax({
							type: "POST",
							url:PDV_RP+"comment/post.php",
							data: "act=banzhudel&commentid="+commentid,
							success: function(msg){
								if(msg=="OK"){
									$().alertwindow("删除成功","../class/");
								}else{
									alert(msg);
								}
							}
						});
						
					});


					//删除并扣分操作
					$("#banzhudelmincent").click(function(){
						$.ajax({
							type: "POST",
							url:PDV_RP+"comment/post.php",
							data: "act=banzhudel&koufen=yes&commentid="+commentid,
							success: function(msg){
								if(msg=="OK"){
									$().alertwindow("删除并扣分成功","../class/");
								}else{
									alert(msg);
								}
							}
						});
						
					});


					//回复删除操作
					$(".banzhudelback").click(function(){
						var backid=this.id.substr(14);
						$.ajax({
							type: "POST",
							url:PDV_RP+"comment/post.php",
							data: "act=banzhudel&commentid="+backid,
							success: function(msg){
								if(msg=="OK"){
									$("#commentback_"+backid).remove();
								}else{
									alert(msg);
								}
							}
						});
						
					});


					//回复删除扣分操作
					$(".banzhudelbackmincent").click(function(){
						var backid=this.id.substr(21);
						$.ajax({
							type: "POST",
							url:PDV_RP+"comment/post.php",
							data: "act=banzhudel&koufen=yes&commentid="+backid,
							success: function(msg){
								if(msg=="OK"){
									$("#commentback_"+backid).remove();
								}else{
									alert(msg);
								}
							}
						});
						
					});


				
				}else{
					$(".banzhu").hide();
				}
			}
		});

});
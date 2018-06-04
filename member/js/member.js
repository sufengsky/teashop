
//删除收藏
$(document).ready(function(){

	$('.delfav').click(function(){ 
		var favid=this.id.substr(4);
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=delfav&favid="+favid,
			success: function(msg){
				if(msg=="OK"){
					$("#tr_"+favid).remove();
					$().setBg();
				}else{
					alert(msg);
				}
			}
		});
   }); 

});


//删除好友
$(document).ready(function(){

	$('.delfri').click(function(){ 
		var nowid=this.id.substr(4);
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=delfri&nowid="+nowid,
			success: function(msg){
				if(msg=="OK"){
					$("#tr_"+nowid).remove();
					$().setBg();
				}else{
					alert(msg);
				}
			}
		});
   }); 

});


//删除点评
$(document).ready(function(){

	$('.delcomm').click(function(){ 
		var nowid=this.id.substr(4);

		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=delcomm&nowid="+nowid,
			success: function(msg){
				if(msg=="OK"){
					$("li#comli_"+nowid).remove();
					$().setBg();
				}else{
					alert(msg);
				}
			}
		});
   }); 

});

//删除短信
$(document).ready(function(){

	$('.delmsn').click(function(){ 
		var nowid=this.id.substr(4);

		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=delmsn&nowid="+nowid,
			success: function(msg){
				if(msg=="OK"){
					$("tr#tr_"+nowid).remove();
					$().setBg();
				}else{
					alert(msg);
				}
			}
		});
   }); 

});


//弹出式发送短信
$(document).ready(function(){

	$("div.send_msg").click(function(){
		
		var mid=this.id.substr(8);

		$.ajax({
			type: "POST",
			url:PDV_RP+"member/post.php",
			data: "act=loadmsg&mid="+mid+"&RP="+PDV_RP,
			success: function(msg){
				if(msg=="L0"){
					$().popLogin(0);
				}else{
					$('div#msnDialog').remove();
					$('html').append(msg);
					$.blockUI({message: $('div#msnDialog'),css:{width:'420px'}}); 
					$('.pwClose').click(function() { 
						$.unblockUI(); 
						$('div#msnDialog').remove();
					}); 

					$('#msnForm').submit(function(){ 

						$('#msnForm').ajaxSubmit({
							target: 'div#msnnotice',
							url: PDV_RP+'member/post.php',
							success: function(msg) {
								if(msg=="OK"){
									$('div#msnnotice').hide();
									$.unblockUI(); 
									$('div#msnDialog').remove();
									$().alertwindow("短信发送成功","");
								}else{
									$('div#msnnotice').show();
								}
							}
						}); 
						return false; 
					}); 
				
				}
			}
		});
	});
		
});

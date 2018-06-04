

//加为好友
$(document).ready(function(){

	$("div.user_add").click(function(){
		
		var fid=this.id.substr(8);

		$.ajax({
			type: "POST",
			url:PDV_RP+"member/post.php",
			data: "act=addfriends&fid="+fid,
			success: function(msg){
				if(msg=="L0"){
					$().popLogin(0);
				}else if(msg=="OK"){
					$().alertwindow("已经加为好友",PDV_RP+"member/member_friends.php");
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


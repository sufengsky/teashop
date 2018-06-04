<!--

//会员退出
$(document).ready(function(){
	
	$('#logout').click(function(){ 
		
		$.ajax({
			type: "POST",
			url: PDV_RP+"post.php",
			data: "act=memberlogout",
			success: function(msg){
				if(msg=="OK"){
					window.location=PDV_RP+'member/login.php';
				}else{
					alert(msg);
				}
			}
		});
	

   }); 
});



-->
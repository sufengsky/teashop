<!--

//会员登录
$(document).ready(function(){
	
	$('#memberLogin').submit(function(){ 

		$('#memberLogin').ajaxSubmit({
			target: 'div#notice',
			url: PDV_RP+'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice').hide();
					window.location=PDV_RP+'member/index.php';
				}else if(msg.substr(0,2)=="OK" && msg.substr(2,7)=="<script"){
					$('div#notice')[0].className="okdiv";
					$('div#notice').html(msg.substr(2)+"登录成功，稍候跳转到会员中心").show();
					$().setBg();
					setTimeout("window.location=PDV_RP+'member/index.php';",2000);
				}else{
					$('div#notice').show();
					$().setBg();
				}
			}
		}); 
       
		return false; 

   }); 
});





-->
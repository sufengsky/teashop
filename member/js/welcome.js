//页面加载时根据是否登录显示不同
$(document).ready(function(){
	$.ajax({
		type: "POST",
		url:PDV_RP+"post.php",
		data: "act=isLogin",
		success: function(msg){
			if(msg=="1"){
				$("div#loginorreg").hide();
				$("div#islogin").show();
			}else{
				$("div#islogin").hide();
				$("div#loginorreg").show();
			}
		}
	});
});
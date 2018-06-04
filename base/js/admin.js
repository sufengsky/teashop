<!--

//AJAX 管理登录
$(document).ready(function(){
	
	$('#adminLoginForm').submit(function(){ 

		$('#adminLoginForm').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice').hide();
					top.location='base/admin/index.php';
				}else{
					$('div#notice').show();
				}
			}
		}); 
       
		return false; 

   }); 
});


//刷新图形码
$(document).ready(function() {

	$("img#codeimg").click(function () { 
		$("img#codeimg")[0].src="codeimg.php?"+Math.round(Math.random()*1000000);
	 });
});



-->
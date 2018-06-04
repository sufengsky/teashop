
//会员表单校验

$(document).ready(function(){

	$('#user').focus(function(){ 
		$('#chkUser').remove();
		$('#user').after('<span id="chkUser" class="msgdiv">登录账号由5-20个英文字母或数字组成</span>');
	}); 
	
	$('#user').blur(function(){ 
		var p=$("#user")[0].value;
		var patrn=/^(\w){5,20}$/;
		if(!patrn.exec(p)){
			$('#chkUser').remove();
			$('#user').after('<span id="chkUser" class="errdiv">登录账号必须由5-20个英文字母或数字组成</span>');
		}else{

			$.ajax({
					type: "POST",
					url: PDV_RP+"member/post.php",
					data: "act=checkuser&user="+p,
					success: function(msg){
						
						if(msg=="1"){
							$('#chkUser').remove();
							$('#user').after('<span id="chkUser" class="rightdiv">该登录账号可以使用</span>');
						}else{
							$('#chkUser').remove();
							$('#user').after('<span id="chkUser" class="errdiv">该登录账号已经被使用，请更换一个</span>');
						}
					}
				
			 });
			
		}
	}); 


	$('#password').focus(function(){ 
		$('#chkPass').remove();
		$('#password').after('<span id="chkPass" class="msgdiv">登录密码由5-20个英文字母或数字组成</span>');
	}); 


	$('#password').blur(function(){ 
		var p=$("#password")[0].value;
		var patrn=/^(\w){5,20}$/;
		if(!patrn.exec(p)){
			$('#chkPass').remove();
			$('#password').after('<span id="chkPass" class="errdiv">登录密码必须由5-20个英文字母或数字组成</span>');
		}else{
			$('#chkPass').remove();
			$('#password').after('<span id="chkPass" class="rightdiv">该登录密码可以使用</span>');
		}
	}); 

	$('#repass').focus(function(){ 
		$('#chkRepass').remove();
		$('#repass').after('<span id="chkRepass" class="msgdiv">请重复输入和上面相同的密码</span>');
	}); 

	$('#repass').blur(function(){ 
		var p=$("#repass")[0].value;
		var w=$("#password")[0].value;
		var patrn=/^(\w){5,20}$/;
		if(!patrn.exec(p)){
			$('#chkRepass').remove();
			$('#repass').after('<span id="chkRepass" class="errdiv">登录密码必须由5-20个英文字母或数字组成</span>');
		}else if(p!=w){
			$('#chkRepass').remove();
			$('#repass').after('<span id="chkRepass" class="errdiv">两次输入的密码不一致，请输入和上面相同的密码</span>');
		}else{
			$('#chkRepass').remove();
			$('#repass').after('<span id="chkRepass" class="rightdiv">输入正确</span>');
		}
	}); 

	$('#email').focus(function(){ 
		$('#chkEmail').remove();
		$('#email').after('<span id="chkEmail" class="msgdiv">请输入正确的电子邮件</span>');
	}); 

	$('#email').blur(function(){ 
		var p=$("#email")[0].value;
		var patrn=/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/;
		if(!patrn.exec(p)){
			$('#chkEmail').remove();
			$('#email').after('<span id="chkEmail" class="errdiv">电子邮件格式不正确，请输入正确的电子邮件</span>');
		}else{
			$('#chkEmail').remove();
			$('#email').after('<span id="chkEmail" class="rightdiv">输入正确</span>');
		}
	}); 


	$('#ImgCode').focus(function(){ 
		$('#chkCode').remove();
		$('#getImgCode').after('<span id="chkCode" class="msgdiv">请输入和图片上一致的验证码</span>');
	}); 

	$('#ImgCode').blur(function(){
		var p=$("#ImgCode")[0].value;
		if(p==''){
			$('#chkCode').remove();
			$('#getImgCode').after('<span id="chkCode" class="errdiv">请输入和图片上一致的验证码</span>');
		}else{

			$.ajax({
					type: "POST",
					url: PDV_RP+"post.php",
					data: "act=imgcode&codenum="+p,
					success: function(msg){
						if(msg=="1"){
							$('#chkCode').remove();
							$('#getImgCode').after('<span id="chkCode" class="rightdiv">输入正确</span>');
						}else{
							$('#chkCode').remove();
							$('#getImgCode').after('<span id="chkCode" class="errdiv">请输入和图片上一致的验证码</span>');
						}
					}
				
			 });

		}
	}); 



	$('#pname').focus(function(){ 
		$('#chkPname').remove();
		$('#pname').after('<span id="chkPname" class="msgdiv">网名昵称可以是中文、英文或数字</span>');
	}); 

	$('#pname').blur(function(){
		var p=$("#pname")[0].value;
		if(p.length<1){
			$('#chkPname').remove();
			$('#pname').after('<span id="chkPname" class="errdiv">请输入网名昵称</span>');
		}else{
			$('#chkPname').remove();
			$('#pname').after('<span id="chkPname" class="rightdiv">输入正确</span>');
		}

	}); 


	$('#name').focus(function(){ 
		$('#chkName').remove();
		$('#name').after('<span id="chkName" class="msgdiv">请输入您的姓名</span>');
	}); 

	$('#name').blur(function(){
		var p=$("#name")[0].value;
		if(p.length<4){
			$('#chkName').remove();
			$('#name').after('<span id="chkName" class="errdiv">请输入您的姓名</span>');
		}else{
			$('#chkName').remove();
			$('#name').after('<span id="chkName" class="rightdiv">输入正确</span>');
		}

	}); 

	//公司
	$('#company').focus(function(){ 
		$('#chkCompany').remove();
		$('#company').after('<span id="chkCompany" class="msgdiv">请填写公司名称,个人用户请填姓名</span>');
	}); 

	$('#company').blur(function(){
		var p=$("#company")[0].value;
		if(p.length<2){
			$('#chkCompany').remove();
			$('#company').after('<span id="chkCompany" class="errdiv">请填写公司名称,个人用户请填姓名</span>');
		}else{
			$('#chkCompany').remove();
			$('#company').after('<span id="chkCompany" class="rightdiv">输入正确</span>');
		}

	}); 



	$('#tel').focus(function(){ 
		$('#chkTel').remove();
		$('#tel').after('<span id="chkTel" class="msgdiv">请输入固定电话号码，格式如：010-12345678</span>');
	}); 

	$('#tel').blur(function(){
		var p=$("#tel")[0].value;
		if(p==''){
			$('#chkTel').remove();
		}else{
			var patrn=/^[_.0-9a-z-]+-([0-9a-z][0-9a-z-])+[0-9]{4,8}$/;
			if(!patrn.exec(p)){
				$('#chkTel').remove();
				$('#tel').after('<span id="chkTel" class="errdiv">请输入正确的固定电话号码，格式如：010-12345678</span>');
			}else{
				$('#chkTel').remove();
				$('#tel').after('<span id="chkTel" class="rightdiv">输入正确</span>');
				
			}
		}

	}); 
	
	$('#mov').focus(function(){ 
		$('#chkMov').remove();
		$('#mov').after('<span id="chkMov" class="msgdiv">请输入手机号码，如：13912345678</span>');
	}); 

	$('#mov').blur(function(){
		var p=$("#mov")[0].value;
		if(p==''){
			$('#chkMov').remove();
		}else if(p.length<10){
			$('#chkMov').remove();
			$('#mov').after('<span id="chkMov" class="errdiv">请输入正确的手机号码，如：13912345678</span>');
		}else{
			$('#chkMov').remove();
			$('#mov').after('<span id="chkMov" class="rightdiv">输入正确</span>');
		}

	}); 
  
});



//会员资料修改表单提交
$(document).ready(function(){
	
	$('#memberModify').submit(function(){ 
		$('#memberModify').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice')[0].className='okdiv';
					$('div#notice').html("修改成功");
					$('div#notice').show();
					if($("#act")[0].value=="memberperson"){
						$("img#nowfacepic")[0].src=PDV_RP+"member/face/loading.gif";
						$.ajax({
								type: "POST",
								url: PDV_RP+"member/post.php",
								data: "act=loadface",
								success: function(msg){
									$("input#nowface")[0].value=msg;
									$("img#nowfacepic")[0].src=PDV_RP+"member/face/"+msg+".gif";
								}
							
						 });
					}
					$().setBg();

				}else{
					$('div#notice')[0].className='noticediv';
					$('div#notice').show();
					$().setBg();
					
				}
			}
		}); 
       return false; 

   }); 
});


//头像设置
$(document).ready(function(){
	$(".selface").click(function(){
		$("input#nowface")[0].value=this.id.substr(8);
		$("img#nowfacepic")[0].src=this.src;
	});
});





//反馈表单提交
$(document).ready(function(){
	$('#jobform').submit(function(){ 
		$('#jobform').ajaxSubmit({
			target: 'div#notice',
			url: PDV_RP+'job/post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice').hide();
					$().alertwindow("您的应聘申请已经提交","");
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



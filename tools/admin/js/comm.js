


//图片投票系统之图片管理全选
$(document).ready(function() {
	$("#photoPollSelAll").click(function(){

		var getObj = $('.photopollcheckbox');
		getObj.each(function(id) {
			if($("#photoPollSelAll")[0].checked==true){
				this.checked=true;
			}else{
				this.checked=false;
			}
		});
		
	
	});
});



//QQ客服系统之QQ管理全选
$(document).ready(function() {
	$("#qqSelAll").click(function(){

		var getObj = $('.qqcheckbox');
		getObj.each(function(id) {
			if($("#qqSelAll")[0].checked==true){
				this.checked=true;
			}else{
				this.checked=false;
			}
		});
		
	
	});
});


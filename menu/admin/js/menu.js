

$(document).ready(function() {
	
	var getObj = $('select.selcoltype');

	getObj.each(function(id) {
		var obj = this.id;
	    switch(this.value){
			case "1" :
				$("input#folder_"+obj)[0].style.display='inline';
				$("input#url_"+obj)[0].style.display='none';
			break;
			case "2" :
				$("input#folder_"+obj)[0].style.display='none';
				$("input#url_"+obj)[0].style.display='inline';
			break;
			default :
				$("input#folder_"+obj)[0].style.display='none';
				$("input#url_"+obj)[0].style.display='none';
			break;
		}
			
		
		$("select#"+obj).change(function() {
			
			switch(this.value){
				case "1" :
					$("input#folder_"+obj)[0].style.display='inline';
					$("input#url_"+obj)[0].style.display='none';
				break;
				case "2" :
					$("input#folder_"+obj)[0].style.display='none';
					$("input#url_"+obj)[0].style.display='inline';
				break;
				default :
					$("input#folder_"+obj)[0].style.display='none';
					$("input#url_"+obj)[0].style.display='none';
				break;

			}
			
		});
		
	});


	//隐藏没有二级菜单的箭头

	var getArrimg = $('img.arrimg');
	getArrimg.each(function(id) {
		if($("#s_"+this.id.substr(4)).html()==""){
			$(this).hide();
		}

	});


	//显示隐藏二级菜单
	$(".arrimg").toggle(function(){
			$("#s_"+this.id.substr(4)).hide();
			$(this)[0].src="images/arrowdown.gif";
		},function(){
			$("#s_"+this.id.substr(4)).show();
			$(this)[0].src="images/arrowup.gif";
		});

});



function submitMenu(id){
	if($("#"+id)[0].menu.value.length<1){
		alert("请输入菜单名称");
		return false;
	}
	
	if($("#"+id)[0].folder.value.length<1 && $("#"+id)[0].selcoltype.value=='1'){
		alert("请输入内部网址，格式如：news/class/");
		return false;
	}
	
	if(($("#"+id)[0].url.value.length<1 || $("#"+id)[0].url.value=='http://' || $("#"+id)[0].url.value.substr(0,7)!='http://') && $("#"+id)[0].selcoltype.value=='2'){
		alert("请输入外部网址，格式如：http://www.abc.com/");
		return false;
	}

	$("#"+id)[0].submit();
	
}





//添加分组
$(document).ready(function(){
	$('#addgroup').submit(function(){ 
		$('#addgroup').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$("div#notice").hide();
					parent.$().getMenuGroup();
				}else{
					$("div#notice").hide();
					alert(msg);
				}
				
			}
		}); 
       return false; 

   }); 
});


//删除分组
$(document).ready(function(){
	
		$('#delgroup').submit(function(){ 
			
			qus=confirm("确定要删除当前菜单组吗?")
			if(qus==0){
				return false; 
			}

			$('#delgroup').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					if(msg=="OK"){
						$("div#notice").hide();
						parent.$().getMenuGroup();
						self.location='menu.php';
					}else{
						$("div#notice").hide();
						alert(msg);
					}
					
				}
			}); 
		   return false; 
			
	   });
   
});

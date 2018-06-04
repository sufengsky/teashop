
//添加分组表单提交
$(document).ready(function(){
	
	$('#addGroupForm').submit(function(){

		$('#addGroupForm').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice').hide();
					
					$.ajax({
						type: "POST",
						url: "../../post.php",
						data: "act=plusenter",
						success: function(msg){
							if(msg=="OK"){
								var projpath="../"+$("#newfolder")[0].value;
								$().alertwindow("网页分组添加成功,按确定进入排版模式,对本组网页进行排版",projpath);
							}else{
								self.location='group.php';
							}
						}
					});

				}else{
					$('div#notice').hide();
					$().alertwindow(msg,"");
				}
			}
		}); 
		
       return false; 

   }); 
});

//切换到分组排版
$(document).ready(function() {
	
	$(".pdv_enter").click(function () { 
		
		var folder=this.id.substr(3);
		
		$.ajax({
			type: "POST",
			url: "../../post.php",
			data: "act=plusenter",
			success: function(msg){
				if(msg=="OK"){
					self.location="../"+folder;
				}else{
					alert("当前管理账户没有排版权限");
					return false;
				}
			}
		});
		
	 });
	
});


//添加网页校验
$(document).ready(function(){

	$("#addselmodle").change(function(){
		if($("#addselmodle")[0].value=="1"){
			$("#tr_fold").show();
		}else{
			$("#tr_fold").hide();
			$("#pagefolder")[0].value="";

		}
	});

	
	$('#addPageForm').submit(function(){

		if($("#addselmodle")[0].value=="1"){

			if($("#pagefolder")[0].value==""){
				alert("采用独立自定义排版时，需要创建一个网页文件，请输入文件名称");
				return false;
			}

			if($("#pagefolder")[0].value.length<1 || $("#pagefolder")[0].value.length>16){
				alert("网页文件名称必须是1-16位英文字母或数字");
				return false;
			}

			var patrn=/^[a-zA-Z0-9][a-zA-Z0-9]{0,15}$/;
			if(!patrn.exec($("#pagefolder")[0].value)){
				alert("网页文件名称必须是1-16位英文字母或数字");
				return false;
			}
			
		}

		if($("#title")[0].value==""){
			alert("请输入网页标题");
			return false;
		}
		
   }); 
});


//修改网页校验
$(document).ready(function(){

	$("#modiselmodle").change(function(){
		if($("#modiselmodle")[0].value=="1"){
			$("#tr_fold").show();
		}else{
			var qus=confirm("将独立排版的网页改为共享排版，该网页原来的排版将被删除(建议保留独立排版)。确定要这样做吗？");
			if(qus){
				$("#tr_fold").hide();
				$("#pagefolder")[0].value="";
			}else{
				$("#modiselmodle").attr("value",'1');
			}
		}
	});
	
	$('#modiPageForm').submit(function(){

		if($("#title")[0].value==""){
			alert("请输入网页标题");
			return false;
		}

		if($("#modiselmodle")[0].value=="1"){

			if($("#pagefolder")[0].value==""){
				alert("采用独立自定义排版时，需要创建一个网页文件，请输入文件名称");
				return false;
			}
		
			if($("#pagefolder")[0].value.length<1 || $("#pagefolder")[0].value.length>16){
				alert("网页文件名称必须是1-16位英文字母或数字");
				return false;
			}

			var patrn=/^[a-zA-Z0-9][a-zA-Z0-9]{0,15}$/;
			if(!patrn.exec($("#pagefolder")[0].value)){
				alert("网页文件名称必须是1-16位英文字母或数字");
				return false;
			}

		}
		

		if($("#pagefolder")[0].value!=$("#old_pagefolder")[0].value && $("#groupid")[0].value!=$("#old_groupid")[0].value){
				alert("不可同时更改网页分组和排版方式(或网页文件)，请分次修改");
				return false;
		}


		
   }); 
});


$(document).ready(function(){

	$('#addsubbutton').click(function(id){
		 $.ajax({
			type: "POST",
			url: "../../base/admin/post.php",
			data: "act=pchkModule",
			success: function(msg){
			}
		});
	}); 
}); 


//图片预览
$(document).ready(function(){

	$('.preview').click(function(id){
		var src=$("input#previewsrc_"+this.id.substr(8))[0].value;
		if(src==""){
			return false;
		}
		$("body").append("<img id='pre' src='../../"+src+"'>");
		var w=$("#pre")[0].offsetWidth;
		var h=$("#pre")[0].offsetHeight;
		$.blockUI({  
            message: "<img  src='../../"+src+"' class='closeit'>",  
            css: {  
                top:  ($(window).height() - h) /2 + 'px', 
                left: ($(window).width() - w/2) /2 + 'px', 
                width: $("#pre")[0].offsetWidth + 'px',
				backgroundColor: '#fff',
				borderWidth:'3px',
				borderColor:'#fff'
            }  
        }); 
        $("#pre").remove();
		$(".closeit").click(function(){
			$.unblockUI(); 
		}); 

        setTimeout($.unblockUI, 2000); 
	}); 
}); 



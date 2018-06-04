




//图片修改表单提交
$(document).ready(function(){
	
	$('#PhotoPollForm').submit(function(){

			$('#PhotoPollForm').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					var arr=msg.split(".");
					if(arr[0]=="OK"){
						$('div#notice').hide();
						$().alertwindow("图片修改成功","photopoll_con.php?gid="+arr[1]);
						
					}else{
						$('div#notice').hide();
						$().alertwindow(msg,"");
					}
				}
			}); 
		
       return false; 

   }); 
});



//图片发布表单提交
$(document).ready(function(){
	
	$('#photopollAddForm').submit(function(){

		$('#photopollAddForm').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				var arr=msg.split(".");
				if(arr[0]=="OK"){
					$('div#notice').hide();
					$().alertwindow("图片发布成功","photopoll_con.php?gid="+arr[1]);
					
				}else{
					$('div#notice').hide();
					$().alertwindow(msg,"");
				}
			}
		}); 
		
       return false; 

   }); 
});





//分类表单
function catCheckform(theform){

  if(theform.cat.value.length < 1 || theform.cat.value=='请填写分类名称'){
    alert("请填写分类名称");
    theform.cat.focus();
    return false;
}  
	return true;

}

//弹出对话框
function Dpop(url,w,h){
	res = showModalDialog(url, null, 'dialogWidth: '+w+'px; dialogHeight: '+h+'px; center: yes; resizable: no; scroll: no; status: no;');
 	if(res=="ok"){window.location.reload();}
 
}





//详情图片尺寸处理
$(document).ready(function(){
	$("#picpriview").each(function(){
		if(this.offsetWidth>500){
			this.style.width="500px";
		}
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
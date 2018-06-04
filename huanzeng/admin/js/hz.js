
//赠品管理全选
$(document).ready(function() {
	$("#hzselall").click(function(){
		var getObj = $('.hzcheckbox');
		getObj.each(function(id) {
			if($("#hzselall")[0].checked==true){
				this.checked=true;
			}else{
				this.checked=false;
			}
		});
	
	});
});


//读取参数列
(function($){
	$.fn.getPropList = function(){
		
		$("div#proplist").empty();
		
		var catid=$("#selcatid")[0].value;
		var nowid=$("#nowid")[0].value;
		
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=proplist&catid="+catid+"&nowid="+nowid,
			success: function(msg){
				$("div#proplist").append(msg);
			}
		});
	};
})(jQuery);


//读取内容翻页码
(function($){
	$.fn.getProductPages = function(p){
		
		$("div#productpages").empty();
		
		var nowid=$("#nowid")[0].value;

		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=productpageslist&nowid="+nowid+"&pageinit="+p,
			success: function(msg){
				$("div#productpages").append(msg);
				
				var nowpagesid=$("input#productpagesid")[0].value;
				$("li#p_"+nowpagesid)[0].className='now';

				var getObj = $('li.pages');
				getObj.each(function(id) {
					var obj = this.id;
					
					$("li#"+obj).click(function() {
						
						var clickid=obj.substr(2);
						
						if(clickid==0){
							$(".productmodizone").show();
							$("input#adminsubmit").show();
							$(".savebutton").hide();
							$().getContent(0);
							$().getProductPages(0);
						}else{
							$(".productmodizone").hide();
							$("input#adminsubmit").hide();
							$(".savebutton").show();
							$().getContent(clickid);
							$().getProductPages(clickid);
						}
					});
				});

				//返回正常模式
				$("li#backtomodi").click(function() {

					$(".productmodizone").show();
					$("input#adminsubmit").show();
					$(".savebutton").hide();
					$().getContent(0);
					$().getProductPages(0);

				});
				
				//添加分页
				$("li#addpage").click(function(){


					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=addpage&nowid="+nowid,
						success: function(msg){
							$().getProductPages('new');
							$(".productmodizone").hide();
							$("input#adminsubmit").hide();
							$(".savebutton").show();
							$().getContent(-1);
						}
					});
				});

				//删除当前页
				$("li#pagedelete").click(function(){


					var delpagesid=$("input#productpagesid")[0].value;
					
					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=pagedelete&nowid="+nowid+"&delpagesid="+delpagesid,
						success: function(msg){
							if(msg=="0"){
								//分页全部删除时返回正常模式
								$(".productmodizone").show();
								$("input#adminsubmit").show();
								$(".savebutton").hide();
								$().getContent(0);
								$().getProductPages(0);
							}else{
								$(".productmodizone").hide();
								$("input#adminsubmit").hide();
								$(".savebutton").show();
								$().getContent(msg);
								$().getProductPages(msg);
							}
							
						}
					});
				});
			}
		});
	};

	
	

})(jQuery);


//读取组图
(function($){
	$.fn.getContent = function(productpageid){
		
		var nowid=$("#nowid")[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=getcontent&productpageid="+productpageid+"&nowid="+nowid,
			success: function(msg){
				
				if(msg!=""){
					
					$("#picpriview")[0].src="../../"+msg;
					$("#picpriview").show();
					$("#picpriview")[0].style.width="";
					$("#picpriview").load(function(){
						if($("#picpriview")[0].offsetWidth>500){
							$("#picpriview")[0].style.width="500px";
						}
					});
					
					
				}else{
					$("#picpriview").hide();
				}
			}
		});
	};
})(jQuery);


//选择分类时更新属性列
$(document).ready(function() {
		
		$("#selcatid").change(function(){
			$().getPropList();
		});


});


//赠品修改表单提交
$(document).ready(function(){
	
	$('#productForm').submit(function(){

		if($("#productpagesid")[0].value=="0"){
			
			//正常提交修改
			
			$("#act")[0].value="productmodify";

			$('#productForm').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					if(msg=="OK"){
						$('div#notice').hide();
						$().alertwindow("赠品修改成功","hz_con.php");
						
					}else{
						$('div#notice').hide();
						$().alertwindow(msg,"");
					}
				}
			}); 
		
		}else{
			
			//组图更新
			$("#act")[0].value="contentmodify";

			$('#productForm').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					if(msg=="OK"){
						$('div#notice').hide();
						var nowpagesid=$("input#productpagesid")[0].value;
						$().getContent(nowpagesid);
						
					}else{
						$('div#notice').hide();
						$().alertwindow(msg,"");
					}
				}
			}); 


		}
       return false; 

   }); 
});


//赠品发布表单提交
$(document).ready(function(){
	
	$('#productAddForm').submit(function(){

		$('#productAddForm').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice').hide();
					$().alertwindow("赠品发布成功","hz_con.php");
					
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
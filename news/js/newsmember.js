
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
				$().setBg();
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

//图片预览
$(document).ready(function(){


	$('.preview').click(function(id){

		var src=$("input#previewsrc_"+this.id.substr(8))[0].value;
		if(src==""){
			return false;
		}

		$("body").append("<img id='pre' src='"+src+"'>");
		var w=$("#pre")[0].offsetWidth;
		var h=$("#pre")[0].offsetHeight;
		
		$.blockUI({  
            message: "<img  src='"+src+"' class='closeit'>",  
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

//文章发布表单提交
$(document).ready(function(){
	$('#newsfabu').submit(function(){ 
		SelectAll('spe_selec[]', 'select[]');
		$('#newsfabu').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice').hide();
					$().alertwindow("发布成功","news_gl.php");
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

//文章修改表单提交
$(document).ready(function(){
	
	$('#newsModify').submit(function(){ 

		if($("#newspagesid")[0].value=="0"){
			
			//正常提交修改
			$("#act")[0].value="newsmodify";
			SelectAll('spe_selec[]', 'select[]');

			$('#newsModify').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					if(msg=="OK"){
						$('div#notice').hide();
						$().alertwindow("修改成功","news_gl.php");
					}else{
						$('div#notice')[0].className='noticediv';
						$('div#notice').show();
						$().setBg();
					}
				}
			}); 
		
		}else{
			
			//翻页内容只更新body
			$("#act")[0].value="contentmodify";

			$('#newsModify').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					
					if(msg=="OK"){
						$('div#notice').hide();
						$().alertwindow("分页内容已保存","");
						
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


//得到kedit当前模式
function disignMode(){

	var length=$("#KE_SOURCE")[0].src.length - 10;
	var image=$("#KE_SOURCE")[0].src.substr(length,10);
	if(image=="design.gif"){
		return 0;
	}
	return 1;
}


//读取内容翻页码
(function($){
	$.fn.getNewsPages = function(p){
		
		$("div#newspages").empty();
		
		var nowid=$("#nowid")[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=newspageslist&nowid="+nowid+"&pageinit="+p,
			success: function(msg){
				$("div#newspages").append(msg);
				
				var nowpagesid=$("input#newspagesid")[0].value;
				$("li#p_"+nowpagesid)[0].className='now';

				var getObj = $('li.pages');
				getObj.each(function(id) {
					var obj = this.id;
					
					$("li#"+obj).click(function() {
						
						//kedit源码模式禁止操作
						if(disignMode()==0){alert("只有在设计模式下才能进行分页操作");return false;}
						
						var clickid=obj.substr(2);
						
						if(clickid==0){
							$(".newsmodizone").show();
							$().getContent(0);
							$().getNewsPages(0);
						}else{
							$(".newsmodizone").hide();
							$().getContent(clickid);
							$().getNewsPages(clickid);
						}
					});
				});

				//返回正常模式
				$("li#backtomodi").click(function() {

					//kedit源码模式禁止操作
					if(disignMode()==0){alert("只有在设计模式下才能进行分页操作");return false;}

					$(".newsmodizone").show();
					$().getContent(0);
					$().getNewsPages(0);

				});
				
				//添加分页
				$("li#addpage").click(function(){

					//kedit源码模式禁止操作
					if(disignMode()==0){alert("只有在设计模式下才能进行分页操作");return false;}

					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=addpage&nowid="+nowid,
						success: function(msg){
							if(msg=="OK"){
								$().getNewsPages('new');
								$(".newsmodizone").hide();
								$().getContent(-1);
							}else{
								$().alertwindow(msg,"");
							}
						}
					});
				});

				//删除当前页
				$("li#pagedelete").click(function(){

					//kedit源码模式禁止操作
					if(disignMode()==0){alert("只有在设计模式下才能进行分页操作");return false;}

					var delpagesid=$("input#newspagesid")[0].value;
					
					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=pagedelete&nowid="+nowid+"&delpagesid="+delpagesid,
						success: function(msg){
							if(msg=="NORIGHTS"){
								$().alertwindow("无权操作","");
							}else if(msg=="0"){
								//分页全部删除时返回正常模式
								$(".newsmodizone").show();
								$().getContent(0);
								$().getNewsPages(0);
							}else{
								$(".newsmodizone").hide();
								$().getContent(msg);
								$().getNewsPages(msg);
							}
							
						}
					});
				});
			}
		});
	};

	
	

})(jQuery);

//读取详细内容

(function($){
	$.fn.getContent = function(newspageid){
		
		var nowid=$("#nowid")[0].value;
		var broweser = GetBrowser();
		if (broweser == 'IE') {
			var editzone = document.frames("KindEditorForm").document;
		} else {
			var editzone = document.getElementById('KindEditorForm').contentDocument;
		}		
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=getbody&newspageid="+newspageid+"&nowid="+nowid,
			success: function(msg){
				editzone.body.innerHTML=msg;
			}
		});
	};
})(jQuery);

//获取浏览器类型
function GetBrowser()
{
	var browser = '';
	var agentInfo = navigator.userAgent.toLowerCase();
	if (agentInfo.indexOf("msie") > -1) {
		var re = new RegExp("msie\\s?([\\d\\.]+)","ig");
		var arr = re.exec(agentInfo);
		if (parseInt(RegExp.$1) >= 5.5) {
			browser = 'IE';
		}
	} else if (agentInfo.indexOf("firefox") > -1) {
		browser = 'FF';
	} else if (agentInfo.indexOf("netscape") > -1) {
		var temp1 = agentInfo.split(' ');
		var temp2 = temp1[temp1.length-1].split('/');
		if (parseInt(temp2[1]) >= 7) {
			browser = 'NS';
		}
	} else if (agentInfo.indexOf("gecko") > -1) {
		browser = 'ML';
	} else if (agentInfo.indexOf("opera") > -1) {
		var temp1 = agentInfo.split(' ');
		var temp2 = temp1[0].split('/');
		if (parseInt(temp2[1]) >= 9) {
			browser = 'OPERA';
		}
	}
	return browser;
}


//添加分类
$(document).ready(function(){

	$('#addnewscat').click(function(){ 
		var newcat=$("#newcat")[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=addcat&newcat="+newcat,
			success: function(msg){
				if(msg=="0"){
					$().alertwindow("您的会员帐号没有自定义分类的权限","");
				}else{
					$("#newsmycat").append(msg);
					$().setBg();
				}
				

				$('.cat_modify').click(function(){ 
					var catid=this.id.substr(5);
					var cat=$("#cat_"+catid)[0].value;
					var xuhao=$("#catxuhao_"+catid)[0].value;
					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=modicat&catid="+catid+"&cat="+cat+"&xuhao="+xuhao,
						success: function(msg){
							if(msg=="OK"){
								self.location.reload();
							}else{
								alert(msg);
							}
						}
					});
			   }); 

				$('.cat_del').click(function(){ 
					var catid=this.id.substr(5);
					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=delcat&catid="+catid,
						success: function(msg){
							if(msg=="OK"){
								$("#tr_"+catid).remove();
								$().setBg();
							}else{
								alert(msg);
							}
						}
					});
			   }); 


			}
		});
   }); 

});


//修改分类
$(document).ready(function(){

	$('.cat_modify').click(function(){ 
		var catid=this.id.substr(5);
		var cat=$("#cat_"+catid)[0].value;
		var xuhao=$("#catxuhao_"+catid)[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=modicat&catid="+catid+"&cat="+cat+"&xuhao="+xuhao,
			success: function(msg){
				if(msg=="OK"){
					self.location.reload();
				}else{
					alert(msg);
				}
			}
		});
   }); 

});


//删除分类
$(document).ready(function(){

	$('.cat_del').click(function(){ 
		var catid=this.id.substr(5);
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=delcat&catid="+catid,
			success: function(msg){
				if(msg=="OK"){
					$("#tr_"+catid).remove();
					$().setBg();
				}else{
					alert(msg);
				}
			}
		});
   }); 

});
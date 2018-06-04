
//商品发布时获取会员价列表
$(document).ready(function(){
	$('input#newprice').blur(function(){
		var price=$("#newprice")[0].value;
		
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=goodsmemberprice&price="+price,
			success: function(msg){
				$("#tr_memberprice").remove();
				$("#tr_price").after(msg);
			}
		});

		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=getmarketprice&price="+price,
			success: function(msg){
				$("#price0")[0].value=msg;
			}
		});
	});
});


//修改商品时读取会员价
(function($){
	$.fn.getPriceList = function(){
		
		var gid=$("input#nowid")[0].value;
		var price=$("input#modiprice")[0].value;

		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=modimemberprice&gid="+gid+"&price="+price,
			success: function(msg){
				
				$("#tr_memberprice").remove();
				$("#tr_price").after(msg);
			}
		});
	};
})(jQuery);


//修改商品时，价格变动重新计算价格
$(document).ready(function(){

	$('input#modiprice').blur(function(){
		
		if($("input#modiprice")[0].value!=$("input#oldprice")[0].value){
		
			var price=$("input#modiprice")[0].value;
		
			$.ajax({
				type: "POST",
				url:"post.php",
				data: "act=goodsmemberprice&price="+price,
				success: function(msg){
					$("#tr_memberprice").remove();
					$("#tr_price").after(msg);
				}
			});

			$.ajax({
				type: "POST",
				url:"post.php",
				data: "act=getmarketprice&price="+price,
				success: function(msg){
					$("#price0")[0].value=msg;
				}
			});
		}
		
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


//读取分类关联的品牌
(function($){
	$.fn.getCatRelBrand = function(){
		var catid=$("#selcatid")[0].value;
		var nowid=$("#nowid")[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=getcatrelbrand&catid="+catid+"&nowid="+nowid,
			success: function(msg){
				$("select#brandid").html(msg);
			}
		});
	};
})(jQuery);



//读取内容翻页码
(function($){
	$.fn.getShopPages = function(p){
		
		$("div#shoppages").empty();
		
		var nowid=$("#nowid")[0].value;

		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=shoppageslist&nowid="+nowid+"&pageinit="+p,
			success: function(msg){
				$("div#shoppages").append(msg);
				
				var nowpagesid=$("input#shoppagesid")[0].value;
				$("li#p_"+nowpagesid)[0].className='now';

				var getObj = $('li.pages');
				getObj.each(function(id) {
					var obj = this.id;
					
					$("li#"+obj).click(function() {
						
						var clickid=obj.substr(2);
						
						if(clickid==0){
							$(".shopmodizone").show();
							$("input#adminsubmit").show();
							$(".savebutton").hide();
							$().getContent(0);
							$().getShopPages(0);
						}else{
							$(".shopmodizone").hide();
							$("input#adminsubmit").hide();
							$(".savebutton").show();
							$().getContent(clickid);
							$().getShopPages(clickid);
						}
					});
				});

				//返回正常模式
				$("li#backtomodi").click(function() {

					$(".shopmodizone").show();
					$("input#adminsubmit").show();
					$(".savebutton").hide();
					$().getContent(0);
					$().getShopPages(0);

				});
				
				//添加分页
				$("li#addpage").click(function(){


					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=addpage&nowid="+nowid,
						success: function(msg){
							$().getShopPages('new');
							$(".shopmodizone").hide();
							$("input#adminsubmit").hide();
							$(".savebutton").show();
							$().getContent(-1);
						}
					});
				});

				//删除当前页
				$("li#pagedelete").click(function(){


					var delpagesid=$("input#shoppagesid")[0].value;
					
					$.ajax({
						type: "POST",
						url:"post.php",
						data: "act=pagedelete&nowid="+nowid+"&delpagesid="+delpagesid,
						success: function(msg){
							if(msg=="0"){
								//分页全部删除时返回正常模式
								$(".shopmodizone").show();
								$("input#adminsubmit").show();
								$(".savebutton").hide();
								$().getContent(0);
								$().getShopPages(0);
							}else{
								$(".shopmodizone").hide();
								$("input#adminsubmit").hide();
								$(".savebutton").show();
								$().getContent(msg);
								$().getShopPages(msg);
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
	$.fn.getContent = function(shoppageid){
		
		var nowid=$("#nowid")[0].value;
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=getcontent&shoppageid="+shoppageid+"&nowid="+nowid,
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
			$().getCatRelBrand();
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

//商品修改时切换介绍和详细参数
$(document).ready(function() {

	$("#bt_intro").click(function(){
		
		if($("#text_type")[0].value=="canshu"){
			
			if(disignMode()==0){alert("只有在设计模式下才能进行切换操作");return false;}

			var broweser = GetBrowser();
			if (broweser == 'IE') {
				var editzone = document.frames("KindEditorForm").document;
			} else {
				var editzone = document.getElementById('KindEditorForm').contentDocument;
			}
			
			$("#text_canshu")[0].value=editzone.body.innerHTML;
			editzone.body.innerHTML=$("#text_body")[0].value;

			$("#bt_intro")[0].style.backgroundColor="#e8e8e8";
			$("#bt_canshu")[0].style.backgroundColor="#ffffff";
			$("#text_type")[0].value="body";
		}
	});

	$("#bt_canshu").click(function(){

		if($("#text_type")[0].value=="body"){

			if(disignMode()==0){alert("只有在设计模式下才能进行切换操作");return false;}

			var broweser = GetBrowser();
			if (broweser == 'IE') {
				var editzone = document.frames("KindEditorForm").document;
			} else {
				var editzone = document.getElementById('KindEditorForm').contentDocument;
			}
			$("#text_body")[0].value=editzone.body.innerHTML;
			editzone.body.innerHTML=$("#text_canshu")[0].value;

			$("#bt_canshu")[0].style.backgroundColor="#e8e8e8";
			$("#bt_intro")[0].style.backgroundColor="#ffffff";
			$("#text_type")[0].value="canshu";
		}
	});
	
});


//修改表单提交
$(document).ready(function(){
	
	$('#shopForm').submit(function(){


		if($("#shoppagesid")[0].value=="0"){
			
			//正常提交修改
			if(disignMode()==0){alert("提保存修改时,请将编辑器切换到设计模式");return false;}
			var broweser = GetBrowser();
			if (broweser == 'IE') {
				var editzone = document.frames("KindEditorForm").document;
			} else {
				var editzone = document.getElementById('KindEditorForm').contentDocument;
			}
			
			if($("#text_type")[0].value=="canshu"){
				$("#text_canshu")[0].value=editzone.body.innerHTML;
			}else{
				$("#text_body")[0].value=editzone.body.innerHTML;
			}
			
			$("#act")[0].value="shopmodify";

			$('#shopForm').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					if(msg=="OK"){
						$('div#notice').hide();
						$.blockUI({message: "商品修改已保存",css:{width: '200px',backgroundColor: '#fff',borderColor:'#999999'}}); 
						setTimeout('window.location="shop_con.php"',1000);
					}else{
						$('div#notice').hide();
						$().alertwindow(msg,"");
					}
				}
			}); 
		
		}else{
			
			//组图更新
			$("#act")[0].value="contentmodify";

			$('#shopForm').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					if(msg=="OK"){
						$('div#notice').hide();
						var nowpagesid=$("input#shoppagesid")[0].value;
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



//商品发布表单提交
$(document).ready(function(){
	
	$('#shopAddForm').submit(function(){
		
		$('#shopAddForm').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				if(msg=="OK"){
					$('div#notice').hide();
						$.blockUI({message: "商品发布成功",css:{width: '200px',backgroundColor: '#fff',borderColor:'#999999'}}); 
						setTimeout('window.location="shop_con.php"',1000);
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


//切换到分类排版
$(document).ready(function() {
	
	$(".pr_enter").click(function () { 
		var catid=this.id.substr(3);
		var url=$("#href_"+catid)[0].value;
		$.ajax({
			type: "POST",
			url: "../../post.php",
			data: "act=plusenter",
			success: function(msg){
				if(msg=="OK"){
					self.location=url;
				}else{
					alert("当前管理账户没有排版权限");
					return false;
				}
			}
		});
		
	 });

	
});


//开设分类专栏
$(document).ready(function() {
	
	$(".setchannel").click(function () { 
		obj=this.id;
		if($("#"+obj)[0].checked==true){
			qus=confirm("将商品分类设为专栏，将创建一个专栏目录及专栏首页，可以单独对专栏首页进行排版。确定将此分类设置为专栏吗？")
			if(qus!=0){
				var catid=obj.substr(11);
				$.ajax({
					type: "POST",
					url:"post.php",
					data: "act=addzl&catid="+catid,
					success: function(msg){
						if(msg=="OK"){
							$.ajax({
								type: "POST",
								url: "../../post.php",
								data: "act=plusenter",
								success: function(msg){
									if(msg=="OK"){
										var url="../class/"+catid+"/";
										$().alertwindow("商品分类专栏开设成功,按确定进入排版模式,对专栏主页进行排版",url);
									}else{
										alert("商品分类专栏开设成功,有排版权限的管理员可以对专栏主页进行排版");
										return false;
									}
								}
							});
							
						}else{
							alert(msg);
						}
					}
				});
				$("#"+obj)[0].checked=true;
			}else{
				$("#"+obj)[0].checked=false;
			}
		}else{
			qus=confirm("取消分类专栏，将删除专栏首页及其目录。确定取消专栏吗？")
			if(qus!=0){
				var catid=obj.substr(11);
				$.ajax({
					type: "POST",
					url:"post.php",
					data: "act=delzl&catid="+catid,
					success: function(msg){
						if(msg=="OK"){
							var url="../class/?"+catid+".html";
							var str="<a href='"+url+"' target='_blank'>http://.../shop/class/?"+catid+".html</a>";
							$("input#href_"+catid)[0].value=url;
							$("td#url_"+catid).html(str);
						}else{
							alert(msg);
						}
					}
				});
				$("#"+obj)[0].checked=false;
			}else{
				$("#"+obj)[0].checked=true;
			}
		}
	 });
	
});


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
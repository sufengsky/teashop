<!--

$(document).ready(function(){


	//获取更新列表
	$.ajax({
		type: "POST",
		url: "../../includes/update.php",
		data: "act=getUpdateList",
		success: function(msg){
			$("#noupdateed").html(msg);

			if($(".update_ok").size()>0){
				$(".update_ok").appendTo($("#updateed"));
				$("#updateed").show();
			}

			//if($(".update_no").size()==0){
				//$("#noupdateed").hide();
			//}

			$(".update_ok").toggle(function(){
				$(this).after($("#s"+this.id).show());
				$(this).children(".u_open")[0].className="u_close";
			},function(){
				$("#s"+this.id).hide();
				$(this).children(".u_close")[0].className="u_open";
			});

		
			$(".update_no").toggle(function(){
				$(this).after($("#s"+this.id).show());
				$(this).children(".u_open")[0].className="u_close";
			},function(){
				$("#s"+this.id).hide();
				$(this).children(".u_close")[0].className="u_open";
			});
			
				
			//安装更新
			$(".u_inst").click(function(){
				
				var r=this.id.substr(5);
				if($("#caninstall")[0].value!="1"){
					alert("由于升级包上传或安装错误导致升级不完整，文件系统版本早于已安装的数据库升级，继续安装升级将导致数据库错误，无法继续安装升级");
					return false;
				}
				$('#frmWindow').remove();
				$('body').append('<div id="frmWindow"><div class="topBar">升级服务验证<div class="pwClose"></div></div><div class="border"><div class="ntc">请输入软件授权用户帐号和密码，即您在软件官方网站的登录帐号和密码：</div><div class="ntc">授权用户：<input id="user" type="text" class="input" value="'+$('#phpwebUser')[0].value+'" /><br />授权密码：<input id="passwd" type="password" class="input" /><br /><input id="updatebutton" type="button" class="button" value="提交"></div></div></div>');
				$.blockUI({message:$('#frmWindow'),css:{width:'320px',top:'100px'}}); 

				$('.pwClose').click(function() { 
					$.unblockUI(); 
				});

				$("#updatebutton").click(function(){
					var user=$("#user")[0].value;
					var passwd=$("#passwd")[0].value;
					if(user=="" || passwd==""){
						alert("请输入软件授权用户名和密码");
						return false;
					}else{
						$.unblockUI(); 
						$.ajax({
							type: "POST",
							url: "../../includes/update.php",
							data: "act=installUpdate&r="+r+"&user="+user+"&passwd="+passwd,
							success: function(msg){
								if(msg=="OK"){
									window.location.reload();	
								}else{
									$(".update_err").remove();
									$("#noupdateed").prepend(msg);
								}
							}
						});

					}

				});

			});

			
		}
	});

		 


	


});




-->
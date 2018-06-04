<!--

$(document).ready(function(){
	

	//模版删除
	$(".tempdel").click(function(){
		var tempid=this.id.substr(4);
		delItem(tempid);
	});

	//添加模版
	$("#addtemp").click(function(){
		var pluslable=$("#addtemppluslable")[0].value;
		var cname=$("#addtempcname")[0].value;
		var tempname=$("#addtempname")[0].value;
		if(cname=="" || tempname==""){
			alert("请填写模版名称和模版文件名");
			return false;
		}

		$.ajax({
			type: "POST",
			url: "post.php",
			data: "act=tempadd&pluslable="+pluslable+"&cname="+cname+"&tempname="+tempname,
			success: function(msg){
					$("#plustemplist").append(msg);
					$(".tempdel").click(function(){
						var tempid=this.id.substr(4);
						delItem(tempid);
					});
			}
		});
	});


	//导出插件
	$(".plusoutput").click(function(){
		var pluslable=this.id.substr(3);
		window.location='plusoutput.php?pluslable='+pluslable;
	});


	//导入插件
	$('#plusInput').submit(function(){

		$('#plusInput').ajaxSubmit({
			target: 'div#notice',
			url: 'post.php',
			success: function(msg) {
				
				switch(msg){
					case "1001":
						alert("请选择正确的插件安装文件(plusIntall_*.dat)");
						return false;
					break;
					case "1002":
						alert("插件安装文件内容格式不正确");
						return false;
					break;
					case "1003":
						alert("您导入的插件记录已存在");
						return false;
					break;
					case "OK":
						alert("插件记录导入成功");
					break;
					default :
						alert(msg);
					break;



				}
				
			}
		}); 
		
       return false; 

   }); 



   //模块安装
   $("#getcolbutton").click(function(){

	   $.ajax({
			type: "POST",
			url: "post.php",
			data: "act=pchkModule",
			success: function(msg){
			}
		});
		
		$.ajax({
				type: "POST",
				url: "post.php",
				data: "act=getcollist",
				success: function(msg){
					if(msg.substr(1,6)=="option"){
						$("#getcolbutton").hide();
						$("#instcoltype").show().append(msg);
						$("#instbutton").show();
						$("#instbutton").click(function(){
							var icoltype=$("#instcoltype")[0].value;

							$('#frmWindow').remove();
							$('body').append('<div id="frmWindow"><div class="topBar">软件授权验证<div class="pwClose"></div></div><div class="border"><div class="ntc">请输入软件授权用户帐号和密码，即您在软件官方网站的登录帐号和密码：</div><div class="ntc">授权用户：<input id="user" type="text" class="input" value="'+$('#phpwebUser')[0].value+'" /><br />授权密码：<input id="passwd" type="password" class="input" /><br /><input id="authcoltype" type="hidden" value="'+icoltype+'" /><br /><input id="authbutton" type="button" class="button" value="提交"></div></div></div>');
							$.blockUI({message:$('#frmWindow'),css:{width:'320px',top:'100px'}}); 

							$('.pwClose').click(function() { 
								$.unblockUI(); 
							});
							$("#authbutton").click(function(){
								var user=$("#user")[0].value;
								var passwd=$("#passwd")[0].value;
								if(user=="" || passwd==""){
									alert("请输入软件授权用户名和密码");
									return false;
								}else{
									$.unblockUI(); 
									$.ajax({
										type: "POST",
										url: "post.php",
										data: "act=colinstall&coltype="+icoltype+"&user="+user+"&passwd="+passwd,
										success: function(msg){
											if(msg=="OK"){
												alert("模块安装成功，请刷新管理系统窗口！如果有打开的排版窗口，请关闭并在登录后重新进入排版模式");
												window.top.location="index.php";
											}else if(msg=="1000"){
												alert("缺少模块代码");
											}else if(msg=="1005"){
												alert("软件授权校验无法连接远程服务器");
											}else if(msg=="1006"){
												alert("授权用户名或密码错误，软件授权校验未通过");
											}else if(msg=="1007"){
												alert("软件授权校验未通过,可能是因为您尚未订购该模块");
											}else if(msg=="1001"){
												alert("模块已存在，不能重复安装");
											}else if(msg=="1002"){
												alert("模块安装数据文件不存在，请检查模块是否上传");
											}else if(msg=="1003"){
												alert("模块安装数据文件格式错误");
											}else if(msg=="1009"){
												alert("模块版本高于当前系统版本，请先升级系统");
											}else{
												alert(msg);
											}
										}
									});
								}

							});
						});


					}else if(msg=="1000"){
						alert("不能连接到远程服务器");
					}else if(msg=="1002"){
						alert("没有查询到未安装的模块");
					}else{
						alert(msg);
					}
				}
			});
   });


   //模块卸载
   $(".uninstall").click(function(){

		var icoltype=this.id.substr(10);

	    $('#frmWindow').remove();
		$('body').append('<div id="frmWindow"><div class="topBar">软件授权验证<div class="pwClose"></div></div><div class="border"><div class="ntc">警告：模块卸载时将删除该模块的全部数据记录，不可恢复！即使您尚未输入任何数据，卸载模块再重新安装时需要对相关页面进行重新排版，非专业人员请慎用卸载功能！<br /><br />如果您确实要删除模块，请输入软件授权用户帐号和密码：</div><div class="ntc">授权用户：<input id="user" type="text" class="input" value="'+$('#phpwebUser')[0].value+'" /><br />授权密码：<input id="passwd" type="password" class="input" /><br /><br /><input id="authbutton" type="button" class="button" value="提交"></div></div></div>');
		$.blockUI({message:$('#frmWindow'),css:{width:'320px',top:'100px'}}); 

		$('.pwClose').click(function() { 
			$.unblockUI(); 
		});

		$("#authbutton").click(function(){
			var user=$("#user")[0].value;
			var passwd=$("#passwd")[0].value;
			if(user=="" || passwd==""){
				alert("请输入软件授权用户名和密码");
				return false;
			}else{
				
				$.ajax({
					type: "POST",
					url: "post.php",
					data: "act=coluninstallcheck&user="+user+"&passwd="+passwd,
					success: function(msg){
						if(msg=="OK"){
							$.ajax({
								type: "POST",
								url: "post.php",
								data: "act=uninstall&coltype="+icoltype,
								success: function(msg){
									if(msg=="OK"){
										if(icoltype=="member"){
											alert("会员模块是一个特殊关联模块,卸载仅删除后台菜单和相关管理权限,其他模块中和会员相关的插件和模板链接可能需要人工删除");
										}
										if(icoltype=="comment"){
											alert("点评模块是一个特殊关联模块,卸载仅删除后台菜单和相关管理权限,其他模块中和点评相关的插件和模板链接可能需要人工删除");
										}
										alert("模块已卸载，请刷新管理系统窗口！如果有打开的排版窗口，请关闭并在登录后重新进入排版模式");
										$.unblockUI(); 
										$("#tr_"+icoltype).remove();
										window.top.location="index.php";
									}else if(msg=="0000"){
										alert("缺少模块代码");
									}else if(msg=="1000"){
										alert("模块不存在");
									}else if(msg=="1001"){
										alert("该模块不可卸载");
									}else if(msg=="1002"){
										alert("数据卸载文件不存在");
									}else if(msg=="1003"){
										alert("数据卸载文件格式错误");
									}else{
										alert(msg);
									}
								}
							});


						}else if(msg=="1005"){
							alert("软件授权校验无法连接远程服务器");
						}else if(msg=="1006"){
							alert("授权用户名或密码错误，软件授权校验未通过");
						}else if(msg=="ERROR"){
							alert("软件授权校验失败，未获得远程服务器预期响应");
						}else{
							alert(msg);
						}
						$.unblockUI(); 
					}
				});
			}

		});
		



		
   });


	//删除边框
	$(".borderdel").click(function(){
		var tempid=this.id.substr(4);
		delBorder(tempid);
	});

	//添加边框
	$("#addborder").click(function(){
		var tempid=$("#bordertempid")[0].value;
		var tempname=$("#bordertempname")[0].value;
		var bordertype=$("#bordertype")[0].value;
		var borderselcolor=$("#borderselcolor")[0].value;
		var bordertname=$("#bordertype option[@selected]").text();

		if(tempid=="" || tempname==""){
			alert("请填写边框编号和边框描述");
			return false;
		}
		

		if(bordertype=="lable"){
			if(borderselcolor=="yes" && (tempid.substr(0,1)!="0" || tempid=="0" ||parseInt(tempid.substr(1))<51 || parseInt(tempid.substr(1))>99)){
				alert("可选颜色标签边框的可用编号范围是051-099,必须以0开头");
				return false;
			}
			if(borderselcolor=="no" && (parseInt(tempid)<201 || parseInt(tempid)>499)){
				alert("不可选颜色标签边框的可用编号范围是201-499");
				return false;
			}
		}


		if(bordertype=="border"){
			if(borderselcolor=="yes" && (tempid.substr(0,1)!="0" || tempid=="0" || parseInt(tempid.substr(1))<1 || parseInt(tempid.substr(1))>50)){
				alert("可选颜色插件边框的可用编号范围是001-050,必须以0开头");
				return false;
			}
			if(borderselcolor=="no" && (parseInt(tempid)<500 || parseInt(tempid)>999)){
				alert("不可选颜色插件边框的可用编号范围是500-999");
				return false;
			}
		}


		$.ajax({
			type: "POST",
			url: "post.php",
			data: "act=borderadd&tempid="+tempid+"&tempname="+tempname+"&bordertype="+bordertype,
			success: function(msg){
				if(msg=="1001"){
					alert("同样的边框编号已存在");
					return false;
				}else if(msg=="OK"){
					alert("边框添加成功");
					$("#borderlist").append("<tr id='tr_"+tempid+"'><td height='22'>"+bordertname+"</td><td height='22'>"+tempid+"</td><td>"+tempname+"</td><td width='60' ><img id='del_"+tempid+"' src='images/delete.png' class='borderdel' /> </td></tr>");
					$(".borderdel").click(function(){
						var tempid=this.id.substr(4);
						delBorder(tempid);
					});
				}else{
					alert(msg);
				}
				
			}
		});
	});



	function delItem(tempid){
		var qus=confirm("删除模版记录需要人工添加恢复!确定删除插件模版记录吗?")
		if(qus!=0){
			$.ajax({
				type: "POST",
				url: "post.php",
				data: "act=tempdel&tempid="+tempid,
				success: function(msg){
					if(msg=="OK"){
						$("#tr_"+tempid).remove();
					}else{
						alert(msg);
					}
					
				}
			});
		}
	}


	function delBorder(tempid){
		var qus=confirm("删除边框记录需要人工添加恢复!确定删除边框记录吗?")
		if(qus!=0){
			$.ajax({
				type: "POST",
				url: "post.php",
				data: "act=borderdel&tempid="+tempid,
				success: function(msg){
					if(msg=="OK"){
						$("#tr_"+tempid).remove();
					}else{
						alert(msg);
					}
					
				}
			});
		}
	}

});




-->
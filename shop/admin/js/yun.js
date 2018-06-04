

//配送地区
$(document).ready(function(){
	
	//增加一级区域
	$("#addYunZone").click(function(){
		
		var bigzoneid,newxuhao,newzone,nextxuhao;

		if($("input#newzone")[0].value=="" || $("input#newzone")[0].value=="请输入一级区域名称"){
			alert("请输入一级区域名称");
		}else{
			newxuhao=$("input#newxuhao")[0].value;
			newzone=$("input#newzone")[0].value;
			nextxuhao=parseInt(newxuhao)+1;
			$.ajax({
				type: "POST",
				url:"post.php",
				data: "act=addyunzone&zone="+newzone+"&xuhao="+newxuhao,
				success: function(msg){
					if(msg.substr(0,2)=="OK"){
						bigzoneid=msg.substr(3);
						$("div#bigcatall").append("<div class='bigcat' id='bigcat_"+bigzoneid+"'></div>");
						$("div#bigcat_"+bigzoneid).append("<input id='xuhao_"+bigzoneid+"' type='text' size='3' value='"+newxuhao+"' class='input' /> ");
						$("div#bigcat_"+bigzoneid).append("<input id='zone_"+bigzoneid+"' type='text'  size='39' value='"+newzone+"' class='input' /> ");
						$("div#bigcat_"+bigzoneid).append("<input type='button' class='button_zone_modify' id='topZoneModi_"+bigzoneid+"' value='修改' /> ");
						$("div#bigcat_"+bigzoneid).append("<input type='button' class='button_zone_del' id='topZoneDel_"+bigzoneid+"' value='删除' /> ");
						$("div#bigcat_"+bigzoneid).append("<input type='button' class='button_zone_open' id='topZoneOpen_"+bigzoneid+"' value='展开二级区域' /> ");

						$("input#newzone")[0].value="请输入一级区域名称";
						$("input#newxuhao")[0].value=nextxuhao;

						//修改新增加的一级区域
						$(".button_zone_modify").unbind().bind('click',function(){
							var modizoneid=this.id.substr(12);
							var modizone=$("#zone_"+modizoneid)[0].value;
							var modixuhao=$("#xuhao_"+modizoneid)[0].value;
							modiZone(modizoneid,modizone,modixuhao);
						});


						//删除新增加的一级区域
						$(".button_zone_del").unbind().bind('click',function(){
							var delzoneid=this.id.substr(11);
							delZoneDiv(delzoneid);
						});

						
						//展开/关闭二级区域
						$(".button_zone_open").unbind().bind('click',function(){
							var bigzoneid=this.id.substr(12);
							openSubZone(bigzoneid);
						});


					}else{
						alert(msg);
					}
				}
			});
		}
	});


	//修改一级区域
	$(".button_zone_modify").unbind().bind('click',function(){
		var modizoneid=this.id.substr(12);
		var modizone=$("#zone_"+modizoneid)[0].value;
		var modixuhao=$("#xuhao_"+modizoneid)[0].value;
		modiZone(modizoneid,modizone,modixuhao);
	});

	//删除一级区域
	$(".button_zone_del").unbind().bind('click',function(){
		var delzoneid=this.id.substr(11);
		delZoneDiv(delzoneid);
		
	});


	//展开/关闭二级区域
	$(".button_zone_open").unbind().bind('click',function(){
		var bigzoneid=this.id.substr(12);
		openSubZone(bigzoneid);
	});


});


function delZoneDiv(delzoneid){
	
	$.ajax({
		type: "POST",
		url:"post.php",
		data: "act=delyunzone&zoneid="+delzoneid,
		success: function(msg){
			if(msg=="OK"){
				$("#bigcat_"+delzoneid).remove();
			}else{
				alert(msg);
			}
		}
	});
}


function delSubZoneDiv(delsubzoneid){
	
	$.ajax({
		type: "POST",
		url:"post.php",
		data: "act=delsubzone&zoneid="+delsubzoneid,
		success: function(msg){
			if(msg=="OK"){
				$("#subcat_"+delsubzoneid).remove();
			}else{
				alert(msg);
			}
		}
	});
}



function modiZone(modizoneid,modizone,modixuhao){

		//序号填写非整数时处理
		if(modixuhao!=parseInt(modixuhao)){
			modixuhao=0;
			$("input#xuhao_"+modizoneid)[0].value='0';
		}
	
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=modiyunzone&zoneid="+modizoneid+"&zone="+modizone+"&xuhao="+modixuhao,
			success: function(msg){
				if(msg=="OK"){
					$("div#bigcat_"+modizoneid).prependTo($("#bigcatall"));
					$("div#bigcat_"+modizoneid).after($("#suball_"+modizoneid));

					$("div.bigcat").each(function(){
						if(this.id!='addnewcat'){
							var bxuhao=$("#xuhao_"+this.id.substr(7))[0].value;
							if(parseInt(modixuhao)>=parseInt(bxuhao)){
								$(this).after($("div#bigcat_"+modizoneid));
								$(this).after($("#suball_"+this.id.substr(7)));
								$("div#bigcat_"+modizoneid).after($("#suball_"+modizoneid));

							}
						}
					});
					$.blockUI({message: "修改已保存",css:{width: '200px',backgroundColor: '#fff',borderColor:'#999999'}}); 
					setTimeout('$.unblockUI()',300); 
				}else{
					alert(msg);
				}
			}
		});

}


function modiSubZone(modisubzoneid,modisubzone,modisubxuhao,bigzoneid){

		//序号填写非整数时处理
		if(modisubxuhao!=parseInt(modisubxuhao)){
			modisubxuhao=0;
			$("input#subxuhao_"+modisubzoneid)[0].value='0';
		}
	
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=modiyunzone&zoneid="+modisubzoneid+"&zone="+modisubzone+"&xuhao="+modisubxuhao,
			success: function(msg){
				if(msg=="OK"){
					$("div#subcat_"+modisubzoneid).prependTo($("#suball_"+bigzoneid));

					$("div.subcat").each(function(){
						if(this.id.substr(0,9)!='addsubcat'){
							var sxuhao=$("#subxuhao_"+this.id.substr(7))[0].value;
							if(parseInt(modisubxuhao)>=parseInt(sxuhao)){
								$(this).after($("div#subcat_"+modisubzoneid));
							}
						}
					});
					$.blockUI({message: "修改已保存",css:{width: '200px',backgroundColor: '#fff',borderColor:'#999999'}}); 
					setTimeout('$.unblockUI()',300); 
				}else{
					alert(msg);
				}
			}
		});

}


function openSubZone(bigzoneid){
		if($("#topZoneOpen_"+bigzoneid)[0].value=="展开二级区域"){
			$.ajax({
				type: "POST",
				url:"post.php",
				data: "act=opensubzone&pid="+bigzoneid,
				success: function(msg){
					if(msg!=""){
						$(".suball").each(function(){
							closeSubZone(this.id.substr(7));
						});
						$("#suball_"+bigzoneid).remove();
						$("#bigcat_"+bigzoneid).after("<div class='suball' id='suball_"+bigzoneid+"'></div>");
						$("#suball_"+bigzoneid).hide();
						$("#suball_"+bigzoneid).append(msg).animate({height: 'show',opacity: 'show'}, 'slow');
						$("#topZoneOpen_"+bigzoneid)[0].value="隐藏二级区域";

						//修改二级区域
						$(".button_subzone_modify").unbind().bind('click',function(){
							var modisubzoneid=this.id.substr(12);
							var modisubzone=$("#subzone_"+modisubzoneid)[0].value;
							var modisubxuhao=$("#subxuhao_"+modisubzoneid)[0].value;
							modiSubZone(modisubzoneid,modisubzone,modisubxuhao,bigzoneid);
						});

						//删除二级区域
						$(".button_subzone_del").unbind().bind('click',function(){
							var delsubzoneid=this.id.substr(11);
							delSubZoneDiv(delsubzoneid);
						});

						//添加二级区域
						$(".button_subzone_add").unbind().bind('click',function(){
							var newsubpid=this.id.substr(11);
							if($("input#newsubzone_"+newsubpid)[0].value=="" || $("input#newsubzone_"+newsubpid)[0].value=="请输入二级区域名称"){
								alert("请输入二级区域名称");
							}else{
								var newsubxuhao=$("input#newsubxuhao_"+newsubpid)[0].value;
								var newsubzone=$("input#newsubzone_"+newsubpid)[0].value;
								var nextsubxuhao=parseInt(newsubxuhao)+1;
								$.ajax({
									type: "POST",
									url:"post.php",
									data: "act=addsubzone&pid="+newsubpid+"&zone="+newsubzone+"&xuhao="+newsubxuhao,
									success: function(msg){
										if(msg.substr(0,2)=="OK"){
											var subzoneid=msg.substr(3);

											$("div#addsubcat_"+newsubpid).before("<div class='subcat' id='subcat_"+subzoneid+"'></div>");
											$("div#subcat_"+subzoneid).append("<input id='subxuhao_"+subzoneid+"' type='text' size='3' value='"+newsubxuhao+"' class='inputx' /> ");
											$("div#subcat_"+subzoneid).append("<input id='subzone_"+subzoneid+"' type='text'  size='28' value='"+newsubzone+"' class='inputx' /> ");
											$("div#subcat_"+subzoneid).append("<input type='button' class='button_subzone_modify' id='subZoneModi_"+subzoneid+"' value='修改' /> ");
											$("div#subcat_"+subzoneid).append("<input type='button' class='button_subzone_del' id='subZoneDel_"+subzoneid+"' value='删除' /> ");

											$("input#newsubzone_"+newsubpid)[0].value="请输入二级区域名称";
											$("input#newsubxuhao_"+newsubpid)[0].value=nextsubxuhao;

											//修改新增加的二级区域
											$(".button_subzone_modify").unbind().bind('click',function(){
												var modisubzoneid=this.id.substr(12);
												var modisubzone=$("#subzone_"+modisubzoneid)[0].value;
												var modisubxuhao=$("#subxuhao_"+modisubzoneid)[0].value;
												modiSubZone(modisubzoneid,modisubzone,modisubxuhao,newsubpid);
											});

											//删除新增加的二级区域
											$(".button_subzone_del").unbind().bind('click',function(){
												var delsubzoneid=this.id.substr(11);
												delSubZoneDiv(delsubzoneid);
											});

										}
									}
								});
							}
						});
					}
				}
			});
		}else{
			closeSubZone(bigzoneid);
		}
}

function closeSubZone(bigzoneid){
		$("#topZoneOpen_"+bigzoneid)[0].value="展开二级区域";
		$("#suball_"+bigzoneid).remove();
}


//配送方法选择适用区域

$(document).ready(function(){
	$("#showzonebutton").click(function(){
		$('#frmWindow').remove();
		$("body").append("<div id='frmWindow'></div>");
		$('#frmWindow').append('<div class="topBar">选择适用区域<div class="pwClose"></div></div><div class="border"><iframe frameborder="0" scrolling="yes" src="yun_selzone.php" class="Frm"></iframe></div>');
		$.blockUI({message:$('#frmWindow'),css:{width:'350px',top:'10px'}}); 
		$('.pwClose').click(function() { 
			$.unblockUI(); 
		}); 
	});

	$("#showzonestr").click(function(){
		$('#frmWindow').remove();
		$("body").append("<div id='frmWindow'></div>");
		$('#frmWindow').append('<div class="topBar">选择适用区域<div class="pwClose"></div></div><div class="border"><iframe frameborder="0" scrolling="yes" src="yun_selzone.php" class="Frm"></iframe></div>');
		$.blockUI({message:$('#frmWindow'),css:{width:'350px',top:'10px'}}); 
		$('.pwClose').click(function() { 
			$.unblockUI(); 
		}); 
	});

});

//选区域层返回后按zonestr读取清单

(function($){
	$.fn.getYunZoneList = function(yunzonestr){
		
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=getyunzonelist&yunzonestr="+yunzonestr,
			success: function(msg){
				$("#showzonestr")[0].value=msg;
			}
		});
	};
})(jQuery);



//配送方法
$(document).ready(function(){


	$("input.seldinge").click(function(){
		switch(this.value){
			case "0":
				$("#tryunfei").hide();
				$("#trgs").show();
				$("#trdd").hide();
				$("#trss").hide();
			break;
			case "1":
				$("#tryunfei").show();
				$("#trgs").hide();
				$("#trdd").hide();
				$("#trss").hide();
			break;
			case "2":
				$("#tryunfei").hide();
				$("#trgs").hide();
				$("#trdd").show();
				$("#trss").hide();
			break;
		}
	});

	$("input.selbaojia").click(function(){
		if(this.value=='1'){
			$("#trbaofei").show();
		}else{
			$("#trbaofei").hide();
		}
	});

});






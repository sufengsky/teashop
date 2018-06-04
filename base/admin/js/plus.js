<!--


/**
* 插件设置区域打开关闭
*/
$(document).ready(function(){
	
	$(".pluszone").click(function () { 
		var obj=this.id;
		if(this.className=="pluszone"){
			this.className="plusclosezone";
			$("#s_"+obj).hide();
		}else{
			this.className="pluszone";
			$("#s_"+obj).show();
		}
	 });
});





//插件外框设置
$(document).ready(function(){
	
	 //预览
	 $().previewBorder();
	 
	 //边框类型切换初始化
	 var borderid=$("#showborders")[0].value;
	
	 if(borderid=="1000"){
		$("#diyborder").show();
		$("#bordtempzone").hide();
		$("#hiddenpborder").show();
		$("#bordertempcoloropt").hide();
		$("#usetemp")[0].checked=false;
		$("#usediy")[0].checked=true;
		if($("#borderwidth")[0].value!="0" || $("#showbar")[0].value!="none"){
			$("#setborder")[0].className="pluszone";
			$("#s_setborder").show();
		}else{
			$("#setborder")[0].className="plusclosezone";
			$("#s_setborder").hide();
		}
	 }else{
		$("#diyborder").hide();
		$("#bordtempzone").show();
		$("#hiddenpborder").hide();
		$("#usetemp")[0].checked=true;
		$("#usediy")[0].checked=false;
		$("#setborder")[0].className="pluszone";
		$("#s_setborder").show();

		//判断是否可选颜色的模版(001-099 为可选颜色模版预留编号
		if(borderid.substr(1,1)=="0"){
			$("#bordertempcoloropt").show();
		}else{
			$("#bordertempcoloropt").hide();
		}

		//标签切换边框插件特殊处理
		if($("#pluslable")[0].value=="modGroupLable"){
			$("#borderlablezone").show();
			$("#settemplate").hide();
			$(".bordersettype").hide();
			
		}
	 }

	//切换边框类型
	$("#usetemp").click(function () { 
		$("#diyborder").hide();
		$("#bordtempzone").show();
		$("#hiddenpborder").hide();
		$("#bordertempcoloropt").show();
		$("#colorSelector").hide();
		$("#usetemp")[0].checked=true;
		$("#usediy")[0].checked=false;
		
		var oldid=$("#seledbordertemp")[0].value;
		if(oldid=="1000"){
			$("#showborders")[0].value="A001";
			$("#seledbordertemp")[0].value="A001";
			$("#bt_001")[0].style.borderColor="#d8f0fa";
			$("#bt_001")[0].style.backgroundColor="#f4fafd";
			$("#btsel_A")[0].style.borderColor="#ccc";
			$("#borderlablezone").hide();
		}else{
			$("#showborders")[0].value=oldid;
			
			//判断是否可选颜色的模版(001-099 为可选颜色模版预留编号，其他是自由模版)
			if(oldid.substr(1,1)=="0"){
				$("#bordertempcoloropt").show();
			}else{
				$("#bordertempcoloropt").hide();
			}
		}
		
		$().previewBorder();
	});

	$("#usediy").click(function () { 
		$("#diyborder").show();
		$("#bordtempzone").hide();
		$("#hiddenpborder").show();
		$("#bordertempcoloropt").hide();
		$("#borderlablezone").hide();
		$("#usetemp")[0].checked=false;
		$("#usediy")[0].checked=true;
		$("#showborders")[0].value="1000";
		$().previewBorder();
	});


	 //选择时变化
	 $("#borderwidth").change(function(){
		$().previewBorder();
	 });

	 $("#borderstyle").change(function(){
		$().previewBorder();
	 });

	  $("#showbar").change(function(){
		$().previewBorder();
	 });

	  $("#hiddenpborder").click(function(){
		  
		  $("#backgroundcolor")[0].value='';
		  $("#bordercolor")[0].value='';
		  $("#barbg")[0].value='';
		  $("#barcolor")[0].value='';

		  $("#backgroundcolor")[0].style.backgroundColor='#ffffff';
		  $("#bordercolor")[0].style.backgroundColor='#ffffff';
		  $("#barbg")[0].style.backgroundColor='#ffffff';
		  $("#barcolor")[0].style.backgroundColor='#ffffff';
		  $("#borderwidth").attr("value",'0');
		  $("#borderstyle").attr("value",'solid');
		  $("#showbar").attr("value",'none');
		  $("#padding").attr("value",'0');
		  
		  $().previewBorder();
	 });




	//初始读取模版列表
	$().getBorderTemp();

});



//读取插件外框模版
(function($){
	$.fn.getBorderTemp = function(){
		
		var pluslable=$("#pluslable")[0].value;

		$.ajax({
			type: "POST",
			url: "post.php",
			data: "act=getbordertemplist&pluslable="+pluslable,
			success: function(msg){
				$("#bordtempzone").html(msg);

				//将原来的选中状态
				var nowshowborder=$("#showborders")[0].value;
				if(nowshowborder!="1000"){
					var nowColorId=nowshowborder.substr(0,1);
					var nowTempId=nowshowborder.substr(1);
					$("#bt_"+nowTempId)[0].style.borderColor="#d8f0fa";
					$("#bt_"+nowTempId)[0].style.backgroundColor="#f4fafd";
					$("#btsel_"+nowColorId)[0].style.borderColor="#ccc";

					//判断是否可选颜色的模版(001-099 为可选颜色模版预留编号，其他是自由模版)
					if(nowshowborder.substr(1,1)=="0"){
						$("#bordertempcoloropt").show();
					}else{
						$("#bordertempcoloropt").hide();
					}
				}

				//选择边框模版列表
				 $(".bordtemplist").click(function(){ 
					   $(".bordtemplist").each(function(){
							var obj=this.id;
							$("#"+obj)[0].style.borderColor="#f7f7f7";
							$("#"+obj)[0].style.backgroundColor="#fff";
					   });
						this.style.borderColor="#d8f0fa";
						this.style.backgroundColor="#f4fafd";

						//判断是否可选颜色的模版(001-099 为可选颜色模版预留编号，其他是自由模版)
						if(this.id.substr(3,1)=="0"){
							$("#bordertempcoloropt").show();
						}else{
							$("#bordertempcoloropt").hide();
						}
						
						//获得选过的色系,获取当前编号的相应色系的模版
						var colorFav=$("#seledbordertemp")[0].value.substr(0,1);
						$("#showborders")[0].value=colorFav+this.id.substr(3);
						$("#seledbordertemp")[0].value=colorFav+this.id.substr(3);
						$("#btsel_"+colorFav)[0].style.borderColor="#ccc";
						$().previewBorder();
				 });
				 
				

				 //选择模版色系
				 $(".tempcoloropt").click(function(){
						var nowColorId=$("#showborders")[0].value.substr(0,1);
						var nowTempId=$("#showborders")[0].value.substr(1);
						var selColorId=this.id.substr(6);
						$(".tempcoloropt").each(function(){
							var obj=this.id;
							$("#"+obj)[0].style.borderColor="#fff";
						});
					   this.style.borderColor="#ccc";
					   $("#showborders")[0].value=selColorId+nowTempId;
					   $("#seledbordertemp")[0].value=selColorId+nowTempId;
					   $().previewBorder();
				 });
			}
		});
	};
})(jQuery);

//边框预览
(function($){

	$.fn.previewBorder = function(){
		var borderid=$("#showborders")[0].value;
		var coltitle=$("#coltitle")[0].value;
		var borderwidth=$("#borderwidth")[0].value;
		var borderstyle=$("#borderstyle")[0].value;
		var bordercolor=$("#bordercolor")[0].value;
		var backgroundcolor=$("#backgroundcolor")[0].value;
		var showbar=$("#showbar")[0].value;
		var barbg=$("#barbg")[0].value;
		var barcolor=$("#barcolor")[0].value;

		$.ajax({
			type: "POST",
			url: "post.php",
			data: "act=previewborder&borderid="+borderid+"&coltitle="+coltitle+"&borderwidth="+borderwidth+"&bordercolor="+bordercolor+"&borderstyle="+borderstyle+"&backgroundcolor="+backgroundcolor+"&showbar="+showbar+"&barbg="+barbg+"&barcolor="+barcolor,
			success: function(msg){
				$("#previewborder").html(msg);
			}
		});
	};
})(jQuery);




//选择颜色
$(document).ready(function(){
	var obj;
	$(".selcolor").click(function () { 
		
		if($("#colorSelector").find(".colortd").html()!="&nbsp;"){
				$("#colorSelector").empty();
				var KE_COLOR_TABLE = Array(
					"#ffb6c1","#ffc0cb","#dc143c","#fff0f5","#db7093","#ff69b4","#ff1493","#e10055","#c71585","#da70d6","#d8bfd8","#dda0dd",
					"#ee82ee","#ff00ff","#800080","#ba55d3","#9400d3","#8a2be2","#9370db","#7b68ee","#6a5acd",
					"#e6e6fa","#f8f8ff","#0000ff","#191970","#336699","#2266aa","#0099cc","#00008b","#000080","#4169e1",
					"#6495ed","#b0c4de","#778899","#708090","#1e90ff","#f0f8ff","#4682b4","#87cefa","#00bfff","#add8e6","#b0e0e6",
					"#5f9ea0","#f0ffff","#e0ffff","#ddeeff","#f7fbfe","#afeeee","#00ffff","#00ced1","#2f4f4f","#008b8b","#009999","#008080",
					"#48d1cc","#20b2aa","#40e0d0","#7fffd4","#66cdaa","#00fa9a","#f5fffa","#00ff7f","#3cb371","#2e8b57","#f0fff0","#90ee90",
					"#98fb98","#8fbc8f","#32cd32","#00ff00","#228b22","#008000","#006400","#7fff00","#7cfc00","#adff2f","#556b2f","#9acd32",
					"#6b8f23","#f5f5dc","#fafad2","#fffff0","#ffffe0","#ffff00","#808000","#bdb76b","#fffacd","#eee8aa","#f0e68c","#ffd700",
					"#fff8dc","#daa520","#b8860b","#fffaf0","#fdf5e6","#f5deb3","#ffe4b5","#ffa500","#ff6600","#ff9900","#ffefd5","#ffebcd",
					"#ffdead","#faebd7","#d2b48c","#deb887","#ffe4c4","#ff8c00","#faf0e6","#cd853f","#ffda89","#f4a460","#d2691e","#8b4513",
					"#fff5ee","#a0522d","#ffa07a","#ff7f50","#ff4500","#e9967a","#ff6347","#ffe4e1","#fa8072","#fffafa","#f08080","#bc8f8f",
					"#cd5c5c","#ff0000","#e60000","#a52a2a","#b22222","#8b0000","#800000","#ffffff","#f5f5f5","#eeeeee","#dcdcdc","#d3d3d3",
					"#c0c0c0","#a9a9a9","#808080","#696969","#cc0000","#000000","#f9f7ed","#ffff88","#cdeb8b","#c3d9ff","#36393d","#ff1a00",
					"#ff7400","#008c00","#006e2e","#4096ee","#ff0084","#b02b2c","#d15600","#d01f3c","#73880a","#6bba70","#3f4c6b","#356aa0"
				);
				for (i = 0; i < KE_COLOR_TABLE.length; i++) {
					$("#colorSelector").append('<div class="colortd" style="background:'+KE_COLOR_TABLE[i]+'" >&nbsp;</div>');
				}
		}
		
		$("#colorSelector").show();
		obj=this.id;
		$(".colortd").click(function (){
			$("#"+obj)[0].style.backgroundColor=this.style.backgroundColor;
			$("#"+obj)[0].value=this.style.backgroundColor;
			$("#colorSelector").hide();
			$().previewBorder();
			return false;
		});
		return false;
	});

	
	$(".selcolor").blur(function () { 
		try{
			this.style.backgroundColor=this.value;
		}
		catch(e){}
		
		if(this.style.backgroundColor==this.value){
			$().previewBorder();
		}else{
			this.value=this.style.backgroundColor;
		}
	});
	

	

});


//插件模版初始化
$(document).ready(function(){
	
	$().getPlusTemp();
	
	//判断是否可选模版配色方案
	var tempcolor=$("#tempcolor")[0].value;
	if(tempcolor=="-1" || tempcolor=="" || tempcolor=="0"){
		$("#plustempcoloropt").hide();
	}else{
		$("#plustempcoloropt").show();
		$("#ptsel_"+tempcolor)[0].style.borderColor="#ccc";
	}
});


//读取插件模版列表
(function($){
	$.fn.getPlusTemp = function(){
		
		var pluslable=$("#pluslable")[0].value;
		var set_tempname=$("#set_tempname")[0].value;
		var tempname=$("#tempname")[0].value;
		
		$.ajax({
			type: "POST",
			url: "post.php",
			data: "act=getplustemplist&pluslable="+pluslable+"&set_tempname="+set_tempname+"&tempname="+tempname,
			success: function(msg){
				$("#plustempzone").html(msg);

				if($(".plustemplist").size()<2 && $("#tempcolor")[0].value=="-1"){
					$("#settemplate")[0].className="plusclosezone";
					$("#s_settemplate").hide();
				}else{
					$("#settemplate")[0].className="pluszone";
					$("#s_settemplate").show();
				}
				
				if($(".plustemplist").size()>2){
					$("#plustempzone")[0].style.height="73px";
				}else if($(".plustemplist").size()>1){
					$("#plustempzone")[0].style.height="48px";
				}
					


				//选择插件模版列表
				 $(".plustemplist").click(function () { 
					 $("#tempname")[0].value=this.title;
					 
					   $(".plustemplist").each(function(){
							var obj=this.id;
							$("#"+obj)[0].style.borderColor="#f7f7f7";
							$("#"+obj)[0].style.backgroundColor="#fff";
					   });
						this.style.borderColor="#d8f0fa";
						this.style.backgroundColor="#f4fafd";
				 });
				

				 //选择模版色系
				 $(".ptempcoloropt").click(function(){
						
						var selColorId=this.id.substr(6);
						$(".ptempcoloropt").each(function(){
							var obj=this.id;
							$("#"+obj)[0].style.borderColor="#fff";
						});
					   this.style.borderColor="#ccc";
					   
					   $("#tempcolor")[0].value=selColorId;
					   
				 });

			}
		});
	};

})(jQuery);


//素材选择
(function($){
	$.fn.getPicSource = function(){


		var sourcename=$("#sourcename")[0].value;
		var sourcefolder=$("#sourcefolder")[0].value;
			
		$.ajax({
			type: "POST",
			url: "post.php",
			data: "act=getpicsource&sourcename="+sourcename+"&sourcefolder="+sourcefolder,
			success: function(msg){
				
				$("#sourcezone").html(msg);

				var obj=$(".sourcediv");
				obj.each(function(){
					if($("#sourcename")[0].value==$(this)[0].title){
						$(this)[0].className="sourcedivnow";
					}

				});

				

				obj.click(function(){
						obj.each(function(){
							$(this)[0].className="sourcediv";
						});
						$(this)[0].className="sourcedivnow";
						$("#sourcename")[0].value=$(this)[0].title;
						$("#sourceurl")[0].value=$("#sourcefolder")[0].value+"/"+$(this)[0].title;
						var src=$(this).find("img")[0].src;
						$("body").append("<img id='sourcepreview' src='"+src+"'>");
						$("input#width")[0].value=$("#sourcepreview")[0].offsetWidth;
						$("input#height")[0].value=$("#sourcepreview")[0].offsetHeight;
						$("#sourcepreview").remove;

				});

			}
		});
		
	};

})(jQuery);


//标签层预览防出错
(function($){
	$.fn.switchLable = function(pdvid,lables,roll){
		
		//获取标签的样式名称
		var GBL=$("ul.gblable").children();
		var CLN=GBL[0].className;
		var CUR=CLN+"_current";
		var H=$("ul.gblable").html();
		var T=GBL.html();
		$("ul.gblable").prepend("<li class='"+CUR+"'>"+T+"</li>");
		return false;
	};

})(jQuery);

-->
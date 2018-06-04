
//设置定价规则
$(document).ready(function(){
	
	$.ajax({
		type: "POST",
		url:"post.php",
		data: "act=memberpricelist",
		success: function(msg){
			$("#tr_PriceRule").after("<tr id='memberpriceset'><td>"+msg+"</td></tr>");
		}
	});

}); 


//设置积分规则
$(document).ready(function(){
	var centopen=$("[name='var[CentOpen]'][@checked]").val();
		if(centopen=="1"){
			$("#tr_CentId").show();
			$("#tr_CentModle").show();
			if($("[name='var[CentModle]']")[0].value=="2"){
				$("#tr_CentRate").show();
			}else{
				$("#tr_CentRate").hide();
			}
		}else{
			$("#tr_CentId").hide();
			$("#tr_CentModle").hide();
			$("#tr_CentRate").hide();
		}


	$("[name='var[CentOpen]']").click(function(){
		var centopen=$("[name='var[CentOpen]'][@checked]").val();
		if(centopen=="1"){
			$("#tr_CentId").show();
			$("#tr_CentModle").show();
			if($("[name='var[CentModle]']")[0].value=="2"){
				$("#tr_CentRate").show();
			}else{
				$("#tr_CentRate").hide();
			}
		}else{
			$("#tr_CentId").hide();
			$("#tr_CentModle").hide();
			$("#tr_CentRate").hide();
		}
	});

	$("[name='var[CentModle]']").change(function(){
		if($("[name='var[CentModle]']")[0].value=="2"){
			$("#tr_CentRate").show();
		}else{
			$("#tr_CentRate").hide();
		}
	});

});

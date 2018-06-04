
$(document).ready(function(){
	
	selPaycentertype();

	$(".pcentertype").unbind().bind("click",function(){
		selPaycentertype();
	});


});


function selPaycentertype(){
	var paycentertype=$("input.pcentertype[@checked]").val();
	if(paycentertype=="1"){
		$(".tronline").show();
		loadPayTemp();
		$("#hbtype").change(function(){
			$("#onlineTemp").remove();
			loadPayTemp();
		});
	}else{
		$(".tronline").hide();
		$("#onlineTemp").remove();
	}
}

function loadPayTemp(){
	var partner=$("#hbtype")[0].value;
	var step=$("#step")[0].value;
	if(step=="modify"){
		var payid=$("#id")[0].value;
	}
	$.ajax({
		type: "POST",
		url:"p_"+partner+".php",
		data: "act="+step+"&payid="+payid,
		success: function(msg){
			$("#onlineTemp").remove();
			$("#tablePayCenter").after(msg);
		}
	});

}
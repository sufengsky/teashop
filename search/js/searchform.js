

//搜索表单校验
$(document).ready(function(){
	
	$("#globalsearchform").submit(function(){
		if($("#globalsearchform_key")[0].value==""){
			alert("请输入搜索关键词");
			return false;
		}
		return true;
	});
}); 
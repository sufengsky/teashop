
//发布职位校验
$(document).ready(function(){

	$('#addJobForm').submit(function(){
		if($("#jobname")[0].value==""){
			alert("请填写职位名称");
			return false;
		}

		if($("#pnums")[0].value==""){
			alert("请填写招聘人数");
			return false;
		}

		if($("#jobaddr")[0].value==""){
			alert("请填写工作地点");
			return false;
		}

		if($("#jobintro")[0].value==""){
			alert("请填写职位描述");
			return false;
		}

		if($("#jobrequest")[0].value==""){
			alert("请填写招聘要求");
			return false;
		}


		return true;
		
   }); 
});



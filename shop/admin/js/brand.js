
//添加品牌校验
$(document).ready(function(){

	$('#addBrandForm').submit(function(){
		if($("#brand")[0].value==""){
			alert("请填写品牌名称");
			return false;
		}
		return true;
		
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


//品牌关联分类

$(document).ready(function(){

	$(".brandrelset").click(function(){
		var brandid=this.id.substr(12);
		$('#frmWindow').remove();
		$("body").append("<div id='frmWindow'></div>");
		$('#frmWindow').append('<div class="topBar">选择品牌关联的分类<div class="pwClose"></div></div><div class="border"><iframe frameborder="0" scrolling="yes" src="brand_relcat.php?brandid='+brandid+'" class="Frm"></iframe></div>');
		$.blockUI({message:$('#frmWindow'),css:{width:'350px',top:'10px'}}); 
		$('.pwClose').click(function() { 
			$.unblockUI(); 
		}); 

	});

	$("input#closerelcat").click(function(){
		parent.$.unblockUI();
	});

	$("input#selall").click(function(){
		if($(this)[0].checked==true){
			$("[name='c[]']").attr("checked",'true');
		}else{
			$("[name='c[]']").removeAttr("checked");
		}
	});

	$("input.relcheck").click(function(){
		var myid=this.id;
		if($(this)[0].checked==true){
			$("input.relcheck").each(function(){
				var objId=this.id;
				if(jsstrstr(objId,myid)){
					$(this).attr("checked",'true');
				}
			});
			var clen=myid.length;
			if(clen>=10){
				for(i=clen-5;i>=5;i=i-5){
					$("#"+myid.substr(0,i)).attr("checked",'true');
				}
			}
		}else{
			$("input.relcheck").each(function(){
				var objId=this.id;
				if(jsstrstr(objId,myid)){
					$(this).removeAttr("checked");
				}
			});
		}
	});

	
	$('#brcForm').submit(function(){
	
		$('#brcForm').ajaxSubmit({
				target: 'div#notice',
				url: 'post.php',
				success: function(msg) {
					if(msg=="OK"){
						parent.$.unblockUI();
					}else{
						alert(msg);
					}
				}
			}); 
	 
		return false; 

   }); 


});


function jsstrstr(haystack, needle) {
    var pos = 0;
    haystack += '';
    pos = haystack.indexOf( needle );
    if (pos == -1) {
        return false;
    } else{
       return true;
    }
}

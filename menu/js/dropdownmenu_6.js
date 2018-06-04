<!--

function showDropMenu(mainMenuDiv,subMenuDiv,n){

	obj=$("."+mainMenuDiv);
	
	for(var i=0;i<obj.length;i++){
		if(i==n){
			if($("#"+subMenuDiv+"_"+i).find("li").size()>0){
				$("#"+subMenuDiv+"_"+i)[0].style.left=$("#"+mainMenuDiv+"_"+i)[0].offsetLeft;
				$("#"+subMenuDiv+"_"+i).show();
			}
			$("#"+mainMenuDiv+"_"+i)[0].className=mainMenuDiv+"_current";
			
		}else{
			$("#"+subMenuDiv+"_"+i).hide();
			$("#"+mainMenuDiv+"_"+i)[0].className=mainMenuDiv;
			
		}

	
	}

	subObj=$("."+subMenuDiv);
	subObj.mouseout(function(){
		$(this).hide();
	});
	subObj.mouseover(function(){
		$(this).show();
	});

	obj.mouseout(function(){
		subObj.hide();
	});


}


-->
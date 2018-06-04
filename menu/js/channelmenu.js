<!--


//菜单
function showMenu(n){
	
	var smenudiv = document.getElementById("smenu");
	
	obj=smenudiv.getElementsByTagName("ul");
	
 	for(var i=0;i<obj.length;i++){
		if(i==n){
			obj[i].style.display="block";
			
			document.getElementById("mainmenu").getElementsByTagName("a")[i].className='current';
			
		}else{
			obj[i].style.display="none";
			document.getElementById("mainmenu").getElementsByTagName("a")[i].className='';
		}
		
	}

}


-->
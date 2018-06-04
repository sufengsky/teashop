

//½»Ìæ±³¾°
$(document).ready(function(){
	
  for (i=1;i<$("#queryul").children("li").length+1;i++) { 
     (i%2>0)?($("#queryul").children("li")[i-1].style.backgroundColor = '#fff'):($("#queryul").children("li")[i-1].style.backgroundColor = '#fbfbfb'); 
	} 
}); 
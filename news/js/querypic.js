

//检索页横竖图片自适应
function picFit(theImg,x){

  theImg.style.visibility="hidden";

  var w = theImg.offsetWidth;
  var h = theImg.offsetHeight;
  
  if(h>w){
  	theImg.style.height=x+"px";
  	theImg.style.width='';
  }else{
  	theImg.style.height='';
  	theImg.style.width=x+"px";
	theImg.style.marginTop=(x-theImg.offsetHeight)/2+"px";

  }
  
  theImg.style.visibility="visible";
}




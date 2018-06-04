
var cyrano={};
cyrano.Ajax=function(url,obj){
	var httpRequest;
	
	if (window.ActiveXObject){
		try{
			httpRequest = new ActiveXObject("Microsoft.XMLHTTP");  //IE新版本
		}catch (e){
			try{
				httpRequest = new ActiveXObject("Msxml2.XMLHTTP");  //IE旧版本
			}catch (e){}
		}
	}else if(window.XMLHttpRequest){
		httpRequest = new XMLHttpRequest();  //mozilla浏览器
		if (httpRequest.overrideMimeType) {  //设置MiME类别 
			httpRequest.overrideMimeType('text/xml'); 
		} 
	}
	
	if (!httpRequest){
		alert('不能创建XMLHTTP实例');
		obj.onComplete();
	}
	httpRequest.onreadystatechange = function(){
		if (httpRequest.readyState == 4){
			obj['onComplete'](httpRequest);
		}
	}
	
	if(url.indexOf('machineDate')==-1){ 
		url+=(url.indexOf('?')==-1?"?":"&")+("machineDate="+new Date().getTime());
	}
	url+=(url.indexOf('?')==-1?"?":"&")+obj.parameters;
	
	if(obj.asynchronous==true){ 
		httpRequest.open(obj.method, url, true); 
	}else{ 
		httpRequest.open(obj.method, url, false);
	}
	
	if(obj.method=="get" || obj.method=="GET"){
		httpRequest.send(null);
	}else if(obj.method=="post" || obj.method=="POST"){
		httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		httpRequest.send(obj.parameters);
	}

	return httpRequest;
};

function getContent(tid, url, pars, updateElemID){   //tid决定是输出，还是弹出提示框（0：输出； 其他：根据条件弹出提示框）
	cyrano.Ajax(url,{
		method  : "POST",
		parameters : pars,
		asynchronous : true,  //是否异步
		onFailure : function(httpRequest){alert("网络连接失败!");},
		onComplete  : function(httpRequest){
			if(httpRequest.status==200){
				if(tid==0){
					showResponse(httpRequest,updateElemID);
				}else{
					showResponse2(tid,httpRequest,updateElemID);
				}
			}
		}
	});
}

function $I(element){
	return document.getElementById(element);
}

function showResponse(httpRequest,updateElemID){
	$I(updateElemID).innerHTML = httpRequest.responseText;
}

function showResponse2(tid,httpRequest,updateElemID){
	if(tid=='vote'){
		var backmsg = httpRequest.responseText;
		if(backmsg=='OK'){
			alert('投票成功');
			window.location.href=location.href;
		}else if(backmsg=='No1'){
			alert('投票失败，请重新投票');
		}else if(backmsg=='No2'){
			alert('今天您已经投过票了，请明天再来吧');
		}else if(backmsg=='No3'){
			alert('当前投票已关闭或已过期');
		}
	}
}



function vote(rp, id, catid){	
	//$I(vid).innerHTML='<div align="center" style="padding-top:210px;"><img src="../templates/images/loading.gif">图片载入中...</div>';
	getContent('vote', rp+'tools/post.php', 'act=setvote&id='+id+'&catid='+catid, '');
}


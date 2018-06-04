
//Í¼Æ¬ÇÐ»»
$(document).ready(function() {

	var maxHeight=parseInt($("#rollviewzone").css("height"));
	var maxWidth=parseInt($("#rollviewzone").css("width"));
	var rollpicHeight=parseInt($(".rollpiczone").css("height"));
	var rollpicWidth=parseInt($(".rollpiczone").css("width"));

	var accMax=maxWidth/maxHeight;
	var accRoll=rollpicWidth/rollpicHeight;

	var rollObj=$("li.rollx");
	rollObj.each(function(){
		var rollid=this.id;
		if(rollid.substr(6)=="1"){
			$("li#"+rollid)[0].className="rollxnow";
			$("#rollview")[0].src=$("li#"+rollid).find("img")[0].src;
		}

		if($("#rollview")[0].offsetHeight>=$("#rollview")[0].offsetWidth/accMax){
			$("#rollview").css({width:maxWidth+"px"});
		}else{
			$("#rollview").css({height:maxHeight+"px"});
		}

	});

	$("img.rollpic").each(function(){
		
		var rollpicid=this.id;
		
		$("#"+rollpicid).css({width:"",height:""});

		if($("#"+rollpicid)[0].offsetHeight>=$("#"+rollpicid)[0].offsetWidth/accRoll){
			$("#"+rollpicid).css({width:rollpicWidth+"px"});
		}else{
			$("#"+rollpicid).css({height:rollpicHeight+"px"});
		}

	});

	rollObj.mouseover(function(){
		
		rollObj.each(function(){
			this.className="rollx";
		});
		
		var rollid=this.id;

		$("li#"+rollid)[0].className="rollxnow";
		if($("#rollview")[0].src!=$("li#"+rollid).find("img")[0].src){
			$("#rollview").hide();
			$("#rollview")[0].src=$("li#"+rollid).find("img")[0].src;
			$("#rollview").fadeIn('slow');
		
		
			$("#rollview").css({width:"",height:""});
			if($("#rollview")[0].offsetHeight>=$("#rollview")[0].offsetWidth/accMax){
				$("#rollview").css({width:maxWidth+"px"});
			}else{
				$("#rollview").css({height:maxHeight+"px"});
			}
		}
		
		
	});
	setInterval("$().startRolling()", 5000);
});


(function($){

	$.fn.startRolling = function(){

		var maxHeight=parseInt($("#rollviewzone").css("height"));
		var maxWidth=parseInt($("#rollviewzone").css("width"));
		var accMax=maxWidth/maxHeight;

		var rollAll=$("ul.newspicrollx3").find("li");
		var nextId;
		rollAll.each(function(){
			var objid=this.id;
			if($("#"+objid)[0].className=="rollxnow"){
				if(parseInt(objid.substr(6))==3){
					nextId=1;
				}else{
					nextId=parseInt(objid.substr(6))+1;
				}
			}
			this.className="rollx";
		});
		

		var rollid="rollx_"+nextId;

		$("li#"+rollid)[0].className="rollxnow";
		if($("#rollview")[0].src!=$("li#"+rollid).find("img")[0].src){
			$("#rollview").hide();
			$("#rollview")[0].src=$("li#"+rollid).find("img")[0].src;
			$("#rollview").fadeIn('slow');
		
		
			$("#rollview").css({width:"",height:""});
			if($("#rollview")[0].offsetHeight>=$("#rollview")[0].offsetWidth/accMax){
				$("#rollview").css({width:maxWidth+"px"});
			}else{
				$("#rollview").css({height:maxHeight+"px"});
			}
		}
		
		
	};

})(jQuery);

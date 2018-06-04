
$(document).ready(function(){
	
	$("div.shoptwoclass_topright").toggle(function(){
		var topcatid=this.id.substr(13);
		$("ul#shopclasssub_"+topcatid).hide();
		$(this)[0].className="shoptwoclass_topright_open";
		$().setBg();
	},function(){
		var topcatid=this.id.substr(13);
		$("ul#shopclasssub_"+topcatid).show();
		$(this)[0].className="shoptwoclass_topright";
		$().setBg();
	});
});



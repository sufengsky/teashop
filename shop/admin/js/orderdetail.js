

$(document).ready(function(){

	$("div#print_button").click(function(){ 
		$("div#shoporderdetail").printArea(); 
	}); 

	$("div#print_fahuo_button").click(function(){ 
		$("div#fahuodan").printArea(); 
	}); 


	//ÐÞ¸Ä±¸×¢
	$("#bztext").focus(function(){
		$("#savebz").show();
		$("#savebz").click(function(){
			var bztext=$("#bztext")[0].value;
			var orderid=$("#orderid")[0].value;
			$.ajax({
				type: "POST",
				url:"post.php",
				data: "act=ordermodibz&orderid="+orderid+"&bztext="+bztext,
				success: function(msg){
					if(msg=="OK"){
						$("#savebz").hide();
					}else{
						alert(msg);
					}
				}
			});
		});
	});
});


(function($) {
	var printAreaCount = 0; 
	$.fn.printArea = function() { 
		var ele = $(this); 
		var idPrefix = "printArea_"; 
		removePrintArea( idPrefix + printAreaCount ); 
		printAreaCount++; 
		var iframeId = idPrefix + printAreaCount; 
		var iframeStyle = 'position:absolute;width:0px;height:0px;left:-500px;top:-500px;'; 
		iframe = document.createElement('IFRAME'); 
		$(iframe).attr({ style : iframeStyle, id    : iframeId }); 
		document.body.appendChild(iframe); 
		var doc = iframe.contentWindow.document; 
		$(document).find("link") .filter(function(){ 
			return $(this).attr("rel").toLowerCase() == "stylesheet"; }) .each(function(){
				doc.write('<link type="text/css" rel="stylesheet" href="' + $(this).attr("href") + '" >'); }); 
				doc.write('<div class="' + $(ele).attr("class") + '">' + $(ele).html() + '</div>'); 
				doc.close(); 
				var frameWindow = iframe.contentWindow; 
				frameWindow.close(); 
				frameWindow.focus(); 
				frameWindow.print(); 
				} 
				var removePrintArea = function(id) {
				$( "iframe#" + id ).remove(); 
				}; 
					
})(jQuery); 


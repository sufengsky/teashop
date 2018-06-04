<!--


//下拉菜单
$(document).ready(function() {
	
	var getObj = $('div.dorpmenu');
	getObj.each(function(id) {
		var obj = this.id;
		var n=parseInt(obj.substr(9));

		$("#"+obj).mouseover(function () {
			if($("div#subdorpmenu_"+n)[0].style.display!="block"){
				$("div.subdorpmenu").hide();
			}
			$("div#subdorpmenu_"+n)[0].style.top=$("#"+obj)[0].offsetTop+$("#"+obj)[0].offsetHeight+"px";
			$("div#subdorpmenu_"+n).show();


			if(id==0){
				$("div#subdorpmenu_"+n).find("ul")[0].className="firstdrop";
				$("div#subdorpmenu_"+n)[0].style.left=$("#"+obj)[0].offsetLeft+1 + "px";
			}else{
				$("div#subdorpmenu_"+n)[0].style.left=$("#"+obj)[0].offsetLeft + "px";
			}
			

			$("div#subdorpmenu_"+n).find("li").mouseout(function () {
				this.className="";
			});
			
			$("div#subdorpmenu_"+n).find("li").mouseover(function () {
				this.className="current";
				$("div.subdorpmenu").hide();
				$("div#subdorpmenu_"+n).show();
			});
			
			
		});

		$("#"+obj).mouseout(function () {
			//$("div.subdorpmenu").hide();  //ie6不兼容
		});

		

	});

	$("body").click(function () {
		$("div.subdorpmenu").hide();
	});


});

-->
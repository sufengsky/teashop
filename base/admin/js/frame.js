<!--


$(document).ready(function() {
	
	var getObj = $('li.menulist');
	
	$('li.menulist')[0].className="menulistnow";

	getObj.each(function(id) {
		var obj = this.id;
		$("li#"+obj).mouseover(function() {
			$('li.menulistover').each(function(id) {
				this.className="menulist";
			});
			if(this.className!="menulistnow"){this.className="menulistover";};
		});
		$("li#"+obj).mouseout(function() {
			$('li.menulistover').each(function(id) {
				this.className="menulist";
			});
		});

		$("li#"+obj).click(function() {
			$('li.menulistnow').each(function(id) {
				this.className="menulist";
			});
			this.className="menulistnow";
		});
	});
});


$(document).ready(function() {
	

	$("li#m0").click(function() {
			$("iframe#framecon")[0].src='main.php';
	});
	$("li#m1").click(function() {
			$("iframe#framecon")[0].src='config.php';
	});
	$("li#m2").click(function() {
			$("iframe#framecon")[0].src='admin_menu.php';
	});
	$("li#m3").click(function() {
			$("iframe#framecon")[0].src='auth_modpass.php';
	});
	$("li#m4").click(function() {
			$("iframe#framecon")[0].src='auth_addauth.php';
	});
	$("li#m5").click(function() {
			$("iframe#framecon")[0].src='auth_modauth.php';
	});
	$("li#m6").click(function() {
			$("iframe#framecon")[0].src='module.php';
	});
	$("li#m8").click(function() {
			$("iframe#framecon")[0].src='update.php';
	});

	$("li#m11").click(function() {
			$("iframe#framecon")[0].src='plus_bottomedit.php';
	});
	$("li#m12").click(function() {
			$("iframe#framecon")[0].src='plus_diyedit.php';
	});


});


//管理退出
$(document).ready(function(){
	$("#pdv_logout").click(function () { 
		$.ajax({
			type: "POST",
			url: PDV_RP+"post.php",
			data: "act=adminlogout",
			success: function(msg){
				if(msg=="OK"){
					top.location=PDV_RP+"admin.php";
				}else{
					alert(msg);
				}
				
			}
		});
	 });
});




-->
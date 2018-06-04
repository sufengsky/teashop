<!--




$(document).ready(function() {
	
	var getObj = $('li.menulist');
	$("li#m1")[0].className="menulistnow";

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
			$("iframe#framecon")[0].src='config.php';
	});
	$("li#m1").click(function() {
			$("iframe#framecon")[0].src='hz_cat.php';
	});
	$("li#m2").click(function() {
			$("iframe#framecon")[0].src='hz_conadd.php';
	});
	$("li#m3").click(function() {
			$("iframe#framecon")[0].src='hz_con.php';
	});
	$("li#m4").click(function() {
			$("iframe#framecon")[0].src='hz_order_con.php';
	});
	$("li#m5").click(function() {
			$("iframe#framecon")[0].src='hz_tongji_sell.php';
	});
	
});



-->
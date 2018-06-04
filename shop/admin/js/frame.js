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
	
	$("li#m1").click(function() {
			$("iframe#framecon")[0].src='shop_con.php';
	});
	$("li#m2").click(function() {
			$("iframe#framecon")[0].src='brand.php';
	});
	$("li#m3").click(function() {
			$("iframe#framecon")[0].src='shop_cat.php';
	});
	$("li#m5").click(function() {
			$("iframe#framecon")[0].src='order.php';
	});

	$("li#m11").click(function() {
			$("iframe#framecon")[0].src='config.php';
	});
	$("li#m9").click(function() {
			$("iframe#framecon")[0].src='yun_zone.php';
	});
	$("li#m12").click(function() {
			$("iframe#framecon")[0].src='yun_method.php';
	});
	$("li#m14").click(function() {
			$("iframe#framecon")[0].src='../../member/admin/paycenter.php';
	});
	$("li#m15").click(function() {
			$("iframe#framecon")[0].src='stat_order.php';
	});
	$("li#m16").click(function() {
			$("iframe#framecon")[0].src='stat_goods.php';
	});
	
});



-->
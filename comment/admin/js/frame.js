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
			$("iframe#framecon")[0].src='bbs.php';
	});
	
	$("li#m2").click(function() {
			$("iframe#framecon")[0].src='bbs_cat.php';
	});

	$("li#m3").click(function() {
			$("iframe#framecon")[0].src='config.php';
	});

	
});



-->
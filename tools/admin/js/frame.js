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
			$("iframe#framecon")[0].src='stat_main.php';
	});
	
	$("li#m2").click(function() {
			$("iframe#framecon")[0].src='poll_set.php?action=show';
	});
	
	$("li#m3").click(function() {
			$("iframe#framecon")[0].src='photopoll_set.php?action=show';
	});
	
	$("li#m4").click(function() {
			$("iframe#framecon")[0].src='qq.php';
	});
	
	$("li#m5").click(function() {
			$("iframe#framecon")[0].src='wy.php';
	});
	
	$("li#m6").click(function() {
			$("iframe#framecon")[0].src='wyla.php';
	});
	
	$("li#m7").click(function() {
			$("iframe#framecon")[0].src='yd.php';
	});
		
	
});



-->
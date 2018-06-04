
$(document).ready(function(){
	$().getMenuGroup();
});


(function($){

	$.fn.getMenuGroup = function(){
		$("ul.menulist").empty();
		
		$.ajax({
			type: "POST",
			url:"post.php",
			data: "act=menugrouplist",
			success: function(msg){
				$("ul.menulist").append(msg);
				
				
				var getObj = $('li.menulist');
				$("li#m1")[0].className="menulistnow";
				getObj.each(function(id) {
					var obj = this.id;
					$("li#"+obj).mouseover(function() {
						$('li.menulistover').each(function(id) {
							this.className="menulist";
						});
						if(this.className!="menulistnow"){this.className="menulistover";}
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
				
			}
		});
	};
})(jQuery);



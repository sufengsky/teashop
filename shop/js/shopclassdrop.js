$(document).ready(function(){
		$(".shopclassdrop_top").hover(
			function(){
			$('div>ul.drop').hide();
			$('#drop'+this.id).show();
			var divleft = $(".shopclassdrop_top").position().left;
			var offset = parseInt(this.id-1);
			$('#drop'+this.id).css('left',divleft+104*offset+5);
		},
			function(){
		});

		$(".drop").hover(
			function(){
			$(this).className="shopclassdrop_top_current";
		},
			function(){
			$('div>ul.drop').hide();
		});

		$(".shopclassdrop").hover(
			function(){
		},
			function(){
			$('div>ul.drop').hide();
		});
});
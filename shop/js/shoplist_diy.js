$(document).ready(function(){
		$(".shoplist_diy").hide();
		$("#diy1").show();
		$("#title1").hide();
		$(".shoplist_title").hover(
			function(){
			$(".shoplist_title").show();
			$(".shoplist_diy").hide();
			$("#"+this.id).hide();
			var diyid = this.id.substring(5);
			$("#diy"+diyid).show();
		},
			function(){
		});
});
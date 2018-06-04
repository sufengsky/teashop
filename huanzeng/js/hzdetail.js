

//读取详情翻页

(function($){
	$.fn.contentPages = function(hzid){
	
	$("div#contentpages").empty();
		
		$.ajax({
			type: "POST",
			url:PDV_RP+"huanzeng/post.php",
			data: "act=contentpages&hzid="+hzid,
			success: function(msg){
				$("div#contentpages").append("<ul>");
				$("div#contentpages").append("<li id='pl' class='cbutton'>上一张</li>");
				$("div#contentpages").append(msg);
				$("div#contentpages").append("<li id='pn' class='pbutton'>下一张</li>");
				$("div#contentpages").append("</ul>");
				
				
				var getObj = $('li.pages');

				if(getObj.length<2){
					$("div#contentpages").hide();
					$().setBg();
					return false;
				}

				
				$('li.pages')[0].className='pagesnow';
				
				getObj.each(function(id) {
					
					var obj = this.id;
					
					$("li#"+obj).click(function() {
						
						$('li.pagesnow')[0].className="pages";
						this.className='pagesnow';
						var clickid=obj.substr(2);
						$().getContent(hzid,clickid);
						if($(".pagesnow").next()[0].id=="pn"){$("li#pn")[0].className="cbutton";}else{$("li#pn")[0].className="pbutton";}
						if($(".pagesnow").prev()[0].id=="pl"){$("li#pl")[0].className="cbutton";}else{$("li#pl")[0].className="pbutton";}
						
					});

				});

				
				//上一页
				$("li#pl").click(function() {
					if($("li#pl")[0].className=="pbutton"){
						var nowObj=$(".pagesnow").prev()[0].id;
						var nextpageid=nowObj.substr(2);
						$().getContent(hzid,nextpageid);
						$('li.pagesnow')[0].className="pages";
						$("#"+nowObj)[0].className="pagesnow";
						if($(".pagesnow").prev()[0].id=="pl"){$("li#pl")[0].className="cbutton";}else{$("li#pl")[0].className="pbutton";}
						if($(".pagesnow").next()[0].id=="pn"){$("li#pn")[0].className="cbutton";}else{$("li#pn")[0].className="pbutton";}
					}else{
						return false;
					}
					
					
				});

				
				//下一页
				$("li#pn").click(function() {
					if($("li#pn")[0].className=="pbutton"){
						var nowObj=$(".pagesnow").next()[0].id;
						var nextpageid=nowObj.substr(2);
						$().getContent(hzid,nextpageid);
						$('li.pagesnow')[0].className="pages";
						$("#"+nowObj)[0].className="pagesnow";
						if($(".pagesnow").prev()[0].id=="pl"){$("li#pl")[0].className="cbutton";}else{$("li#pl")[0].className="pbutton";}
						if($(".pagesnow").next()[0].id=="pn"){$("li#pn")[0].className="cbutton";}else{$("li#pn")[0].className="pbutton";}
					}else{
						return false;
					}
				});

			}
		});
	};
})(jQuery);



//读取图片
(function($){
	$.fn.getContent = function(hzid,hzpageid){

		$("#hzloading").show();
		$("img#hzpic").remove();
		
		$.ajax({
			type: "POST",
			url:PDV_RP+"huanzeng/post.php",
			data: "act=getcontent&hzpageid="+hzpageid+"&hzid="+hzid+"&RP="+PDV_RP,
			success: function(msg){
				
				  $("body").append("<img id='hzpic' class='hzpic' src='"+PDV_RP+msg+"' />");
				   
				  $("img#hzpic").load(function(){
					  var outw=parseInt($("div.piczone").css("width"));
					  var outh=parseInt($("div.piczone").css("height"));

					  var w=$("img#hzpic")[0].offsetWidth;
					  var h=$("img#hzpic")[0].offsetHeight;

					  if(w>=h){
						if(w>outw){$("img#hzpic")[0].style.width=outw+"px";}
					  }else{
						if(h>outh){$("img#hzpic")[0].style.height=outh+"px";}
					  }
					  
						$("#hzloading").hide();
						$("img#hzpic").appendTo($("#hzview"));
					    $().setBg();
				  });

				  $("img#hzpic").click(function(){
						
						$("body").append("<img id='pre' src='"+$("img#hzpic")[0].src+"'>");
						
						$.blockUI({  
							message: "<img  src='"+$("img#hzpic")[0].src+"' class='closeit'>",  
							css: {  
								top:  ($(window).height() - $("#pre")[0].offsetHeight) /2 + 'px', 
								left: ($(window).width() - $("#pre")[0].offsetWidth/2) /2 + 'px', 
								width: $("#pre")[0].offsetWidth + 'px',
								backgroundColor: '#fff',
								borderWidth:'3px',
								borderColor:'#fff'
							}  
						}); 
						$("#pre").remove();
						
						$(".closeit").click(function(){
							$.unblockUI(); 
						}); 

				});
				 
				
			}
		});
	};
})(jQuery);


//初始化获取翻页和图片
$(document).ready(function(){
	var hzid=$("input#hzid")[0].value;
	$().contentPages(hzid);
	$().getContent(hzid,0);
});


//详情页加入购物车
$(document).ready(function(){

	$("#buynums").change(function(){
		if($(this)[0].value=="" || parseInt($(this)[0].value)<1 || isNaN($(this)[0].value) || Math.ceil($(this)[0].value)!=parseInt($(this)[0].value)){
			$(this)[0].value="1";
		}
	});

	$("#addtocart").click(function(){
		var gid=$("#gid")[0].value;
		var nums=$("#buynums")[0].value;
		
		//检查库存

		$.ajax({
			type: "POST",
			url:PDV_RP+"huanzeng/post.php",
			data: "act=chkkucun&gid="+gid+"&nums="+nums,
			success: function(msg){
				if(msg=="OK"){

					$.ajax({
						type: "POST",
						url:PDV_RP+"post.php",
						data: "act=setcookie&cookietype=add&cookiename=HZCART&gid="+gid+"&nums="+nums+"&fz=",
						success: function(msg){
							if(msg=="OK"){
								window.location=PDV_RP+'huanzeng/cart.php';
							}else if(msg=="1000"){
								alert("订购数量错误");
							}else{
								alert(msg);
								
							}
						}
					});

				}else if(msg=="1000"){
					alert("您还没有登录，不能兑换赠品");
				}else if(msg=="1001"){
					alert("对不起，您的积分不足以兑换此赠品");
				}else if(msg=="1002"){
					alert("该商品缺货");
				}else{
					alert(msg);
				}
			}
		});
	});

});







<!--


//管理状态下显示进入排版菜单

$(document).ready(function() {


	$("body").prepend("<div id='adminbar_showme' class='adminbar_showme'><span>显示面板</span></div>");
	$("body").prepend("<div id='adminmenu' class='adminmenu'></div>");
	$("#adminmenu").append("<div class='adminlogo'></div>");
	$("#adminmenu").append("<div id='pdv_enter' class='adminbutton1'>切换到排版模式<input type='hidden' id='backFollow' value='"+$('body')[0].style.backgroundPosition+"'></div>");
	$("#adminmenu").append("<div  class='admintip'>提示：现在是管理登录状态，进入需要排版的页面，点击左侧按钮可切换到排版模式</div>");
	$("#adminmenu").append("<div id='pdv_hide' class='adminhidden'><span>隐藏面板</span></div>");
	$("#adminmenu").append("<div id='adminclose' class='adminclose'><span>关闭</span></div>");

	$('#adminmenu').animate({height: 'show',opacity: 'show'}, 'slow');



	
	//控制面板背景跟随
	backFollowIn();
	
	$("#adminclose").click(function(){
		$.ajax({
			type: "POST",
			url: PDV_RP+"post.php",
			data: "act=plusclose",
			success: function(msg){
				$("#adminmenu").hide();

				//控制面板背景跟随
				backFollowOut();
				
			}
		});
	});

	$("#pdv_enter").click(function () { 
		$.ajax({
			type: "POST",
			url: PDV_RP+"post.php",
			data: "act=plusenter",
			success: function(msg){
				if(msg=="OK"){
					window.location.reload();
				}else{
					alert("当前管理账户没有排版权限");
					return false;
				}
			}
		});
	 });

});


/***********隐藏排版控制界面及背景跟随 BY Cyrano*************/
$(document).ready(function(){
    $("#pdv_hide").click(function () { 
		$("#adminmenu").hide();
		$("#adminbar_showme").show();
		backFollowOut();
    });
	$("#adminbar_showme").click(function () { 
		$("#adminmenu").show();
		$("#adminbar_showme").hide();
		backFollowIn();
    });
});


function mouseMove(ev) { 
	ev= ev || window.event; 
	var mousePos = mouseCoords(ev); 
	if(mousePos.y<=1){
		$("#adminmenu").show();
		$("#adminbar_showme").hide();
		backFollowIn();
	}; 
} 
function mouseCoords(ev) { 
	if(ev.pageX || ev.pageY){ 
		return {x:ev.pageX, y:ev.pageY}; 
	} 
	return { 
		x:ev.clientX + document.body.scrollLeft - document.body.clientLeft, 
		y:ev.clientY + document.body.scrollTop - document.body.clientTop 
	}; 
} 
document.onmousemove = mouseMove;


function backFollowIn() {
	
		
		var oldpos=$("input#backFollow")[0].value;

		switch(oldpos){
			case "left top":
				$("body")[0].style.backgroundPosition="left 32px";
			break;
			case "center top":
				$("body")[0].style.backgroundPosition="center 32px";
			break;
			case "right top":
				$("body")[0].style.backgroundPosition="right 32px";
			break;
			case "left bottom":
				return false;
			break;
			case "center bottom":
				return false;
			break;
			case "right bottom":
				return false;
			break;
			default:
				$("body")[0].style.backgroundPosition="left 32px";
			break;
		}

	
}

function backFollowOut() {
		$("body")[0].style.backgroundPosition=$("input#backFollow")[0].value;
}

/***********隐藏排版控制界面结束*************/


-->
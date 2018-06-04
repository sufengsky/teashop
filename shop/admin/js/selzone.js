
//选择适用配送区域
$(document).ready(function(){

	var oldzonestr=parent.$("input#zonestr")[0].value;
	
	//将原来选中的打钩
	$("[name='z']").each(function(){
		var v=$(this)[0].value;
		var vstr="|"+v+"|";
		if(jsstrstr(oldzonestr,vstr)){
			$(this)[0].checked=true;
		}else{
			$(this)[0].checked=false;
		}
	});

	
	$("input.selbig").click(function(){
		var selzoneid=this.id.substr(2);
		var selzonechk=$(this)[0].checked;
			$(".selsub_"+selzoneid).each(function(){
				$(this)[0].checked=selzonechk;
			});
	});
	
	$("div.togDiv").toggle(function(){
		var selbigzoneid=this.id.substr(7);
		$("div#selsubzoneall_"+selbigzoneid).hide("slow");
		$("div#togDivImg_"+selbigzoneid)[0].className='togDivImg_close';
	},function(){
		var selbigzoneid=this.id.substr(7);
		$("div#selsubzoneall_"+selbigzoneid).show("slow");
		$("div#togDivImg_"+selbigzoneid)[0].className='togDivImg_open';
	});

	$("input#selall").click(function(){
		if($(this)[0].checked==true){
			$("[name='z']").attr("checked",'true');
		}else{
			$("[name='z']").removeAttr("checked");
		}
	});

	$("input#saveyunzone").click(function(){
		var zonestr='|';
		$("[name='z']").each(function(){
			if($(this)[0].checked==true){
				zonestr=zonestr+$(this)[0].value+'|';
			}
		});
		if(zonestr=="|"){
			zonestr="";
		}
		parent.$("input#zonestr")[0].value=zonestr;
		parent.$().getYunZoneList(zonestr);
		parent.$.unblockUI();
	});

	$("input#closeyunzone").click(function(){
		parent.$.unblockUI();
	});

});


function jsstrstr (haystack, needle) {
    var pos = 0;
    haystack += '';
    pos = haystack.indexOf( needle );
    if (pos == -1) {
        return false;
    } else{
       return true;
    }
}
<!--

function Dpop(url,w,h){
	res = showModalDialog(url, null, 'dialogWidth: '+w+'px; dialogHeight: '+h+'px; center: yes; resizable: no; scroll: no; status: no;');
 	if(res=="ok"){window.location.reload();}
 
}


//管理授权全选
$(document).ready(function() {
	$("#selAll").click(function(){

		var getObj = $('.authcheckbox');
		getObj.each(function(id) {
			if($("#selAll")[0].checked==true){
				this.checked=true;
			}else{
				this.checked=false;
			}
		});
		
	
	});
});



-->
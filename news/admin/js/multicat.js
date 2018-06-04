
	function AddItem (ObjName, DesName) {
	
		k = 0;
		i = document.getElementsByName(ObjName)[0].options.length;
		if (i == 0) return;
		maxsel = 0;
		for (h = 0; h < i; h ++)
			if (document.getElementsByName(ObjName)[0].options[h].selected ) {
				k += 1;
				maxsel = h + 1;
         	}
	if (maxsel >= i) maxsel=0;

		if(document.getElementsByName(ObjName).length>0){
			i = document.getElementsByName(ObjName)[0].options.length;
			j = document.getElementsByName(DesName)[0].options.length;
			for (h = 0; h < i; h ++) {
				if (document.getElementsByName(ObjName)[0].options[h].selected ) {
					Code = document.getElementsByName(ObjName)[0].options[h].value;
					Text = document.getElementsByName(ObjName)[0].options[h].text;
					j = document.getElementsByName(DesName)[0].options.length;
					K_Select = false;
					if(Code=="" || Text==""){

						K_Select = true;
					}
					for (k=0; k<j; k++ ) {
						if (document.getElementsByName(DesName)[0].options[k].value == Code) {
							K_Select = true;
							break;
						}
					}
					if ( K_Select == false){
						document.getElementsByName(DesName)[0].options[j] = new Option(Text, Code);
					}
					document.getElementsByName(ObjName)[0].options[h].selected = false;
				}
			}
			document.getElementsByName(ObjName)[0].options[maxsel].selected =true;
		}
	}

	function DelItem (ObjName) {
		
		min_sel = 0;
		
		if(document.getElementsByName(ObjName).length>0){
			for (i = document.getElementsByName(ObjName).length - 1; i >= 0; i --) {
				if (document.getElementsByName(ObjName)[0].options[i].selected) { 
					if (min_sel == 0 || i < min_sel) min_sel = i;
					if(document.getElementsByName(ObjName)[0].options[i].value!=""){
						document.getElementsByName(ObjName)[0].options[i] = null;
					}
					
				}
			}
			i = document.getElementsByName(ObjName).length;
			if ( i > 0) {
				if (min_sel >= i) min_sel=i-1;
				document.getElementsByName(ObjName)[0].options[min_sel].selected = true;
			}
		}
	}
	
	function SelectAll (ObjName) {
		if(document.getElementsByName(ObjName).length>0){
			for (i=0; i<document.getElementsByName(ObjName)[0].length; i++)
				document.getElementsByName(ObjName)[0].options[i].selected = true;
		}
	}

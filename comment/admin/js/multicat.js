	function GetID (ObjName) {
		for (var ObjID = 0; ObjID < window.form.elements.length; ObjID ++) {
			if ( window.form.elements[ObjID].name == ObjName ) {
				return (ObjID);
				break;
			}
		}
		return(-1);
	}

	function AddItem (ObjName, DesName) {
		ObjID    = GetID (ObjName);
		DesObjID = GetID (DesName);
		k = 0;
		//if(document.form.elements[DesObjID].length>=5){
		//	alert('');
		//	return;
		//}
		i = document.form.elements[ObjID].options.length;
		if (i == 0) return;
		maxsel = 0;
		for (h = 0; h < i; h ++)
			if (document.form.elements[ObjID].options[h].selected ) {
				k += 1;
				maxsel = h + 1;
         	}
		if (maxsel >= i) maxsel=0;

		if (ObjID != -1 && DesObjID != -1) {
			i = document.form.elements[ObjID].options.length;
			j = document.form.elements[DesObjID].options.length;
			for (h = 0; h < i; h ++) {
				if (document.form.elements[ObjID].options[h].selected ) {
					Code = document.form.elements[ObjID].options[h].value;
					Text = document.form.elements[ObjID].options[h].text;
					j = document.form.elements[DesObjID].options.length;
					K_Select = false;
					if(Code=="" || Text==""){

						K_Select = true;
					}
					for (k=0; k<j; k++ ) {
						if (document.form.elements[DesObjID].options[k].value == Code) {
							K_Select = true;
							break;
						}
					}
					if ( K_Select == false){
						document.form.elements[DesObjID].options[j] = new Option(Text, Code);
					}
					document.form.elements[ObjID].options[h].selected = false;
				}
			}
			document.form.elements[ObjID].options[maxsel].selected =true;
  		}
	}

	function DelItem (ObjName) {
		ObjID = GetID (ObjName);
		min_sel = 0;
		if (ObjID != -1) {
			
			for (i = window.form.elements[ObjID].length - 1; i >= 0; i --) {
				if (window.form.elements[ObjID].options[i].selected) { 
					if (min_sel == 0 || i < min_sel) min_sel = i;
					if(window.form.elements[ObjID].options[i].value!=""){
						window.form.elements[ObjID].options[i] = null;
					}
					
				}
			}
			i = window.form.elements[ObjID].length;
			if ( i > 0) {
				if (min_sel >= i) min_sel=i-1;
				window.form.elements[ObjID].options[min_sel].selected = true;
			}
		}
	}
	
	function SelectAll (ObjName) {
		ObjID = GetID (ObjName);
		if (ObjID != -1) {
			//if(document.form.elements[ObjID].length<1){
			//	alert("请至少选择一个类别!");
			//	return false;
		
			//}
			for (i=0; i<document.form.elements[ObjID].length; i++)
				document.form.elements[ObjID].options[i].selected = true;
		}
	}

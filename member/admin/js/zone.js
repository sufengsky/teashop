function provinceSelChange(selname,index,z)
{	

	pList.getOptionAreasString(index,selname,z,0);

}


function area(name,code) 
{
   this.name=name;
   this.code=code;

}

function province(name,code) 
{
   this.data=new Array();
   this.name=name;
   this.code=code;
   this.add=area_add;

}
function provinceList() 
{
   this.data=new Array();
   this.add=province_add;
   this.addAt=province_addAt;
   this.getOptionString=provinceList_getOptionString;
   this.getOptionAreasString=provinceList_getAreasOptionString;
}
function area_add(area)
{
	this.data[this.data.length]=area;
}
function province_add(province)
{
	this.data[this.data.length]=province;
}
function province_addAt(i,area)
{
	var province=this.data[i];
	province.add(area);
}
function provinceList_getOptionString(n)
{
	var temp="";
	for(var i=0;i<this.data.length;i++){
		if(i==n){
		temp+="<option value="+i+" selected>"+this.data[i].name;
		}else{
		temp+="<option value="+i+">"+this.data[i].name;
		
		}
	}
	return temp;
}
function provinceList_getAreasOptionString(index,selname,z,cs)
{
	var temp="";
	var prov=this.data[index];
	
	if(prov==null || prov.data.length==0)
	{
		
		selname.length=1;
		selname.options[0].text="请选择";
		selname.options[0].value="0";
		return "<option value=no>请选择 </option>";
	}
	selname.length=0;
	for(var i=0;i<prov.data.length;i++)
	{
		if(cs==0){
		selname.length++;
		selname.options[i].text=prov.data[i].name;
		selname.options[i].value=prov.data[i].code;
		}
		if(prov.data[i].code==z){	
			temp+="<option value="+prov.data[i].code+" selected>"+prov.data[i].name+"</option>";
		}else{
			temp+="<option value="+prov.data[i].code+">"+prov.data[i].name+"</option>";
		
		}
	}

	if(prov.data[0].name=="ALL"){
	zonediv.style.visibility="hidden";
	}else{
	zonediv.style.visibility="visible";
	}

	return temp;
}
var pList=new provinceList();

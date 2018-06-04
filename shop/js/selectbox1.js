var nowOpenedSelectBox1 = "";
var mousePosition1 = "";

function selectThisValue1(thisId,thisIndex,thisValue,thisString) {
    var objId = thisId;
    var nowIndex = thisIndex;
    var valueString = thisString;
    var sourceObj = document.getElementById(objId);
    var nowSelectedValue = document.getElementById(objId+"SelectBoxOptionValue1"+nowIndex).value;
    hideOptionLayer1(objId);
    if (sourceObj) sourceObj.value = nowSelectedValue;
    settingValue1(objId,valueString);
    selectBoxFocus1(objId);
    if (sourceObj.onchange) sourceObj.onchange();
}

function settingValue1(thisId,thisString) {
    var objId = thisId;
    var valueString = thisString;
    var selectedArea = document.getElementById(objId+"selectBoxSelectedValue1");
    if (selectedArea) 
	{
		if(navigator.appName.indexOf("Explorer") > -1)
			selectedArea.innerText = valueString;
		else
			selectedArea.textContent = valueString;
	}
}

function viewOptionLayer1(thisId) {
    var objId = thisId;
    var optionLayer = document.getElementById(objId+"selectBoxOptionLayer1");
    if (optionLayer) optionLayer.style.display = "";
    nowOpenedSelectBox1 = objId;
    setmousePosition11("inBox");
}

function hideOptionLayer1(thisId) {
    var objId = thisId;
    var optionLayer = document.getElementById(objId+"selectBoxOptionLayer1");
    if (optionLayer) optionLayer.style.display = "none";
}

function setmousePosition11(thisValue) {
    var positionValue = thisValue;
    mousePosition1 = positionValue;
}

function clickMouse1() {
    if (mousePosition1 == "out") hideOptionLayer1(nowOpenedSelectBox1);
}

function selectBoxFocus1(thisId) {
    var objId = thisId;
    var obj = document.getElementById(objId + "selectBoxSelectedValue1");
    obj.className = "selectBoxSelectedAreaFocus1";
    obj.focus();
}

function selectBoxBlur1(thisId) {
    var objId = thisId;
    var obj = document.getElementById(objId + "selectBoxSelectedValue1");
    obj.className = "selectBoxSelectedArea1";

}

function makeSelectBox1(thisId, imgsrc) {
    var downArrowSrc = imgsrc + "shop/templates/images/down.gif";
    var downArrowSrcWidth = 16;
    var optionHeight = 16;
    var optionMaxNum = 8;
    var optionInnerLayerHeight = "";
    var objId = thisId;
    var obj = document.getElementById(objId);
    var selectBoxWidth = parseInt(obj.style.width);
    var selectBoxHeight = parseInt(obj.style.height);
    if (obj.options.length > optionMaxNum) optionInnerLayerHeight = "height:"+ (optionHeight * optionMaxNum) + "px";
    newSelect  = "<div style=\"float:left;margin:0px 5px 0px 2px;\"><table id='" + objId + "selectBoxOptionLayer1' cellpadding='0' cellspacing='0' border='0' style='position:absolute;z-index:97;display:none;' onMouseOver=\"viewOptionLayer1('"+ objId + "')\" onMouseOut=\"setmousePosition11('out')\">";
    newSelect += "    <tr>";
    newSelect += "        <td height='" + selectBoxHeight + "' style='cursor:hand;' onClick=\"hideOptionLayer1('"+ objId + "')\"></td>";
    newSelect += "    </tr>";
    newSelect += "    <tr>";
    newSelect += "        <td height='1'></td>";
    newSelect += "    </tr>";
    newSelect += "    <tr>";
    newSelect += "        <td bgcolor='#D3D3D3'>";
    newSelect += "        <div class='selectBoxOptionInnerLayer1' style='width:" + (selectBoxWidth) + "px;" + optionInnerLayerHeight + "'>";
    newSelect += "        <table cellpadding='0' cellspacing='0' border='0' width='100%' style='table-layout:fixed;word-break:break-all;'>";
    for (var i=0 ; i < obj.options.length ; i++) {
        var nowValue = obj.options[i].value;
        var nowText = obj.options[i].text;
        newSelect += "            <tr>";
        newSelect += "                <td onMouseOver=this.style.backgroundColor='#e3e9ef';return true;  onMouseOut=this.style.backgroundColor='#FFFFFF';return true; bgcolor=#FFFFFF height='" + optionHeight + "' class='selectBoxOption1' onMouseOver=\"this.className='selectBoxOptionOver1'\" onMouseOut=\"this.className='selectBoxOption1'\" onClick=\"selectThisValue1('"+ objId + "'," + i + ",'" + nowValue + "','" + nowText + "')\" style='cursor:hand;' >" + nowText + "</td>";
        newSelect += "                <input type='hidden' id='"+ objId + "SelectBoxOptionValue1" + i + "' value='" + nowValue + "'>";
        newSelect += "            </tr>";
    }
    newSelect += "        </table>";
    newSelect += "        </div>";
    newSelect += "        </td>";
    newSelect += "    </tr>";
    newSelect += "</table>";
    newSelect += "<table cellpadding='0' cellspacing='1' border='0' bgcolor='#bec3cb' onClick=\"viewOptionLayer1('"+ objId + "')\" style='cursor:hand;border-top:0px #abadb3 solid;'>";
    newSelect += "    <tr>";
    newSelect += "        <td style='padding-left:1px' bgcolor='#FFFFFF'>";
    newSelect += "        <table cellpadding='0' cellspacing='0' border='0'>";
    newSelect += "            <tr>";
    newSelect += "                <td><div id='" + objId + "selectBoxSelectedValue1' class='selectBoxSelectedArea1' style='width:" + (selectBoxWidth - downArrowSrcWidth - 4) + "px;height:" + (selectBoxHeight - 2) + "px;overflow:hidden;' onBlur=\"selectBoxBlur1('" + objId + "')\" ></div></td>";
    newSelect += "                <td><img src='" + downArrowSrc + "' width='" + downArrowSrcWidth + "' border='0'></td>";
    newSelect += "            </tr>";
    newSelect += "        </table>";
    newSelect += "        </td>";
    newSelect += "    </tr>";
    newSelect += "</table></div>";
    document.write(newSelect);
    
    var haveSelectedValue = false;
    for (var i=0 ; i < obj.options.length ; i++) {
        if (obj.options[i].selected == true) {
            haveSelectedValue = true;
            settingValue1(objId,obj.options[i].text);
        }
    }
    if (!haveSelectedValue) settingValue1(objId,obj.options[0].text);

}


document.onmousedown = clickMouse1;


var brOK = true;
var mie = true;
var aver = parseInt(navigator.appVersion.substring(0,1));
var aname = navigator.appName;

//function checkbrOK() {
	//if(aname.indexOf("Internet Explorer") != -1) {
		//if(aver >= 4) brOK = navigator.javaEnabled();
		//mie = true;
	//}
	//if(aname.indexOf("Netscape") != -1) {
		if(aver >= 4) brOK = navigator.javaEnabled();
	//}
//}

var vmin = 2;
var vmax = 5;
var vr = 2;
var timer1;

function Chip(chipname) {
	this.named = chipname;
	this.vx = vmin + vmax * Math.random();
	this.vy = vmin + vmax * Math.random();
	this.w = document.getElementById(chipname).offsetWidth;
	this.h = document.getElementById(chipname).offsetHeight;
	this.xx = 0;
	this.yy = 0;
	this.timer1 = null;
}

function movechip(chipname) {
	if(brOK) {
		eval("chip=" + chipname);
		if(!mie) {
			pageX = window.pageXOffset;
			pageW = window.innerWidth;
			pageY = window.pageYOffset;
			pageH = window.innerHeight;
		} else {
			pageX = document.body.scrollLeft;
			pageW = document.body.clientWidth - 20;
			pageY = document.body.scrollTop;
			pageH = document.body.clientHeight;
		}
		
		chip.xx = chip.xx + chip.vx;
		chip.yy = chip.yy + chip.vy;
		chip.vx += vr * (Math.random() - 0.5);
		chip.vy += vr * (Math.random() - 0.5);
		if(chip.vx > (vmax + vmin))  chip.vx = (vmax + vmin) * 2 - chip.vx;
		if(chip.vx < (-vmax - vmin)) chip.vx = (-vmax - vmin) * 2 - chip.vx;
		if(chip.vy > (vmax + vmin))  chip.vy = (vmax + vmin) * 2 - chip.vy;
		if(chip.vy < (-vmax - vmin)) chip.vy = (-vmax - vmin) * 2 - chip.vy;
		if(chip.xx <= pageX) {
			chip.xx = pageX;
			chip.vx = vmin + vmax * Math.random();
		}
		if(chip.xx >= pageX + pageW - chip.w - 32) {
			chip.xx = pageX + pageW -chip.w - 32;
			chip.vx = -vmin - vmax * Math.random();
		}
		if(chip.yy <= pageY) {
			chip.yy = pageY;
			chip.vy = vmin + vmax * Math.random();
		}
		if(chip.yy >= pageY + pageH - chip.h) {
			chip.yy = pageY + pageH - chip.h;
			chip.vy = -vmin - vmax * Math.random();
		}
		if(!mie) {
			if(document.getElementById){
				document.getElementById(chip.named).style.top = chip.yy;
				document.getElementById(chip.named).style.left = chip.xx;
			}else{
				eval('document.' + chip.named + '.top=' + chip.yy);
				eval('document.' + chip.named + '.left=' + chip.xx);
			}  
		} else {
			eval('document.all.' + chip.named + '.style.pixelLeft=' + chip.xx);
			eval('document.all.' + chip.named + '.style.pixelTop =' + chip.yy);
		}
		chip.timer1 = setTimeout("movechip('" + chip.named + "')",50);
	}
}

function stopme(chipname){
	if(brOK){
		eval("chip=" + chipname);
		if(chip.timer1 != null){
			clearTimeout(chip.timer1)
		}
	}
}

var chip;





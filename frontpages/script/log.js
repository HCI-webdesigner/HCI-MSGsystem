var flag = 0;
var sliderHeight = 300; //滑出层高

//触发函数
function f_s(id) {
	var obj = document.getElementById(id);
	obj.style.display = "block";
	obj.style.height = "1px";

	//逐渐展开
	var changeW = function() {
		var obj_h = parseInt(obj.style.height);
		if (obj_h <= sliderHeight) {
			obj.style.height = (obj_h + Math.ceil((sliderHeight - obj_h) / 30)) + "px";
		} else {
			clearInterval(bw1);
		}
	}
	bw1 = setInterval(changeW, 10);
	
	//如果鼠标离开，停止展开
	if (flag > 0) {
		clearInterval(bw2);
	}
}

//关闭函数
function closeW(id) {
	flag++;
	var obj = document.getElementById(id);
	
	//逐渐收起
	var closeDiv = function() {

		clearInterval(bw1);
		var obj_h = parseInt(obj.style.height);
		if (obj_h > 1) {
			obj.style.height = (obj_h - Math.ceil(obj_h) / 10) + "px";

		} else {
			clearInterval(bw2);
			obj.style.display = "none";
		}
	}
	bw2 = setInterval(closeDiv, 10);
	//alert(flag)
}
//显示函数
function showDiv(id) {
	var ele = document.getElementById(id);
	clearInterval(bw1);
	clearInterval(bw2);
	ele.style.display = "block";
	ele.style.height = sliderHeight + "px";


}
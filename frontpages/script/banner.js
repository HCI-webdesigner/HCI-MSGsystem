var t = 0;
var c;

function slidingClass(id) {
	slidingClass.id = document.getElementById(id);
	slidingClass.timer = "2000";
}

slidingClass.prototype = {
	//获取img的个数
	imgL: function(tag) {
		return slidingClass.id.getElementsByTagName(tag).length;
	},
	//初始隐藏全部图片
	hidden: function() {
		var l = slidingClass.prototype.imgL("img");
		for (i = 0; i < l; i++) {

			if (i != 0) {
				slidingClass.id.getElementsByTagName("img")[i].style.display = "none";
			} else {
				slidingClass.id.getElementsByTagName("img")[i].style.display = "block";
			}
		}
	},
	//隐藏单张
	hidSingle: function(num) {
		slidingClass.id.getElementsByTagName("img")[num].style.display = "none";
	},

	//淡入
	fadeIn: function(num) {
		var v = 0;
		var t = setInterval(function() {
			var id = slidingClass.id.getElementsByTagName("img")[num];
			id.style.display = "block";
			id.style.position = "absolute";
			id.style.zIndex = "9";
			id.filters ? id.style.filter = 'alpha(opacity=' + (v += 1) + ')' : id.style.opacity = (v += 1) / 100;
			if (v >= 100) {
				clearInterval(t);
			}
		}, 10)
	},

	//淡出
	fadeOut: function(){
		var v =100;
		var t = setInterval(function() {
			var id = slidingClass.id.getElementsByTagName("img")[num];
			id.style.display = "block";
			id.style.position = "absolute";
			id.style.zIndex = "9";
			id.filters ? id.style.filter = 'alpha(opacity=' - (v -= 1) + ')' : id.style.opacity = (v -= 1) / 100;
			if (v <= 0) {
				clearInterval(t);
			}
		}, 10)
	}

	//播放
	show: function(num) {
		var l = slidingClass.prototype.imgL("li");
		for (i = 0; i < l; i++) {
			slidingClass.id.getElementsByTagName("li")[i].onclick = function() {
				var t = this.innerHTML - 1;
				slidingClass.prototype.show(t);
				slidingClass.prototype.fadeOut(t);
				slidingClass.prototype.fadeIn(t);
				slidingClass.prototype.hidSingle(t == 0 ? slidingClass.prototype.imgL("img") - 1 : t - 1);
				slidingClass.prototype.show(t);
			}
			if (i != num) {
				slidingClass.id.getElementsByTagName("li")[i].className = "";
				slidingClass.id.getElementsByTagName("img")[i].style.display = "none";
			} else {
				slidingClass.id.getElementsByTagName("li")[i].className = "hove";
			}
		}
	},
	//初始循环 
	loop: function() {
		slidingClass.prototype.show(t);
		slidingClass.prototype.fadeOut(t);
		slidingClass.prototype.fadeIn(t);
		slidingClass.prototype.hidSingle(t == 0 ? slidingClass.prototype.imgL("img") - 1 : t - 1);
		c = setTimeout("slidingClass.prototype.loop()", slidingClass.timer);
		
		t++;
		t = t < slidingClass.prototype.imgL("img") ? t : 0;
		slidingClass.id.onmousemove = function() {
			clearTimeout(c);
		}
		slidingClass.id.onmouseout = function() {
			c = setTimeout("slidingClass.prototype.loop()", slidingClass.timer);
		}
	},
	//初始化
	starte: function() {
		slidingClass.prototype.hidden();
		slidingClass.prototype.loop();
	}
}
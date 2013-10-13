window.onload = function()
{
	logo();
	init();
	rainbowbutton();
}

function logo()
{
	var words = document.getElementById('logoname').getElementsByTagName('span');
	var flag = 1;
	var color = ["cd2b26","e1af00","00a702","02379d","cd2b26","b3b3b3","orange"];
	for (var i = 0; i < words.length; i++) 
	{
		words[i].style.color = color[i];
	};
	var timer = setInterval(
		function()
		{
			for (var i = 0; i < words.length; i++)
			{
				words[i].style.color = color[(flag+i)%7];
			};
			flag = (flag+1)%6;
		},1000);
}

function init()
{
	var color = ["cd2b26","e1af00","00a702","02379d","cd2b26","b3b3b3","orange"];
	var bar = document.getElementById('leftbar');
	var act = document.getElementById('activities');
	var rainbows = document.getElementById('rainbow').getElementsByTagName('div');
	for (var i = 0; i < rainbows.length; i++) {
		rainbows[i].style.width = "80px";
		rainbows[i].style.backgroundColor = color[i%7];
	};
	bar.style.opacity = 1;
	act.style.opacity = 1;
	bar.style.marginLeft = "25px";
	setTimeout(function(){bar.style.marginLeft = "0";},500);
}

function rainbowbutton()
{
	var rainbow = document.getElementById('rainbow');
	var rainbows = document.getElementById('rainbow').getElementsByTagName('div');
	var button = document.getElementById('button');
	rainbow.onmouseover = function()
	{
		if(!this.contains(event.fromElement))
		{
		    for (var i = 0; i < rainbows.length; i++)    
		    	rainbows[i].style.width = "70px";
		    rainbows[4].style.width = "200px";
		    rainbows[4].style.height = "120px";
		    rainbows[4].style.marginTop = "-20px";
		    rainbows[4].style.borderRadius = "10px";
		    setTimeout(function(){button.style.display = "block";},400);
		    setTimeout(function(){button.style.webkitTransform = "rotate(0)";button.style.fontSize="50px"},500);
		

		}
	}
	rainbow.onmouseout = function()
	{
		if(!this.contains(event.toElement))
		{
		    for (var i = 0; i < rainbows.length; i++)
		    	rainbows[i].style.width = "80px";
		    rainbows[4].style.height = "10px";
		    rainbows[4].style.marginTop = "90px";
		    rainbows[4].style.borderRadius = "0";
		    button.style.display = "none";
		    setTimeout(function(){button.style.webkitTransform = "rotate(-360deg)";button.style.fontSize="1px"},500);
		    setTimeout(function(){button.style.display = "none";},400);
	    }
	}
	rainbows[4].onclick = function()
	{
		window.open("http://www.baidu.com","newwindow");
	}
}
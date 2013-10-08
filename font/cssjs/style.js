window.onload = function()
{
	logoChange();
	bounce();
	box3();
	box4();
}

function logoChange()
{
	var logoColor = 0;
	var logo = document.getElementById("logo");
	var timer = setInterval(
		function()
		{
			logoColor = (logoColor + 1) % 4;
			if(logoColor == 0)
				logo.style.backgroundColor = "#00a702";
			else if(logoColor == 1)
				logo.style.backgroundColor = "#02379d";
			else if(logoColor == 2)
				logo.style.backgroundColor = "#cd2b26";
			else if(logoColor == 3)
				logo.style.backgroundColor = "#e1af00";
		},1500);
}


function bounce()
{
	for (var i = 0; i < 9; i++) 
	{
		auxiliary(i);
	};
}
function auxiliary(i)
{
	var imgs = document.getElementById("lefttable").getElementsByTagName("img");
	var trs = document.getElementById("lefttable").getElementsByTagName("tr");
    var tds = trs[i].getElementsByTagName("td");
    var color = "#00a702";
	trs[i].onmouseover = function()
	{
	        var random = Math.random()*4 + 1;
		    imgs[i].src="pic/spin" + Math.floor(random) + ".png";
		    if(Math.floor(random) == 1)
		    	color = "#02379d";
		    else if(Math.floor(random) == 2)
		    	color = "#00a702";
		    else if(Math.floor(random) == 3)
		    	color = "#cd2b26";
		    else if(Math.floor(random) == 4)
		    	color = "#e1af00";
		    tds[1].style.backgroundColor = color;
			imgs[i].style.display = "block";
			imgs[i].className = 'bounce';
			setTimeout(function(){imgs[i].className = '';},1000);
	}
	trs[i].onmouseout = function()
	{
		    tds[1].style.backgroundColor = "#fff";
			imgs[i].style.display = "none";
	}
}




function box3()
{
	var box = document.getElementById("box3");
	var cover = document.getElementById("bottom3");
	var comment = document.getElementById("bottom3").getElementsByTagName("p");
	box.onmouseover = function()
	{
		cover.style.height = "300px";
		setTimeout(function(){comment[0].style.display="block";},200);
	}
	box.onmouseout = function()
	{
		cover.style.height = "10px";
		setTimeout(function(){comment[0].style.display="none";},200);
	}
}

function box4()
{
	var logo = document.getElementById("logoSpin");
	var comment = document.getElementById("bottom4");
	var flag = 1;
	logo.onclick = function()
	{
		if (flag == 1) 
		{

			logo.style.webkitTransform = "rotate(360deg)";
			comment.style.display = "block";
			setTimeout(function() {
				comment.style.width = "320px";
				comment.style.height = "300px";
			}, 100);
			flag = 0;
		} 
		else 
		{
			logo.style.webkitTransform = "rotate(-360deg)";
			comment.style.width = "10px";
			comment.style.height = "10px";
			setTimeout(function() {
				comment.style.display = "none";
			}, 200);
			flag = 1;
		}
	}
}
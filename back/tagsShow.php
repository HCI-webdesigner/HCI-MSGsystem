<?php
include_once('../Controllers/back_tagControl.php');
$tags = getAllTags();
$tagsList = sortTags($tags);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title>标签</title>
	<link rel="stylesheet" type="text/css" href="../public/stylesheets/global.css"/>
	<link rel="stylesheet" type="text/css" href="../public/stylesheets/tags.css"/>
	<script type="text/javascript" src="../public/javascripts/navSlide.js"></script>
	<script type="text/javascript">
	window.onload = function(){
        initSlide(0);
	};
	</script>
</head>
<body>
	<div id="nav">
		<a href="index.html" title="hci活动首页">
			<img width="240" height="100" src="../public/image/box4.png"id="imgIndex">
		</a>
		<div class="menu">
			<div id="menuLabel" style="display:block; ">
				<span></span>
			</div>
			<ul id="menuList">
				<li>
					<a href="index.html">首页</a>
				</li>
				<li>
					<a href="index.html">活动</a>
				</li>
				<li>
					<a href="index.html">活动首页</a>
				</li>
				<li>
					<a href="index.html">首页活动</a>
				</li>
				<li>
					<a href="index.html">活动</a>
				</li>
				<li>
					<a href="index.html">首页</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="mainBox">
		<div id="container">
			<div class="container-header">
				<span class="line"></span>
				<h2 class="content-title">&nbsp;标签导航</h2>
			</div>
			<?php 
				$keys = array_keys($tagsList);
		        for($i=0;$i<count($tagsList);$i++) {
		        	if(count($tagsList[$keys[$i]])>0) {
		            	echo "<div class='tag-tree'><h3>".$keys[$i]."</h3>";
		            	for($j=0;$j<count($tagsList[$keys[$i]]);$j++) {
		            		echo "<ul class='tag-list'><li><a href=''>".$tagsList[$keys[$i]][$j]['name']."</a></li>";
		            	}
		            	echo '</div>';
		        	}
		        }
			?>
		</div>
	</div>
	<div id="footer">
		<ul class="footer-box">
			<li class="footer-from">Powered By - HCI人机交互中心</li>
			<li class="footer-info">
				联系我们&nbsp;|&nbsp;网站地图&nbsp;|&nbsp;返回首页&nbsp;|&nbsp;投诉举报&nbsp;|&nbsp;意见建议<br>
			</li>
		</ul>
	</div>
	<div id="goTopBtn" class="back-to-top">
		<a id="J_BackToTop" href="javascript:void(0)"></a>
	</div>
</body>
</html>
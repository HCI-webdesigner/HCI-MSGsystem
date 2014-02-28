<?php
include_once('Controllers/tagsShow.php');
$tags = getAllTags();
$tagsList = sortTags($tags);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title>标签</title>
	<link rel="stylesheet" type="text/css" href="public/stylesheets/global.css"/>
	<link rel="stylesheet" type="text/css" href="public/stylesheets/tags.css"/>
	<script type="text/javascript" src="public/javascripts/navSlide.js"></script>
	<script type="text/javascript">
	window.onload = function(){
        initSlide(0);
	};
	</script>
</head>
<body>
    <?php include_once('menu.php') ?>
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

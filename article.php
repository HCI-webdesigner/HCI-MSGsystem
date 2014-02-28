<?php
include_once('Controllers/article.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>hci活动正文页</title>
	<link rel="stylesheet" type="text/css" href="public/stylesheets/global.css">
	<link rel="stylesheet" type="text/css" href="public/stylesheets/info.css">
	<script type="text/javascript" src="public/javascripts/navSlide.js"></script>
	<script type="text/javascript" src="public/javascripts/log.js"></script>
	<script type="text/javascript">
	window.onload = function(){
		 //参数为本页面对应导航栏，下标由0起始,首页为0
		 initSlide(2);
    }
	</script>
</head>
<body>
    <?php include_once('menu.php') ?>
	<div id="mainBox">
		<div id="container">
			<div id="content">
				<div class="entry-header clearfix">
					<div class="title-author-time-tags">
                        <h1 class="entry-title"><?=$article['title'] ?></h1>
						<p class="author-time">
							<span>发布者：</span>
                            <a href="" rel="author"><?=$author ?></a>
							|
                            <span>时间：</span> <em><?=$article['createTime'] ?></em>
						</p>
					</div>
				</div>
				<div class="separate-line"></div>
				<div class="entry-content">
                    <?=$article['content'] ?>
				</div>
			</div>
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
		<a id="J_BackToTop" href="javascript:void(0)" style="display: inline;"></a>
	</div>
</body>
</html>

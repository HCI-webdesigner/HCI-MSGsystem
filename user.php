<?php
	include_once "conf/config.php";

	//引入相关模型类
	include_once "Models/user_info.php";
	include_once "Models/article.php";

	$ID = $_GET['id'];
	list($ID,$nickname,$popularity,$registerTime,$signature,$article_count) = user_info::getUserInfo($ID);
	$allrows = article::getArticleInfo($ID);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>hci-user</title>
	<link rel="stylesheet" type="text/css" href="public/stylesheets/global.css">
	<link rel="stylesheet" type="text/css" href="public/stylesheets/user.css">
	<script type="text/javascript" src="public/javascripts/navSlide.js"></script>
	<script type="text/javascript">
	window.onload = function(){
		//本页面对应栏，下标由0起始,首页为0
        initSlide(0);
	};
	</script>
</head>
<body>
	<div id="nav">
		<a href="index.html" title="hci活动首页">
			<img width="240" height="100" src="public/images/box4.png"id="imgIndex">
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
			<div class="user-box">
				<h2 class="nickname"><?=$nickname ?></h2>
				<div class="user-info">
					<img src="image/1.jpg" alt="">
					<ul class="info">
						<li><?=$registerTime ?>加入</li>
						<!-- <li>邮箱: xxx@qq.com</li> -->
					</ul>
					<ul class="status">
						<li><strong><?=$popularity ?></strong>声望值</li>
						<li><strong class="red"><?=$article_count ?></strong>篇文章</li>
					</ul>
					<div class="signature"><?=$signature ?></div>
				</div>
			</div>
			<div class="tag-score"></div>
			<div class="article">
				<div class="article-num"><strong><?=$article_count ?></strong>篇文章</div>
				<?php
				$count = 0;
				foreach($allrows as $row){
				$count ++;
				?>
					<article>
						<div class="item-num">
							<span><?=$count ?></span>
						</div>
						<div class="item-content">
							<a href=""><div class="article-title"><?=$row['title'] ?></div></a>
							<a class="article-content" href=""><?=$row['content'] ?></a>
						</div>
					</article>
				<?php
				}
				?>
				
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
		<a id="J_BackToTop" href="javascript:void(0)"></a>
	</div>
</body>
</html>

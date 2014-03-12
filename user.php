<?php
	include_once "conf/config.php";

	//引入相关模型类
	include_once "Models/user_info.php";
	include_once "Models/article.php";

	if(!$_GET['id']){
		die("出错");
	}
	$ID = $_GET['id'];
	list($ID,$nickname,$popularity,$registerTime,$signature,$article_count) = user_info::getUserInfo($ID);
	$allrows = article::getArticleInfo($ID);
	if(!$allrows){
		$allrows = array();
	}

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
    <?php include_once('menu.php') ?>
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
                            <a href="article.php?id=<?=$row['ID'] ?>"><div class="article-title"><?=$row['title'] ?></div></a>
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

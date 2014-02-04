<?php
include_once('conf/config.php');
include_once('Controllers/newArticle.php');
sys::needLog('login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="public/stylesheets/global.css"/>
	<link rel="stylesheet" type="text/css" href="public/stylesheets/issue.css"/>
	<script type="text/javascript" src="public/javascripts/navSlide.js"></script>
	<script type="text/javascript" src="public/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="public/ueditor/ueditor.all.js"></script>
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
			<form class="editor-content" action="Controllers/newArticle.php" method="post">
				<div class="editor-header">
					<span class="line"></span>
					<h2 class="editor-title">&nbsp;发表文章</h2>
					<input class="issue-title" type="text" name="title">
				</div>
				<textarea name="content" id="editor" cols="30" rows="10"></textarea>
				<div class="tags-content">
					<h2 class="tags-title">添加标签</h2>
					<div>
						<input class="tag" name="tags" type="text" />
						<button class="add-btn" type="button">添加</button>
					</div>
					<ul id="test" class="tags-list">
                        <p>热门标签：</p>
						<li class="tags-list-item">javascript</li>
						<li class="tags-list-item">css</li>
						<li class="tags-list-item">html</li>
						<li class="tags-list-item">php</li>
						<li class="tags-list-item">javascript</li>
						<li class="tags-list-item">css</li>
						<li class="tags-list-item">html</li>
						<li class="tags-list-item">php</li>
						<li class="tags-list-item">css</li>
						<li class="tags-list-item">html</li>
						<li class="tags-list-item">php</li>
						<li class="tags-list-item">php</li>
						<li class="tags-list-item">javascript</li>
						<li class="tags-list-item">css</li>
					</ul>
					<button class="submit-btn" type="button">提交</button>
				</div>
			</form>
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
	<script type="text/javascript">
		var editor = new UE.ui.Editor();
		editor.render('editor');
	</script>
</body>
</html>

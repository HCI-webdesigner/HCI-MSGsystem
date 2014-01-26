<?php
include_once('Controllers/index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="public/stylesheets/global.css">
    <link rel="stylesheet" href="public/stylesheets/index.css">
    <link rel="stylesheet" href="public/stylesheets/slideBox.css">

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
                    <a href="index.php">首页</a>
                </li>
                <?php
                foreach($menus as $item) {
                    echo '<li>';
                    echo '<a href="index.php?t='.$item['ID'].'">'.$item['name'].'</a>';
                    echo '</li>';
                }
                ?>
			</ul>
		</div>
	</div>
	<div id="mainBox">
		<div id="login"><a href="">登入</a>
		</div>
		<div id="container">
            <?php
            if($index==1) {
            ?>
            <div id="topArea">
				<div id="slidebox" class="slideBox">
					<ul class="items">
                        <?php
                        for($i=1;$i<count($slider);++$i) {
                            echo '<li><a href="'.$slider[$i]['link'].'" title="'.$slider[$i]['title'].'"><img src="'.$slider[$i]['img'].'"></a></li>';
                        }
                        ?>
					</ul>
				</div>
				<div class="imgTag">
                    <a href="<?=$slider[0]['link'] ?>"><img src="<?=$slider[0]['img'] ?>"></a>
				</div>
			</div>
            <?php
            }
            ?>
			<div id="mainArea">
				<ul id="boxList">
					<li class="postboxUsual">
						<div class="post-img" >
							<a href="www.baidu.com"><img src="public/images/box1.jpg"></a>
						</div>
						<a class="post-title" href="http://www.baidu.com">例会精彩</a>
						<div class="post-extra">
							<span class="col-left">2013-11-4</span>
							<div class="col-right">
								<a class="like" href="">19喜欢</a>
								<a class="comment" href="">20评论</a>
							</div>
						</div>
					</li>
					<li class="postboxUsual">
						<div class="post-img" >
							<a href="www.baidu.com"><img src="public/images/box2.jpg"></a>
						</div>
						<a class="post-title" href="www.baidu.com">baidu.com</a>
						<div class="post-extra">
							<span class="col-left">2013-11-4</span>
							<div class="col-right">
								<a class="like" href="">19人喜欢</a>
								<a class="comment" href="">20条评论</a>
							</div>
						</div>
					</li>
					<li class="postboxUsual">
						<div class="post-img" >
							<a href="www.baidu.com"><img src="public/images/box1.jpg"></a>
						</div>
						<a class="post-title" href="www.baidu.com">baidu.com</a>
						<div class="post-extra">
							<span class="col-left">2013-11-4</span>
							<div class="col-right">
								<a class="like" href="">19喜欢</a>
								<a class="comment" href="">20评论</a>
							</div>
						</div>
					</li>
					<li class="postboxUsual">
						<div class="post-img" >
							<a href="www.baidu.com"><img src="public/images/box2.jpg"></a>
						</div>
						<a class="post-title" href="www.baidu.com">baidu.com</a>
						<div class="post-extra">
							<span class="col-left">2013-11-4</span>
							<div class="col-right">
								<a class="like" href="">19人喜欢</a>
								<a class="comment" href="">20条评论</a>
							</div>
						</div>
					</li>
					<li class="postboxUsual">
						<div class="post-img" >
							<a href="www.baidu.com"><img src="public/images/box2.jpg"></a>
						</div>
						<a class="post-title" href="www.baidu.com">baidu.com</a>
						<div class="post-extra">
							<span class="col-left">2013-11-4</span>
							<div class="col-right">
								<a class="like" href="">19人喜欢</a>
								<a class="comment" href="">20条评论</a>
							</div>
						</div>
					</li>
					<li class="postboxUsual">
						<div class="post-img" >
							<a href="www.baidu.com"><img src="public/images/box1.jpg"></a>
						</div>
						<a class="post-title" href="www.baidu.com">baidu.com</a>
						<div class="post-extra">
							<span class="col-left">2013-11-4</span>
							<div class="col-right">
								<a class="like" href="">19喜欢</a>
								<a class="comment" href="">20评论</a>
							</div>
						</div>
					</li>
					<li class="postboxUsual">
						<div class="post-img" >
							<a href="www.baidu.com"><img src="public/images/box2.jpg"></a>
						</div>
						<a class="post-title" href="www.baidu.com">baidu.com</a>
						<div class="post-extra">
							<span class="col-left">2013-11-4</span>
							<div class="col-right">
								<a class="like" href="">19人喜欢</a>
								<a class="comment" href="">20条评论</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="pages">
				<ul class="page-box">
					<li class="page-item">1</li>
					<li class="page-item">2</li>
					<li class="page-item">3</li>
					<li class="page-item">4</li>
					<li class="page-item">下一页</li>
				</ul>
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

    <script type="text/javascript" src="public/javascripts/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="public/javascripts/jquery.slideBox.min.js"></script>
    <script type="text/javascript" src="public/javascripts/navSlide.js"></script>
    <script type="text/javascript">
	window.onload = function(){
		//本页面对应栏，下标由0起始,首页为0
        initSlide(0);

        jQuery(function($){
	        $("#slidebox").slideBox({
	           	delay : 5
	    	});
	    });
	};
	</script>
    
</body>
</html>

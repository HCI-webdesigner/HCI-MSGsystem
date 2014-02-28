<?php
include_once('Controllers/index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HCI信息展示平台</title>
    <link rel="stylesheet" href="public/stylesheets/global.css">
    <link rel="stylesheet" href="public/stylesheets/index.css">
    <link rel="stylesheet" href="public/stylesheets/slideBox.css">

</head>
<body>
    <?php include_once('menu.php'); ?>
	<div id="mainBox">
        <?php
        if(sys::hasLogged()) {
        echo '<div class="userBar">欢迎你，'.$_SESSION['nickname'].'，<a href="user.php?id='.$_SESSION['userId'].'" class="ctrlBtn">我的个人信息</a>&nbsp;<a href="newArticle.php" class="ctrlBtn">发表文章</a><a href="Controllers/logout.php" class="ctrlBtn">注销</a></div>';
        }
        else {
            echo '<div class="userBar"><a href="login.php" class="ctrlBtn">登录</a><a href="register.php" class="ctrlBtn">注册</a></div>';
        }
        ?>
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
                    <?php
                    if(count($alist)<=0) {
                        echo '暂时木有文章耶！';
                    }
                    foreach($alist as $item) {
                    ?>
                    <li class="postboxUsual">
						<div class="post-img" >
                            <a href="article.php?id=<?=$item['ID']?>"><img src="<?php echo (tag::getTagImage($item['ID'])==false)?'public/images/topic_img/default.png':tag::getTagImage($item['ID']);?>"></a>
						</div>
                        <a class="post-title" href="article.php?id=<?=$item['ID']?>"><?=$item['title']?></a>
						<div class="post-extra">
                            <span class="col-left"><?=$item['createTime']?></span>
							<div class="col-right">
                                <a class="comment" href=""><?=$item['comment']?>评论</a>
							</div>
						</div>
					</li>
                    <?php
                    }
                    ?>
				</ul>
			</div>
			<div class="pages">
				<ul class="page-box">
                    <?php
                    for($i=1;$i<=$pagecount;++$i) {
                        echo '<li class="page-item">'.$i.'</li>';
                    }
                    ?>
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

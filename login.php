<?php
include_once('conf/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="public/stylesheets/global.css">
	<link rel="stylesheet" href="public/stylesheets/login.css">
	
</head>
<body>
    <?php include_once('menu.php'); ?>
    <div id="mainBox">
        <div id="container">
            <form action="Controllers/checkLog.php" method="post">
            	<div class="form-header">
					<span class="line"></span>
					<h2 class="login-title">&nbsp;登录</h2>
				</div>
                <ul> 
                    <li>
                        <label for="user">邮箱：</label>
                        <input id="user" name="user" type="text" >
                    </li>

                    <li>
                        <label for="password">密码：</label>
                        <input id="password" name="password" type="password">
                    </li>
                    <li>
                        <label for="login-button"></label>
						<button id="login-button" type="submit" name="login-button">登录</button>
                    </li>
                </ul>
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
    <script type="text/javascript" src="public/javascripts/navSlide.js"></script>
    <script type="text/javascript" src="public/javascripts/login.js"></script>
</body>
</html>

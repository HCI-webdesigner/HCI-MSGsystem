<?php
include_once('conf/config.php');
if(sys::hasLogged()) {
    sys::redirect('index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>注册</title>
   	<link rel="stylesheet" type="text/css" href="public/stylesheets/global.css">
	<link rel="stylesheet" type="text/css" href="public/stylesheets/register.css">
    <script type="text/javascript" src="public/javascripts/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="public/javascripts/navSlide.js"></script>
	<script type="text/javascript" src="public/javascripts/register.js"></script>
</head>
<body>
    <?php include_once('menu.php'); ?>
    <div id="mainBox">
	    <div id="container">
            <form action="Controllers/register.php" method="post">
            	<div class="form-header">
					<span class="line"></span>
					<h2 class="register-title">&nbsp;注册</h2>
				</div>
                <ul> 
                    <li>
                        <label for="user">邮箱：</label>
                        <input id="user" name="user" type="text" placeholder="请输入正确格式的邮箱">
                        <span class="prefix">*</span>
                    </li>
                    <li>
                        <label for="password1">密码：</label>
                        <input id="password1" name="password" type="password" placeholder="至少输入6个数字、字符">
                        <span class="prefix">*</span>
                    </li>
                    <li>
                        <label for="password2">重复密码：</label>
                        <input id="password2" name="password2" type="password">
                        <span class="prefix">*</span>
                   	</li>
                    <li>
                        <label for="nickname">昵称：</label>
                        <input id="nickname" name="nickname" type="text">
                        <span class="prefix">*</span>
                  	</li>
                    <li>
                        <label for="signature">个人签名：</label>
						<textarea name="signature" clos="60" rows="4" id="signature" placeholder="个人介绍"></textarea>
                    </li>
                    <li>
                        <label for="attention"></label>
                        <strong>输入框后有红色"*"为必填项</strong>
                    </li>
                    <li>
                        <label for="register"></label>
						<button id="reg-submit" type="reg-submit" name="reg-submit" class="disable" disabled>注册</button>
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
</body>
</html>

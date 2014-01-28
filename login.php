<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="public/stylesheets/global.css">
	<link rel="stylesheet" type="text/css" href="public/stylesheets/login.css">
	<script type="text/javascript" src="public/javascripts/navSlide.js"></script>
    <script type="text/javascript" src="public/javascripts/login.js"></script>
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
</body>
</html>

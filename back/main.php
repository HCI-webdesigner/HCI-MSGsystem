<?php
include_once('../conf/config.php');
//需要管理员权限
sys::needAdmin('index.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>后台管理页面</title>
        <link rel="stylesheet" href="../public/stylesheets/back.css">
    </head>
    <body>
        <div class="board" id="board">
            <nav class="sidebar">
                <h1><a href="main.php">后台管理</a></h1>
                <ul class="control-list">
                    <li><a href="userControl.php" target="framepage">用户管理</a></li>
                    <li><a href="tagControl.php" target="framepage">标签管理</a></li>
                    <li><a href="sliderControl.php" target="framepage">图片轮播管理</a></li>
                </ul>
            </nav>
            <div class="main">
                <iframe id="framepage" src="welcome.php" frameborder="0"></iframe>
            </div>
        </div>
        <script type="text/javascript" src="../public/javascripts/back.js"></script>
    </body>
</html>

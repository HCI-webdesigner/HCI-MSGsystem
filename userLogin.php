<?php
include_once('conf/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="Controllers/userLogin.php">
            账户名（必须为邮箱）：<input type="text" name="user"><br>
            密码：<input type="password" name="password"><br>
            <input type="submit" value="登陆">
        </form>   
    </body>
</html>


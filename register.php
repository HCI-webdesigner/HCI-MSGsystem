﻿<?php
include_once('conf/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="Controllers/register.php">
            账户名（必须为邮箱）：<input type="text" name="user"><br>
            昵称：<input type="text" name="nickname"><br>
            密码：<input type="password" name="password"><br>
            重复：<input type="password" name="pwdrp"><br>
            <input type="submit" value="注册">
        </form>   
    </body>
</html>


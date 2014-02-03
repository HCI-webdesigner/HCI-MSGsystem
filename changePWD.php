<?php
include_once('conf/config.php');
//需要登录
sys::needLog('login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="Controllers/changePWD.php" method="post">
        <input type="password" name="oldpwd">
        <input type="password" name="newpwd">
        <input type="submit" value="change">
    </form>
</body>
</html>

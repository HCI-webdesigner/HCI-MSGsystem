<?php
include_once('Controllers/changeInfo.php');
//需要用户登录
sys::needLog('login.php');
$info = getInfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="Controllers/changeInfo.php" method="post">
        <textarea id="" name="signature" cols="30" rows="10"><?=$info['signature'] ?></textarea>
        <input type="submit" value="修改">
    </form>
</body>
</html>

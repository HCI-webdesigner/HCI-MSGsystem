<?php
include_once('conf/config.php');
if(sys::hasLogged()) {
    sys::redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="Controllers/register.php" method="post">
        <input type="text" name="user">
        <input type="password" name="password">
        <input type="text" name="nickname">
        <textarea id="signature" name="signature" cols="60" rows="10"></textarea>
        <input type="submit" value="提交">
    </form>
</body>
</html>

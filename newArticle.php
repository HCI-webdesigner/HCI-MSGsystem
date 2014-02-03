<?php
include_once('conf/config.php');
sys::needLog('login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="post" action="Controllers/newArticle.php">
        <input type="text" name="title">
        <textarea id="content" name="content" cols="30" rows="10"></textarea>
        <input type="text" name="tags">
        <input type="submit" value="提交">
    </form>
</body>
</html>

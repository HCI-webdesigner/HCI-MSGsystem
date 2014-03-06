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
    <form action="Controllers/changePWD.php" method="post" id="chform">
        <input id="oldpwd" type="password" name="oldpwd">
        <input id="newpwd" type="password" name="newpwd">
        <input type="submit" value="change">
    </form>
    <script type="text/javascript" src="public/javascripts/md5-min.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            chform.addEventListener('submit',chkform);
        }
        function chkform() {
            var o = document.getElementById('oldpwd');
            var n = document.getElementById('newpwd');
            o.value = hex_md5(o.value);
            n.value = hex_md5(n.value);
        } 
    </script>
</body>
</html>

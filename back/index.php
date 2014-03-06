<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        .logform {
            margin: 50px auto;
            background: #F0FFFF;
            color: #1E90FF;
            width: 400px;
            line-height: 50px;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form id="logform" class="logform" method="post" action="../Controllers/back_login.php">
    	账号<input type="text" name="user"><br>
    	密码<input id="pwd" type="password" name="password"><br>
    	<input type="submit" value="登录">
    </form>
    <script type="text/javascript" src="../public/javascripts/md5-min.js"></script>
    <script type="text/javascript">
        var form = document.getElementById('logform');
        form.addEventListener('submit',function() {
            var pwd = document.getElementById('pwd');
            pwd.value = hex_md5(pwd.value);
        });
    </script>
</body>
</html>

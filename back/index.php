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
    <form class="logform" method="post" action="../Controllers/back_login.php">
    	账号<input type="text" name="user"><br>
    	密码<input type="password" name="password"><br>
    	<input type="submit" value="登录">
    </form>
</body>
</html>

<?php
//验证登录
	$name = $_POST["name"];
	$pwd = $_POST["pwd"];
	$pwd = md5($pwd); //加密
	session_start();
	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	$query = "select * from administrator where name='$name'";
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	$arr = array(); //传送json
	if($rows != 0){ //管理员名字正确
		$data = @mysql_fetch_array($result);
		if($data['pwd'] == $pwd){
			$lastLogTime = $data["lastLogTime"]; 
			$lastLogIP = $data["lastLogIP"];
			$_SESSION["lastLogTime"] = $lastLogTime; //向session中传入上次登录时间和IP
			$_SESSION["lastLogIP"] = $lastLogIP;
			//更新上次登录时间和IP
			$logTime = date('Y-m-d H:i:s',time());
			$logIP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
			$logIP = ($logIP) ? $logIP : $_SERVER["REMOTE_ADDR"];
			$query = "update administrator set lastLogTime='$logTime',lastLogIP='$logIP' where name='$name'";
			$result = mysql_query($query);

			$userId = $data['id'];
			$userName = $data['name'];
			$_SESSION["userId"] = $userId;  //向session中传入用户id，是否为管理员,用户名等信息
			$_SESSION["userName"] = $_userName;
			$arr['isSuccess'] = 'true';
			$arr['hint'] = '登录成功';
		}else{
			$arr['isSuccess'] = 'false';
			$arr['hint'] = '密码错误';
		}
	}else{
		$arr['isSuccess'] = 'false';
		$arr['hint'] = '用户名未注册';
	}

	$json_string = json_encode($arr); //$arr包括是否成功登录和提示信息
	echo "$json_string";
?>
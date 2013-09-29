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
	if($rows == 1){ //管理员登录
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
			$isAdmin = 1;
			$userName = $data['name'];
			$_SESSION["userId"] = $userId;  //向session中传入用户id，是否为管理员,用户名等信息
			$_SESSION["isAdmin"] = $isAdmin;
			$_SESSION["userName"] = $_userName;
			Header("Location:index.php");
		}else{
			echo "密码错误";
		}
	}else{ //用户登录
		$query = "select * from user where name='$name'";
		$result = mysql_query($query);
		$rows = @mysql_num_rows($result);
		if($rows == 1){
			$data = @mysql_fetch_array($result);
			if($data['pwd'] == $pwd){
				$lastLogTime = $data["lastLogTime"];
				$lastLogIP = $data["lastLogIP"];
				$_SESSION["lastLogTime"] = $lastLogTime;
				$_SESSION["lastLogIP"] = $lastLogIP;

				$logTime = date('Y-m-d H:i:s',time());
				$logIP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
				$logIP = ($logIP) ? $logIP : $_SERVER["REMOTE_ADDR"];
				$query = "update user set lastLogTime='$logTime',lastLogIP='$logIP' where name='$name'";
				$result = mysql_query($query);

				$userId = $data['id'];
				$isAdmin = 0;
				$userName = $data['name'];
				$_SESSION["userId"] = $userId;
				$_SESSION["isAdmin"] = $isAdmin;
				$_SESSION["userName"] = $_userName;
				Header("Location:index.php");
			}else{
				echo "密码错误";
			}
		}else{
			echo "用户名未注册！";
		}
	}
?>
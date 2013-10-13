<?php
//验证登录
	$name = $_POST["name"];
	$pwd = $_POST["pwd"];
	$pwd = md5($pwd); //加密
	session_start();
	include "../connectSql.php";
	$query = "select * from user where name='$name' and isAdmin=1";
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	$arr = array(); //传送json
	if($rows != 0){
		$data = @mysql_fetch_array($result);
		if($data['pwd'] == $pwd){
			$lastLogTime = $data["lastLogTime"];
			$lastLogIP = $data["lastLogIP"];
			$userId = $data['id'];
			$userName = $data['name'];
			$_SESSION["userId"] = $userId;
			$_SESSION["userName"] = $userName;
			$_SESSION["lastLogTime"] = $lastLogTime;
			$_SESSION["lastLogIP"] = $lastLogIP;

			$logTime = date('Y-m-d H:i:s',time());
    			if (getenv("HTTP_CLIENT_IP"))
        			$logIP = getenv("HTTP_CLIENT_IP");
    			else if(getenv("HTTP_X_FORWARDED_FOR"))
        			$logIP = getenv("HTTP_X_FORWARDED_FOR");
    			else if(getenv("REMOTE_ADDR"))
       		 		$logIP = getenv("REMOTE_ADDR");
    			else
        			$logIP = "Unknow";
			$query = "update user set lastLogTime='$logTime',lastLogIP='$logIP' where name='$name'";
			$result = mysql_query($query);

			$arr['isSuccess'] = 'true';
			$arr['hint'] = 'login succeed';
			$arr['isAdmin'] = 'true';
		}else{
			$arr['isSuccess'] = 'false';
			$arr['hint'] = 'password incorrect';
		}
	}else{
		$arr['isSuccess'] = 'false';
		$arr['hint'] = 'this username is not registered';
	}
	require "../lib/jsonEncode.php";
	echo my_json($arr);
?>
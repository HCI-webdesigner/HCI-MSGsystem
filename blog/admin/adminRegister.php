<?php
//用户注册页面
	$newName = $_POST["name"];
	$pwd = $_POST["pwd"];
	$arr = array(); //传送json
	//判断是否已存在
	include "../connectSql.php";
	$query = "select * from user";
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	$isExist = false;
	for($i=0;$i<$rows;$i++){
		@mysql_data_seek($result,$i);
		$data = @mysql_fetch_array($result);
		$name = $data['name'];
		if($newName == $name){
			$isExist = true; //已存在
			break;
		}
	}
	if(!$isExist){ //注册成功
		$pwd = md5($pwd); //加密
		$query = "insert into user(name,pwd,isAdmin) values('$newName','$pwd',1)";
		$result = mysql_query($query);
		$arr['isSuccess'] = 'true';
	}else{ //已存在
		$arr['isSuccess'] = 'false';
	}
	mysql_close($connect);	 

	require "../lib/jsonEncode.php";
	echo my_json($arr);	 
?>
<?php
//用户注册页面
	$newName = $_GET["name"];
	$pwd = $_GET["pwd"];
	$arr = array(); //传送json
	//判断是否已存在
	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
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
		echo $pwd;
		$query = "insert into user(name,pwd) values('$newName','$pwd')";
		$result = mysql_query($query);
		$arr['isSuccess'] = 'true';
	}else{ //已存在
		$arr['isSuccess'] = 'false';
	}
	mysql_close($connect);	 

	$json_string = json_encode($arr); //$arr包括是否注册成功
	echo "$json_string";
?>
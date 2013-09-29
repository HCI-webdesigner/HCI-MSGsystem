<?php
//用户注册页面
	if(isset($_GET["name"])){
		$newName = $_GET["name"];
		$pwd = $_GET["pwd"];
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
			//Header("Location:login.html");
		}else{ //已存在
			echo "<script language='JavaScript'>";
			echo "alert('此账户已存在')";
			echo "</script>";
		}
		mysql_close($connect);	 
	}
?>
<html>
<body>
	<form action='register.php' method='get'>
	姓名：<input type='text' name='name'/><br/>
	密码：<input type='text' name='pwd'/><br/>
	<input type='submit' value='提交'/>
	</form>
</body>
</html>
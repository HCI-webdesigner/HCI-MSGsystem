<?php
//修改类名
//对应的updateCategory.html需要传入类的id
	$name = $_GET['name']; //新的类名
	$id = $_GET['id'];
	$arr = array(); //传送的json
	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	$query = "select * from category where name='$name'";
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	if($rows == 0){
		$query = "update category set name='$name' where id=$id";
		$result = mysql_query($query);
		$arr['isSuccess'] = 'true';
	}else{
		$arr['isSuccess'] = 'false';
	}
	mysql_close($connect);	
	$json_string = json_encode($arr);
	echo "$json_string";
?>
<?php
//修改类名
//对应的updateCategory.html需要传入类的id
	$name = $_GET['name']; //新的类名
	$id = $_GET['id'];
	$arr = array(); //传送的json
	include "../connectSql.php";
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
	require "../lib/jsonEncode.php";
	echo my_json($arr);
?>
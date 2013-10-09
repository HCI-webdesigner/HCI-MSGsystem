<?php
//添加分类，对应的addCategory.html：若添加二级分类，需获取父类id
//将获取addCategory.html传入的新类名
	$arr = array(); //传送的json
	$parentId = 0;
	if(isset($_GET["parentId"])){
		$parentId = $_GET["parentId"]; //所属父类
	}
	$newCategory = $_GET["newCategory"]; //新的类名
	//查找是否已存在此类名
	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	$query = "select * from category where name='$newCategory'";
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	if($rows == 0){ //插入新类名
		$query = "insert into category(parent_id,name) values('$parentId','$newCategory')";
		$result = mysql_query($query);
		$arr['isSuccess'] = 'true';
	}else{ //已存在
		$arr['isSuccess'] = 'false';
	}
	mysql_close($connect);	
	$json_string = json_encode($arr);
	echo "$json_string";
?>
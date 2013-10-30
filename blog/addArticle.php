<?php
//添加文章页面
//对应的addArticle.html需要先获取所有一级分类和二级分类，做出级联下拉框，以供用户选择
	$arr = array();
	$title = $_GET["title"]; //文章标题
	session_start();
	$userId = $_SESSION["userId"]; //作者id
	$publishDate = date('Y-m-d H:i:s',time()); //发表时间
	$content = $_GET["content"]; //文章内容
	$isDeleted = 0; 
	$categoryName = $_GET["categoryName"]; //类名
	//查找类id
	include "connectSql.php";
	$query = "select * from category where name='$categoryName'";
	$result = mysql_query(($query));
	$data = @mysql_fetch_array($result);
	$categoryId = $data['id'];
	$query = "insert into article(title,user_id,publishDate,content,category_id,isDeleted) values('$title','$userId','$publishDate','$content','$categoryId','$isDeleted')";
	$result = mysql_query($query);
	mysql_close($connect);	
	$arr['title']=$title;
	$arr['userId']=$userId;
	$arr['publishDate']=$publishDate;
	$arr['content']=$content;
	$arr['categoryId']=$categoryId;
	require "lib/jsonEncode.php";
	echo my_json($arr);
?>
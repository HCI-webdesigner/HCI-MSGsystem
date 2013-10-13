<?php
//显示文章内容
	$id = $_GET["id"]; //文章id
	session_start();
	$userId = $_SESSION["userId"]; //用户id
	$arr = array(); //传送的json

	include "connectSql.php";
	$query = "select * from article where id='$id'"; //根据文章id查找
	$result = mysql_query($query);
	$data = @mysql_fetch_array($result);
	$title = $data['title']; //文章标题
	$publishDate = $data['publishDate']; //发表时间
	$content = $data['content']; //文章内容
	$user_id = $data["user_id"]; //作者id
	//查找作者名
	$query = "select * from user where id='$user_id'";
	$result = mysql_query($query);
	$row = @mysql_num_rows($result);
	$data = @mysql_fetch_array($result);
	$author = $data["name"];
	//放入json
	$arr['title'] = $title; //标题
	$arr['author'] = $author; //作者
	$arr['publishDate'] = $publishDate; //发表时间
	$arr['content'] = $content; //文章内容

	mysql_close($connect); 	
	require "lib/jsonEncode.php";
	echo my_json($arr);
?>
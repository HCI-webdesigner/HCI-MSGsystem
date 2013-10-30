<?php
//评论文章
//对应的comment.html会传来评论内容和评论文章的Id
	$arr = array();
	$content=$_GET["content"];
	$articleId=$_GET["id"];
	session_start();
	include "connectSql.php";
	if(!isset($_SESSION["userId"])){
		$userName="匿名";
	}else{
		$userId=$_SESSION["userId"];
		$query="select * from user where id=$userId";
		$result=mysql_query($query);
		$data = @mysql_fetch_array($result);
		$userName=$data['name'];
	}
	$query="insert into comment(content,commentator,article_id) values
('$content','$userName',$articleId)";
	$result = mysql_query($query);
	mysql_close($connect);
	$arr['content']=$content;
	$arr['userName']=$userName;
	$arr['articleId']=$articleId;
	require "lib/jsonEncode.php";
	echo my_json($arr);
?>
	
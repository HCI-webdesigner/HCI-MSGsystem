<?php
//修改博文
//需要传入文章id
	$arr = array(); //传送json
	$id = $_POST["id"]; //文章id
	$newTitle = $_POST["newTitle"]; //新标题
	$newContent = $_POST["newContent"]; //新内容
	date_default_timezone_set("PRC"); 

	include "connectSql.php";
	if(!$connect){
		$arr['isSuccess'] = 'false';
	}else{
		$newPublishDate = date('Y-m-d H:i:s',time()); //更新发表时间
		$query = "update article set title='$newTitle',publishDate='$newPublishDate',content='$newContent' where id=$id";
		$result = mysql_query($query);
		$arr['isSuccess'] = 'true';
	}
	mysql_close($connect);	
	require "lib/jsonEncode.php";
	echo my_json($arr);
?>
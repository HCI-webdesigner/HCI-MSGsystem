<?php
//修改博文页面
	$id = $_POST["id"]; //文章id
	$newTitle = $_POST["newTitle"]; //新标题
	$newContent = $_POST["newContent"]; //新内容
	date_default_timezone_set("PRC"); 

	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	$newPublishDate = date('Y-m-d H:i:s',time()); //更新发表时间
	$query = "update article set title='$newTitle',publishDate='$newPublishDate',content='$newContent' where id=$id";
	$result = mysql_query($query);
	Header("Location:showArticleContent.php?id=".$id);
	mysql_close($connect);	
?>
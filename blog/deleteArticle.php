<?php
//删除页面
	$id = $_GET["id"]; //文章id
	$dbh =mysql_connect("localhost","root","root");  //连接数据库
	if(!$dbh) {
		die("error");
	}
    mysql_select_db("Blog",$dbh);
    $sql ="SELECT * FROM article";
    $rs = mysql_query($sql,$dbh);
    if(!$rs) {
    	die("找不到查询结果!");
    }
	$sql="update article set isDeleted='1' where id='$id'";
	mysql_query($sql,$dbh);
	mysql_close($dbh);  
	Header("Location:index.php");
?>
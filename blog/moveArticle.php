<?php
//分类页面
	$dbh =@mysql_connect("localhost","root","root");  //连接数据库
	if(!$dbh) {
		die("error");
	}
	mysql_select_db("Blog",$dbh);
	$sql ="SELECT * FROM article";
	$rs = mysql_query($sql,$dbh);
	if(!$rs) {
		die("找不到查询结果!");
	}
		        
	$article_id=$_POST["id"]; //文章id
	$categoryName=$_POST["categoryName"]; //所选新类名
	//找出类id
	$sql ="SELECT * FROM category where name='$categoryName'";
	$rs = mysql_query($sql,$dbh);
	$data = @mysql_fetch_array($rs);
	$categoryId = $data["id"];
	//echo $article_id;
	$sql="update article set category_id='$categoryId' where id='$article_id'";
	mysql_query($sql,$dbh);
	mysql_close($dbh);  
	Header("Location:index.php");
?>
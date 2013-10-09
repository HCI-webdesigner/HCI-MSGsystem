<?php
//删除博文
//需要传入文章id
//对应的deleteArticle.html需要先获取所有一级分类和二级分类，做出级联下拉框，以供用户选择
	$id = $_GET["id"]; //文章id
	$arr = array(); //传送json
	$dbh =mysql_connect("localhost","root","root");  //连接数据库
	if(!$dbh) {
    	$arr['isSuccess'] = 'false';	
	}else{
	    mysql_select_db("Blog",$dbh);
	    $sql ="SELECT * FROM article";
	    $rs = mysql_query($sql,$dbh);
	    if(!$rs) {
	    	$arr['isSuccess'] = 'false';
	    }else{
			$sql="update article set isDeleted='1' where id='$id'";
			mysql_query($sql,$dbh);
		}
	}
	mysql_close($dbh);  
	$json_string = json_encode($arr);
	echo "$json_string";
?>
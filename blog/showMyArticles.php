<?php
//我发表过的博文列表
	session_start();
	$userId = $_SESSION["userId"];
	$arr = array(); //传送json,包括所有博文信息:标题，发表时间，类别以及部分内容
	$pageSize = 10;//每页显示条数

	include "connectSql.php";
	//查找作者名
	$query = "select * from user where id='$userId'";
	$result = mysql_query($query);
	$data = @mysql_fetch_array($result);
	$user_name = $data['name'];

	$query = "select * from article where user_Id='$userId' and isDeleted=0";
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	if($rows == 0){
		$arr['isEmpty'] = 'true';//为空
	}else{
		$pageNum = ($rows + $pageSize - 1) / $pageSize;//总页数
		for($i=0;$i<$pageNum;$i++){
			$articles = array(); //每页的所有文章
			for($j=$i*$pageSize;$j<($i+1)*$pageSize&&$j<$rows;$j++){
				@mysql_data_seek($result,$j);
				$data = @mysql_fetch_array($result);
				$id = $data['id']; //文章id
				$title = $data['title']; //文章标题
				$publishDate = $data['publishDate']; //发表时间
				$content = @substr($data['content'],0,100); //文章内容前100个字
				$anArticle = array($title,$user_name,$publishDate,$content); //存储一条博文信息
				$articles[$id] = $anArticle; 
			}
			$arr[$i] = $articles; //逐页加入
		}
	}
	mysql_close($connect);  
	require "lib/jsonEncode.php";
	echo my_json($arr);
?>

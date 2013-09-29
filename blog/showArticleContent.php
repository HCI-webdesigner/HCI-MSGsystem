<?php
	$id = $_GET["id"]; //文章id
	session_start();
	$isAdmin = $_SESSION["isAdmin"]; //是否为管理员
	$userId = $_SESSION["userId"]; //用户id
	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	$query = "select * from article where id='$id'"; //根据文章id查找
	$result = mysql_query($query);
	$data = @mysql_fetch_array($result);
	$title = $data['title']; //文章标题
	$publishDate = $data['publishDate']; //发表时间
	$content = $data['content']; //文章内容
	$categoryId = $data['category_id']; //文章所属类id
	$user_id = $data["user_id"]; //作者id
	//查找作者名
	$query = "select * from administrator where id='$user_id'"; 		
	$result = mysql_query($query);
	$row = @mysql_num_rows($result);
	if($row == 0){
		$query = "select * from user where id='$user_id'";
		$result = mysql_query($query);
	}
	$data = @mysql_fetch_array($result);
	$author = $data["name"];
	//根据文章id找出父类id
	$query = "select * from category where id='$categoryId'"; 
	$result = mysql_query($query);
	$data = @mysql_fetch_array($result);
	$parentId = $data['parent_id']; //父类id
	
	echo "<center>";
	if($isAdmin == 1 || $userId == $user_id){ //管理员或本人才可进行删除，分类，修改操作
		echo "<a href='deleteArticle.php?id=".$id."'>删除</a>"; //删除，传文章id
		//移到其他类
		echo "<form action='moveArticle.php' method='post'>"; 
		echo "<input type='hidden' name='id' value='".$id."'/>"; //传文章id
		echo "移到";
		$allCategorys = array(); //存储所有类名以供选择
		$connect = @mysql_connect("localhost","root","root");
		mysql_select_db("blog",$connect);
		$query = "select * from category where parent_id='$parentId'"; //根据父类查找所有子类
		$result = mysql_query($query);
		$rows = @mysql_num_rows($result);
		for($i=0;$i<$rows;$i++){
			@mysql_data_seek($result,$i);
			$data = @mysql_fetch_array($result);
			array_push($allCategorys,$data['name']);
		}	
		echo "<select name='categoryName'>"; //下拉列表罗列所有类名
		foreach($allCategorys as $name){
			echo "<option value='".$name."'>".$name."</option>";
		}
		echo "<input type='submit' value='确认'/>";
		echo "</form>";
		//修改内容
		echo "<form action='updateArticle.php' method='post'>";
		echo "<input type='hidden' name='id' value='".$id."'/>"; //传文章id
		echo "<input type='text' name='newTitle' value='".$title."'/><br/>"; //传修改后的文章标题
		echo "<h2>作者:".$author."</h2>";
		echo "<h3>发表时间:".$publishDate."</h3>";
		echo "<textarea rows='30',cols='80' name='newContent'>".$content."</textarea><br/>"; //传修改后的内容
		echo "<input type='submit' value='确认'/>";
		echo "</form>";
	}else{ //若非本人也非管理员，则只能看不能动
		echo "<h1>文章标题:".$title."</h1>";
		echo "<h2>作者:".$author."</h2>";
		echo "<h3>发表时间:".$publishDate."</h3>";
		echo "<h4>".$content."</h4>";
	}
	echo "<a href='index.php'>返回主页</a>";
	echo "</center>";
?>
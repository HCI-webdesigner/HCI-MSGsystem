<?php
//登录主页面
	session_start();
	$userId = $_SESSION["userId"]; //用户id
	$isAdmin = $_SESSION["isAdmin"]; //是否为管理员
	$userName = $_SESSION["userName"]; //用户名
	$lastLogTime = $_SESSION["lastLogTime"]; //上次登录时间
	$lastLogIP = $_SESSION["lastLogIP"]; //上次登录IP
	//验证是否已登录
	if($userName == ""){ 
		Header("Location:login.html"); //未登录，跳到登录页面
	}
	if($lastLogTime == ""){
		echo "<center><h1>欢迎您!".$userName.",这是您首次登陆!</h1></center>"; //第一次登陆，上次登录时间为空
	}else{
		echo "<center><h1>欢迎您!".$userName."</h1></center>";
		echo "<center><h2>您上次登录时间为:".$lastLogTime.",IP地址为:".$lastLogIP."</h2></center>";
	}
	//按文章标题搜索文章内容
	echo "<form action='searchArticle.php' method='get'>";
	echo "搜索文章：<input type='text' name='title' value='输入文章标题'>";
	echo "<input type='submit' value='提交'>";
	echo "</form>";

	echo "<ul><li><h2>首页</h2></li>";
	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	$query = "select * from category where parent_id=0"; //搜索所有一级分类
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	for($i=0;$i<$rows;$i++){
		@mysql_data_seek($result,$i);
		$data = @mysql_fetch_array($result);
		echo "<li><h2>".$data['name']."</h2></li>"; //一级分类
		if($isAdmin == 1) //管理员可修改类名
			echo "<h5><a href='updateCategory.php?id=".$data['id']."'>修改类名</a></h5>"; 
		$query1 = "select * from category where parent_id=".$data['id'];//搜索所有二级分类
		$result1 = mysql_query($query1);
		$rows1 = @mysql_num_rows($result1);
		for($j=0;$j<$rows1;$j++){
			@mysql_data_seek($result1,$j);
			$data1 = @mysql_fetch_array($result1);
			//列出二级分类，点击可查看该类所有文章
			echo "<h3><a href='showArticlesTable.php?categoryId=".$data1['id']."'>".$data1['name']."</a></h3>";
			if($isAdmin == 1) //管理员可修改类名
				echo "<h5><a href='updateCategory.php?id=".$data1['id']."'>修改类名</a></h5>";
		}
		if($isAdmin == 1) //管理员可增加二级分类
			echo "<h3><a href='addCategory.php?parentId=".$data['id']."'>添加二级分类</a></h3>";
		//写文章
		if($rows1 != 0)
			echo "<h3><a href='addArticle.php?parentId=".$data['id']."'>写文章</a></h3>";
	}
	if($isAdmin == 1) //管理员可增加一级分类
		echo "<li><h2><a href='addCategory.php'>添加一级分类</a></h2></li>";
	echo "<li><h2><a href='showArticlesTable.php'>我发表过的</a></h2></li></ul>"; //查看我本人发表过的文章
	mysql_close($connect);
?>
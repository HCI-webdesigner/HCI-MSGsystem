<?php
//显示所有文章标题作者时间等信息列表
	session_start();
	$userId = $_SESSION["userId"];
	$showAll = 0; //1表示显示该类所有博文，0表示显示我发表过的
	$categoryId = 0; //类名
	if(isset($_GET["categoryId"]) && $_GET["categoryId"] != 0){ //有传类名，则显示该类所有博文
		$categoryId = $_GET["categoryId"];
		$showAll = 1;
	}
	$allArticles = array(); //存储所有博文信息
	$page_num = 2;//每页显示条数
	$start_num = 0;//第一条编号
	if(isset($_GET["startNum"]))
		$start_num = $_GET["startNum"];

	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	if($showAll == 1) //查找该类中所有博文
		$query = "select * from article where category_id='$categoryId' and isDeleted=0";
	else  //查找本人所有博文
		$query = "select * from article where user_Id='$userId' and isDeleted=0";
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);
	for($i=0;$i<$rows;$i++){
		@mysql_data_seek($result,$i);
		$data = @mysql_fetch_array($result);
		$id = $data['id']; //文章id
		$title = $data['title']; //文章标题
		$user_id = $data['user_id']; //作者id
		//查找作者名
		$query1 = "select * from user where id='$user_id'";
		$result1 = mysql_query($query1);
		$rows1 = @mysql_num_rows($result1);
		if($rows1 == 0){
			$query1 = "select * from administrator where id='$user_id'";
			$result1 = mysql_query($query1);
		}
		$data1 = @mysql_fetch_array($result1);
		$user_name = $data1['name'];
		
		$publishDate = $data['publishDate']; //发表时间
		$anArticle = array($id,$title,$user_name,$publishDate); //存储一条博文信息
		array_push($allArticles,$anArticle);
	}
	mysql_close($connect);
	if($rows == 0){
		if($showAll == 0)
			echo "<h1>您没发表过任何文章！";
		else
			echo "<h1>此类中没有任何文章！";
	}else{
		echo "<center>";
		echo "<table border='1' width='60%'>";
		echo "<tr><th>文章标题</th><th>作者</th><th>发表时间</th>";
		$partialArticles = array_slice($allArticles,$start_num,$page_num); //截取部分博文，实现分页功能
		foreach($partialArticles as $anArticle){
			echo "<tr>";
			reset($anArticle);
			$id = current($anArticle); 
			$title = next($anArticle);
			//点击标题显示博文内容
			echo "<td height='20'><a href='showArticleContent.php?id=".$id."'>".$title."</a></td>";
			next($anArticle);
			while(list($key2,$val)=each($anArticle)){
				echo "<td height='20'>".$val."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		if($start_num - $page_num < 0){
			$startNum = 0;
		}else{
			$startNum = $start_num - $page_num;
		}
		if($start_num + $page_num > $rows){
			$endNum = $start_num;
		}else{
			$endNum = $start_num + $page_num;
		}
		echo "<br/>";
		echo "<a href='showArticlesTable.php?startNum=$startNum&categoryId=$categoryId'>上一页</a>";
		echo "<a href='showArticlesTable.php?startNum=$endNum&categoryId=$categoryId'>下一页</a><br/>";
		echo "<br/><a href='index.php'>返回主页</a>";
		echo "</center>";
	}
?>

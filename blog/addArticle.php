<?php
//添加文章页面
	if(isset($_GET["parentId"])){
		$parentId = $_GET["parentId"]; //所属父类
	}
	if(isset($_GET["content"])){
		$title = $_GET["title"]; //文章标题
		session_start();
		$userId = $_SESSION["userId"]; //作者id
		$publishDate = date('Y-m-d H:i:s',time()); //发表时间
		$content = $_GET["content"]; //文章内容
		$isDeleted = 0; 
		$categoryName = $_GET["categoryName"]; //类名
		//查找类id
		$connect = @mysql_connect("localhost","root","root");
		mysql_select_db("blog",$connect);
		$query = "select * from category where name='$categoryName'";
		$result = mysql_query(($query));
		$data = @mysql_fetch_array($result);
		$categoryId = $data['id'];
		$query = "insert into article(title,user_id,publishDate,content,category_id,isDeleted) values('$title','$userId','$publishDate','$content','$categoryId','$isDeleted')";
		$result = mysql_query($query);
		mysql_close($connect);	
		Header("Location:index.php");
	}	
?>
<html>
<body>
<center>
	<form action="addArticle.php" method="get">
		<textarea rows="1" cols="80" name="title"></textarea><br/>
		<textarea rows="30" cols="80" name="content"></textarea><br/>
		<?php
			$allCategorys = array(); //根据父类查询所有子类并以下拉列表形式供选择
			$connect = @mysql_connect("localhost","root","root");
			mysql_select_db("blog",$connect);
			$query = "select * from category where parent_id='$parentId'";
			$result = mysql_query($query);
			$rows = @mysql_num_rows($result);
			for($i=0;$i<$rows;$i++){
				@mysql_data_seek($result,$i);
				$data = @mysql_fetch_array($result);
				array_push($allCategorys,$data['name']);
			}	
			mysql_close();	
		?>
		<select name="categoryName">
		<?php
			foreach($allCategorys as $name){
		?>
			<option value="<?php echo $name?>"><?php echo $name?></option>
		<?php
			}
		?>
		</select>
		<input type="submit" value="提交"/>
	</form>
</center>
</body>
</html>
<?php
	$id = $_GET['id'];
	if(isset($_GET['name'])){
		$name = $_GET['name'];
		$id = $_GET['id'];
		$connect = @mysql_connect("localhost","root","root");
		mysql_select_db("blog",$connect);
		$query = "select * from category where name='$name'";
		$result = mysql_query($query);
		$rows = @mysql_num_rows($result);
		if($rows == 0){
			$query = "update category set name='$name' where id=$id";
			$result = mysql_query($query);
			Header("Location:index.php");
		}else{
			echo "该类名已存在！";
		}
		mysql_close($connect);	
	}
?>
<html>
<body>
	<form action="updateCategory.php" method="get">
		<input type="text" name="name" value="输入新的类名"/><br/>
		<input type="hidden" name="id" value="<?php echo $id ?>"/>
		<input type="submit" value="提交"/>
	</form>
</body>
</html>
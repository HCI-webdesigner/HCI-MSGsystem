<?php
//添加分类
	$parentId = 0;
	if(isset($_GET["parentId"])){
		$parentId = $_GET["parentId"]; //所属父类
	}
	if(isset($_GET["newCategory"])){
		$newCategory = $_GET["newCategory"]; //新的类名
		//查找是否已存在此类名
		$connect = @mysql_connect("localhost","root","root");
		mysql_select_db("blog",$connect);
		$query = "select * from category where name='$newCategory'";
		$result = mysql_query($query);
		$rows = @mysql_num_rows($result);
		if($rows == 0){ //插入新类名
			$query = "insert into category(parent_id,name) values('$parentId','$newCategory')";
			$result = mysql_query($query);
			Header("Location:index.php");
		}else{ //已存在
			echo "该分类已存在！";
		}
		mysql_close($connect);	
	}
?>
<html>
<body>
<form action='addCategory.php' method='get'> 
	<input type='hidden' name='parentId' value='<?php echo $parentId ?>'/>
	分类名：<input type='text' name='newCategory'/><br/>
	<input type='submit' value='提交'/>
</form>
</body>
</html>
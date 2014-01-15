<?php
//引用相关模块
include_once("../conf/config.php");
include_once("../Models/user_info.php");

//GET方法得到参数
$user_id=$_GET['user_id'];

//根据user_id得到数据库对应的数组
$array=user_info::getOthersById($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="modifyInfo.php" method="POST">
	<table border="1" width="80%" align="center">
		<tr user_id="trHead">
			<td>user_id</td>
			<td>nickname</td>
			<td>popularity</td>
			<td>registerTime</td>
			<td>signature</td>
			<td>article_count</td>
		</tr>
		<tr >
			<td><input name="user_id" readonly="readonly" type="text" value="<?php echo $array['user_id'] ?>" />
			</td>
			<td><input name="nickname" type="text" value="<?php echo $array['nickname'] ?>" />
			</td>
			<td><input name="popularity" readonly="readonly" type="text" value="<?php echo $array['popularity'] ?>" />
			</td>
			<td><input name="registerTime" readonly="readonly" type="text" value="<?php echo $array['registerTime'] ?>" />
			</td>
			<td><input name="signature" type="text" value="<?php echo $array['signature'] ?>" />
			</td>
			<td><input name="article_count" readonly="readonly" type="text" value="<?php echo $array['article_count'] ?>" />
			</td>
		</tr>	
	</table>
	<button type="submit">保存</button>
</form>

</body>
</html>
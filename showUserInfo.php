<?php
/*
*负责修改个人信息
*Create By 关丽莎 at 2014-1-14
*/

//引入相关模型类
include_once("conf/config.php");
include_once("./Models/user_info.php");

//得到user_info里面的所有信息
$arr = user_info::getAllInfo(); 
//计算有多少条记录
$num=count($arr);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
        <!--列出信息-->
	<table border="1" width="80%" align="center">
		<tr user_id="trHead">
			<td>user_id</td>
			<td>nickname</td>
			<td>popularity</td>
			<td>registerTime</td>
			<td>signature</td>
			<td>article_count</td>
		</tr>
		<?php
		for ($i=0;$i<$num;$i++) {
		?>
		<tr >
			<td>
				<a href="Controllers/showUserInfo.php?user_id=<?php echo $arr[$i]['user_id'] ?>">
					<?php echo $arr[$i]['user_id'] ?></a>
			</td>
			<td><?php echo $arr[$i]['nickname'] ?></td>
			<td><?php echo $arr[$i]['popularity'] ?></td>
			<td><?php echo $arr[$i]['registerTime'] ?></td>
			<td><?php echo $arr[$i]['signature'] ?></td>
			<td><?php echo $arr[$i]['article_count'] ?></td>
		</tr>	
		<?php
		}
		?>
	</table>
</body>
</html>
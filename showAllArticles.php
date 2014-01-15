<?php
include_once("conf/config.php");
include_once("Controllers/showAllArticles.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <center>
    	<table border='1' width='60%'>
    		<tr>
    			<th>文章编号</th>
    			<th>标题</th>
    			<th>创建时间</th>
    			<th>上次修改时间</th>
    			<th>作者</th>
    			<th>标签</th>
    		</tr>
    		<?php
    			foreach($articleMsgs as $row) {   
    		?>
    		<tr>
    			<td><a href="readArticle.php?articleId=<?php echo $row['ID'
                ]?>"><?php echo $row['ID']?></a></td>
    			<td><?php echo $row['title']?></td>
    			<td><?php echo $row['createTime']?></td>
    			<td><?php echo $row['lastModifyTime']?></td>
    			<td><?php echo $row['nickName']?></td>
    			<td>
    				<?php
						foreach($articleTags[$row['ID']] as $tag) {
							echo $tag['tag_id'].",";
						}
    				?>
    			</td>
    		</tr>
    		<?php
    		}
    		?>
    	</table>
    	<a href="showAllArticles.php?startNum=<?php echo $startNum-$pageNum?>">上一页</a>
    	<a href="showAllArticles.php?startNum=<?php echo $startNum+$pageNum?>">下一页</a>
    </center>
</body>
</html>

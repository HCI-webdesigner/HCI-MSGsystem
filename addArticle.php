<?php
include_once('conf/config.php');
include_once('Controllers/getAllFormalTag.php');
?>
<form method="post" action="Controllers/addArticle.php">
	标题:<textarea rows="1" cols="80" name="title"></textarea><br/>
	内容:<textarea rows="30" cols="80" name="content"></textarea><br/>
	选择标签:<br/>
	<?php
	global $arr;
	foreach($arr as $value){ 
	?>
	<input type="checkbox" name="formaltag[]" value="<?php echo $value?>">
	<?php 
		echo $value;
	}
	?>
	<br/>自定义标签:<br/>
	<input type='text' name='customtag'/><br/>
	<input type="submit" value="submit"/>
</form>





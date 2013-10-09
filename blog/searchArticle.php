<?php
//搜索文章
	$dbh =mysql_connect("localhost","root","root");  //连接数据库
	$arr = array();
	if(!$dbh) {
    		$arr['isSuccess'] = 'false';	
	}
    mysql_select_db("Blog",$dbh);
    $sql ="SELECT * FROM article where isDeleted=0";
    $rs = mysql_query($sql,$dbh);
    if(!$rs) {
    	$arr['isSuccess'] = 'false';
    }
    $title=$_GET["title"];
	while($row=mysql_fetch_row($rs))
	{
		if($title==$row[1])
		{
			$id = $row[0];
			Header("Location:showArticleContent.php?id=$id");
		}
	}
	mysql_close($dbh);

	$json_string = json_encode($arr);
	echo "$json_string";
?>
<?php
//搜索文章
	include "connectSql.php";
	$arr = array();
    $sql ="SELECT * FROM article where isDeleted=0";
    $rs = mysql_query($sql,$connect);
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
	mysql_close($connect);

	require "lib/jsonEncode.php";
	echo my_json($arr);
?>
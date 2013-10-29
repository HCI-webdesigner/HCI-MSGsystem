<?php
//阅读量
	$id =$_GET["id"];
	$arr =array();
	include "connectSql.php";
	$sql ="select * from article where id='$id' ";
	$rs=mysql_query($sql,$connect);
	if(!$rs) {
		$arr['isSuccess'] = 'false';
	}else {
		$s="update article set r_number=r_number+1";
		//echo "ok2";
		mysql_query($s,$connect);
	}
	mysql_close($connect);	
	require "lib/jsonEncode.php";
	echo my_json($arr);
?>
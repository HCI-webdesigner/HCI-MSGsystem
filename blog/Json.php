<?php
//传给主页面的json
	session_start();
	$userName = $_SESSION["userName"]; //用户名
	$lastLogTime = $_SESSION["lastLogTime"]; //上次登录时间
	$lastLogIP = $_SESSION["lastLogIP"]; //上次登录IP

	$connect = @mysql_connect("localhost","root","root");
	mysql_select_db("blog",$connect);
	$query = "select * from category where parent_id=0"; //搜索所有一级分类
	$result = mysql_query($query);
	$rows = @mysql_num_rows($result);

	$arr = array(
		'userName'=>$userName,  //用户名
		'lastLogTime'=>$lastLogTime,  //上次登录时间
		'lastLogIP'=>$lastLogIP  //上次登录IP
	);
	for($i=0;$i<$rows;$i++){
		@mysql_data_seek($result,$i);
		$data = @mysql_fetch_array($result);
		$lev1 = array(); //一级分类
		$lev1Name = $data['name'];
		$lev1['id'] = $data['id']; //一级分类的id

		$query1 = "select * from category where parent_id=".$data['id'];//搜索所有二级分类
		$result1 = mysql_query($query1);
		$rows1 = @mysql_num_rows($result1);
		for($j=0;$j<$rows1;$j++){
			@mysql_data_seek($result1,$j);
			$data1 = @mysql_fetch_array($result1);
			$lev2 = array(); //二级分类
			$lev2Name = $data1['name'];
			$lev2['id'] = $data1['id']; //二级分类的id
			$lev1[$lev2Name] = $lev2; 
		}
		$arr[$lev1Name] = $lev1;
	}

	$json_string = json_encode($arr);
	echo "$json_string";
?>
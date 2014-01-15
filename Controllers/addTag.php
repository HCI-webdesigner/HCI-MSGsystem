<?php 
/*
*管理员添加标签功能
*Create By 关丽莎 at 2014-1-14
*
*/
//引用相关模块
include_once('../conf/config.php');
include_once('../Models/tag.php');
include_once('../Models/user_basic.php');

//传来3个参数，name为添加的标签名
$name=$_POST['name'];
$user=$_POST['user'];
$password=$_POST['password'];

if(!isset($_POST['name'])||empty($_POST['name'])
	|| !isset($_POST['user'])||empty($_POST['user'])
	||!isset($_POST['password'])||empty($_POST['password'])) {
    echo '参数不完整！';
}

if(user_basic::search($user,$password,1) == true) {
	try {
		tag::add($name, 1);
	}catch(PDOException $e) {
		echo $e;
	}
}
?>
<?php
/*
 * userLogin.php
 * 负责处理用户登陆
 * Created By 郑俊燕 at 2014-1-13
 */

//引入相关模型类
include_once('../Models/user_basic.php');
include_once('../Models/user_info.php');

//检查POST参数的完整性性
if(!isset($_POST['user'])||empty($_POST['user'])
    ||!isset($_POST['password'])||empty($_POST['password'])) {
    echo '表单参数不完整！';
}

//验证登陆
$user = $_POST['user'];
$password = $_POST['password'];
if (user_basic::verify($user,$password) == true) {
	$userId = user_basic::getIdByUser($user);
	$_SESSION["userId"] = $userId; //将用户id放入session
	include_once('../modifyArticle.php'); //进入修改文章页面
} else {
	echo "fail";
}
?>

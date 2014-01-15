<?php
/*
*log.php
*负责登录
*Create By 关丽莎 at 2014-1-13
*/

//引用相关模块
include_once('../Models/user_basic.php');
<<<<<<< HEAD
=======
include_once('../Models/user_info.php');
>>>>>>> fb8a0b816cdef39f6955b4c6dae43822ccbbe9d7

//检查POST参数的完整性
if(!isset($_POST['user']) || empty($_POST['user'])
	|| !isset($_POST['password']) || empty($_POST['password'])) {
	echo '表单参数不完整！';
}

//检查用户名的合法性
$user = $_POST['user'];
$password = $_POST['password'];
//$password = md5($password);

<<<<<<< HEAD
if(user_basic::search($user,$password,1) == true ) {
=======
if(user_basic::search($user,$password) == true ) {
>>>>>>> fb8a0b816cdef39f6955b4c6dae43822ccbbe9d7
	echo "登录成功！";
}else {
	echo "登录失败！";
}

?>
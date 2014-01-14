<?php
/*
 * register.php
 * 负责处理注册信息
 * Created By 郑俊燕 at 2014-1-12
 */

//引入相关模型类
include_once('../Models/user_basic.php');
include_once('../Models/user_info.php');

//检查POST参数的完整性性
if(!isset($_POST['user'])||empty($_POST['user'])
    ||!isset($_POST['nickname'])||empty($_POST['nickname'])
    ||!isset($_POST['password'])||empty($_POST['password'])) {
    echo '表单参数不完整！';
}

//检查用户名的合法性
$user = $_POST['user'];
if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$user)&&user_basic::isExist($user)==false) {
	$pwd = $_POST['password'];
	$nickname = $_POST['nickname'];
	$isAdmin = 0;
	$registerTime = date('Y-m-d H:i:s',time());
    user_basic::add($user,md5($pwd),$isAdmin);
    //获取用户ID
	$user_id = user_basic::getIdByUser($user);
    user_info::add($user_id['ID'],$nickname,$registerTime);
}
else{
	echo "注册失败！";
}
?>

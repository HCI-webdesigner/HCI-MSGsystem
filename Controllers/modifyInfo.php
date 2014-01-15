<?php
//引用相关模块
include_once("../conf/config.php");
include_once("../Models/user_info.php");

//得到POST方法参数
$user_id=$_POST['user_id'];
$nickname=$_POST['nickname'];
$signature=$_POST['signature'];

//判断是否更新成功
<<<<<<< HEAD
if(isset($_POST['nickname']))
	user_info::updateNickName($user_id,$nickname);
if(isset($_POST['signature']))
	user_info::updateSignature($user_id,$signature);
=======
if(user_info::setUserInfo($user_id,$nickname,$signature) == true) {
	echo "成功更新！";
}
>>>>>>> fb8a0b816cdef39f6955b4c6dae43822ccbbe9d7
?>
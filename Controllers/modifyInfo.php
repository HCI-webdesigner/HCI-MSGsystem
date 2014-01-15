<?php
//引用相关模块
include_once("../conf/config.php");
include_once("../Models/user_info.php");

//得到POST方法参数
$user_id=$_POST['user_id'];
$nickname=$_POST['nickname'];
$signature=$_POST['signature'];

//判断是否更新成功
if(user_info::setUserInfo($user_id,$nickname,$signature) == true) {
	echo "成功更新！";
}
?>
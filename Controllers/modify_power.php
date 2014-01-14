<?php
/*
*修改用户权限
*Create By 关丽莎 at 2014-1-13
*/

//引用相关模块
include_once('../conf/config.php');
include_once('../Models/user_basic.php');

//检查POST参数的完整性性
if(!isset($_POST['user'])||empty($_POST['user'])
    ||!isset($_POST['password'])||empty($_POST['password'])) {
    echo '表单参数不完整！';
}

$user= $_POST['user'];
$password = $_POST['password'];

if(user_basic::searchUser($user,$password) == true ) {
	try {
		$id = user_basic::getIdByUser($user);
		$isAdmin= user_basic::getIsAdmin($id);
		if(user_basic::modifyPower($isAdmin)==true) {
			echo "修改权限成功!";
		}else {
			echo "修改权限失败!";
		}
	}catch(PDOException $e) {
		echo '$e';
	}
}

?>
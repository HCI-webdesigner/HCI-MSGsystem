<?php
include_once("../conf/config.php");

class user_fit {
	/*
	*构造函数
	*/
	function _construct() {
	}

	/*
	*search方法
	*查找表中的记录
	*@param $user string 用户名
	*@param $password string 密码
	*@param $isAdmin int{0,1}是否为管理员
	*@return boolean
	*/
	static function search($user,$password) {
		global $db;
		try {
			$rs = $db->prepare('select user,password from user_basic 
				where user=? and password=? and isAdmin=1');
			$rs->execute(array($user,$password));
			if($rs->fetch() != false) {
				return true;
			}else {
				return false;
			}
		}catch(PDOException $e) {
			echo $e;
		}
		
	}
}
?>
<?php

class user_info {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中添加一条记录
     * @param $user_id int 用户ID
     * @param $nickname string 用户昵称
     * @param $registerTime string 注册时间
     * @return NULL
     */
    static function add($user_id,$nickname,$registerTime) {
        global $db;
        try {
            $rs = $db->prepare('insert into user_info(user_id,nickname,registerTime) values(?,?,?)');
            $rs->execute(array($user_id,$nickname,$registerTime));
            echo '添加记录成功！';
        } catch(PDOException $e) {
            echo $e;
        }
    }




     /*
     * getAllInfo方法
     * 获取所有个人信息
     * 无参数
     * return array 所有个人信息
     */
    static function getAllInfo() {
        global $db;
        $arr = array();
        try {
            $rs = $db->prepare('select * from user_info');
            $rs ->execute();
            return $rs->fetchAll();
        } catch(PDOException $e) {
            echo $e;
        }
    }

	/*
	*searchId方法
	*查找表中的记录
	*@param $user_id int 标识符
	*@return 表的记录
	*/
	static function searchId($user_id) {
		global $db;
		try {
			$rs = $db->prepare('select * from user_info where user_id=? ');
			$rs->execute(array($user_id));
			return $rs->fetchAll();
		}catch(PDOException $e) {
			echo $e;
		}
	}

    /*
    *setUserInfo方法
    *更新表中的记录
    *@param $user_id int 标识符
    *@param $nickname String 别名
    *@param $signature String 签名
    *@return boolean
    */
    static function setUserInfo($user_id,$nickname,$signature) {
        global $db;
        try {
            $rs = $db->prepare('update user_info set nickname=?,
                signature=? where user_id=? ');
            $rs->execute(array($nickname, $signature, $user_id));
            return true;
        }catch(PDOException $e) {
            echo $e;
            return false;
        }
    }
}


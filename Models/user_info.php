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
     * getNickNameById方法
     * 根据用户id获取用户昵称
     * @param $userId int 用户id
     * @return nickName string 昵称
     */
    static function getNickNameById($userId) {
        global $db;
        try {
            $rs = $db->prepare('select nickname from user_info where user_id=?');
            $rs->execute(array($userId));
            $row = $rs->fetch();
            return $row['nickname'];
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
    *getOthersById方法
    *查找表中的记录
    *@param $user_id int 标识符
    *@return 表的记录
    */
    static function getOthersById($user_id) {
        global $db;
        try {
            $rs = $db->prepare('select * from user_info where user_id=? ');
            $rs->execute(array($user_id));
            return $rs->fetch();
        }catch(PDOException $e) {
            echo $e;
        }
    }

    /*
    *updateNickName方法
    *更新表中的记录
    *@param $user_id int 标识符
    *@param $nickname String 别名
    *@return boolean
    */
    static function updateNickName($user_id,$nickname) {
        global $db;
        try {
            $rs = $db->prepare('update user_info set nickname=? where user_id=? ');
            $rs->execute(array($nickname, $user_id));
            echo "更新昵称成功";
        }catch(PDOException $e) {
            echo $e;
        }
    }

    /*
    *updateSignature方法
    *更新表中的记录
    *@param $user_id int 标识符
    *@param $signature String 签名
    *@return boolean
    */
    static function updateSignature($user_id,$signature) {
        global $db;
        try {
            $rs = $db->prepare('update user_info set signature=? where user_id=? ');
            $rs->execute(array($signature, $user_id));
            echo "更新签名成功";
        }catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * isExist方法
     * 判断用户昵称是否存在
     * @param $nickname string 用户昵称
     * @return boolean
     */
    static function isExist($nickname) {
        global $db;
        try {
            $rs = $db->prepare('select * from user_info where nickname=?');
            $rs->execute(array($nickname));
            if($rs->fetch()!=false) {
                return true;
            }
            else {
                return false;
            }
        } catch(PDOException $e) {
            echo $e;
        }
    }
}


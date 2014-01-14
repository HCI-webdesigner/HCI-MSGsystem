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
}


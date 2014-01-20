<?php
class user_info {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中添加一条新记录
     * @author C860
     * @param $ID int 用户ID
     * @param $nickname string 用户昵称
     * @param $registerTime string 注册时间
     * @param $signature string 用户个性签名
     * @return boolean
     */
    static function add($ID,$nickname,$registerTime,$signature) {
        global $db;
        try {
            $query = $db->prepare('insert into user_info (user_id,nickname,registerTime,signature)values(?,?,?,?)');
            $query->execute(array($ID,$nickname,$registerTime,$signature));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * nicknameExist
     * 检测相应昵称是否存在
     * @author C860
     * @param $nickname string 昵称
     * @return boolean
     */
    static function nicknameExist($nickname) {
        global $db;
        try {
            $query = $db->prepare('select * from user_info where nickname=?');
            $query->execute(array($nickname));
            if($query->rowCount()>0) {
                return true;
            }
            else {
                return false;
            }
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * getNickname方法
     * 根据用户ID获取用户昵称
     * @author C860
     * @param $ID int 用户ID
     * @return string|false
     */
    static function getNickname($ID) {
        global $db;
        try {
            $query = $db->prepare('select nickname from user_info where user_id=?');
            $query->execute(array($ID));
            if($query->rowCount()>0) {
                return $query->fetch()[0];
            }
            else {
                return false;
            }
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * increaseArticleCount方法
     * 用户发表文章数目自增
     * @author C860
     * @param $ID int 用户ID
     * @return boolean
     */
    static function increaseArticleCount($ID) {
        global $db;
        try {
            //发表一篇文章积分+5
            $query = $db->prepare('update user_info set article_count=article_count+1,popularity=popularity+5 where user_id=?');
            $query->execute(array($ID));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }
}


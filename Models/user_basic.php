<?php
include_once("../conf/config.php");

class user_basic {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中添加一条记录
     * @param $user string 用户名
     * @param $password string 密码
     * @param $isAdmin int{0,1} 是否为管理员
     * @return NULL
     */
    static function add($user,$password,$isAdmin) {
        global $db;
        try {
            $rs = $db->prepare('insert into user_basic(user,password,isAdmin) values(?,?,?)');
            $rs->execute(array($user,$password,$isAdmin));
            echo '添加用户成功！';
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getIdByUser方法
     * 根据用户名获取用户的ID
     * @param $user string 用户名
     * return int 记录
     */
    static function getIdByUser($user){
        global $db;
        try {
            $rs = $db->prepare('select ID from user_basic where user=?');
            $rs->execute(array($user));
            $row = $rs->fetch();
            return $row['ID'];
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getUserById方法
     * 根据用户ID获取用户名
     * @param $userId int 用户id
     * @return string 用户名
     */
     static function getUserById($userId) {
        global $db;
        try {
            $rs = $db->prepare('select user from user_basic where ID=?');
            $rs->execute(array($userId));
            $row = $rs->fetch();
            return $row['user'];
        } catch(PDOException $e) {
            echo $e;
        }
     } 

    /*
     * isExist方法
     * 判断用户名是否存在
     * @param $user string 用户名
     * @return boolean
     */
    static function isExist($user) {
        global $db;
        try {
            $rs = $db->prepare('select * from user_basic where user=?');
            $rs->execute(array($user));
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

    /*
     *verify方法
     *验证是否登陆成功
     *@param $user string 用户名
     *@param $password 密码
     *@return boolean
     */
    static function verify($user, $password) {
        global $db;
        try{
            $rs = $db->prepare('select * from user_basic where user=? and password=?');
            $rs->execute(array($user, md5($password)));
            if($rs->fetch() != false) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo $e;
        }
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
            $rs = $db->prepare('select * from user_basic where user=? 
                and password=? and isAdmin=1 ');
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

    /*
    *searchUser方法
    *查找表中的记录
    *@param $user string 用户名
    *@param $password string 密码
    *@param $isAdmin int{0,1}是否为管理员
    *@return boolean
    */
    static function searchUser($user,$password) {
        global $db;
        try {
            $rs = $db->prepare('select * from user_basic where user=? and password=? ');
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


    /*
    *getIsAdmin方法
    *查找表中的记录
    *@param $id int 
    *@return isAdmin==0或1
    */
    static function getIsAdmin($id) {
        global $db;
        try {
            $rs = $db->prepare('select isAdmin from user_basic 
                where id=? ');
            $rs->execute(array($id));
            $row = $rs->fetch();
            return $row['isAdmin'];
        }catch(PDOException $e) {
            echo $e;
        }
        
    }

    /*
    *modifyPower方法
    *@param $isAdmin int{0,1}是否为管理员
    *@return boolean
    */
    static function modifyPower($isAdmin) {
        global $db;
        try {
            if($isAdmin == 0) {
                $rs = $db->prepare('update user_basic set isAdmin=1');
                $rs->execute();
                return true;
            }else {
                $rs = $db->prepare('update user_basic set isAdmin=0');
                $rs->execute();     
                return true;
            }
        }catch(PDOException $e) {
            echo $e;
            return false;
        }
        
    }
}


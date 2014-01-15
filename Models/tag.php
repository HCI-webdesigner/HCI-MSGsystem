<<<<<<< HEAD
<?php
=======
﻿<?php
>>>>>>> fb8a0b816cdef39f6955b4c6dae43822ccbbe9d7

class tag {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中添加一条记录
     * @param $name string 标签名
     * @param $isFormal int 是否为自定义标签
     * @return NULL
     */
    static function add($name, $isFormal) {
        global $db;
        try {
            $rs = $db->prepare('insert into tag(name, isFormal) values(?,?)');
            $rs->execute(array($name, $isFormal));
            echo '添加标签成功！';
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getNameByType方法
     * 获取某类型所有标签
     * $isFormal int 标签类型
     * return array 所有标签名称组成的数组
     */
    static function getNameByType($isFormal) {
        global $db;
        $arr = array();
        try {
<<<<<<< HEAD
            $rs = $db->prepare('select name from tag where isFormal=?');
            $rs ->execute(array($isFormal));
=======
            $rs = $db->prepare('select name from tag where isFormal=1');
            $rs ->execute();
>>>>>>> fb8a0b816cdef39f6955b4c6dae43822ccbbe9d7
            return $rs->fetchAll();
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getIDByName方法
     * 根据标签名称获取ID
     * @param $name String 标签名称
     * return int 标签ID
     */
    static function getIDByName($name) {
        global $db;
        try {
            $rs = $db->prepare('select ID from tag where name=?');
            $rs->execute(array($name));
            $row = $rs->fetch();
            return $row['ID'];
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getNameById方法
     * 根据标签ID获取标签名称
     * @param $tagId int 标签id
     * return string 标签名称
     */
    static function getNameById($tagId) {
        global $db;
        try {
            $rs = $db->prepare('select name from tag where id=?');
            $rs->execute(array($tagId));
            $row = $rs->fetch();
            return $row['name'];
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * isExist方法
     * 判断标签名是否存在
     * @param $name string 标签名
     * @return boolean
     */
    static function isExist($name) {
        global $db;
        try {
            $rs = $db->prepare('select * from tag where name=?');
            $rs->execute(array($name));
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
     *addTag方法
     *@param $name 标签名
     *@return null
     */
    static function addTag($name) {
        global $db;
        try {
            $rs = $db->prepare('insert into tag(name,isFormal) values(?,?)');
            $rs->execute(array($name,1));
            echo '添加标签成功！';
        }catch(PDOException $e) {
            echo $e;
        }

    }
}


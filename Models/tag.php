<?php
include_once("../conf/config.php");

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
     * getAllFormalName方法
     * 获取所有系统标签
     * 无参数
     * return array 所有标签名称组成的数组
     */
    static function getAllFormalName() {
        global $db;
        $arr = array();
        try {
            $rs = $db->prepare('select name from tag where isFormal=1');
            $rs ->execute();
            while($row = $rs->fetch()) {
                array_push($arr, $row['name']);
            }
        } catch(PDOException $e) {
            echo $e;
        }
        return $arr;
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
}


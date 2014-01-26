<?php
class tag {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * getAllTags方法
     * 根据分类获取相应的标签
     * @author C860
     * @param $type int{-1,0,1} 标签类型
     * @return array
     */
    static function getAllTags($type=-1) {
        global $db;
        if($type==-1) {
            $query = $db->prepare('select * from tag order by name');
            $query->execute();
            $rs = $query->fetchAll();
            return $rs;
        }
        else if($type==0) {
            $query = $db->prepare('select * from tag where isFormal=0 order by name');
            $query->execute();
            $rs = $query->fetchAll();
            return $rs;
        }
        else {
            $query = $db->prepare('select * from tag where isFormal=1 order by name');
            $query->execute();
            $rs = $query->fetchAll();
            return $rs;
        }
    }

    /*
     * update方法
     * 更新一条数据
     * @author C860
     * @param $ID int 标签ID
     * @param $name string 标签名
     * @param $isFormal int{0,1} 是否正式
     * @param $img string 标签标识
     * @return boolean
     */
    static function update($ID,$name,$isFormal,$img) {
        global $db;
        try {
            $query = $db->prepare('update tag set name=?,isFormal=?,img=? where ID=?');
            $query->execute(array($name,$isFormal,$img,$ID));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * add方法
     * 新增一条数据
     * @author C860
     * @param $name string 标签名
     * @param $isFormal int{0,1} 是否正式
     * @param $img string 标签标识
     * @return boolean
     */
    static function add($name,$isFormal,$img) {
        global $db;
        try {
            $query = $db->prepare('insert into tag (name,isFormal,img)values(?,?,?)');
            $query->execute(array($name,$isFormal,$img));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * delete方法
     * 删除一条数据
     * @author C860
     * @param $ID int 标签ID
     * @return boolean
     */
    static function delete($ID) {
        global $db;
        try {
            $query = $db->prepare('delete from tag where ID=?');
            $query->execute(array($ID));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }
}


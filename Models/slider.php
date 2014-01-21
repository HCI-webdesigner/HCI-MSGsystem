<?php
class slider {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * getAll方法
     * 获取表中所有的信息
     * @author C860
     * @return array|false
     */
    static function getAll() {
        global $db;
        try {
            $query = $db->prepare('select * from slider order by height');
            $query->execute();
            if($query->rowCount()>0) {
                return $query->fetchAll();
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
     * add方法
     * 向表中新增一条记录
     * @author C860
     * @param $height int 权重
     * @param $link string 链接地址
     * @param $title string 链接文字
     * @param $img string 图片地址
     * @return boolean
     */
    static function add($height,$link,$title,$img) {
        global $db;
        try {
            $query = $db->prepare('insert into slider (height,link,title,img)values(?,?,?,?)');
            $query->execute(array($height,$link,$title,$img));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * update方法
     * 更新表中一条存在的记录
     * @author C860
     * @param $ID int ID
     * @param $height int 权重
     * @param $link string 链接地址
     * @param $title string 链接文字
     * @param $img string 图片地址
     * @return boolean
     */
    static function update($ID,$height,$link,$title,$img) {
        global $db;
        try {
            $query = $db->prepare('update slider set height=?,link=?,title=?,img=? where ID=?');
            $query->execute(array($height,$link,$title,$img,$ID));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * delete方法
     * 删除表中指定记录
     * @author C860
     * @param $ID int ID
     * @return boolean
     */
    static function delete($ID) {
        global $db;
        try {
            $query = $db->prepare('delete from slider where ID=?');
            $query->execute(array($ID));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }
}

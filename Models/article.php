<?php
class article {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中新增一条记录
     * @author C860
     * @param $title string 标题
     * @param $content string 内容
     * @param $time string 时间
     * @param $userId int 用户ID
     * @return boolean
     */
    static function add($title,$content,$time,$userId) {
        global $db;
        try {
            $query = $db->prepare('insert into article (title,content,createTime,user_id)values(?,?,?,?)');
            $query->execute(array($title,$content,$time,$userId));
            return true;
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * getId方法
     * 根据参数获取文章ID
     * @author C860
     * @param $title string 文章标题
     * @param $userId int 用户ID
     * @param $time string 文章发表时间
     * @return int
     */
    static function getId($title,$userId,$time) {
        global $db;
        try {
            $query = $db->prepare('select * from article where title=? and user_id=? and createTime=?');
            $query->execute(array($title,$userId,$time));
            if($query->rowCount()>0) {
                return $query->fetch()['ID'];
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
     * getAll方法
     * 获取符合条件的所有记录
     * @author C860
     * @param $tid int 标签ID
     * @return array
     */
    static function getAll($tid=-1) {
        global $db;
        try {
            if($tid==-1) {
                $query = $db->prepare('select title,createTime,comment from article order by createTime desc');
                $query->execute();
                $rs = $query->fetchAll();
                return $rs;
            }
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }
}


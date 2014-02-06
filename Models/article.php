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
     * 获取符合条件的所有记录(分页)
     * @author C860
     * @param $perpage int 每页显示条数
     * @param $curpage int 当前所在页码
     * @param &$pagecount int 页面总数（更改值）
     * @param $tid int 标签ID
     * @return array
     */
    static function getAll($perpage,$curpage,&$pagecount,$tid=-1) {
        global $db;
        try {
            if($tid==-1) {
                $query = $db->prepare('select ID,title,createTime,comment from article order by createTime desc');
                $query->execute();
                //获取记录总数
                $rscount = $query->rowCount();
                //计算总页数
                $pagecount = ceil($rscount/$perpage);
                //计算当前页的第一条记录的位置
                $pos = ($curpage-1)*$perpage;
                $query = $db->prepare('select ID,title,createTime,comment from article order by createTime desc limit ?,?');
                $query->execute(array($pos,$pos+$perpage));
                $rs = $query->fetchAll();
                return $rs;
            }
            else {
                $query = $db->prepare('select ID,title,createTime,comment from article as A,tag_relate_article as B where B.tag_id=? and B.article_id=A.ID');
                $query->execute(array($tid));
                //获取记录总数
                $rscount = $query->rowCount();
                //计算总页数
                $pagecount = ceil($rscount/$perpage);
                //计算当前页的第一条记录的位置
                $pos = ($curpage-1)*$perpage;
                $query = $db->prepare('select ID,title,createTime,comment from article as A,tag_relate_article as B where B.tag_id=? and B.article_id=A.ID limit ?,?');
                $query->execute(array($tid,$pos,$pos+$perpage));
                $rs = $query->fetchAll();
                return $rs;
            }
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }

    /*
     * getArticle方法
     * 根据文章ID获取文章信息
     * @author C860
     * @param $ID 文章ID
     * @return array|false
     */
    static function getArticle($ID) {
        global $db;
        try {
            $query = $db->prepare('select * from article where ID=?');
            $query->execute(array($ID));
            if($query->rowCount()>0) {
                return $query->fetch();
            }
            else {
                return false;
            }
        } catch(PDOException $e) {
            echo $e;
            return false;
        }
    }
}


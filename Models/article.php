<?php
class article {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中添加一条记录
     * @param $title string 文章标题
     * @param $content string 文章内容
     * @param $createTime 创建时间
     * @param $userId 作者id
     * @return NULL
     */
    static function add($title, $content, $createTime, $userId) {
        global $db;
        try {
            $rs = $db->prepare('insert into article(title,content,createTime,user_id) values(?,?,?,?)');
            $rs->execute(array($title, $content, $createTime, $userId));
            echo '添加文章成功！';
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getArticlesCount方法
     * 获取某用户文章数目
     * @param $userId int 作者id
     * @return int 文章数目
     */
    static function getArticlesCount($userId) {
        global $db;
        try {
            $rs = $db->prepare('select count(*) as count from article where user_id=?');
            $rs->execute(array($userId));
            $row = $rs->fetch();
            return $row['count'];
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getAllArticlesCount方法
     * 获取所有文章的数目
     * @return int 文章数目
     */
    static function getAllArticlesCount() {
        global $db;
        try {
            $rs = $db->prepare('select count(*) as count from article');
            $rs->execute();
            $row = $rs->fetch();
            return $row['count'];
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getArticlesMsgById方法
     * 获取某用户部分文章记录
     * @param $userId int 作者id
     * @param $startNum int 从第startNum条记录开始
     * @param $num int 截取num条记录
     * @return array 文章记录
     */
    static function getArticlesMsgById($userId, $startNum, $num) {
        global $db;
        try {
            $rs = $db->prepare('select * from article where user_id=?');
            $rs->execute(array($userId));
            $arr = $rs->fetchAll();
            $arr = array_slice($arr,$startNum,$num);
            return $arr;
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getArticlesMsg方法
     * 获取部分文章记录
     * @param $startNum 从第startNum条记录开始
     * @param $num 截取num条记录
     * @return array 文章记录
     */
    static function getArticlesMsg($startNum, $num) {
        global $db;
        try {
            $rs = $db->prepare('select * from article');
            $rs->execute();
            $arr = $rs->fetchAll();
            $arr = array_slice($arr,$startNum,$num);
            return $arr;
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * modify方法
     * 修改文章信息
     * @param $articleId int 文章id
     * @param $title string 文章标题
     * @param $content string 文章内容
     * @param $lastModifyTime 上次修改时间
     * @return NULL
     */ 
    static function modify($articleId, $title, $content, $lastModifyTime) {
        global $db;
        try {
            $rs = $db->prepare('update article set title=?,content=?,lastModifyTime=? where ID=?');
            $rs->execute(array($title,$content,$lastModifyTime,$articleId));
            echo '更新文章成功！';
        } catch(PDOException $e) {
            echo $e;
        }
    }
    /*
     * getIDByOthers方法
     * 根据文章标题和作者id获取文章ID
     * @param $title String 文章标题
     * @param $content String 文章内容
     * @param $createTime 创建时间
     * @param $userId 作者id
     * return int 文章id
     */
    static function getIDByOthers($title, $content, $createTime, $userId){
        global $db;
        try {
            $rs = $db->prepare('select ID from article where title=? and content=? and createTime=? and user_id=?');
            $rs->execute(array($title, $content, $createTime, $userId));
            $row = $rs->fetch();
            return $row['ID'];
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getOthersById方法
     * 根据文章ID获取文章信息
     * @param $articleId int 文章id
     * return array 文章信息
     */
    static function getOthersById($articleId){
        global $db;
        try {
            $rs = $db->prepare('select * from article where ID=?');
            $rs->execute(array($articleId));
            return $rs->fetch();
        } catch(PDOException $e) {
            echo $e;
        }
    }
}


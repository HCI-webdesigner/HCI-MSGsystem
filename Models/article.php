<?php
include_once("../conf/config.php");

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
            $rs = $db->prepare('insert into article(title, content, createTime, user_id) values(?,?,?,?)');
            $rs->execute(array($title, $content, $createTime, $userId));
            echo '添加文章成功！';
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
}


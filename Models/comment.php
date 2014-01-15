<?php
class comment {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中添加一条记录
     * @param $articleId int 文章id
     * @param $userId int 评论人id
     * @param $content 评论内容
     * @param $createTime 创建时间
     * @return NULL
     */
    static function add($articleId, $replyId, $userId, $content, $createTime) {
        global $db;
        try {
            $rs = $db->prepare('insert into comment(article_id, reply_id, user_id, content, createTime) values(?,?,?,?,?)');
            $rs->execute(array($articleId, $replyId, $userId, $content, $createTime));
            echo '添加评论成功！';
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getOriginalCommentByArticleId方法
     * 获取某文章的所有原始评论信息，即非回复评论
     * @param $articleId int 文章id
     * @return array 评论信息
     */
    static function getOriginalCommentByArticleId($articleId) {
        global $db;
        try {
            $rs = $db->prepare('select * from comment where article_id=? and reply_id=-1');
            $rs->execute(array($articleId));
            return $rs->fetchAll();
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getReplyCommentId方法
     * 根据评论id获取所有回复此评论的评论信息
     * @param $id int 评论id
     * @return array 评论信息
     */
    static function getReplyCommentId($id) {
        global $db;
        try {
            $rs = $db->prepare('select * from comment where reply_id=?');
            $rs->execute(array($id));
            return $rs->fetchAll();
        } catch(PDOException $e) {
            echo $e;
        }
    }
}


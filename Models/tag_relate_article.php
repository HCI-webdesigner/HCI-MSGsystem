<?php

class tag_relate_article {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * add方法
     * 向表中添加一条记录
     * @param $articleId int 文章id
     * @param $tagId int 标签id
     * @return NULL
     */
    static function add($articleId, $tagId) {
        global $db;
        try {
            $rs = $db->prepare('insert into tag_relate_article(article_id, tag_id) values(?,?)');
            $rs->execute(array($articleId, $tagId));
            echo '添加标签文章联系成功！';
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * delete方法
     * 删除某文章与所有标签的联系
     * @param $articleId int 文章id
     * @return NULL
     */
    static function delete($articleId) {
        global $db;
        try {
            $rs = $db->prepare('delete from tag_relate_article where article_id=?');
            $rs->execute(array($articleId));
            echo "删除文章标签联系成功!";
        } catch(PDOException $e) {
            echo $e;
        }
    }

    /*
     * getTagsByArticleId方法
     * 根据文章id找出文章的所有标签
     * @param $articleId int 文章id
     * @return array 所有标签id
     */
    static function getTagsByArticleId($articleId) {
        global $db;
        try {
            $rs = $db->prepare('select tag_id from tag_relate_article where article_id=?');
            $rs->execute(array($articleId));
            return $rs->fetchAll();
        } catch(PDOException $e) {
            echo $e;
        }
    }

}


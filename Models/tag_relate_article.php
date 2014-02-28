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
     * @author C860
     * @param $tagId int 标签的ID
     * @param $articleId int 文章的ID
     * @return boolean
     */
    static function add($tagId,$articleId) {
        global $db;
        try {
            $query = $db->prepare('insert into tag_relate_article (article_id,tag_id)values(?,?)');
            $query->execute(array($articleId,$tagId));
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
}


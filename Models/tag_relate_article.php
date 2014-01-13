<?php
include_once("../conf/config.php");

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

}


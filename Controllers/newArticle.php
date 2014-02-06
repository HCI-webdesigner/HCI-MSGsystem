<?php
/*
 * newArticle.php
 * 负责处理新发表文章的逻辑
 * Createed By C860 at 2014-1-19
 */

if(!class_exists('sys')) {
    include_once('../conf/config.php');
}

//需要登录
sys::needLog('../login.php');

//检测数据合法性
if(isset($_POST['title']) && !empty($_POST['title'])
    && isset($_POST['content']) && !empty($_POST['content'])
    && isset($_POST['tags']) && !empty($_POST['tags'])
) {
    //引入相关模型类
    include_once('../Models/article.php');
    include_once('../Models/tag_relate_article.php');
    include_once('../Models/user_info.php');

    $currentTime = date('Y-m-d H:i:s');
    //新增文章
    if(article::add($_POST['title'],$_POST['content'],$currentTime,$_SESSION['userId'])) {
        $ID = article::getId($_POST['title'],$_SESSION['userId'],$currentTime);
        $tags = explode('|',$_POST['tags']);
        foreach($tags as $tag) {
            tag_relate_article::add($tag,$ID);
        }
        user_info::increaseArticleCount($_SESSION['userId']);
        sys::alert('发表成功！');
        sys::redirect('../index.php');
    }

}
else {
    //引入相关模型类
    include_once('Models/tag.php');
    $taglist = tag::getAllTags();
}

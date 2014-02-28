<?php
/*
 * article.php
 * 负责文章显示页面的逻辑
 * Created By C860 at 2014-2-7
 */
include_once('conf/config.php');

//引入相关模型类
include_once('Models/article.php');
include_once('Models/user_info.php');

//检验数据合法性
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $article = article::getArticle($id);
    $author = user_info::getNickname($article['user_id']);
    if(!$article || !$author) {
        sys::alert('未知错误！');
        sys::redirect('index.php');
    }
}

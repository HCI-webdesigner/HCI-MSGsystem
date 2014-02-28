<?php
/*
 * removeArticle.php
 * 负责删除文章逻辑
 * Created By C860 at 2014-2-28
 */
include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/article.php');
include_once('../Models/user_info.php');

//检验数据合法性
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $article = article::getArticle($id);
    if(sys::hasLogged() && $article != false  && $_SESSION['userId'] == $article['user_id']) {
        if(article::removeArticle($id)) {
            sys::alert('删除成功！');
            sys::redirect('../index.php');
        } 
    }
    else {
        sys::redirect('../index.php');
    }
}

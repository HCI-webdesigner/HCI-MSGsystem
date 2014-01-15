<?php
/*
 * addComment.php
 * 负责处理发表评论业务
 * Created By 郑俊燕 at 2014-1-14
 */

//引入相关模型类
include_once("../conf/config.php");
include_once('../Models/comment.php');

//检查POST参数的完整性性
if(!isset($_POST['comment'])||empty($_POST['comment'])) {
    echo '表单参数不完整！';
}
$replyId = -1;
if(isset($_GET['replyId']))
	$replyId = $_GET['replyId'];

//插入comment表
$userId = $_SESSION["userId"]; //作者id
$articleId = $_SESSION["articleId"]; //文章id
$content = $_POST['comment']; //评论内容
$createTime = date('Y-m-d H:i:s',time()); //评论时间 

comment::add($articleId, $replyId, $userId, $content, $createTime);
?>
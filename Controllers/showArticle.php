<?php
/*
 * showArticle.php
 * 负责显示指定文章信息
 * Created By 郑俊燕 at 2014-1-13
 */

//引入相关模型类
include_once('Models/article.php');
include_once('Models/tag_relate_article.php');
include_once('Models/tag.php');
include_once('Models/comment.php');
include_once('Models/user_info.php');

//获取文章信息
$articleId = $_GET['articleId']; //获得文章id
$_SESSION["articleId"] = $articleId; //将文章id放入session
$articleMsg = article::getOthersById($articleId); //获得文章信息
$allMyTagId = tag_relate_article::getTagsByArticleId($articleId); //该文章所有标签id
$allMyTags = array(); //该文章所有标签名称
foreach($allMyTagId as $row) {
	array_push($allMyTags, tag::getNameById($row['tag_id']));
}
$otherTags = tag::getNameByType(1); //其他未添加的系统标签
$num = count($otherTags);
for($i=0; $i<$num; $i++) {
	foreach($allMyTags as $row) {
		if($otherTags[$i]['name'] == $row) {
			array_splice($otherTags,$i,1);
		}
	}
}
$allComment = comment::getOriginalCommentByArticleId($articleId);//该文章所有评论信息
function f(& $array) { //递归将评论链存到数组中
	$count = count($array);
	if($count == 0)
		return $array;
	for($i=0; $i<$count; $i++) {
		$array[$i]['nickName'] = user_info::getNickNameById($array[$i]['user_id']);
		$reply = comment::getReplyCommentId($array[$i]['ID']);
		f($reply);
		$array[$i]['reply'] = $reply;
	}
}
f($allComment);
?>

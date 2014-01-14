<?php
/*
 * showArticle.php
 * 负责显示指定文章信息
 * Created By 郑俊燕 at 2014-1-13
 */

//引入相关模型类
include_once('../Models/article.php');
include_once('../Models/tag_relate_article.php');
include_once('../Models/tag.php');

//检查POST参数的完整性性
if(!isset($_POST['articleId'])||empty($_POST['articleId'])) {
    echo '表单参数不完整！';
}
//获取文章信息
$articleId = $_POST['articleId']; //获得文章id
$_SESSION["articleId"] = $articleId; //将文章id放入session
$articleMsg = article::getOthersById($articleId); //获得文章信息
$allMyTagId = tag_relate_article::getTagsByArticleId($articleId); //该文章所有标签id
$allMyTags = array(); //该文章所有标签名称
foreach($allMyTagId as $row) {
	array_push($allMyTags, tag::getNameById($row['tag_id']));
}
$otherTags = tag::getAllFormalName(); //其他未添加的系统标签
$num = count($otherTags);
for($i=0; $i<$num; $i++) {
	foreach($allMyTags as $row) {
		if($otherTags[$i]['name'] == $row) {
			array_splice($otherTags,$i,1);
		}
	}
}

include_once('../showArticle.php'); //回到显示文章页面

//
?>

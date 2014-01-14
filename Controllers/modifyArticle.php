<?php
/*
 * modifyArticle.php
 * 负责处理修改文章
 * Created By 郑俊燕 at 2014-1-13
 */

//引入相关模型类
include_once("../conf/config.php");
include_once('../Models/article.php');
include_once('../Models/tag.php');
include_once('../Models/tag_relate_article.php');

//检查POST参数的完整性性
if(!isset($_POST['title'])||empty($_POST['title'])
    ||!isset($_POST['content'])||empty($_POST['content'])) {
    echo '表单参数不完整！';
}

//修改article表
$userId = $_SESSION["userId"]; //作者id
$lastModifyTime = date('Y-m-d H:i:s',time()); //修改时间
$title = $_POST['title']; //标题
$content = $_POST['content']; //内容
$articleId = $_SESSION["articleId"]; //文章id
article::modify($articleId, $title, $content, $lastModifyTime); //修改文章

//修改文章标签
tag_relate_article::delete($articleId);//删除原来的联系
$tags = false;
$customtag = false;
if (isset($_POST['tags'])) {  //已有标签
	$tags = $_POST['tags'];
}
if (isset($_POST['customtag']))   //自定义标签
	$customtag = $_POST['customtag'];
//系统标签
if ($tags != false) { //添加重设标签和文章的联系
	foreach($tags as $value) {
		$tagId = tag::getIdByName($value);
		tag_relate_article::add($articleId, $tagId);
	}
}
//自定义标签
if ($customtag != false) { 
	$list = split(",", $customtag);
	foreach($list as $value) {
		$flag = true;
		foreach($tags as $tag) {
			if($value == $tag) { //判断是否已添加
				$flag = false;
				echo $value."标签已添加";
			}
		}
		if($flag == true) {
			tag::add($value,0); //添加用户自定义标签
			$tagId = tag::getIdByName($value); //标签id
			echo "id=".$tagId;
			tag_relate_article::add($articleId, $tagId); //添加自定义标签和文章的联系
		}
	}
}
?>


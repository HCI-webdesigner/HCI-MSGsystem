<?php
/*
 * addArticle.php
 * 负责处理发表文章业务
 * Created By 郑俊燕 at 2014-1-12
 */

//引入相关模型类
include_once('../Models/tag.php');
include_once('../Models/article.php');
include_once('../Models/tag_relate_article.php');

//检查POST参数的完整性性
if(!isset($_POST['title'])||empty($_POST['title'])
    ||!isset($_POST['content'])||empty($_POST['content'])) {
    echo '表单参数不完整！';
}

//插入article表
$userId = $_SESSION["userId"]; //作者id

//$userId = 6;
$createTime = date('Y-m-d H:i:s',time()); 
$title = $_POST['title']; 
$content = $_POST['content'];
article::add($title, $content, $createTime, $userId);
$articleId = article::getIDByOthers($title, $content, $createTime, $userId);//文章id

//处理标签
$formaltag = false;
$customtag = false;
if (isset($_POST['formaltag'])) {  //系统标签
	$formaltag = $_POST['formaltag'];
}
if (isset($_POST['customtag']))   //自定义标签
	$customtag = $_POST['customtag'];
//系统标签
if ($formaltag != false) { //添加系统标签和文章的联系
	foreach($formaltag as $value) {
		$tagId = tag::getIdByName($value);
		tag_relate_article::add($articleId, $tagId);
	}
}
//自定义标签
if ($customtag != false) { 
	if (tag::isExist($customtag) == true)
		echo "该标签已存在";
	else {
		tag::add($customtag,0); //添加用户自定义标签
		$tagId = tag::getIdByName($customtag); //标签id
		tag_relate_article::add($articleId, $tagId); //添加自定义标签和文章的联系
	}
}
?>

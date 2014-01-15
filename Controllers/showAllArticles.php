<?php
/*
 * showAllArticles.php
 * 负责处理显示所有博文列表
 * Created By 郑俊燕 at 2014-1-14
 */
//引入相关模型类
include_once("Models/article.php");
include_once("Models/tag_relate_article.php");
include_once("Models/user_info.php");
include_once("Models/tag.php");

$pageNum = 1; //每页显示数目
$startNum = 0; //开始条目编号

//设置初始条目编号和结束条目编号
$num = article::getAllArticlesCount(); //所有文章总数
if(isset($_GET["startNum"]) && $_GET["startNum"] >=0) {
	if($_GET["startNum"] < $num)
		$startNum = $_GET["startNum"];
	else
		$startNum = $_GET["startNum"] - $pageNum;
}
$endNum = $startNum + $pageNum;
if($endNum > $num)
	$endNum = $num;
//articleMsgs存取所有文章信息
$articleMsgs = article::getArticlesMsg($startNum, $endNum-$startNum);
$count = count($articleMsgs);
for($i=0; $i<$count; $i++) {
	$nickName = user_info::getNickNameById($articleMsgs[$i]['user_id']);
	$articleMsgs[$i]['nickName'] = $nickName;
}
$articleTags = array();
foreach($articleMsgs as $row) { //将标签id转为标签名称
	 $tagNames = tag_relate_article::getTagsByArticleId($row['ID']);
	 $count = count($tagNames);
	 for($i=0; $i<$count; $i++) {
	 	$tagNames[$i]['tag_id'] = tag::getNameById($tagNames[$i]['tag_id']); 
	 }
	 $articleTags[$row['ID']] = $tagNames;
}

?>

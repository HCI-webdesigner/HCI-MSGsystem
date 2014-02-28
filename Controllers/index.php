<?php
/*
 * index.php
 * 负责主页逻辑的处理
 * Created By C860 at 2014-1-23
 */

include_once('conf/config.php');

//引入相关模型类
include_once('Models/article.php');
include_once('Models/tag.php');

//获取当前页面
if(!isset($_GET['p']) || !is_numeric($_GET['p'])) {
    $curpage = 1;
}
else {
    $curpage = $_GET['p'];
}
$pagecount = 1;
$index = 0;
//判断是否为首页显示
if(!isset($_GET['t']) || !is_numeric($_GET['t'])) {
    $index = 1;
    //加载Slider
    include_once('Models/slider.php');
    $slider = slider::getAll();
}
//文章列表
if($index==1) {
    $alist = article::getAll(9,$curpage,$pagecount);
}
else {
    $alist = article::getAll(9,$curpage,$pagecount,$_GET['t']);
}

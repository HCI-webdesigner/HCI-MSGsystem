<?php
/*
 * getAllFormalTag.php
 * 负责获取所有系统标签
 * Created By 郑俊燕 at 2014-1-13
 */

//引入相关模型类
include_once('Models/tag.php');
//获取所有系统标签
$arr = tag::getAllFormalName(); 
?>

<?php
/*
 * menu.php
 * 处理侧栏菜单的动态数据
 * Created By C860 at 2014-1-29
 */

include_once('conf/config.php');

//引入相关模型类
include_once('Models/tag.php');

//菜单栏
$menus = tag::getAllTags(1);

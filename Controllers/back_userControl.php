<?php
/*
 * userControl.php
 * 负责后台管理员对用户的管理逻辑
 * Create By C860 at 2014-1-15
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/user_basic.php');

//分页
if(!isset($_GET['uid'])) {
    if(!isset($_GET['page'])||!is_numeric($_GET['page'])) {
        $curpage = 1;
    }
    else {
        $curpage = $_GET['page'];
    }
    $rs = user_basic::getTotalInfo(20,$curpage);
}
else {
    $query = $db->prepare('update user_basic set isAdmin=isAdmin^1 where ID=?');
    if($query->execute(array($_GET['uid']))!=false) {
        alert('操作成功！');
        redirect('../back/userControl.php');
    } 
}

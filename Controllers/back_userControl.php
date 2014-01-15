<?php
/*
 * userControl.php
 * 负责后台管理员对用户的管理逻辑
 * Create By C860 at 2014-1-15
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/user_basic.php');

/*
 * paging方法
 * 获取用户信息并分页
 * @param $perpage int 每页显示条数
 * @return array
 */
function paging($perpage) {
    if(!isset($_GET['page'])||!is_numeric($_GET['page'])) {
        $curpage = 1;
    }
    else {
        $curpage = $_GET['page'];
    }
    $rs = user_basic::getTotalInfo($perpage,$curpage);
    return $rs;
}
//分页
if(isset($_GET['uid'])) {
    $query = $db->prepare('update user_basic set isAdmin=isAdmin^1 where ID=?');
    if($query->execute(array($_GET['uid']))!=false) {
        alert('操作成功！');
        redirect('../back/userControl.php');
    } 
}

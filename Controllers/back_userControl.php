<?php
/*
 * userControl.php
 * 负责后台管理员对用户的管理逻辑
 * Created By C860 at 2014-1-15
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/user_basic.php');

/*
 * paging方法
 * 获取用户信息并分页
 * @author C860
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
//设置或取消管理员权限
if(isset($_GET['uid'])) {
    if(user_basic::setIsAdmin($_GET['uid'])) {
        sys::alert('操作成功！');
        sys::redirect('../back/userControl.php');    
    }
    else {
        alert('操作失败！');
    }
}

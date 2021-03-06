<?php
/*
 * checkLog.php
 * 用户登录检测程序
 * Created By C860 at 2014-1-18
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/user_basic.php');
include_once('../Models/user_info.php');

//检测数据合法性
if(isset($_POST['user']) && !empty($_POST['user'])
    && isset($_POST['password']) && !empty($_POST['password'])
) {
    if(user_basic::check($_POST['user'],$_POST['password'],0)) {
        $uid = user_basic::getUserId($_POST['user']);
        $nickname = user_info::getNickname($uid);
        //设置SESSION
        $_SESSION['userId'] = $uid;
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['nickname'] = $nickname;
        sys::redirect('../index.php');
    }
    else {
        sys::alert('用户名或密码错误！');
        sys::redirect('../login.php');
    }
}

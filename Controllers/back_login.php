<?php
/*
 * back_login.php
 * 负责后台登录逻辑
 * Created By C860 at 2014-1-22
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/user_basic.php');

//检查数据合法性
if(isset($_POST['user']) && !empty($_POST['user'])
    && isset($_POST['password']) && !empty($_POST['password'])
) {
    if(user_basic::check($_POST['user'],$_POST['password'],1)) {
        $_SESSION['admin'] = user_basic::getUserId($_POST['user']);
        sys::redirect('../back/main.php');
    }
    else {
        sys::alert('error!');
        sys::redirect('../back/index.php');
    }
}

<?php
/*
 * changePWD.php
 * 负责处理修改密码的逻辑
 * Created By C860 at 2014-1-20
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/user_basic.php');

//检测数据合法性
if(isset($_POST['oldpwd']) && !empty($_POST['oldpwd'])
    && isset($_POST['newpwd']) && !empty($_POST['newpwd'])
) {
    //检测旧密码是否正确
    if(user_basic::check($_SESSION['user'],$_POST['oldpwd'],0)) {
        //替换旧密码为新密码
        if(user_basic::changePassword($_SESSION['userId'],$_POST['newpwd'])) {
            sys::alert('修改密码成功！请重新登录！');
            sys::logout();
            sys::redirect('../login.php');
        }
    }
}

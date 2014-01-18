<?php
/*
 * register.php
 * 负责处理用户注册的逻辑
 * Created By C860 at 2014-1-18
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/user_basic.php');
include_once('../Models/user_info.php');

//检测数据合法性
if(isset($_POST['user']) && !empty($_POST['user'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['nickname']) && !empty($_POST['nickname'])
) {
    //检测用户个性签名是否存在
    if(isset($_POST['signature'])) {
        $signature = $_POST['signature'];
    }
    else {
        $signature = '';
    }
    //检测用户名是否存在
    if(user_basic::userExist($_POST['user'])) {
        sys::alert('用户名已存在！');
        sys::redirect('../register.php');
    }
    //检测昵称是否存在
    if(user_info::nicknameExist($_POST['nickname'])) {
        sys::alert('用户昵称已存在！');
        sys::redirect('../register.php');
    }
    //数据全部合法，进行注册程序
    if(user_basic::add($_POST['user'],$_POST['password']) 
        && user_info::add(user_basic::getUserId($_POST['user']),$_POST['nickname'],date('Y-m-d H:i:s'),$signature)
    ) {
        sys::alert('注册成功！');
        sys::redirect('../index.php');
    }
    else {
        sys::alert('出现未知错误！');
        sys::redirect('../register.php');
    }
}



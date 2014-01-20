<?php
/*
 * changeInfo.php
 * 处理用户信息修改的逻辑
 * Created By C860 at 2014-1-20
 */

//动态加载相关文件
if(file_exists('conf/config.php')) {
    $predir = '';
}
else {
    $predir = '../';
}

include_once($predir.'conf/config.php');

//需要用户登录
sys::needLog($predir.'login.php');

//引入相关模型类
include_once($predir.'Models/user_info.php');


/*
 * getInfo方法
 * 获取当前用户信息
 * @author C860
 * @return array|false
 */
function getInfo() {
    $info = user_info::getUserInfo($_SESSION['userId']);
    if($info!=false) {
        return $info;
    }
    else {
        return false;
    }
}

//校验数据完整性
if(isset($_POST['signature'])) {
    if(user_info::updateUserInfo($_SESSION['userId'],$_POST['signature'])) {
        sys::alert('修改成功！');
        sys::redirect('../userInfo.php');
    }
    else {
        sys::alert('出现未知错误！');
        sys::redirect('../changeInfo.php');
    }
}

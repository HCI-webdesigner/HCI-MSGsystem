<?php
/*
 * back_sliderControl.php
 * 负责后台轮播图片管理的逻辑
 * Created By C860 at 2014-1-21
 */

include_once('../conf/config.php');

//需要管理员权限
sys::needAdmin('index.php');

//引入相关模型类
include_once('../Models/slider.php');

/*
 * getAll方法
 * 获取所有slider数据
 * @author C860
 * @return array|false
 */
function getAll() {
    return slider::getAll();
}

//检验数据合法性
if(isset($_POST['type']) && !empty($_POST['type'])) {
    if($_POST['type']=='add') {
        if(isset($_POST['weight']) && is_numeric($_POST['weight'])
            && isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['link']) && !empty($_POST['link'])
            && isset($_POST['img']) && !empty($_POST['img'])
        ) {
            if(slider::add($_POST['weight'],$_POST['link'],$_POST['title'],$_POST['img'])) {
                sys::alert('添加成功！');
            }
            else {
                sys::alert('出现未知错误！');
            }
            sys::redirect('../back/sliderControl.php');
        }
    }
    else if($_POST['type']=='modify') {
        if(isset($_POST['weight']) && is_numeric($_POST['weight'])
            && isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['link']) && !empty($_POST['link'])
            && isset($_POST['img']) && !empty($_POST['img'])
            && isset($_POST['ID']) && is_numeric($_POST['ID'])
        ) {
            if(slider::update($_POST['ID'],$_POST['weight'],$_POST['link'],$_POST['title'],$_POST['img'])) {
                sys::alert('修改成功！');
            }
            else {
                sys::alert('出现未知错误！');
            }
            sys::redirect('../back/sliderControl.php');
        }  
    }
}
else if(isset($_GET['type']) && $_GET['type']=='delete') {
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        if(slider::delete($_GET['id'])) {
            sys::alert('删除成功！');
        }
        else {
            sys::alert('出现未知错误！');
        }
        sys::redirect('../back/sliderControl.php');
    }
}

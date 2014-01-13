<?php
/*
 * 此处定义一些静态参数
 * 说明：请使用define函数
 */
define('SYS_NAME','信息平台');
define('SYS_POWER','HCI人机交互中心');

/*
 * 全局变量
 */
global $db;

/*
 * 数据库连接
 * 说明：请使用PDO进行数据库操作
 */
$db_url = '127.0.0.1';
$db_port = '3306';
$db_user = 'root';
$db_pwd = 'root';
$db_name = 'hcimsg';

try {
    $db = new PDO("mysql:host=$db_url;port=$db_port;dbname=$db_name",$db_user,$db_pwd);
    //禁用仿真效果
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
} catch(PDOException $e) {
    echo $e;
}

<?php
/*
 * logout.php
 * 负责注销逻辑
 * Created By C860 at 2014-1-29
 */

include_once('../conf/config.php');

if(sys::logout()) {
    sys::redirect('../index.php');
}
else {
    sys::redirect('../login.php');
}

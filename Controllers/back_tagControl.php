<?php
/*
 * tagControl.php
 * 负责处理管理员管理系统标签的逻辑
 * Create By C860 at 2014-1-15
 */

include_once('../conf/config.php');

//引入相关模型类
include_once('../Models/tag.php');

if(isset($_POST['type'])) {
    if($_POST['type']=='modify') {
        if(isset($_POST['tag_id']) && is_numeric($_POST['tag_id'])
            && isset($_POST['name']) && !empty($_POST['name'])
            && isset($_POST['isFormal']) && is_numeric($_POST['isFormal'])
        ) {
            $query = $db->prepare('update tag set name=?,isFormal=? where ID=?');
            $query->execute(array($_POST['name'],$_POST['isFormal'],$_POST['tag_id']));
            sys::alert('修改成功！');
            sys::redirect('../back/tagControl.php');
        }

    }
    else if($_POST['type']=='add') {
        if(isset($_POST['name']) && !empty($_POST['name'])
            && isset($_POST['isFormal']) && is_numeric($_POST['isFormal'])
        ) {
            $query = $db->prepare('insert into tag (name,isFormal)values(?,?)');
            $query->execute(array($_POST['name'],$_POST['isFormal']));
            sys::alert('新增标签成功！');
            sys::redirect('../back/tagControl.php');
        }

    }
}
else if(isset($_GET['type'])&&$_GET['type']=='delete') {

}

/*
 * getAllTags方法
 * 获得所有分类
 * @author C860
 * @return array
 */
function getAllTags() {
    return tag::getAllTags();
}

/*
 * sortTag方法
 * 根据首字母分类
 * @author C860
 * @param $tags array 标签集
 * @return array
 */
function sortTags($tags) {
    //分类数组
    $sort = array(
        'A' => array(),
        'B' => array(),
        'C' => array(),
        'D' => array(),
        'E' => array(),
        'F' => array(),
        'G' => array(),
        'H' => array(),
        'I' => array(),
        'J' => array(),
        'K' => array(),
        'L' => array(),
        'M' => array(),
        'N' => array(),
        'O' => array(),
        'P' => array(),
        'Q' => array(),
        'R' => array(),
        'S' => array(),
        'T' => array(),
        'U' => array(),
        'V' => array(),
        'W' => array(),
        'X' => array(),
        'Y' => array(),
        'Z' => array()
    );
    //分类
    for($i=0;$i<count($tags);++$i) {
        array_push($sort[getFirstLetter($tags[$i]['name'])],$tags[$i]);
    }
    return $sort;
}

/*
 * getFirstLetter方法
 * 获取字符串的首字母（中文则为拼音首字母）
 * @author C860
 * @param $str string 要解析的字符串
 * @return string
 */ 
function getFirstLetter($str){
    if(empty($str)){return '';}
        $fchar=ord($str{0});
    if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
    $s1=iconv('UTF-8','gb2312',$str);
    $s2=iconv('gb2312','UTF-8',$s1);
    $s=$s2==$str?$s1:$str;
    $asc=ord($s{0})*256+ord($s{1})-65536;
    if($asc>=-20319&&$asc<=-20284) return 'A';
    if($asc>=-20283&&$asc<=-19776) return 'B';
    if($asc>=-19775&&$asc<=-19219) return 'C';
    if($asc>=-19218&&$asc<=-18711) return 'D';
    if($asc>=-18710&&$asc<=-18527) return 'E';
    if($asc>=-18526&&$asc<=-18240) return 'F';
    if($asc>=-18239&&$asc<=-17923) return 'G';
    if($asc>=-17922&&$asc<=-17418) return 'H';
    if($asc>=-17417&&$asc<=-16475) return 'J';
    if($asc>=-16474&&$asc<=-16213) return 'K';
    if($asc>=-16212&&$asc<=-15641) return 'L';
    if($asc>=-15640&&$asc<=-15166) return 'M';
    if($asc>=-15165&&$asc<=-14923) return 'N';
    if($asc>=-14922&&$asc<=-14915) return 'O';
    if($asc>=-14914&&$asc<=-14631) return 'P';
    if($asc>=-14630&&$asc<=-14150) return 'Q';
    if($asc>=-14149&&$asc<=-14091) return 'R';
    if($asc>=-14090&&$asc<=-13319) return 'S';
    if($asc>=-13318&&$asc<=-12839) return 'T';
    if($asc>=-12838&&$asc<=-12557) return 'W';
    if($asc>=-12556&&$asc<=-11848) return 'X';
    if($asc>=-11847&&$asc<=-11056) return 'Y';
    if($asc>=-11055&&$asc<=-10247) return 'Z';
    return null;
}


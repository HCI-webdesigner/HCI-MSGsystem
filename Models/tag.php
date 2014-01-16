<?php
class tag {
    /*
     * 构造函数
     */
    function __construct() {

    }

    /*
     * getAllTags方法
     * 根据分类获取相应的标签
     * @author C860
     * @param $type int{-1,0,1} 标签类型
     * @return array
     */
    static function getAllTags($type=-1) {
        global $db;
        if($type==-1) {
            $query = $db->prepare('select * from tag order by name');
            $query->execute();
            $rs = $query->fetchAll();
            return $rs;
        }
        else if($type==0) {
            $query = $db->prepare('select * from tag where isFormal=0 order by name');
            $query->execute();
            $rs = $query->fetchAll();
            return $rs;
        }
        else {
            $query = $db->prepare('select * from tag where isFormal=1 order by name');
            $query->execute();
            $rs = $query->fetchAll();
            return $rs;
        }
    }
}


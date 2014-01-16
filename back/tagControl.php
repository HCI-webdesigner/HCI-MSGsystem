<?php
include_once('../Controllers/back_tagControl.php');
$rs = getAllTags();
$sort = sortTags($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../public/stylesheets/back.css">
    <style type="text/css">
        .block {
            margin: 10px 20px;
            padding 0 20px;
        }
        .block > h2 {
            padding-left: 10px;
            margin-bottom: 5px;
        }
        .tag {
            margin: 0 5px;
            padding: 5px 8px;
            color: #696969;
            font-family: "微软雅黑";
            font-size: 0.8em;
            border: 1px solid #e6e6e6;
        }
        .tag:hover {
            cursor: pointer;
            color: black;
            border: 1px solid #BEBEBE;
        }
    </style>
</head>
<body>
    <?php
    $keys = array_keys($sort);
    for($i=0;$i<count($sort);++$i) {
        if(count($sort[$keys[$i]])>0) {
            echo '<div class="block"><h2>'.$keys[$i].'</h2>';
            for($j=0;$j<count($sort[$keys[$i]]);++$j) {
                echo '<a class="tag">'.$sort[$keys[$i]][$j]['name'].'</a>';
            }
            echo '</div>';
        }
        
    }
    ?>
    
</body>
</html>

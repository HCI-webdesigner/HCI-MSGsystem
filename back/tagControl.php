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
            .box {
                background: white;
                position: absolute;
                display: flex;
                visibility: hidden;
                flex-flow: column;
                justify-content: center;
                width: 400px;
                height: 100px;
                border: 1px solid #BEBEBE;
                text-align: center;
                z-index: 1001;
            }
            .bg {
                display: none;
                top: 0;
                z-index: 1000;
                background: #D3D3D3;
                position: absolute;
                width: 100%;
                height: 500px;
                opacity: 0.3;
            }
            .newForm {
                margin-top: 20px;
                padding-left: 25px;
            }
        </style>
    </head>
    <body>
        <form class="newForm" action="../Controllers/back_tagControl.php" method="post">
            <input type="text" name="name">
            <input type="hidden" name="type" value="add">
            <input type="submit" class="btn" value="新  增">
        </form>
        <?php
        $keys = array_keys($sort);
        for($i=0;$i<count($sort);++$i) {
        if(count($sort[$keys[$i]])>0) {
        echo '<div class="block"><h2>'.$keys[$i].'</h2>';
            for($j=0;$j<count($sort[$keys[$i]]);++$j) {
            echo '<a class="tag" data-id="'.$sort[$keys[$i]][$j]['ID'].'">'.$sort[$keys[$i]][$j]['name'].'</a>';
            }
            echo '</div>';
        }

        }
        ?>
        <div id="bg" class="bg"></div>
        <div id="box" class="box">
            <form action="../Controllers/back_tagControl.php" method="post">
                <input id="tagname" type="text" name="name">
                <input id="tagid" type="hidden" name="tag_id">
                <input type="hidden" name="type" value="modify">
                <input type="submit" class="btn" value="修  改">
                <input id="delbtn" type="button" class="btn" value="删  除">
                <input type="button" class="btn" value="Close" id="closebtn">
            </form>
        </div>
        <script type="text/javascript" src="../public/javascripts/jquery-1.10.2.js"></script>
        <script type="text/javascript">
            //绑定tag标签点击事件
            $('.tag').each(function(index,obj) {
                $(obj).bind('click',function() {
                    $('#box').css('visibility','visible');
                    $('#bg').show();
                    $('#tagname').val($(obj).html());
                    $('#tagid').val($(obj).attr('data-id'));
                });
            });
            //绑定删除按钮点击事件
            $('#delbtn').bind('click',function() {
                if(confirm('是否确认要删除此标签？')) {
                    location.href = '../Controllers/back_tagControl.php?type=delete&id='+$('#tagid').val();
                }
            });
            //绑定关闭按钮点击事件
            $('#closebtn').bind('click',function() {
                $('#bg').hide();
                $('#box').css('visibility','hidden');
            });
            //页面加载完成时操作
            $(function() {
                $('.box').css({
                    'top': document.body.clientHeight/2,
                    'left': (document.body.clientWidth/2-$('.box').width()/2)
                });
                $('#bg').css('height',document.body.scrollHeight);
            });
        </script>
    </body>
</html>

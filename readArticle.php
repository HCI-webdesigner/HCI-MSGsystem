<?php
include_once("conf/config.php");
include_once("Controllers/showArticle.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        标题:<?php echo $articleMsg['title']?><br/>
        创建时间:<?php echo $articleMsg['createTime']?><br/>
        内容:<p><?php echo $articleMsg['content']?></p>
        标签:
        <?php
            foreach($allMyTags as $row) {
                echo $row." ";
            }
        ?></br>
        所有评论:</br>
        <?php
            function ff(& $array,$beReplyed) {
                foreach($array as $row) {
                      echo $row['nickName']."评论".$beReplyed.":".$row['content']."    ".$row['createTime']."<br/>";
        ?>
        <form method="post" action="Controllers/addComment.php?replyId=<?php echo $row['ID']?>">
        <textarea rows="5" cols="80" name="comment"></textarea>
        <input type="submit" value="提交回复"/>
        </form>
        <?php
                      if(count($row['reply'])!=0)
                        ff($row['reply'],$row['nickName']);
                }
            }
            $beReplyed = "";
            ff($allComment,$beReplyed);
        ?>
        <form method="post" action="Controllers/addComment.php">
            我的评论:<textarea rows="5" cols="80" name="comment"></textarea><br/>
            <input type="submit" value="添加评论"/>
        </form>
    </body>
</html>





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
        <form method="post" action="Controllers/modifyArticle.php">
            标题:<input type="text" size='91' name="title" value="<?php echo $articleMsg['title']?>"/><br/>
            创建时间:<?php echo $articleMsg['createTime']?><br/>
            内容:<textarea rows="30" cols="80" name="content"><?php echo $articleMsg['content']?></textarea><br/>
            标签:
            <?php
                foreach($allMyTags as $row) {
            ?>
            <input type="checkbox" name="tags[]" checked="true" value="<?php echo $row?>">
            <?php 
                echo $row;
            }
                foreach($otherTags as $row) {
            ?>
            <input type="checkbox" name="tags[]" value="<?php echo $row['name']?>">
            <?php 
                echo $row['name'];
            }
            ?>
            <br/>自定义标签:<br/>
            <input type="text" name="customtag"/></br>
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
<<<<<<< HEAD
                    if(count($row['reply'])!=0)
                        ff($row['reply'],$row['nickName']);
=======
                          if(count($row['reply'])!=0)
                            ff($row['reply'],$row['nickName']);
>>>>>>> fb8a0b816cdef39f6955b4c6dae43822ccbbe9d7
                    }
                }
                $beReplyed = "";
                ff($allComment,$beReplyed);
            ?>
            <input type="submit" value="修改"/>
        </form>

    </body>
</html>





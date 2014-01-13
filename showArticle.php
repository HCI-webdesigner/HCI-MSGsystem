<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="modifyArticle.php">
            标题:<input type="text" size='91' name="title" value="<?php echo $articleMsg['title']?>"/><br/>
            内容:<textarea rows="30" cols="80" name="content"><?php echo $articleMsg['content']?></textarea><br/>
            标签:</br>
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
            <input type="submit" value="submit"/>
        </form>

    </body>
</html>





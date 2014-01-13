<?php
include_once('conf/config.php');
include_once('Controllers/getAllFormalTag.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="Controllers/addArticle.php">
            标题:<input type="text" size='91' name="title"/><br/>
            内容:<textarea rows="30" cols="80" name="content"></textarea><br/>
            选择标签:<br/>
            <?php
            foreach($arr as $row) {
            ?>
            <input type="checkbox" name="formaltag[]" value="<?php echo $row['name']?>">
            <?php 
                echo $row['name'];
            }
            ?>
            <br/>自定义标签:<br/>
            <input type='text' name='customtag'/><br/>
            <input type="submit" value="submit"/>
        </form>

    </body>
</html>





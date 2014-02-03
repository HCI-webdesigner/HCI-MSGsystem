<?php
include_once('../Controllers/back_sliderControl.php');
$sliders = getAll()?getAll():[];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../public/stylesheets/back.css">
    <style>
        .slidertable {
            border-collapse: collapse;
            margin: 20px auto;
            width: 96%;
        }
        .slidertable tr,td,th {
            border: 1px solid #F5F5F5;
            padding: 5px;
            text-align: center;
        }
        .slidertable > thead {
            background: #B3EE3A;
            color: white;
        }
        input[type='text'] {
            margin: 0 auto;
            width:90%;
        }
    </style>
</head>
<body>
    <table class="slidertable">
        <thead>
            <tr>
                <th>权重</th>
                <th>标题</th>
                <th>链接地址</th>
                <th>图片地址</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($sliders as $row) {
            ?>
            <tr>
                <form action="../Controllers/back_sliderControl.php" method="post">
                    <input type="hidden" name="type" value="modify">
                    <input type="hidden" name="ID" value="<?=$row['ID'] ?>">
                    <td><input type="text" name="weight" size="3" value="<?=$row['weight'] ?>"></td>
                    <td><input type="text" name="title" value="<?=$row['title'] ?>"></td>
                    <td><input type="text" name="link" value="<?=$row['link'] ?>"></td>
                    <td><input type="text" name="img" value="<?=$row['img'] ?>"></td>
                    <td><input type="submit" class="btn" value="修改">&nbsp;&nbsp;&nbsp;<input type="button" value="删除" onclick="if(confirm('是否删除？')) {location.href='../Controllers/back_sliderControl.php?type=delete&id=<?=$row['ID'] ?>';}" class="btn"></td>
                </form
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <form action="../Controllers/back_sliderControl.php" method="post">
                    <input type="hidden" name="type" value="add">
                    <td><input type="text" name="weight" size="3"></td>
                    <td><input type="text" name="title"></td>
                    <td><input type="text" name="link"></td>
                    <td><input type="text" name="img"></td>
                    <td><input type="submit" value="增加" class="btn"></td>
                </form>
            </tr>
        </tfoot>
    </table>
</body>
</html>

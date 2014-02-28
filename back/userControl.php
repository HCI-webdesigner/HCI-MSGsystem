<?php
include_once('../Controllers/back_userControl.php');
$rs = paging(20);   //每页显示二十条
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../public/stylesheets/back.css">
        <style>
            .list-table {
                margin: 20px auto;
                width: 80%;
                border: 1px solid #F5F5F5;
            }
            .list-table td,th {
                padding: 10px;
                border: 1px solid #F5F5F5;
            }
            .list-table {
                border-collapse: collapse;
            }
            .list-table > thead {
                color: white;
                font-weight: bold;
                background: rgb(179,238,58);
            }
        </style>
    </head>
    <body>
        <table class="list-table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>昵称</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($rs as $row) {
                ?>
                <tr>
                    <td><?=$row['ID'] ?></td>
                    <td><?=$row['nickname'] ?></td>
                    <td>
                        <?php
                        if($row['isAdmin']==0) {
                        ?>
                        <a class="abtn" href="../Controllers/back_userControl.php?uid=<?=$row['ID'] ?>">设为管理员</a>
                        <?php
                        }
                        else if($row['isAdmin']==1) {
                        ?>
                        <a class="abtn" href="../Controllers/back_userControl.php?uid=<?=$row['ID'] ?>">取消管理员</a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>

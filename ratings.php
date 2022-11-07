<?php
require_once 'includes/connect.php';
$table=mysqli_query($connect,"SELECT * FROM rating ORDER BY score");
include "views/header.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
    <table style="border: 1px solid black">
        <thead>
            <th>User</th>
            <th>Test</th>
            <th>Score</th>
        </thead>
        <tbody>
        <?php /** @var TYPE_NAME $res */
        while ($res=mysqli_fetch_array($table)){?>
            <tr>
                <td>
                    <?= $res['user']?>
                </td>
                <td>
                    <?= $res['test']?>
                </td>
                <td>
                    <?= $res['score']?>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</body>
</html>

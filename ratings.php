<?php
session_start();
require_once 'includes/connect.php';
$cur_usr=$_SESSION['user']['login'];

$cur_usr_ratings=mysqli_query($connect,"SELECT * FROM rating WHERE `user`='$cur_usr' ORDER BY score DESC");
$table=mysqli_query($connect,"SELECT * FROM rating ORDER BY score DESC ");
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
    <div class="rate">
        <h2>All time users ratings</h2>
        <table class="table">
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
    </div>
    <div class="rate">
        <h2>Your ratings</h2>
        <table class="table">
            <thead>
            <th>User</th>
            <th>Test</th>
            <th>Score</th>
            </thead>
            <tbody>
            <?php /** @var TYPE_NAME $res */
            while ($res=mysqli_fetch_array($cur_usr_ratings)){?>
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
    </div>
</body>
</html>

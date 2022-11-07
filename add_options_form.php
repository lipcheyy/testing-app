<?php
session_start();
require_once 'includes/connect.php';
include 'views/header.php';
include 'includes/add_options.php';
$id=$_GET['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/questions.css">
</head>
<body>
    <div class="grey">
    <form action="" method="post" class="add_opt">
        <input type="hidden" value="<?= $id?>" name="id">
        write your option
        <input type="text" name="option">
        write 1(if option is right) or 0
        <input type="text" name="flag">
        <input type="submit" name="save" class="btn">
    </form>
    </div>
</body>
</html>

<?php
session_start();
require_once 'includes/connect.php';
$id=$_GET['id']
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="includes/add_new_question.php" method="post">
    <label for="">write your question</label>
    <input type="hidden" value="<?=$id?>" name="id">
    <input type="text">
    <input type="submit" name="save" value="Choose options">
</form>
</body>
</html>

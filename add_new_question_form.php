<?php
session_start();
require_once 'includes/connect.php';
include "includes/add_new_question.php";
include 'views/header.php';
$id=$_GET['id'];
$questions=mysqli_query($connect,"SELECT * FROM questions WHERE test_id='$id'")
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/questions.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post" class="new_question">
    <label for="">write your question</label>
    <input type="hidden" value="<?=$id?>" name="id">
    <input type="text" name="question">
    <input type="submit" name="save" class="btn" value="Choose options">

</form>
<div class="qustions-list">
    <?php while ($value=mysqli_fetch_array($questions)){?>
    <div class="container">
        <p><?= $value['question']; ?></p>
        <a href="add_options_form.php?id=<?= $value['id']?>" class="opt"> add options</a>
    </div>
    <?php }?>
</div>
</body>
</html>

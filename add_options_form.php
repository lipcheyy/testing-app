<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
require_once 'includes/connect.php';
include 'views/header.php';
include 'includes/add_options.php';
$id=$_GET['id'];
$query=mysqli_query($connect,"SELECT * FROM questions WHERE id='$id'");
$row=mysqli_fetch_array($query);
$test_id=$_SESSION['tid'];
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
       <h2 style="width: 200px;margin: 0 auto;display:flex;" ><?=$row['question']?>?</h2>
    <form action="" method="post" class="add_opt">
        <input type="hidden" value="<?= $id?>" name="id">
        write your option
        <input type="text" name="option">
        write 1(if option is right) or 0
        <input type="text" name="flag">
        <input type="submit" name="save" class="btn">
        <a href="add_new_question_form.php?id=<?=$row['test_id']?>" class="btn">back to questions</a>
    </form>
    </div>
</body>
</html>

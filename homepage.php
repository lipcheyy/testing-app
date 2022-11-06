<?php
session_start();
if(!$_SESSION['user']){
    header('Location: authorization/index.php');
}
include "views/header.php";
require_once 'includes/connect.php';
$test_list=mysqli_query($connect,"SELECT * FROM tests");
if (isset($_POST['home'])){
    unset($_SESSION['results']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <title>Homepage</title>
</head>
<body>
    <div class="container">
        <h1>Tests list:</h1>
        <?php while ($value=mysqli_fetch_array($test_list)){?>
        <div class="item">

                <p>test name: <?=$value['topic']?></p>
                <p>description: <?= $value['description']?></p>
                <p> creator: <?=$value['creator']?></p>
                <?php if ($_SESSION['user']['login']=="admin"):?>
                <a href="add_new_question_form.php?id=<?=$value['id']?> "class='add'>add new questions</a>
                <?php endif;?>
                <a href="start_test.php?id=<?=$value['id']?>" class="start">start testing</a>
        </div>
        <?php }?>
    </div>
</body>
</html>

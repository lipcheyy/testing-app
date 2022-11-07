<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
include "views/header.php";
require_once 'includes/connect.php';
$test_list=mysqli_query($connect,"SELECT * FROM tests");
if (isset($_POST['home'])){

    $cur_usr=$_SESSION['user']['login'];
    $ress=$_SESSION['results'];
    $test_id=$_SESSION['t_id'];
    $get_test_name=mysqli_query($connect,"SELECT topic FROM tests WHERE id='$test_id'");
    $topic_a=mysqli_fetch_array($get_test_name);
    $topic=$topic_a['topic'];
    mysqli_query($connect,"INSERT INTO `rating` (`id`, `user`, `score`, `test`) VALUES (NULL, '$cur_usr', '$ress', '$topic')");
    unset($_SESSION['results']);
    unset($_SESSION['t_id']);
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
    <div class="h_con" style="display: flex; justify-content:  center; margin-top: 10px"><h1 style="margin: 0 auto">Tests list:</h1></div>
    <div class="container">

        <?php while ($value=mysqli_fetch_array($test_list)){?>
        <div class="item">

                <p>test name: <?=$value['topic']?></p>
                <p>description: <?= $value['description']?></p>
                <p> creator: <?=$value['creator']?></p>
                <?php if ($_SESSION['user']['login']=="admin"):?>
                <a href="add_new_question_form.php?id=<?=$value['id']?> "class='add'>add new questions</a>
                    <a href="includes/delete.php?id=<?=$value['id']?> "class='start'>delete</a>
                <?php endif;?>
                <a href="start_test.php?id=<?=$value['id']?>" class="start btn">start testing</a>
        </div>
        <?php }?>
    </div>
</body>
</html>

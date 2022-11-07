<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
include "includes/connect.php";
include 'views/header.php';
include 'results.php';
include 'includes/test_proccess.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/test.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <?php if($exists){?>
            <form action="start_test.php?id=<?= $test_id?>" method="post">
                <input type="hidden" name="q" value="<?=$question_num?>">
                <div class="sui" style="text-align: center">
                    question <?=$question_num?>/<?=$cnt_of_rows?>
                </div>
                <div class="card" style="text-align: center">
                    <span style="color: #d33333">Question</span> <?= $q_title?>?
                </div>
                <?php while ($opt=mysqli_fetch_array($opt_query)){?>
                <div class="options">
                    <input type="radio" required value="<?= $opt['id']?>" name="ans"><?= $opt['answear_option'];?>
                </div>
                <?php }?>

                <div class="btns">
                    <?php if($question_num==$cnt_of_rows){?>
                        <form action="results.php"><button type="submit" class="btn" name="get_res">get res</button></form>
                    <?php } else{?>
                    <button type="submit" class="btn" name="nxt">next</button>
                    <?php }?>
                </div>
            </form>
            <?php }?>
        </div>
    </div>
</body>
</html>

<?php
session_start();
include "includes/connect.php";
include 'views/header.php';
//chckin test id, exisst test or not
$test_id= $_GET["id"];
/** @var TYPE_NAME $connect */
$query=mysqli_query($connect,"SELECT * FROM tests WHERE id='$test_id'");
$row=mysqli_fetch_array($query);
if (!isset($_SESSION['test_id']) or $_SESSION['test_id']!=$test_id){
    $_SESSION['test_id']=$test_id;
    $_SESSION['mark']=0;
}
//my question num
$question_num=$_POST['q'];
if (empty($question_num)){
    $question_num=0;
}
$question_num++;
$frst_quest=$question_num-1;
//if false form w options shouldnot be dispalyed
$exists=false;
//загальна к-ст питанб
$question_summary=mysqli_query($connect,"SELECT count(*) as count FROM questions WHERE test_id='$test_id'");
$q_count=mysqli_fetch_array($question_summary);
$cnt_of_rows=$q_count['count'];

//checking answers
$ans_id=$_POST['ans'];
if (!empty($ans_id)){
    $answer_query=mysqli_query($connect,"SELECT * FROM options WHERE id='$ans_id'");
    $ans_val=mysqli_fetch_array($answer_query);
    $_SESSION['mark']+=$ans_val['flag'];
}


//checking if we still have questns
if ($cnt_of_rows>=$question_num){
    $exists=true;
    $quest_query=mysqli_query($connect,"SELECT * FROM questions WHERE test_id='$test_id' LIMIT {$frst_quest},1");
    $q_row=mysqli_fetch_array($quest_query);
    $q_title=$q_row['question'];
    $q_id=$q_row['id'];
}
//options
$opt_query=mysqli_query($connect, "SELECT * FROM options WHERE question_id='$q_id'");



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
    <div class="container">
        <div class="content">
            <?php if($exists){?>
            <form action="start_test.php?id=<?= $test_id?>" method="post">
                <input type="hidden" name="q" value="<?=$question_num?>">
            <div class="card">
                <?= $q_title?>

            </div>
            <div class="sui">
                question <?=$question_num?> out of <?=$cnt_of_rows?>
            </div>
            <?php while ($opt=mysqli_fetch_array($opt_query)){?>
            <div class="options">
                <input type="radio" value="<?= $opt['id']?>" name="ans"><?= $opt['answear_option']?>
            </div>
            <?php }?>

        <div class="btns">
            <?php if($question_num==$cnt_of_rows){?>
            <button type="submit" class="btns">get res</button>
            <?php } else{?>
            <button type="submit" class="btns">next</button>
            <?php }?>
        </div>
        </form>
            <?php }?>
        </div>
    </div>
</body>
</html>

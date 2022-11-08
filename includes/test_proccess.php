<?php
require_once 'connect.php';
//chckin test id, exisst test or not
$test_id= $_GET["id"];
/** @var TYPE_NAME $connect */
$query=mysqli_query($connect,"SELECT * FROM tests WHERE id='$test_id'");
$row=mysqli_fetch_array($query);
if (!isset($_SESSION['test_id']) or $_SESSION['test_id']!=$test_id){
    $_SESSION['test_id']=$test_id;
}
//my question num
$question_num=$_POST['q_num'];
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


//checking if we still have questns
if ($cnt_of_rows>=$question_num){
    $exists=true;
    $quest_query=mysqli_query($connect,"SELECT * FROM questions WHERE test_id='$test_id' LIMIT {$frst_quest},1");
    $q_row=mysqli_fetch_array($quest_query);
    $q_title=$q_row['question'];
    $q_id=$q_row['id'];

}
//get all options for current question
$ans_id=$_POST['ans'];
$opt_query=mysqli_query($connect, "SELECT * FROM options WHERE question_id='$q_id'");
if (!empty($ans_id)){
    $answer_query=mysqli_query($connect,"SELECT * FROM options WHERE id='$ans_id'");
    $ans_val=mysqli_fetch_array($answer_query);
    $_SESSION['results']+=$ans_val['flag'];
    if (isset($_POST['void'])){
        $_SESSION['results']+=0;
    }
}




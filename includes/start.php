<?php
require_once 'connect.php';
//$test_id= $_GET["id"];
//$query=mysqli_query($connect,"SELECT * FROM tests WHERE id='$test_id'");
//$row=mysqli_fetch_array($query);
//if (!isset($_SESSION['test_id']) or $_SESSION['test_id']!=$test_id){
//    $_SESSION['test_id']=$test_id;
//}
//$question_num=$_GET['q'];
//if (empty($question_num)){
//    $question_num=1;
//}
//$frst_quest=$question_num-1;
//$quest_query=mysqli_query($connect,"SELECT * FROM questions WHERE test_id='$test_id' LIMIT {$frst_quest},1");
//$q_row=mysqli_fetch_array($quest_query);
//$q_title=$q_row['question'];
//$q_id=$q_row['id'];
//
//$opt_query=mysqli_query($connect, "SELECT * FROM options WHERE question_id='$q_id'");
//$opt_row=mysqli_fetch_row($opt_query);
//
//$question_summary=mysqli_query($connect,"SELECT COUNT(*) AS count FROM questions WHERE test_id='$test_id'");
<?php
require_once 'connect.php';
$test_id=$_POST['id'];
$question=$_POST['question'];
if (isset($_POST['save'])){
    mysqli_query($connect,"INSERT INTO `questions` (`id`, `test_id`, `question`) VALUES (NULL, '$test_id', '$question')");
    header('Location:'.$_SERVER['HTTP_REFERER']);
}

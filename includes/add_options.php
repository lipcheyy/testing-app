<?php
session_start();
require_once 'connect.php';
$question_id=$_POST['id'];
$option=$_POST['option'];
$flag=$_POST['flag'];
if (isset($_POST['save'])){
    mysqli_query($connect,"INSERT INTO `options` (`id`, `question_id`, `answear_option`, `flag`) VALUES (NULL, '$question_id', '$option', '$flag')");
}
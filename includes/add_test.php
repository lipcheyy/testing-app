<?php
session_start();
require_once 'connect.php';
$topic=$_POST['topic'];
$creator=$_SESSION['user']['login'];
$description=$_POST['description'];
$id=$_GET['id'];
if (isset($_POST['save'])){
    $query="INSERT INTO `tests` (`id`, `creator`, `topic`, `description`) VALUES (NULL, '$creator', '$topic', '$description')";
    mysqli_query($connect,$query);
    header('Location: homepage.php');
}

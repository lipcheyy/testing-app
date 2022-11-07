<?php
require_once 'connect.php';
if (isset($_GET['id'])){
    $id=$_GET['id'];
    mysqli_query($connect,"DELETE FROM `tests` WHERE id='$id'");
    mysqli_query($connect,"DELETE FROM questions WHERE test_id=$id");
    header('Location:'.$_SERVER['HTTP_REFERER']);
}
else{
    die("not_sui");
}
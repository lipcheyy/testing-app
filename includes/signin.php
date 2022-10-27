<?php
    session_start();
    require_once 'connect.php';
    $login=$_POST['login'];
    $pass=md5($_POST['pass']);
    $check_usr=mysqli_query($connect,"SELECT * FROM `users` WHERE `login`='$login' AND `password`='$pass' ");
    if(mysqli_num_rows($check_usr)>0){

    }
    else{
        $_SESSION['msg']="WRONG LOGIN OR PASSWORD";
        header('Location: ../index.php');
    }
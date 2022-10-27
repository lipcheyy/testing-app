<?php
    session_start();
    require_once 'connect.php';
    $login=$_POST['login'];
    $pass=md5($_POST['pass']);
    $check_usr=mysqli_query($connect,"SELECT * FROM `users` WHERE `login`='$login' AND `password`='$pass' ");
    if(mysqli_num_rows($check_usr)>0){
        //PARSE CHECK USER INTO NORMAL ARRAY
        $user=mysqli_fetch_assoc($check_usr);
        $_SESSION['user']=[
            'id' => $user['id'],
            'full_name' => $user['full-name'],
            'email' => $user['email'],
            'avatar' => $user['avatar'],
            'login' => $user['login']
        ];
    }
    else{
        $_SESSION['msg']="WRONG LOGIN OR PASSWORD";
        header('Location: ../index.php');
    }
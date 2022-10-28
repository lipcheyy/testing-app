<?php
    session_start();
    require_once 'connect.php';
    $login=$_POST['login'];
    $pass=md5($_POST['pass']);
    /** @var TYPE_NAME $connect */
    $check_usr=mysqli_query($connect,"SELECT * FROM `users` WHERE `login`='$login' AND `password`='$pass' ");
    if(mysqli_num_rows($check_usr)>0){
        //transform CHECK USER INTO NORMAL ARRAY
        $user=mysqli_fetch_assoc($check_usr);
        $_SESSION['user']=[
            'id' => $user['id'],
            'full_name' => $user['full-name'],
            'email' => $user['email'],
            'avatar' => $user['avatar'],
            'login' => $user['login']
        ];
        //header('Location: ../homepage.php');
        echo "sucessful";
    }
    else{
        echo "notsucesfull";
    }
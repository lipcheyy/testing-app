<?php
session_start();
//database connect
require_once 'connect.php';
//VARIABLES
$full_name=$_POST['fullName'];
$login=$_POST['login'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$pass_rep=$_POST['pass-rep'];

//uploads path


if ($pass===$pass_rep){
    $path= 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], "../$path")){
        $_SESSION['msg']="UPLOAD AVATAR IMAGE";
        header('Location: ../registration.php');
    }
    $pass=md5($pass);
    /** @var TYPE_NAME $connect */
    mysqli_query($connect,"INSERT INTO `users` (`id`, `full-name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name','$login', '$email', '$pass', '$path')");
    $_SESSION['msg']="SIGNED UP SUCESFULLY";
    header('Location: ../signinform.php');
}

else{
    $_SESSION['msg']="PASSWORDS ARE NOT THE SAME";
    header('Location: ../registration.php');
}

?>

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
if ($pass==$pass_rep){
    echo "rigth";
}
else{
    $_SESSION['msg']="PASSWORDS ARE NOT THE SAME";
    header('Location: ../registration.php');
}
echo $pass_rep;
<?php
session_start();
//database connect
require_once 'connect.php';
//VARIABLES
$full_name=$_POST['full_name'];
$login=$_POST['login'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$pass_rep=$_POST['password_confirm'];

/** @var TYPE_NAME $connect */
$check_login=mysqli_query($connect,"SELECT * FROM `users` WHERE `login`=`$login`");
if (mysqli_num_rows($check_login)>0 ){
    $response=[
        "status"=>false,
        "message"=>"USER WITH LOGIN NAME EXISTS",
        "fields"=>['login']
    ];
    echo json_encode($response);
    die();
}

$errors=[];
if ($login===""){
    $errors[]='login';
}
if ($pass===""){
    $errors[]='pass';
}
$errors=[];
if ($email==="" or !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[]='email';
}
if ($pass_rep===""){
    $errors[]='pass-rep';
}
if ($full_name===""){
    $errors[]='fullName';
}
if (!$_FILES['avatar']){
    $errors[]='avatar';
}
if (!empty($errors)){
    $response=[
        "status"=>false,
        "type"=>1,
        "message"=>"CHECK IF FIELDS ARE NOT EMPTY",
        "fields"=>$errors
    ];
    echo json_encode($response);
    die();
}
//uploads path
if ($pass===$pass_rep){
    $path= 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], "../$path")){
        $response=[
            "status"=>false,
            "type"=>2,
            "message"=>"ERROR LOADING AVATAR",
        ];
        echo json_encode($response);
    }
    $pass=md5($pass);
    /** @var TYPE_NAME $connect */
    mysqli_query($connect,"INSERT INTO `users` (`id`, `full-name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name','$login', '$email', '$pass', '$path')");
    $response=[
        "status"=>true,
        "message"=>"SUCCESFULL",
    ];
    echo json_encode($response);
}

else{
    $response=[
        "status"=>false,
        "message"=>"PASSWORDS ARE NOT SAME",
    ];
    echo json_encode($response);
}

?>

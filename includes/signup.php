<?php

session_start();
include 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

/** @var TYPE_NAME $connect */
$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "SUCH A LOGIN: $login ALREADY EXISTS",
        "fields" => ['login']
    ];

    echo json_encode($response);
    die();
}
//searching fields with error
$errors = [];
if (trim($login) == '') {
    $errors[] = 'login';
}
if (trim($password) === '') {
    $errors[] = 'password';
}
if (trim($full_name) === '') {
    $errors[] = 'full_name';
}
if (trim($email) === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'email';
}
if (trim($password_confirm) === '') {
    $errors[] = 'password_confirm';
}

If (!empty($errors)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "CHECK THE FIELDS CONTENT",
        "fields" => $errors
    ];

    echo json_encode($response);

    die();
}

if ($password === $password_confirm) {
    $password = md5($password);
    mysqli_query($connect, "INSERT INTO `users` (`id`, `full-name`, `login`, `email`, `password`) VALUES (NULL, '$full_name', '$login', '$email', '$password')");
    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];


} else {
    $response = [
        "status" => false,
        "message" => "PASSWORDS ARE NOT SAME",
    ];
}
echo json_encode($response);

?>

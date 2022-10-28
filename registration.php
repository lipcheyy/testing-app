<?php
    session_start();
    if($_SESSION['user']){
    header('Location: homepage.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/auth.css">
    <title>Document</title>
</head>
<body>
<div class="form-container">
    <form class="auth-form">
        <label for="">FULL NAME</label>
        <input type="text" name="full_name" placeholder="Your full name" class="full_name" autocomplete="off">
        <label for="">Login</label>
        <input type="text" name="login" placeholder="Your account login" class="login"  autocomplete="off">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Your email" class="email"  autocomplete="off">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Write your password" class="pass"  autocomplete="off">
        <label for="">Repeat password</label>
        <input type="password" name="password_confirm" placeholder="repeat your password" class="pass-rep" autocomplete="off">
        <label for="ph">Choose your avatar</label>
        <input type="file" id="ph" name="avatar" class="avatar">
        <input type="submit"  name="sign-up" value="sign up" class="sign-up">
        <div>
           Already have an account - <a href="index.php" style="color: blue">Sign in!</a>
        </div>
        <div class="message hide"></div>
    </form>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

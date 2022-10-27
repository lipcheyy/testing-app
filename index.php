<?php
session_start();
if(!$_SESSION['user']){
    header('Location: authorization/signinform.php');
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <title>Homepage</title>
</head>
<body>
<a href="includes/exit.php">EXIT</a>

</body>
</html>

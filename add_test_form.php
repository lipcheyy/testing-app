<?php
session_start();
require_once 'includes/connect.php';
include "includes/add_test.php";
include 'views/header.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/questions.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post" class="add_opt">
    <label for="photo">Choose test topic</label>
    <input type="text" name="topic" id="photo">
    <label for="desc">add short description</label>
    <input type="text" name="description" id="desc">
    <input type="submit" name="save" id="save" class="btn">
</form>
</body>
</html>

<?php
session_start();
unset($_SESSION['user']);
header('Location: ../authorization/signinform.php');

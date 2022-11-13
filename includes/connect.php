<?php

$connect= mysqli_connect('localhost','root','root','testing-app');
//debug for checking if db connected
if (!$connect){
    die('disconnected');
}

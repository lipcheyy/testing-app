<?php
echo "hello world";
$connect= mysqli_connect('localhost','root','','testing-app');
//debug for chercking if db connected
if (!$connect){
    die('disconnected');
}

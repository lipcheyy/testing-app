<?php
session_start();
require_once 'connect.php';
if (isset($_POST['get_res'])){
    print_r($_SESSION['results']+1);
    echo "<form action='homepage.php' method='post'><input type='submit' value='завершити перегляд' name='home'> </form>";

}
?>

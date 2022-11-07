<?php
session_start();
?>
<link rel="stylesheet" href="css/header.css">
<header>
    <a class="user_login text" href="homepage.php">Hello, <?= $_SESSION['user']['login']?></a>
    <a href="ratings.php" class="text">Rate table</a>
    <?php if ($_SESSION['user']['login']=='admin'):?>
        <a href="adminpanel.php">Admin Panel</a>
    <?php endif;?>
    <a class="sui text" href="includes/exit.php">EXIT</a>

</header>



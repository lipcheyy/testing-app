<?php session_start();
    if($_SESSION['user']){
        header('Location: index.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/auth.css">
    <title>AUTHORIZATION</title>
</head>
<body>
    <!--AUTHORIZATION FORM-->
    <div class="form-container">
        <form action="../includes/signin.php" method="post" class="auth-form">
            <label for="">Login</label>
            <input type="text" placeholder="Write your login" name="login">
            <label for="">Password</label>
            <input type="password" placeholder="Write your password" name="pass" required >
            <input type="submit" value="sign in" class="sign-in">
            <div>
                Not have an accoutn? - <a href="registration.php" style="color: blue">Sign up</a>
            </div>
            <?php
            if(isset($_SESSION['msg']))
            {
                echo "<div class=message style='border-color: green'>" . $_SESSION['msg'] . "</div>";
                unset($_SESSION['msg']);
            }
            ?>
        </form>
    </div>
</body>
</html>

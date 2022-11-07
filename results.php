<?php
session_start();
$test_id=$_GET['id'];
require_once 'includes/connect.php';
//questions count
$question_summary=mysqli_query($connect,"SELECT count(*) as count FROM questions WHERE test_id='$test_id'");
$q_count=mysqli_fetch_array($question_summary);
$cnt_of_rows=$q_count['count'];
$_SESSION['t_id']=$test_id;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
<?php
//show results
if (isset($_POST['get_res'])){ ?>
    <?php
    /*if session is empty*/
    if ($_SESSION['results']==0){?>
        <div class="res_container">
            <h1>You answered correct on 0 questionss out of <?= $cnt_of_rows?></h1>
        </div>
    <?php } else {?>
        <div class="res_container">
            <h1>You answered correct on <?=$_SESSION['results']+1?> questions ot of <?= $cnt_of_rows?> </h1>
        </div>
    <?php }
    echo "<div class='res_container home-btn'><form action='homepage.php' method='post'><input type='submit' value='завершити перегляд' name='home' class='btn'> </form></div> ";
}

?>
</body>
</html>

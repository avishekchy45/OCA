<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php

if (isset($_SESSION['user'])) {
    $user=$_SESSION['user'];
    if ($user == 'instructor') {
        header("Location:instructor/home.php");
    } else if ($user == 'student') {
        header("Location:student/home.php");
    }
}
?>
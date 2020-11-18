<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user == 'student' || $user == 'instructor')
        header("Location:user/home.php");
}
?>
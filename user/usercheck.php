<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
if ($user != 'student' && $user != 'instructor') {
    header("Location:../login.php");
}
?>
<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user == 'student' || $user == 'instructor')
            echo("<script>location.href = 'user/home.php';</script>");
    else if ($user == 'admin')
            echo("<script>location.href = 'admin/home.php';</script>");
}
?>
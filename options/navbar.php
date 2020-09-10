<?php
if (isset($_GET['footer'])) {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo <<<HTML
        <a href="../$user/home.php" class="option"> BACK TO HOME </a>
        HTML;
    } else {
        echo <<<HTML
        <a href="../login.php" class="option"> LOG IN </a>
        <a href="../signup.php" class="option"> SIGN UP </a>
        HTML;
    }
} else {
    if (isset($_SESSION['user'])) {
        echo <<<HTML
        <a href="settings.php" class="option"> SETTINGS </a>
        <a href="home.php" class="option"> PROFILE </a>
        <a href="?logout" class="option"> LOGOUT </a>
        HTML;
    } else {
        echo <<<HTML
        <a href="login.php" class="option"> LOG IN </a>
        <a href="signup.php" class="option"> SIGN UP </a>
        HTML;
    }
}
if (isset($_GET['logout'])) {
    $_SESSION['login_status'] = "out";
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
    header("Location:../login.php");
}

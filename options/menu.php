<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user == 'admin') {
        echo <<<HTML
        <a href="add.php" class="option"> ADD COURSES </a>
        <a href="message.php" class="option"> MESSAGES </a>
        HTML;
    } else if ($user == 'instructor') {
        echo <<<HTML
        <a href="teach.php" class="option"> TEACH COURSES </a>
        <a href="assigned.php" class="option"> ASSIGNED COURSES </a>
        <a href="enrolled.php" class="option"> ENROLLED STUDENTS </a>
        <a href="message.php" class="option"> MESSAGES </a>
        HTML;
    } else if ($user == 'student') {
        echo <<<HTML
        <a href="avail.php" class="option"> AVAIL COURSES </a>
        <a href="taken.php" class="option"> TAKEN COURSES </a>
        <a href="requested.php" class="option"> REQUESTED COURSES </a>
        <a href="message.php" class="option"> MESSAGES </a>
        HTML;
    }
}

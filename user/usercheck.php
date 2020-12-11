<?php
if ($user != 'student' && $user != 'instructor') {
    echo("<script>location.href = '../login.php';</script>");
}
?>
<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user == 'admin')
        header("Location:home.php");
}
include("../validation.php");
?>
<!--DESIGNED BY AVISHEK CHOWDHURY-->

<html>

<head>
    <title>LOGIN-OCA</title>
    <meta charset="UTF-8">
    <meta name="OCA" content="Online Class Material, Classroom, Free courses">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/png" href="../icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/a15ab95a54.js"></script>
</head>

<body>
    <div class="row-1">
        <div class="header col-12">
            <?php
            include("../options/header.php");
            ?>
        </div>
    </div>

    <div class="row-2">
        <div class="navbar col-12">
            <nav>
            </nav>
        </div>
    </div>

    <div class="row-3">
        <div class="menu col-3">
        </div>

        <div class="main col-6">
            <form id="form" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">

                <h2>ADMIN PANEL</h2>

                <label for="user"></label>
                <select id="user" name="user" size="1" required autofocus>
                    <option value="">Login As</option>
                    <option value="admin">ADMIN</option>
                </select><br>

                <label for="id/username"></label>
                <input type="text" id="id/username" name="id" placeholder="ID/USERNAME" maxlength="21" Ztitle="Enter your ID/USERNAME" required><br>

                <label for="pass"></label>
                <input type="password" id="pass" name="pass" placeholder="PASSWORD" title="Enter your PASSWORD" required><br>

                <button type="reset" onclick="alert('Form Reset!')">RESET</button>
                <button type="submit" name="login">LOGIN</button><br><br>

                <a href="" class="option" onclick="alert('Please contact with admin!')">Forget Password ?</a><br>

            </form>

        </div>

        <div class="sidebar col-3">

        </div>
    </div>

    <div class="row-4">
        <div class="footer col-12">
            <footer>
            </footer>
        </div>
    </div>

</body>

</html>
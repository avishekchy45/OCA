<?php
session_start();
?>
<!DOCTYPE html>
<!--DESIGNED BY AVISHEK CHOWDHURY-->
<html>

<head>
    <title>ONLINE CLASS ASSISTANCE-login</title>
    <meta charset="UTF-8">
    <meta name="OCA" content="DBMS,ADA,DS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/png" href="icon.png" />
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/a15ab95a54.js"></script>
</head>

<body>
    <div class="row-1">
        <div class="header col-12">
            <h1>Online Class Assistance</h1>
        </div>
    </div>

    <div class="row-2">
        <div class="navbar col-12">
            <nav>
                <a href="login.php" class="option"> LOG IN </a>
                <a href="signup.php" class="option"> SIGN UP </a>
                <a href="aboutus.htm" class="option"> ABOUT US </a>
            </nav>
        </div>
    </div>

    <div class="row-3">
        <div class="menu col-3">
        </div>

        <div class="main col-6">
            <form id="form1" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">

                <h2>LOG IN</h2><br>

                <label for="dept"></label><br>
                <select id="dept" name="department" size="1" required autofocus>
                    <option value="">Choose Department</option>
                    <option value="CSE">Computer Science & Engineering</option>
                    <option value="EEE">Electrical & Electronics Engineering</option>
                    <option value="other">Other</option>
                </select><br><br>

                <label for="id"></label>
                <input type="text" id="id" name="id" placeholder="Student ID" pattern="[0-9]{4}" title="Enter 13 digit ID" required><br><br>

                <label for="pass"></label>
                <input type="password" id="pass" name="pass" placeholder="Password" minlength="6" required><br><br>

                <button type="reset" onclick="alert('Form Reset!')">RESET</button>
                <button type="submit" name="login">LOGIN</button><br><br>

                <a href="password.php" class="option">Forget Password ?</a>

            </form>

        </div>

        <div class="sidebar col-3">

            <?php
            include("connectdb.php");
            if (isset($_POST['login'])) {
                $uid = $_POST['id'];
                $upass = $_POST['pass'];

                $sql = "select id,pass from users where id='$uid' and pass='$upass'";
                $r = mysqli_query($con, $sql);
                if (mysqli_num_rows($r) > 0) {
                    $_SESSION['user_id'] = $uid;
                    $_SESSION['admin_login_status'] = "loged in";
                    header("Location:Pages/home.php");
                } else {
                    echo "<p style='color: red;'>Incorrect UserId or Password</p>";
                }
            }
            ?>

        </div>
    </div>

    <div class="row-4">
        <div class="footer col-12">
            <footer>
                <a href="contact.htm" class="option">Contact Information</a>
                <a href="privacy.htm" class="option">Privacy Policy</a>
                <a href="terms.htm" class="option">Terms of Services</a>
                <a href="copyright.htm" class="option">Copyright Information</a>
                <a href="sitemap.htm" class="option">Sitemap and Related Documents</a>
            </footer>
        </div>
    </div>

</body>

</html>
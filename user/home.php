<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");
?>
<!--DESIGNED BY AVISHEK CHOWDHURY-->

<html>

<head>
    <title>HOME</title>
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
                <?php
                include("../options/navbar.php");
                ?>
            </nav>
        </div>
    </div>

    <div class="row-3">
        <div class="menu col-3">
            <?php
            include("../options/menu.php");
            ?>
        </div>

        <div class="main col-6">

            <h2>PROFILE</h2>
            <hr>
            <?php
            //NAME,ID,EMAIL,PHONENUMBER,BIRTHDATE,GENDER,LANGUAGES,ABOUT,PASS,PHOTO
            //'$name','$id','$email','$phone_num','$bdate','$gender','" . $languages . "','$about','$pass','$photo'
            $query = "select NAME,EMAIL,PHONENUMBER,BIRTHDATE,GENDER,LANGUAGES,ABOUT,PHOTO,DATEDIFF(CURRENT_TIMESTAMP,REGISTRATION) as TIME from $user where ID='$id'";
            $r = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($r);
            $name = $row['NAME'];
            $email = $row['EMAIL'] == '' ? "NOT FOUND <a href='settings.php'>UPDATE</a>" : $row['EMAIL'];
            $phone_num = $row['PHONENUMBER'] == '' ? "NOT FOUND <a href='settings.php' class='approve'>UPDATE</a>" : $row['PHONENUMBER'];
            $bdate = $row['BIRTHDATE'] == '' ? "NOT FOUND <a href='settings.php'>UPDATE</a>" : $row['BIRTHDATE'];
            $gender = $row['GENDER'] == '' ? "NOT FOUND <a href='settings.php'>UPDATE</a>" : $row['GENDER'];
            $languages = $row['LANGUAGES'] == '' ? "NOT FOUND <a href='settings.php'>UPDATE</a>" : $row['LANGUAGES'];
            $about = $row['ABOUT'];
            $photo = $row['PHOTO'] == '' ? "default.png" : $row['PHOTO'];
            $reg = $row['TIME'] . ' days';
            echo "
            <h3>Welcome $name($id) </h3>
            <img class='dp' src='../uploads/user_photo/$photo' alt='$name'/>
            <br>
            $about
            <br>
            <a href='settings.php'>UPDATE YOUR BIO</a>
            <table class='profile' id='profile'>
            <tr>
            <th>YOUR EMAIL</th><td>$email</td>
            </tr>
            <tr>
            <th>YOUR PHONE NUMBER</th><td>$phone_num</td>
            </tr>
            <tr>
            <th>YOUR BIRTHDATE</th><td>$bdate</td>
            </tr>
            <tr>
            <th>YOUR GENDER</th><td>$gender</td>
            </tr>
            <tr>
            <th>LANGUAGES</th><td>$languages</td>
            </tr>
            <tr>
            <th>MEMBER SINCE</th><td>$reg</td>
            </tr>
            </table>
            ";
            ?>

        </div>

        <div class="sidebar col-3">
        </div>
    </div>

    <div class="row-4">
        <div class="footer col-12">
            <footer>
                <?php
                include("../options/footer.php");
                ?>
            </footer>
        </div>
    </div>

</body>

</html>
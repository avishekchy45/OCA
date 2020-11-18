<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");
?>
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

            <h1>PROFILE</h1>
            <hr>
            <?php
            //NAME,ID,EMAIL,PHONENUMBER,BIRTHDATE,GENDER,LANGUAGES,ABOUT,PASS,PHOTO
            //'$name','$id','$email','$phone_num','$bdate','$gender','" . $languages . "','$about','$pass','$photo'
            $query = "select * from $user where ID='$id'";
            $r = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($r);
            $name = $row['NAME'];
            $email = $row['EMAIL'];
            $phone_num = $row['PHONENUMBER'];
            $bdate = $row['BIRTHDATE'];
            $gender = $row['GENDER'];
            $languages = $row['LANGUAGES'];
            $about = $row['ABOUT'];
            $photo = $row['PHOTO'] == '' ? "default.png" : $row['PHOTO'];
            echo <<<HTML
            <h2>Welcome $name($id) </h2>
            <img class='dp' src='../uploads/user_photo/$photo' alt='$name'/>
            HTML;
            ?>
            <hr>

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
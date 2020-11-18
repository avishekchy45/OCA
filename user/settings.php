<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");
if (isset($_POST['changepass'])) {
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];
    if ($npass == $cpass) {
        $sql = "select pass from $user where pass='$opass' and ID='$id'";
        $r = mysqli_query($con, $sql);
        if (mysqli_num_rows($r) > 0) {
            $sql1 = "update $user set pass='$npass' where ID='$id'";
            if (mysqli_query($con, $sql1)) {
                echo "<correct> Password Changed Successfully... </correct>";
            }
        } else {
            echo "<wrong> Old password does not match! </wrong>";
        }
    } else {
        echo "<wrong> New password does not match with Confirm password! </wrong>";
    }
}
if (isset($_POST['changename'])) {
    $nname = $_POST['nname'];
    $sql = "UPDATE $user SET NAME='$nname' where ID='$id'";
    if (mysqli_query($con, $sql)) {
        echo "<correct> Name Changed Successfully... </correct>";
    }
}
?>
<html>

<head>
    <title>OCA</title>
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
        </div>

        <div class="main col-6">

            <form id="form1" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">

                <label for="option"></label>
                <select id="option" name="option" size="1" required autofocus>
                    <option value="">SELECT AN OPTION</option>
                    <option value="changepass"> CHANGE PASSWORD </option>
                    <option value="changename"> CHANGE NAME </option>
                    <option value="changephoto"> CHANGE PHOTO </option>
                </select><br>
                <button type="submit" value="GO" name="go">GO!</button><br><br>

            </form>
            <?php
            if (isset($_POST['go'])) {
                $option = $_POST['option'];
                if ($option == 'changepass') {
                    echo <<<HTML
                    <form id="form" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">
                    <label for="pass"></label>
                    <input type="password" id="pass" name="opass" placeholder="Old Password..." required><br>
                    <label for="pass"></label>
                    <input type="password" id="pass" name="npass" placeholder="New Password..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required><br>
                    <label for="pass"></label>
                    <input type="password" id="pass" name="cpass" placeholder="Confirm New Password..." required><br>
                    <button type="submit" value="Change Password" name="changepass">Change Password</button><br><br>
                    </form><br><br>
                    HTML;
                }
                if ($option == 'changename') {
                    echo <<<HTML
                    <form id="form" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">
                    <label for="name"></label>
                    <input type="text" id="name" name="nname" placeholder="New Name" pattern="[A-Za-z ]{3,}" title="Enter your New Name" required><br>
                    <button type="submit" value="Change Name" name="changename">Change Name</button><br><br>
                    </form><br><br>
                    HTML;
                }
            }
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
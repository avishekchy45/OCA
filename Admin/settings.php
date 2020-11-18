<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");
if (isset($_POST['resetpass'])) {
    $resetuser = $_POST['resetuser'];
    $resetid = $_POST['resetid'];
    $sql = "SELECT PASS FROM $resetuser WHERE ID='$resetid'";
    $r = mysqli_query($con, $sql);
    if (mysqli_num_rows($r) > 0) {
        $sql2 = "UPDATE $resetuser SET PASS=DEFAULT(PASS) WHERE ID='$resetid'";
        if (mysqli_query($con, $sql2)) {
            echo "<correct> Password RESET Successful... </correct>";
        }
    } else {
        echo "<wrong> USER NOT FOUND! </wrong>";
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
                    <option value="resetpass"> RESET PASSWORD </option>
                    <option value="resetid"> RESET ID </option>
                </select><br>
                <button type="submit" value="GO" name="go">GO!</button><br><br>

            </form>
            <?php
            if (isset($_POST['go'])) {
                if (isset($_POST['option']) == 'resetpass') {
                    echo <<<HTML
                    <form id="form" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">
                    <label for="user"></label>
                    <select id="user" name="resetuser" size="1" required autofocus>
                        <option value="">RESET PASSWORD OF</option>
                        <option value="instructor">INSTRUCTOR</option>
                        <option value="student">LEARNER</option>
                    </select><br>
                    <label for="id/username"></label>
                    <input type="text" id="id/username" name="resetid" placeholder="ID/USERNAME" maxlength="21" title="Enter ID/USERNAME" required><br>
                    <button type="submit" value="Reset Password" name="resetpass">Reset Password</button><br><br>
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
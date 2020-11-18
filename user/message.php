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

            <?php
            $query = "SELECT * FROM chat WHERE RECEIVER='$id' OR RECEIVER='all' ORDER BY MSG_TIME DESC";
            $r = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($r)) {
                $time = $row['MSG_TIME'];
                $from = $row['SENDER'];
                $to = $row['RECEIVER'];
                $msg = $row['MESSAGE'];
                echo "<post>
                <hr>FROM: <u>$from</u><br>TO: <u>$to</u><br>TIME: <u>$time</u>
                <hr>
            </post> <i>$msg</i> <br><br>";
            }
            ?>

        </div>

        <div class="sidebar col-3">
            <?php
            include("../options/sidebar.php");
            ?>
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
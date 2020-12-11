<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");

if (isset($_POST['add'])) {
    $coursecode = $_POST['coursecode'];
    $title = $_POST['title'];
    $credit = $_POST['credit'];

    $query = "insert into course(COURSE_CODE,TITLE,CREDIT) values('$coursecode','$title','$credit')";
    if (mysqli_query($con, $query)) {
        echo "<correct> Successfully Added Course... </correct>";
    } else {
        echo "<wrong> Error! </wrong>" . mysqli_error($con);
    }
}
?>
<!--DESIGNED BY AVISHEK CHOWDHURY-->
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

            <form id="form" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">

                <label for="coursecode"></label>
                <input type="text" id="coursecode" name="coursecode" placeholder="Course Code" required><br>

                <label for="title"></label>
                <input type="text" id="title" name="title" placeholder="Course Title" required><br>

                <label for="credit"></label>
                <input type="text" id="credit" name="credit" placeholder="Course Credit" required><br>

                <button type="submit" value="Add Course" name="add">Add Course</button><br><br>

            </form>

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
            </footer>
        </div>
    </div>

</body>

</html>
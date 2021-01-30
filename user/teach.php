<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("isinstructor.php");
include("../connection.php");

if (isset($_POST['teach'])) {
    $coursecode = $_POST['coursecode'];
    //$semester=$_POST['semester'];
    //$section=$_POST['section'];
    $secid = "C" . $_POST['semester'] . $_POST['section'];
    $query = "insert into assign(COURSE_CODE,SECTION_ID,INS_ID) values('$coursecode','$secid','$id')";
    if (mysqli_query($con, $query)) {
        echo "<correct> Successfully Assigned Course... </correct>";
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

            <form id="form1" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">

                <label for="coursecode"></label>
                <select id="coursecode" name="coursecode" size="1" required>
                    <option value="">SELECT COURSE</option>
                    <?php
                    $query = "select * from course";
                    $r = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($r)) {
                        $coursecode = $row['COURSE_CODE'];
                        $title = $row['TITLE'];
                        $credit = $row['CREDIT'];
                        echo "
                            <option value='$coursecode'>$coursecode-$title</option>
                        ";
                    }
                    ?>
                </select><br>
                <wrong>**SELECT SEMESTER AND SECTION. A SECTION ID WILL BE GENERATED FROM YOUR SELECTED SEMESTER AND SECTION.<wrong><br>
                        <label for="semester"></label>
                        <select id="semester" name="semester" size="1" required>
                            <option value="">SEMESTER</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                            <option value="6">6th</option>
                            <option value="7">7th</option>
                            <option value="8">8th</option>
                        </select><br>

                        <label for="section"></label>
                        <select id="section" name="section" size="1" required>
                            <option value="">SECTION</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select><br>

                        <button type="submit" value="Teach Course" name="teach">Teach Course</button><br><br>

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
            <?php
            include("../options/footer.php");
            ?>
            </footer>
        </div>
    </div>

</body>

</html>
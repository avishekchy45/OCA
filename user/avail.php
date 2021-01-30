<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("isstudent.php");
include("../connection.php");

if (isset($_POST['avail'])) {
    $coursecode = $_GET['course'];
    $secid = $_POST['section'];
    $query = "insert into taken(COURSE_CODE,SECTION_ID,STD_ID,CSTATUS) values('$coursecode','$secid','$id','pending')";
    if (mysqli_query($con, $query)) {
        echo "<correct> Successfully Requested For Course... </correct>";
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
                <select id="coursecode" name="course" size="1" required>
                    <option value="">SELECT COURSE</option>
                    <?php
                    $sql = "select distinct assign.COURSE_CODE,TITLE from assign,course where assign.COURSE_CODE=course.COURSE_CODE";
                    $r = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($r)) {
                        $coursecode = $row['COURSE_CODE'];
                        $title = $row['TITLE'];
                        echo "<option value='$coursecode'>$coursecode-$title</option>";
                    }
                    ?>
                </select><br>
                <button type="submit" value="Go" name="go">Go</button><br><br>
            </form>

            <?php
            if (isset($_POST['go'])) {
                echo "
                <style>
                #form1{
                    display:none;
                }
                </style>
                ";
                $coursecode = $_POST['course'];
                echo "
                <form action='avail.php?course=$coursecode' id='form2' autocomplete='on' target='_self' enctype='multipart/form-data' method='POST'>
                <label for='section'></label>
                <select id='section' name='section' size='1' required>
                    <option value=''>AVAILABLE SECTIONS</option>
                ";
                $sql = "select SECTION_ID from assign where COURSE_CODE='$coursecode'";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $secid = $row['SECTION_ID'];
                    echo "<option value='$secid'>$secid</option>";
                }
                echo "
                </select><br>
                <button type='submit' value='Avail Course' name='avail'>Avail Course</button><br><br>
                </form>
                ";
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
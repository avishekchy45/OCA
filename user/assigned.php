<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");
if (isset($_POST['post'])) {
    $coursecode = $_GET['coursecode'];
    $secid = $_GET['secid'];
    $post = $_POST['material'];
    $postid=rand(1,100);
    $postid = "$coursecode" . "$secid" . "$postid";
    $query = "INSERT INTO post(POSTED_BY,POST_ID,COURSE_CODE,SECTION_ID,MATERIAL) VALUES('$id','$postid','$coursecode','$secid','$post')";
    if (mysqli_query($con, $query))
        echo "<correct> POST SUBMITTED.SELECT COURSE TO CONTINUE...</correct>";
    else
        echo "<wrong> Error! </wrong>" . mysqli_error($con);
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

                <label for="course"></label>
                <select id="course" name="course" size="1" required>
                    <option value="">SELECT COURSE</option>
                    <?php
                    $query = "select * from assign where INS_ID='$id'";
                    $r = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($r)) {
                        $coursecode = $row['COURSE_CODE'];
                        $secid = $row['SECTION_ID'];
                        echo "
                            <option value='$coursecode-$secid'>$coursecode-$secid</option>
                        ";
                    }
                    ?>
                </select><br>
                <button type="submit" value="GO" name="go">GO</button><br><br>
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
                $course = $_POST['course'];
                $course = explode('-', $course);
                $coursecode = "$course[0]";
                $secid = "$course[1]";
                echo "<post>COURSE_CODE: <b>$coursecode</b> <br> SECTION_ID: <b>$secid</b></post><br><br>";
                echo "
                <form action='assigned.php?coursecode=$coursecode&secid=$secid' id='form2' autocomplete='on' target='_self' enctype='multipart/form-data' method='POST'>
                <label for='post'></label>
                <textarea rows='5' cols='45' id='post' name='material' maxlength='101' placeholder='Write announcements for your students here...(maximum 101 characters)'></textarea><br>
                <button id='approve' type='submit' value='POST' name='post'>POST</button>
                </form><br><br>
                ";
                $query = "SELECT * FROM post WHERE COURSE_CODE='$coursecode' AND SECTION_ID='$secid' ORDER BY POSTED_TIME DESC";
                $r = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($r)) {
                    $by=$row['POSTED_BY'];
                    $time = $row['POSTED_TIME'];
                    $post = $row['MATERIAL'];
                    echo "<post> <hr>POSTED BY: <u>$by</u><br>TIME: <u>$time</u><hr> </post> <i>$post</i> <br><br>";
                }
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
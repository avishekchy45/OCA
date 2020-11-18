<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");
if (isset($_POST['yes'])) {
    $stdid = $_GET['stdid'];
    $coursecode = $_GET['coursecode'];
    $secid = $_GET['secid'];
    //echo "$coursecode-$secid";
    $query = "update taken set CSTATUS='ACCEPTED' where STD_ID='$stdid' and COURSE_CODE='$coursecode' and SECTION_ID='$secid' and CSTATUS='pending'";
    if (mysqli_query($con, $query))
        echo "<correct> Successfully ACCEPTED $stdid for $coursecode ... </correct>";
    else
        echo "<wrong> Error! </wrong>" . mysqli_error($con);
} else if (isset($_POST['no'])) {
    $stdid = $_GET['stdid'];
    $coursecode = $_GET['coursecode'];
    $secid = $_GET['secid'];
    //echo "$coursecode-$secid";
    $query = "update taken set CSTATUS='SUSPENDED' where STD_ID='$stdid' and COURSE_CODE='$coursecode' and SECTION_ID='$secid' and CSTATUS='pending'";
    if (mysqli_query($con, $query))
        echo "<correct> Successfully SUSPENDED $stdid from $coursecode ... </correct>";
    else
        echo "<wrong> Error! </wrong>" . mysqli_error($con);
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
                <label for="course"></label>
                <select id="course" name="course" size="1" required>
                    <option value="">SELECT COURSE</option>
                    <?php
                    $query = "select COURSE_CODE,SECTION_ID from assign where INS_ID='$id'";
                    $r = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($r)) {
                        $coursecode = $row['COURSE_CODE'];
                        $secid = $row['SECTION_ID'];
                        echo <<<HTML
                        <option value="$coursecode-$secid">$coursecode-$secid</option>
                        HTML;
                    }
                    ?>
                </select><br>
                <label for="status"></label>
                <select id="status" name="status" size="1" required>
                    <option value="">COURSE STATUS</option>
                    <option value="pending">PENDING</option>
                    <option value="accepted">ACCCEPTED</option>
                    <option value="suspended">SUSPENDED</option>
                </select><br>
                <button type="submit" value="Go" name="go">GO</button><br><br>
            </form><br><br>

            <?php
            if (isset($_POST['go']) && $_POST['status'] == "pending") {
                $course = $_POST['course'];
                $course = explode('-', $course);
                $coursecode = "$course[0]";
                $secid = "$course[1]";
                //echo "$coursecode-$secid";
                $query = "select STD_ID from taken where COURSE_CODE='$coursecode' AND SECTION_ID='$secid' AND CSTATUS='pending'";
                $r = mysqli_query($con, $query);
                echo <<<HTML
                <table id='addstudents'>
                <tr>
                <th>STUDENT ID</th>
                <th>APPROVE</th>
                </tr>
                HTML;
                while ($row = mysqli_fetch_array($r)) {
                    $stdid = $row['STD_ID'];
                    echo <<<HTML
                    <form action="enrolled.php?stdid=$stdid&coursecode=$coursecode&secid=$secid" id="form2" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">
                    <tr>
                    <td>$stdid</td>
                    <td>
                    <button type="submit" id="approve" value="YES" name="yes">YES</button>
                    <button type="submit" id="approve" value="NO" name="no">NO</button>
                    </td>
                    </tr>
                    </form><br><br>
                    HTML;
                }
                echo <<<HTML
                </table><br>
                HTML;
            }
            else if (isset($_POST['go']) && $_POST['status'] == "accepted") {
                $course = $_POST['course'];
                $course = explode('-', $course);
                $coursecode = "$course[0]";
                $secid = "$course[1]";
                //echo "$coursecode-$secid";
                $query = "select taken.STD_ID,NAME from taken,student where taken.STD_ID=student.ID AND COURSE_CODE='$coursecode' AND SECTION_ID='$secid' AND CSTATUS='accepted'";
                $r = mysqli_query($con, $query);
                echo <<<HTML
                <table id='addstudents'>
                <tr>
                <th>STUDENT ID</th>
                <th>NAME</th>
                </tr>
                HTML;
                while ($row = mysqli_fetch_assoc($r)) {
                    $stdid = $row['STD_ID'];
                    $name = $row['NAME'];
                    echo <<<HTML
                    <tr>
                    <td>$stdid</td>
                    <td>$name</td>
                    </td>
                    </tr>
                    HTML;
                }
                echo <<<HTML
                </table><br>
                HTML;
            }
            else if (isset($_POST['go']) && $_POST['status'] == "suspended") {
                $course = $_POST['course'];
                $course = explode('-', $course);
                $coursecode = "$course[0]";
                $secid = "$course[1]";
                //echo "$coursecode-$secid";
                $query = "select taken.STD_ID,NAME from taken,student where taken.STD_ID=student.ID AND COURSE_CODE='$coursecode' AND SECTION_ID='$secid' AND CSTATUS='suspended'";
                $r = mysqli_query($con, $query);
                echo <<<HTML
                <table id='addstudents'>
                <tr>
                <th>STUDENT ID</th>
                <th>NAME</th>
                </tr>
                HTML;
                while ($row = mysqli_fetch_assoc($r)) {
                    $stdid = $row['STD_ID'];
                    $name = $row['NAME'];
                    echo <<<HTML
                    <tr>
                    <td>$stdid</td>
                    <td>$name</td>
                    </td>
                    </tr>
                    HTML;
                }
                echo <<<HTML
                </table><br>
                HTML;
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
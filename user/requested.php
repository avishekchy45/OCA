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

                <label for="status"></label>
                <select id="status" name="status" size="1" required>
                    <option value="">COURSE STATUS</option>
                    <option value="pending">PENDING</option>
                    <option value="accepted">ACCCEPTED</option>
                    <option value="suspended">SUSPENDED</option>
                </select><br>

                <button type="submit" value="Go" name="go">GO</button><br><br>

                <?php
                if (isset($_POST['go'])) {
                    $status = $_POST['status'];
                    $query = "select taken.COURSE_CODE,SECTION_ID,TITLE from taken,course where taken.COURSE_CODE=course.COURSE_CODE and CSTATUS='$status' and STD_ID='$id'";
                    $r = mysqli_query($con, $query);
                    echo "
                    <table id='takencourses'>
                    <tr>
                    <th>COURSE CODE</th>
                    <th>TITLE</th>
                    <th>SECTION ID</th>
                    </tr>
                    ";
                    while ($row = mysqli_fetch_array($r)) {
                        $coursecode = $row['COURSE_CODE'];
                        $title = $row['TITLE'];
                        $section = $row['SECTION_ID'];
                        echo "
                            <tr>
                            <td>$coursecode</td>
                            <td>$title</td>
                            <td>$section</td>
                            </tr>
                        ";
                    }
                    echo "
                    </table>
                    ";
                }
                ?>

            </form><br><br>

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